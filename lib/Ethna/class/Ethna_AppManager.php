<?php
// vim: foldmethod=marker
/**
 *  Ethna_AppManager.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_AppManager.php,v 1.10 2006/11/20 07:15:11 ichii386 Exp $
 */

/** ���ץꥱ������󥪥֥������Ⱦ���: ���Ѳ�ǽ */
define('OBJECT_STATE_ACTIVE', 0);
/** ���ץꥱ������󥪥֥������Ⱦ���: �����Բ� */
define('OBJECT_STATE_INACTIVE', 100);


/** ���ץꥱ������󥪥֥������ȥ����ȥե饰: ���� */
define('OBJECT_SORT_ASC', 0);
/** ���ץꥱ������󥪥֥������ȥ����ȥե饰: �߽� */
define('OBJECT_SORT_DESC', 1);


/** ���ץꥱ������󥪥֥������ȥ���ݡ��ȥ��ץ����: NULL�ץ�ѥƥ�̵�Ѵ� */
define('OBJECT_IMPORT_IGNORE_NULL', 1);

/** ���ץꥱ������󥪥֥������ȥ���ݡ��ȥ��ץ����: NULL�ץ�ѥƥ�����ʸ�����Ѵ� */
define('OBJECT_IMPORT_CONVERT_NULL', 2);


