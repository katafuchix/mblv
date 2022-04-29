<?php
/**
 * Csv.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * �����ݥ���Ⱦ�ǧCSV���åץ��ɥ��������ե����९�饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminPointCsv extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'csv' => array(
			'name'		=> 'CSV�ե�����',
			'type'		=> VAR_TYPE_FILE,
			'form_type'	=> FORM_TYPE_FILE,
		),
	);
}

/**
 * �����ݥ���Ⱦ�ǧCSV���åץ��ɰ������������¹ԥ��饹
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Action_AdminPointCsv extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
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
		// �ե�����Υ��åץ��ɤ����ä����
		if($this->af->get('csv')){
			$csv = $this->af->get('csv');
			$line = file($csv['tmp_name']);
			if(!is_array($line)){
				$this->ae->add('errors', "���ꤵ�줿�ե�����ˤϥ쥳���ɤ�����ޤ���");
				return 'admin_point_csv';
			}
			foreach($line as $v){
				if(!$v) continue;
				$param = explode(",", $v);
				$uaid = $param[0];
				$price = $param[1];
				
				// �桼��������������
				$o =& new Tv_UserAd($this->backend,'user_ad_id',$uaid);
				$user_id = $o->get('user_id');
				$ad_id = $o->get('ad_id');
				$user_ad_status = $o->get('user_ad_status');
				$user_ad_regist_time = $o->get('user_ad_regist_time');
				$user_ad_update_time = $o->get('user_ad_update_time');
				
				// user_ad_status��̤��ǧ��1�ˤǤʤ����ϼ���
				if($user_ad_status != 1){
					$this->ae->add('errors', $uaid . "�ϴ��˾�ǧ�Ѥߤ�����¾�Υ��ơ������Τ��᾵ǧ�Ǥ��ޤ���");
					continue;
				}
				
				//ad_id������Ϳ����ݥ���Ȥ��������
				$o =& new Tv_Ad($this->backend,'ad_id',$ad_id);
				$ad_type = $o->get('ad_type');
				//ad.ad_type 1:��󥯥�å� 2:��Ͽ
				if($ad_type == 1){
					$this->ae->add('errors', $uaid . "�ϥ�󥯥�å������פι���Τ��᾵ǧ�Ǥ��ޤ���");
					continue;
				}
				// ��ʬ�Υݥ���ȷ׻�
				if($o->get('ad_point_type') == 1){
					// ����ݥ�������ξ��
					$ad_point = $o->get('ad_point');
				}else{
					// �������ξ��
					$ad_point = $price * $o->get('ad_point_percent')/100 * 10;// �ݥ����<=>�ߥ졼��
				}
				
				//�桼���θ��߽�ͭ�ݥ���Ȥ����
				$o =& new Tv_User($this->backend,'user_id',$user_id);
				$user_point = $o->get('user_point');
				
				//������Ϳ����ݥ���Ȥȸ��ߤΥݥ���Ȥι�סʻĹ� point_balance
				$point_balance = intval(($ad_point) + ($user_point));
				
				//point�ʥݥ��������ˤ򹹿�
				$o =& new Tv_Point($this->backend, 'user_ad_id', $uaid);
				$o->set('point_status', 2);//��ǧ�Ѥߡ���ᤦ��
				$o->set('point', $ad_point);
				$o->set('point_balance', $point_balance);
				$o->set('point_created_time', date('Y-m-d H:i:s'));
				$r = $o->update();
				// ��Ͽ���顼�ξ��
				if(Ethna::isError($r)){
					$this->ae->add('errors', $uaid . "�ξ�ǧ�˼��Ԥ��ޤ���");
					continue;
					// �᡼������
//					exit();
				};

/*				//point�ʥݥ��������ˤ���Ͽ
				$o =& new Tv_Point($this->backend);
				$o->set('user_id', $user_id);
				$o->set('point', $ad_point);
				$o->set('point_type', 7);//��Ͽ���𡣷�ᤦ��
				$o->set('point_sub_id', $ad_id);
				$o->set('point_status', 2);//��ǧ�Ѥߡ���ᤦ��
				$o->set('point_balance', $point_balance);
				$o->set('point_regist_time', date('Y-m-d H:i:s'));
				$r = $o->add();
				// ��Ͽ���顼�ξ��
				if(Ethna::isError($r)){
					$this->ae->add('errors', $uaid . "�ξ�ǧ�˼��Ԥ��ޤ���");
					continue;
					// �᡼������
//					exit();
				};
*/				
				//user_ad�򹹿�
				$o =& new Tv_UserAd($this->backend, 'user_ad_id', $uaid);
				$o->set('user_ad_status', 2);
				$o->set('user_ad_update_time', date('Y-m-d H:i:s'));
				$r = $o->update();
				if(Ethna::isError($r)){
					$this->ae->add('errors', $uaid . "�ξ�ǧ�˼��Ԥ��ޤ���");
					continue;
					// �᡼������
//					exit();
				};
				
				//user.user_point�򹹿�
				$o =& new Tv_User($this->backend, 'user_id', $user_id);
				$o->set('user_point', $point_balance);
				$r = $o->update();
				if(Ethna::isError($r)){
					$this->ae->add('errors', $uaid . "�ξ�ǧ�˼��Ԥ��ޤ���");
					continue;
					// �᡼������
//					exit();
				};
				
				/* =============================================
				// �������ײ��Ͻ���
				 ============================================= */
				$sm = $this->backend->getManager('Stats');
				// ��Ͽ�����INSERT
				$sm->addStats('ad', $ad_id, 0, 3);
				
				$this->ae->add('errors', $uaid . "��ǧ���ޤ�����");
			}
		}
		return 'admin_point_csv';
	}
}
?>