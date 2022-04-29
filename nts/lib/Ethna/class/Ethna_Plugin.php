<?php
// vim: foldmethod=marker
/**
 *  Ethna_Plugin.php
 *
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @author     Kazuhiro Hosoi <hosoi@gree.co.jp>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin.php,v 1.13 2006/11/28 04:52:54 ichii386 Exp $
 */

// {{{ Ethna_Plugin
/**
 *  �ץ饰���󥯥饹
 *  
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @author     Kazuhiro Hosoi <hosoi@gree.co.jp>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin
{
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_Controller    ����ȥ��饪�֥������� */
    var $controller;

    /** @var    object  Ethna_Controller    ����ȥ��饪�֥�������($controller�ξ�ά��) */
    var $ctl;

    /** @var    object  Ethna_Logger        �����֥������� */
    var $logger;

    /** @var    array   �ץ饰����Υ��֥�������(���󥹥���)����¸�������� */
    var $obj_registry = array();

    /** @var    array   �ץ饰����Υ��饹̾���������ե�����̾����¸�������� */
    var $src_registry = array();

    /** @var    array       �����оݤȤʤ�ץ饰����Υ��ץꥱ�������ID�Υꥹ�� */
    var $appid_list;

    /**#@-*/

    // {{{ ���󥹥ȥ饯��
    /**
     *  Ethna_Plugin�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Controller    $controller ����ȥ��饪�֥�������
     */
    function Ethna_Plugin(&$controller)
    {
        $this->controller =& $controller;
        $this->ctl =& $this->controller;
        $this->logger = null;
        if (isset($this->controller->plugin_search_appids)
            && is_array($this->controller->plugin_search_appids)) {
            $this->appid_list =& $this->controller->plugin_search_appids;
        } else {
            $this->appid_list = array($this->controller->getAppId(), 'Ethna');
        }
    }

    /**
     *  logger��set���롣
     *
     *  LogWriter��plugin�ʤΤǡ�plugin���󥹥��󥹺��������Ǥ�
     *  logger�˰�¸���ʤ��褦�ˤ��롣
     *
     *  @access public
     *  @param  object  Ethna_Logger    $logger �����֥�������
     */
    function setLogger(&$logger)
    {
        if ($this->logger === null && is_object($logger)) {
            $this->logger =& $logger;
        }
    }
    // }}}

    // {{{ �ץ饰����ƤӽФ����󥿥ե�����
    /**
     *  �ץ饰����Υ��󥹥��󥹤����
     *
     *  @access public
     *  @param  string  $type   �ץ饰����μ���
     *  @param  string  $name   �ץ饰�����̾��
     *  @return object  �ץ饰����Υ��󥹥���
     */
    function &getPlugin($type, $name)
    {
        return $this->_getPlugin($type, $name);
    }

    /**
     *  ������� ($type) �Υץ饰���� ($name) �����ꥹ�Ȥ����
     *
     *  @access public
     *  @param  string  $type   �ץ饰����μ���
     *  @return array   �ץ饰���󥪥֥������Ȥ�����
     */
    function getPluginList($type)
    {
        $plugin_list = array();

        $this->searchAllPluginSrc($type);
        if (isset($this->src_registry[$type]) == false) {
            return $plugin_list;
        }
        foreach ($this->src_registry[$type] as $name => $value) {
            if (is_null($value)) {
                continue;
            }
            $plugin_list[$name] =& $this->getPlugin($type, $name);
        }
        return $plugin_list;
    }
    // }}}

    // {{{ obj_registry �Υ�������
    /**
     *  �ץ饰����Υ��󥹥��󥹤�쥸���ȥ꤫�����
     *
     *  @access private
     *  @param  string  $type   �ץ饰����μ���
     *  @param  string  $name   �ץ饰�����̾��
     *  @return object  �ץ饰����Υ��󥹥���
     */
    function &_getPlugin($type, $name)
    {
        if (isset($this->obj_registry[$type]) == false) {
            $this->obj_registry[$type] = array();

            // �ץ饰����οƥ��饹��(¸�ߤ����)�ɤ߹���
            foreach ($this->appid_list as $appid) {
                list($class, $dir, $file) = $this->getPluginNaming($type, null, $appid);
                $this->_includePluginSrc($class, $dir, $file, true);
            }
        }

        // key ���ʤ��Ȥ��ϥץ饰�������ɤ���
        if (array_key_exists($name, $this->obj_registry[$type]) == false) {
            $this->_loadPlugin($type, $name);
        }

        // null �ΤȤ��ϥ��ɤ˼��Ԥ��Ƥ���
        if (is_null($this->obj_registry[$type][$name])) {
            return Ethna::raiseWarning('plugin [type=%s, name=%s] is not found', E_PLUGIN_NOTFOUND, $type, $name);
        }

        // �ץ饰����Υ��󥹥��󥹤��֤�
        return $this->obj_registry[$type][$name];
    }

    /**
     *  �ץ饰�����include����new�����쥸���ȥ����Ͽ
     *
     *  @access private
     *  @param  string  $type   �ץ饰����μ���
     *  @param  string  $name   �ץ饰�����̾��
     */
    function _loadPlugin($type, $name)
    {
        // �ץ饰����Υե�����̾�����
        $plugin_src = $this->_getPluginSrc($type, $name);
        if (is_null($plugin_src)) {
            $this->obj_registry[$type][$name] = null;
            return;
        }
        list($plugin_class, $plugin_dir, $plugin_file) = $plugin_src;

        // �ץ饰����Υե�������ɤ߹���
        $r =& $this->_includePluginSrc($plugin_class, $plugin_dir, $plugin_file);
        if (Ethna::isError($r)) {
            $this->obj_registry[$type][$name] = null;
            return;
        }

        // �ץ饰�������
        $instance =& new $plugin_class($this->controller, $type, $name);
        if (is_object($instance) == false
            || strcasecmp(get_class($instance), $plugin_class) != 0) {
            $this->logger->log(LOG_WARNING, 'plugin [%s::%s] instantiation failed', $type, $name);
            $this->obj_registry[$type][$name] = null;
            return;
        }
        $this->obj_registry[$type][$name] =& $instance;
    }

    /**
     *  �ץ饰����Υ��󥹥��󥹤�쥸���ȥ꤫��ä�
     *
     *  @access private
     *  @param  string  $type   �ץ饰����μ���
     *  @param  string  $name   �ץ饰�����̾��
     */
    function _unloadPlugin($type, $name)
    {
        unset($this->obj_registry[$type][$name]);
    }
    // }}}

    // {{{ src_registry �Υ�������
    /**
     *  �ץ饰����Υ������ե�����̾�ȥ��饹̾��쥸���ȥ꤫�����
     *
     *  @access private
     *  @param  string  $type   �ץ饰����μ���
     *  @param  string  $name   �ץ饰�����̾��
     *  @return array   �������ե�����̾�ȥ��饹̾����ʤ�����
     */
    function _getPluginSrc($type, $name)
    {
        if (isset($this->src_registry[$type]) == false) {
            $this->src_registry[$type] = array();
        }

        // key ���ʤ��Ȥ��ϥץ饰����θ����򤹤�
        if (array_key_exists($name, $this->src_registry[$type]) == false) {
            $this->_searchPluginSrc($type, $name);
        }

        // �ץ饰����Υ��������֤�
        return $this->src_registry[$type][$name];
    }
    // }}}

    // {{{ �ץ饰����ե����븡����ʬ
    /**
     *  �ץ饰����Υ��饹̾���ǥ��쥯�ȥꡢ�ե�����̾�����
     *
     *  @access public
     *  @param  string  $type   �ץ饰����μ���
     *  @param  string  $name   �ץ饰�����̾�� (null�ΤȤ��Ͽƥ��饹)
     *  @param  string  $appid  ���ץꥱ�������ID
     *  @return array   �ץ饰����Υ��饹̾���ǥ��쥯�ȥꡢ�ե�����̾������
     *  @todo   class factory��naming rule�����礵����
     */
    function getPluginNaming($type, $name, $appid)
    {
        if ($appid == 'Ethna') {
            if ($name === null) {
                $ext = 'php';
                $dir = ETHNA_BASE . "/class/Plugin";
                $class = "Ethna_Plugin_{$type}";
            } else {
                $ext = 'php';
                $dir = ETHNA_BASE . "/class/Plugin/{$type}";
                $class = "Ethna_Plugin_{$type}_{$name}";
            }
        } else {
            if ($name === null) {
                $ext = $this->controller->getExt('php');
                $dir = $this->controller->getDirectory('plugin');
                $class = "{$appid}_Plugin_{$type}";
            } else {
                $ext = $this->controller->getExt('php');
                $dir = $this->controller->getDirectory('plugin') . "/{$type}";
                $class = "{$appid}_Plugin_{$type}_{$name}";
            }
        }

        $file  = "{$class}.{$ext}";
        return array($class, $dir, $file);
    }

    /**
     *  �ץ饰����Υ������� include ����
     *
     *  @access private
     *  @param  string  $class  ���饹̾
     *  @param  string  $dir    �ǥ��쥯�ȥ�̾
     *  @param  string  $file   �ե�����̾
     *  @param  bool    $parent �ƥ��饹���ɤ����Υե饰
     *  @return true|Ethna_Error
     */
    function &_includePluginSrc($class, $dir, $file, $parent = false)
    {
        $true = true;
        $file = $dir . '/' . $file;

        if (file_exists($file) === false) {
            if ($parent === false) {
                return Ethna::raiseWarning('plugin file is not found: [%s]',
                                           E_PLUGIN_NOTFOUND, $file);
            } else {
                return $true;
            }
        }

        include_once $file;

        if (class_exists($class) === false) {
            if ($parent === false) {
                return Ethna::raiseWarning('plugin class [%s] is not defined', E_PLUGIN_NOTFOUND, $class);
            } else {
                return $true;
            }
        }

        if ($parent === false) {
            $this->logger->log(LOG_DEBUG, 'plugin class [%s] is defined', $class);
        }
        return $true;
    }

    /**
     *  ���ץꥱ�������, Ethna �ν�ǥץ饰����Υ������򸡺�����
     *
     *  @access private
     *  @param  string  $type   �ץ饰����μ���
     *  @param  string  $name   �ץ饰�����̾��
     */
    function _searchPluginSrc($type, $name)
    {
        // ����ȥ���ǻ��ꤵ�줿���ץꥱ�������ID�ν�˸���
        foreach ($this->appid_list as $appid) {
            list($class, $dir, $file) = $this->getPluginNaming($type, $name, $appid);
            if (file_exists("{$dir}/{$file}")) {
                $this->logger->log(LOG_DEBUG, 'plugin file is found in search: [%s]',
                                   "{$dir}/{$file}");
                if (isset($this->src_registry[$type]) == false) {
                    $this->src_registry[$type] = array();
                }
                $this->src_registry[$type][$name] = array($class, $dir, $file);
                return;
            }
        }

        // ���Ĥ���ʤ��ä���� (null�ǵ������Ƥ���)
        $this->logger->log(LOG_WARNING, 'plugin file for [type=%s, name=%s] is not found in search', $type, $name);
        $this->src_registry[$type][$name] = null;
    }

    /**
     *  �ץ饰����μ��� ($type) �򤹤٤Ƹ�������
     *
     *  @access public
     *  @return array
     */
    function searchAllPluginType()
    {
        $type_list = array();
        foreach (array_reverse($this->appid_list) as $appid) {
            list(, $dir, ) = $this->getPluginNaming('', null, $appid);
            if (is_dir($dir) == false) {
                continue;
            }
            $dh = opendir($dir);
            if (is_resource($dh) == false) {
                continue;
            }
            while (($type_dir = readdir($dh)) !== false) {
                if ($type_dir{0} != '.' && is_dir("{$dir}/{$type_dir}")) {
                    $type_list[$type_dir] = 0;
                }
            }
            closedir($dh);
        }
        return array_keys($type_list);
    }

    /**
     *  ���ꤵ�줿 $type �Υץ饰���� (�Υ�����) �򤹤٤Ƹ�������
     *
     *  @access public
     *  @param  string  $type   �ץ饰����μ���
     */
    function searchAllPluginSrc($type)
    {
        // ��Ǹ��դ��ä���ΤǾ�񤭤���Τ� $this->appid_list �εս�Ȥ���
        $name_list = array();
        foreach (array_reverse($this->appid_list) as $appid) {
            list($class_regexp, $dir, $file_regexp) = $this->getPluginNaming($type, '([^_]+)', $appid);

            //�ǥ��쥯�ȥ��¸�ߤΥ����å�
            if (is_dir($dir) == false) {
                // ���ץ�¦�Ǹ��դ���ʤ��Τ�����
                continue;
            }

            // �ǥ��쥯�ȥ�򳫤�
            $dh = opendir($dir);
            if (is_resource($dh) == false) {
                $this->logger->log(LOG_DEBUG, 'cannot open plugin directory: [%s]', $dir);
                continue;
            }
            $this->logger->log(LOG_DEBUG, 'plugin directory opened: [%s]', $dir);

            // ���ˤ��� $name ��ꥹ�Ȥ��ɲ�
            while (($file = readdir($dh)) !== false) {
                if (preg_match('#^'.$file_regexp.'$#', $file, $matches)
                    && file_exists("{$dir}/{$file}")) {
                    $name_list[$matches[1]] = true;
                }
            }

            closedir($dh);
        }

        foreach (array_keys($name_list) as $name) {
            // ��Ĺ�����⤦����õ���ʤ���
            $this->_searchPluginSrc($type, $name);
        }
    }
    // }}}

    // {{{ static �� include �᥽�å�
    /**
     *  Ethna ������°�Υץ饰����Υ������� include ����
     *
     *  @access public
     *  @param  string  $type   �ץ饰����μ���
     *  @param  string  $name   �ץ饰�����̾��
     *  @static
     */
    function includeEthnaPlugin($type, $name)
    {
        Ethna_Plugin::includePlugin($type, $name, 'Ethna');
    }

    /**
     *  �ץ饰����Υ������� include ����
     *
     *  @access public
     *  @param  string  $type   �ץ饰����μ���
     *  @param  string  $name   �ץ饰�����̾��
     *  @param  string  $appid  ���ץꥱ�������ID
     *  @static
     */
    function includePlugin($type, $name, $appid = null)
    {
        $ctl =& Ethna_Controller::getInstance();
        $plugin =& $ctl->getPlugin();

        if ($appid === null) {
            $appid = $ctl->getAppId();
        }
        list($class, $dir, $file) = $plugin->getPluginNaming($type, $name, $appid);
        $plugin->_includePluginSrc($class, $dir, $file);
    }
    // }}}
}
// }}}
?>
