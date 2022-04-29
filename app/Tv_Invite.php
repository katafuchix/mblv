<?php
/**
 * Tv_Invite.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 招待マネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_InviteManager extends Ethna_AppManager
{
	/**
	 * ユーザを招待する
	 */
	function invite()
	{
		// セッション情報を取得する
		$sess = $this->session->get('user');
		$from_user_id = $sess['user_id'];
		$from_user_hash = $sess['user_hash'];
		$from_user_nickname = $sess['user_nickname'];
		
		$_user_id = 0;
		$user_point = 0;
		
		// userにメールアドレスの登録があるかどうかチェック
		$user =& new Tv_User($this->backend,'user_mailaddress',$this->af->get('to_user_mailaddress'));
		
		// userにメールアドレスの登録がある、現在退会または仮登録中
		if($user->get('user_status') != 2){
			//既存ユーザーだが、退会中のばあいは既存データを[物理削除]する
			$r = $user->remove();
		}
		
		// userにメールアドレスの登録がない：新規のユーザの場合
		if(!$user->isValid()){
			// ユーザ登録
			$u =& new Tv_User($this->backend);
			$u->set('user_mailaddress',$this->af->get('to_user_mailaddress'));
			// SPGVユーザIDをセット →しない
			/*
			if($_user_id){
				$u->set('spgv_user_id', $_user_id);
			}
			*/
			// 過去ポイントをセット
			if($user_point){
				$u->set('user_point', $user_point);
			}
			// オーバーライド
			$r = $u->add();
			$to_user_id = $u->getId();
			if(Ethna::isError($r)) return false;
			
			//inviteに友達招待情報を登録
			$i =& new Tv_Invite($this->backend);
			$i->set('from_user_id',$from_user_id);
			$i->set('to_user_id',$to_user_id);
			$i->set('to_user_mailaddress',$this->af->get('to_user_mailaddress'));
			$i->set('invite_status',1);
			$i->set('mail_time',date("Y-m-d H:i:s"));
			$r = $i->add();
			$invite_id = $i->getId();
			if(Ethna::isError($r)) return false;
			
			// invite_idを招待されたユーザ情報に加える
			$u = new Tv_User($this->backend, 'user_hash', $u->get('user_hash'));
			// 招待IDをセット
			$u->set('invite_id', $invite_id);
			// オーバーライド
			$u->update();
			if(Ethna::isError($r)) return false;
			
			// ユーザ履歴に登録
			$timestamp = date('Y-m-d H:i:s');
			$uh = new Tv_UserHist($this->backend);
			$uh->set('user_id', $to_user_id);
			$uh->set('user_mailaddress', $u->get('user_mailaddress'));
			$uh->set('user_status', 1);
			$uh->set('user_hist_created_time', $timestamp);
			$uh->add();
			
			/* =============================================
			// 友達招待統計解析処理
			 ============================================= */
			$sm = $this->backend->getManager('Stats');
			// 入会履歴をINSERT 0:mail 1:access 2:reg
			$sm->addStats('invite', $from_user_id, 0, 0);
			
			// 招待メール送信
			$ms = new Tv_Mail($this->backend);
			$value = array (
				'user_hash'				=> $u->get('user_hash'),
				'from_user_id'			=> $from_user_id ,
				'from_user_hash'		=> $from_user_hash ,
				'from_user_nickname'	=> $from_user_nickname ,
				'to_user_mailaddress'	=> $this->af->get('to_user_mailaddress') ,
				'invite_message'		=> $this->af->get('message') ,
			);
			$ms->sendOne($this->af->get('to_user_mailaddress') , 'user_invite' , $value );
		}
		// userにメールアドレスの登録がある、現在登録中
		elseif($user->get('user_status') == 2){
			//友達申請
			$fm = $this->backend->getManager('Friend');
			$this->af->set('to_user_id', $user->gete('user_id'));
			$fm->applyFriend();
		}
	}
	
	/**
	 * 招待ユーザ会員登録時処理
	 */
	function inviteRegist($invite_id, $no_point=false)
	{
		if(!$invite_id) return false;
		
		$um = $this->backend->getManager('Util');
		
		// 招待IDがあるかどうか確認する
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'invite',
			'sql_where'		=> 'invite_id = ?',
			'sql_values'	=> array($invite_id),
		);
		$r = $um->dataQuery($param);
		//DB取得できた場合は更新
		if(count($r) > 0){
			// 招待元ユーザ情報取得
			$from_user_id = $r[0]['from_user_id'];
			// 被招待ユーザ情報取得
			$to_user_id = $r[0]['to_user_id'];
			
			// 招待情報更新
			$i =& new Tv_Invite($this->backend,'invite_id',$invite_id);
			$i->set('invite_status',2);
			$i->set('regist_time',date('Y-m-d H:i:s'));
			$r = $i->update();
			// エラー制御は行わない
//				if(Ethna::isError($r)){}
		}
		
		// 友達登録
		if($from_user_id){
			$pm = $this->backend->getManager('Point');
			$point_type_search = $this->config->get('point_type_search');
			$sns_info = $this->config->get('sns_info');
			
			//招待者側に被招待者を登録
			$f =& new Tv_Friend($this->backend);
			$f->set('from_user_id',$from_user_id);
			$f->set('to_user_id', $to_user_id);
			$f->set('friend_status',2);
			$r = $f->add();
			// エラー制御は行わない
//			if(Ethna::isError($r)){}
			
			// 招待者にポイント付与
			// ポイント付与設定のある場合
			if(!$no_point){
				$u = new Tv_User($this->backend, 'user_id', $to_user_id);
				$param = array(
					'user_id'		=> $from_user_id,
					'point'			=> intval($sns_info['site_invite_from_point']),
					'point_type'	=> $point_type_search['invite_from'],
					'point_status'	=> 2,// 承認済み
					'user_sub_id'	=> $invite_id,
					'point_sub_id'	=> $to_user_id,
					'point_memo'	=> $u->get('user_nickname'),
				);
				$pm->addPoint($param);
			}
			
			//被招待者側に招待者を登録
			$f =& new Tv_Friend($this->backend);
			$f->set('from_user_id',$to_user_id);
			$f->set('to_user_id',$from_user_id);
			$f->set('friend_status',2);
			$r = $f->add();
			// エラー制御は行わない
//			if(Ethna::isError($r)){}
			
			// 被招待者にポイント付与
			// ポイント付与設定のある場合
			if(!$no_point){
				$u = new Tv_User($this->backend, 'user_id', $from_user_id);
				$param = array(
					'user_id'		=> $to_user_id,
					'point'			=> intval($sns_info['site_invite_to_point']),
					'point_type'	=> $point_type_search['invite_to'],
					'point_status'	=> 2,// 承認済み
					'user_sub_id'	=> $invite_id,
					'point_sub_id'	=> $from_user_id,
					'point_memo'	=> $u->get('user_nickname'),
				);
				$pm->addPoint($param);
			}
		}
		
		return true;
	}
}

/**
 * 招待オブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Invite extends Ethna_AppObject
{
}
?>