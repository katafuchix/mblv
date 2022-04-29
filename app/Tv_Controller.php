<?php

/** アプリケーションベースディレクトリ */
define('BASE', dirname(dirname(__FILE__)));

/** include_pathの設定(アプリケーションディレクトリを追加) */
$app = BASE . "/app";
$lib = BASE . "/lib";
ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . implode(PATH_SEPARATOR, array($app, $lib)));

/** 基本設定 */
require_once BASE . '/etc/base-ini.php';
require_once BASE . '/etc/word-ini.php';

/** アプリケーションライブラリのインクルード */
require_once 'Ethna/Ethna.php';
require_once 'Net/UserAgent/Mobile.php';
require_once 'Net/SMTP.php';
require_once 'Mail.php';
require_once 'Mail_Mime/mime.php';

/* 基底クラス系 */
require_once 'Tv_Error.php';
require_once 'Tv_ActionClass.php';
require_once 'Tv_ActionError.php';
require_once 'Tv_ActionAdminOnly.php';
require_once 'Tv_ActionUserOnly.php';
require_once 'Tv_ActionForm.php';
require_once 'Tv_ViewClass.php';
require_once 'Tv_ListViewClass.php';
require_once 'Tv_ListViewClass_Footprint.php';
require_once 'Tv_ListViewClass_Bbs.php';
require_once 'Tv_ListViewClass_BlogArticle.php';
require_once 'Tv_View_Footprint.php';
require_once 'Tv_DB_PEAR.php';
require_once 'Tv_Emoji.php';
require_once 'Tv_Mail.php';
require_once 'Tv_MailMime.php';
require_once 'Tv_MailSender.php';

/* セッション系 */
require_once 'Tv_Session.php';
require_once 'Tv_SessionMemcache.php';

/* アバター系 */
require_once 'Tv_AvatarGenerator.php';

/* Smarty系 */
require_once 'function.ad.php';
require_once 'function.banner.php';
require_once 'function.html_style.php';
require_once 'function.html_image_flash.php';
require_once 'block.style.php';
require_once 'modifier.jp_date_format.php';
require_once 'modifier.replace_emoji_form.php';
require_once 'modifier.truncate_emoji.php';

/** lib/Ethnaのインクルード */
require_once 'Tv_Renderer.php';
require_once $lib . '/Ethna/class/Renderer/Ethna_Renderer_Smarty.php';
require_once 'renderer/Tv_Renderer_Smarty.php';

