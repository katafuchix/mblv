<?php
// vim: foldmethod=marker
/**
 *  Ethna_ClassFactory.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_ClassFactory.php,v 1.15 2006/11/28 04:52:53 ichii386 Exp $
 */

// {{{ Ethna_ClassFactory
/**
 *  Ethna�ե졼�����Υ��֥����������������ȥ�����
 *
 *  DI����ƥʤ����Ȥ������Ȥ�ͤ��ޤ�����Ethna�ǤϤ������٤�ñ��ʤ�Τ�
 *  α��Ƥ����ޤ������ץꥱ��������٥�DI���������ϥե��륿���������
 *  �ȤäƼ¸����뤳�Ȥ����ޤ���
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_ClassFactory
{
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_Controller    controller���֥������� */
    var $controller;

    /** @var    object  Ethna_Controller    controller���֥�������(��ά��) */
    var $ctl;
    
    /** @var    array   ���饹��� */
    var $class = array();

    /** @var    array   �����Ѥߥ��֥������ȥ���å��� */
    var $object = array();

    /** @var    array   �����Ѥߥ��ץꥱ�������ޥ͡����㥪�֥������ȥ���å��� */
    var $manager = array();

    /** @var    array   �᥽�åɰ�������å��� */
    var $method_list = array();

    /**#@-*/


    /**
     *  Ethna_ClassFactory���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Controller    &$controller    controller���֥�������
     *  @param  array                       $class          ���饹���
     */
    function Ethna_ClassFactory(&$controller, $class)
    {
        $this->controller =& $controller;
        $this->ctl =& $controller;
        $this->class = $class;
    }

    /**
     *  type���б����륢�ץꥱ�������ޥ͡����㥪�֥������Ȥ��֤�
     *
     *  @access public
     *  @return object  Ethna_AppManager    �ޥ͡����㥪�֥�������
     */
    function &getManager($type, $weak = false)
    {
        $obj = null;

        // check if object class exists
        $obj_class_name = $this->controller->getObjectClassName($type);
        if (class_exists($obj_class_name) === false) {
            // try include.
            $this->_include($obj_class_name);
        }

        // check if manager class exists
        $class_name = $this->controller->getManagerClassName($type);
        if (class_exists($class_name) === false
            && $this->_include($class_name) === false) {
            return $obj;
        }

        if (isset($this->method_list[$class_name]) == false) {
            $this->method_list[$class_name] = get_class_methods($class_name);
            for ($i = 0; $i < count($this->method_list[$class_name]); $i++) {
                $this->method_list[$class_name][$i] = strtolower($this->method_list[$class_name][$i]);
            }
        }

        // see if this should be singlton or not
        if ($this->_isCacheAvailable($class_name, $this->method_list[$class_name], $weak)) {
            if (isset($this->manager[$type]) && is_object($this->manager[$type])) {
                return $this->manager[$type];
            }
        }

        // see if we have helper methods
        if (in_array("getinstance", $this->method_list[$class_name])) {
            $obj =& call_user_func(array($class_name, 'getInstance'));
        } else {
            $backend =& $this->controller->getBackend();
            $obj =& new $class_name($backend);
        }

        if (isset($this->manager[$type]) == false || is_object($this->manager[$type]) == false) {
            $this->manager[$type] =& $obj;
        }

        return $obj;
    }

    /**
     *  ���饹�������б����륪�֥������Ȥ��֤�/���饹������̤����ξ���AppObject��õ��
     *
     *  @access public
     *  @param  string  $key    ���饹����
     *  @param  bool    $weak   ���֥������Ȥ�̤�����ξ��ζ��������ե饰(default: false)
     *  @return object  �������줿���֥�������(���顼�ʤ�null)
     */
    function &getObject($key, $ext = false)
    {
        $object = null;

        $ext = to_array($ext);
        if (isset($this->class[$key]) == false) {
            // app object
            $class_name = $this->controller->getObjectClassName($key);
            $ext = array_pad($ext, 3, null);
            list($key_type, $key_value, $prop) = $ext;
        } else {
            // ethna classes
            $class_name = $this->class[$key];
            $ext = array_pad($ext, 1, null);
            list($weak) = $ext;
        }

        // try to include if not defined
        if (class_exists($class_name) == false) {
            if ($this->_include($class_name) == false) {
                return $object;
            }
        }

        // handle app object first
        if (isset($this->class[$key]) == false) {
            $backend =& $this->controller->getBackend();
            $object =& new $class_name($backend, $key_type, $key_value, $prop);
            return $object;
        }

        if (isset($this->method_list[$class_name]) == false) {
            $this->method_list[$class_name] = get_class_methods($class_name);
            for ($i = 0; $i < count($this->method_list[$class_name]); $i++) {
                $this->method_list[$class_name][$i] = strtolower($this->method_list[$class_name][$i]);
            }
        }

        // see if this should be singlton or not
        if ($this->_isCacheAvailable($class_name, $this->method_list[$class_name], $weak)) {
            if (isset($this->object[$key]) && is_object($this->object[$key])) {
                return $this->object[$key];
            }
        }

        // see if we have helper methods
        $method = sprintf('_getObject_%s', ucfirst($key));
        if (method_exists($this, $method)) {
            $object =& $this->$method($class_name);
        } else if (in_array("getinstance", $this->method_list[$class_name])) {
            $object =& call_user_func(array($class_name, 'getInstance'));
        } else {
            $object =& new $class_name();
        }

        if (isset($this->object[$key]) == false || is_object($this->object[$key]) == false) {
            $this->object[$key] =& $object;
        }

        return $object;
    }

    /**
     *  ���饹�������б����륯�饹̾���֤�
     *
     *  @access public
     *  @param  string  $key    ���饹����
     *  @return string  ���饹̾
     */
    function getObjectName($key)
    {
        if (isset($this->class[$key]) == false) {
            return null;
        }

        return $this->class[$key];
    }

    /**
     *  ���֥������������᥽�å�(backend)
     *
     *  @access protected
     *  @param  string  $class_name     ���饹̾
     *  @return object  �������줿���֥�������(���顼�ʤ�null)
     */
    function &_getObject_Backend($class_name)
    {
        $_ret_object =& new $class_name($this->ctl);
        return $_ret_object;
    }

    /**
     *  ���֥������������᥽�å�(config)
     *
     *  @access protected
     *  @param  string  $class_name     ���饹̾
     *  @return object  �������줿���֥�������(���顼�ʤ�null)
     */
    function &_getObject_Config($class_name)
    {
        $_ret_object =& new $class_name($this->ctl);
        return $_ret_object;
    }

    /**
     *  ���֥������������᥽�å�(i18n)
     *
     *  @access protected
     *  @param  string  $class_name     ���饹̾
     *  @return object  �������줿���֥�������(���顼�ʤ�null)
     */
    function &_getObject_I18n($class_name)
    {
        $_ret_object =& new $class_name($this->ctl->getDirectory('locale'), $this->ctl->getAppId());
        return $_ret_object;
    }

    /**
     *  ���֥������������᥽�å�(logger)
     *
     *  @access protected
     *  @param  string  $class_name     ���饹̾
     *  @return object  �������줿���֥�������(���顼�ʤ�null)
     */
    function &_getObject_Logger($class_name)
    {
        $_ret_object =& new $class_name($this->ctl);
        return $_ret_object;
    }

    /**
     *  ���֥������������᥽�å�(plugin)
     *
     *  @access protected
     *  @param  string  $class_name     ���饹̾
     *  @return object  �������줿���֥�������(���顼�ʤ�null)
     */
    function &_getObject_Plugin($class_name)
    {
        $_ret_object =& new $class_name($this->ctl);
        return $_ret_object;
    }

    /**
     *  ���֥������������᥽�å�(renderer)
     *
     *  @access protected
     *  @param  string  $class_name     ���饹̾
     *  @return object  �������줿���֥�������(���顼�ʤ�null)
     */
    function &_getObject_Renderer($class_name)
    {
        $_ret_object =& new $class_name($this->ctl);
        return $_ret_object;
    }

    /**
     *  ���֥������������᥽�å�(session)
     *
     *  @access protected
     *  @param  string  $class_name     ���饹̾
     *  @return object  �������줿���֥�������(���顼�ʤ�null)
     */
    function &_getObject_Session($class_name)
    {
        $_ret_object =& new $class_name($this->ctl->getAppId(), $this->ctl->getDirectory('tmp'), $this->ctl->getLogger());
        return $_ret_object;
    }

    /**
     *  ���֥������������᥽�å�(sql)
     *
     *  @access protected
     *  @param  string  $class_name     ���饹̾
     *  @return object  �������줿���֥�������(���顼�ʤ�null)
     */
    function &_getObject_Sql($class_name)
    {
        $_ret_object =& new $class_name($this->ctl);
        return $_ret_object;
    }

    /**
     *  ���ꤵ�줿���饹�������ꤵ���ե������include����
     *
     *  @access protected
     */
    function _include($class_name)
    {
        $file = sprintf("%s.%s", $class_name, $this->controller->getExt('php'));
        if (file_exists_ex($file)) {
            include_once $file;
            return true;
        }

        if (preg_match('/^(\w+?)_(.*)/', $class_name, $match)) {
            // try ethna app style
            // App_Foo_Bar_Baz -> Foo/Bar/App_Foo_Bar_Baz.php
            $tmp = explode("_", $match[2]);
            $tmp[count($tmp)-1] = $class_name;
            $file = sprintf('%s.%s',
                            implode(DIRECTORY_SEPARATOR, $tmp),
                            $this->controller->getExt('php'));
            if (file_exists_ex($file)) {
                include_once $file;
                return true;
            }

            // try ethna app & pear mixed style
            // App_Foo_Bar_Baz -> Foo/Bar/Baz.php
            $file = sprintf('%s.%s',
                            str_replace('_', DIRECTORY_SEPARATOR, $match[2]),
                            $this->controller->getExt('php'));
            if (file_exists_ex($file)) {
                include_once $file;
                return true;
            }

            // try ethna master style
            // Ethna_Foo_Bar -> class/Ethna/Foo/Ethna_Foo_Bar.php
            array_unshift($tmp, 'Ethna', 'class');
            $file = sprintf('%s.%s',
                            implode(DIRECTORY_SEPARATOR, $tmp),
                            $this->controller->getExt('php'));
            if (file_exists_ex($file)) {
                include_once $file;
                return true;
            }

            // try pear style
            // Foo_Bar_Baz -> Foo/Bar/Baz.php
            $file = sprintf('%s.%s',
                            str_replace('_', DIRECTORY_SEPARATOR, $class_name),
                            $this->controller->getExt('php'));
            if (file_exists_ex($file)) {
                include_once $file;
                return true;
            }
        }
        return false;
    }

    /**
     *  ���ꤵ�줿���饹������å�������Ѳ�ǽ���ɤ���������å�����
     *
     *  @access protected
     */
    function _isCacheAvailable($class_name, $method_list, $weak)
    {
        // if we have getInstance(), use this anyway
        if (in_array('getinstance', $method_list)) {
            return false;
        }

        // if not, see if weak or not
        return $weak ? false : true;
    }
}
// }}}
?>
