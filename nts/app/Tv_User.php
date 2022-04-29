<?php
/**
 * Tv_User.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ユーザマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_UserManager extends Ethna_AppManager
{
	/**
	 * ユーザをログインさせる
	 * 
	 * @access public
	 * @param string $userMailaddress メールアドレス
	 * @param string $userPassword パスワード
	 * @return boolean ログインに成功したか（trueなら成功）
	 */
	function login($userMailaddress, $userPassword)
	{ 
		// ユーザの取得
		$user = &new Tv_User(
			$this->backend,
			array('user_mailaddress', 'user_password', 'user_status'),
			array($userMailaddress, $userPassword, 2)
		);
		if(!$user->isValid()) return false; // ユーザ情報が取得できない場合
		// セッションにユーザ情報を保存
		$this->session->start(0);
		$this->session->set('user', $user->getNameObject()); 
		// セッションIDをDBに保存
		$user->set('user_sessid', session_id());
		// 機種名を更新
		$um = $this->backend->getManager('Util');
		$user->set('user_device', $um->getModel());
		$user->update();
		return true;
	}
	
	/**
	 * ユーザをログアウトさせる
	 * 
	 * @access public
	 */
	function logout()
	{
		$this->session->destroy();
	}
	
	/**
	 * ユーザを退会させる
	 * 
	 * @access public
	 * @param string $userPassword パスワード
	 * @return boolean 退会に成功したか（trueなら成功）
	 */
	function resign($userPassword)
	{
		$userSession = $this->session->get('user');
		$user_id = $userSession['user_id'];
		if($userPassword != $userSession['user_password']){
			$this->backend->ae->add(null, '', E_USER_PASSWORD);
			return false;
		} 
		// 日記が表示されないようにする start
		$ba = &$this->backend->getManager('BlogArticle');
		$ba->status_off($userSession['user_id']); 
		// ブログコメント
		$bc = $this->backend->getManager('BlogComment');
		$bc->status_off($userSession['user_id']);
		// 日記が表示されないようにする end
		// 友達一覧に表示されないようにする start
		$friend = &$this->backend->getManager('Friend');
		$friend->status_off($userSession['user_id']); 
		// 友達一覧に表示されないようにする end
		// 退会するユーザーを参加しているコミュニティのメンバー一覧から消す start
		$cm = &new Tv_CommunityMember($this->backend);
		$cm_list = $cm->searchProp(
			array('community_member_id','community_id'),
			array('user_id' => $userSession['user_id'],
				'community_member_status' => 1,
				)
			);
		if($cm_list[0] > 0){
			// すべてのコミュニティに対して処理を行う
			foreach($cm_list[1] as $v){
				$community_id = $v['community_id'];
				$community_member_id = $v['community_member_id'];
				
				// community_memberテーブルを表示ステータスOFF
				$communityMember = &$this->backend->getManager('CommunityMember');
				$communityMember->status_off($community_member_id); 
			}
		}
		
		// コミュニティトピック
		$ca = $this->backend->getManager('CommunityArticle');
		$ca->status_off($user_id);
		
		// コミュニティコメント
		$cc = $this->backend->getManager('CommunityComment');
		$cc->status_off($user_id);
		
		// 伝言板
		$bb = $this->backend->getManager('Bbs');
		$bb->status_off_resign($user_id);
		
		// あしあと
		$fm = $this->backend->getManager('Footprint');
		$fm->status_off($user_id);
		
		// メッセージ
		$mm = $this->backend->getManager('Message');
		$mm->status_off_resign($user_id);
		
		// プロフ
		$up = $this->backend->getManager('UserProf');
		$up->status_off($user_id);
		
		
		// オプションで設定されている項目を取得する
		$option = $this->config->get('option');
		
		// アバター
		if($option['avatar']){
			$bm = $this->backend->getManager('UserAvatar');
			$bm->status_off($user_id);
		}
		// ポイント
		if($option['point']){
			$pm = $this->backend->getManager('Point');
			$pm->status_off($user_id);
		}
		// デコメール
		if($option['decomail']){
			$ud = $this->backend->getManager('UserDecomail');
			$ud->status_off($user_id);
		}
		// ゲーム
		if($option['game']){
			$ug = $this->backend->getManager('UserGame');
			$ug->status_off($user_id);
		}
		// サウンド
		if($option['sound']){
			$us = $this->backend->getManager('UserSound');
			$us->status_off($user_id);
		}
		
		/* =============================================
		// 入会経路情報を更新
		 ============================================= */
		$um = $this->backend->getManager('Util');
		
		// 該当のメディアアクセスIDがあるかどうか確認する
		$param = array(
			'sql_select'	=> 'media_access_id',
			'sql_from'		=> 'media_access as ma, media as m, user u',
			'sql_where'		=> 'u.user_id= ? AND media_access_status <> 4 AND ma.media_access_hash = u.media_access_hash AND ma.media_id = m.media_id',
			'sql_values'	=> array($user_id),
		);
		$r = $um->dataQuery($param);
		// 入会経路のデータが存在した場合
		if(count($r) > 0){
			// メディアアクセス情報をストア
			$media_access_id		= $r[0]['media_access_id'];
			
			// メディアアクセス情報を退会(4)に更新する
			$ma =& new Tv_MediaAccess($this->backend,'media_access_id',$media_access_id);
			$ma->set('media_access_status',4);
			$ma->set('access_time', date('Y-m-d H:i:s'));
			$r = $ma->update();
			
			/* =============================================
			// 入会経路統計解析処理
			 ============================================= */
			$sm = $this->backend->getManager('Stats');
			// 退会履歴をINSERT access:0, mail:1, regist:2, send:3, resign:4
			$sm->addStats('media', $ma->get('media_id'), 0, 4);
		}
		
		// userテーブルのステータスを退会にする start
		$user = &new Tv_User($this->backend, 'user_id', $user_id);
		if(!$user->isValid()) return false;
		
		$user->set('user_status', 3);
		$user->set('user_deleted_time', date('Y-m-d H:i:s'));
		$user->update();
		$this->logout(); 
		// userテーブルのステータスを退会にする end
		
		return true;
	}
	
	/**
	 * ユーザを強制退会させる
	 * 
	 * @access public
	 * @param integer $userId ユーザID
	 * @param integer $userStatus ユーザステータス
	 * @return boolean 強制退会に成功したか（trueなら成功）
	 */
	function forcedResign($userId, $userStatus=null)
	{
		if(!$userStatus) $userStatus = 4;
		
		// 日記が表示されないようにする start
		$ba = &$this->backend->getManager('BlogArticle');
		$ba->status_off($userId); 
		// ブログコメント
		$bc = $this->backend->getManager('BlogComment');
		$bc->status_off($userId);
		// 日記が表示されないようにする end
		// 友達一覧に表示されないようにする start
		$friend = &$this->backend->getManager('Friend');
		$friend->status_off($userId); 
		// 友達一覧に表示されないようにする end
		// 退会するユーザーがコミュニティ管理人の場合は、ステータス変更する start
		$cm = &new Tv_CommunityMember($this->backend);
		$cm_list = $cm->searchProp(
			array('community_id', 'community_member_id'),
			array('user_id' => $userId)
		);
		
		if($cm_list[0] > 0){
			foreach($cm_list[1] as $v){
				$community_id = $v['community_id'];
				$community_member_id = $v['community_member_id'];
				
				// community_memberテーブルを表示ステータスOFF
				$communityMember = &$this->backend->getManager('CommunityMember');
				$communityMember->status_off($community_member_id); 
				
				// communityテーブルを表示ステータスOFF(コミュニティの管理人の場合)
				if($v['community_member_status'] == 2){
					$community = &$this->backend->getManager('Community');
					$community->status_off($community_id);
				}
			}
		} 
		
		// コミュニティトピック
		$ca = $this->backend->getManager('CommunityArticle');
		$ca->status_off($userId);
		
		// コミュニティコメント
		$cc = $this->backend->getManager('CommunityComment');
		$cc->status_off($userId);
		
		// 伝言板
		$bb = $this->backend->getManager('Bbs');
		$bb->status_off_resign($userId);
		
		// あしあと
		$fm = $this->backend->getManager('Footprint');
		$fm->status_off($userId);
		
		// メッセージ
		$mm = $this->backend->getManager('Message');
		$mm->status_off_resign($userId);
		
		// プロフ
		$up = $this->backend->getManager('UserProf');
		$up->status_off($userId);
		
		// オプションで設定されている項目を取得する
		$option = $this->config->get('option');
		
		// アバター
		if($option['avatar']){
			$bm = $this->backend->getManager('UserAvatar');
			$bm->status_off($userId);
		}
		
		// ポイント
		if($option['point']){
			$pm = $this->backend->getManager('Point');
			$pm->status_off($userId);
		}
		// デコメール
		if($option['decomail']){
			$ud = $this->backend->getManager('UserDecomail');
			$ud->status_off($userId);
		}
		
		// ゲーム
		if($option['game']){
			$ug = $this->backend->getManager('UserGame');
			$ug->status_off($userId);
		}
		// サウンド
		if($option['sound']){
			$us = $this->backend->getManager('UserSound');
			$us->status_off($userId);
		}
		
		/* =============================================
		// 入会経路情報を更新
		 ============================================= */
		$um = $this->backend->getManager('Util');
		
		// 該当のメディアアクセスIDがあるかどうか確認する
		$param = array(
			'sql_select'	=> 'media_access_id',
			'sql_from'		=> 'media_access as ma, media as m, user u',
			'sql_where'		=> 'u.user_id= ? AND media_access_status <> 4 AND ma.media_access_hash = u.media_access_hash AND ma.media_id = m.media_id',
			'sql_values'	=> array($userId),
		);
		$r = $um->dataQuery($param);
		// 入会経路のデータが存在した場合
		if(count($r) > 0){
			// メディアアクセス情報をストア
			$media_access_id		= $r[0]['media_access_id'];
			
			// メディアアクセス情報を退会(4)に更新する
			$ma =& new Tv_MediaAccess($this->backend,'media_access_id',$media_access_id);
			$ma->set('media_access_status',4);
			$ma->set('access_time', date('Y-m-d H:i:s'));
			$r = $ma->update();
			
			/* =============================================
			// 入会経路統計解析処理
			 ============================================= */
			$sm = $this->backend->getManager('Stats');
			// 退会履歴をINSERT access:0, mail:1, regist:2, send:3, resign:4
			$sm->addStats('media', $ma->get('media_id'), 0, 4);
		
		}
		
		// 退会するユーザーがコミュニティ管理人の場合は、ステータス変更する end
		// userテーブルのステータスを強制退会にする start
		$user = &new Tv_User($this->backend,
			'user_id',
			$userId
			);
		if(!$user->isValid()) return false;
		
		$user->set('user_status', $userStatus);
		$user->set('user_deleted_time', date('Y-m-d H:i:s'));
		$user->update(); 
		// userテーブルのステータスを強制退会にする end
		// 強制ログアウト
		if(!$this->forcedLogout($user->get('user_id'))) return false;
		
		return true;
	}
	
	/**
	 * ユーザを強制ログアウトさせる
	 * 
	 * @access public
	 * @param integer $userId ユーザID
	 * @return boolean 強制ログアウトに成功したか（trueなら成功）
	 */
	function forcedLogout($userId)
	{ 
		// tmp/sess_{SESSID}を削除して強制的にログアウトします
		$user = &new Tv_User($this->backend,
			'user_id',
			$userId
			);
		if(!$user->isValid()) return false;
		
		$ctl = $this->backend->getController();
		$sessionFile = $ctl->getDirectory('tmp') . '/sess_' . $user->get('user_sessid');
		
		// ファイルがなければログアウト状態なのでOK
		if(!file_exists($sessionFile)) return true;
		
		return unlink($sessionFile);
	}
	
	/**
	 * 2ユーザの関係を取得する
	 * 
	 * @access public
	 * @return integer 0:友達ではない, 1:友達, 2:自分
	 */
	function getUserRelation($from_user_id, $to_user_id)
	{
		if($from_user_id == $to_user_id){
			return 2;
		}
		$friend =& new Tv_Friend(
			$this->backend,
			array('from_user_id', 'to_user_id'),
			array($from_user_id, $to_user_id)
		);
		if($friend->isValid() && $friend->get('friend_status') == 2){
			return 1;
		}
		
		return 0;
	}
}

