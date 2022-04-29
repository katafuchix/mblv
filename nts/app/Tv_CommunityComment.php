<?php
/**
 * Tv_CommunityComment.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���ߥ�˥ƥ������ȥޥ͡�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_CommunityCommentManager extends Ethna_AppManager
{
	/**
	 * ���ߥ�˥ƥ������Ȥ�������
	 * 
	 * @access public
	 * @param string $communityCommentId ������륳�ߥ�˥ƥ������Ȥ�ID
	 */
	function delete($communityCommentId)
	{
		$communityComment=& new Tv_CommunityComment(
			$this->backend,
			'community_comment_id',
			$communityCommentId
		);
		if(!$communityComment->isValid()){
			return Ethna::raiseError('�����Ȥ�¸�ߤ��ޤ���', E_COMMUNITY_COMMENT_NOT_FOUND);
		}
		$communityComment->set('community_comment_status', 0);
		$communityComment->set('community_comment_deleted_time', date('Y-m-d H:i:s'));
		$communityComment->update();
	}
	
	/**
	 * ���ꤷ���桼���Υ��ߥ�˥ƥ������Ȥ�������
	 * 
	 * @access public
	 * @param string $user_id �桼��ID
	 */
	function status_off($user_id)
	{ 
		// ��������ɽ���ˤ���
		$cc = new Tv_CommunityComment($this->backend);
		$cc_list = $cc->searchProp(
			array('community_comment_id'),
			array(
				'user_id' => $user_id,
				'community_comment_status' => 1
			)
		); 
		// community_comment_status��"0:���"�ˤ���
		$now = date('Y-m-d H:i:s');
		if ($cc_list[0] > 0) {
			foreach($cc_list[1] as $v) {
				$cc = new Tv_CommunityComment($this->backend, 'community_comment_id', $v['community_comment_id']);
				if (!$cc->isValid()) return false;
				$cc->set('community_comment_status', 0);
				$cc->set('community_comment_updated_time',$now);
				$cc->set('community_comment_deleted_time',$now);
				$cc->update();
				
				// community_article�Υ����ȿ��򸺻�����
				$ca = new Tv_CommunityArticle($this->backend, 'community_article_id', $cc->get('community_article_id'));
				$ca->set('community_article_comment_num', $ca->get('community_article_comment_num')-1);
				$ca->set('community_article_updated_time',$now);
				$ca->update();
			} 
		} 
	} 
}

/**
 * ���ߥ�˥ƥ������ȥ��֥�������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_CommunityComment extends Ethna_AppObject
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
		// ���֥��������ɲ�
		$this->set('user_id', $user['user_id']);
		$this->set('community_comment_status', 1);
		$this->set('community_comment_checked', 0);
		$this->set('image_id', 0);
		$this->set('community_comment_created_time', $timestamp);
		$this->set('community_comment_updated_time',  $timestamp);
		parent::add();
		
		// community_comment_hash����������
		$id = $this->getId();
//		$hash = md5($id);
		$um = $this->backend->getManager('Util');
		$hash = $um->getUniqId();
		$o = new Tv_CommunityComment($this->backend, 'community_comment_id', $id);
		$o->set('community_comment_hash', $hash);
		$o->update();
		// community_comment_hash�򥻥åȤ���
		$this->set('community_comment_hash', $hash);
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
		$this->set('community_comment_updated_time', $timestamp);
		parent::update();
	}
	
	/**
	 *  �����Ȥ������������
	 *
	 *  @access public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function delete()
	{
		// �ȥԥå��Υ����ȿ��򸺤餹
		$article =& new Tv_CommunityArticle($this->backend, 'community_article_id', $this->get('community_article_id'));
		$article->set('community_article_comment_num', $article->get('community_article_comment_num') - 1);
		$article->update();
		
		$timestamp = date('Y-m-d H:i:s');
		// ������������¸����
		$this->set('community_comment_deleted_time', $timestamp);
		// �������
		$this->set('community_comment_status', 0);
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
		$this->delete();
		
		return parent::remove();
	}
}
?>