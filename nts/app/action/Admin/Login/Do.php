<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ����������¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminLoginDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'login_id' => array(
			'name' => 'ID',
			'required'  => true,
			'form_type' => FORM_TYPE_TEXT,
			'type'	  => VAR_TYPE_STRING,
		),
		'login_password' => array(
			'name' => '�ѥ����',
			'required'  => true,
			'form_type' => FORM_TYPE_PASSWORD,
			'type'	  => VAR_TYPE_STRING,
		),
		'action' => array(
			'form_type'	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * ����������¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminLoginDo extends Tv_ActionAdmin
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
		if($this->af->validate() > 0) return 'admin_index';
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
		// ���������ξȹ�
		$db = $this->backend->getDB();
		$sqlValues = array($this->af->get('login_id'), $this->af->get('login_password'));
		$sql = 'SELECT * FROM admin WHERE login_id = ? AND login_password = ? AND admin_status > 0';
		$r = $db->db->getAll($sql, $sqlValues, DB_FETCHMODE_ASSOC);
		// DB���顼
		if(Ethna::isError($r)){
			$this->ae->add(null, '', E_ADMIN_DB);
			return 'admin_index';
		}
		// ������
		if(count($r) > 0){
			$this->session->destroy();
			$this->session->start();
			$this->session->set('admin',$r[0]);
			
			/*
			if($this->af->get('action') != ''){
				foreach($_POST as $name => $value)
				{
					if(!preg_match('/^action_/', $name) && !preg_match('/^login_/', $name)){
						$this->af->set($name, $value);
					}
				}
				return $this->backend->perform($this->af->get('action'));
			}else{
			*/
				return 'admin_menu';
			//}
		}
		// �����󥨥顼
		else{
			$this->ae->add(null, '', E_ADMIN_LOGIN);
			return 'admin_index';
		}
	}
}
?>