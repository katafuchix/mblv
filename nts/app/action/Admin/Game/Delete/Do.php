<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������������¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminGameDeleteDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'game_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �������������¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminGameDeleteDo extends Tv_ActionAdminOnly
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
		// ����������ʪ��������ʤ�
		$o =& new Tv_Game($this->backend, 'game_id', $this->af->get('game_id'));
		$o->set('game_status', 0);
		$o->set('game_updated_time',$timestamp);
		$o->set('game_deleted_time',$timestamp);
		// ����
		$r = $o->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_game_list';
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_GAME_DELETE_DONE);
		return 'admin_game_list';
	}
}
?>