<?php
// vim: foldmethod=marker
/**
 *  Ethna_Controller.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Controller.php,v 1.73 2007/01/05 06:57:21 ichii386 Exp $
 */

// {{{ Ethna_Controller
/**
 *  ����ȥ��饯�饹
 *
 *  @todo       gateway��switch���Ƥ�Ȥ�����������
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Controller
{
    /**#@+
     *  @access private
     */

    /** @var    string      ���ץꥱ�������ID */
    var $appid = 'ETHNA';

    /** @var    string      ���ץꥱ�������١����ǥ��쥯�ȥ� */
    var $base = '';

    /** @var    string      ���ץꥱ�������١���URL */
    var $url = '';

    /** @var    string      ���ץꥱ�������DSN(Data Source Name) */
    var $dsn;

    /** @var    array       ���ץꥱ�������ǥ��쥯�ȥ� */
    var $directory = array();

    /** @var    array       ���ץꥱ�������ǥ��쥯�ȥ�(�ǥե����) */
    var $directory_default = array(
        'action'        => 'app/action',
        'action_cli'    => 'app/action_cli',
        'action_xmlrpc' => 'app/action_xmlrpc',
        'app'           => 'app',
        'plugin'        => 'app/plugin',
        'bin'           => 'bin',
        'etc'           => 'etc',
        'filter'        => 'app/filter',
        'locale'        => 'locale',
        'log'           => 'log',
        'plugins'       => array(),
        'template'      => 'template',
        'template_c'    => 'tmp',
        'tmp'           => 'tmp',
        'view'          => 'app/view',
        'www'           => 'www',
    );

    /** @var    array       DB����������� */
    var $db = array(
        ''              => DB_TYPE_RW,
    );

    /** @var    array       ��ĥ������ */
    var $ext = array(
        'php'           => 'php',
        'tpl'           => 'tpl',
    );

    /** @var    array       ���饹���� */
    var $class = array();

    /** @var    array       ���饹����(�ǥե����) */
    var $class_default = array(
        'class'         => 'Ethna_ClassFactory',
        'backend'       => 'Ethna_Backend',
        'config'        => 'Ethna_Config',
        'db'            => 'Ethna_DB',
        'error'         => 'Ethna_ActionError',
        'form'          => 'Ethna_ActionForm',
        'i18n'          => 'Ethna_I18N',
        'logger'        => 'Ethna_Logger',
        'plugin'        => 'Ethna_Plugin',
        'renderer'      => 'Ethna_Renderer_Smarty',
        'session'       => 'Ethna_Session',
        'sql'           => 'Ethna_AppSQL',
        'view'          => 'Ethna_ViewClass',
        'url_handler'   => 'Ethna_UrlHandler',
    );

    /** @var    array       �����оݤȤʤ�ץ饰����Υ��ץꥱ�������ID�Υꥹ�� */
    var $plugin_search_appids;

    /** @var    array       �ե��륿���� */
    var $filter = array(
    );

    /** @var    string      ���Ѹ������� */
    var $language;

    /** @var    string      �����ƥ�¦���󥳡��ǥ��� */
    var $system_encoding;

    /** @var    string      ���饤�����¦���󥳡��ǥ��� */
    var $client_encoding;

    /** @var    string  ���߼¹���Υ��������̾ */
    var $action_name;

    /** @var    string  ���߼¹����XMLRPC�᥽�å�̾ */
    var $xmlrpc_method_name;

    /** @var    array   forward��� */
    var $forward = array();

    /** @var    array   action��� */
    var $action = array();

    /** @var    array   action(CLI)��� */
    var $action_cli = array();

    /** @var    array   action(XMLRPC)��� */
    var $action_xmlrpc = array();

    /** @var    array   ���ץꥱ�������ޥ͡�������� */
    var $manager = array();

    /** @var    object  �����顼 */
    var $renderer = null;

    /** @var    array   smarty modifier��� */
    var $smarty_modifier_plugin = array();

    /** @var    array   smarty function��� */
    var $smarty_function_plugin = array();

    /** @var    array   smarty block��� */
    var $smarty_block_plugin = array();

    /** @var    array   smarty prefilter��� */
    var $smarty_prefilter_plugin = array();

    /** @var    array   smarty postfilter��� */
    var $smarty_postfilter_plugin = array();

    /** @var    array   smarty outputfilter��� */
    var $smarty_outputfilter_plugin = array();


    /** @var    array   �ե��륿����������(Ethna_Filter���֥������Ȥ�����) */
    var $filter_chain = array();

    /** @var    object  Ethna_ClassFactory  ���饹�ե����ȥꥪ�֥������� */
    var $class_factory = null;

    /** @var    object  Ethna_ActionForm    �ե����४�֥������� */
    var $action_form = null;

    /** @var    object  Ethna_View          �ӥ塼���֥������� */
    var $view = null;

    /** @var    object  Ethna_Config        ���ꥪ�֥������� */
    var $config = null;

    /** @var    object  Ethna_Logger        �����֥������� */
    var $logger = null;

    /** @var    object  Ethna_Plugin        �ץ饰���󥪥֥������� */
    var $plugin = null;

    /** @var    string  �ꥯ�����ȤΥ����ȥ�����(www/cli/rest/xmlrpc/soap...) */
    var $gateway = GATEWAY_WWW;

    /**#@-*/


    /**
     *  Ethna_Controller���饹�Υ��󥹥ȥ饯��
     *
     *  @access     public
     */
    function Ethna_Controller($gateway = GATEWAY_WWW)
    {
        $GLOBALS['_Ethna_controller'] =& $this;
        if ($this->base === "") {
            // Ethna���ޥ�ɤʤɤ�BASE���������Ƥ��ʤ���礬����
            if (defined('BASE')) {
                $this->base = BASE;
            }
        }

        $this->gateway = $gateway;

        // ���饹�����̤����ͤ��䴰
        foreach ($this->class_default as $key => $val) {
            if (isset($this->class[$key]) == false) {
                $this->class[$key] = $val;
            }
        }

        // �ǥ��쥯�ȥ������̤����ͤ��䴰
        foreach ($this->directory_default as $key => $val) {
            if (isset($this->directory[$key]) == false) {
                $this->directory[$key] = $val;
            }
        }

        // ���饹�ե����ȥꥪ�֥������Ȥ�����
        $class_factory = $this->class['class'];
        $this->class_factory =& new $class_factory($this, $this->class);

        // ���顼�ϥ�ɥ������
        Ethna::setErrorCallback(array(&$this, 'handleError'));

        // �ǥ��쥯�ȥ�̾������(���Хѥ�->���Хѥ�)
        foreach ($this->directory as $key => $value) {
            if ($key == 'plugins') {
                // Smarty�ץ饰����ǥ��쥯�ȥ������ǻ��ꤹ��
                $tmp = array();
                foreach (to_array($value) as $elt) {
                    if (Ethna_Util::isAbsolute($elt) == false) {
                        $tmp[] = $this->base . (empty($this->base) ? '' : '/') . $elt;
                    }
                }
                $this->directory[$key] = $tmp;
            } else {
                if (Ethna_Util::isAbsolute($value) == false) {
                    $this->directory[$key] = $this->base . (empty($this->base) ? '' : '/') . $value;
                }
            }
        }

        // �������
        list($this->language, $this->system_encoding, $this->client_encoding) = $this->_getDefaultLanguage();

        $this->config =& $this->getConfig();
        $this->dsn = $this->_prepareDSN();
        $this->url = $this->config->get('url');

        // �ץ饰���󥪥֥������Ȥ��Ѱ�
        $this->plugin =& $this->getPlugin();

        //// assert (experimental)
        //if ($this->config->get('debug') === false) {
        //    ini_set('assert.active', 0);
        //}

        // �����ϳ���
        $this->logger =& $this->getLogger();
        $this->plugin->setLogger($this->logger);
        $this->logger->begin();

        // Ethna�ޥ͡���������
        $this->_activateEthnaManager();
    }

    /**
     *  (���ߥ����ƥ��֤�)����ȥ���Υ��󥹥��󥹤��֤�
     *
     *  @access public
     *  @return object  Ethna_Controller    ����ȥ���Υ��󥹥���
     *  @static
     */
    function &getInstance()
    {
        if (isset($GLOBALS['_Ethna_controller'])) {
            return $GLOBALS['_Ethna_controller'];
        } else {
            $_ret_object = null;
            return $_ret_object;
        }
    }

    /**
     *  ���ץꥱ�������ID���֤�
     *
     *  @access public
     *  @return string  ���ץꥱ�������ID
     */
    function getAppId()
    {
        return ucfirst(strtolower($this->appid));
    }

    /**
     *  ���ץꥱ�������ID������å�����
     *
     *  @access public
     *  @param  string  $id     ���ץꥱ�������ID
     *  @return mixed   true:OK Ethna_Error:NG
     *  @static
     */
    function checkAppId($id)
    {
        if (strcasecmp($id, 'ethna') == 0 || strcasecmp($id, 'app') == 0) {
            return Ethna::raiseError(sprintf("Application Id [%s] is reserved\n", $id));
        }
        if (preg_match('/^[0-9a-zA-Z]+$/', $id) == 0) {
            return Ethna::raiseError(sprintf("Only Numeric(0-9) and Alphabetical(A-Z) is allowed for Application Id\n"));
        }

        return true;
    }

    /**
     *  ���������̾������å�����
     *
     *  @access public
     *  @param  string  $action_name    ���������̾
     *  @return mixed   true:OK Ethna_Error:NG
     *  @static
     */
    function checkActionName($action_name)
    {
        if (preg_match('/^[a-zA-Z\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $action_name) == 0) {
            return Ethna::raiseError(sprintf("invalid action name [$action_name]"));
        }
        return true;
    }

    /**
     *  �ӥ塼̾������å�����
     *
     *  @access public
     *  @param  string  $view_name    �ӥ塼̾
     *  @return mixed   true:OK Ethna_Error:NG
     *  @static
     */
    function checkViewName($view_name)
    {
        if (preg_match('/^[a-zA-Z\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $view_name) == 0) {
            return Ethna::raiseError(sprintf("invalid view name [$view_name]"));
        }
        return true;
    }

    /**
     *  DSN���֤�
     *
     *  @access public
     *  @param  string  $db_key DB����
     *  @return string  DSN
     */
    function getDSN($db_key = "")
    {
        if (isset($this->dsn[$db_key]) == false) {
            return null;
        }
        return $this->dsn[$db_key];
    }

    /**
     *  DSN�λ�³��³������֤�
     *
     *  @access public
     *  @param  string  $db_key DB����
     *  @return bool    true:persistent false:non-persistent(���뤤������̵��)
     */
    function getDSN_persistent($db_key = "")
    {
        $key = sprintf("dsn%s_persistent", $db_key == "" ? "" : "_$db_key");

        $dsn_persistent = $this->config->get($key);
        if (is_null($dsn_persistent)) {
            return false;
        }
        return $dsn_persistent;
    }

    /**
     *  DB������֤�
     *
     *  @access public
     *  @param  string  $db_key DB����("", "r", "rw", "default", "blog_r"...)
     *  @return string  $db_key���б�����DB�������(���̵꤬������null)
     */
    function getDBType($db_key = null)
    {
        if (is_null($db_key)) {
            // �������֤�
            return $this->db;
        }

        if (isset($this->db[$db_key]) == false) {
            return null;
        }
        return $this->db[$db_key];
    }

    /**
     *  ���ץꥱ�������١���URL���֤�
     *
     *  @access public
     *  @return string  ���ץꥱ�������١���URL
     */
    function getURL()
    {
        return $this->url;
    }

    /**
     *  ���ץꥱ�������١����ǥ��쥯�ȥ���֤�
     *
     *  @access public
     *  @return string  ���ץꥱ�������١����ǥ��쥯�ȥ�
     */
    function getBasedir()
    {
        return $this->base;
    }

    /**
     *  ���饤����ȥ�����/���줫��ƥ�ץ졼�ȥǥ��쥯�ȥ�̾����ꤹ��
     *
     *  @access public
     *  @return string  �ƥ�ץ졼�ȥǥ��쥯�ȥ�
     */
    function getTemplatedir()
    {
        $template = $this->getDirectory('template');

        // �����̥ǥ��쥯�ȥ�
        if (file_exists($template . '/' . $this->language)) {
            $template .= '/' . $this->language;
        }

        return $template;
    }

    /**
     *  ���������ǥ��쥯�ȥ�̾����ꤹ��
     *
     *  @access public
     *  @return string  ���������ǥ��쥯�ȥ�
     */
    function getActiondir($gateway = null)
    {
        $key = 'action';
        $gateway = is_null($gateway) ? $this->getGateway() : $gateway;
        switch ($gateway) {
        case GATEWAY_WWW:
            $key = 'action';
            break;
        case GATEWAY_CLI:
            $key = 'action_cli';
            break;
        case GATEWAY_XMLRPC:
            $key = 'action_xmlrpc';
            break;
        }

        return (empty($this->directory[$key]) ? ($this->base . (empty($this->base) ? '' : '/')) : ($this->directory[$key] . "/"));
    }

    /**
     *  �ӥ塼�ǥ��쥯�ȥ�̾����ꤹ��
     *
     *  @access public
     *  @return string  ���������ǥ��쥯�ȥ�
     */
    function getViewdir()
    {
        return (empty($this->directory['view']) ? ($this->base . (empty($this->base) ? '' : '/')) : ($this->directory['view'] . "/"));
    }

    /**
     *  ���ץꥱ�������ǥ��쥯�ȥ�������֤�
     *
     *  @access public
     *  @param  string  $key    �ǥ��쥯�ȥ꥿����("tmp", "template"...)
     *  @return string  $key���б��������ץꥱ�������ǥ��쥯�ȥ�(���̵꤬������null)
     */
    function getDirectory($key)
    {
        // for B.C.
        if ($key == 'app' && isset($this->directory[$key]) == false) {
            return BASE . '/app';
        }

        if (isset($this->directory[$key]) == false) {
            return null;
        }
        return $this->directory[$key];
    }

    /**
     *  ���ץꥱ��������ĥ��������֤�
     *
     *  @access public
     *  @param  string  $key    ��ĥ�ҥ�����("php", "tpl"...)
     *  @return string  $key���б�������ĥ��(���̵꤬������null)
     */
    function getExt($key)
    {
        if (isset($this->ext[$key]) == false) {
            return null;
        }
        return $this->ext[$key];
    }

    /**
     *  ���饹�ե����ȥꥪ�֥������ȤΥ�������(R)
     *
     *  @access public
     *  @return object  Ethna_ClassFactory  ���饹�ե����ȥꥪ�֥�������
     */
    function &getClassFactory()
    {
        return $this->class_factory;
    }

    /**
     *  ��������󥨥顼���֥������ȤΥ�������
     *
     *  @access public
     *  @return object  Ethna_ActionError   ��������󥨥顼���֥�������
     */
    function &getActionError()
    {
        return $this->class_factory->getObject('error');
    }

    /**
     *  ���������ե����४�֥������ȤΥ�������
     *
     *  @access public
     *  @return object  Ethna_ActionForm    ���������ե����४�֥�������
     */
    function &getActionForm()
    {
        // ����Ū�˥��饹�ե����ȥ�����Ѥ��Ƥ��ʤ�
        return $this->action_form;
    }

    /**
     *  �ӥ塼���֥������ȤΥ�������
     *
     *  @access public
     *  @return object  Ethna_View          �ӥ塼���֥�������
     */
    function &getView()
    {
        // ����Ū�˥��饹�ե����ȥ�����Ѥ��Ƥ��ʤ�
        return $this->view;
    }

    /**
     *  backend���֥������ȤΥ�������
     *
     *  @access public
     *  @return object  Ethna_Backend   backend���֥�������
     */
    function &getBackend()
    {
        return $this->class_factory->getObject('backend');
    }

    /**
     *  ���ꥪ�֥������ȤΥ�������
     *
     *  @access public
     *  @return object  Ethna_Config    ���ꥪ�֥�������
     */
    function &getConfig()
    {
        return $this->class_factory->getObject('config');
    }

    /**
     *  i18n���֥������ȤΥ�������(R)
     *
     *  @access public
     *  @return object  Ethna_I18N  i18n���֥�������
     */
    function &getI18N()
    {
        return $this->class_factory->getObject('i18n');
    }

    /**
     *  �����֥������ȤΥ�������
     *
     *  @access public
     *  @return object  Ethna_Logger        �����֥�������
     */
    function &getLogger()
    {
        return $this->class_factory->getObject('logger');
    }

    /**
     *  ���å���󥪥֥������ȤΥ�������
     *
     *  @access public
     *  @return object  Ethna_Session       ���å���󥪥֥�������
     */
    function &getSession()
    {
        return $this->class_factory->getObject('session');
    }

    /**
     *  SQL���֥������ȤΥ�������
     *
     *  @access public
     *  @return object  Ethna_AppSQL    SQL���֥�������
     */
    function &getSQL()
    {
        return $this->class_factory->getObject('sql');
    }

    /**
     *  �ץ饰���󥪥֥������ȤΥ�������
     *
     *  @access public
     *  @return object  Ethna_Plugin    �ץ饰���󥪥֥�������
     */
    function &getPlugin()
    {
        return $this->class_factory->getObject('plugin');
    }

    /**
     *  URL�ϥ�ɥ饪�֥������ȤΥ�������
     *
     *  @access public
     *  @return object  Ethna_UrlHandler    URL�ϥ�ɥ饪�֥�������
     */
    function &getUrlHandler()
    {
        return $this->class_factory->getObject('url_handler');
    }

    /**
     *  �ޥ͡�����������֤�
     *
     *  @access public
     *  @return array   �ޥ͡��������
     *  @obsolete
     */
    function getManagerList()
    {
        return $this->manager;
    }

    /**
     *  �¹���Υ��������̾���֤�
     *
     *  @access public
     *  @return string  �¹���Υ��������̾
     */
    function getCurrentActionName()
    {
        return $this->action_name;
    }

    /**
     *  �¹����XMLRPC�᥽�å�̾���֤�
     *
     *  @access public
     *  @return string  �¹����XMLRPC�᥽�å�̾
     */
    function getXmlrpcMethodName()
    {
        return $this->xmlrpc_method_name;
    }

    /**
     *  ���Ѹ�����������
     *
     *  @access public
     *  @return array   ���Ѹ���,�����ƥ२�󥳡��ǥ���̾,���饤����ȥ��󥳡��ǥ���̾
     */
    function getLanguage()
    {
        return array($this->language, $this->system_encoding, $this->client_encoding);
    }

    /**
     *  �����ȥ��������������
     *
     *  @access public
     */
    function getGateway()
    {
        return $this->gateway;
    }

    /**
     *  �����ȥ������⡼�ɤ����ꤹ��
     *
     *  @access public
     */
    function setGateway($gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     *  ���ץꥱ�������Υ���ȥ�ݥ����
     *
     *  @access public
     *  @param  string  $class_name     ���ץꥱ������󥳥�ȥ���Υ��饹̾
     *  @param  mixed   $action_name    ����Υ��������̾(��ά��)
     *  @param  mixed   $fallback_action_name   ��������󤬷���Ǥ��ʤ��ä����˼¹Ԥ���륢�������̾(��ά��)
     *  @static
     */
    function main($class_name, $action_name = "", $fallback_action_name = "")
    {
        $c =& new $class_name;
        $c->trigger($action_name, $fallback_action_name);
    }

    /**
     *  CLI���ץꥱ�������Υ���ȥ�ݥ����
     *
     *  @access public
     *  @param  string  $class_name     ���ץꥱ������󥳥�ȥ���Υ��饹̾
     *  @param  string  $action_name    �¹Ԥ��륢�������̾
     *  @param  bool    $enable_filter  �ե��륿���������ͭ���ˤ��뤫�ɤ���
     *  @static
     */
    function main_CLI($class_name, $action_name, $enable_filter = true)
    {
        $c =& new $class_name(GATEWAY_CLI);
        $c->action_cli[$action_name] = array();
        $c->trigger($action_name, "", $enable_filter);
    }

    /**
     *  XMLRPC���ץꥱ�������Υ���ȥ�ݥ����
     *
     *  @access public
     *  @static
     */
    function main_XMLRPC($class_name)
    {
        if (extension_loaded('xmlrpc') == false) {
            die("xmlrpc extension is required to enable this gateway");
        } else if (ini_get('always_populate_raw_post_data') == false) {
            die("always_populate_raw_post_data ini variable should be true to enable this gateway");
        }

        $c =& new $class_name(GATEWAY_XMLRPC);
        $c->trigger("", "", false);
    }

    /**
     *  SOAP���ץꥱ�������Υ���ȥ�ݥ����
     *
     *  @access public
     *  @param  string  $class_name     ���ץꥱ������󥳥�ȥ���Υ��饹̾
     *  @param  mixed   $action_name    ����Υ��������̾(��ά��)
     *  @param  mixed   $fallback_action_name   ��������󤬷���Ǥ��ʤ��ä����˼¹Ԥ���륢�������̾(��ά��)
     *  @static
     */
    function main_SOAP($class_name, $action_name = "", $fallback_action_name = "")
    {
        $c =& new $class_name(GATEWAY_SOAP);
        $c->trigger($action_name, $fallback_action_name);
    }

    /**
     *  �ե졼�����ν����򳫻Ϥ���
     *
     *  @access public
     *  @param  mixed   $default_action_name    ����Υ��������̾
     *  @param  mixed   $fallback_action_name   ���������̾������Ǥ��ʤ��ä����˼¹Ԥ���륢�������̾
     *  @param  bool    $enable_filter  �ե��륿���������ͭ���ˤ��뤫�ɤ���
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function trigger($default_action_name = "", $fallback_action_name = "", $enable_filter = true)
    {
        // �ե��륿��������
        if ($enable_filter) {
            $this->_createFilterChain();
        }

        // �¹����ե��륿
        for ($i = 0; $i < count($this->filter_chain); $i++) {
            $r = $this->filter_chain[$i]->preFilter();
            if (Ethna::isError($r)) {
                return $r;
            }
        }

        // trigger
        switch ($this->getGateway()) {
        case GATEWAY_WWW:
            $this->_trigger_WWW($default_action_name, $fallback_action_name);
            break;
        case GATEWAY_CLI:
            $this->_trigger_CLI($default_action_name);
            break;
        case GATEWAY_XMLRPC:
            $this->_trigger_XMLRPC();
            break;
        case GATEWAY_SOAP:
            $this->_trigger_SOAP();
            break;
        }

        // �¹Ը�ե��륿
        for ($i = count($this->filter_chain) - 1; $i >= 0; $i--) {
            $r = $this->filter_chain[$i]->postFilter();
            if (Ethna::isError($r)) {
                return $r;
            }
        }
    }

    /**
     *  �ե졼�����ν�����¹Ԥ���(WWW)
     *
     *  ����$default_action_name�����󤬻��ꤵ�줿��硢��������ǻ��ꤵ�줿
     *  ���������ʳ��ϼ����դ��ʤ�(���ꤵ��Ƥ��ʤ���������󤬻��ꤵ�줿
     *  ��硢�������Ƭ�ǻ��ꤵ�줿��������󤬼¹Ԥ����)
     *
     *  @access private
     *  @param  mixed   $default_action_name    ����Υ��������̾
     *  @param  mixed   $fallback_action_name   ���������̾������Ǥ��ʤ��ä����˼¹Ԥ���륢�������̾
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function _trigger_WWW($default_action_name = "", $fallback_action_name = "")
    {
        // ���������̾�μ���
        $action_name = $this->_getActionName($default_action_name, $fallback_action_name);

        // �������������μ���
        $action_obj =& $this->_getAction($action_name);
        if (is_null($action_obj)) {
            if ($fallback_action_name != "") {
                $this->logger->log(LOG_DEBUG, 'undefined action [%s] -> try fallback action [%s]', $action_name, $fallback_action_name);
                $action_obj =& $this->_getAction($fallback_action_name);
            }
            if (is_null($action_obj)) {
                return Ethna::raiseError("undefined action [%s]", E_APP_UNDEFINED_ACTION, $action_name);
            } else {
                $action_name = $fallback_action_name;
            }
        }

        // ���������¹����ե��륿
        for ($i = 0; $i < count($this->filter_chain); $i++) {
            $r = $this->filter_chain[$i]->preActionFilter($action_name);
            if ($r != null) {
                $this->logger->log(LOG_DEBUG, 'action [%s] -> [%s] by %s', $action_name, $r, get_class($this->filter_chain[$i]));
                $action_name = $r;
            }
        }
        $this->action_name = $action_name;

        // ��������
        $this->_setLanguage($this->language, $this->system_encoding, $this->client_encoding);

        // ���֥�����������
        $backend =& $this->getBackend();

        $form_name = $this->getActionFormName($action_name);
        $this->action_form =& new $form_name($this);
        $this->action_form->setFormVars();

        // �Хå�����ɽ����¹�
        $backend->setActionForm($this->action_form);

        $session =& $this->getSession();
        $session->restore();
        $forward_name = $backend->perform($action_name);

        // ���������¹Ը�ե��륿
        for ($i = count($this->filter_chain) - 1; $i >= 0; $i--) {
            $r = $this->filter_chain[$i]->postActionFilter($action_name, $forward_name);
            if ($r != null) {
                $this->logger->log(LOG_DEBUG, 'forward [%s] -> [%s] by %s', $forward_name, $r, get_class($this->filter_chain[$i]));
                $forward_name = $r;
            }
        }

        // ����ȥ�������������ꤹ��(���ץ����)
        $forward_name = $this->_sortForward($action_name, $forward_name);

        if ($forward_name != null) {
            $view_class_name = $this->getViewClassName($forward_name);
            $this->view =& new $view_class_name($backend, $forward_name, $this->_getForwardPath($forward_name));
            $this->view->preforward();
            $this->view->forward();
        }

        return 0;
    }

    /**
     *  �ե졼�����ν�����¹Ԥ���(CLI)
     *
     *  @access private
     *  @param  mixed   $default_action_name    ����Υ��������̾
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function _trigger_CLI($default_action_name = "")
    {
        return $this->_trigger_WWW($default_action_name);
    }

    /**
     *  �ե졼�����ν�����¹Ԥ���(XMLRPC)
     *
     *  @access private
     *  @param  mixed   $action_name    ����Υ��������̾
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function _trigger_XMLRPC($action_name = "")
    {
        $xmlrpc_gateway_method_name = "_Ethna_XmlrpcGateway";

        $xmlrpc_server = xmlrpc_server_create();
        $method = null;
        $param = xmlrpc_decode_request($GLOBALS['HTTP_RAW_POST_DATA'], $method);
        $this->xmlrpc_method_name = $method;

        $request = xmlrpc_encode_request($xmlrpc_gateway_method_name, $param, array("output_type" => "xml", "verbosity" => "pretty", "escaping" => array('markup'), "version" => "xmlrpc", "encoding" => "utf-8")); 
        xmlrpc_server_register_method($xmlrpc_server, $xmlrpc_gateway_method_name, $xmlrpc_gateway_method_name);
        $r = xmlrpc_server_call_method($xmlrpc_server, $request, null, array("output_type" => "xml", "verbosity" => "pretty", "escaping" => array('markup'), "version" => "xmlrpc", "encoding" => "utf-8"));

        header('Content-Length: ' . strlen($r));
        header('Content-Type: text/xml; charset=UTF-8');
        print $r;
    }

    /**
     *  _trigger_XMLRPC�Υ�����Хå��᥽�å�
     *
     *  @access public
     */
    function trigger_XMLRPC($method, $param)
    {
        // �������������μ���
        $action_obj =& $this->_getAction($method);
        if (is_null($action_obj)) {
            return Ethna::raiseError("undefined xmlrpc method [%s]", E_APP_UNDEFINED_ACTION, $method);
        }

        // ���֥�����������
        $form_name = $this->getActionFormName($method);
        $this->action_form =& new $form_name($this);
        $def = $this->action_form->getDef();
        $n = 0;
        foreach ($def as $key => $value) {
            if (isset($param[$n]) == false) {
                $this->action_form->set($key, null);
            } else {
                $this->action_form->set($key, $param[$n]);
            }
            $n++;
        }

        // �Хå�����ɽ����¹�
        $backend =& $this->getBackend();
        $session =& $this->getSession();
        $session->restore();
        $r = $backend->perform($method);

        return $r;
    }

    /**
     *  SOAP�ե졼�����ν�����¹Ԥ���
     *
     *  @access private
     */
    function _trigger_SOAP()
    {
        // SOAP����ȥꥯ�饹
        $gg =& new Ethna_SOAP_GatewayGenerator();
        $script = $gg->generate();
        eval($script);

        // SOAP�ꥯ�����Ƚ���
        $server =& new SoapServer(null, array('uri' => $this->config->get('url')));
        $server->setClass($gg->getClassName());
        $server->handle();
    }

    /**
     *  ���顼�ϥ�ɥ�
     *
     *  ���顼ȯ�������ɲý�����Ԥ��������Ϥ��Υ᥽�åɤ򥪡��С��饤�ɤ���
     *  (���顼�ȥ᡼���������ݥǥե���ȤǤϥ����ϻ��˥��顼�ȥ᡼��
     *  ����������뤬�����顼ȯ�������̤˥��顼�ȥ᡼��򤳤�������
     *  �����뤳�Ȥ��ǽ)
     *
     *  @access public
     *  @param  object  Ethna_Error     ���顼���֥�������
     */
    function handleError(&$error)
    {
        // ������
        list ($log_level, $dummy) = $this->logger->errorLevelToLogLevel($error->getLevel());
        $message = $error->getMessage();
        $this->logger->log($log_level, sprintf("%s [ERROR CODE(%d)]", $message, $error->getCode()));
    }

    /**
     *  ���顼��å��������������
     *
     *  @access public
     *  @param  int     $code       ���顼������
     *  @return string  ���顼��å�����
     */
    function getErrorMessage($code)
    {
        $message_list =& $GLOBALS['_Ethna_error_message_list'];
        for ($i = count($message_list)-1; $i >= 0; $i--) {
            if (array_key_exists($code, $message_list[$i])) {
                return $message_list[$i][$code];
            }
        }
        return null;
    }

    /**
     *  �¹Ԥ��륢�������̾���֤�
     *
     *  @access private
     *  @param  mixed   $default_action_name    ����Υ��������̾
     *  @return string  �¹Ԥ��륢�������̾
     */
    function _getActionName($default_action_name, $fallback_action_name)
    {
        // �ե����फ���׵ᤵ�줿���������̾���������
        $form_action_name = $this->_getActionName_Form();
        $form_action_name = preg_replace('/[^a-z0-9\-_]+/i', '', $form_action_name);
        $this->logger->log(LOG_DEBUG, 'form_action_name[%s]', $form_action_name);

        // Ethna�ޥ͡�����ؤΥե����फ��Υꥯ�����Ȥϵ���
        if ($form_action_name == "__ethna_info__" ||
            $form_action_name == "__ethna_unittest__") {
            $form_action_name = "";
        }

        // �ե����फ��λ��̵꤬�����ϥ���ȥ�ݥ���Ȥ˻��ꤵ�줿�ǥե�����ͤ����Ѥ���
        if ($form_action_name == "" && count($default_action_name) > 0) {
            $tmp = is_array($default_action_name) ? $default_action_name[0] : $default_action_name;
            if ($tmp{strlen($tmp)-1} == '*') {
                $tmp = substr($tmp, 0, -1);
            }
            $this->logger->log(LOG_DEBUG, '-> default_action_name[%s]', $tmp);
            $action_name = $tmp;
        } else {
            $action_name = $form_action_name;
        }

        // ����ȥ�ݥ���Ȥ����󤬻��ꤵ��Ƥ�����ϻ���ʳ��Υ��������̾�ϵ��ݤ���
        if (is_array($default_action_name)) {
            if ($this->_isAcceptableActionName($action_name, $default_action_name) == false) {
                // ����ʳ��Υ��������̾�ǹ�ä�����$fallback_action_name(or �ǥե����)
                $tmp = $fallback_action_name != "" ? $fallback_action_name : $default_action_name[0];
                if ($tmp{strlen($tmp)-1} == '*') {
                    $tmp = substr($tmp, 0, -1);
                }
                $this->logger->log(LOG_DEBUG, '-> fallback_action_name[%s]', $tmp);
                $action_name = $tmp;
            }
        }

        $this->logger->log(LOG_DEBUG, '<<< action_name[%s] >>>', $action_name);

        return $action_name;
    }

    /**
     *  �ե�����ˤ���׵ᤵ�줿���������̾���֤�
     *
     *  ���ץꥱ�������������˱����Ƥ��Υ᥽�åɤ򥪡��С��饤�ɤ��Ʋ�������
     *  �ǥե���ȤǤ�"action_"�ǻϤޤ�ե������ͤ�"action_"����ʬ����������
     *  ("action_sample"�ʤ�"sample")�����������̾�Ȥ��ư����ޤ�
     *
     *  @access protected
     *  @return string  �ե�����ˤ���׵ᤵ�줿���������̾
     */
    function _getActionName_Form()
    {
        if (isset($_SERVER['REQUEST_METHOD']) == false) {
            return null;
        }

        $url_handler =& $this->getUrlHandler();
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $tmp_vars = $_GET;
        } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $tmp_vars = $_POST;
        }

        if (empty($_SERVER['URL_HANDLER']) == false) {
            $tmp_vars['__url_handler__'] = $_SERVER['URL_HANDLER'];
            $tmp_vars['__url_info__'] = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : null;
            $tmp_vars = $url_handler->requestToAction($tmp_vars);

            if ($_SERVER['REQUEST_METHOD'] == "GET") {
                $_GET = array_merge($_GET, $tmp_vars);
            } else if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $_POST = array_merge($_POST, $tmp_vars);
            }
            $_REQUEST = array_merge($_REQUEST, $tmp_vars);
        }

        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'post') == 0) {
            $http_vars =& $_POST;
        } else {
            $http_vars =& $_GET;
        }

        // �ե������ͤ���ꥯ�����Ȥ��줿���������̾���������
        $action_name = $sub_action_name = null;
        foreach ($http_vars as $name => $value) {
            if ($value == "" || strncmp($name, 'action_', 7) != 0) {
                continue;
            }

            $tmp = substr($name, 7);

            // type="image"�б�
            if (preg_match('/_x$/', $name) || preg_match('/_y$/', $name)) {
                $tmp = substr($tmp, 0, strlen($tmp)-2);
            }

            // value="dummy"�ȤʤäƤ����Τ�ͥ���٤򲼤���
            if ($value == "dummy") {
                $sub_action_name = $tmp;
            } else {
                $action_name = $tmp;
            }
        }
        if ($action_name == null) {
            $action_name = $sub_action_name;
        }

        return $action_name;
    }

    /**
     *  ���������̾����ꤹ�륯����/HTML����������
     *
     *  @access public
     *  @param  string  $action action to request
     *  @param  string  $type   hidden, url...
     *  @todo   consider gateway
     */
    function getActionRequest($action, $type = "hidden")
    {
        $s = null; 
        if ($type == "hidden") {
            $s = sprintf('<input type="hidden" name="action_%s" value="true">', htmlspecialchars($action, ENT_QUOTES));
        } else if ($type == "url") {
            $s = sprintf('action_%s=true', urlencode($action));
        }
        return $s;
    }

    /**
     *  �ե�����ˤ���׵ᤵ�줿���������̾���б�����������֤�
     *
     *  @access private
     *  @param  string  $action_name    ���������̾
     *  @return array   ������������
     */
    function &_getAction($action_name, $gateway = null)
    {
        $action = array();
        $gateway = is_null($gateway) ? $this->getGateway() : $gateway;
        switch ($gateway) {
        case GATEWAY_WWW:
            $action =& $this->action;
            break;
        case GATEWAY_CLI:
            $action =& $this->action_cli;
            break;
        case GATEWAY_XMLRPC:
            $action =& $this->action_xmlrpc;
            break;
        }

        $action_obj = array();
        if (isset($action[$action_name])) {
            $action_obj = $action[$action_name];
            if (isset($action_obj['inspect']) && $action_obj['inspect']) {
                return $action_obj;
            }
        } else {
            $this->logger->log(LOG_DEBUG, "action [%s] is not defined -> try default", $action_name);
        }

        // ��������󥹥���ץȤΥ��󥯥롼��
        $this->_includeActionScript($action_obj, $action_name);

        // ��ά�ͤ�����
        if (isset($action_obj['class_name']) == false) {
            $action_obj['class_name'] = $this->getDefaultActionClass($action_name);
        }

        if (isset($action_obj['form_name']) == false) {
            $action_obj['form_name'] = $this->getDefaultFormClass($action_name);
        } else if (class_exists($action_obj['form_name']) == false) {
            // �������ꤵ�줿�ե����९�饹���������Ƥ��ʤ����Ϸٹ�
            $this->logger->log(LOG_WARNING, 'stated form class is not defined [%s]', $action_obj['form_name']);
        }

        // ɬ�׾��γ�ǧ
        if (class_exists($action_obj['class_name']) == false) {
            $this->logger->log(LOG_NOTICE, 'action class is not defined [%s]', $action_obj['class_name']);
            $_ret_object = null;
            return $_ret_object;
        }
        if (class_exists($action_obj['form_name']) == false) {
            // �ե����९�饹��̤����Ǥ��ɤ�
            $class_name = $this->class_factory->getObjectName('form');
            $this->logger->log(LOG_DEBUG, 'form class is not defined [%s] -> falling back to default [%s]', $action_obj['form_name'], $class_name);
            $action_obj['form_name'] = $class_name;
        }

        $action_obj['inspect'] = true;
        $action[$action_name] = $action_obj;
        return $action[$action_name];
    }

    /**
     *  ���������̾�ȥ�������󥯥饹���������ͤ˴�Ť������������ꤹ��
     *
     *  @access protected
     *  @param  string  $action_name    ���������̾
     *  @param  string  $retval         ��������󥯥饹����������
     *  @return string  ������
     */
    function _sortForward($action_name, $retval)
    {
        return $retval;
    }

    /**
     *  �ե��륿�����������������
     *
     *  @access private
     */
    function _createFilterChain()
    {
        $this->filter_chain = array();
        foreach ($this->filter as $filter) {
            //�С������0.2.0�����Υե��륿������õ��
            $file = sprintf("%s/%s.%s", $this->getDirectory('filter'), $filter,$this->getExt('php'));
            if (file_exists($file)) {
                include_once $file;
                if (class_exists($filter)) {
                    $this->filter_chain[] =& new $filter($this);
                }
            } else {  //�ץ饰���󤫤�õ����
                $filter_plugin =& $this->plugin->getPlugin('Filter', $filter);
                if (Ethna::isError($filter_plugin)) {
                    continue;
                }

                $this->filter_chain[] =& $filter_plugin;
            }
        }
    }

    /**
     *  ���������̾���¹Ե��Ĥ���Ƥ����Τ��ɤ������֤�
     *
     *  @access private
     *  @param  string  $action_name            �ꥯ�����Ȥ��줿���������̾
     *  @param  array   $default_action_name    ���Ĥ���Ƥ��륢�������̾
     *  @return bool    true:���� false:�Ե���
     */
    function _isAcceptableActionName($action_name, $default_action_name)
    {
        foreach (to_array($default_action_name) as $name) {
            if ($action_name == $name) {
                return true;
            } else if ($name{strlen($name)-1} == '*') {
                if (strncmp($action_name, substr($name, 0, -1), strlen($name)-1) == 0) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     *  ���ꤵ�줿���������Υե����९�饹̾���֤�(���֥������Ȥ������ϹԤ�ʤ�)
     *
     *  @access public
     *  @param  string  $action_name    ���������̾
     *  @return string  ���������Υե����९�饹̾
     */
    function getActionFormName($action_name)
    {
        $action_obj =& $this->_getAction($action_name);
        if (is_null($action_obj)) {
            return null;
        }

        return $action_obj['form_name'];
    }

    /**
     *  �����������б�����ե����९�饹̾����ά���줿���Υǥե���ȥ��饹̾���֤�
     *
     *  �ǥե���ȤǤ�[�ץ�������ID]_Form_[���������̾]�Ȥʤ�Τǹ��߱����ƥ����Х饤�ɤ���
     *
     *  @access public
     *  @param  string  $action_name    ���������̾
     *  @return string  ���������ե�����̾
     */
    function getDefaultFormClass($action_name, $gateway = null)
    {
        $gateway_prefix = $this->_getGatewayPrefix($gateway);

        $postfix = preg_replace('/_(.)/e', "strtoupper('\$1')", ucfirst($action_name));
        $r = sprintf("%s_%sForm_%s", $this->getAppId(), $gateway_prefix ? $gateway_prefix . "_" : "", $postfix);
        $this->logger->log(LOG_DEBUG, "default action class [%s]", $r);

        return $r;
    }

    /**
     *  getDefaultFormClass()�Ǽ����������饹̾���饢�������̾���������
     *
     *  getDefaultFormClass()�򥪡��С��饤�ɤ�����硢��������碌�ƥ����С��饤��
     *  ���뤳�Ȥ�侩(ɬ�ܤǤϤʤ�)
     *
     *  @access public
     *  @param  string  $class_name     �ե����९�饹̾
     *  @return string  ���������̾
     */
    function actionFormToName($class_name)
    {
        $prefix = sprintf("%s_Form_", $this->getAppId());
        if (preg_match("/$prefix(.*)/", $class_name, $match) == 0) {
            // �����ʥ��饹̾
            return null;
        }
        $target = $match[1];

        $action_name = substr(preg_replace('/([A-Z])/e', "'_' . strtolower('\$1')", $target), 1);

        return $action_name;
    }

    /**
     *  �����������б�����ե�����ѥ�̾����ά���줿���Υǥե���ȥѥ�̾���֤�
     *
     *  �ǥե���ȤǤ�_getDefaultActionPath()��Ʊ����̤��֤�(1�ե������
     *  ��������󥯥饹�ȥե����९�饹�����Ҥ����)�Τǡ����ߤ˱�����
     *  �����С��饤�ɤ���
     *
     *  @access public
     *  @param  string  $action_name    ���������̾
     *  @return string  form class���������륹����ץȤΥѥ�̾
     */
    function getDefaultFormPath($action_name)
    {
        return $this->getDefaultActionPath($action_name);
    }

    /**
     *  ���ꤵ�줿���������Υ��饹̾���֤�(���֥������Ȥ������ϹԤ�ʤ�)
     *
     *  @access public
     *  @param  string  $action_name    ����������̾��
     *  @return string  ���������Υ��饹̾
     */
    function getActionClassName($action_name)
    {
        $action_obj =& $this->_getAction($action_name);
        if ($action_obj == null) {
            return null;
        }

        return $action_obj['class_name'];
    }

    /**
     *  �����������б����륢������󥯥饹̾����ά���줿���Υǥե���ȥ��饹̾���֤�
     *
     *  �ǥե���ȤǤ�[�ץ�������ID]_Action_[���������̾]�Ȥʤ�Τǹ��߱����ƥ����Х饤�ɤ���
     *
     *  @access public
     *  @param  string  $action_name    ���������̾
     *  @return string  ��������󥯥饹̾
     */
    function getDefaultActionClass($action_name, $gateway = null)
    {
        $gateway_prefix = $this->_getGatewayPrefix($gateway);

        $postfix = preg_replace('/_(.)/e', "strtoupper('\$1')", ucfirst($action_name));
        $r = sprintf("%s_%sAction_%s", $this->getAppId(), $gateway_prefix ? $gateway_prefix . "_" : "", $postfix);
        $this->logger->log(LOG_DEBUG, "default action class [%s]", $r);

        return $r;
    }

    /**
     *  getDefaultActionClass()�Ǽ����������饹̾���饢�������̾���������
     *
     *  getDefaultActionClass()�򥪡��С��饤�ɤ�����硢��������碌�ƥ����С��饤��
     *  ���뤳�Ȥ�侩(ɬ�ܤǤϤʤ�)
     *
     *  @access public
     *  @param  string  $class_name     ��������󥯥饹̾
     *  @return string  ���������̾
     */
    function actionClassToName($class_name)
    {
        $prefix = sprintf("%s_Action_", $this->getAppId());
        if (preg_match("/$prefix(.*)/", $class_name, $match) == 0) {
            // �����ʥ��饹̾
            return null;
        }
        $target = $match[1];

        $action_name = substr(preg_replace('/([A-Z])/e', "'_' . strtolower('\$1')", $target), 1);

        return $action_name;
    }

    /**
     *  �����������б����륢�������ѥ�̾����ά���줿���Υǥե���ȥѥ�̾���֤�
     *
     *  �ǥե���ȤǤ�"foo_bar" -> "/Foo/Bar.php"�Ȥʤ�Τǹ��߱����ƥ����С��饤�ɤ���
     *
     *  @access public
     *  @param  string  $action_name    ���������̾
     *  @return string  ��������󥯥饹���������륹����ץȤΥѥ�̾
     */
    function getDefaultActionPath($action_name)
    {
        $r = preg_replace('/_(.)/e', "'/' . strtoupper('\$1')", ucfirst($action_name)) . '.' . $this->getExt('php');
        $this->logger->log(LOG_DEBUG, "default action path [%s]", $r);

        return $r;
    }

    /**
     *  ���ꤵ�줿����̾���б�����ӥ塼���饹̾���֤�(���֥������Ȥ������ϹԤ�ʤ�)
     *
     *  @access public
     *  @param  string  $forward_name   �������̾��
     *  @return string  view class�Υ��饹̾
     */
    function getViewClassName($forward_name)
    {
        if ($forward_name == null) {
            return null;
        }

        if (isset($this->forward[$forward_name])) {
            $forward_obj = $this->forward[$forward_name];
        } else {
            $forward_obj = array();
        }

        if (isset($forward_obj['view_name'])) {
            $class_name = $forward_obj['view_name'];
            if (class_exists($class_name)) {
                return $class_name;
            }
        } else {
            $class_name = null;
        }

        // view�Υ��󥯥롼��
        $this->_includeViewScript($forward_obj, $forward_name);

        if (is_null($class_name) == false && class_exists($class_name)) {
            return $class_name;
        } else if (is_null($class_name) == false) {
            $this->logger->log(LOG_WARNING, 'stated view class is not defined [%s] -> try default', $class_name);
        }

        $class_name = $this->getDefaultViewClass($forward_name);
        if (class_exists($class_name)) {
            return $class_name;
        } else {
            $class_name = $this->class_factory->getObjectName('view');
            $this->logger->log(LOG_DEBUG, 'view class is not defined for [%s] -> use default [%s]', $forward_name, $class_name);
            return $class_name;
        }
    }

    /**
     *  ����̾���б�����ӥ塼���饹̾����ά���줿���Υǥե���ȥ��饹̾���֤�
     *
     *  �ǥե���ȤǤ�[�ץ�������ID]_View_[����̾]�Ȥʤ�Τǹ��߱����ƥ����Х饤�ɤ���
     *
     *  @access public
     *  @param  string  $forward_name   forward̾
     *  @return string  view class���饹̾
     */
    function getDefaultViewClass($forward_name, $gateway = null)
    {
        $gateway_prefix = $this->_getGatewayPrefix($gateway);

        $postfix = preg_replace('/_(.)/e', "strtoupper('\$1')", ucfirst($forward_name));
        $r = sprintf("%s_%sView_%s", $this->getAppId(), $gateway_prefix ? $gateway_prefix . "_" : "", $postfix);
        $this->logger->log(LOG_DEBUG, "default view class [%s]", $r);

        return $r;
    }

    /**
     *  ����̾���б�����ӥ塼�ѥ�̾����ά���줿���Υǥե���ȥѥ�̾���֤�
     *
     *  �ǥե���ȤǤ�"foo_bar" -> "/Foo/Bar.php"�Ȥʤ�Τǹ��߱����ƥ����С��饤�ɤ���
     *
     *  @access public
     *  @param  string  $forward_name   forward̾
     *  @return string  view class���������륹����ץȤΥѥ�̾
     */
    function getDefaultViewPath($forward_name)
    {
        $r = preg_replace('/_(.)/e', "'/' . strtoupper('\$1')", ucfirst($forward_name)) . '.' . $this->getExt('php');
        $this->logger->log(LOG_DEBUG, "default view path [%s]", $r);

        return $r;
    }

    /**
     *  ����̾���б�����ƥ�ץ졼�ȥѥ�̾����ά���줿���Υǥե���ȥѥ�̾���֤�
     *
     *  �ǥե���ȤǤ�"foo_bar"�Ȥ���forward̾��"foo/bar" + �ƥ�ץ졼�ȳ�ĥ�ҤȤʤ�
     *  �Τǹ��߱����ƥ����Х饤�ɤ���
     *
     *  @access public
     *  @param  string  $forward_name   forward̾
     *  @return string  forward�ѥ�̾
     */
    function getDefaultForwardPath($forward_name)
    {
        return str_replace('_', '/', $forward_name) . '.' . $this->ext['tpl'];
    }
    
    /**
     *  �ƥ�ץ졼�ȥѥ�̾��������̾���������
     *
     *  getDefaultForwardPath()�򥪡��С��饤�ɤ�����硢��������碌�ƥ����С��饤��
     *  ���뤳�Ȥ�侩(ɬ�ܤǤϤʤ�)
     *
     *  @access public
     *  @param  string  $forward_path   �ƥ�ץ졼�ȥѥ�̾
     *  @return string  ����̾
     */
    function forwardPathToName($forward_path)
    {
        $forward_path = preg_replace('/^\/+/', '', $forward_path);
        $forward_path = preg_replace(sprintf('/\.%s$/', $this->getExt('tpl')), '', $forward_path);

        return str_replace('/', '_', $forward_path);
    }

    /**
     *  ����̾����ƥ�ץ졼�ȥե�����Υѥ�̾���������
     *
     *  @access private
     *  @param  string  $forward_name   forward̾
     *  @return string  �ƥ�ץ졼�ȥե�����Υѥ�̾
     */
    function _getForwardPath($forward_name)
    {
        $forward_obj = null;

        if (isset($this->forward[$forward_name]) == false) {
            // try default
            $this->forward[$forward_name] = array();
        }
        $forward_obj =& $this->forward[$forward_name];
        if (isset($forward_obj['forward_path']) == false) {
            // ��ά������
            $forward_obj['forward_path'] = $this->getDefaultForwardPath($forward_name);
        }

        return $forward_obj['forward_path'];
    }

    /**
     *  ��������������(getTemplateEngine()�Ϥ��Τ����ѻߤ���getRenderer()�����礵���ͽ��)
     *
     *  @access public
     *  @return object  Ethna_Renderer  �����饪�֥�������
     */
    function &getRenderer()
    {
        $_ret_object =& $this->getTemplateEngine();
        return $_ret_object;
    }

    /**
     *  �ƥ�ץ졼�ȥ��󥸥��������
     *
     *  @access public
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
        if (strtolower(get_class($this->renderer)) == "ethna_renderer_smarty") {
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
     *  �ƥ�ץ졼�ȥ��󥸥�Υǥե���Ⱦ��֤����ꤹ��
     *
     *  @access protected
     *  @param  object  Ethna_Renderer  �����饪�֥�������
     *  @obsolete
     */
    function _setDefaultTemplateEngine(&$renderer)
    {
    }

    /**
     *  ���Ѹ�������ꤹ��
     *
     *  ����ؤγ�ĥ�Τ���Τߤ�¸�ߤ��Ƥ��ޤ������ߤ��ä˥����С��饤�ɤ�ɬ�פϤ���ޤ���
     *
     *  @access protected
     *  @param  string  $language           �������(LANG_JA, LANG_EN...)
     *  @param  string  $system_encoding    �����ƥ२�󥳡��ǥ���̾
     *  @param  string  $client_encoding    ���饤����ȥ��󥳡��ǥ���
     */
    function _setLanguage($language, $system_encoding = null, $client_encoding = null)
    {
        $this->language = $language;
        $this->system_encoding = $system_encoding;
        $this->client_encoding = $client_encoding;

        $i18n =& $this->getI18N();
        $i18n->setLanguage($language, $system_encoding, $client_encoding);
    }

    /**
     *  �ǥե���Ⱦ��֤Ǥλ��Ѹ�����������
     *
     *  @access protected
     *  @return array   ���Ѹ���,�����ƥ२�󥳡��ǥ���̾,���饤����ȥ��󥳡��ǥ���̾
     */
    function _getDefaultLanguage()
    {
        return array(LANG_JA, null, null);
    }

    /**
     *  �ǥե���Ⱦ��֤ǤΥ����ȥ��������������
     *
     *  @access protected
     *  @return int     �����ȥ��������(GATEWAY_WWW, GATEWAY_CLI...)
     */
    function _getDefaultGateway($gateway)
    {
        if (is_null($GLOBALS['_Ethna_gateway']) == false) {
            return $GLOBALS['_Ethna_gateway'];
        }
        return GATEWAY_WWW;
    }

    /**
     *  �����ȥ��������б��������饹̾�Υץ�ե��������������
     *
     *  @access public
     *  @param  string  $gateway    �����ȥ�����
     *  @return string  �����ȥ��������饹�ץ�ե�����
     */
    function _getGatewayPrefix($gateway = null)
    {
        $gateway = is_null($gateway) ? $this->getGateway() : $gateway;
        switch ($gateway) {
        case GATEWAY_WWW:
            $prefix = '';
            break;
        case GATEWAY_CLI:
            $prefix = 'Cli';
            break;
        case GATEWAY_XMLRPC:
            $prefix = 'Xmlrpc';
            break;
        default:
            $prefix = '';
            break;
        }

        return $prefix;
    }

    /**
     *  �ޥ͡����㥯�饹̾���������
     *
     *  @access public
     *  @param  string  $name   �ޥ͡����㥭��
     *  @return string  �ޥ͡����㥯�饹̾
     */
    function getManagerClassName($name)
    {
        return sprintf('%s_%sManager', $this->getAppId(), ucfirst($name));
    }

    /**
     *  ���ץꥱ������󥪥֥������ȥ��饹̾���������
     *
     *  @access public
     *  @param  string  $name   ���ץꥱ������󥪥֥������ȥ���
     *  @return string  �ޥ͡����㥯�饹̾
     */
    function getObjectClassName($name)
    {
        $name = preg_replace('/_(.)/e', "strtoupper('\$1')", ucfirst($name));
        return sprintf('%s_%s', $this->getAppId(), $name);
    }

    /**
     *  ��������󥹥���ץȤ򥤥󥯥롼�ɤ���
     *
     *  �����������󥯥롼�ɤ����ե�����˥��饹���������������Ƥ��뤫�ɤ������ݾڤ��ʤ�
     *
     *  @access private
     *  @param  array   $action_obj     ������������
     *  @param  string  $action_name    ���������̾
     */
    function _includeActionScript($action_obj, $action_name)
    {
        $class_path = $form_path = null;

        $action_dir = $this->getActiondir();

        // class_path°�������å�
        if (isset($action_obj['class_path'])) {
            // �ե�ѥ����ꥵ�ݡ���
            $tmp_path = $action_obj['class_path'];
            if (Ethna_Util::isAbsolute($tmp_path) == false) {
                $tmp_path = $action_dir . $tmp_path;
            }

            if (file_exists($tmp_path) == false) {
                $this->logger->log(LOG_WARNING, 'class_path file not found [%s] -> try default', $tmp_path);
            } else {
                include_once $tmp_path;
                $class_path = $tmp_path;
            }
        }

        // �ǥե���ȥ����å�
        if (is_null($class_path)) {
            $class_path = $this->getDefaultActionPath($action_name);
            if (file_exists($action_dir . $class_path)) {
                include_once $action_dir . $class_path;
            } else {
                $this->logger->log(LOG_DEBUG, 'default action file not found [%s] -> try all files', $class_path);
                $class_path = null;
            }
        }
        
        // ���ե����륤�󥯥롼��
        if (is_null($class_path)) {
            $this->_includeDirectory($this->getActiondir());
            return;
        }

        // form_path°�������å�
        if (isset($action_obj['form_path'])) {
            // �ե�ѥ����ꥵ�ݡ���
            $tmp_path = $action_obj['form_path'];
            if (Ethna_Util::isAbsolute($tmp_path) == false) {
                $tmp_path = $action_dir . $tmp_path;
            }

            if ($tmp_path == $class_path) {
                return;
            }
            if (file_exists($tmp_path) == false) {
                $this->logger->log(LOG_WARNING, 'form_path file not found [%s] -> try default', $tmp_path);
            } else {
                include_once $tmp_path;
                $form_path = $tmp_path;
            }
        }

        // �ǥե���ȥ����å�
        if (is_null($form_path)) {
            $form_path = $this->getDefaultFormPath($action_name);
            if ($form_path == $class_path) {
                return;
            }
            if (file_exists($action_dir . $form_path)) {
                include_once $action_dir . $form_path;
            } else {
                $this->logger->log(LOG_DEBUG, 'default form file not found [%s] -> maybe falling back to default form class', $form_path);
            }
        }
    }

    /**
     *  �ӥ塼������ץȤ򥤥󥯥롼�ɤ���
     *
     *  �����������󥯥롼�ɤ����ե�����˥��饹���������������Ƥ��뤫�ɤ������ݾڤ��ʤ�
     *
     *  @access private
     *  @param  array   $forward_obj    �������
     *  @param  string  $forward_name   ����̾
     */
    function _includeViewScript($forward_obj, $forward_name)
    {
        $view_dir = $this->getViewdir();

        // view_path°�������å�
        if (isset($forward_obj['view_path'])) {
            // �ե�ѥ����ꥵ�ݡ���
            $tmp_path = $forward_obj['view_path'];
            if (Ethna_Util::isAbsolute($tmp_path) == false) {
                $tmp_path = $view_dir . $tmp_path;
            }

            if (file_exists($tmp_path) == false) {
                $this->logger->log(LOG_WARNING, 'view_path file not found [%s] -> try default', $tmp_path);
            } else {
                include_once $tmp_path;
                return;
            }
        }

        // �ǥե���ȥ����å�
        $view_path = $this->getDefaultViewPath($forward_name);
        if (file_exists($view_dir . $view_path)) {
            include_once $view_dir . $view_path;
            return;
        } else {
            $this->logger->log(LOG_DEBUG, 'default view file not found [%s]', $view_path);
            $view_path = null;
        }
    }

    /**
     *  �ǥ��쥯�ȥ�ʲ������ƤΥ�����ץȤ򥤥󥯥롼�ɤ���
     *
     *  @access private
     */
    function _includeDirectory($dir)
    {
        $ext = "." . $this->ext['php'];
        $ext_len = strlen($ext);

        if (is_dir($dir) == false) {
            return;
        }

        $dh = opendir($dir);
        if ($dh) {
            while (($file = readdir($dh)) !== false) {
                if ($file != '.' && $file != '..' && is_dir("$dir/$file")) {
                    $this->_includeDirectory("$dir/$file");
                }
                if (substr($file, -$ext_len, $ext_len) != $ext) {
                    continue;
                }
                include_once $dir . '/' . $file;
            }
        }
        closedir($dh);
    }

    /**
     *  ����ե������DSN���������Ѥ���ǡ�����ƹ��ۤ���(���졼�֥�������ʬ����)
     *
     *  DSN�������ˡ(�ǥե����:����ե�����)���Ѥ��������Ϥ����򥪡��С��饤�ɤ���
     *
     *  @access protected
     *  @return array   DSN���(array('DB����1' => 'dsn1', 'DB����2' => 'dsn2', ...))
     */
    function _prepareDSN()
    {
        $r = array();

        foreach ($this->db as $key => $value) {
            $config_key = "dsn";
            if ($key != "") {
                $config_key .= "_$key";
            }
            $dsn = $this->config->get($config_key);
            if (is_array($dsn)) {
                // ����1�ĤˤĤ�ʣ��DSN���������Ƥ�����ϥ�������ʬ��
                $dsn = $this->_selectDSN($key, $dsn);
            }
            $r[$key] = $dsn;
        }
        return $r;
    }

    /**
     *  DSN�Υ�������ʬ����Ԥ�
     *  
     *  ���졼�֥����Фؤο�ʬ������(�ǥե����:������)���ѹ����������Ϥ��Υ᥽�åɤ򥪡��С��饤�ɤ���
     *
     *  @access protected
     *  @param  string  $type       DB����
     *  @param  array   $dsn_list   DSN����
     *  @return string  ���򤵤줿DSN
     */
    function _selectDSN($type, $dsn_list)
    {
        if (is_array($dsn_list) == false) {
            return $dsn_list;
        }

        // �ǥե����:������
        list($usec, $sec) = explode(' ', microtime());
        mt_srand($sec + ((float) $usec * 100000));
        $n = mt_rand(0, count($dsn_list)-1);
        
        return $dsn_list[$n];
    }

    /**
     *  Ethna�ޥ͡���������ꤹ��
     *
     *  ���פʾ��϶��Υ᥽�åɤȤ��ƥ����С��饤�ɤ��Ƥ�褤
     *
     *  @access protected
     */
    function _activateEthnaManager()
    {
        if ($this->config->get('debug') == false) {
            return;
        }

        require_once ETHNA_BASE . '/class/Ethna_InfoManager.php';
        
        // see if we have simpletest
        if (file_exists_ex('simpletest/unit_tester.php', true)) {
            require_once ETHNA_BASE . '/class/Ethna_UnitTestManager.php';
        }

        // action����
        $this->action['__ethna_info__'] = array(
            'form_name' =>  'Ethna_Form_Info',
            'form_path' =>  sprintf('%s/class/Action/Ethna_Action_Info.php', ETHNA_BASE),
            'class_name' => 'Ethna_Action_Info',
            'class_path' => sprintf('%s/class/Action/Ethna_Action_Info.php', ETHNA_BASE),
        );

        // forward����
        $this->forward['__ethna_info__'] = array(
            'forward_path'  => sprintf('%s/tpl/info.tpl', ETHNA_BASE),
            'view_name'     => 'Ethna_View_Info',
            'view_path'     => sprintf('%s/class/View/Ethna_View_Info.php', ETHNA_BASE),
        );
        
        
        // action����
        $this->action['__ethna_unittest__'] = array(
            'form_name' =>  'Ethna_Form_UnitTest',
            'form_path' =>  sprintf('%s/class/Action/Ethna_Action_UnitTest.php', ETHNA_BASE),
            'class_name' => 'Ethna_Action_UnitTest',
            'class_path' => sprintf('%s/class/Action/Ethna_Action_UnitTest.php', ETHNA_BASE),
        );

        // forward����
        $this->forward['__ethna_unittest__'] = array(
            'forward_path'  => sprintf('%s/tpl/unittest.tpl', ETHNA_BASE),
            'view_name'     => 'Ethna_View_UnitTest',
            'view_path'     => sprintf('%s/class/View/Ethna_View_UnitTest.php', ETHNA_BASE),
        );

    }

    /**
     *  CLI�¹���ե饰���������
     *
     *  @access public
     *  @return bool    CLI�¹���ե饰
     *  @obsolete
     */
    function getCLI()
    {
        return $this->gateway == GATEWAY_CLI ? true : false;
    }

    /**
     *  CLI�¹���ե饰�����ꤹ��
     *
     *  @access public
     *  @param  bool    CLI�¹���ե饰
     *  @obsolete
     */
    function setCLI($cli)
    {
        $this->gateway = $cli ? GATEWAY_CLI : $this->_getDefaultGateway();
    }
}
// }}}

/**
 *  XMLRPC�����ȥ������Υ����֥��饹
 *
 *  @access     public
 */
function _Ethna_XmlrpcGateway($method_stub, $param)
{
    $ctl =& Ethna_Controller::getInstance();
    $method = $ctl->getXmlrpcMethodName();
    $r = $ctl->trigger_XMLRPC($method, $param);
    if (Ethna::isError($r)) {
        return array(
            'faultCode' => $r->getCode(),
            'faultString' => $r->getMessage(),
        );
    }
    return $r;
}
?>
