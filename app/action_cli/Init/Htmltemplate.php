<?php
/**
 * Htmltemplate.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * [Init]HTMLテンプレート初期化アクションクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Cli_Action_InitHtmltemplate extends Tv_ActionClass
{
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string 遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		// HTMLテンプレートマネージャを起動
		$html_template = $this->backend->getManager('HtmlTemplate');
		// HTMLテンプレートリストを取得
		$html_template_list = $html_template->getHtmlTemplateList();
		// 【ユーザ】テンプレートディレクトリを生成
		$user_template_dir = BASE . '/template/' . TEMPLATE . '/user/';
		// すべてのテンプレートに対して処理を行う
		foreach($html_template_list as $k => $v){
			// テンプレートパスを生成
			$_template = $user_template_dir . $k . '.tpl';
			// テンプレート本体を取得
			$template = file_get_contents($_template);
			// テンプレート情報を追加
			$t = new Tv_Htmltemplate($this->backend);
			$t->set('html_template_code', $k);
			$t->set('html_template_body', $template);
			$t->set('html_template_status', 1);
			$r = $t->add();
			if(Ethna::isError($r)){
				echo '\nERROR:' . $k . '\n';
			}else{
				echo $k . ' ';
			}
		}
		echo '\nDONE!';
		
		exit;
	}
}
?>