/** AppObjectのインクルード */
require_once 'Tv_Ad.php';
require_once 'Tv_Admin.php';
require_once 'Tv_AdCode.php';
require_once 'Tv_AdCategory.php';
require_once 'Tv_AdMenu.php';
require_once 'Tv_Analytics.php';
require_once 'Tv_Avatar.php';
require_once 'Tv_AvatarCategory.php';
require_once 'Tv_AvatarStand.php';
require_once 'Tv_Banner.php';
require_once 'Tv_BlackList.php';
require_once 'Tv_Bbs.php';
require_once 'Tv_BlogArticle.php';
require_once 'Tv_BlogComment.php';
require_once 'Tv_Comment.php';
require_once 'Tv_Community.php';
require_once 'Tv_CommunityArticle.php';
require_once 'Tv_CommunityCategory.php';
require_once 'Tv_CommunityComment.php';
require_once 'Tv_CommunityMember.php';
require_once 'Tv_Contents.php';
require_once 'Tv_Config.php';
require_once 'Tv_ConfigUserProf.php';
require_once 'Tv_ConfigUserProfOption.php';
require_once 'Tv_Decomail.php';
require_once 'Tv_DecomailCategory.php';
require_once 'Tv_File.php';
require_once 'Tv_Footprint.php';
require_once 'Tv_Friend.php';
require_once 'Tv_Game.php';
require_once 'Tv_GameCategory.php';
require_once 'Tv_HtmlTemplate.php';
require_once 'Tv_HtmlTemplateLog.php';
require_once 'Tv_Invite.php';
require_once 'Tv_Image.php';
require_once 'Tv_Log.php';
require_once 'Tv_MailTemplate.php';
require_once 'Tv_Magazine.php';
require_once 'Tv_Media.php';
require_once 'Tv_MediaAccess.php';
require_once 'Tv_Message.php';
require_once 'Tv_Movie.php';
require_once 'Tv_News.php';
require_once 'Tv_Bbs.php';
require_once 'Tv_Point.php';
require_once 'Tv_PointExchange.php';
require_once 'Tv_Pon.php';
require_once 'Tv_PonPoint.php';
require_once 'Tv_Report.php';
require_once 'Tv_Segment.php';
require_once 'Tv_Sound.php';
require_once 'Tv_SoundCategory.php';
require_once 'Tv_UserAd.php';
require_once 'Tv_UserAvatar.php';
require_once 'Tv_UserDecomail.php';
require_once 'Tv_UserGame.php';
require_once 'Tv_UserGameScore.php';
require_once 'Tv_UserSound.php';
require_once 'Tv_User.php';
require_once 'Tv_UserHist.php';
require_once 'Tv_UserProf.php';
require_once 'Tv_Ranking.php';
require_once 'Tv_Item.php';
require_once 'Tv_ItemCategory.php';
require_once 'Tv_Shop.php';
require_once 'Tv_Exchange.php';
require_once 'Tv_ExchangeRange.php';
require_once 'Tv_Postage.php';
require_once 'Tv_Supplier.php';
require_once 'Tv_Review.php';
require_once 'Tv_UserOrder.php';
require_once 'Tv_Stock.php';
require_once 'Tv_Sample.php';
require_once 'Tv_Cart.php';
require_once 'Tv_PostUnit.php';
require_once 'Tv_UserOrderHist.php';
require_once 'Tv_UserOrderCopy.php';
require_once 'Tv_Video.php';
require_once 'Tv_VideoCategory.php';

// ポイントオンモジュール
require_once 'PENModule.php';

//ダンプ表示をわかりやすくするモジュールの初期化
require_once 'Var_Dump.php';
var_dump::displayInit(array('display_mode'=>'HTML4_Table'));
//使い方
//var_dump::display($target_array);

// [print]メッセージ表示用
function p($e,$x=false){
	if($_SERVER['REMOTE_ADDR'] == '210.172.116.113'){
		// 配列の場合
		if(is_array($e)){
			print_r($e);
		}
		// スカラーの場合
		else{
			print_r($e);
		}
		// 終了設定
		if($x) exit;
	}
}

// [var_dump]メッセージ表示用
function v($e,$x=false){
	if($_SERVER['REMOTE_ADDR'] == '210.172.116.113'){
		var_dump($e);
		// 終了設定
		if($x) exit;
	}
}

/**
 *  Tvアプリケーションのコントローラ定義
 *
 *  @author  {$author}
 *  @access  public
 *  @package Tv
 */
class Tv_Controller extends Ethna_Controller
{
	/**#@+
	 *  @access private
	 */

	/**
	 *  @var string  アプリケーションID
	 */
	var $appid = 'TV';
	
	/**
	 *  @var array   forward定義
	 */
	var $forward = array(
		/*
		 *  TODO: ここにforward先を記述してください
		 *
		 *  記述例：
		 *
		 *  'index'  => array(
		 *	  'view_name' => 'Tv_View_Index',
		 *  ),
		 */
	);
	
	/**
	 *  @var array   action定義
	 */
	var $action = array(
		/*
		 *  TODO: ここにaction定義を記述してください
		 *
		 *  記述例：
		 *
		 *  'index'  => array(),
		 */
	);
	
	/**
	 *  @var array   soap action定義
	 */
	var $soap_action = array(
		/*
		 *  TODO: ここにSOAPアプリケーション用のaction定義を
		 *  記述してください
		 *  記述例：
		 *
		 *  'sample' => array(),
		 */
	);
	
