<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理ログイン実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminLoginDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'login_id' => array(
			'name' => 'ID',
			'required'  => true,
			'form_type' => FORM_TYPE_TEXT,
			'type'	  => VAR_TYPE_STRING,
		),
		'login_password' => array(
			'name' => 'パスワード',
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
 * 管理ログイン実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminLoginDo extends Tv_ActionAdmin
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラー
		if($this->af->validate() > 0) return 'admin_index';
		return null;
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		// ログイン情報の照合
		$db = $this->backend->getDB();
		$sqlValues = array($this->af->get('login_id'), $this->af->get('login_password'));
		$sql = 'SELECT * FROM admin WHERE login_id = ? AND login_password = ? AND admin_status > 0';
		$r = $db->db->getAll($sql, $sqlValues, DB_FETCHMODE_ASSOC);
		// DBエラー
		if(Ethna::isError($r)){
			$this->ae->add(null, '', E_ADMIN_DB);
			return 'admin_index';
		}
		// ログイン
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
		// ログインエラー
		else{
			$this->ae->add(null, '', E_ADMIN_LOGIN);
			return 'admin_index';
		}
	}
}
?>