// {{{ Ethna_AppManager
/**
 *  ���ץꥱ�������ޥ͡�����Υ١������饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_AppManager
{
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_Backend       backend���֥������� */
    var $backend;

    /** @var    object  Ethna_Config        ���ꥪ�֥������� */
    var $config;

    /**  @var    object  Ethna_DB      DB���֥������� */
    var $db;

    /** @var    object  Ethna_I18N          i18n���֥������� */
    var $i18n;

    /** @var    object  Ethna_ActionForm    ���������ե����४�֥������� */
    var $action_form;

    /** @var    object  Ethna_ActionForm    ���������ե����४�֥�������(��ά��) */
    var $af;

    /** @var    object  Ethna_Session       ���å���󥪥֥������� */
    var $session;

    /**#@-*/

    /**
     *  Ethna_AppManager�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Backend   &$backend   backend���֥�������
     */
    function Ethna_AppManager(&$backend)
    {
        // ���ܥ��֥������Ȥ�����
        $this->backend =& $backend;
        $this->config =& $backend->getConfig();
        $this->i18n =& $backend->getI18N();
        $this->action_form =& $backend->getActionForm();
        $this->af =& $this->action_form;
        $this->session =& $backend->getSession();

        $db_list = $backend->getDBList();
        if (Ethna::isError($db_list) == false) {
            foreach ($db_list as $elt) {
                $varname = $elt['varname'];
                $this->$varname =& $elt['db'];
            }
        }
    }

    /**
     *  °���ΰ������֤�
     *
     *  @access public
     *  @param  string  $attr_name  °����̾��(�ѿ�̾)
     *  @return array   °���Ͱ���
     */
    function getAttrList($attr_name)
    {
        $varname = $attr_name . "_list";
        return $this->$varname;
    }

    /**
     *  °����ɽ��̾���֤�
     *
     *  @access public
     *  @param  string  $attr_name  °����̾��(�ѿ�̾)
     *  @param  mixed   $id         °��ID
     *  @return string  °����ɽ��̾
     */
    function getAttrName($attr_name, $id)
    {
        $varname = $attr_name . "_list";
        if (is_array($this->$varname) == false) {
            return null;
        }
        $list =& $this->$varname;
        if (isset($list[$id]) == false) {
            return null;
        }
        return $list[$id]['name'];
    }

    /**
     *  °����ɽ��̾(�ܺ�)���֤�
     *
     *  @access public
     *  @param  string  $attr_name  °����̾��(�ѿ�̾)
     *  @param  mixed   $id         °��ID
     *  @return string  °���ξܺ�ɽ��̾
     */
    function getAttrLongName($attr_name, $id)
    {
        $varname = $attr_name . "_list";
        if (is_array($this->$varname) == false) {
            return null;
        }
        $list =& $this->$varname;
        if (isset($list[$id]['long_name']) == false) {
            return null;
        }

        return $list[$id]['long_name'];
    }

    /**
     *  ���֥������Ȥΰ������֤�
     *
     *  @access public
     *  @param  string  $class  Ethna_AppObject�ηѾ����饹̾
     *  @param  array   $filter     �������
     *  @param  array   $order      ������̥����Ⱦ��
     *  @param  int     $offset     ������̼������ե��å�
     *  @param  int     $count      ������̼�����
     *  @return mixed   array(0 => �������˥ޥå��������, 1 => $offset, $count�ˤ����ꤵ�줿����Υ��֥�������ID����) Ethna_Error:���顼
     *  @todo   �ѥե����ޥ��к�(1���֥������Ȥ���ͭ���꤬¿�����)
     */
    function getObjectList($class, $filter = null,
                           $order = null, $offset = null, $count = null)
    {
        global $_ETHNA_APP_MANAGER_OL_CACHE;

        $object_list = array();
        $class_name = sprintf("%s_%s", $this->backend->getAppId(), $class);

        // ����å�������å�
        $cache_class = strtolower($class_name);
        if (is_array($_ETHNA_APP_MANAGER_OL_CACHE) == false
            || array_key_exists($cache_class, $_ETHNA_APP_MANAGER_OL_CACHE) == false) {
            $_ETHNA_APP_MANAGER_OL_CACHE[$cache_class] = array();
        }
        $cache_key = serialize(array($filter, $order, $offset, $count));
        if (array_key_exists($cache_key, $_ETHNA_APP_MANAGER_OL_CACHE[$cache_class])) {
            list($length, $prop_list)
                = $_ETHNA_APP_MANAGER_OL_CACHE[$cache_class][$cache_key];
        } else {
            // ����å��幹��
            $tmp =& new $class_name($this->backend);
            list($length, $prop_list)
                = $tmp->searchProp(null, $filter, $order, $offset, $count);
            $_ETHNA_APP_MANAGER_OL_CACHE[$cache_class][$cache_key]
                = array($length, $prop_list);
        }

        foreach ($prop_list as $prop) {
            $object =& new $class_name($this->backend, null, null, $prop);
            $object_list[] = $object;
        }

        return array($length, $object_list);
    }

    /**
     *  ���֥������ȥץ�ѥƥ��ΰ������֤�
     *
     *  getObjectList()�᥽�åɤϾ��˥ޥå�����ID�򸵤�Ethna_AppObject����������
     *  ���ᥳ���Ȥ������롣������ϥץ�ѥƥ��Τߤ�SELECT����Τ��㥳���Ȥǥǡ���
     *  ��������뤳�Ȥ���ǽ��
     *
     *  @access public
     *  @param  string  $class      Ethna_AppObject�ηѾ����饹̾
     *  @param  array   $keys       ��������ץ�ѥƥ�����(null�ʤ�����)
     *  @param  array   $filter     �������
     *  @param  array   $order      ������̥����Ⱦ��
     *  @param  int     $offset     ������̼������ե��å�
     *  @param  int     $count      ������̼�����
     *  @return mixed   array(0 => �������˥ޥå��������,
     *                        1 => $offset, $count�ˤ����ꤵ�줿����Υץ�ѥƥ�����)
     *                  Ethna_Error:���顼
     */
    function getObjectPropList($class, $keys = null, $filter = null,
                               $order = null, $offset = null, $count = null)
    {
        global $_ETHNA_APP_MANAGER_OPL_CACHE;

        $prop_list = array();
        $class_name = sprintf("%s_%s", $this->backend->getAppId(), $class);

        // ����å�������å�
        $cache_class = strtolower($class_name);
        if (is_array($_ETHNA_APP_MANAGER_OPL_CACHE) == false
            || array_key_exists($cache_class, $_ETHNA_APP_MANAGER_OPL_CACHE) == false) {
            $_ETHNA_APP_MANAGER_OPL_CACHE[$cache_class] = array();
        }
        $cache_key = serialize(array($filter, $order, $offset, $count));
        if (array_key_exists($cache_key, $_ETHNA_APP_MANAGER_OPL_CACHE[$cache_class])) {
            // skip
        } else {
            // ����å��幹��
            $tmp =& new $class_name($this->backend);
            $_ETHNA_APP_MANAGER_OPL_CACHE[$cache_class][$cache_key]
                = $tmp->searchProp($keys, $filter, $order, $offset, $count);
        }

        return $_ETHNA_APP_MANAGER_OPL_CACHE[$cache_class][$cache_key];
    }

    /**
     *  ���֥������ȥץ�ѥƥ����֤�
     *
     *  getObjectPropList()�᥽�åɤδʰ��Ǥǡ�$filter�ˤ���̤�1����ȥ��
     *  ���¤������(�ץ饤�ޥꥭ���Ǥθ�����)�����Ѥ���
     *
     *  @access public
     *  @param  string  $class      Ethna_AppObject�ηѾ����饹̾
     *  @param  array   $keys       ��������ץ�ѥƥ�����
     *  @param  array   $filter     �������
     *  @return mixed   array:�ץ�ѥƥ����� null:����ȥ�ʤ� Ethna_Error:���顼
     */
    function getObjectProp($class, $keys = null, $filter = null)
    {
        global $_ETHNA_APP_MANAGER_OP_CACHE;

        $prop_list = array();
        $class_name = sprintf("%s_%s", $this->backend->getAppId(), $class);

        // ����å�������å�
        $cache_class = strtolower($class_name);
        if (is_array($_ETHNA_APP_MANAGER_OP_CACHE) == false
            || array_key_exists($cache_class, $_ETHNA_APP_MANAGER_OP_CACHE) == false) {
            $_ETHNA_APP_MANAGER_OP_CACHE[$cache_class] = array();
        }
        $cache_key = serialize(array($filter));
        if (array_key_exists($cache_key, $_ETHNA_APP_MANAGER_OP_CACHE[$cache_class])) {
            // skip
        } else {
            // ����å��幹��
            $tmp =& new $class_name($this->backend);
            list(, $prop) = $tmp->searchProp($keys, $filter);
            $_ETHNA_APP_MANAGER_OP_CACHE[$cache_class][$cache_key]
                = count($prop) > 0 ? $prop[0] : null;
        }

        return $_ETHNA_APP_MANAGER_OP_CACHE[$cache_class][$cache_key];
    }
}
// }}}
?>