	/**
	 *  @var array	   アプリケーションディレクトリ
	 */
	var $directory = array(
		'action'			=> 'app/action',
		'action_cli'		=> 'app/action_cli',
		'action_xmlrpc'		=> 'app/action_xmlrpc',
		'app'		 	  	=> 'app',
		'plugin'			=> 'app/plugin',
		'bin'				=> 'bin',
		'etc'				=> 'etc',
		'filter'			=> 'app/filter',
		'locale'			=> 'locale',
		'log'				=> 'log',
		'plugins'	 		=> array(),
		'template'			=> 'template',
		'template_c'		=> TMP_PATH,
		'tmp'		   		=> TMP_PATH,
		'view'		  		=> 'app/view',
		'www'		  		=> 'www',
	);
	
	/**
	 *  @var array	   DBアクセス定義
	 */
	var $db = array(
		'stats'			=> DB_TYPE_RW,
		''				=> DB_TYPE_RW,
	);
	
	/**
	 *  @var array	   拡張子設定
	 */
	var $ext = array(
		'php'			   => 'php',
		'tpl'			   => 'tpl',
	);
	
	/**
	 *  @var	array   クラス定義
	 */
	var $class = array(
		/*
		 *  TODO: 設定クラス、ログクラス、SQLクラスをオーバーライド
		 *  した場合は下記のクラス名を忘れずに変更してください
		 */
		'class'			=> 'Ethna_ClassFactory',
		'backend'		=> 'Ethna_Backend',
		'config'		=> 'Ethna_Config',
		'db'			=> 'Tv_DB_PEAR',
		'error'			=> 'Tv_ActionError',
		'form'			=> 'Tv_ActionForm',
		'i18n'			=> 'Ethna_I18N',
		'logger'		=> 'Ethna_Logger',
		'plugin'		=> 'Ethna_Plugin',
		'session'		=> 'Tv_Session',
		'sql'		   	=> 'Ethna_AppSQL',
		'view'		  	=> 'Tv_ViewClass',
		'renderer'	  	=> 'Tv_Renderer_Smarty',
		'url_handler'	=> 'Tv_UrlHandler',
	);
	
	/**
	 *  @var array	   検索対象となるプラグインのアプリケーションIDのリスト
	 */
	var $plugin_search_appids = array(
		/*
		 *  プラグイン検索時に検索対象となるアプリケーションIDのリストを記述します。
		 *
		 *  記述例：
		 *  Common_Plugin_Foo_Bar のような命名のプラグインがアプリケーションの
		 *  プラグインディレクトリに存在する場合、以下のように指定すると
		 *  Common_Plugin_Foo_Bar, Tv_Plugin_Foo_Bar, Ethna_Plugin_Foo_Bar
		 *  の順にプラグインが検索されます。 
		 *
		 *  'Common', 'Tv', 'Ethna',
		 */
		'Tv', 'Ethna',
	);
	
	/**
	 *  @var	array	   フィルタ設定
	 */
	var $filter = array(
		/*
		 *  TODO: フィルタを利用する場合はここにそのプラグイン名を
		 *  記述してください
		 *  (クラス名を指定するとfilterディレクトリからフィルタクラス
		 *  を読み込みます)
		 *
		 *  記述例：
		 *
		 *  'ExecutionTime',
		 */
		 'Mobile_Filter',
	);
	
	/**
	 *  @var	array   smarty modifier定義
	 */
	var $smarty_modifier_plugin = array(
		/*
		 *  TODO: ここにユーザ定義のsmarty modifier一覧を記述してください
		 *
		 *  記述例：
		 *
		 *  'smarty_modifier_foo_bar',
		 */
		   'smarty_modifier_jp_date_format',
		   'smarty_modifier_replace_emoji_form',
		   'smarty_modifier_truncate_emoji',
	);
	
	/**
	 *  @var	array   smarty function定義
	 */
	var $smarty_function_plugin = array(
		/*
		 *  TODO: ここにユーザ定義のsmarty function一覧を記述してください
		 *
		 *  記述例：
		 *
		 *  'smarty_function_foo_bar',
		 */
		 'smarty_function_html_style',
		 'smarty_function_ad',
		 'smarty_function_banner',
	);
	
