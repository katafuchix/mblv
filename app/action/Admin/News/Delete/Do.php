<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����˥塼������¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminNewsDeleteDo extends Tv_ActionForm
{
	/** @var    array   �ե���������� */
	var $form = array(
		'news_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �����˥塼������¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminNewsDeleteDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		return null;
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		$timestamp = date('Y-m-d H:i:s');
		
		// �˥塼������
		$o =& new Tv_News($this->backend, 'news_id', $this->af->get('news_id'));
		// ���ơ�����
		$o->set('news_status', 0);
		// ��������
		$o->set('news_updated_time', $timestamp);
		// �������
		$o->set('news_updated_time', $timestamp);
		// ����
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_news_list';
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_NEWS_DELETE_DONE);
		return 'admin_news_list';
	}
}
?>