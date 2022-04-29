<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ��ӥ塼����¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcReviewDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'review_id' => array(
			'form_type'	 => FORM_TYPE_HIDDEN,
			'type'		  => VAR_TYPE_INT,
			'required'	  => true,
			'name'		  => "review_id",
		),
		'item_id' => array(
			'form_type'	 => FORM_TYPE_TEXT,
			'type'		  => VAR_TYPE_INT,
//			'required'	  => true,
			'name'		  => "item_id",
		),
		'review_title' => array(
			'form_type'	 => FORM_TYPE_TEXT,
			'type'		  => VAR_TYPE_STRING,
			'required'	  => false,
			'name'		  => "�ڎˎގ��������Ď�",
			'min'		  => 1,
			'string_max_emoji'  => 100,
		),
		'review_body' => array(
			'form_type'	 => FORM_TYPE_TEXTAREA,
			'type'		  => VAR_TYPE_STRING,
			'required'	  => false,
			'name'		  => "�ڎˎގ�����ʸ",
			'min'		  => 1,
			'string_max_emoji'  => 2000,
		),
		'submit' => array(
			'name'	  => '���ϡ�����',
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_SUBMIT,
		),
		'back' => array(
			'name'	  => '����������',
			'type'	  => VAR_TYPE_STRING,
			'form_type' => FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * ��ӥ塼����¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcReviewDeleteDo extends Tv_ActionUserOnly
{
	function prepare()
	{
		if($this->af->get('back') || $this->af->validate() > 0) {
			return 'user_ec_review';
		}
		if (Ethna_Util::isDuplicatePost()) {
			return 'user_ec_review_delete_done';
		}
		return null;
	}
	function perform()
	{
		// ��ӥ塼�Խ�
		$reviewObject =& new Tv_Review($this->backend,'review_id',$this->af->get('review_id'));
		$reviewObject->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$reviewObject->set('review_status',0);
		$reviewObject->set('review_updated_time',date('Y-m-d H:i:s'));
		$reviewObject->set('review_deleted_time',date('Y-m-d H:i:s'));
		// ����
		$r = $reviewObject->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'user_ec_review_delete';
		
		// View���ֵѤ������
		return 'user_ec_review_delete_done';
	}
}
?>