	/**
	 *  @var	array   smarty block定義
	 */
	var $smarty_block_plugin = array(
		/*
		 *  TODO: ここにユーザ定義のsmarty block一覧を記述してください
		 *
		 *  記述例：
		 *
		 *  'smarty_block_foo_bar',
		 */
		 'smarty_block_style',
	);
	
	/**
	 *  @var	array   smarty prefilter定義
	 */
	var $smarty_prefilter_plugin = array(
		/*
		 *  TODO: ここにユーザ定義のsmarty prefilter一覧を記述してください
		 *
		 *  記述例：
		 *
		 *  'smarty_prefilter_foo_bar',
		 */
	);
	
	/**
	 *  @var	array   smarty postfilter定義
	 */
	var $smarty_postfilter_plugin = array(
		/*
		 *  TODO: ここにユーザ定義のsmarty postfilter一覧を記述してください
		 *
		 *  記述例：
		 *
		 *  'smarty_postfilter_foo_bar',
		 */
	);
	
	/**
	 *  @var	array   smarty outputfilter定義
	 */
	var $smarty_outputfilter_plugin = array(
		/*
		 *  TODO: ここにユーザ定義のsmarty outputfilter一覧を記述してください
		 *
		 *  記述例：
		 *
		 *  'smarty_outputfilter_foo_bar',
		 */
	);
	
	/**
	 *  DB設定を返す
	 *
	 *  @access     public
	 *  @param  string  $db_key DBキー("", "r", "rw", "default", "blog_r"...)
	 *  @return string  $db_keyに対応するDB種別定義(設定が無い場合はnull)
	 */
	function getDBType($db_key = null)
	{
		// 指定のない場合はデフォルトのDBを返す
		if (is_null($db_key)) {
			// 一覧を返す
//			return array('' => $this->db['']);
			return $this->db;
		}
		// 指定はあるが、定義の場合はnullを返す
		if (isset($this->db[$db_key]) == false) {
			return null;
		}
		// 該当のDBを返す
		return $this->db[$db_key];
	}
	
	/**
	 *  テンプレートエンジン取得する
	 *
	 *  @access     public
	 *  @return object  Ethna_Renderer  レンダラオブジェクト
	 *  @obsolete
	 */
	function &getTemplateEngine()
	{
		if (is_object($this->renderer)) {
			return $this->renderer;
		}
		
		$this->renderer =& $this->class_factory->getObject('renderer');
	   
		// {{{ for B.C.
		if (strtolower(get_class($this->renderer)) == "ethna_renderer_smarty" || strtolower(get_class($this->renderer)) == "tv_renderer_smarty") {
			// user defined modifiers
			foreach ($this->smarty_modifier_plugin as $modifier) {
				$name = str_replace('smarty_modifier_', '', $modifier);
				$this->renderer->setPlugin($name,'modifier', $modifier);
			}
			
			// user defined functions
			foreach ($this->smarty_function_plugin as $function) {
				if (!is_array($function)) {
					$name = str_replace('smarty_function_', '', $function);
					$this->renderer->setPlugin($name, 'function', $function);
				} else {
					$this->renderer->setPlugin($function[1], 'function', $function);
				}
			}
			
			// user defined blocks
			foreach ($this->smarty_block_plugin as $block) {
				if (!is_array($block)) {
					$name = str_replace('smarty_block_', '', $block);
					$this->renderer->setPlugin($name,'block', $block);
				} else {
					$this->renderer->setPlugin($block[1],'block', $block);
				}
			}
			
			// user defined prefilters
			foreach ($this->smarty_prefilter_plugin as $prefilter) {
				if (!is_array($prefilter)) {
					$name = str_replace('smarty_prefilter_', '', $prefilter);
					$this->renderer->setPlugin($name,'prefilter', $prefilter);
				} else {
					$this->renderer->setPlugin($prefilter[1],'prefilter', $prefilter);
				}
			}
			
			// user defined postfilters
			foreach ($this->smarty_postfilter_plugin as $postfilter) {
				if (!is_array($postfilter)) {
					$name = str_replace('smarty_postfilter_', '', $postfilter);
					$this->renderer->setPlugin($name,'postfilter', $postfilter);
				} else {
					$this->renderer->setPlugin($postfilter[1],'postfilter', $postfilter);
				}
			}
			
			// user defined outputfilters
			foreach ($this->smarty_outputfilter_plugin as $outputfilter) {
				if (!is_array($outputfilter)) {
					$name = str_replace('smarty_outputfilter_', '', $outputfilter);
					$this->renderer->setPlugin($name,'outputfilter', $outputfilter);
				} else {
					$this->renderer->setPlugin($outputfilter[1],'outputfilter', $outputfilter);
				}
			}
		}
		
		//テンプレートエンジンのデフォルトの設定
		$this->_setDefaultTemplateEngine($this->renderer);
		// }}}
		
		return $this->renderer;
	}
	
