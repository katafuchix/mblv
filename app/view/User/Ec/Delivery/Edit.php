<?php
/**
 * Edit.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������Խ����̥ӥ塼���饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_View_UserEcDeliveryEdit extends Tv_ListViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access     public
	 */
	function preforward()
	{
		$um =& $this->backend->getManager('Util');

		$usersess = $this->session->get('user');
		$user_id = $usersess['user_id'];
		$o = new Tv_User($this->backend,'user_id',$user_id);
		$user_hash = $o->get('user_hash');
		$o->exportForm();
		
		if ($o->get('user_name') == ""
			|| $o->get('user_name_kana') == ""
			|| $o->get('user_zipcode') == ""
			|| $o->get('region_id') == ""
			|| $o->get('user_address') == ""
			|| $o->get('user_phone') == "")
		{
			$this->af->setApp('delivery_insufficient', 1);
		}
		
		// ��ˡ���ID����������
		$um = $this->backend->getManager('Util');
		$rand_id = $um->getUniqId();
		
		//���᡼�륢�ɥ쥹�ѹ��ѥ��������
		$mail_account = $this->config->get('mail_account');
		$this->af->setApp('mailchange_account', $mail_account['mailchange']['account'] . '_' . $rand_id);
		$this->af->setApp('mailchange_domain', $this->config->get('mail_domain'));
			
		// �ݥ��Ȥ��줿�ǡ�����HIDDEN�ե�����Ȥ��ư����Ѥ�
		$hidden_vars = $this->af->getHiddenVars(null, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
	}
}
?>