<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ������ǥ�������¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminMediaDeleteDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'media_id' => array(
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
		),
	);
}

/**
 * ������ǥ�������¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMediaDeleteDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼�ξ��
		if ($this->af->validate() > 0) return 'admin_media_list';
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
		// ��ǥ��������ʪ��������ʤ�
		$o =& new Tv_Media($this->backend,'media_id',$this->af->get('media_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('media_status',0);
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_media_list';
		
		$this->ae->add(null, '', I_ADMIN_MEDIA_DELETE_DONE);
		
		return 'admin_media_list';
	}
}
?>