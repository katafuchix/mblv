<?php
/**
 * Tv_ActionAdmin.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �Ǘ��҂��A�N�Z�X����A�N�V�����̊��N���X
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Tv_ActionClass.php';
class Tv_ActionAdmin extends Tv_ActionClass
{
	/**
	 * �F��
	 * 
	 * @access     public
	 */
	function authenticate()
	{
		// ��{�����擾����
		parent::setSnsInfo();
		
		return parent::authenticate();
	}
	
	/**
	 * �A�N�V�������s�O�̏���(�t�H�[���l�`�F�b�N��)���s��
	 * 
	 * @access public
	 * @return string �J�ږ�(null�Ȃ琳��I��, false�Ȃ珈���I��)
	 */
	function prepare()
	{
		return parent::prepare();
	}
	
	/**
	 * �A�N�V�������s
	 * 
	 * @access public
	 * @return string �J�ږ�(null�Ȃ�J�ڂ͍s��Ȃ�)
	 */
	function perform()
	{
		return parent::perform();
	}
	
	/*
	 * �Ǘ��ҏ��ɐݒ肳�ꂽ�A�N�Z�X���������A�N�V������
	 * ���݃A�N�Z�X���Ă���A�N�V��������v���邩�̃`�F�b�N
	 * 
	 * @access     public
	 * @return bool ���茋��(true�Ȃ�A�N�Z�X����, false�Ȃ�A�N�Z�X����)
	 */
	function adminAuthActionCheck()
	{
		$admin_action_list = $this->getUsualActionList();
		$this->session->set('auth_action_list', $admin_action_list);

		if (!isset($admin_action_list))
		{
			return false;
		}
		if ($admin_action_list[$this->backend->ctl->getCurrentActionName()])
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	/*
	 * �Ǘ�������L����A�N�V���������X�g�����ĕԂ�
	 * 
	 * @access     public
	 * @return array �Ǘ�������L����A�N�V�����̃��X�g
	 */
	function getUsualActionList()
	{
		$admin = $this->session->get('admin');
		$a =& new Tv_Admin($this->backend, 'admin_id', $admin['admin_id']);
		
		$admin_action_category_list = $this->config->get('admin_action_category');
		$admin_action_category_id_list = explode(',', $a->get('admin_action_category_id'));
		
		$auth_action_category_list = array();
		foreach ($admin_action_category_id_list as $admin_action_category_id)
		{
			if ($admin_action_category_list[$admin_action_category_id])
			{
				$admin_contents_list = $admin_action_category_list[$admin_action_category_id]['contents'];	
				foreach ($admin_contents_list as $k => $v)
				{
					$auth_action_list[$k] = true;
				}
			}
		}
		
		return $auth_action_list;
	}
}
?>