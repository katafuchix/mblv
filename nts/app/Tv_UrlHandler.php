<?php
/**
 *  Tv_UrlHandler.php
 *
 *  @author	 {$author}
 *  @package	Tv
 *  @version	$Id: app.url_handler.php,v 1.2 2006/11/06 14:31:24 cocoitiban Exp $
 */

/**
 *  URL�ϥ�ɥ饯�饹
 *
 *  @author	 {$author}
 *  @access	 public
 *  @package	Tv
 */
class Tv_UrlHandler extends Ethna_UrlHandler
{
	/** @var	array   ���������ޥåԥ� */
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
	 *  Tv_UrlHandler���饹�Υ��󥹥��󥹤��������
	 *
	 *  @access public
	 */
	function &getInstance($class_name = null)
	{
		$instance =& parent::getInstance(__CLASS__);
		return $instance;
	}

	// {{{ �����ȥ������ꥯ������������
	/**
	 *  �ꥯ������������(user�����ȥ�����)
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

	// {{{ �����ȥ������ѥ�����
	/**
	 *  �ѥ�����(user�����ȥ�����)
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

	// {{{ �ե��륿
	// }}}
}

// vim: foldmethod=marker tabstop=4 shiftwidth=4 autoindent
?>
