<?php
/**
 * Util.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * 管理ユーティリティアクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminUtil extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'page' => array(
			'name'		=> 'ﾍﾟｰｼﾞ',
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * 管理ユーティリティアクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminUtil extends Tv_ActionUser
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
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
		// 表示するページ名を取得する
		$page = $this->af->get('page');
		// ページ名が空の場合はログインページを表示させる
		if($page == '') return 'admin_index';
		
		// FAQの場合はデータを取得する
		if(preg_match('/faq_/', $page) && !in_array($page, array('faq_index'))){
			$ctl = $this->backend->getController();
			$template = $ctl->getTemplatedir();
			$filename = preg_replace('/^faq/', '', $page);
			$filepath = $template . '/admin/util/faq/'.$filename . '.txt';
			// ファイルの存在確認
			if(is_file($filepath)){
				// ファイルデータを取得
				$file = file_get_contents($filepath);
				// ラインデータに分解
				$l = explode("\n", $file);
				// 表示用データを初期化
				$f = array();
				// テンポラリ配列を初期化
				$t = array();
				foreach($l as $k => $v){
					// タイトルにマッチした場合
					if(preg_match('/^[\+]/', $v)){
						// 既にタイトルがある場合は表示用データにまわし、テンポラリ配列を初期化
						if(array_key_exists('title', $t)){
							$f[] = $t;
							$t = array();
						}
						// テンポラリ配列にデータを登録
						$t['title'] = preg_replace('/^[\+]/', '', $v);
					}
					// その他はすべて本文
					else{
						if(array_key_exists('body', $t)){
							$t['body'] .= "\n" . $v;
						}else{
							$t['body'] = $v;
						}
					}
				}
				// 最後のデータも残らず登録
				$f[] = $t;
				$this->af->setAppNE('faq', $f);
				return 'admin_util_faq_data';
			}
		}
		
		// それぞれのページ名に対応したビューを返却する
		return 'admin_util_'.$page;
	}
}
?>
