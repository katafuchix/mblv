<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザメールアドレス変更アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserConfigMailEdit extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_hash' => array(
			'required' => true,
			'form_type' => FORM_TYPE_HIDDEN,
			'type' => VAR_TYPE_STRING,
		),
	);
}
/**
 * ユーザメールアドレス変更アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserConfigMailEdit extends Tv_ActionUserOnly
{
	function prepare()
	{
		return null;
	}
	
	function perform()
	{
		
		/*/DB
		$userObject =& new Tv_User($this->backend,'user_hash',$this->af->get('user_hash'));
		$user_hash = $userObject->get('user_hash');
		//$userObject->exportForm();
		
		//受け取ったuser_hashのユーザーが、user_status:２で、user_uid:NOT NULLで、DBにいることを確認。
		$row = $userObject->searchProp(
			array('user_id'),
			array(
				'user_hash' => $user_hash,
				'user_status' => 2,
				'user_uid' => new Ethna_AppSearchObject(NULL, OBJECT_CONDITION_NE)
			)
		);
		
		$this->af->set('user_hash',$this->af->get('user_hash'));*/
		return 'user_config_mail_edit';
	}
}

?>
