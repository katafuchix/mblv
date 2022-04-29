<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������ޥ�����¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminMagazineDeleteDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'magazine_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �������ޥ�����¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMagazineDeleteDo extends Tv_ActionAdminOnly
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
		// ���ޥ������ʪ��������ʤ�
		$magazineObject =& new Tv_Magazine($this->backend,'magazine_id',$this->af->get('magazine_id'));
		$magazineObject->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$magazineObject->set('magazine_status',0);
		// ����
		$r = $magazineObject->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_magazine_list';
		
		$this->ae->add(null, '', I_ADMIN_MAGAZINE_DELETE_DONE);
		
		return 'admin_magazine_list';
	}
}
?>