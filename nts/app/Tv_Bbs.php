<?php
/**
 * Tv_Bbs.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 伝言板マネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_BbsManager extends Ethna_AppManager
{
	/**
	 * 指定したユーザの伝言板を削除する
	 * 
	 * @access public
	 * @param string $user_id ユーザID
	 */
	function status_off($user_id)
	{ 
		// 伝言板を非表示にする
		$b = new Tv_Bbs($this->backend);
		$b_list = $b->searchProp(
			array('bbs_id'),
			array(
				'to_user_id' => $user_id,
				'bbs_status' => 1
			)
		); 
		// bbs_statusを"0:削除"にする
		$now = date('Y-m-d H:i:s');
		if ($b_list[0] > 0) {
			foreach($b_list[1] as $v) {
				$b = new Tv_Bbs($this->backend, 'bbs_id', $v['bbs_id']);
				if (!$b->isValid()) return false;
				$b->set('bbs_status', 0);
				$b->set('bbs_updated_time',$now);
				$b->set('bbs_deleted_time',$now);
				$b->update();
			} 
		} 
	} 
	
	
	/**
	 * 指定したユーザの表示している分の伝言板ステータスを既読ステータスに変更する
	 * 
	 * @access public
	 * @param string $listview_data
	 */
	 function updateNoticeList($listview_data)
	 {
		 $user = $this->session->get('user');
		 
		// 不正なアクセス
		if (!$this->session->isValid() || $user['user_id'] == ''){
				return;
		}
		
		foreach($listview_data as $k=>$v){
				$o = &new Tv_Bbs($this->backend, 'bbs_id', $v['bbs_id']);
				// 未読のデータであれば既読に変更する
				if( $o->get('bbs_notice') == 1 && $user['user_id'] == $v['to_user_id'] ){
					$o->set('bbs_notice', 0);
					$o->update();
				}
		}
	 }
	 
}

/**
 * 伝言板オブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Bbs extends Ethna_AppObject
{
	/**
	 *  オブジェクトを追加する
	 *
	 *  @access public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function add()
	{
		$timestamp = date('Y-m-d H:i:s');
		$user = $this->session->get('user');
		// オブジェクトを追加する
		$this->set('from_user_id', $user['user_id']);
		$this->set('image_id', 0);
		$this->set('bbs_status', 1);
		$this->set('bbs_checked', 0);
		$this->set('bbs_created_time', $timestamp);
		$this->set('bbs_updated_time', $timestamp);
		parent::add();
		
		// bbs_hashを生成する
		$id = $this->getId();
//		$hash = md5($id);
		$um = $this->backend->getManager('Util');
		$hash = $um->getUniqId();
		$o = new Tv_Bbs($this->backend, 'bbs_id', $id);
		$o->set('bbs_hash', $hash);
		$o->update();
		// bbs_hashをセットする
		$this->set('bbs_hash', $hash);
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
		$this->set('bbs_updated_time', $timestamp);
		parent::update();
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
		$this->set('bbs_deleted_time', $timestamp);
		// 論理削除
		$this->set('bbs_status', 0);
		parent::update();
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
			$this->set('image_id', 0);
		}
		$this->update();
		return true;
	}
}
?>