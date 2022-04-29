<?php
/**
 * Tv_ActionAdmin.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理者がアクセスするアクションの基底クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Tv_ActionClass.php';
class Tv_ActionAdmin extends Tv_ActionClass
{
	/**
	 * 認証
	 * 
	 * @access     public
	 */
	function authenticate()
	{
		// 基本情報を取得する
		parent::setSnsInfo();
		
		return parent::authenticate();
	}
	
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string 遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		return parent::prepare();
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string 遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		return parent::perform();
	}
	
	/*
	 * 管理者情報に設定されたアクセス権限を持つアクションと
	 * 現在アクセスしているアクションが一致するかのチェック
	 * 
	 * @access     public
	 * @return bool 判定結果(trueならアクセス許可, falseならアクセス拒否)
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
	 * 管理権限を有するアクションをリスト化して返す
	 * 
	 * @access     public
	 * @return array 管理権限を有するアクションのリスト
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