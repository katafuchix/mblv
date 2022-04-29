<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ������ӥ塼����¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcReviewDeleteDo extends Tv_ActionForm
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
 * ������ӥ塼����¹Խ�����������󥯥饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcReviewDeleteDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_ec_review_list';
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
		// ��ӥ塼�����ʪ��������ʤ�
		$reviewObject =& new Tv_Review($this->backend,'review_id',$this->af->get('review_id'));
		$reviewObject->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$reviewObject->set('review_status',0);
		$reviewObject->set('review_deleted_time',date('Y-m-d H:i:s'));
		// ����
		$r = $reviewObject->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_ec_review_list';
		
		// �ե������ͤΥ��ꥢ
		$this->af->clearFormVars();
		$this->ae->add(null, '', I_ADMIN_REVIEW_DELETE_DONE);
		
		return 'admin_ec_review_list';
	}
}
?>