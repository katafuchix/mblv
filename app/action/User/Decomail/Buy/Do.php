<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼���ǥ��᡼������¹ԥ��������ե�����
 * 	
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserDecomailBuyDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'decomail_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
	);
}

/**
 * �桼���ǥ��᡼������¹ԥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserDecomailBuyDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_decomail_buy';
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
		
		$decomail_id = $this->af->get('decomail_id');
		// �ǥ��᡼��������
		$d =& new Tv_Decomail($this->backend, 'decomail_id', $decomail_id);
		
		/* =============================================
		// �ۿ���λ������ǧ
		// �ۿ���λ������Ķ���Ƥ���ξ��
		 ============================================= */
		if ( $d->get('decomail_end_status') == 1 ) {
			if ( $d->get('decomail_end_time') <= date('Y-m-d H:i:s') ) {
				$this->ae->add(null, '', E_USER_DECOMAIL_OUT_OF_DATE);
				return 'user_error';
			}
		}
		
		$decomail_file_a = $d->get('decomail_file_a');
		
		// ��ʣ�ǥ��᡼�������ǧ
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> ' decomail_id ',
			'sql_from'		=> ' user_decomail ',
			'sql_where'		=> 'user_id = ? AND decomail_id  = ? AND user_decomail_status <> ?',
			'sql_values'	=> array( $user['user_id'], $decomail_id, 0 ),
		);
		$ud_list = $um->dataQuery($param);
		
		// ��������˳������ʤ���й���
		//if($ud_list[0] == 0){
		if(count($ud_list) == 0){
			/* =============================================
			// �ݥ���ȥ����å�
			 ============================================= */
			$u =& new Tv_User($this->backend, 'user_id', $user['user_id']);
			if($u->get('user_point') < $d->get('decomail_point')){
				$this->ae->add(null, '', E_USER_POINT_SHORTAGE);
				return 'user_decomail_buy';
			}
			
			/* =============================================
			// �ǥ��᡼�����
			 ============================================= */
			$ud = new Tv_UserDecomail($this->backend);
			$ud->set('user_id', $user['user_id']);
			$ud->set('decomail_id', $decomail_id);
			$ud->set('user_decomail_status', 1);
			$ud->set('user_decomail_created_time', $timestamp);
			$ud->set('user_decomail_updated_time', $timestamp);
			$r = $ud->add();
			if(Ethna::isError($r)) return 'user_decomail_buy';
			// �桼���ǥ��᡼��ID
			$udid = $ud->getId();
			
			/* =============================================
			// �ǥ��᡼���ۿ���λ�����꤬����Ƥ���С�-1
			 ============================================= */
			$d = new Tv_Decomail($this->backend, 'decomail_id', $decomail_id);
			$decomail_category_id = $d->get('decomail_category_id');
			if($d->get('decomail_stock_status')){
				$d->set('decomail_stock_num', $d->get('decomail_stock_num') -1 );
				$r = $d->update();
				if(Ethna::isError($r)) return 'user_decomail_buy';
			}
			
			/* =============================================
			// �ݥ�����ɲ÷Ͻ���
			 ============================================= */
			$pm = $this->backend->getManager('Point');
			$point_type_search = $this->config->get('point_type_search');
			$param = array(
				'user_id'	=> $user['user_id'],
				'point'		=> 0 - $d->get('decomail_point'),
				'point_type'	=> $point_type_search['decomail'],
				'point_status'	=> 2,// ��ǧ�Ѥ�
				'user_sub_id'	=> $udid,
				'point_sub_id'	=> $decomail_id,
				'point_memo'	=> $d->get('decomail_name'),
			);
			$pm->addPoint($param);
			
			/* =============================================
			// ���ɲý���
			 ============================================= */
			$s = & $this->backend->getManager('Stats');
			$s->addStats('decomail',$decomail_id, $decomail_category_id);
		}
		
		// AU�ξ��
		if($GLOBALS['EMOJIOBJ']->carrier == 'AU'){
			// ��������ɥڡ�����ɽ��
			if(preg_match('/.*khm.*/i', $decomail_file_a, $match)){
				$this->ae->add(null, '', I_USER_DECOMAIL_BUY_DONE);
				return 'user_decomail_dl';
			}
			// ����ƥ�ĥǡ���������
			else{
				$file_url = $this->config->get('file_url');
				header("Location: {$file_url}decomail/{$decomail_file_a}");
			}
		}else{
			// ��������ɳ���
//			$user_url = $this->config->get('user_url');
//			$SESSID = $_REQUEST['SESSID'];
			//���������̾�λ���
			$action_name = 'user_file_get';
			$c =& $this->backend->getController();
			$form_name = $c->getActionFormName($action_name);
			$backend =& new Ethna_Backend($c);
			$backend->action_form =& new $form_name($c);
			$backend->af =& $backend->action_form;
			$backend->af->setFormVars();
			$backend->af->set('type', 'decomail');
			$backend->af->set('id', $decomail_id);
			$r = $backend->perform($action_name);
//			header("Location: f.php?type=decomail&id={$decomail_id}&SESSID={$SESSID}");
		}
	}
}
?>