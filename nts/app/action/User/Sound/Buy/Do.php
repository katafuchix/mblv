<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼��������ɹ����¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserSoundBuyDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'sound_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'name'		=> '�����ݎĎ�ID',
		),
	);
}

/**
 * �桼��������ɹ����¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserSoundBuyDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_sound_buy';
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
		
		$sound_id = $this->af->get('sound_id');
		$us =& new Tv_UserSound($this->backend);
		// ��ʣ������ɹ�����ǧ
		$us_list =& $us->searchProp(
			array('sound_id'),
			array(
				'user_id'			=> $user['user_id'],
				'sound_id'			=> $sound_id,
				'user_sound_status'		=> new Ethna_AppSearchObject(0, OBJECT_CONDITION_NE)
			)
		);
		// ��������˳������ʤ���й���
		if($us_list[0] == 0){
			/* =============================================
			// �ݥ���ȥ����å�
			 ============================================= */
			$s =& new Tv_Sound($this->backend, 'sound_id', $sound_id);
			$sound_category_id = $s->get('sound_category_id');
			$u =& new Tv_User($this->backend, 'user_id', $user['user_id']);
			if($u->get('user_point') < $s->get('sound_point')){
				$this->ae->add(null, '', E_USER_POINT_SHORTAGE);
				return 'user_sound_buy';
			}
			
			/* =============================================
			// ������ɹ���
			 ============================================= */
			$us = new Tv_UserSound($this->backend);
			$us->set('user_id', $user['user_id']);
			$us->set('sound_id', $sound_id);
			$us->set('user_sound_status', 1);
			$us->set('user_sound_created_time', $timestamp);
			$us->set('user_sound_updated_time', $timestamp);
			$r = $us->add();
			if(Ethna::isError($r)) return 'user_sound_buy';
			// �桼���������ID
			$usid = $us->getId();
			
			/* =============================================
			// ��������ۿ���λ�����꤬����Ƥ���С�-1
			 ============================================= */
			$s = new Tv_Sound($this->backend, 'sound_id', $sound_id);
			if($s->get('sound_stock_status')){
				$s->set('sound_stock_num', $s->get('sound_stock_num') -1 );
				$r = $s->update();
				if(Ethna::isError($r)) return 'user_sound_buy';
			}
			
			/* =============================================
			// �ݥ�����ɲ÷Ͻ���
			 ============================================= */
			$pm = $this->backend->getManager('Point');
			$point_type_search = $this->config->get('point_type_search');
			$param = array(
				'user_id'	=> $user['user_id'],
				'point'		=> 0 - $s->get('sound_point'),
				'point_type'	=> $point_type_search['sound'],
				'point_status'	=> 2,// ��ǧ�Ѥ�
				'user_sub_id'	=> $usid,
				'point_sub_id'	=> $sound_id,
				'point_memo'	=> $s->get('sound_name'),
			);
			$pm->addPoint($param);
			
			/* =============================================
			// ���ɲý���
			 ============================================= */
			$s = & $this->backend->getManager('Stats');
			$s->addStats('sound',$sound_id, $sound_category_id);
		}
		
		// AU/DOCOMO�ξ���������ɥڡ�����ɽ��
		if($GLOBALS['EMOJIOBJ']->carrier == 'AU' || $GLOBALS['EMOJIOBJ']->carrier == 'DOCOMO'){
			$this->ae->add(null, '', I_USER_SOUND_BUY_DONE);
			return 'user_sound_dl';
		}else{
			// ��������ɳ���
//			$user_url = $this->config->get('user_url');
//			$SESSID = $_REQUEST['SESSID'];
			$id = $this->af->get('sound_id');
			
			//���������̾�λ���
			$action_name = 'user_file_get';
			$c =& $this->backend->getController();
			$form_name = $c->getActionFormName($action_name);
			$backend =& new Ethna_Backend($c);
			$backend->action_form =& new $form_name($c);
			$backend->af =& $backend->action_form;
			$backend->af->setFormVars();
			$backend->af->set('type', 'sound');
			$backend->af->set('id', $id);
			$r = $backend->perform($action_name);
//			header("Location: f.php?type=sound&id={$id}&SESSID={$SESSID}");
		}
	}
}

?>
