<?php
// vim: foldmethod=marker
/**
 *  Ethna_InfoManager.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_InfoManager.php,v 1.13 2006/11/28 04:52:53 ichii386 Exp $
 */

// {{{ Ethna_InfoManager
/**
 *  Ethna�ޥ͡����㥯�饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_InfoManager extends Ethna_AppManager
{
    /**#@+
     *  @access private
     */
    
    /** @var    object  Ethna_Controller    ����ȥ��饪�֥������� */
    var $ctl;

    /** @var    object  Ethna_ClassFactory  ���饹�ե����ȥꥪ�֥������� */
    var $class_factory;

    /** @var    array   ��������󥹥���ץȲ��Ϸ�̥���å���ե����� */
    var $cache_class_list_file;

    /** @var    array   ��������󥹥���ץȲ��Ϸ�̥���å��� */
    var $cache_class_list;

    /** @var    array   [°��]DB�����װ��� */
    var $db_type_list = array(
        DB_TYPE_RW      => array('name' => 'DB_TYPE_RW'),
        DB_TYPE_RO      => array('name' => 'DB_TYPE_RO'),
        DB_TYPE_MISC    => array('name' => 'DB_TYPE_MISC'),
    );

    /** @var    array   [°��]�ե����෿���� */
    var $form_type_list = array(
        FORM_TYPE_TEXT      => array('name' => '�ƥ����ȥܥå���'),
        FORM_TYPE_PASSWORD  => array('name' => '�ѥ����'),
        FORM_TYPE_TEXTAREA  => array('name' => '�ƥ����ȥ��ꥢ'),
        FORM_TYPE_SELECT    => array('name' => '���쥯�ȥܥå���'),
        FORM_TYPE_RADIO     => array('name' => '�饸���ܥ���'),
        FORM_TYPE_CHECKBOX  => array('name' => '�����å��ܥå���'),
        FORM_TYPE_SUBMIT    => array('name' => '�ե����������ܥ���'),
        FORM_TYPE_FILE      => array('name' => '�ե�����'),
    );

    /** @var    array   [°��]�ѿ������� */
    var $var_type_list = array(
        VAR_TYPE_INT        => array('name' => '����'),
        VAR_TYPE_FLOAT      => array('name' => '��ư��������'),
        VAR_TYPE_STRING     => array('name' => 'ʸ����'),
        VAR_TYPE_DATETIME   => array('name' => '����'),
        VAR_TYPE_BOOLEAN    => array('name' => '������'),
        VAR_TYPE_FILE       => array('name' => '�ե�����'),
    );

    /**#@-*/

    /**
     *  Ethna_InfoManager�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Backend   &$backend   Ethna_Backend���֥�������
     */
    function Ethna_InfoManager(&$backend)
    {
        parent::Ethna_AppManager($backend);
        $this->ctl =& Ethna_Controller::getInstance();
        $this->class_factory =& $this->ctl->getClassFactory();

        // ��������󥹥���ץȲ��Ϸ�̥���å������
        $this->cache_class_list_file = sprintf('%s/ethna_info_class_list', $this->ctl->getDirectory('tmp'));
        if (file_exists($this->cache_class_list_file) && filesize($this->cache_class_list_file) > 0) {
            $fp = fopen($this->cache_class_list_file, 'r');
            $s = fread($fp, filesize($this->cache_class_list_file));
            fclose($fp);
            $this->cache_class_list = unserialize($s);
        }
    }

    /**
     *  ����Ѥߥ��������������������
     *
     *  @access public
     *  @return array   ������������
     */
    function getActionList()
    {
        $r = array();

        // ��������󥹥���ץȤ���Ϥ���
        $class_list = $this->_analyzeActionList();

        // ����������������ȥ����
        list($manifest_action_list, $manifest_class_list) = $this->_getActionList_Manifest($class_list);

        // ��������������ά����ȥ����
        $implicit_action_list = $this->_getActionList_Implicit($class_list, $manifest_action_list, $manifest_class_list);

        $r = array_merge($manifest_action_list, $implicit_action_list);
        ksort($r);

        // �����������������䴰
        $r = $this->_addActionList($r);

        return $r;
    }

    /**
     *  ����Ѥ�������������������
     *
     *  @access public
     *  @return array   ���������
     */
    function getForwardList()
    {
        $r = array();

        // �ƥ�ץ졼��/�ӥ塼������ץȤ���Ϥ���
        $forward_list = $this->_analyzeForwardList();

        // �ӥ塼�������ȥ����
        $manifest_forward_list = $this->_getForwardList_Manifest($forward_list);

        // �ӥ塼�����ά����ȥ����
        $implicit_forward_list = $this->_getForwardList_Implicit($forward_list, $manifest_forward_list);

        $r = array_merge($manifest_forward_list, $implicit_forward_list);
        ksort($r);

        return $r;
    }

    /**
     *  �ǥ��쥯�ȥ�ʲ��Υ�������󥹥���ץȤ���Ϥ���
     *
     *  @access private
     *  @param  string  $action_dir     �����оݤΥǥ��쥯�ȥ�
     *  @return array   ��������󥯥饹�������
     */
    function _analyzeActionList($action_dir = null)
    {
        $r = array();
        $cache_update = false;

        if (is_null($action_dir)) {
            $cache_update = true;
            $action_dir = $this->ctl->getActiondir();
        }
        $prefix_len = strlen($this->ctl->getActiondir());

        $child_dir_list = array();

        $dh = opendir($action_dir);
        if ($dh == false) {
            return;
        }

        $ext = $this->ctl->getExt('php');
        while (($file = readdir($dh)) !== false) {
            if ($file == "." || $file == "..") {
                continue;
            }
            $file = $action_dir . $file;

            if (is_dir($file)) {
                $child_dir_list[] = $file;
                continue;
            }

            if (preg_match("/\.$ext\$/", $file) == 0) {
                continue;
            }

            $key = substr($file, $prefix_len);
            
            // ����å�������å�
            include_once $file;
            if ($this->cache_class_list[$key]['.mtime'] >= filemtime($file)) {
                $class_list = $this->cache_class_list[$key];
            } else {
                $class_list = $this->_analyzeActionScript($file);
            }
            if (is_null($class_list) == false) {
                $r[$key] = $class_list;
            }
        }

        closedir($dh);

        foreach ($child_dir_list as $child_dir) {
            $tmp = $this->_analyzeActionList($child_dir . "/");
            $r = array_merge($r, $tmp);
        }

        if ($cache_update) {
            // ����å���ե����빹��
            $fp = fopen($this->cache_class_list_file, 'w');
            fwrite($fp, serialize($r));
            fclose($fp);
        }

        return $r;
    }

    /**
     *  ��������󥹥���ץȤ���Ϥ���
     *
     *  @access private
     *  @param  string  $script �ե�����̾
     *  @return array   ��������󥯥饹�������
     */
    function _analyzeActionScript($script)
    {
        $class_list = array();
        $class_list['.mtime'] = filemtime($script);

        $source = "";
        $fp = fopen($script, 'r');
        if ($fp == false) {
            return null;
        }
        while (feof($fp) == false) {
            $source .= fgets($fp, 8192);
        }
        fclose($fp);

        // �ȡ������ʬ�䤷�ƥ��饹�����������
        $token_list = token_get_all($source);
        $state = 'T_OUT';
        $nest = 0;
        $current = null;
        for ($i = 0; $i < count($token_list); $i++) {
            $token = $token_list[$i];

            if (is_string($token)) {
                if ($token == '{') {
                    $nest++;
                } else if ($token == '}') {
                    $nest--;
                    if ($state == 'T_PREPARE' || $state == 'T_PERFORM') {
                        if ($nest == $method_nest) {
                            $state = 'T_ACTION_CLASS';
                        }
                    } else if ($nest == 0) {
                        $state = 'T_OUT';
                    }
                }
                continue;
            }

            if ($token[0] == T_CLASS) {
                // ���饹�������
                $i += 2;
                $class_name = $token_list[$i][1];       // should be T_STRING
                if ($this->_isSubclassOf($class_name, 'Ethna_ActionClass')) {
                    $state = 'T_ACTION_CLASS';
                    $current = $class_name;
                    $class_list[$current] = array('type' => 'action_class');
                } else if ($this->_isSubclassOf($class_name, 'Ethna_ActionForm')) {
                    $state = 'T_ACTION_FORM';
                    $current = $class_name;
                    $class_list[$current] = array('type' => 'action_form');
                }
                $nest = 0;  // for safe
            } else if ($token[0] == T_COMMENT && strncmp($token[1], "/**", 3) == 0 && is_array($token_list[$i+2]) && $token_list[$i+2][0] == T_CLASS) {
                // DocComment for class
            } else if ($state == 'T_ACTION_CLASS' && $token[0] == T_FUNCTION) {
                $i += 2;
                $method_name = $token_list[$i][1];
                if (strcasecmp($method_name, 'prepare') == 0) {
                    $state = 'T_PREPARE';
                    $method_nest = $nest;
                } else if (strcasecmp($method_name, 'perform') == 0) {
                    $state = 'T_PERFORM';
                    $method_nest = $nest;
                }
            } else if (($state == 'T_PREPARE' || $state == 'T_PERFORM') && $token[0] == T_RETURN) {
                $s = "";
                $n = 2;
                while ($token_list[$i+$n] !== ";") {
                    $s .= is_string($token_list[$i+$n]) ? $token_list[$i+$n] : $token_list[$i+$n][1];
                    $n++;
                }
                $key = $state == 'T_PREPARE' ? 'prepare' : 'perform';
                $class_list[$current]['return'][$key][] = $s;
            }
        }

        if (count($class_list) == 0) {
            return null;
        }
        return $class_list;
    }

    /**
     *  ���ꤵ�줿���饹̾��Ѿ����Ƥ��뤫�ɤ������֤�
     *
     *  @access private
     *  @param  string  $class_name     �����å��оݤΥ��饹̾
     *  @param  string  $parent_name    �ƥ��饹̾
     *  @return bool    true:�Ѿ����Ƥ��� false:���ʤ�
     */
    function _isSubclassOf($class_name, $parent_name)
    {
        while ($tmp = get_parent_class($class_name)) {
            if (strcasecmp($tmp, $parent_name) == 0) {
                return true;
            }
            $class_name = $tmp;
        }
        return false;
    }

    /**
     *  ����ȥ��������Ū���������Ƥ��륢�������������������
     *
     *  @access private
     *  @param  array   �������Ƥ��륯�饹����
     *  @return array   array(������������, ���饹����)
     */
    function _getActionList_Manifest($class_list)
    {
        $manifest_action_list = array();
        $manifest_class_list = array();
        foreach ($this->ctl->action as $action_name => $action) {
            if ($action_name == '__ethna_info__') {
                continue;
            }
            $action = $this->ctl->_getAction($action_name);

            $elt = array();
            // _analyzeActionList()�Ǽ����������饹����ǡ��������б��ط������
            foreach ($class_list as $file => $elts) {
                foreach ($elts as $class_name => $def) {
                    if ($def['type'] == 'action_class' && strcasecmp($class_name, $action['class_name']) == 0) {
                        $elt['action_class'] = $class_name;
                        $elt['action_class_file'] = $file;
                        $elt['action_class_info'] = $def;
                    } else if ($def['type'] == 'action_form' && strcasecmp($class_name, $action['form_name']) == 0) {
                        $elt['action_form'] = $class_name;
                        $elt['action_form_file'] = $file;
                        $elt['action_form_info'] = $def;
                    }
                }
            }

            // ̤��������å�
            if (isset($elt['action_class']) == false) {
                $elt['action_class'] = $action['class_name'];
                if (class_exists($action['class_name']) == false) {
                    $elt['action_class_info'] = array('undef' => true);
                }
            }
            if (isset($elt['action_form']) == false && $action['form_name'] != 'Ethna_ActionForm') {
                $elt['action_form'] = $action['form_name'];
                if (class_exists($action['form_name']) == false) {
                    $elt['action_form_info'] = array('undef' => true);
                }
            }
            $manifest_action_list[$action_name] = $elt;
            $manifest_class_list[] = strtolower($elt['action_class']);
        }

        return array($manifest_action_list, $manifest_class_list);
    }

    /**
     *  ���ۤ��������Ƥ��륢�������������������
     *
     *  @access private
     *  @param  array   $class_list             �������Ƥ��륯�饹����
     *  @param  array   $manifest_action_list   ����Ū������ѤߤΥ�����������
     *  @param  array   $manifest_class_list    ����Ū������ѤߤΥ��饹����
     *  @return array   array:������������
     */
    function _getActionList_Implicit($class_list, $manifest_action_list, $manifest_class_list)
    {
        $implicit_action_list = array();

        foreach ($class_list as $file => $elts) {
            foreach ($elts as $class_name => $def) {
                if (in_array(strtolower($class_name), $manifest_class_list)) {
                    continue;
                }

                // ���饹̾���饢�������̾�����
                if ($def['type'] == 'action_class') {
                    $action_name = $this->ctl->actionClassToName($class_name);
                    if (array_key_exists($action_name, $manifest_action_list)) {
                        continue;
                    }
                    $implicit_action_list[$action_name]['action_class'] = $class_name;
                    $implicit_action_list[$action_name]['action_class_file'] = $file;
                    $implicit_action_list[$action_name]['action_class_info'] = $def;
                } else if ($def['type'] == 'action_form') {
                    $action_name = $this->ctl->actionFormToName($class_name);
                    if (array_key_exists($action_name, $manifest_action_list)) {
                        continue;
                    }
                    $implicit_action_list[$action_name]['action_form'] = $class_name;
                    $implicit_action_list[$action_name]['action_form_file'] = $file;
                    $implicit_action_list[$action_name]['action_form_info'] = $def;
                } else {
                    continue;
                }
            }
        }

        return $implicit_action_list;
    }
    
    /**
     *  �������������������䴰����
     *
     *  @access private
     *  @param  array   $action_list    ��������������������
     *  @return array   ������Υ�����������
     */
    function _addActionList($action_list)
    {
        foreach ($action_list as $action_name => $action) {
            // ���������ե�����˥ե��������������ɲ�
            $form_name = $action['action_form'];
            if (class_exists($form_name) == false) {
                continue;
            }
            $af =& new $form_name($this->ctl);

            $form = array();
            foreach ($af->getDef() as $name => $def) {
                $form[$name]['required'] = $def['required'] ? 'true' : 'false';
                foreach (array('name', 'max', 'min', 'regexp', 'custom') as $key) {
                    $form[$name][$key] = $def[$key];
                }
                $form[$name]['filter'] = str_replace(",", "\n", $def['filter']);
                $form[$name]['form_type'] = $this->getAttrName('form_type', $def['form_type']);
                $form[$name]['type_is_array'] = is_array($def['type']);
                $form[$name]['type'] = $this->getAttrName('var_type', is_array($def['type']) ? $def['type'][0] : $def['type']);
            }
            $action['action_form_info']['form'] = $form;
            $action_list[$action_name] = $action;
        }

        return $action_list;
    }

    /**
     *  �ǥ��쥯�ȥ�ʲ��Υƥ�ץ졼�Ȥ���Ϥ���
     *
     *  @access private
     *  @param  string  $action_dir     �����оݤΥǥ��쥯�ȥ�
     *  @return array   �����������
     */
    function _analyzeForwardList($template_dir = null)
    {
        $r = array();

        if (is_null($template_dir)) {
            $template_dir = $this->ctl->getTemplatedir();
        }
        $prefix_len = strlen($this->ctl->getTemplatedir());

        $child_dir_list = array();

        $dh = opendir($template_dir);
        if ($dh == false) {
            return;
        }

        $ext = $this->ctl->getExt('tpl');
        while (($file = readdir($dh)) !== false) {
            if ($file == "." || $file == "..") {
                continue;
            }
            $file = $template_dir . '/' . $file;

            if (is_dir($file)) {
                $child_dir_list[] = $file;
                continue;
            }

            if (preg_match("/\.$ext\$/", $file) == 0) {
                continue;
            }

            $tpl = substr($file, $prefix_len);
            $r[] = $this->ctl->forwardPathToName($tpl);
        }

        closedir($dh);

        foreach ($child_dir_list as $child_dir) {
            $tmp = $this->_analyzeForwardList($child_dir);
            $r = array_merge($r, $tmp);
        }

        return $r;
    }

    /**
     *  ����ȥ��������Ū���������Ƥ���������������������
     *
     *  @access private
     *  @return array   �ӥ塼����
     */
    function _getForwardList_Manifest()
    {
        $manifest_forward_list = array();
        foreach ($this->ctl->forward as $forward_name => $forward) {
            if ($forward_name == '__ethna_info__') {
                continue;
            }

            $elt = array();
            $elt['template_file'] = $this->ctl->_getForwardPath($forward_name);
            if (file_exists(sprintf("%s/%s", $this->ctl->getTemplatedir(), $elt['template_file'])) == false) {
                $elt['template_file_info'] = array('undef' => true);
            }

            $elt['view_class'] = $this->ctl->getViewClassName($forward_name);
            if ($elt['view_class'] == 'Ethna_ViewClass') {
                $elt['view_class'] = null;
            } else if (class_exists($elt['view_class']) == false) {
                $elt['view_class_info'] = array('undef' => true);
            }

            if (isset($forward['view_path']) && $forward['view_path']) {
                $elt['view_path'] = $forward['view_path'];
            } else if ($this->_isSubclassOf($elt['view_class'], 'Ethna_ViewClass')) {
                $elt['view_class_file'] = $this->ctl->getDefaultViewPath($forward_name);
            } else {
                foreach ($this->cache_class_list as $file => $elts) {
                    foreach ($elts as $name => $def) {
                        if (strcasecmp($elt['view_class'], $name) == 0) {
                            $elt['view_class_file'] = $file;
                            break 2;
                        }
                    }
                }
            }

            $manifest_forward_list[$forward_name] = $elt;
        }

        return $manifest_forward_list;
    }

    /**
     *  ���ۤ��������Ƥ���ӥ塼�������������
     *
     *  @access private
     *  @param  array   $forward_list           �������Ƥ�������̾����
     *  @param  array   $manifest_forward_list  ����Ū������ѤߤΥӥ塼����
     *  @return array   array:�ӥ塼����
     */
    function _getForwardList_Implicit($forward_list, $manifest_forward_list)
    {
        $implicit_forward_list = array();
        $manifest_forward_name_list = array_keys($manifest_forward_list);

        foreach ($forward_list as $forward_name) {
            if (in_array($forward_name, $manifest_forward_name_list)) {
                continue;
            }

            $elt = array();
            $elt['template_file'] = $this->ctl->_getForwardPath($forward_name);
            $elt['view_class'] = $this->ctl->getViewClassName($forward_name);
            if ($elt['view_class'] == 'Ethna_ViewClass') {
                $elt['view_class'] = null;
            } else if (class_exists($elt['view_class']) == false) {
                $elt['view_class'] = null;
            } else {
                $elt['view_class_file'] = $this->ctl->getDefaultViewPath($forward_name);
            }

            $implicit_forward_list[$forward_name] = $elt;
        }

        return $implicit_forward_list;
    }

    /**
     *  Ethna������������������
     *
     *  @access public
     *  @return array   ����������Ǽ��������
     *  @todo   respect access controll
     */
    function getConfiguration()
    {
        $r = array();

        // core
        $elts = array();
        $elts['���ץꥱ�������ID'] = $this->ctl->getAppId();
        $elts['���ץꥱ�������URL'] = $this->ctl->getURL();
        $elts['Ethna�С������'] = ETHNA_VERSION;
        $elts['Ethna�١����ǥ��쥯�ȥ�'] = ETHNA_BASE;
        $r['Core'] = $elts;

        // class
        $elts = array();
        $elts['�Хå������'] = $this->class_factory->getObjectName('backend');
        $elts['���饹�ե����ȥ�'] = $this->class_factory->getObjectName('class');
        $elts['����'] = $this->class_factory->getObjectName('config');
        $elts['DB'] = $this->class_factory->getObjectName('db');
        $elts['���顼'] = $this->class_factory->getObjectName('error');
        $elts['�ե�����'] = $this->class_factory->getObjectName('form');
        $elts['��'] = $this->class_factory->getObjectName('logger');
        $elts['i18n'] = $this->class_factory->getObjectName('i18n');
        $elts['�ץ饰����'] = $this->class_factory->getObjectName('plugin');
        $elts['���å����'] = $this->class_factory->getObjectName('session');
        $elts['SQL'] = $this->class_factory->getObjectName('sql');
        $elts['�ӥ塼'] = $this->class_factory->getObjectName('view');
        $r['���饹'] = $elts;

        // DB
        $elts = array();
        $db_list = array();
        foreach ($this->ctl->db as $key => $db) {
            if ($key == "") {
                $tmp = '$db';
            } else {
                $tmp = sprintf('$db_%s', $key);
            }
            $elts[$tmp] = $this->getAttrName('db_type', $db);
            $db_list[$key] = $tmp;
        }
        $r['DB������'] = $elts;

        // DSN
        $elts = array();
        foreach ($db_list as $key => $name) {
            $config_key = "dsn";
            if ($key != "") {
                $config_key .= "_$key";
            }
            $dsn = $this->config->get($config_key);
            if ($dsn) {
                $elts[$name] = implode("\n", to_array($dsn));
            }
        }
        $r['DSN'] = $elts;

        // directory
        $elts = array();
        $elts['���ץꥱ�������'] = $this->ctl->getBasedir();
        $elts['���������'] = $this->ctl->getActiondir();
        $elts['�ӥ塼'] = $this->ctl->getViewdir();
        $elts['�ե��륿'] = $this->ctl->getDirectory('filter');
        $elts['�ץ饰����'] = $this->ctl->getDirectory('plugin');
        $elts['�ƥ�ץ졼��'] = $this->ctl->getTemplatedir();
        $elts['�ƥ�ץ졼�ȥ���å���'] = $this->ctl->getDirectory('template_c');
        $elts['Smarty�ץ饰����'] = implode(',', $this->ctl->getDirectory('plugins'));
        $elts['����ե�����'] = $this->ctl->getDirectory('etc');
        $elts['������'] = $this->ctl->getDirectory('locale');
        $elts['��'] = $this->ctl->getDirectory('log');
        $elts['����ե�����'] = $this->ctl->getDirectory('tmp');
        $r['�ǥ��쥯�ȥ�'] = $elts;

        // ext
        $elts = array();
        $elts['�ƥ�ץ졼��'] = $this->ctl->getExt('tpl');
        $elts['PHP������ץ�'] = $this->ctl->getExt('php');
        $r['��ĥ��'] = $elts;

        // filter
        $elts = array();
        $n = 1;
        foreach ($this->ctl->filter as $filter) {
            $key = sprintf("�ե��륿(%d)", $n);
            if (class_exists($filter)) {
                $elts[$key] = $filter;
                $n++;
            }
        }
        $r['�ե��륿'] = $elts;

        // manager
        $elts = array();
        foreach ($this->ctl->getManagerList() as $key => $manager) {
            $name = sprintf('$%s', $key);
            $elts[$name] = $this->ctl->getManagerClassName($manager);
        }
        $r['���ץꥱ�������ޥ͡�����'] = $elts;

        return $r;
    }

    /**
     *  �ץ饰����ΰ������������
     *
     *  @access public
     *  @return array   ����������Ǽ��������
     *  @todo   respect access controll
     */
    function getPluginList()
    {
        $r = array();
        $plugin = $this->ctl->getPlugin();
        foreach ($plugin->searchAllPluginType() as $type) {
            $plugin->searchAllPluginSrc($type);
            if (isset($plugin->src_registry[$type])) {
                $elts = array();
                foreach ($plugin->src_registry[$type] as $name => $src) {
                    if (empty($src)) {
                        continue;
                    }
                    $elts[$name] = $src[2];
                }
                ksort($elts);
                $r[$type] = $elts;
            }
        }
        ksort($r);
        return $r;
    }
}
// }}}
?>
