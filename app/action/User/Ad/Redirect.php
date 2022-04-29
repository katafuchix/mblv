<?php
/**
 * Redirect.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����������쥯�ȥ��������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserAdRedirect extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	/** @var    array   �ե���������� */
	var $form = array(
		'ad_id' => array(
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
		),
		'user_hash' => array(
			'type'		=> VAR_TYPE_STRING,
		),
		'no_check' => array(
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �桼�����������쥯�ȥ��������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
// ����ϳ�������⥢����������뤿�᥻�å����Ǥ�ǧ�ڤϲ������
//class Tv_Action_UserAdRedirect extends Tv_ActionUserOnly
class Tv_Action_UserAdRedirect extends Tv_ActionUser
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
		if($this->af->validate() > 0) return 'user_ad_list';
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
		$um = $this->backend->getManager('Util');
		$pm = $this->backend->getManager('Point');
		
		// ����ID����
		$ad_id = $this->af->get('ad_id');
		
		// �����ॹ���������
		$timestamp = date('Y-m-d H:i:s');
		
		/* =============================================
		// user_hash��������Ϥ�����ǧ��
		 ============================================= */
		if($user_hash = $this->af->get('user_hash')){
			// �桼��������������
			$o =& new Tv_User($this->backend,'user_hash',$user_hash);
			if($o->get('user_status') == 2){
				$user_id = $o->get('user_id');
			}
		}else{
			/* =============================================
			// ���å���󤫤�桼��������������
			 ============================================= */
			$user = $this->session->get('user');
			$user_id = $user['user_id'];
			$user_hash = $user['user_hash'];
			
//			/* =============================================
//			// �⤷�桼��ID���ʤ����ϥ����󤹤뤫���Τޤ޿ʤफ���򤵤���
//			 ============================================= */
//			if(!$user_id && !$this->af->get('no_check')){
//				return 'user_util_about-login';
//			}
			/* =============================================
			// ����Τ߽���
			 ============================================= */
//			if(!$this->af->get('no_check')){
			if($user_id){
				// �桼��������������
				$o =& new Tv_User($this->backend,'user_id',$user_id);
				$user_hash = $o->get('user_hash');
			}
		}
		
		/* =============================================
		// ����ǡ�������
		 ============================================= */
		$a =& new Tv_Ad($this->backend, 'ad_id', $this->af->get('ad_id'));
		$ad_name = $a->get('ad_name');
		$ad_point = $a->get('ad_point');
		$ad_code_id = $a->get('ad_code_id');
		
		/* =============================================
		// ������������ꥢ�̤�URL����������
		 ============================================= */
		if($GLOBALS['EMOJIOBJ']->carrier=='AU'){
			$ad_url = $a->get('ad_url_a');
		}elseif($GLOBALS['EMOJIOBJ']->carrier=='DOCOMO'){
			$ad_url = $a->get('ad_url_d');
		}elseif($GLOBALS['EMOJIOBJ']->carrier=='SOFTBANK'){
			$ad_url = $a->get('ad_url_s');
		}else{
			$this->ae->add(null, '', E_USER_AD_PC);
			return 'user_error';
		}
		// ����URL�����ξ��
		if(!$ad_url){
			$this->ae->add(null, '', E_USER_AD_MOBILE);
			return 'user_error';
		}
		
		/* =============================================
		// �����ۿ���λ����ǧ
		 ============================================= */
		if( $a->get('ad_stock_status') == 1 ){
			// �ۿ���λ������ã�������
			if( $a->get('ad_stock_num') == 0 ){
				$this->ae->add(null, '', E_ADMIN_AD_STOCK_OVER);
				return 'user_error';
			}
		}
		
		/* =============================================
		// �����ۿ�����������ǧ
		// �ۿ�������������Ƥ��ʤ����
		 ============================================= */
		if ( $a->get('ad_start_status') == 1 ) {
			if ( $a->get('ad_start_time') >= date('Y-m-d H:i:s') ) {
				$this->ae->add(null, '', E_USER_AD_NOT_START);
				return 'user_error';
			}
		}
		
		/* =============================================
		// �����ۿ���λ������ǧ
		// �ۿ���λ������Ķ���Ƥ���ξ��
		 ============================================= */
		if ( $a->get('ad_end_status') == 1 ) {
			if ( $a->get('ad_end_time') <= date('Y-m-d H:i:s') ) {
				$this->ae->add(null, '', E_USER_AD_OUT_OF_DATE);
				return 'user_error';
			}
		}
		
		/* =============================================
		// ����Τ߽���
		 ============================================= */
		if(!$this->af->get('no_check') && $user_id){
			/* =============================================
			// ����å�����ξ��
			 ============================================= */
			if($a->get('ad_type') == 1){
				/* =============================================
				// ��ʣ�����ǧ
				 ============================================= */
				$param = array(
					'sql_select'	=> ' user_ad_id ',
					'sql_from'		=> ' user_ad ',
					'sql_where'		=> 'user_id = ? AND ad_id  = ? AND user_ad_status <> ?',
					'sql_values'	=> array( $user_id, $ad_id, 0 ),
				);
				$ua_list = $um->dataQuery($param);
				
				/* =============================================
				// ������ɲ�
				 ============================================= */
				$ua =& new Tv_UserAd($this->backend);
				$ua->set('user_id', $user_id);
				$ua->set('ad_id', $ad_id);
				$ua->set('user_ad_status', 2); // ��ǧ�Ѥ�
				$ua->set('user_ad_created_time', $timestamp);
				$ua->set('user_ad_updated_time', $timestamp);
				$r = $ua->add();
				// �桼������ID
				$uaid = $ua->getId();
				
				// ��ʣ���ʤ����
				if(count($ua_list) == 0){
					/* =============================================
					// �����ۿ���λ�����꤬����Ƥ���С�-1
					 ============================================= */
					$a = new Tv_Ad($this->backend, 'ad_id', $ad_id);
					if($a->get('ad_stock_status')){
						$a->set('ad_stock_num', $a->get('ad_stock_num') -1 );
						$r = $a->update();
						if(Ethna::isError($r)) return 'user_ad_buy';
					}
					
					/* =============================================
					// �ݥ�����ɲ÷Ͻ���
					 ============================================= */
					$point_type_search = $this->config->get('point_type_search');
					$param = array(
						'user_id'	=> $user_id,
						'point'		=> $ad_point,
						'point_type'	=> $point_type_search['ad_click'],
						'point_status'	=> 2,// ��ǧ�Ѥ�
						'user_sub_id'	=> $uaid,
						'point_sub_id'	=> $ad_id,
						'point_memo'	=> $ad_name,
					);
					$pm->addPoint($param);
				}
			}
			// ����¾�������Ͽ����Ψ�ˤξ��
			else{
				/* =============================================
				// ������ɲ�
				 ============================================= */
				$ua =& new Tv_UserAd($this->backend);
				$ua->set('user_id', $user_id);
				$ua->set('ad_id', $ad_id);
				$ua->set('user_ad_status', 1); // ̤��ǧ
				$ua->set('user_ad_created_time', $timestamp);
				$ua->set('user_ad_updated_time', $timestamp);
				$r = $ua->add();
				// �桼������ID
				$uaid = $ua->getId();
				
				// ���μ����Ǥ��ۿ���������ȥ�����ϹԤ�ʤ�
				
				/* =============================================
				// �ݥ�����ɲ÷Ͻ���
				 ============================================= */
				$point_type_search = $this->config->get('point_type_search');
				// �ݥ���ȥ����פη���
				if($a->get('ad_type') == 2){
					$point_type = $point_type_search['ad_regist'];
				}elseif($a->get('ad_type') == 3){
					$point_type = $point_type_search['ad_buy'];
				}
				$param = array(
					'user_id'	=> $user_id,
					'point'		=> 0,// ���λ����Ǥ�0�ݥ����
					'point_type'	=> $point_type,// ��Ͽ����ޤ��Ϲ��㹭��
					'point_status'	=> 1,// ̤��ǧ
					'user_sub_id'	=> $uaid,
					'point_sub_id'	=> $ad_id,
					'point_memo'	=> $ad_name,
				);
				$pm->addPoint($param);
			}
		}
		
		/* =============================================
		// �������ײ��Ͻ���
		 ============================================= */
		$sm = $this->backend->getManager('Stats');
		// ����å������INSERT
		$sm->addStats('ad', $ad_id, 0, 2);
		
		/* =============================================
		// ASP���Ȥ˥�����쥯���Ѥ�URL����������
		 ============================================= */
		$ac = new Tv_AdCode($this->backend, 'ad_code_id', $ad_code_id);
//		$ad_url = $um->addUrlParam($ad_url, $ac->get('ad_code_send_param'), $user_hash);
		$ad_url = $um->addUrlParam($ad_url, $ac->get('ad_code_send_param'), $uaid);
		
		// �����������쥯��
		header('Location: ' . $ad_url);
		exit;
	}
}
?>