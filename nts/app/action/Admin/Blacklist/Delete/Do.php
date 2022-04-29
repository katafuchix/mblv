<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����֥�å��ꥹ�Ⱥ���¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminBlacklistDeleteDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	/** @var	array   �ե���������� */
	var $form = array(
		'black_list_id' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * �����֥�å��ꥹ�Ⱥ���¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminBlacklistDeleteDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_blacklist_search';
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
		// ��å����������ʪ��������ʤ�
		$o =& new Tv_BlackList(
			$this->backend,
			'black_list_id',
			$this->af->get('black_list_id')
		);
		// ���
		$o->set('black_list_status', 0);
		$o->set('black_list_delete_time', date('Y-m-d H:i:s'));
		$o->update();
		
		return 'admin_blacklist_delete_done';
	}
}
?>