<?php
/**
 *  Tv_UrlHandler.php
 *
 *  @author	 {$author}
 *  @package	Tv
 *  @version	$Id: app.url_handler.php,v 1.2 2006/11/06 14:31:24 cocoitiban Exp $
 */

/**
 *  URLハンドラクラス
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	Tv
 */
class Tv_UrlHandler extends Ethna_UrlHandler
{
	/** @var	array   アクションマッピング */
	var $action_map = array(
		/*
		'user'  => array(
			'user_login' => array(
				'path'		  => 'login',
				'path_regexp'   => false,
				'path_ext'	  => false,
				'option'		=> array(),
			),
		),
		 */
	);

	/**
	 *  Tv_UrlHandlerクラスのインスタンスを取得する
	 *
	 *  @access public
	 */
	function &getInstance($class_name = null)
	{
		$instance =& parent::getInstance(__CLASS__);
		return $instance;
	}

	// {{{ ゲートウェイリクエスト正規化
	/**
	 *  リクエスト正規化(userゲートウェイ)
	 *
	 *  @access private
	 */
	/*
	function _normalizeRequest_User($http_vars)
	{
		return $http_vars;
	}
	 */
	// }}}

	// {{{ ゲートウェイパス生成
	/**
	 *  パス生成(userゲートウェイ)
	 *
	 *  @access private
	 */
	/*
	function _getPath_User($action, $param)
	{
		return array("/user", array());
	}
	 */
	// }}}

	// {{{ フィルタ
	// }}}
}

// vim: foldmethod=marker tabstop=4 shiftwidth=4 autoindent
?>
