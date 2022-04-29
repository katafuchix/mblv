<?php
/**
 * Tv_BlogArticle.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ���������ޥ͡�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_BlogArticleManager extends Ethna_AppManager
{
	/**
	 * ���ꤷ���桼���Υ֥�������������
	 * 
	 * @access     public
	 * @param string $user_id �桼��ID
	 */
	function statusOff($user_id)
	{ 
		// ��������ɽ���ˤ���
		$ba = new Tv_BlogArticle($this->backend);
		$ba_list = $ba->searchProp(
			array('blog_article_id'),
			array(
				'user_id' => $user_id,
				'blog_article_status' => 1
			)
		); 
		// blog_article_status��"0:���"�ˤ���
		if ($ba_list[0] > 0) {
			foreach($ba_list[1] as $v) {
				$ba = new Tv_BlogArticle($this->backend, 'blog_article_id', $v['blog_article_id']);
				if (!$ba->isValid()) return false;
				$ba->set('blog_article_status', 0);
				$ba->update();
			} 
		} 
	} 
} 

/**
 * �����������֥�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_BlogArticle extends Ethna_AppObject
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
		$this->set('user_id', $user['user_id']);
		$this->set('blog_article_status', 1);
		$this->set('blog_article_checked', 0);
		$this->set('blog_article_comment_num', 0);
		$this->set('image_id', 0);
		$this->set('blog_article_created_time',  $timestamp);
		$this->set('blog_article_updated_time',  $timestamp);
		$this->set('blog_article_comment_time', $timestamp);
		parent::add();
		
		// blog_article_hash����������
		$id = $this->getId();
//		$hash = md5($id);
		$um = $this->backend->getManager('Util');
		$hash = $um->getUniqId();
		$o = new Tv_BlogArticle($this->backend, 'blog_article_id', $id);
		$o->set('blog_article_hash', $hash);
		$o->update();
		// blog_article_hash�򥻥åȤ���
		$this->set('blog_article_hash', $hash);
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
		$this->set('blog_article_updated_time', $timestamp);
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
		$timestamp = date('Y-m-d H:i:s');
		// �����������¸����
		$this->set('blog_article_deleted_time', $timestamp);
		// �������
		$this->set('blog_article_status', 0);
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
			$im->remove($this->get('image_id'),'blog_article',$this->get('blog_article_id'));
			// �������������
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
			$im->remove($this->get('movie_id'),'blog_article',$this->get('blog_article_id'));
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
		// ��������
		$this->deleteImage();
		
		return parent::remove();
	}
} 
?>