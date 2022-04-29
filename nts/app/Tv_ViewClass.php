<?php
// vim: foldmethod=marker
/**
 *  Tv_ViewClass.php
 *
 *  @author	 {$author}
 *  @package	Tv
 *  @version	$Id: app.viewclass.php,v 1.1 2006/08/22 15:52:26 fujimoto Exp $
 */

//  Tv_ViewClass
/**
 *  viewクラス
 *
 *  @author	 {$author}
 *  @package	Tv
 *  @access	 public
 */
class Tv_ViewClass extends Ethna_ViewClass
{
	/**
	 *  共通値を設定する
	 *
	 *  @access protected
	 *  @param  object  Mcm_Renderer  レンダラオブジェクト
	 */
	function _setDefault(&$renderer)
	{
		//Rendererからテンプレートエンジンを取得
		$smarty =& $renderer->getEngine();
		$smarty->assign_by_ref('session_name', session_name());
		$sessid = session_id();
		if(!$sessid && array_key_exists('file',$_REQUEST)) $sessid = $_REQUEST['SESSID'];
		$smarty->assign_by_ref('SESSID', strip_tags($sessid));
		$smarty->assign_by_ref('carrier', $GLOBALS['EMOJIOBJ']->carrier);
		$smarty->assign_by_ref('io_encoding', $GLOBALS['io_encoding']);
		
		$smarty->assign_by_ref('view_name', $this->forward_name);
		
		// SNS基本情報マッピング
		$sns_info_def = array(
			'bgcolor'			=> 'sns_bg_color',
			'text'				=> 'sns_text_color',
			'link'				=> 'sns_link_color',
			'alink'				=> 'sns_alink_color',
			'vlink'				=> 'sns_vlink_color',
			'title_bgcolor'		=> 'sns_title_bg_color',
			'title_fontcolor'	=> 'sns_title_font_color',
			'menucolor'			=> 'sns_menu_color',
			'hrcolor'			=> 'sns_hr_color',
			'timecolor'			=> 'sns_time_color',
			'form_name_color'	=> 'sns_form_name_color',
			'errorcolor'		=> 'sns_error_color',
			'pager_text_color'	=> 'sns_pager_text_color',
			'pager_bg_color'	=> 'sns_pager_bg_color',
			
			'sns_name'				=> 'sns_name',
			'sns_html_title'		=> 'sns_html_title',
			'sns_information'		=> 'sns_information',
			'sns_meta_description'	=> 'sns_meta_description',
			'sns_meta_keywords'		=> 'sns_meta_keywords',
			'sns_meta_robots'		=> 'sns_meta_robots',
			'sns_meta_author'		=> 'sns_meta_author',
			'sns_navi_template'		=> 'sns_navi_template',
		);
		$sns_info = $this->config->get('sns_info');
		if(is_array($sns_info)){
			foreach($sns_info_def as $k => $v){
				if(array_key_exists($v, $sns_info)){
					$smarty->assign_by_ref($k, $sns_info[$v]);
				}
			}
		}
	}
	
	//  _getTemplateEngine
	/**
	 *  レンダラオブジェクトを取得する(そのうち_getRenderer()に統合される予定)
	 *
	 *  @access protected
	 *  @return object  Ethna_Renderer  レンダラオブジェクト
	 *  @obsolete
	 */
	function &_getTemplateEngine()
	{
		$c =& $this->backend->getController();
		$renderer =& $c->getRenderer();
		
		// フォームテンプレートを割り当て
		$form_template = $this->af->form_template;
		$renderer->setPropByRef('ft', $form_template);
		
		$admin_template = $this->af->admin_template;
		$renderer->setPropByRef('at', $admin_template);
		
		// フォーム変数を割り当て
		$form_array =& $this->af->getArray();
		$renderer->setPropByRef('form', $form_array);
		
		// テンプレート変数を割り当て
		$app_array =& $this->af->getAppArray();
		$renderer->setPropByRef('app', $app_array);
		
		// ノンエスケープテンプレート変数を割り当て
		$app_ne_array =& $this->af->getAppNEArray();
		$renderer->setPropByRef('app_ne', $app_ne_array);
		
		// メッセージを割り当て
		$message_list = Ethna_Util::escapeHtml($this->ae->getMessageList());
		$renderer->setPropByRef('errors', $message_list);
		
		// セッションを割り当て
		if (isset($_SESSION)) {
			$tmp_session = Ethna_Util::escapeHtml($_SESSION);
			$renderer->setPropByRef('session', $tmp_session);
		}
		
		// スクリプトを割り当て
		$renderer->setProp('script',
			htmlspecialchars(basename($_SERVER['PHP_SELF']), ENT_QUOTES));
		
		// リクエストURI
		$renderer->setProp('request_uri',
			htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES));
		
		// コンフィグを割り当て
		$renderer->setProp('config', $this->config->get());
		
		return $renderer;
	}
	
	// フォームヘルパー内の絵文字用変換
	function _replaceEmojiForm($value)
	{
		// フォーム用内部絵文字コードに変換
		$value = preg_replace('/\[x:(\d{4})\]/','[xf:\\1]',$value);
		return $value;
	}
	
	//  _getFormInput_Html
	/**
	 *  HTMLタグを取得する
	 *
	 *  @access protected
	 */
	function _getFormInput_Html($tag, $attr, $element = null, $escape_element = true)
	{
		// 不要なパラメータは消す
		foreach ($this->helper_parameter_keys as $key) {
			unset($attr[$key]);
		}
		
		$r = "<$tag";
		foreach ($attr as $key => $value) {
			if ($value === null) {
				$r .= sprintf(' %s', $key);
			} else {
				// istyleパラメタの処理
				if($GLOBALS['EMOJIOBJ']->carrier == 'DOCOMO' && $key == 'istyle'){
					if($value == 1){
						$r .= sprintf(' %s="%s" style="-wap-input-format:&quot;*&lt;ja:h&gt;&quot;"', $key, $value);
					}elseif($value == 2){
						$r .= sprintf(' %s="%s" style="-wap-input-format:&quot;*&lt;ja:hk&gt;&quot;"', $key, $value);
					}elseif($value == 3){
						$r .= sprintf(' %s="%s" style="-wap-input-format:&quot;*&lt;ja:en&gt;&quot;"', $key, $value);
					}elseif($value == 4){
						$r .= sprintf(' %s="%s" style="-wap-input-format:&quot;*&lt;ja:n&gt;&quot;"', $key, $value);
					}
				}else{
					$value = htmlspecialchars($value, ENT_QUOTES);
					// 絵文字フォーム表示用コードに変換する
					$value = $this->_replaceEmojiForm($value);
					$r .= sprintf(' %s="%s"', $key, $value);
//						$r .= sprintf(' %s="%s"', $key, htmlspecialchars($value, ENT_QUOTES));
				}
			}
		}
		
		if ($element === null) {
			$r .= ' />';
		}
		// エスケープする場合
		else if ($escape_element) {
			$element = htmlspecialchars($element, ENT_QUOTES);
			// 絵文字フォーム表示用コードに変換する
			$element = $this->_replaceEmojiForm($element);
			$r .= sprintf('>%s</%s>', $element, $tag);
//			$r .= sprintf('>%s</%s>', htmlspecialchars($element, ENT_QUOTES), $tag);
		}
		// エスケープしない場合
		else {
			$r .= sprintf('>%s</%s>', $element, $tag);
		}
		
		return $r;
	}
}
?>
