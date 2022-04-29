<?php
/**
 * Tv_Media.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * メディアマネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_MediaManager extends Ethna_AppManager
{
	/**
	 * 入会経路情報を記録する
	 * メディア経由でのアクセスの場合
	 * media_accessテーブルにデータを追加して
	 * 追加したデータのkey(media_access_hash)を返す
	*/
	function addMediaAccess($code='')
	{
		// codeの決定
		if(!$code){
			//リクエストURLに'code'がある場合
			if (array_key_exists('code', $_REQUEST)){
				$code = $_REQUEST['code'];
			}
			// その他の場合
			else{
				return false;
			}
		}
		// media_settingからメディア一覧の取得
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'media',
			'sql_where'		=> 'media_status > 0 AND media_code = ?',
			'sql_values'	=> array($code),
		);
		$um =& $this->backend->getManager('Util');
		$r = $um->dataQuery($param);
		
		// media_access追加
		if(count($r) > 0){
			$o = new Tv_MediaAccess($this->backend);
			$o->set('media_id', $r[0]['media_id']);
			$o->set('media_access_param1',addslashes($_REQUEST[$r[0]['media_param1']]));
			$o->set('media_access_param2',addslashes($_REQUEST[$r[0]['media_param2']]));
			$o->set('media_access_param3',addslashes($_REQUEST[$r[0]['media_param3']]));
			$o->set('access_time', date('Y-m-d H:i:s'));
			// オーバーライド
			$o->add();
			$media_access_hash = $o->get('media_access_hash');
			
			$sm = $this->backend->getManager('Stats');
			// クリック履歴をINSERT access:0, mail:1, regist:2, send:3, resign:4
			$sm->addStats('media', $o->get('media_id'), 0, 0);
			
			// media_access_hashを返す
			return $media_access_hash;
		}
		
		return false;
	}
	
	/**
	 * 入会経路に成果を送信する
	 */
	function mediaResponse($media_access_hash, $no_point=false)
	{
		/* =============================================
		// 入会経路情報を取得
		 ============================================= */
		$um = $this->backend->getManager('Util');
		
		// ログ準備開始
		$buf = "start ".date('Y-m-d H:i:s')."\n";
		
		
		// 該当のメディアアクセスIDがあるかどうか確認する
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'media_access as ma, media as m',
			'sql_where'		=> 'ma.media_access_hash = ? AND ma.media_access_status = 1 AND ma.media_id = m.media_id',
			'sql_values'	=> array($media_access_hash),
		);
		$r = $um->dataQuery($param);
		//status:1（ユーザからのメール受信済）を取得できた場合update
		if(count($r) > 0){
			// メディアアクセス情報をストア
			$media_access_id		= $r[0]['media_access_id'];
			$media_id				= $r[0]['media_id'];
			$media_name				= $r[0]['media_name'];
			$media_access_param1	= $r[0]['media_access_param1'];
			$media_access_param2	= $r[0]['media_access_param2'];
			$media_access_param3	= $r[0]['media_access_param3'];
			$user_id				= $r[0]['user_id'];
			$community_id			= $r[0]['community_id'];
			$media_point			= $r[0]['media_point'];
			
			// メディアアクセス情報を更新する
			$ma =& new Tv_MediaAccess($this->backend,'media_access_id',$media_access_id);
			$ma->set('user_id',$user_id);
			$ma->set('media_access_status',2);
			$ma->set('regist_time',date('Y-m-d H:i:s'));
			$r = $ma->update();
			
			/* =============================================
			// 入会経路統計解析処理
			 ============================================= */
			$sm = $this->backend->getManager('Stats');
			// 入会履歴をINSERT access:0, mail:1, regist:2, send:3, resign:4
			$sm->addStats('media', $ma->get('media_id'), 0, 2);
			
		}else{
			// ログ出力
			$o = & new Tv_Log($this->backend);
			$o->set('log_type','media_error');
			$buf.= "FILE:			: ".__FILE__."\n";
			$buf.= "FILE:			: ".__LINE__."\n";
			$buf.= "media_access_hash			: {$media_access_hash}\n";
			$buf.= "error			: no data\n";
			$o->set('log_body',$buf);
			$o->set('log_created_time',date('Y-m-d H:i:s'));
			$o->add();
			return false;
		}
		
		
		
		/* =============================================
		// コミュニティ参加
		 ============================================= */
		if($community_id){
			$cmm = $this->backend->getManager('CommunityMember');
			$param = array(
				'user_id'		=> $user_id,
				'community_id'	=> $community_id,
			);
			$cmm->addCommunityMember($param);
		}
		
		
		
		/* =============================================
		// ポイント追加系処理
		 ============================================= */
		if($media_point){
			// ポイント付与のある場合
			if(!$no_point){
				$point_type_search = $this->config->get('point_type_search');
				$pm = $this->backend->getManager('Point');
				$param = array(
					'user_id'		=> $user_id,
					'point'			=> $media_point,
					'point_type'	=> $point_type_search['media_regist'],
					'point_status'	=> 2,// 承認済み
					'user_sub_id'	=> $media_access_id,
					'point_sub_id'	=> $media_id,
					'point_memo'	=> $media_name,
				);
				$pm->addPoint($param);
			}
		}
		
		/* =============================================
		// ユーザ情報を取得
		 ============================================= */
		$u = new Tv_User($this->backend, 'user_id', $user_id);
		$user_hash = $u->get('user_hash');
		
		// 出力用のログ準備
		$buf.= "media_access_id		: {$media_access_id}\n";
		$buf.= "media_id			: {$media_id}\n";
		$buf.= "media_access_hash	: {$media_access_hash}\n";
		$buf.= "media_access_param1	: {$media_access_param1}\n";
		$buf.= "media_access_param2	: {$media_access_param2}\n";
		$buf.= "media_access_param3	: {$media_access_param3}\n";
		$buf.= "user_id				: {$user_id}\n";
		$buf.= "user_hash			: {$user_hash}\n";
		$buf.= "community_id		: {$community_id}\n";
		$buf.= "media_point			: {$media_point}\n";
		
		//リクエストURL取得
		if($media_id){
			$m = new Tv_Media($this->backend, 'media_id', $media_id);
			$media_res_url = $m->get('media_res_url');
		}
		// 入会経路IDがない場合
		else{
			// ログ出力
			$o = & new Tv_Log($this->backend);
			$o->set('log_type','media_error');
			$buf.= "FILE:			: ".__FILE__."\n";
			$buf.= "FILE:			: ".__LINE__."\n";
			$buf.= "media_access_hash			: {$media_access_hash}\n";
			$buf.= "error			: URL get error\n";
			$o->set('log_body',$buf);
			$o->set('log_created_time',date('Y-m-d H:i:s'));
			$o->add();
			return false;
		}
		
		// 出力用ログに追加
		$buf.= "media_res_url		: {$media_res_url}\n";
		
		
		
		/* =============================================
		// 入会経路に成果を送信
		 ============================================= */
		//置換文字処理
		$cut = $this->config->get('tag_cut');
		$r_url = $media_res_url;
		$params = array(
			'user_hash'	=> $user_hash,
			1		=> $media_access_param1,
			2		=> $media_access_param2,
			3		=> $media_access_param3
		);
		$select = array();
		$replace = array();
		foreach($params as $k => $v){
			$select[] = $cut . $k . $cut;
			$replace[] = $v;
		}
		$res_url = str_replace($select, $replace,$media_res_url);
		
		// 出力用ログに追加
		$buf.= "res_url			: $res_url\n";
		
		//URLをドメインとパスに
		$pattern = "/^(http:\/\/)([^\/]+)(\/.*$)/i";
		if(preg_match($pattern,$res_url,$match)){
			$domain = $match[2];
			$path = $match[3];
		}else{
			//想定外のURLはログを取らずにfalseを返す
			return false;
		}
		
		// 出力用ログに追加
		$buf.= "domain			: {$domain}\n";
		$buf.= "path			: {$path}\n";
		
		// socket接続 port:80 timeout:60
		$fp = fsockopen($domain,80,$errno,$errstr,60);
		if(!$fp){
			// ログ出力
			$o = & new Tv_Log($this->backend);
			$o->set('log_type','media_error');
			$buf.= "FILE:			: ".__FILE__."\n";
			$buf.= "FILE:			: ".__LINE__."\n";
			$buf.= "media_access_hash			: {$media_access_hash}\n";
			$buf.= "error			: fsockopen error\n";
			$o->set('log_body',$buf);
			$o->set('log_created_time',date('Y-m-d H:i:s'));
			$o->add();
			return false;
		}
		
		
		//リクエスト （media成果情報の送信）
		$request = "GET {$path} HTTP/1.1\r\n";
		$request.= "Host:{$domain}\r\n\r\n";
		//$request.= "\n";
		$byte = fputs($fp,$request);
		if($byte === false){
			// ログ出力
			$o = & new Tv_Log($this->backend);
			$o->set('log_type','media_error');
			$buf.= "FILE:			: ".__FILE__."\n";
			$buf.= "FILE:			: ".__LINE__."\n";
			$buf.= "media_access_hash			: {$media_access_hash}\n";
			$buf.= "error			: fputs error\n";
			$o->set('log_body',$buf);
			$o->set('log_created_time',date('Y-m-d H:i:s'));
			$o->add();
			return false;
		}
		fclose($fp);
		
		// 出力用ログに追加
		$buf.= "request			: {$request}\n";
		$buf.= "byte			: {$byte}\n";
		
		
		
		/* =============================================
		// 入会経路履歴を更新
		 ============================================= */
		$ma =& new Tv_MediaAccess($this->backend,'media_access_id',$media_access_id);
		$ma->set('media_access_status',3);
		$ma->set('send_time',date('Y-m-d H:i:s'));
		$r = $ma->update();
		if(Ethna::isError($r)){
			// ログ出力
			$o = & new Tv_Log($this->backend);
			$o->set('log_type','media_error');
			$buf.= "FILE:			: ".__FILE__."\n";
			$buf.= "FILE:			: ".__LINE__."\n";
			$buf.= "media_access_hash			: {$media_access_hash}\n";
			$buf.= "error			: media_access update error\n";
			$o->set('log_body',$buf);
			$o->set('log_created_time',date('Y-m-d H:i:s'));
			$o->add();
			return false;
		}
		
		/* =============================================
		// 入会経路統計解析処理
		 ============================================= */
		$sm = $this->backend->getManager('Stats');
		// 退会履歴をINSERT access:0, mail:1, regist:2, send:3, resign:4
		$sm->addStats('media', $ma->get('media_id'), 0, 3);
		
		// ログ出力
		$o = & new Tv_Log($this->backend);
		$o->set('log_type','media');
		$o->set('log_body',$buf);
		$o->set('log_created_time',date('Y-m-d H:i:s'));
		$o->add();
		
		return true;
	}
}

/**
 * メディアオブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Media extends Ethna_AppObject
{
}
?>