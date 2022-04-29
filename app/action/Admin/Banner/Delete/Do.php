<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �����Хʡ�����¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminBannerDeleteDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var    array   �ե���������� */
	var $form = array(
		'banner_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �����Хʡ�����¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminBannerDeleteDo extends Tv_ActionAdminOnly
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
		$timestamp = date("Y-m-d H:i:s");
		
		// �Хʡ�������
		$o = & new Tv_Banner($this->backend,'banner_id',$this->af->get('banner_id'));
		
		// ���ơ��������ѹ�
		$o->set('banner_status', 0);
		
		// �������
		$o->set('banner_deleted_time', $timestamp);
		
		// ���
		$r = $o->update();
		
		// ������顼�ξ��
		if (Ethna::isError($r)) return 'admin_banner_list';
		
		$this->ae->add(null, '', I_ADMIN_BANNER_DELETE_DONE);
		return 'admin_banner_list';
	}
}
?>