	/**
	 *  クライアントタイプ/言語からテンプレートディレクトリ名を決定する
	 *
	 *  @access     public
	 *  @return string  テンプレートディレクトリ
	 */
	function getTemplatedir()
	{
		$template_dir = $this->getDirectory('template');
		// メール送信時の振り分け
		if( $this->getGateway() == GATEWAY_CLI ) return "{$template_dir}/mail";
		
		// 現状ではすべてPCに対応させる
		$type = $this->getMobileType();
		$GLOBALS['MOBILETYPE'] = $type;
		// ユーザ画面の場合
		if($GLOBALS['type'] == 'user'){
			// クライアント別テンプレート
			if(TEMPLATE != 'default'){
				$template = $template_dir . '/' . TEMPLATE;
				// ディレクトリ存在確認
				if(file_exists($template)){
					return  $template;
				}
			}
		}
		// デフォルトテンプレート
		return "{$template_dir}/default";
	}
	
	/**
	 * UserAgent の値からキャリア情報を判別する
	 *
	 * return a[au],d[docomo],s[softbank],o[その他]
	 */
	function getMobileType()
	{
		$softbank_sharp = array("904SH","811SH","810SH");
		if(empty($ua)){
			$ua=$_SERVER["HTTP_USER_AGENT"];
		}
		if(preg_match("/^DoCoMo/",$ua)){
			return "docomo";
		}elseif(preg_match("/^KDDI/",$ua) || preg_match("/UP\.Browser/",$ua)){
			return "au"; 
		}elseif(preg_match("/^MOT/",$ua)){
			if(preg_match("%^MOT-([0-9a-zA-Z]+)%",$ua,$ma)){
				if(in_array($ma[1],$softbank_sharp)){
					return "softbank_sharp";
				}else{
					return "softbank";
				}
			}else{
				return "softbank";
			}
		}elseif(preg_match("/^Vodafone/",$ua)){
			if(preg_match("%^Vodafone/[0-9\.]+/V([0-9a-zA-Z]+)%",$ua,$ma)){
				if(in_array($ma[1],$softbank_sharp)){
					return "softbank_sharp";
				}else{
					return "softbank";
				}
			}else{
				return "softbank";
			}
		}elseif(preg_match("/^J-PHONE/",$ua)){
			if(preg_match("%^J-PHONE/[0-9\.]+/([0-9a-zA-Z\-]+)%",$ua,$ma)){
				if(in_array($ma[1],$softbank_sharp)){
					return "softbank_sharp";
				}else{
					return "softbank";
				}
			}else{
				return "softbank";
			}
		}elseif(preg_match("/^SoftBank/",$ua)){
			if(preg_match("%^SoftBank/[0-9\.]+/([0-9a-zA-Z\-]+)%",$ua,$ma)){
				if(in_array($ma[1],$softbank_sharp)){
					return "softbank_sharp";
				}else{
					return "softbank";
				}
			}else{
				return "softbank";
			}
		}else{
			return "pc";
		}
		return "pc";
	}

	/**#@-*/
}
?>