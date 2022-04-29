<?php
/**
 * Tv_CommunityArticle.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���ߥ�˥ƥ��ȥԥå��ޥ͡�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_CommunityArticleManager extends Ethna_AppManager
{
	/**
	 * ���ߥ�˥ƥ��ȥԥå���������
	 * 
	 * @access public
	 * @param string $communityArticleId ������륳�ߥ�˥ƥ��ȥԥå���ID
	 */
	function delete($communityArticleId)
	{
		$communityArticle = &new Tv_CommunityArticle(
			$this->backend,
			'community_article_id',
			$communityArticleId
			);
		if (!$communityArticle->isValid()) {
			return Ethna::raiseError('�ȥԥå���¸�ߤ��ޤ���', E_COMMUNITY_ARTICLE_NOT_FOUND);
		} 
		$communityArticle->set('community_article_status', 0);
		$communityArticle->set('community_article_deleted_time', date('Y-m-d H:i:s'));
		$communityArticle->update();
	} 
	
	/**
	 * ���ꤷ���桼���Υ��ߥ�˥ƥ��ȥԥå���������
	 * 
	 * @access public
	 * @param string $user_id �桼��ID
	 */
	function status_off($user_id)
	{ 
		// ��������ɽ���ˤ���
		$ca = new Tv_CommunityArticle($this->backend);
		$ca_list = $ca->searchProp(
			array('community_article_id'),
			array(
				'user_id' => $user_id,
				'community_article_status' => 1
			)
		); 
		// community_article_status��"0:���"�ˤ���
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
 * ���ߥ�˥ƥ��ȥԥå����֥�������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_CommunityArticle extends Ethna_AppObject
{
	/**
	 *  ���֥������Ȥ��ɲä���
	 *
	 *  @access public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function add()
	{
		$timestamp = date('Y-m-d H:i:s');
		$user = $this->session->get('user');
		// ���֥������Ȥ��ɲ�
		$this->set('user_id', $user['user_id']);
		$this->set('community_article_status', 1);
		$this->set('community_article_checked', 0);
		$this->set('image_id', 0);
		$this->set('community_article_comment_num', 0);
		$this->set('community_article_created_time',  $timestamp);
		$this->set('community_article_updated_time',  $timestamp);
		$this->set('community_article_comment_time', $timestamp); 
		parent::add();
		
		// community_article_hash����������
		$id = $this->getId();
//		$hash = md5($id);
		$um = $this->backend->getManager('Util');
		$hash = $um->getUniqId();
		$o = new Tv_CommunityArticle($this->backend, 'community_article_id', $id);
		$o->set('community_article_hash', $hash);
		$o->update();
		// community_article_hash�򥻥åȤ���
		$this->set('community_article_hash', $hash);
	}
	
	/**
	 *  ���֥������Ȥ򹹿�����
	 *
	 *  @access public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function update()
	{
		$timestamp = date('Y-m-d H:i:s');
		// ������������¸����
		$this->set('community_article_updated_time', $timestamp);
		parent::update();
	}
	
	/**
	 *  �ȥԥå��������������
	 *
	 *  @access public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function delete()
	{
		$timestamp = date('Y-m-d H:i:s');
		// ������������¸����
		$this->set('community_article_deleted_time', $timestamp);
		// �������
		$this->set('community_article_status', 0);
		parent::update();
	}
	
	/**
	 *  ������������
	 *
	 *  @access public
	 *  @return boolean true: ���ｪλ, false: ���顼
	 */
	function deleteImage()
	{
		// ��������
		if($this->get('image_id')) {
			$im =& $this->backend->getManager('Image');
			$im->remove($this->get('image_id'));
			
			$this->set('image_id', 0);
		}
		$this->update();
		
		return true;
	}
	
	/**
	 *  ���֥������Ȥ�������
	 *
	 *  @access public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function remove()
	{
		// ��������
		$this->deleteImage();
		
		return parent::remove();
	}
} 
?>