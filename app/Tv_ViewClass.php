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
		
		// 基本情報マッピング
		$site_info_def = array(
			'bgcolor'				=> 'site_bg_color',
			'text'					=> 'site_text_color',
			'link'					=> 'site_link_color',
			'alink'					=> 'site_alink_color',
			'vlink'					=> 'site_vlink_color',
			'title_bgcolor'			=> 'site_title_bg_color',
			'title_fontcolor'		=> 'site_title_font_color',
			'menucolor'				=> 'site_menu_color',
			'hrcolor'				=> 'site_hr_color',
			'timecolor'				=> 'site_time_color',
			'form_name_color'		=> 'site_form_name_color',
			'errorcolor'			=> 'site_error_color',
			'pager_text_color'		=> 'site_pager_text_color',
			'pager_bg_color'		=> 'site_pager_bg_color',
			'site_name'				=> 'site_name',
			'site_html_title'		=> 'site_html_title',
			'site_information'		=> 'site_information',
			'site_meta_description'	=> 'site_meta_description',
			'site_meta_keywords'		=> 'site_meta_keywords',
			'site_meta_robots'		=> 'site_meta_robots',
			'site_meta_author'		=> 'site_meta_author',
			'site_navi_template'		=> 'site_navi_template',
		);
		$site_info = $this->config->get('site_info');
		//var_dump($site_info);
		if(is_array($site_info)){
			foreach($site_info_def as $k => $v){
				if(array_key_exists($v, $site_info)){
					$smarty->assign_by_ref($k, $site_info[$v]);
				}
			}
		}
		
		// SPGVより移植 次期開発でメソッドを修正します
		// action名の取得
		foreach($this->backend->controller->action as $key => $value) {
			$action_name = $this->backend->controller->action[$key]['class_name'];
			break;
		}
		
		// ECの画面の場合の処理
		if((preg_match('/^Tv_Action_UserEc*/', $action_name) && $action_name) ||
			 $action_name == 'Tv_Action_UserEc'){
			
			// モール情報更新
			$o =& new Tv_Config($this->backend,'config_type','mall');
		
			// サイト色情報初期値
			$bgcolor 			= $o->get('site_bg_color');
			$text	  			= $o->get('site_text_color');
			$link 	  			= $o->get('site_link_color');
			$alink	  			= $o->get('site_alink_color');
			$vlink	  			= $o->get('site_vlink_color');
			$title_bgcolor	  	= $o->get('site_title_bg_color');
			$title_fontcolor	= $o->get('site_title_font_color');
			$menucolor	  		= $o->get('site_menu_color');
			$hrcolor	  		= $o->get('site_hr_color');
			$mall_name 			= $o->get('site_name');
			$company_name 		= $o->get('site_company_name');
			$mall_html_title 	= $o->get('site_html_title');
			$mall_information 	= $o->get('site_information');
			$mall_meta_description 
								= $o->get('site_meta_description');
			$mall_meta_keywords = $o->get('site_meta_keywords');
			$mall_meta_robots 	= $o->get('site_meta_robots');
			$mall_meta_author 	= $o->get('site_meta_author');
			
			//echo $mall_name;
			// ショップ情報がある場合のみショップカラー情報の上書き
			$shop_id = strip_tags($_REQUEST['shop_id']);
			if($shop_id){
				$s =& new Tv_Shop($this->backend,'shop_id',$shop_id);
				if($s->get('shop_bgcolor'))		$bgcolor 	= $s->get('shop_bgcolor');
				if($s->get('shop_textcolor'))	$text 		= $s->get('shop_textcolor');
				if($s->get('shop_linkcolor'))	$link 		= $s->get('shop_linkcolor');
				if($s->get('shop_alinkcolor'))	$alink 		= $s->get('shop_alinkcolor');
				if($s->get('shop_vlinkcolor'))	$vlink 		= $s->get('shop_vlinkcolor');
			}
			// 各パラメーターを上書きする
			$smarty->assign_by_ref('title',$mall_name);
			$smarty->assign_by_ref('mall_name',$mall_name);
			$smarty->assign_by_ref('mall_html_title',$mall_html_title);
			$smarty->assign_by_ref('mall_information',$mall_information);
			$smarty->assign_by_ref('mall_meta_description',$mall_meta_description);
			$smarty->assign_by_ref('mall_meta_keywords',$mall_meta_keywords);
			$smarty->assign_by_ref('mall_meta_robots',$mall_meta_robots);
			$smarty->assign_by_ref('mall_meta_author',$mall_meta_author);
			$smarty->assign_by_ref('bgcolor',$bgcolor);
			$smarty->assign_by_ref('text',$text);
			$smarty->assign_by_ref('link',$link);
			$smarty->assign_by_ref('alink',$alink);
			$smarty->assign_by_ref('vlink',$vlink);
			$smarty->assign_by_ref('title_bgcolor',$title_bgcolor);
			$smarty->assign_by_ref('title_fontcolor',$title_fontcolor);
			$smarty->assign_by_ref('menucolor',$menucolor);
			$smarty->assign_by_ref('hrcolor',$hrcolor);
			//$smarty->assign_by_ref('mall_name',$this->config->get('mall_name'));
			//$smarty->assign_by_ref('mall_html_title',$this->config->get('mall_html_title'));
			//$smarty->assign_by_ref('mall_information',$this->config->get('mall_information'));
			//$smarty->assign_by_ref('mall_meta_description',$this->config->get('mall_meta_description'));
			//$smarty->assign_by_ref('mall_meta_keywords',$this->config->get('mall_meta_keywords'));
			//$smarty->assign_by_ref('mall_meta_robots',$this->config->get('mall_meta_robots'));
			//$smarty->assign_by_ref('mall_meta_author',$this->config->get('mall_meta_author'));
			$smarty->assign_by_ref('user_url',$this->config->get('user_url'));
			$smarty->assign_by_ref('mall_url',$this->config->get('mall_url'));
			$smarty->assign_by_ref('ssl_url',$this->config->get('ssl_url'));
			$smarty->assign_by_ref('point_name',$this->config->get('point_name'));
			$smarty->assign_by_ref('point_unit',$this->config->get('point_unit'));
			$smarty->assign_by_ref('company_name',$this->config->get('company_name'));
			$smarty->assign_by_ref('from_mailaddress',$this->config->get('from_mailaddress'));
			$ad = ADMINMAILADDRESS;
			$smarty->assign_by_ref('admin_mailaddress',$ad);
			$env_name = ENV_NAME;
			$smarty->assign_by_ref('env_name',$env_name);
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