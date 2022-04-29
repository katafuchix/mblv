<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼������������¹ԥ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserGameBuyDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'game_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'name'		=> '���ގ���ID',
		),
	);
}

/**
 * �桼������������¹ԥ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserGameBuyDo extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_game_buy';
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
		
		$game_id = $this->af->get('game_id');
		// ������������
		$g =& new Tv_Game($this->backend, 'game_id', $game_id);
		$game_file3 = $g->get('game_file3');
		$ug =& new Tv_UserGame($this->backend);
		// ��ʣ�ǥ��᡼�������ǧ
		$ug_list =& $ug->searchProp(
			array('game_id'),
			array(
				'user_id'			=> $user['user_id'],
				'game_id'			=> $game_id,
				'user_game_status'		=> new Ethna_AppSearchObject(0, OBJECT_CONDITION_NE)
			)
		);
		// ��������˳������ʤ���й���
		if($ug_list[0] == 0){
			/* =============================================
			// �ݥ���ȥ����å�
			 ============================================= */
			$u =& new Tv_User($this->backend, 'user_id', $user['user_id']);
			if($u->get('user_point') < $g->get('game_point')){
				$this->ae->add(null, '', E_USER_POINT_SHORTAGE);
				return 'user_game_buy';
			}
			
			/* =============================================
			// ���������
			 ============================================= */
			$ug = new Tv_UserGame($this->backend);
			$ug->set('user_id', $user['user_id']);
			$ug->set('game_id', $game_id);
			$ug->set('user_game_status', 1);
			$ug->set('user_game_created_time', $timestamp);
			$ug->set('user_game_updated_time', $timestamp);
			$r = $ug->add();
			if(Ethna::isError($r)) return 'user_game_buy';
			// �桼��������ID
			$ugid = $ug->getId();
			
			/* =============================================
			// �������ۿ���λ�����꤬����Ƥ���С�-1
			 ============================================= */
			$g = new Tv_Game($this->backend, 'game_id', $game_id);
			$game_category_id = $g->get('game_category_id');
			if($g->get('game_stock_status')){
				$g->set('game_stock_num', $g->get('game_stock_num') -1 );
				$r = $g->update();
				if(Ethna::isError($r)) return 'user_game_buy';
			}
			
			/* =============================================
			// �ݥ�����ɲ÷Ͻ���
			 ============================================= */
			$pm = $this->backend->getManager('Point');
			$point_type_search = $this->config->get('point_type_search');
			$param = array(
				'user_id'	=> $user['user_id'],
				'point'		=> 0 - $g->get('game_point'),
				'point_type'	=> $point_type_search['game'],
				'point_status'	=> 2,// ��ǧ�Ѥ�
				'user_sub_id'	=> $ugid,
				'point_sub_id'	=> $game_id,
				'point_memo'	=> $g->get('game_name'),
			);
			$pm->addPoint($param);
			
			/* =============================================
			// ���ɲý���
			 ============================================= */
			$s = & $this->backend->getManager('Stats');
			$s->addStats('game',$game_id, $game_category_id);
		}
		
//		// AU�ξ���������ɥڡ�����ɽ��
		// AU�ξ��swf�إ�����쥯��
		if($GLOBALS['EMOJIOBJ']->carrier == 'AU'){
			$file_url = $this->config->get('file_url');
			header("Location: {$file_url}game/{$game_file3}");
			
//			$this->ae->add(null, '', I_USER_SOUND_BUY_DONE);
//			return 'user_game_dl';
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
			$backend->af->set('type', 'game');
			$backend->af->set('id', $game_id);
			$r = $backend->perform($action_name);
//			header("Location: f.php?type=game&id={$game_id}&SESSID={$SESSID}");
		}
	}
}

?>