/**
 * ユーザオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_User extends Ethna_AppObject
{
	/**
	 * オブジェクトプロパティ表示名へのアクセサ
	 * 
	 * @access public
	 * @param string $key プロパティ名
	 * @return string プロパティの表示名
	 */
	function getName($key)
	{
		$um =& $this->backend->getManager('Util');
		
		switch ($key){
			case 'user_nickname':
				if($this->get('user_status') != 2){ 
					// 本登録状態以外の場合はmixiに倣って"＿"を表示
					return '＿';
				}else{
					return $this->get('user_nickname');
				}
/*
			case 'prefecture_id':
				$r = $um->getAttrName($key, $this->get($key));
			case 'user_blood_type':
				$r = $um->getAttrName($key, $this->get($key));
			case 'work_location_prefecture_id':
				$r = $um->getAttrName('prefecture_id', $this->get('prefecture_id'));
			case 'job_family_id':
				$r = $um->getAttrName($key, $this->get($key));
			case 'business_category_id':
				$r = $um->getAttrName($key, $this->get($key));
			case 'user_is_married':
				$r = $um->getAttrName($key, $this->get($key));
			case 'user_has_married':
				$r = $um->getAttrName($key, $this->get($key));
			default:
*/
		}
		return $this->get($key);
	}
	
	/**
	 *  オブジェクトを追加する
	 *
	 *  @access public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function add()
	{
		$timestamp = date('Y-m-d H:i:s');
		// オブジェクトの追加
		$this->set('user_status',1);
		$this->set('user_checked',0);
		$this->set('user_created_time', $timestamp);
		$this->set('user_updated_time', $timestamp);
		parent::add();
		
		// user_hashを生成する
		$this->set('user_hash', md5($this->getId()));
		$o = new Tv_User($this->backend, 'user_id', $this->getId());
		$o->set('user_hash', $this->get('user_hash'));
		return $o->update();
	}
	
	/**
	 *  オブジェクトを更新する
	 *
	 *  @access public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function update()
	{
		$timestamp = date('Y-m-d H:i:s');
		// 更新日時を保存する
		$this->set('user_updated_time', $timestamp);
		return parent::update();
	}
	
	/**
	 *  オブジェクトを論理削除する
	 *
	 *  @access public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function delete()
	{
		$timestamp = date('Y-m-d H:i:s');
		// 削除日時を保存する
		$this->set('user_deleted_time', $timestamp);
		// 論理削除
		$this->set('user_status', 0);
		return parent::update();
	}
	
	/**
	 *  画像を削除する
	 *
	 *  @access public
	 *  @return boolean true: 正常終了, false: エラー
	 */
	function deleteImage()
	{
		// 画像を削除
		if($this->get('image_id')) {
			$im =& $this->backend->getManager('Image');
			$im->remove($this->get('image_id'));
			// 画像を論理削除
			$this->set('image_id', 0);
		}
		return $this->update();
	}
}

?>