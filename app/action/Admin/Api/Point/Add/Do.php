<?php
/**
 * Back.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ����API�ݥ�����ɲü¹Խ������������ե����९�饹
 *
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminPointBack extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var    array   �ե���������� */
	var $form = array(
		'code' => array(
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
		),
	);
}

/**
 * ����API�ݥ�����ɲü¹Խ������������¹ԥ��饹
 *
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminPointAddDo extends Tv_ActionAdmin
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼�ξ��
		if($this->af->validate() > 0) return false;
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
		// �ݥ���ȥХå�����������
		$buf = "";
		$buf.= "REQUEST_URI		: {$_SERVER['REQUEST_URI']}\n";
		$buf.= "REMOTE_ADDR		: {$_SERVER['REMOTE_ADDR']}\n";
		$buf.= "HTTP_USER_AGENT	: {$_SERVER['HTTP_USER_AGENT']}\n";
		
		$o = & new Tv_Log($this->backend);
		$o->set('log_type','pointback_log');
		$o->set('log_body',$buf);
		$o->set('log_created_time',date('Y-m-d H:i:s'));
		$o->add();
		
		$um = $this->backend->getManager('Util');
		$pm = $this->backend->getManager('Point');
		
		//�������ץ꤫��Υѥ�᡼����uaid(user_ad_id)�פ򸵤˾������
		$ac = new Tv_AdCode($this->backend, array('ad_code_param', 'ad_code_status'), array($this->af->get('code'), 1));
		// uaid�������Ǥ��ʤ����Ͻ�λ
		if(!array_key_exists($ac->get('ad_code_uaid_param'), $_REQUEST)) exit();
		// ���ơ����������꤬������
		if($ac->get('ad_code_status_param') != ""){
			// ���ơ������������Ǥ��ʤ����Ͻ�λ
			 if(!array_key_exists($ac->get('ad_code_status_param'), $_REQUEST)) exit();
			$status = $_REQUEST[$ac->get('ad_code_status_param')];
			// �����������ơ��������������륹�ơ������Ȱۤʤ���Ͻ�λ
			 if($status != $ac->get('ad_code_status_param_receive')) exit();
		}
		// ���꤬�ʤ����Ϥ��٤Ƽ�������
		// ñ�����꤬������
		if($ac->get('ad_code_price_param')){
			 $price = $_REQUEST[$ac->get('ad_code_price_param')];
		}
		
		// uaid�����
		$uaid = $_REQUEST[$ac->get('ad_code_uaid_param')];
		$o =& new Tv_UserAd($this->backend,'user_ad_id',$uaid);
		$user_id = $o->get('user_id');
		$ad_id = $o->get('ad_id');
		$user_ad_status = $o->get('user_ad_status');
		
		// user_ad_status��̤��ǧ��1�ˤǤʤ����Ͻ�λ
		if($user_ad_status != 1) exit();
		
		//ad_id������Ϳ����ݥ���Ȥ��������
		$o =& new Tv_Ad($this->backend,'ad_id',$ad_id);
		$ad_type = $o->get('ad_type');
		$ad_name = $o->get('ad_name');
// �����Τ��ᡢ���곰�Υݥ���ȥ����פξ��ϡ�������󤬽񤭴������Ƥ��ޤä���ǽ�����⤤���ᡢ�������³����
//		if($ad_type == 1) exit();//ad.ad_type 1:��󥯥�å� 2:��Ͽ 3:��Ψ
		$point_type_search = $this->config->get('point_type_search');
		// ��ʬ�Υݥ���ȷ׻�
		if($o->get('ad_point_type') == 1){
			// ����ݥ�������ξ��
			$ad_point = $o->get('ad_point');
			$point_type = $point_type_search['ad_regist'];
		}else{
			// �������ξ��
			$ad_point = floor($price * $o->get('ad_point_percent')/100 * $this->config->get('point_price_rates'));// �ݥ����<=>�ߥ졼��
			$point_type = $point_type_search['ad_buy'];
		}
		
		/* =============================================
		// ���������
		 ============================================= */
		$o =& new Tv_UserAd($this->backend, 'user_ad_id', $uaid);
		$o->set('user_ad_status', 2);
		$o->set('user_ad_updated_time', date('Y-m-d H:i:s'));
		$r = $o->update();
		if(Ethna::isError($r)){
			// �᡼������
			exit();
		};
		
		/* =============================================
		// �����ۿ���λ�����꤬����Ƥ���С�-1
		 ============================================= */
		$a = new Tv_Ad($this->backend, 'ad_id', $ad_id);
		if($a->get('ad_stock_status')){
			$a->set('ad_stock_num', $a->get('ad_stock_num') -1 );
			$r = $a->update();
			// ���顼����ϹԤ�ʤ�
		}
		
		/* =============================================
		// �ݥ�����ɲ÷Ͻ���
		 ============================================= */
		$param = array(
			'user_id'		=> $user_id,
			'point'			=> $ad_point,
			'point_type'	=> $point_type,
			'point_status'	=> 2,// ��ǧ�Ѥ�
			'user_sub_id'	=> $uaid,
			'point_sub_id'	=> $ad_id,
			'point_memo'	=> $ad_name,
		);
		$pm->addPoint($param);
		
		/* =============================================
		// �������ײ��Ͻ���
		 ============================================= */
		$sm = $this->backend->getManager('Stats');
		// ��Ͽ�����INSERT
		$sm->addStats('ad', $ad_id, 0, 3);
		
		// ���̤�ǧ
		print "OK";
		exit();
	}
}
?>