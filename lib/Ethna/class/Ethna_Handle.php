<?php
// vim: foldmethod=marker
/**
 *  Ethna_Handle.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Handle.php,v 1.11 2006/11/28 04:52:53 ichii386 Exp $
 */

// {{{ Ethna_Handle
/**
 *  Manager class of Ethna (Command Line) Handlers
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Handle
{
    /**#@+
     *  @access     private
     */

    /** @var    object  Ethna_Controller    controller���֥������� */
    var $controller;

    /** @var    object  Ethna_Controller    controller���֥�������($controller�ξ�ά��) */
    var $ctl;

    /** @var    object  Ethna_Pluguin       plugin���֥������� */
    var $plugin;

    /**#@-*/

    // {{{ constructor
    /**
     *  Ethna_Handle constructor (stub for php4)
     *
     *  @access public
     */
    function Ethna_Handle()
    {
        $this->controller =& new Ethna_Controller(GATEWAY_CLI);
        Ethna::clearErrorCallback();
        Ethna::setErrorCallback(array('Ethna_Handle', 'handleError'));

        $this->ctl =& $this->controller;
        $this->plugin =& $this->controller->getPlugin();
    }
    // }}}

    // {{{ getHandler
    /**
     *  get handler object
     *
     *  @access public
     */
    function &getHandler($id)
    {
        $name = preg_replace('/\-(.)/e', "strtoupper('\$1')", ucfirst($id));
        $handler =& $this->plugin->getPlugin('Handle', $name);
        if (Ethna::isError($handler)) {
            return $handler;
        }

        return $handler;
    }
    // }}}

    // {{{ getHandlerList
    /**
     *  get an object list of all available handlers
     *
     *  @access public
     */
    function getHandlerList()
    {
        $handler_list = $this->plugin->getPluginList('Handle');
        usort($handler_list, array($this, "_handler_sort_callback"));

        return $handler_list;
    }

    /**
     *  sort callback method
     */
    function _handler_sort_callback($a, $b)
    {
        return strcmp($a->getId(), $b->getId());
    }
    // }}}

    // {{{ getEthnaController
    /**
     *  Ethna_Controller�Υ��󥹥��󥹤��������
     *  (Ethna_Handler��ʸ̮�ǸƤӽФ���뤳�Ȥ�����)
     *
     *  @access public
     *  @static
     */
    function &getEthnaController()
    {
        return Ethna_Controller::getInstance();
    }
    // }}}

    // {{{ getAppController
    /**
     *  ���ץꥱ�������Υ���ȥ���ե�����/���饹�򸡺�����
     *
     *  @access public
     *  @static
     */
    function &getAppController($app_dir = null)
    {
        static $app_controller = null;

        if ($app_controller !== null) {
            return $app_controller;
        } else if ($app_dir === null) {
            return Ethna::raiseError('$app_dir not specified.');
        }

        $ini_file = null;
        while (is_dir($app_dir) && $app_dir != "/") {
            if (is_file("$app_dir/.ethna")) {
                $ini_file = "$app_dir/.ethna";
                break;
            }
            $app_dir = dirname($app_dir);
        }

        if ($ini_file === null) {
            return Ethna::raiseError('no .ethna file found');
        }
        
        $macro = parse_ini_file($ini_file);
        if (isset($macro['controller_file']) == false
            || isset($macro['controller_class']) == false) {
            return Ethna::raiseError('invalid .ethna file');
        }
        $file = $macro['controller_file'];
        $class = $macro['controller_class'];

        $controller_file = "$app_dir/$file";
        if (is_file($controller_file) == false) {
            return Ethna::raiseError("no such file $controller_file");
        }

        include_once $controller_file;
        if (class_exists($class) == false) {
            return Ethna::raiseError("no such class $class");
        }

        $global_controller =& $GLOBALS['_Ethna_controller'];
        $app_controller =& new $class(GATEWAY_CLI);
        $GLOBALS['_Ethna_controller'] =& $global_controller;
        Ethna::clearErrorCallback();
        Ethna::setErrorCallback(array('Ethna_Handle', 'handleError'));

        return $app_controller;
    }
    // }}}

    // {{{ getMasterSetting
    /**
     *  Ethna ���Τ������������� (ethna���ޥ����)
     *
     *  @param  $section    ini �ե������ section
     *  @access public
     */
    function &getMasterSetting($section = null)
    {
        static $setting = null;
        if ($setting === null) {
            $ini_file = ETHNA_BASE . "/.ethna";
            if (is_file($ini_file) == false || is_readable($ini_file) == false) {
                $setting = array();
            }
            $setting = parse_ini_file($ini_file, true);
        }

        if ($section === null) {
            return $setting;
        } else if (array_key_exists($section, $setting)) {
            return $setting[$section];
        } else {
            return array();
        }
    }
    // }}}

    // {{{ handleError
    /**
     *  Ethna ���ޥ�ɤǤΥ��顼�ϥ�ɥ��
     */
    function handleError(&$eobj)
    {
        // do nothing.
    }
    // }}}
}
// }}}
?>
