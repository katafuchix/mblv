<?php
/**
 * Tv_Community.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * コミュニティマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_CommunityManager extends Ethna_AppManager
{
	/**
	 * コミュニティを削除する
	 * 
	 * @access public
	 * @param string $communityId 削除するコミュニティのID
	 */
	function delete($communityId)
	{
		$community = &new Tv_Community(
			$this->backend,
			'community_id',
			$communityId
			);
		if (!$community->isValid()) {
			return Ethna::raiseError('コミュニティが存在しません', E_COMMUNITY_NOT_FOUND);
		} 
		$community->set('community_deleted_time', date('Y-m-d H:i:s'));
		$community->set('community_status', 0);
		$community->update();
	} 

	/**
	 * コミュニティの表示フラグをOFFにする
	 * 
	 * @access public
	 * @param string $communityId 表示フラグをOFFにするコミュニティのID
	 */
	function status_off($communityId)
	{
		$community = &new Tv_Community(
			$this->backend,
			'community_id',
			$communityId
			);
		if (!$community->isValid()) {
			return false;
		} 
		$community->set('community_status', 3);
		$community->update();
	} 
} 

/**
 * コミュニティオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Community extends Ethna_AppObject
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
		// オブジェクトの追加
		$this->set('community_status', 1);
		$this->set('community_checked', 0);
		$this->set('community_member_num', 1);
		$this->set('image_id', 0);
		$this->set('community_created_time', $timestamp);
		$this->set('community_updated_time', $timestamp);
		parent::add();
		
		// community_hashを生成
		$id = $this->getId();
//		$hash = md5($id);
		$um = $this->backend->getManager('Util');
		$hash = $um->getUniqId();
		$o = new Tv_Community($this->backend, 'community_id', $id);
		$o->set('community_hash', $hash);
		$o->update();
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
		$this->set('community_updated_time', $timestamp);
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
		// 更新日時を保存する
		$this->set('community_deleted_time', $timestamp);
		// 論理削除
		$this->set('community_status', 0);
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
