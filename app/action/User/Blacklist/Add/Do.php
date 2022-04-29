<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���֥�å��ꥹ����Ͽ�¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBlacklistAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'black_list_deny_user_id' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'confirm' => array(
		),
		'submit' => array(
		),
		'back' => array(
		),
		
	);
}

/**
 * �桼���֥�å��ꥹ����Ͽ�¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlacklistAddDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->get('back') != '' || $this->af->validate() > 0){
			$this->af->setApp('user_id', $this->af->get('black_list_deny_user_id'));
			return 'user_profile_view';
		}
		
		//����BL��Ͽ�Ѥߤξ���᤹
		$user = $this->session->get('user');
		$user_id = $user['user_id'];
		$bl =& new Tv_BlackList($this->backend);
		$user = $bl->searchProp(
			array('black_list_id'),
			array(
				'black_list_user_id' => $user_id,
				'black_list_deny_user_id' => $this->af->get('black_list_deny_user_id'), 
				'black_list_status' => 1
			)
		);
		if($user[0] > 0){
			$this->ae->add(null, '', E_USER_BLACKLIST_DUPLICATE);
			return 'user_error';
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
		$timestamp = date('Y-m-d H:i:s');
		
		// ���� or ��Ͽ
		$bl =& new Tv_BlackList( $this->backend );
		$user = $this->session->get('user');
		// ����ѤߤΥǡ��������뤫��
		$blList =& $bl->searchProp(
			array('black_list_id'),
			array(
				'black_list_user_id' => $user['user_id'],
				'black_list_deny_user_id' => $this->af->get('black_list_deny_user_id'),
				'black_list_status' => 0
			)
		);
		if( $blList[0] > 0 ) $id = $blList[1][0]['black_list_id'];
		// �ǡ���������й���
		if($id){
			// ���֥������Ȥ򹹿�
			$bl =& new Tv_BlackList($this->backend, 'black_list_id', $id );
			// ���ơ�����
			$bl->set('black_list_status', 1);
			// ��������
			$bl->set('black_list_updated_time', $timestamp);
			// ����
			$bl->update();
		}
		// �ǡ������ʤ������Ͽ
		else{
			// ���֥������Ȥ���Ͽ
			$bl->importForm(OBJECT_IMPORT_IGNORE_NULL);
			// ���󤷤��桼��ID
			$bl->set('black_list_user_id', $user['user_id']);
			// ���ơ�����
			$bl->set('black_list_status', 1);
			// ��������
			$bl->set('black_list_created_time', $timestamp);
			// ��������
			$bl->set('black_list_updated_time', $timestamp);
			// ��Ͽ
			$bl->add();
		}
		return 'user_blacklist_add_done';
	}
}
?>