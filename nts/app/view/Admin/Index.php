<?php

class Tv_View_AdminIndex extends Tv_ViewClass
{
	function preforward()
	{
		$this->af->setApp('menu_hidden', 1);
		
		// hidden_varsの生成
		$hiddenVars = '';
		$form = array_merge($_GET, $_POST);
		if(!$form['action_admin_login_do'] && !$form['action_admin_logout_do']){
			foreach($form as $name => $value)
			{
				if(preg_match('/^action_/', $name)){
					// ログイン後遷移先アクション
					$action = preg_replace('/^action_/', '', $name);
					$hiddenVars .= '<input type="hidden" name="action" value="' . $action . '" />';
//				}else{
//					$hiddenVars .= '<input type="hidden" name="' .
//						$name . '" value="' . htmlspecialchars($value) . '" />';
				}
			}
		}
		$this->af->setAppNE('hidden_vars', $hiddenVars);
	}
}
?>
