<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ������ӥ塼�Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcReviewEdit extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ�����#v�饰�����ȣ�ե饰 */
	var $use_validator_plugin = false;
	/** @var	array   �ե���������� */
	var $form = array(
		'review_id' => array(
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),

	);
}
/**
 * ������ӥ塼�Խ���������󥯥饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcReviewEdit extends Tv_ActionAdminOnly
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
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function perform()
	{
		// ��ӥ塼�������
		$o =& new Tv_Review($this->backend, 'review_id', $this->af->get('review_id'));
		$o->exportForm();
		return 'admin_ec_review_edit';
	}
}
?>