<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���ݥ���ȴ����ǧ���������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserPointExchangeConfirm extends Tv_Form_UserPointExchangeDo
{
}

/**
 * �桼���ݥ���ȴ����ǧ���������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserPointExchangeConfirm extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		$err = false;
		$unit = 10;
		// �ݥ���ȥ���ξ��
		if($this->af->get('point_exchange_type') == 3) $unit = 20;
		// ����Υݥ���Ȥ�10�ޤ���20���ܿ��������å�����
		if($this->af->get('point') % $unit !=0){
			$this->ae->add('errors', "�ݥ���Ȥ�" . $unit . "ptñ�̤����Ϥ��Ʋ�����");
			$err = true;
		}
		// �򴹺���ݥ���Ȥ���ã���Ƥ��뤫�����å�����
		$user = $this->session->get('user');
		$u = new Tv_User($this->backend, 'user_id', $user['user_id']);
		$point_exchange = $this->config->get('point_exchange');
		$point_rate = $point_exchange[$this->af->get('point_exchange_type')]['point_rate'];
		if($u->get('user_point') < $this->config->get('begin_point') + $point_rate){
			$this->ae->add('erros', "����ݥ���Ȥ��򴹺���ݥ���Ȥ���ã���Ƥ��ޤ���");
			$err = true;
		}
		if($this->af->get('point') < $this->config->get('begin_point')){
			$this->ae->add('erros', "���ϥݥ���Ȥ��򴹺���ݥ���Ȥ���ã���Ƥ��ޤ���");
			$err = true;
		}
		if($u->get('user_point') < $this->af->get('point') + $point_rate){
			$this->ae->add('erros', "�򴹥ݥ���Ȥ���­���Ƥ��ޤ�");
			$err = true;
		}
		// �ե������ͤγ�ǧ
		if($err){
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
		$hidden_vars = $this->af->getHiddenVars(null, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		return 'user_point_exchange_confirm';
	}
}

?>
