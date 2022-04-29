<?php
/**
 * Tv_Message.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * メッセージマネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_MessageManager extends Ethna_AppManager {
	
	/**
	 * 指定したユーザのメッセージを削除する
	 * 
	 * @access     public
	 * @param string $user_id ユーザID
	 */
	function statusOff($user_id)
	{ 
		// メッセージを非表示にする
		$m = new Tv_Message($this->backend);
		$m_list = $m->searchProp(
			array('message_id'),
			array(
				'to_user_id' => $user_id,
				'message_status' => 1
			)
		); 
		// statusを"0:削除"にする
		$now = date('Y-m-d H:i:s');
		if ($m_list[0] > 0) {
			foreach($m_list[1] as $v) {
				$m = new Tv_Message($this->backend, 'message_id', $v['message_id']);
				if (!$m->isValid()) return false;
				$m->set('message_status', 0);
				$m->set('message_updated_time',$now);
				$m->set('message_deleted_time',$now);
				$m->update();
			} 
		} 
	} 
	
	/**
	 * 退会したユーザのメッセージをすべて削除する
	 * 
	 * @access     public
	 * @param string $user_id ユーザID
	 */
	function statusOffResign($user_id)
	{ 
		// to_user_id
		// メッセージを非表示にする
		$m = new Tv_Message($this->backend);
		$m_list = $m->searchProp(
			array('message_id'),
			array(
				'to_user_id' => $user_id,
				'message_status' => 1
			)
		); 
		// statusを"0:削除"にする
		$now = date('Y-m-d H:i:s');
		if ($m_list[0] > 0) {
			foreach($m_list[1] as $v) {
				$m = new Tv_Message($this->backend, 'message_id', $v['message_id']);
				if (!$m->isValid()) return false;
				$m->set('message_status', 0);
				$m->set('message_updated_time',$now);
				$m->set('message_deleted_time',$now);
				$m->update();
			} 
		} 
		
		// from_user_id
		// メッセージを非表示にする
		$m = new Tv_Message($this->backend);
		$m_list = $m->searchProp(
			array('message_id'),
			array(
				'from_user_id' => $user_id,
				'message_status' => 1
			)
		); 
		// statusを"0:削除"にする
		$now = date('Y-m-d H:i:s');
		if ($m_list[0] > 0) {
			foreach($m_list[1] as $v) {
				$m = new Tv_Message($this->backend, 'message_id', $v['message_id']);
				if (!$m->isValid()) return false;
				$m->set('message_status', 0);
				$m->set('message_updated_time',$now);
				$m->set('message_deleted_time',$now);
				$m->update();
			} 
		} 
		
	} 
} 

/**
 * メッセージオブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Message extends Ethna_AppObject
{
	/**
	 *  オブジェクトを追加する
	 *
	 *  @access     public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function add()
	{
		$timestamp = date('Y-m-d H:i:s');
		$user = $this->session->get('user');
		// オブジェクトの追加
		$this->set('from_user_id', $user['user_id']);
		$this->set('message_status', 1);
		$this->set('message_checked', 0);
		$this->set('message_status_from', 2);
		$this->set('message_status_to', 1);
		$this->set('image_id', 0);
		$this->set('message_created_time', $timestamp);
		$this->set('message_updated_time', $timestamp);
		parent::add();
		
		// message_hashを生成する
		$id = $this->getId();
//		$hash = md5($id);
		$um = $this->backend->getManager('Util');
		$hash = $um->getUniqId();
		$o = new Tv_Message($this->backend, 'message_id', $id);
		$o->set('message_hash', $hash);
		$o->update();
		// message_hashをセットする
		$this->set('message_hash', $hash);
		
		//メッセージがあることをユーザーにEメールでお知らせ start
		$to_user =& new Tv_User($this->backend,'user_id',$this->af->get('to_user_id'));
		// メール受信設定を確認
		if($to_user->get('user_message_2_status')){
			$to_user_hash = $to_user->get('user_hash');
			$to_user_nickname = $to_user->get('user_nickname');
			$to_user_mailaddress = $to_user->get('user_mailaddress');
			
			$ms = new Tv_Mail($this->backend);
			$value = array (
				'from_user_nickname' => $user['user_nickname'],
				'to_user_nickname' => $to_user_nickname,
			);
			$ms->sendOne($to_user_mailaddress , 'user_got_message' , $value );
		}
		//メッセージがあることをユーザーにEメールでお知らせ end
		
		return true;
	}
	
	/**
	 *  オブジェクトを更新する
	 *
	 *  @access     public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function update()
	{
		$timestamp = date('Y-m-d H:i:s');
		// 更新日時を保存する
		$this->set('message_updated_time', $timestamp);
		parent::update();
	}
	
	/**
	 *  メッセージを論理削除する
	 *
	 *  @access     public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function delete()
	{
		$timestamp = date('Y-m-d H:i:s');
		// 更新日時を保存する
		$this->set('message_deleted_time', $timestamp);
		// 論理削除
		$this->set('message_status_from', 3);
		$this->set('message_status_to', 3);
		parent::update();
	}
	
	/**
	 *  画像を削除する
	 *
	 *  @access     public
	 *  @return boolean true: 正常終了, false: エラー
	 */
	function deleteImage()
	{
		// 画像を削除
		if($this->get('image_id')) {
			$im =& $this->backend->getManager('Image');
			$im->remove($this->get('image_id'),'message',$this->get('message_id'));
			
			$this->set('image_id', 0);
		}
		$this->update();
		
		return true;
	}
	
	/**
	 *  動画を削除する
	 *
	 *  @access     public
	 *  @return boolean true: 正常終了, false: エラー
	 */
	function deleteMovie()
	{
		// 動画を削除
		if($this->get('movie_id')) {
			$im =& $this->backend->getManager('Movie');
			$im->remove($this->get('movie_id'),'message',$this->get('message_id'));
			// 動画を論理削除
			$this->set('movie_id', 0);
		}
		$this->update();
		
		return true;
	}
	
	/**
	 *  オブジェクトを削除する
	 *
	 *  @access     public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function remove()
	{
		// 画像を削除
		$this->deleteImage();
		
		return parent::remove();
	}
} 
?>