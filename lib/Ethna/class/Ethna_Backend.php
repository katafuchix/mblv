<?php
// vim: foldmethod=marker
/**
 *  Ethna_Backend.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Backend.php,v 1.28 2006/11/17 08:41:53 ichii386 Exp $
 */

// {{{ Ethna_Backend
/**
 *  �Хå�����ɽ������饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Backend
{
    /**#@+
     *  @access     private
     */

    /** @var    object  Ethna_Controller    controller���֥������� */
    var $controller;

    /** @var    object  Ethna_Controller    controller���֥�������($controller�ξ�ά��) */
    var $ctl;

    /** @var    object  Ethna_ClassFactory  ���饹�ե����ȥꥪ�֥������� */
    var $class_factory;

    /** @var    object  Ethna_Config        ���ꥪ�֥������� */
    var $config;

    /** @var    object  Ethna_I18N          i18n���֥������� */
    var $i18n;

    /** @var    object  Ethna_ActionError   ��������󥨥顼���֥������� */
    var $action_error;

    /** @var    object  Ethna_ActionError   ��������󥨥顼���֥�������($action_error�ξ�ά��) */
    var $ae;

    /** @var    object  Ethna_ActionForm    ���������ե����४�֥������� */
    var $action_form;

    /** @var    object  Ethna_ActionForm    ���������ե����४�֥�������($action_form�ξ�ά��) */
    var $af;

    /** @var    object  Ethna_ActionClass   ��������󥯥饹���֥������� */
    var $action_class;

    /** @var    object  Ethna_ActionClass   ��������󥯥饹���֥�������($action_class�ξ�ά��) */
    var $ac;

    /** @var    object  Ethna_Session       ���å���󥪥֥������� */
    var $session;

    /** @var    object  Ethna_Plugin        �ץ饰���󥪥֥������� */
    var $plugin;

    /** @var    array   Ethna_DB���֥������Ȥ��Ǽ�������� */
    var $db_list;

    /** @var    object  Ethna_Logger        �����֥������� */
    var $logger;

    /**#@-*/


    /**
     *  Ethna_Backend���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Controller    &$controller    ����ȥ��饪�֥�������
     */
    function Ethna_Backend(&$controller)
    {
        // ���֥������Ȥ�����
        $this->controller =& $controller;
        $this->ctl =& $this->controller;

        $this->class_factory =& $controller->getClassFactory();

        $this->config =& $controller->getConfig();
        $this->i18n =& $controller->getI18N();

        $this->action_error =& $controller->getActionError();
        $this->ae =& $this->action_error;
        $this->action_form =& $controller->getActionForm();
        $this->af =& $this->action_form;
        $this->action_class = null;
        $this->ac =& $this->action_class;

        $this->session =& $this->controller->getSession();
        $this->plugin =& $this->controller->getPlugin();
        $this->db_list = array();
        $this->logger =& $this->controller->getLogger();
    }

    /**
     *  controller���֥������ȤؤΥ�������(R)
     *
     *  @access public
     *  @return object  Ethna_Controller    controller���֥�������
     */
    function &getController()
    {
        return $this->controller;
    }

    /**
     *  ���ꥪ�֥������ȤؤΥ�������(R)
     *
     *  @access public
     *  @return object  Ethna_Config        ���ꥪ�֥�������
     */
    function &getConfig()
    {
        return $this->config;
    }

    /**
     *  ���ץꥱ�������ID���֤�
     *
     *  @access public
     *  @return string  ���ץꥱ�������ID
     */
    function getAppId()
    {
        return $this->controller->getAppId();
    }

    /**
     *  I18N���֥������ȤΥ�������(R)
     *
     *  @access public
     *  @return object  Ethna_I18N  i18n���֥�������
     */
    function &getI18N()
    {
        return $this->i18n;
    }

    /**
     *  ��������󥨥顼���֥������ȤΥ�������(R)
     *
     *  @access public
     *  @return object  Ethna_ActionError   ��������󥨥顼���֥�������
     */
    function &getActionError()
    {
        return $this->action_error;
    }

    /**
     *  ���������ե����४�֥������ȤΥ�������(R)
     *
     *  @access public
     *  @return object  Ethna_ActionForm    ���������ե����४�֥�������
     */
    function &getActionForm()
    {
        return $this->action_form;
    }

    /**
     *  ���������ե����४�֥������ȤΥ�������(W)
     *
     *  @access public
     */
    function setActionForm(&$action_form)
    {
        $this->action_form =& $action_form;
        $this->af =& $action_form;
    }

    /**
     *  �¹���Υ�������󥯥饹���֥������ȤΥ�������(R)
     *
     *  @access public
     *  @return mixed   Ethna_ActionClass:��������󥯥饹 null:��������󥯥饹̤��
     */
    function &getActionClass()
    {
        return $this->action_class;
    }

    /**
     *  �¹���Υ�������󥯥饹���֥������ȤΥ�������(W)
     *
     *  @access public
     */
    function setActionClass(&$action_class)
    {
        $this->action_class =& $action_class;
        $this->ac =& $action_class;
    }

    /**
     *  �����֥������ȤΥ�������(R)
     *
     *  @access public
     *  @return object  Ethna_Logger    �����֥�������
     */
    function &getLogger()
    {
        return $this->logger;
    }

    /**
     *  ���å���󥪥֥������ȤΥ�������(R)
     *
     *  @access public
     *  @return object  Ethna_Session   ���å���󥪥֥�������
     */
    function &getSession()
    {
        return $this->session;
    }

    /**
     *  �ץ饰���󥪥֥������ȤΥ�������(R)
     *
     *  @access public
     *  @return object  Ethna_Plugin    �ץ饰���󥪥֥�������
     */
    function &getPlugin()
    {
        return $this->plugin;
    }

    /**
     *  �ޥ͡����㥪�֥������ȤؤΥ�������(R)
     *
     *  @access public
     *  @return object  Ethna_AppManager    �ޥ͡����㥪�֥�������
     */
    function &getManager($type, $weak = false)
    {
        $_ret_object =& $this->class_factory->getManager($type, $weak);
        return $_ret_object;
    }

    /**
     *  ���֥������ȤؤΥ�������(R)
     *
     *  @access public
     *  @return mixed   $key���б����륪�֥�������(or null)
     */
    function &getObject($key)
    {
        $arg_list = func_get_args();
        array_shift($arg_list);
        $_ret_object =& $this->class_factory->getObject($key, $arg_list);
        return $_ret_object;
    }

    /**
     *  ���ץꥱ�������Υ١����ǥ��쥯�ȥ���������
     *
     *  @access public
     *  @return string  �١����ǥ��쥯�ȥ�Υѥ�̾
     */
    function getBasedir()
    {
        return $this->controller->getBasedir();
    }

    /**
     *  ���ץꥱ�������Υƥ�ץ졼�ȥǥ��쥯�ȥ���������
     *
     *  @access public
     *  @return string  �ƥ�ץ졼�ȥǥ��쥯�ȥ�Υѥ�̾
     */
    function getTemplatedir()
    {
        return $this->controller->getTemplatedir();
    }

    /**
     *  ���ץꥱ������������ǥ��쥯�ȥ���������
     *
     *  @access public
     *  @return string  ����ǥ��쥯�ȥ�Υѥ�̾
     */
    function getEtcdir()
    {
        return $this->controller->getDirectory('etc');
    }

    /**
     *  ���ץꥱ�������Υƥ�ݥ��ǥ��쥯�ȥ���������
     *
     *  @access public
     *  @return string  �ƥ�ݥ��ǥ��쥯�ȥ�Υѥ�̾
     */
    function getTmpdir()
    {
        return $this->controller->getDirectory('tmp');
    }

    /**
     *  ���ץꥱ�������Υƥ�ץ졼�ȥե������ĥ�Ҥ��������
     *
     *  @access public
     *  @return string  �ƥ�ץ졼�ȥե�����γ�ĥ��
     */
    function getTemplateext()
    {
        return $this->controller->getExt('tpl');
    }

    /**
     *  ������Ϥ���
     *
     *  @access public
     *  @param  int     $level      ����٥�(LOG_DEBUG, LOG_NOTICE...)
     *  @param  string  $message    ����å�����(printf����)
     */
    function log($level, $message)
    {
        $args = func_get_args();
        if (count($args) > 2) {
            array_splice($args, 0, 2);
            $message = vsprintf($message, $args);
        }
        $this->logger->log($level, $message);
    }

    /**
     *  �Хå�����ɽ�����¹Ԥ���
     *
     *  @access public
     *  @param  string  $action_name    �¹Ԥ��륢��������̾��
     *  @return mixed   (string):Forward̾(null�ʤ�forward���ʤ�) Ethna_Error:���顼
     */
    function perform($action_name)
    {
        $forward_name = null;

        $action_class_name = $this->controller->getActionClassName($action_name);
        $this->action_class =& new $action_class_name($this);
        $this->ac =& $this->action_class;

        // ���������μ¹�
        $forward_name = $this->ac->authenticate();
        if ($forward_name === false) {
            return null;
        } else if ($forward_name !== null) {
            return $forward_name;
        }

        $forward_name = $this->ac->prepare();
        if ($forward_name === false) {
            return null;
        } else if ($forward_name !== null) {
            return $forward_name;
        }

        $forward_name = $this->ac->perform();

        return $forward_name;
    }

    /**
     *  DB���֥������Ȥ��֤�
     *
     *  @access public
     *  @param  string  $db_key DB����
     *  @return mixed   Ethna_DB:DB���֥������� null:DSN����ʤ� Ethna_Error:���顼
     *  @todo   �������new���ʤ���class factory�����Ѥ���
     */
    function &getDB($db_key = "")
    {
        $null = null;
        $db_varname =& $this->_getDBVarname($db_key);

        if (Ethna::isError($db_varname)) {
            return $db_varname;
        }

        if (isset($this->db_list[$db_varname]) && $this->db_list[$db_varname] != null) {
            return $this->db_list[$db_varname];
        }

        $dsn = $this->controller->getDSN($db_key);

        if ($dsn == "") {
            // DB��³����
            return $null;
        }

        $dsn_persistent = $this->controller->getDSN_persistent($db_key);

        $class_factory =& $this->controller->getClassFactory();
        $db_class_name = $class_factory->getObjectName('db');
        
        // BC: Ethna_DB -> Ethna_DB_PEAR
        if ($db_class_name == 'Ethna_DB') {
            $db_class_name = 'Ethna_DB_PEAR';
        }
        if (class_exists($db_class_name) === false) {
            $class_factory->_include($db_class_name);
        }

        $this->db_list[$db_varname] =& new $db_class_name($this->controller, $dsn, $dsn_persistent);
        $r = $this->db_list[$db_varname]->connect();
        if (Ethna::isError($r)) {
            $this->db_list[$db_varname] = null;
            return $r;
        }
// [2007-04-21] Comment Outed by Kazuya Fujimori<fujimori@technovarth.co.jp>
//        register_shutdown_function(array(&$this, 'shutdownDB'));

        return $this->db_list[$db_varname];
    }

    /**
     *  DB���֥�������(����)���������
     *
     *  @access public
     *  @return mixed   array:Ethna_DB���֥������Ȥΰ��� Ethan_Error:(�����줫��İʾ����³��)���顼
     */
    function getDBList()
    {
        $r = array();
        $db_define_list = $this->controller->getDBType();
        foreach ($db_define_list as $db_key => $db_type) {
            $db =& $this->getDB($db_key);
            if (Ethna::isError($db)) {
                return $r;
            }
            $elt = array();
            $elt['db'] =& $db;
            $elt['key'] = $db_key;
            $elt['type'] = $db_type;
            $elt['varname'] = "db";
            if ($db_key != "") {
                $elt['varname'] = sprintf("db_%s", strtolower($db_key));
            }
            $r[] = $elt;
        }
        return $r;
    }

    /**
     *  DB���ͥ����������Ǥ���
     *
     *  @access public
     */
    function shutdownDB()
    {
        foreach (array_keys($this->db_list) as $key) {
            if ($this->db_list[$key] != null && $this->db_list[$key]->isValid()) {
                $this->db_list[$key]->disconnect();
                unset($this->db_list[$key]);
            }
        }
    }

    /**
     *  ���ꤵ�줿DB�������б�����(����DB���֥������Ȥ��Ǽ���뤿���)�����ѿ�̾���������
     *
     *  ��ľ�⤦�פ�ʤ��ΤǤ����������ߴ����ݻ��Τ���˰���Ĥ��Ƥ�����֤Ǥ�
     *  (Ethna_AppManager���饹�ʤɤǡ�$this->db�Ȥ����Ƥ���ս꤬���ʤ��餺��
     *  ��Τ�)
     *
     *  @access private
     *  @param  string  $db_key DB����
     *  @return mixed   string:�����ѿ�̾ Ethna_Error:������DB����
     */
    function &_getDBVarname($db_key = "")
    {
        $r = $this->controller->getDBType($db_key);
        if (is_null($r)) {
            return Ethna::raiseError(E_DB_INVALIDTYPE, "̤�����DB����[%s]", $db_key);
        }

        if ($db_key == "") {
            $db_varname = "";
        } else {
            $db_varname = sprintf("%s", strtolower($db_key));
        }

        return $db_varname;
    }
}
// }}}
?>
