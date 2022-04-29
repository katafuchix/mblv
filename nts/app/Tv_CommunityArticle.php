<?php
/**
 * Tv_CommunityArticle.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * コミュニティトピックマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_CommunityArticleManager extends Ethna_AppManager
{
	/**
	 * コミュニティトピックを削除する
	 * 
	 * @access public
	 * @param string $communityArticleId 削除するコミュニティトピックのID
	 */
	function delete($communityArticleId)
	{
		$communityArticle = &new Tv_CommunityArticle(
			$this->backend,
			'community_article_id',
			$communityArticleId
			);
		if (!$communityArticle->isValid()) {
			return Ethna::raiseError('トピックが存在しません', E_COMMUNITY_ARTICLE_NOT_FOUND);
		} 
		$communityArticle->set('community_article_status', 0);
		$communityArticle->set('community_article_deleted_time', date('Y-m-d H:i:s'));
		$communityArticle->update();
	} 
	
	/**
	 * 指定したユーザのコミュニティトピックを削除する
	 * 
	 * @access public
	 * @param string $user_id ユーザID
	 */
	function status_off($user_id)
	{ 
		// 日記を非表示にする
		$ca = new Tv_CommunityArticle($this->backend);
		$ca_list = $ca->searchProp(
			array('community_article_id'),
			array(
				'user_id' => $user_id,
				'community_article_status' => 1
			)
		); 
		// community_article_statusを"0:削除"にする
		$now = date('Y-m-d H:i:s');
		if ($ca_list[0] > 0) {
			foreach($ca_list[1] as $v) {
				$ca = new Tv_CommunityArticle($this->backend, 'community_article_id', $v['community_article_id']);
				if (!$ca->isValid()) return false;
				$ca->set('community_article_status', 0);
				$ca->set('community_article_updated_time',$now);
				$ca->set('community_article_deleted_time',$now);
				$ca->update();
			} 
		} 
	} 
} 

/**
 * コミュニティトピックオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_CommunityArticle extends Ethna_AppObject
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
		// オブジェクトの追加
		$this->set('user_id', $user['user_id']);
		$this->set('community_article_status', 1);
		$this->set('community_article_checked', 0);
		$this->set('image_id', 0);
		$this->set('community_article_comment_num', 0);
		$this->set('community_article_created_time',  $timestamp);
		$this->set('community_article_updated_time',  $timestamp);
		$this->set('community_article_comment_time', $timestamp); 
		parent::add();
		
		// community_article_hashを生成する
		$id = $this->getId();
//		$hash = md5($id);
		$um = $this->backend->getManager('Util');
		$hash = $um->getUniqId();
		$o = new Tv_CommunityArticle($this->backend, 'community_article_id', $id);
		$o->set('community_article_hash', $hash);
		$o->update();
		// community_article_hashをセットする
		$this->set('community_article_hash', $hash);
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
		$this->set('community_article_updated_time', $timestamp);
		parent::update();
	}
	
	/**
	 *  トピックを論理削除する
	 *
	 *  @access public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function delete()
	{
		$timestamp = date('Y-m-d H:i:s');
		// 更新日時を保存する
		$this->set('community_article_deleted_time', $timestamp);
		// 論理削除
		$this->set('community_article_status', 0);
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
	
	/**
	 *  オブジェクトを削除する
	 *
	 *  @access public
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