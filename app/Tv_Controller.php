<?php

/** ���ץꥱ�������١����ǥ��쥯�ȥ� */
define('BASE', dirname(dirname(__FILE__)));

/** include_path������(���ץꥱ�������ǥ��쥯�ȥ���ɲ�) */
$app = BASE . "/app";
$lib = BASE . "/lib";
ini_set('include_path', ini_get('include_path') . PATH_SEPARATOR . implode(PATH_SEPARATOR, array($app, $lib)));

/** �������� */
require_once BASE . '/etc/base-ini.php';
require_once BASE . '/etc/word-ini.php';

/** ���ץꥱ�������饤�֥��Υ��󥯥롼�� */
require_once 'Ethna/Ethna.php';
require_once 'Net/UserAgent/Mobile.php';
require_once 'Net/SMTP.php';
require_once 'Mail.php';
require_once 'Mail_Mime/mime.php';

/* ���쥯�饹�� */
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

/* ���å����� */
require_once 'Tv_Session.php';
require_once 'Tv_SessionMemcache.php';

/* ���Х����� */
require_once 'Tv_AvatarGenerator.php';

/* Smarty�� */
require_once 'function.ad.php';
require_once 'function.banner.php';
require_once 'function.html_style.php';
require_once 'function.html_image_flash.php';
require_once 'block.style.php';
require_once 'modifier.jp_date_format.php';
require_once 'modifier.replace_emoji_form.php';
require_once 'modifier.truncate_emoji.php';

/** lib/Ethna�Υ��󥯥롼�� */
require_once 'Tv_Renderer.php';
require_once $lib . '/Ethna/class/Renderer/Ethna_Renderer_Smarty.php';
require_once 'renderer/Tv_Renderer_Smarty.php';

/** AppObject�Υ��󥯥롼�� */
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

// �ݥ���ȥ���⥸�塼��
require_once 'PENModule.php';

//�����ɽ����狼��䤹������⥸�塼��ν����
require_once 'Var_Dump.php';
var_dump::displayInit(array('display_mode'=>'HTML4_Table'));
//�Ȥ���
//var_dump::display($target_array);

// [print]��å�����ɽ����
function p($e,$x=false){
	if($_SERVER['REMOTE_ADDR'] == '210.172.116.113'){
		// ����ξ��
		if(is_array($e)){
			print_r($e);
		}
		// �����顼�ξ��
		else{
			print_r($e);
		}
		// ��λ����
		if($x) exit;
	}
}

// [var_dump]��å�����ɽ����
function v($e,$x=false){
	if($_SERVER['REMOTE_ADDR'] == '210.172.116.113'){
		var_dump($e);
		// ��λ����
		if($x) exit;
	}
}

