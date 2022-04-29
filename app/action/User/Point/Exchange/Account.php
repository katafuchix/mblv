<?php
/**
 * Account.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���ݥ���ȴ��⥢������ȥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserPointExchangeAccount extends Tv_ActionForm
{
	var $form = array(
		'point_exchange_type'	=> array(
			'name'			=> '����',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'required'		=> true,
		),
	);
}

/**
 * �桼���ݥ���ȴ��⥢������ȥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserPointExchangeAccount extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ����
		if($this->af->validate() > 0) return 'user_point_exchange';
		
		// �򴹺���ݥ���Ȥ���ã���Ƥ��뤫�����å�����
		$user = $this->session->get('user');
		$u = new Tv_User($this->backend, 'user_id', $user['user_id']);
		$point_exchange = $this->config->get('point_exchange');
		$point_rate = $point_exchange[$this->af->get('point_exchange_type')]['point_rate'];
		if($u->get('user_point') < $this->config->get('begin_point') + $point_rate){
			$this->ae->add('erros', "�򴹺���ݥ���Ȥ���ã���Ƥ��ޤ���");
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
		switch($this->af->get('point_exchange_type'))
		{
			case 1: // �����Х󥯶��
				return 'user_point_exchange_account_ebank';
				break;
			case 2: // Edy
				return 'user_point_exchange_account_edy';
				break;
			case 3: // �ݥ���ȥ���
				return 'user_point_exchange_account_pointon';
				break;
			default: // ����¾
				$this->ae->add('errors', '��������򤷤Ʋ�����');
				return 'user_point_exchange';
				break;
		}
	}
}

?>
