<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼�����Х��������¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserAvatarBuyDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
//		'avatar_id' => array(
//			'type'			=> VAR_TYPE_INT,
//			'form_type' 	=> FORM_TYPE_HIDDEN,
//		),
		'avatar_id_list' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type' 	=> FORM_TYPE_CHECKBOX,
		),
//		'buy' => array(
//			'name'		=> '��������',
//			'form_type' 	=> FORM_TYPE_SUBMIT,
//			'required'	=> true,
//		),
		'unset' => array(
			'form_type' 	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * �桼�����Х��������¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAvatarBuyDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼
		if($this->af->validate() > 0) return 'user_avatar_preview';
		
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
		// �����ॹ���������
		$timestamp = date('Y-m-d H:i:s');
		
		// ���å���󤫤�桼��������������
		$user = $this->session->get('user');
		// ���Х���ID���������
		$avatar_id_list = $this->af->get('avatar_id_list');
		
		// ���Х���ID�����򤵤�Ƥ��ʤ����
		if(!is_array($avatar_id_list)){
			$this->ae->add('errors', "���ʎގ��������򤷤Ƥ���������");
			return 'user_avatar_preview';
		}
		
		// �㤤ʪ�����ˤ��륢�Х���������������
		$total_point = 0;
		$avatar_point_list = array();
		foreach($avatar_id_list as $k => $v){
			// ���Х�����������
			$a = new Tv_Avatar($this->backend, 'avatar_id', $v);
			// �ݥ���Ȥ�׻�����
			$total_point += $a->get('avatar_point');
			// ���Х����ݥ������������
			$avatar_point_list[$k] = $a->get('avatar_point');
		}
		
		/* =============================================
		// �ݥ���ȥ����å�
		 ============================================= */
		$u =& new Tv_User($this->backend, 'user_id', $user['user_id']);
		if($u->get('user_point') < $total_point){
			$this->ae->add(null, '', E_USER_POINT_SHORTAGE);
			return 'user_avatar_preview';
		}
		
		/* =============================================
		// ���Х����������ν���
		 ============================================= */
		$pm = $this->backend->getManager('Point');
		foreach($avatar_id_list as $k => $v){
			$avatar_id = $v;
			/* =============================================
			// ���Х�������
			 ============================================= */
			$ua = new Tv_UserAvatar($this->backend);
			$ua->set('user_id', $user['user_id']);
			$ua->set('avatar_id', $avatar_id);
			$ua->set('user_avatar_status', 1);
			$ua->set('user_avatar_created_time', $timestamp);
			$ua->set('user_avatar_updated_time', $timestamp);
			$r = $ua->add();
			if(Ethna::isError($r)) return 'user_avatar_preview';
			// �桼�����Х���ID
			$uaid = $ua->getId();
			
			/* =============================================
			// ���Х����ۿ���λ�����꤬����Ƥ���С�-1
			 ============================================= */
			$a = new Tv_Avatar($this->backend, 'avatar_id', $avatar_id);
			$avatar_category_id = $a->get('avatar_category_id');
			if($a->get('avatar_stock_status')){
				$a->set('avatar_stock_num', $a->get('avatar_stock_num') -1 );
				$r = $a->update();
				if(Ethna::isError($r)) return 'user_avatar_preview';
			}
			
			/* =============================================
			// �ݥ�����ɲ÷Ͻ���
			 ============================================= */
			$point_type_search = $this->config->get('point_type_search');
			$param = array(
				'user_id'		=> $user['user_id'],
				'point'			=> 0 - $avatar_point_list[$k],
				'point_type'	=> $point_type_search['avatar'],
				'point_status'	=> 2,// ��ǧ�Ѥ�
				'user_sub_id'	=> $uaid,
				'point_sub_id'	=> $avatar_id,
				'point_memo'	=> $a->get('avatar_name'),
			);
			$pm->addPoint($param);
			
			
			/* =============================================
			// ���ɲý���
			 ============================================= */
			$s = & $this->backend->getManager('Stats');
			$s->addStats('avatar',$avatar_id, $avatar_category_id);
			
		}
		
		// ̵����λ����Х��å����򥯥ꥢ����
		$this->session->set('cart_avatar', '');
		
//		$this->ae->add(null, '', I_USER_AVATAR_BUY_DONE);
		return 'user_avatar_buy_done';
	}
}

?>