/**
 *  Tv���ץꥱ�������Υ���ȥ������
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
	 *  @var string  ���ץꥱ�������ID
	 */
	var $appid = 'TV';
	
	/**
	 *  @var array   forward���
	 */
	var $forward = array(
		/*
		 *  TODO: ������forward��򵭽Ҥ��Ƥ�������
		 *
		 *  �����㡧
		 *
		 *  'index'  => array(
		 *	  'view_name' => 'Tv_View_Index',
		 *  ),
		 */
	);
	
	/**
	 *  @var array   action���
	 */
	var $action = array(
		/*
		 *  TODO: ������action����򵭽Ҥ��Ƥ�������
		 *
		 *  �����㡧
		 *
		 *  'index'  => array(),
		 */
	);
	
	/**
	 *  @var array   soap action���
	 */
	var $soap_action = array(
		/*
		 *  TODO: ������SOAP���ץꥱ��������Ѥ�action�����
		 *  ���Ҥ��Ƥ�������
		 *  �����㡧
		 *
		 *  'sample' => array(),
		 */
	);
	
	/**
	 *  @var array	   ���ץꥱ�������ǥ��쥯�ȥ�
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
	 *  @var array	   DB�����������
	 */
	var $db = array(
		'stats'			=> DB_TYPE_RW,
		''				=> DB_TYPE_RW,
	);
	
	/**
	 *  @var array	   ��ĥ������
	 */
	var $ext = array(
		'php'			   => 'php',
		'tpl'			   => 'tpl',
	);
	
	/**
	 *  @var	array   ���饹���
	 */
	var $class = array(
		/*
		 *  TODO: ���ꥯ�饹�������饹��SQL���饹�򥪡��С��饤��
		 *  �������ϲ����Υ��饹̾��˺�줺���ѹ����Ƥ�������
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
	 *  @var array	   �����оݤȤʤ�ץ饰����Υ��ץꥱ�������ID�Υꥹ��
	 */
	var $plugin_search_appids = array(
		/*
		 *  �ץ饰���󸡺����˸����оݤȤʤ륢�ץꥱ�������ID�Υꥹ�Ȥ򵭽Ҥ��ޤ���
		 *
		 *  �����㡧
		 *  Common_Plugin_Foo_Bar �Τ褦��̿̾�Υץ饰���󤬥��ץꥱ��������
		 *  �ץ饰����ǥ��쥯�ȥ��¸�ߤ����硢�ʲ��Τ褦�˻��ꤹ���
		 *  Common_Plugin_Foo_Bar, Tv_Plugin_Foo_Bar, Ethna_Plugin_Foo_Bar
		 *  �ν�˥ץ饰���󤬸�������ޤ��� 
		 *
		 *  'Common', 'Tv', 'Ethna',
		 */
		'Tv', 'Ethna',
	);
	
	/**
	 *  @var	array	   �ե��륿����
	 */
	var $filter = array(
		/*
		 *  TODO: �ե��륿�����Ѥ�����Ϥ����ˤ��Υץ饰����̾��
		 *  ���Ҥ��Ƥ�������
		 *  (���饹̾����ꤹ���filter�ǥ��쥯�ȥ꤫��ե��륿���饹
		 *  ���ɤ߹��ߤޤ�)
		 *
		 *  �����㡧
		 *
		 *  'ExecutionTime',
		 */
		 'Mobile_Filter',
	);
	
	/**
	 *  @var	array   smarty modifier���
	 */
	var $smarty_modifier_plugin = array(
		/*
		 *  TODO: �����˥桼�������smarty modifier�����򵭽Ҥ��Ƥ�������
		 *
		 *  �����㡧
		 *
		 *  'smarty_modifier_foo_bar',
		 */
		   'smarty_modifier_jp_date_format',
		   'smarty_modifier_replace_emoji_form',
		   'smarty_modifier_truncate_emoji',
	);
	
	/**
	 *  @var	array   smarty function���
	 */
	var $smarty_function_plugin = array(
		/*
		 *  TODO: �����˥桼�������smarty function�����򵭽Ҥ��Ƥ�������
		 *
		 *  �����㡧
		 *
		 *  'smarty_function_foo_bar',
		 */
		 'smarty_function_html_style',
		 'smarty_function_ad',
		 'smarty_function_banner',
	);
	
	/**
	 *  @var	array   smarty block���
	 */
	var $smarty_block_plugin = array(
		/*
		 *  TODO: �����˥桼�������smarty block�����򵭽Ҥ��Ƥ�������
		 *
		 *  �����㡧
		 *
		 *  'smarty_block_foo_bar',
		 */
		 'smarty_block_style',
	);
	
	/**
	 *  @var	array   smarty prefilter���
	 */
	var $smarty_prefilter_plugin = array(
		/*
		 *  TODO: �����˥桼�������smarty prefilter�����򵭽Ҥ��Ƥ�������
		 *
		 *  �����㡧
		 *
		 *  'smarty_prefilter_foo_bar',
		 */
	);
	
	/**
	 *  @var	array   smarty postfilter���
	 */
	var $smarty_postfilter_plugin = array(
		/*
		 *  TODO: �����˥桼�������smarty postfilter�����򵭽Ҥ��Ƥ�������
		 *
		 *  �����㡧
		 *
		 *  'smarty_postfilter_foo_bar',
		 */
	);
	
	/**
	 *  @var	array   smarty outputfilter���
	 */
	var $smarty_outputfilter_plugin = array(
		/*
		 *  TODO: �����˥桼�������smarty outputfilter�����򵭽Ҥ��Ƥ�������
		 *
		 *  �����㡧
		 *
		 *  'smarty_outputfilter_foo_bar',
		 */
	);
	
	/**
	 *  DB������֤�
	 *
	 *  @access     public
	 *  @param  string  $db_key DB����("", "r", "rw", "default", "blog_r"...)
	 *  @return string  $db_key���б�����DB�������(���̵꤬������null)
	 */
	function getDBType($db_key = null)
	{
		// ����Τʤ����ϥǥե���Ȥ�DB���֤�
		if (is_null($db_key)) {
			// �������֤�
//			return array('' => $this->db['']);
			return $this->db;
		}
		// ����Ϥ��뤬������ξ���null���֤�
		if (isset($this->db[$db_key]) == false) {
			return null;
		}
		// ������DB���֤�
		return $this->db[$db_key];
	}
	
	/**
	 *  �ƥ�ץ졼�ȥ��󥸥��������
	 *
	 *  @access     public
	 *  @return object  Ethna_Renderer  �����饪�֥�������
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
		
		//�ƥ�ץ졼�ȥ��󥸥�Υǥե���Ȥ�����
		$this->_setDefaultTemplateEngine($this->renderer);
		// }}}
		
		return $this->renderer;
	}
	
	/**
	 *  ���饤����ȥ�����/���줫��ƥ�ץ졼�ȥǥ��쥯�ȥ�̾����ꤹ��
	 *
	 *  @access     public
	 *  @return string  �ƥ�ץ졼�ȥǥ��쥯�ȥ�
	 */
	function getTemplatedir()
	{
		$template_dir = $this->getDirectory('template');
		// �᡼���������ο���ʬ��
		if( $this->getGateway() == GATEWAY_CLI ) return "{$template_dir}/mail";
		
		// �����ǤϤ��٤�PC���б�������
		$type = $this->getMobileType();
		$GLOBALS['MOBILETYPE'] = $type;
		// �桼�����̤ξ��
		if($GLOBALS['type'] == 'user'){
			// ���饤������̥ƥ�ץ졼��
			if(TEMPLATE != 'default'){
				$template = $template_dir . '/' . TEMPLATE;
				// �ǥ��쥯�ȥ�¸�߳�ǧ
				if(file_exists($template)){
					return  $template;
				}
			}
		}
		// �ǥե���ȥƥ�ץ졼��
		return "{$template_dir}/default";
	}
	
	/**
	 * UserAgent ���ͤ��饭��ꥢ�����Ƚ�̤���
	 *
	 * return a[au],d[docomo],s[softbank],o[����¾]
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