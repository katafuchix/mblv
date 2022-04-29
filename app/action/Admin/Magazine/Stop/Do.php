<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������ޥ�������λ�¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminMagazineStopDo extends Tv_ActionForm
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
 * �������ޥ�������λ�¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMagazineStopDo extends Tv_ActionAdminOnly
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
		// ���ޥ�������λ
		$o =& new Tv_Magazine($this->backend,'magazine_id',$this->af->get('magazine_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('magazine_status',4);
		// ����
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_magazine_list';
		
		// ��å��ե����������
		$ctl = $this->backend->getController();
		$tmp_path = $ctl->getDirectory('tmp');
		$lock_path = "{$tmp_path}/.magazine" . $this->af->get('magazine_id');
		@touch($lock_path);
		@chmod($lock_path, 0777);
		
		$this->ae->add(null, '', I_ADMIN_MAGAZINE_STOP_DONE);
		return 'admin_magazine_list';
	}
}
?>