<?php
/**
 * Tv_BlogComment.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������ȥޥ͡�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_BlogCommentManager extends Ethna_AppManager
{
	/**
	 * ���ꤷ���桼���Υ֥������Ȥ�������
	 * 
	 * @access     public
	 * @param string $user_id �桼��ID
	 */
	function statusOff($user_id)
	{ 
		// ���������Ȥ���ɽ���ˤ���
		$bc = new Tv_BlogComment($this->backend);
		$bc_list = $bc->searchProp(
			array('blog_comment_id'),
			array(
				'user_id' => $user_id,
				'blog_comment_status' => 1
			)
		); 
		// blog_comment_status��"0:���"�ˤ���
		$now = date('Y-m-d H:i:s');
		if ($bc_list[0] > 0) {
			foreach($bc_list[1] as $v) {
				$bc = new Tv_BlogComment($this->backend, 'blog_comment_id', $v['blog_comment_id']);
				if (!$bc->isValid()) return false;
				$bc->set('blog_comment_status', 0);
				$bc->set('blog_comment_updated_time',$now);
				$bc->set('blog_comment_deleted_time',$now);
				$bc->update();
				
				// blog_article�Υ����ȿ��򸺻�����
				$ba = new Tv_BlogArticle($this->backend, 'blog_article_id', $bc->get('blog_article_id'));
				$ba->set('blog_article_comment_num', $ba->get('blog_article_comment_num')-1);
				$ba->set('blog_article_updated_time',$now);
				$ba->update();
			} 
		} 
	} 
	
	/**
	 * ���ꤷ���桼����ɽ�����Ƥ���ʬ�Υ֥�������̤�ɥ��ơ���������ɥ��ơ��������ѹ�����
	 * 
	 * @access     public
	 * @param string $listview_data
	 */
	 function updateNoticeList($listview_data)
	 {
		 $user = $this->session->get('user');
		 
		// �����ʥ�������
		if (!$this->session->isValid() || $user['user_id'] == ''){
				return;
		}
		
		foreach($listview_data as $k=>$v){
				$o = &new Tv_BlogComment($this->backend, 'blog_comment_id', $v['blog_comment_id']);
				// ̤�ɤΥǡ����Ǥ���д��ɤ��ѹ�����
				if( $o->get('blog_comment_notice') == 1 && $user['user_id'] == $v['blog_article_user_id']){
					$o->set('blog_comment_notice', 0);
					$o->update();
				}
		}
	 }
} 

/**
 * ���������ȥ��֥�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_BlogComment extends Ethna_AppObject
{
	/**
	 *  ���֥������Ȥ��ɲä���
	 *
	 *  @access     public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function add()
	{
		$timestamp = date('Y-m-d H:i:s');
		$user = $this->session->get('user');
		// ���֥������Ȥ��ɲ�
		$this->set('user_id',$user['user_id']);
		$this->set('image_id', 0);
		$this->set('blog_comment_status', 1);
		$this->set('blog_comment_checked', 0);
		$this->set('blog_comment_created_time', $timestamp);
		$this->set('blog_comment_updated_time', $timestamp);
		parent::add();
		
		// blog_comment_hash����������
		$id = $this->getId();
//		$hash = md5($id);
		$um = $this->backend->getManager('Util');
		$hash = $um->getUniqId();
		$o = new Tv_BlogComment($this->backend, 'blog_comment_id', $id);
		$o->set('blog_comment_hash', $hash);
		$o->update();
		// blog_comment_hash�򥻥åȤ���
		$this->set('blog_comment_hash', $hash);
	}
	
	/**
	 *  ���֥������Ȥ򹹿�����
	 *
	 *  @access     public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function update()
	{
		$timestamp = date('Y-m-d H:i:s');
		// ������������¸����
		$this->set('blog_comment_updated_time', $timestamp);
		parent::update();
	}
	
	/**
	 *  ���֥������Ȥ������������
	 *
	 *  @access     public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function delete()
	{
		// �����Υ����ȿ��򸺤餹
		$article = new Tv_BlogArticle($this->backend, 'blog_article_id', $this->get('blog_article_id'));
		$article->set('blog_article_comment_num', $article->get('blog_article_comment_num') - 1);
		$article->update();
		
		$timestamp = date('Y-m-d H:i:s');
		// ������������¸����
		$this->set('blog_comment_deleted_time', $timestamp);
		// �������
		$this->set('blog_comment_status', 0);
		parent::update();
	}
	
	/**
	 *  ������������
	 *
	 *  @access     public
	 *  @return boolean true: ���ｪλ, false: ���顼
	 */
	function deleteImage()
	{
		// ��������
		if($this->get('image_id')) {
			$im =& $this->backend->getManager('Image');
			$im->remove($this->get('image_id'),'blog_comment',$this->get('blog_comment_id'));
			$this->set('image_id', 0);
		}
		$this->update();
		
		return true;
	}
	
	/**
	 *  ư���������
	 *
	 *  @access     public
	 *  @return boolean true: ���ｪλ, false: ���顼
	 */
	function deleteMovie()
	{
		// ư�����
		if($this->get('movie_id')) {
			$im =& $this->backend->getManager('Movie');
			$im->remove($this->get('movie_id'),'blog_comment',$this->get('blog_comment_id'));
			// ư����������
			$this->set('movie_id', 0);
		}
		$this->update();
		
		return true;
	}
	
	/**
	 *  ���֥������Ȥ�������
	 *
	 *  @access     public
	 *  @return mixed   0:���ｪλ Ethna_Error:���顼
	 */
	function remove()
	{
		$this->delete();
		
		return parent::remove();
	}
} 
?>