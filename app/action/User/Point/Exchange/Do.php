<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���ݥ���ȴ���¹ԥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserPointExchangeDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'point'	=> array(
			'name'		=> '�򴹥ݥ���ȿ�',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'point_exchange_type'	=> array(
			'name'			=> '����',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
			'option'		=> 'Util, point_exchange',
			'required'		=> true,
		),
		// �����Х󥯶��
		'ebank_branch'	=> array(
			'name'			=> '��Ź',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, ebank_branch',
		),
		'ebank_account_number'	=> array(
			'name'			=> '�����ֹ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'ebank_account_name'	=> array(
			'name'			=> '����̾',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		// Edy
		'edy_number'	=> array(
			'name'			=> 'Edy�ֹ�',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		// �ݥ���ȥ���
	);
}

/**
 * �桼���ݥ���ȴ���¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserPointExchangeDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// �����Ƥζػ�
		if (Ethna_Util::isDuplicatePost()) {
			$this->ae->add('errors', "�����ƤǤ���");
			return 'user_index';
		}
		$err = false;
		$unit = 10;
		// �ݥ���ȥ���ξ��
		if($this->af->get('point_exchange_type') == 3) $unit = 20;
		// ����Υݥ���Ȥ�10�ޤ���20���ܿ��������å�����
		if($this->af->get('point') % $unit !=0){
			$this->ae->add('errors', W_USER_POINT . "��" . $unit . W_USER_POINT_UNIT . "ñ�̤����Ϥ��Ʋ�����");
			$err = true;
		}
		// �򴹺���ݥ���Ȥ���ã���Ƥ��뤫�����å�����
		$user = $this->session->get('user');
		$u = new Tv_User($this->backend, 'user_id', $user['user_id']);
		$point_exchange = $this->config->get('point_exchange');
		$point_rate = $point_exchange[$this->af->get('point_exchange_type')]['point_rate'];
		$this->point_rate = $point_rate;
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
		// �桼���������
		$user = $this->session->get('user');
		
		// �����ॹ�����
		$timestamp = date("Y-m-d H:i:s");
		
		// �ݥ���ȸ���
		if($this->af->get('point_exchange_type') == 1){
			// �����Х�
			$point_type = 201;
		}elseif($this->af->get('point_exchange_type') == 2){
			// Edy
			$point_type = 202;
		}elseif($this->af->get('point_exchange_type') == 3){
			// �ݥ���ȥ���
			$point_type = 203;
			// �ݥ���ȥ���ID�����
			$sess = $this->session->get('user');
			$p = new Tv_Pon($this->backend);
			$pon = $p->searchProp(
				array('pon_user_hash'),
				array('user_hash' => $sess['user_hash'], 'pon_status' => 3)
			);
			// ͭ���ʥ쥳���ɤ��ʤ����
			$pon_user_hash = $pon[1][0]['pon_user_hash'];
			if($pon[0] == 0 || !$pon_user_hash){
				$this->ae->add('errors', "�ݥ���ȥ���ID��������Ƥ���������");
				return 'user_point_home';
			}else{
				// �ȥ�󥶥��������Ͽ
				$pon = new Tv_PonPoint($this->backend);
				$pon_point = $this->af->get('point') * 3/20;
				$pon->set('pon_point', $pon_point);
				$pon->set('user_hash', $sess['user_hash']);
				$pon->set('pon_user_hash', $pon_user_hash);
				$pon->set('pon_point_status', 1);
				$pon->set('pon_point_created_time', date("Y-m-d H:i:s"));
				$pon->set('pon_point_start_time', date("Y-m-d H:i:s"));
				$pon->add();
				$pon_point_id = mysql_insert_id();
				if(!$pon_point_id){
					$this->ae->add('errors', "�ݥ���ȥ���ID��������Ƥ���������");
					return 'user_point_home';
				}
				// �ݥ���ȥ�����̿�
				$um = $this->backend->getmanager('Util');
				$this->af->set('pon_point', $pon_point);
				$this->af->set('pon_point_id', $pon_point_id);
				$r = $um->ponPointRequest();
				// �̿�����
				if(!$r){
					// ���顼����
					$pon = new Tv_PonPoint($this->backend, 'pon_point_id', $pon_point_id);
					$pon->set('pon_point_status', 5);
					$pon->set('pon_point_updated_time', date("Y-m-d H:i:s"));
					$pon->set('pon_point_end_time', date("Y-m-d H:i:s"));
					$pon->update();
					$this->ae->add('errors', "�ݥ���ȥ���ID��������Ƥ���������");
					return 'user_point_home';
				}
				// �̿�����
				else{
					// �ȥ�󥶥������λ
					$pon = new Tv_PonPoint($this->backend, 'pon_point_id', $pon_point_id);
					$pon->set('pon_point_tid', $r[0]);
					$pon->set('pon_point_pid', $r[1]);
					$pon->set('pon_point_status', 3);
					$pon->set('pon_point_updated_time', date("Y-m-d H:i:s"));
					$pon->set('pon_point_end_time', date("Y-m-d H:i:s"));
					$pon->update();
				}
			}
		}else{
			$this->ae->add('erros', "�����ʥݥ���ȸ򴹥����פǤ�");
			return 'user_error';
		}
		// �ݥ���ȥ쥳���ɽ���
		$pm = $this->backend->getManager('Point');
		$point = 0 - $this->af->get('point') - $this->point_rate;
		$param = array(
			'user_id'		=> $user['user_id'],
			'point'			=> $point,
			'point_type'	=> $point_type,
			'point_status'	=> 2,
		);
		$point_id = $pm->addPoint($param);
		// �򴹳ۻ���
		$price = $this->af->get('point') * $this->config->get('point_yen');
		$fee = $this->point_rate * $this->config->get('point_yen');
		
		// �ݥ���ȸ򴹿�����Ͽ
		$o =& new Tv_PointExchange($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('point_id', $point_id);
		$o->set('price', $price);
		$o->set('fee', $fee);
		$o->set('point_exchange_status', 1);
		$o->set('point_exchange_created_time', $timestamp);
		$r = $o->add();
		
		$this->ae->add('errors', "�ݥ���ȸ򴹿������������ޤ���");
		return 'user_point_exchange_done';
	}
}

?>
