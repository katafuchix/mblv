<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
/**
 * ��ӥ塼��Ͽ�¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcReviewAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'review_id' => array(
			'form_type'	 => FORM_TYPE_HIDDEN,
			'type'		  => VAR_TYPE_INT,
			'required'	  => true,
			'name'		  => "review_id",
		),
		'review_title' => array(
			'form_type'	 => FORM_TYPE_TEXT,
			'type'		  => VAR_TYPE_STRING,
			'required'	  => true,
			'name'		  => "�ڎˎގ��������Ď�",
			'min'		  => 1,
			'string_max_emoji'  => 100,
		),
		'review_body' => array(
			'form_type'	 => FORM_TYPE_TEXTAREA,
			'type'		  => VAR_TYPE_STRING,
			'required'	  => true,
			'name'		  => "�ڎˎގ�����ʸ",
			'min'		  => 1,
			'string_max_emoji'  => 2000,
		),
		'review_hash' => array(
			'form_type'	 => FORM_TYPE_HIDDEN,
			'type'		  => VAR_TYPE_STRING,
			'required'	  => true,
			'name'		  => "",
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
 * ��ӥ塼��Ͽ�¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcReviewAddDo extends Tv_ActionUserOnly
{
	function authenticate()
	{
		return null;
	}
	
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		 // ���POST�ξ��
  		if(Ethna_Util::isDuplicatePost()) return 'user_error';
  
		if($this->af->get('back') || $this->af->validate() > 0) {
			return 'user_ec_review_add';
		}
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
		// ��ӥ塼�ǡ��������
		$o = & new Tv_Review($this->backend,
							array('review_id','review_status','review_hash'),
							array($this->af->get('review_id'),2,$this->af->get('review_hash'))
					);
		// �ǡ����������
		if($o->isValid()){
			// ��ӥ塼���󹹿�
			$values = array(
				'review_status'			=> 3,	// review_status 0:���,1:cron�Ԥ�,2:����Ԥ�,3:ͭ�� 
				'review_title' 			=> $this->af->get('review_title'),
				'review_body'  			=> $this->af->get('review_body'),
				'review_updated_time' 	=> date('Y-m-d H:i:s'),
			);
			// AppObject�˥��å�
			foreach($values as $k=>$v){
				$o->set($k,$v);
			}
			// ����
			$r = $o->update();
			// �������顼�ξ��
			if(Ethna::isError($r)) return "user_ec_review_add";
		}
		
		// View���ֵѤ������
		return 'user_ec_review_add_done';
	}
}
?>