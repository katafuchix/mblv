<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���֥�å��ꥹ�Ⱥ���¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBlacklistDeleteDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'black_list_deny_user_id' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'delete' => array(
		),
		'back' => array(
		),
	);
}
/**
 * �桼���֥�å��ꥹ�Ⱥ���¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBlacklistDeleteDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if( $this->af->get('back') ) {
			return 'user_blacklist_list';
		}
		if( $this->af->validate() > 0 ) {
			return  'user_blacklist_delete_confirm';
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
		
		// ��ʬ�Υ桼��ID
		$user = $this->session->get('user');
		// ���Υ桼��ID
		$deny_user_id = $this->af->get('black_list_deny_user_id');
		
		// black_list.id�����
		$bl =& new Tv_BlackList( $this->backend );
		$blList =& $bl->searchProp(
			array('black_list_id'),
			array(
				'black_list_user_id' => $user['user_id'],
				'black_list_deny_user_id' => $deny_user_id,
			)
		);
		if( $blList[0] > 0 ) $id = $blList[1][0]['black_list_id'];
		
		// black_list.status��0�˹���
		$bl =& new Tv_BlackList($this->backend, 'black_list_id', $id);
		if( $bl->isValid() ){
			$bl->set('black_list_status', 0);
			$bl->set('black_list_updated_time', $timestamp);
			$bl->set('black_list_deleted_time', $timestamp);
			$bl->update();
		}
		$this->ae->add(null, '', I_USER_BLACKLIST_DELETE_DONE);
		
		return 'user_blacklist_delete_done';
	}
}
?>