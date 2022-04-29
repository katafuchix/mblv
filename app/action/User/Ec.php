<?php
/**
 * Index.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �⡼��ȥåץڡ���ɽ�����������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEc extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'spg_go_on' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		'autologin' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * �⡼��ȥåץڡ���ɽ�����������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEc extends Tv_ActionUser
{

	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		//�㤤ʪ�������̤ǡ��㤤ʪ��³����פ򥯥�å��������
		if($this->af->get('spg_go_on')){
			//session����back_url�����٤�����åפȥ��ƥ���ˤ����
			if($back_url = $this->session->get('back_url')){
				$this->af->set('shop_id', $back_url['shop_id']);
				$this->af->set('item_category_id', $back_url['item_category_id']);
				//�⡼�륫�ƥ�����̤ؤ�ɤ�
				return 'user_ec_category';
			}
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
		$um =& $this->backend->getManager('Util');

		// ��ե��餬SNS_URL �ȥޥå�������Τߤ��󤿤�������¹Ԥ���
		// �� docomo �ʳ��ϥ�ե��������Ǥ���Τǡ���ե���ǿ���ʬ���������Ϥ��������Ѥ��Ƥ��
//		if ($um->get_host_name(getenv('HTTP_REFERER')) == $um->get_host_name(SNS_URL))

		// GET �ѥ�᡼����autologin �����äƤ�����Ϥ��󤿤�����������¹�
		if ($this->af->get('autologin'))
		{
			//���å���󤬤ʤ���缫ư������򤿤᤹
			if(!$this->session->get('user')){
				//����ü��UID�����
				$user_uid = $um->getXuid();
				$term = $um->GetTermInfo();
				//UID�����Ǥ��ʤ���Ўێ��ގ��ݲ��̤˥�����쥯��
				if(!$user_uid ){
					return 'user_ec';
				}
				//��������UID�ǡ����ơ�����ͭ���Υ桼��������table:user�ˤ��뤫��ǧ
				$user =& new Tv_User($this->backend, array(user_uid, user_status,), array($user_uid , 2,));
				// �桼���������ʤ�
				if(!$user->isValid()){
					return 'user_ec';
				}
				//���饤����Ȥ����������UID��DB����UID��Ʊ��
				if($user_uid  == $user->get('user_uid')){
					//�����Ďێ��ގ���ǧ��
					$userManager =& $this->backend->getManager('User');
					$userManager->login($user->get('user_mailaddress'), $user->get('user_password'));
					$this->ae->add(null,'',I_USER_LOGIN_DONE);
					return 'user_ec';
				}
				//���饤����Ȥ����������UID��DB����UID���ۤʤ�ΤǤ�ɤ�
				else{
					return 'user_ec';
				}
			}
		}
		//���å���󤬤�����TOP��
		else{
			return 'user_ec';
		}
		//TOP��
		return 'user_ec';
	}
}
?>