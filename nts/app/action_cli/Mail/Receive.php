<?php
/**
 * Receive.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * メール受信アクションクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
// SNS情報を取得するためActionUserを継承
//class Tv_Cli_Action_MailReceive extends Tv_ActionClass
class Tv_Cli_Action_MailReceive extends Tv_ActionUser
{
	/* メールソース */
	var $mail_source;
	/* メール本文 */
	var $mail_body;
	/* メールヘッダ */
	var $mail_headers;
	/* 送信元メールアドレス */
	var $mail_from;
	/* 受信メールアドレス */
	var $mail_to;
	/* メールタイプ */
	var $mail_type;
	/* メールハッシュ */
	var $mail_hash;
	/* メール送信オブジェクト */
	var $ms;
	/* ユーザオブジェクト */
	var $user;
	
	/**
	 * 処理実行
	 */
	function perform()
	{
		require_once 'Mail_Mime/mimeDecode.php';
		// メールデータの取得
		$this->getMailData();
		
		// 以下DBに問い合わせ
		$this->ms = new Tv_Mail($this->backend);
		
		// userにメールアドレスの登録があるかどうかチェック
		$this->user =& new Tv_User($this->backend, 'user_mailaddress', $this->mail_from);
		
		// メールタイプによって処理を振り分け
		$mail_account = $this->config->get('mail_account');
		switch($this->mail_type)
		{
			/*
			 * 会員管理系
			 */
			// エラーメールの場合
			case $mail_account['error']['account']:
				$this->error_mail();
				break;
			// 会員登録の場合
			case $mail_account['regist']['account']:
				$this->regist_mail();
				break;
			// メールアドレス変更の場合
			case $mail_account['change']['account']:
				$this->change_mail();
				break;
			// 入会経路通知メールの場合
			case $mail_account['media']['account']:
				$this->media_mail();
				break;
			
			/*
			* 画像投稿系
			*/
			// マイ画像変更の場合
			case $mail_account['my_image']['account']:
				$this->my_image_mail();
				break;
			// 日記記事画像投稿の場合
			case $mail_account['blog_article_image']['account']:
				$this->blog_article_image_mail();
				break;
			// 日記コメント画像投稿の場合
			case $mail_account['blog_comment_image']['account']:
				$this->blog_comment_image();
				break;
			// コミュニティ画像投稿の場合
			case $mail_account['community_image']['account']:
				$this->community_image_mail();
				break;
			// コミュニティトピック画像投稿の場合
			case $mail_account['community_article_image']['account']:
				$this->community_article_image_mail();
				break;
			// コミュニティコメント画像投稿の場合
			case $mail_account['community_comment_image']['account']:
				$this->community_comment_image_mail();
				break;
			// メッセージ画像投稿の場合
			case $mail_account['message_image']['account']:
				$this->message_image_mail();
				break;
			// 伝言板画像投稿の場合
			case $mail_account['bbs_image']['account']:
				$this->bbs_image_mail();
				break;
			
			/*
			* 動画投稿系
			*/
			// 日記記事動画投稿の場合
			case $mail_account['blog_article_movie']['account']:
				$this->blog_article_movie_mail();
				break;
			// 日記コメント動画投稿の場合
			case $mail_account['blog_comment_movie']['account']:
				$this->blog_comment_movie();
				break;
			// コミュニティ動画投稿の場合
			case $mail_account['community_movie']['account']:
				$this->community_movie_mail();
				break;
			// コミュニティトピック動画投稿の場合
			case $mail_account['community_article_movie']['account']:
				$this->community_article_movie_mail();
				break;
			// コミュニティコメント動画投稿の場合
			case $mail_account['community_comment_movie']['account']:
				$this->community_comment_movie_mail();
				break;
			// メッセージ動画投稿の場合
			case $mail_account['message_movie']['account']:
				$this->message_movie_mail();
				break;
			// 伝言板動画投稿の場合
			case $mail_account['bbs_movie']['account']:
				$this->bbs_movie_mail();
				break;
			
			default:
				exit;
		}
	}
	
	/**
	 * メールからの画像アップロード
	 */
	function uploadImageFromMail()
	{
		// ファイルチェック
		if(!$this->mail_body['files'][0]['body']) return false;
		
		// 拡張子チェック
		if(!preg_match('/(\.gif|\.jpeg|\.jpg)/i',$this->mail_body['files'][0]['name'])) return false;
		
		// アップロード
		$ctl = $this->backend->getController();
		// 日本語ファイル名対策
		$um = $this->backend->getManager('Util');
		list($pre, $ext) = $um->extractName($this->mail_body['files'][0]['name']);
		$token = time() . substr(md5(microtime()), 0, rand(5, 12));
		$filename = $token . '.' . strtolower($ext);
		$tmpPath = $ctl->getDirectory('tmp') . '/' . $filename;
//		$tmpPath = $ctl->getDirectory('tmp') . '/' . $this->mail_body['files'][0]['name'];
		
		$this->save($tmpPath, $this->mail_body['files'][0]['body']);
		$im =& $this->backend->getManager('Image');
		$fileId = $im->uploadImageFromMail($tmpPath, $this->mail_body['files'][0]['type'], $this->user->get('user_id'));
		@unlink($tmpPath);
		if(!$fileId) return false;
		
		return $fileId;
	}
	
	/**
	 * メールからの動画アップロード
	 */
	function uploadMovieFromMail()
	{
		// アップロード
		$ctl = $this->backend->getController();
		$tmpPath = $ctl->getDirectory('tmp') . '/' . $this->mail_body['files'][0]['name'];
		$this->save($tmpPath, $this->mail_body['files'][0]['body']);
		$mm =& $this->backend->getManager('Movie');
		$fileId = $mm->uploadMovieFromMail($tmpPath, $this->mail_body['files'][0]['type'], $this->user->get('user_id'));
		@unlink($tmpPath);
		if(!$fileId) return false;
		
		return $fileId;
	}
	
	/**
	 * 画像をオブジェクトに登録
	 */
	function addImageToObject($object_name, $fileId)
	{
		// 動的にクラスオブジェクトを生成
		$primary_key = $object_name . '_id';
		$hash_column = $object_name . '_hash';
		$um = $this->backend->getManager('Util');
		$objectName = $um->camelize($object_name);
		$class_name = 'Tv_' . $objectName;
		
		$o =& new $class_name($this->backend, $hash_column, $this->mail_hash);
		if(!$o->isValid()) return false;
		
		// 画像削除
		$o->deleteImage();
		$o->set('image_id', $fileId);
		$o->update();
		
		return true;
	}
	
	/**
	 * 動画をオブジェクトに登録
	 */
	function addMovieToObject($object_name, $fileId)
	{
		// 動的にクラスオブジェクトを生成
		$primary_key = $object_name . '_id';
		$hash_column = $object_name . '_hash';
		$um = $this->backend->getManager('Util');
		$objectName = $um->camelize($object_name);
		$class_name = 'Tv_' . $objectName;
		
		$o =& new $class_name($this->backend, $hash_column, $this->mail_hash);
		if(!$o->isValid()) return false;
		
		// 動画削除
		$o->deleteMovie();
		$o->set('movie_id', $fileId);
		$o->update();
		
		return true;
	}
	
	/**
	 * エラーメールの場合の処理
	 */
	function error_mail()
	{
		// ユーザ情報に該当のある場合
		if($this->user->user_status){
			// 登録のあるメールアドレスの場合は不達メールカウントアップ
			$cnt = $this->user->get('user_magazine_error_num');
			$eu =& new Tv_User($this->backend, 'user_hash', $this->mail_hash);
			$eu->set('user_magazine_error_num',intval($cnt)+1);
			$r = $eu->update();
		}
		exit;
	}
	
	/**
	 * 会員登録メールの処理
	 */
	function regist_mail()
	{
		// 既にメンバー登録されていればエラーメール送信
		if($this->user->get('user_status') == 2){
			// メール自動返信
			$value = array (
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_already_member_error' , $value );
		}
		// 強制退会ユーザの場合エラーメール送信
		elseif($this->user->get('user_status') == 4){
			// メール自動返信
			$value = array (
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_forbidden_member_error' , $value );
		}
		// 新規のユーザの場合
		else{
			$_user_id = 0;
			$user_point = 0;
			
			// 既に仮登録、退会、強制退会したユーザの場合
			if($this->user->get('user_status') == 1 || $this->user->get('user_status') == 3){
				// もしSPGVユーザの場合
				$_user_id = $this->user->get('spgv_user_id');
				if($_user_id){
					// SPGVのユーザステータスを確認
					$su = new Tv_SpgvUser($this->backend, 'user_id', $_user_id);
					if($su->isValid()){
						// 有効会員の場合
						if($su->get('user_status') == 2){
							// 過去のポイントを引き継いで登録（SNSV側とSPGV側のポイントは同期している前提）
							$user_point = $su->get('user_point');
						}
					}
				}
				// 旧データを消去
				$this->user->remove();
			}
			
			// ユーザ情報を登録
			$u =& new Tv_User($this->backend);
			$u->set('user_mailaddress',$this->mail_from);
			// キャリア判別
			switch($GLOBALS['EMOJIOBJ']->to_carrier)
			{
				case 'DOCOMO':
					$user_carrier = 1;
					break;
				case 'AU':
					$user_carrier = 2;
					break;
				case 'SOFTBANK':
					$user_carrier = 3;
					break;
				default:
					$user_carrier = 0;
					break;
			}
			// キャリアをセット
			$u->set('user_carrier',$user_carrier);
			// SPGVユーザIDをセット
			if($_user_id){
				$u->set('spgv_user_id', $_user_id);
			}
			// 過去ポイントをセット
			if($user_point){
				$u->set('user_point', $user_point);
			}
			
			// オーバーライド
			$r = $u->add();
			if(Ethna::isError($r)) return false;
			// ユーザIDの決定
			$user_id = $u->getId();
			
			// SPGVへ会員情報を登録
			if(!$_user_id){
				// メールアドレスの存在確認
				$su = new Tv_SpgvUser($this->backend, 'user_mailaddress', $this->mail_from);
				// 存在しない場合登録処理を行う
				if(!$su->isValid()){
					$su = new Tv_SpgvUser($this->backend);
					$su->set('user_mailaddress', $this->mail_from);
					$su->set('snsv_user_id', $user_id);
					$su->set('user_status', 1);
					$r = $su->add();
//					if(Ethna::isError($r)) return false;
					// SPGVユーザIDの決定
					$_user_id = $su->getId();
				}
			}
			// 過去のSPGV会員情報がある場合
			else{
				$su = new Tv_SpgvUser($this->backend, 'user_id', $_user_id);
				// レコードの存在確認
				if($su->isValid()){
					$su->set('snsv_user_id',$user_id);
					$r = $su->update();
//					if(Ethna::isError($r)) return false;
				}
			}
			
			// ユーザ情報を更新
			$u = new Tv_User($this->backend, 'user_id', $user_id);
			// SPGVユーザIDをセット
			$u->set('spgv_user_id', $_user_id);
			// ユーザオブジェクトをメンバにセット
			$this->user = $u;
			// メディアアクセスカウントを識別
			$media_id = $this->media_access();
			if($media_id){
				$u->set('media_id',$media_id);
				$u->set('media_access_hash',$this->mail_hash);
			}
			// 更新
			$u->update();
			
			// ユーザ履歴に登録
			$timestamp = date('Y-m-d H:i:s');
			$uh = new Tv_UserHist($this->backend);
			$uh->set('user_id', $user_id);
			$uh->set('user_mailaddress', $this->mail_from);
			$uh->set('spgv_user_id', $_user_id);
			$uh->set('user_status', 1);
			$uh->set('user_hist_created_time', $timestamp);
			$uh->add();
			
			// 会員数増減レポート
			$an = $this->backend->getManager('Analytics');
			$param = array(
				'pre_regist'	=> true,
				'regist'		=> false,
				'invite'		=> false,
				'media'			=> false,
				'resign'		=> false,
			);
			$an->addAnalytics($param);
			
			// ユーザ識別子を取得
			$this->user_hash = $u->get('user_hash');
			// メール自動返信
			$value = array (
				'user_hash'		=> $this->user_hash,
				'media_hash'	=> $this->mail_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_regist' , $value );
		}
		
		return true;
	}
	
	/**
	 * メールアドレス変更メールの処理
	 */
	function change_mail()
	{
		// ユーザ識別子に該当がない場合は何も処理をしない
		// 例外的にメール本文にHashが記載されている
		// $user = new Tv_User($this->backend, 'user_hash', $this->mail_hash);
		$user_hash = str_replace("\n", "", $this->mail_body['body']);
		$user_hash = str_replace("\r\n", "", $user_hash);
		$user_hash = str_replace("\r", "", $user_hash);
		
		$user = new Tv_User($this->backend, 'user_hash', $user_hash);
		
		if(!$user->isValid()) return false;
		if($user->get('user_status') != 2) return false;
		
		// 今回送信元のメールアドレスと登録済みのメールアドレスが異なる場合のみ以下の処理を行う
		if($user->get('user_mailaddress') != $this->mail_from){
			// メールアドレスの重複確認
			$param = array(
				'sql_select'	=> '*',
				'sql_from'		=> 'user',
				'sql_where'		=> 'user_status = 2 AND user_mailaddress = ?',
				'sql_values'	=> array($this->mail_from),
			);
			$um = $this->backend->getManager('Util');
			$r = $um->dataQuery($param);
			// 有効なメールアドレスとしての登録が0件ならば以下の処理を行う
			if(count($r) == 0){
				// メールアドレス情報更新
				$user->set('user_mailaddress', $this->mail_from);
				$r = $user->update();
				// 成功した場合
				if(!Ethna::isError($r)){
					// メール自動返信
					$value = array (
						'user_hash' => $user->get('user_hash'),
					);
					$this->ms->sendOne($this->mail_from , 'user_change_mailaddress_done' , $value );
					
					return true;
				}
			}
		}
		// 失敗した場合
		// メール自動返信
		$value = array(
			'user_hash' => $user->get('user_hash'),
		);
		$this->ms->sendOne($this->mail_from , 'user_change_mailaddress_error' , $value );
		
		return false;
	}
	
	/**
	 * 入会経路通知メールの処理
	 */
	function media_mail()
	{
		// 既にメンバー登録されていればエラーメール送信
		if($this->user->get('user_status') == 2){
			// メール自動返信
			$value = array (
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_already_member_error' , $value );
		}
		// そうでない場合
		else{
			// 入会経路情報を取得する
			$m = new Tv_Media($this->backend, 'media_code', $this->mail_hash);
			// 該当レコードがあった場合
			if($m->isValid()){
				// メール自動返信
				$value = array (
					'Subject'	=> $m->get('media_mail_title'),
					'Body'		=> $m->get('media_mail_body'),
				);
				$this->ms->sendOne($this->mail_from , '' , $value );
			}
		}
		return true;
	}
	
	/**
	 * マイ画像変更メールの場合の処理
	 */
	function my_image_mail()
	{
		// マイ画像投稿
		$fileId = $this->uploadFileFromMail();
		// 画像削除
		$this->user->deleteImage();
		// 画像更新
		$this->user->set('image_id', $fileId);
		$r = $this->user->update();
		
		// メール自動返信
		if($fileId || !Ethna::isError($r)){
			// 投稿成功
			$value = array(
				'user_hash' => $this->user_hash,
			);
			$ms->sendOne($this->mail_from , 'user_image_success' , $value );
		}else{
			// 投稿失敗
			$value = array(
				'user_hash' => $this->user_hash,
				'image_mailaddress' => $this->mail_to,
			);
			$ms->sendOne($this->mail_from , 'user_image_success_error' , $value );
		}
		
		return true;
	}
	
	/**
	 * 日記記事画像投稿メールの場合の処理
	 */
	function blog_article_image_mail()
	{
		// 日記記事の画像投稿
		$fileId = $this->uploadImageFromMail();
		if($fileId) $r = $this->addImageToObject('blog_article', $fileId);
		// メール自動返信
		if($fileId || $r){
			// 投稿成功
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_success' , $value );
		}else{
			// 投稿失敗
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_error' , $value );
		}
		return true;
	}
	
	/**
	 * 日記コメント画像投稿メールの場合の処理
	 */
	function blog_comment_image_mail()
	{
		// 日記コメントの画像投稿
		$fileId = $this->uploadImageFromMail();
		if($fileId) $r = $this->addImageToObject('blog_comment', $fileId);
		// メール自動返信
		if($fileId || $r){
			// 投稿成功
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_success' , $value );
		}else{
			// 投稿失敗
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_error' , $value );
		}
		return true;
	}
	
	/**
	 * コミュニティ画像投稿メールの場合の処理
	 */
	function community_image_mail()
	{
		// コミュニティの画像投稿
		$fileId = $this->uploadImageFromMail();
		if($fileId) $r = $this->addImageToObject('community', $fileId);
		// メール自動返信
		if($fileId || $r){
			// 投稿成功
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_success' , $value );
		}else{
			// 投稿失敗
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_error' , $value );
		}
		return true;
	}
	
	/**
	 * コミュニティトピック画像投稿メールの場合の処理
	 */
	function community_article_image_mail()
	{
		// コミュニティトピックの画像投稿
		$fileId = $this->uploadImageFromMail();
		if($fileId) $r = $this->addImageToObject('community_article', $fileId);
		// メール自動返信
		if($fileId || $r){
			// 投稿成功
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_success' , $value );
		}else{
			// 投稿失敗
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_error' , $value );
		}
		return true;
	}
	
	/**
	 * コミュニティコメント画像投稿メールの場合の処理
	 */
	function community_comment_image_mail()
	{
		// コミュニティコメントの画像投稿
		$fileId = $this->uploadImageFromMail();
		if($fileId) $r = $this->addImageToObject('community_comment', $fileId);
		// メール自動返信
		if($fileId || $r){
			// 投稿成功
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_success' , $value );
		}else{
			// 投稿失敗
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_error' , $value );
		}
		return true;
	}
	
	/**
	 * メッセージ画像投稿メールの場合の処理
	 */
	function message_image_mail()
	{
		// メッセージの画像投稿
		$fileId = $this->uploadImageFromMail();
		if($fileId) $r = $this->addImageToObject('message', $fileId);
		// メール自動返信
		if($fileId || $r){
			// 投稿成功
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_success' , $value );
		}else{
			// 投稿失敗
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_error' , $value );
		}
		return true;
	}
	
	/**
	 * 伝言板画像投稿メールの場合の処理
	 */
	function bbs_image_mail()
	{
		// 伝言板の画像投稿
		$fileId = $this->uploadImageFromMail();
		if($fileId) $r = $this->addImageToObject('bbs', $fileId);
		// メール自動返信
		if($fileId || $r){
			// 投稿成功
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_success' , $value );
		}else{
			// 投稿失敗
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_image_error' , $value );
		}
		return true;
	}
	
	/**
	 * 日記記事動画投稿メールの場合の処理
	 */
	function blog_article_movie_mail()
	{
		// 日記記事の動画投稿
		$fileId = $this->uploadMovieFromMail();
		if($fileId) $r = $this->addMovieToObject('blog_article', $fileId);
		// メール自動返信
		if($fileId || $r){
			// 投稿成功
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_success' , $value );
		}else{
			// 投稿失敗
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_error' , $value );
		}
		return true;
	}
	
	/**
	 * 日記コメント動画投稿メールの場合の処理
	 */
	function blog_comment_movie_mail()
	{
		// 日記コメントの動画投稿
		$fileId = $this->uploadMovieFromMail();
		if($fileId) $r = $this->addMovieToObject('blog_comment', $fileId);
		// メール自動返信
		if($fileId || $r){
			// 投稿成功
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_success' , $value );
		}else{
			// 投稿失敗
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_error' , $value );
		}
		return true;
	}
	
	/**
	 * コミュニティ動画投稿メールの場合の処理
	 */
	function community_movie_mail()
	{
		// コミュニティの動画投稿
		$fileId = $this->uploadMovieFromMail();
		if($fileId) $r = $this->addMovieToObject('community', $fileId);
		// メール自動返信
		if($fileId || $r){
			// 投稿成功
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_success' , $value );
		}else{
			// 投稿失敗
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_error' , $value );
		}
		return true;
	}
	
	/**
	 * コミュニティトピック動画投稿メールの場合の処理
	 */
	function community_article_movie_mail()
	{
		// コミュニティトピックの動画投稿
		$fileId = $this->uploadMovieFromMail();
		if($fileId) $r = $this->addMovieToObject('community_article', $fileId);
		// メール自動返信
		if($fileId || $r){
			// 投稿成功
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_success' , $value );
		}else{
			// 投稿失敗
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_error' , $value );
		}
		return true;
	}
	
	/**
	 * コミュニティコメント動画投稿メールの場合の処理
	 */
	function community_comment_movie_mail()
	{
		// コミュニティコメントの動画投稿
		$fileId = $this->uploadMovieFromMail();
		if($fileId) $r = $this->addMovieToObject('community_comment', $fileId);
		// メール自動返信
		if($fileId || $r){
			// 投稿成功
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_success' , $value );
		}else{
			// 投稿失敗
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_error' , $value );
		}
		return true;
	}
	
	/**
	 * メッセージ動画投稿メールの場合の処理
	 */
	function message_movie_mail()
	{
		// メッセージの動画投稿
		$fileId = $this->uploadMovieFromMail();
		if($fileId) $r = $this->addMovieToObject('message', $fileId);
		// メール自動返信
		if($fileId || $r){
			// 投稿成功
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_success' , $value );
		}else{
			// 投稿失敗
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_error' , $value );
		}
		return true;
	}
	
	/**
	 * 伝言板動画投稿メールの場合の処理
	 */
	function bbs_movie_mail()
	{
		// 伝言板の動画投稿
		$fileId = $this->uploadMovieFromMail();
		if($fileId) $r = $this->addMovieToObject('bbs', $fileId);
		// メール自動返信
		if($fileId || $r){
			// 投稿成功
			$value = array(
				'user_hash'	=> $this->user_hash,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_success' , $value );
		}else{
			// 投稿失敗
			$value = array(
				'user_hash'		=> $this->user_hash,
				'error'			=> "",
				'image_mailaddress'	=> $this->mail_to,
			);
			$this->ms->sendOne($this->mail_from , 'user_movie_error' , $value );
		}
		return true;
	}
	
	/**
	 * メディアからの入会者の計測
	 */
	function media_access()
	{
		// メールハッシュがある場合のみ実行
		if($this->mail_hash){
			//status:0（アクセス済）を取得
			$param = array(
				'sql_select'	=> 'media_access_hash',
				'sql_from'	=> 'media_access',
				'sql_where'	=> 'media_access_status = 0 AND media_access_hash = ?',
				'sql_values'	=> array($this->mail_hash),
			);
			$um =& $this->backend->getManager('Util');
			$r = $um->dataQuery($param);
			if($r > 0){
				// media_accessを更新
				$media_access =& new Tv_MediaAccess($this->backend, 'media_access_hash', $this->mail_hash);
				$media_access->set('user_id', $this->user->get('user_id'));
				$media_access->set('media_access_status',1);
				$media_access->set('mail_time',date('Y-m-d H:i:s'));
				$res = $media_access->update();
				
				/* =============================================
				// 入会経路統計解析処理
				 ============================================= */
				$sm = $this->backend->getManager('Stats');
				// メール履歴をINSERT access:0, mail:1, regist:2, send:3, resign:4
				$sm->addStats('media', $media_access->get('media_id'), 0, 1);
		
				return $media_access->get('media_id');
			}
		}
		
		return 0;
	}
	
	/**
	 * メールデータの取得
	 */
	function getMailData()
	{
		//メールソースを標準入力から読み込み
		$source = "";
		if (php_sapi_name()=="cli") {
			while(!feof(STDIN)) {
				$source .= fread(STDIN, 4096);
			}
		} elseif (php_sapi_name()=="cgi") {
			$fp = fopen('php://stdin', 'r');//標準入力がない場合ストールするので注意
			while(!feof($fp)) {
				$source .= fread($fp, 4096);
			}
		}
		
		//メールソースの解析
		if($source == "") exit();
		
		//文字コード検出順番
		mb_detect_order("ASCII, JIS, UTF-8, EUC-JP, SJIS");
		
		//解析
		$decoder = new Mail_mimeDecode($source);
		$params['include_bodies'] = true; //ボディを解析する
		$params['decode_bodies']  = true; //ボディをコード変換する
		$params['decode_headers'] = true; //ヘッダをコード変換する
		$structure = $decoder->decode($params);
		
		//メールヘッダ情報の取得
		$headers['date'] = date("Y-m-d H:i:s", strtotime($structure->headers['date']));
		$headers['from'] = mb_convert_encoding(mb_decode_mimeheader($structure->headers['from']), mb_internal_encoding(), mb_detect_order());
		$headers['to'] = mb_convert_encoding(mb_decode_mimeheader($structure->headers['to']), mb_internal_encoding(), mb_detect_order());
		$headers['subject'] = mb_convert_encoding(mb_decode_mimeheader($structure->headers['subject']), mb_internal_encoding(), mb_detect_order());
		
		//メールボディの取得
		$body = $this->getMailBody($structure);
		
		// メールアドレス取得エラーの場合は処理終了
		if(!$headers['from'] || !$headers['to']) exit;
		
		// 送信者メールアドレスの分割
		if (mb_eregi('^.*<([^>]+)>', $headers['from'], $senderArray)) {
			$mail_from = trim($senderArray[1]);
		}else{
			$mail_from = trim($headers['from']);
		}
		
		// 携帯メールアドレスキャリアの取得
		$GLOBALS['EMOJIOBJ']->to_carrier = $GLOBALS['EMOJIOBJ']->get_mailaddress_carrier($mail_from);
		
		// PCを排除する場合
		if($this->config->get('mobile_only') && $GLOBALS['EMOJIOBJ']->to_carrier == 'PC'){ exit; }
		
		// 受信メールアドレスの分割
		if (mb_eregi('^.*<([^>]+)>', $headers['to'], $receiverArray)) {
			$mail_to = trim($receiverArray[1]);
		}else{
			$mail_to = trim($headers['to']);
		}
		
		// 受信メールアドレスのチェック
		$m = split('@',$mail_to);
		$mail_type = $m[0];
		
		// メールアカウントを分割
		$m = explode('_', $mail_type);
		// 先頭の文字列をメールタイプとして取り扱う
		$mail_type = $m[0];
		// メールアカウント配列から先頭の文字列を消去する
		array_shift($m);
		// 残りのメールアカウントには「_」が含まれている可能性があるので「_」で分割したら「_」で結合しておく
		$mail_hash = implode('_', $m);
		
		// メンバをセット
		$this->mail_source = $source;
		$this->mail_body = $body;
		$this->mail_headers = $headers;
		$this->mail_from = $mail_from;
		$this->mail_to = $mail_to;
		$this->mail_type = $mail_type;
		$this->mail_hash = $mail_hash;
		
		return true;
	}
	
	// 概要 メールボディの取得
	// 引数 $structure: Mail_mimeDecodeクラスで解析した構造
	// 戻値 抽出した本文、添付ファイル、画像の連想配列
	//	  $ary['body'] : メール本文（テキスト）
	//	  $ary['html'] : メール本文（HTML）
	//	  $ary['files'][n] : 添付ファイルまたは本文中(HTML)の画像ファイル nは0から連番
	//	  $ary['files'][n]['type'] : ファイルタイプ。image/jpeg など
	//	  $ary['files'][n]['name'] : ファイルのオリジナル名。xxx.jpg など 
	//	  $ary['files'][n]['body'] : ファイル本体。バイナリストリーム。
	function getMailBody($structure)
	{
		static $i = 0, $ary = array();
		
		if (strtolower($structure->ctype_primary) == "multipart") {
			//複数本文があるメール（本文を１件づつ処理する）
			foreach ($structure->parts as $part) {
				//タイプ
				if ($part->disposition=="attachment") {
					//添付ファイル
					$ary['files'][$i]['type'] = strtolower($part->ctype_primary)."/".strtolower($part->ctype_secondary);
					$ary['files'][$i]['name'] = $part->ctype_parameters['name'];
					$ary['files'][$i]['body'] = $part->body;
					$i++;
				} else {
					switch (strtolower($part->ctype_primary)) {
					case "image": //HTML本文中の画像
						$ary['files'][$i]['type'] = strtolower($part->ctype_primary)."/".strtolower($part->ctype_secondary);
						$ary['files'][$i]['name'] = $part->ctype_parameters['name'];
						$ary['files'][$i]['cid'] = trim($part->headers['content-id'], "<>");
						$ary['files'][$i]['body'] = $part->body;
						$i++;
						break;
					case "text": //テキスト本文の抽出
						if ($part->ctype_secondary=="plain") {
							$ary['body'] = trim(mb_convert_encoding($part->body, mb_internal_encoding(), mb_detect_order()));
						} else { //HTML本文
							$ary[$part->ctype_secondary] = trim(mb_convert_encoding($part->body, mb_internal_encoding(), mb_detect_order()));
						}
						break;
					case "multipart": //マルチパートの中にマルチパートがある場合（HTMLメール）
						getbody($part);
						break;
					}
				}
			}
		} elseif (strtolower($structure->ctype_primary) == "text") {
			//テキスト本文のみのメール
			//$ary['body'] = trim(mb_convert_encoding($structure->body, mb_internal_encoding(), mb_detect_order()));
			$ary['body'] = $structure->body;
		}
		
		return $ary;
	}
	
	// 機能 ファイルの保存
	// 引数 $file: ファイル名
	//	  $str: ファイル内容
	// 戻値 書き込んだファイルサイズ
	function save($file, $str)
	{
		$fp = fopen($file, "w");
		$size = fwrite($fp, $str);
		fclose($fp);
//		chmod($file, 0777);
		chmod($file, 0755);
		return $size;
	}
	
}
?>