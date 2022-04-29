<?php
// vim: foldmethod=marker
/**
 *  Ethna_AppObject.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_AppObject.php,v 1.28 2007/01/04 15:17:12 cocoitiban Exp $
 */

// {{{ Ethna_AppObject
/**
 *  ���ץꥱ������󥪥֥������ȤΥ١������饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 *  @todo       ʣ���ơ��֥���б�
 */
class Ethna_AppObject
{
    // {{{ properties
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_Backend       backend���֥������� */
    var $backend;

    /** @var    object  Ethna_Config        ���ꥪ�֥������� */
    var $config;

    /** @var    object  Ethna_I18N          i18n���֥������� */
    var $i18n;

    /** @var    object  Ethna_ActionForm    ���������ե����४�֥������� */
    var $action_form;

    /** @var    object  Ethna_ActionForm    ���������ե����४�֥�������(��ά��) */
    var $af;

    /** @var    object  Ethna_Session       ���å���󥪥֥������� */
    var $session;

    /** @var    string  DB����ץ�ե����� */
    var $db_prefix = null;

    /** @var    array   �ơ��֥���� */
    var $table_def = null;

    /** @var    array   �ץ�ѥƥ���� */
    var $prop_def = null;

    /** @var    array   �ץ�ѥƥ� */
    var $prop = null;

    /** @var    array   �ץ�ѥƥ�(�Хå����å�) */
    var $prop_backup = null;

    /** @var    int     �ץ�ѥƥ��������å���ͭ������(sec) */
    var $prop_def_cache_lifetime = 86400;

    /** @var    array   �ץ饤�ޥꥭ����� */
    var $id_def = null;

    /** @var    int     ���֥�������ID */
    var $id = null;

    /**#@-*/
    // }}}

    // {{{ Ethna_AppObject
    /**
     *  Ethna_AppObject���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Backend   &$backend   Ethna_Backend���֥�������
     *  @param  mixed   $key_type   ��������̾
     *  @param  mixed   $key        ��������
     *  @param  array   $prop       �ץ�ѥƥ�����
     *  @return mixed   0:���ｪλ -1:����/�ץ�ѥƥ�̤���� Ethna_Error:���顼
     */
    function Ethna_AppObject(&$backend, $key_type = null, $key = null, $prop = null)
    {
        $this->backend =& $backend;
        $this->config =& $backend->getConfig();
        $this->action_form =& $backend->getActionForm();
        $this->af =& $this->action_form;
        $this->session =& $backend->getSession();
        $ctl =& $backend->getController();

        // DB���֥������Ȥ�����
        $db_list = $this->_getDBList();
        if (Ethna::isError($db_list)) {
            return $db_list;
        } else if (is_null($db_list['rw'])) {
            return Ethna::raiseError(
                "Ethna_AppObject�����Ѥ���ˤϥǡ����١������꤬ɬ�פǤ�",
                E_DB_NODSN);
        }

        $this->my_db_rw =& $db_list['rw'];
        $this->my_db_ro =& $db_list['ro'];
        // XXX: app obj��db type���Τ�ʤ��Ƥ�ư���٤�
        $this->my_db_type = $this->my_db_rw->getType();

        // �ץ�ѥƥ������ư����
        if (is_null($this->table_def)) {
            $this->table_def = $this->_getTableDef();
        }
        if (is_string($this->table_def)) {
            $this->table_def = array($this->table_def => array('primary' => true));
        }
        if (is_null($this->prop_def)) {
            $this->prop_def = $this->_getPropDef();
        }

        // �ץ�ѥƥ������ɬ�ܥ������䴰
        foreach (array_keys($this->prop_def) as $k) {
            if (isset($this->prop_def[$k]['primary']) == false) {
                $this->prop_def[$k]['primary'] = false;
            }
        }

        // ���֥������ȤΥץ饤�ޥꥭ���������
        foreach ($this->prop_def as $k => $v) {
            if ($v['primary'] == false) {
                continue;
            }
            if (is_null($this->id_def)) {
                $this->id_def = $k;
            } else if (is_array($this->id_def)) {
                $this->id_def[] = $k;
            } else {
                $this->id_def = array($this->id_def, $k);
            }
        }
        
        // ���������������å�
        if (is_null($key_type) && is_null($key) && is_null($prop)) {
            // perhaps for adding object
            return 0;
        }

        // �ץ�ѥƥ�����
        if (is_null($prop)) {
            $this->_setPropByDB($key_type, $key);
        } else {
            $this->_setPropByValue($prop);
        }

        $this->prop_backup = $this->prop;

        if (is_array($this->id_def)) {
            $this->id = array();
            foreach ($this->id_def as $k) {
                $this->id[] = $this->prop[$k];
            }
        } else {
            $this->id = $this->prop[$this->id_def];
        }

        return 0;
    }
    // }}}

    // {{{ isValid
    /**
     *  ͭ���ʥ��֥������Ȥ��ɤ������֤�
     *
     *  @access public
     *  @return bool    true:ͭ�� false:̵��
     */
    function isValid()
    {
        if (is_array($this->id)) {
            return is_null($this->id[0]) ? false : true;
        } else {
            return is_null($this->id) ? false : true;
        }
    }
    // }}}

    // {{{ isActive
    /**
     *  �����ƥ��֤ʥ��֥������Ȥ��ɤ������֤�
     *
     *  isValid()�᥽�åɤϥ��֥������ȼ��Τ�ͭ�����ɤ�����Ƚ�ꤹ��Τ��Ф�
     *  isActive()�ϥ��֥������Ȥ����ץꥱ�������Ȥ���ͭ�����ɤ������֤�
     *
     *  @access public
     *  @return bool    true:�����ƥ��� false:�󥢥��ƥ���
     */
    function isActive()
    {
        if ($this->isValid() == false) {
            return false;
        }
        return $this->prop['state'] == OBJECT_STATE_ACTIVE ? true : false;
    }
    // }}}

    // {{{ getDef
    /**
     *  ���֥������ȤΥץ�ѥƥ�������֤�
     *
     *  @access public
     *  @return array   ���֥������ȤΥץ�ѥƥ����
     */
    function getDef()
    {
        return $this->prop_def;
    }
    // }}}

    // {{{ getIdDef
    /**
     *  �ץ饤�ޥꥭ��������֤�
     *
     *  @access public
     *  @return mixed   �ץ饤�ޥꥭ���Ȥʤ�ץ�ѥƥ�̾
     */
    function getIdDef()
    {
        return $this->id_def;
    }
    // }}}

    // {{{ getId
    /**
     *  ���֥�������ID���֤�
     *
     *  @access public
     *  @return mixed   ���֥�������ID
     */
    function getId()
    {
        return $this->id;
    }
    // }}}

    // {{{ get
    /**
     *  ���֥������ȥץ�ѥƥ��ؤΥ�������(R)
     *
     *  @access public
     *  @param  string  $key    �ץ�ѥƥ�̾
     *  @return mixed   �ץ�ѥƥ�
     */
    function get($key)
    {
        if (isset($this->prop_def[$key]) == false) {
            trigger_error(sprintf("Unknown property [%s]", $key), E_USER_ERROR);
            return null;
        }
        if (isset($this->prop[$key])) {
            return $this->prop[$key];
        }
        return null;
    }
    // }}}

    // {{{ getName
    /**
     *  ���֥������ȥץ�ѥƥ�ɽ��̾�ؤΥ�������
     *
     *  @access public
     *  @param  string  $key    �ץ�ѥƥ�̾
     *  @return string  �ץ�ѥƥ���ɽ��̾
     */
    function getName($key)
    {
        return $this->get($key);
    }
    // }}}

    // {{{ getLongName
    /**
     *  ���֥������ȥץ�ѥƥ�ɽ��̾(�ܺ�)�ؤΥ�������
     *
     *  @access public
     *  @param  string  $key    �ץ�ѥƥ�̾
     *  @return string  �ץ�ѥƥ���ɽ��̾(�ܺ�)
     */
    function getLongName($key)
    {
        return $this->get($key);
    }
    // }}}

    // {{{ getNameObject
    /**
     *  �ץ�ѥƥ�ɽ��̾���Ǽ����Ϣ��������������
     *
     *  @access public
     *  @return array   �ץ�ѥƥ�ɽ��̾���Ǽ����Ϣ������
     */
    function getNameObject()
    {
        $object = array();

        foreach ($this->prop_def as $key => $elt) {
            $object[$elt['form_name']] = $this->getName($key);
        }

        return $object;
    }
    // }}}

    // {{{ set
    /**
     *  ���֥������ȥץ�ѥƥ��ؤΥ�������(W)
     *
     *  @access public
     *  @param  string  $key    �ץ�ѥƥ�̾
     *  @param  string  $value  �ץ�ѥƥ���
     */
    function set($key, $value)
    {
        if (isset($this->prop_def[$key]) == false) {
            trigger_error(sprintf("Unknown property [%s]", $key), E_USER_ERROR);
            return null;
        }
        $this->prop[$key] = $value;
    }
    // }}}

    // {{{ dump
    /**
     *  ���֥������ȥץ�ѥƥ������η����ǥ���פ���(���ߤ�CSV�����Τߥ��ݡ���)
     *
     *  @access public
     *  @param  string  $type   ����׷���("csv"...)
     *  @return string  ����׷��(���顼�ξ���null)
     */
    function dump($type = "csv")
    {
        $method = "_dump_$type";
        if (method_exists($this, $method) == false) {
            return Ethna::raiseError("�᥽�å�̤���[%s]", E_APP_NOMETHOD, $method);
        }

        return $this->$method();
    }
    // }}}

    // {{{ importForm
    /**
     *  �ե������ͤ��饪�֥������ȥץ�ѥƥ��򥤥�ݡ��Ȥ���
     *
     *  @access public
     *  @param  int     $option ����ݡ��ȥ��ץ����(OBJECT_IMPORT_IGNORE_NULL,...)
     */
    function importForm($option = null)
    {
        foreach ($this->getDef() as $k => $def) {
            $value = $this->af->get($def['form_name']);
            if (is_null($value)) {
                // �ե����फ���ͤ���������Ƥ��ʤ����ο���
                if ($option == OBJECT_IMPORT_IGNORE_NULL) {
                    // null�ϥ����å�
                    continue;
                } else if ($option == OBJECT_IMPORT_CONVERT_NULL) {
                    // ��ʸ������Ѵ�
                    $value = '';
                }
            }
            $this->set($k, $value);
        }
    }
    // }}}

    // {{{ exportForm
    /**
     *  ���֥������ȥץ�ѥƥ���ե������ͤ˥������ݡ��Ȥ���
     *
     *  @access public
     */
    function exportForm()
    {
        foreach ($this->getDef() as $k => $def) {
            $this->af->set($def['form_name'], $this->get($k));
        }
    }
    // }}}

    // {{{ add
    /**
     *  ���֥������Ȥ��ɲä���
     *
     *  @access public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function add()
    {
        // next id�μ���: (pgsql�ξ��Τ�)
        // �����Ǥ������Ϥ���id��Ȥ�
        foreach (to_array($this->id_def) as $id_def) {
            if (isset($this->prop_def[$id_def]['seq'])
                && $this->prop_def[$id_def]['seq']) {
                // NOTE: ����app object�ʳ�����insert���ʤ����Ȥ�����
                $next_id = $this->my_db_rw->getNextId(
                    $this->prop_def[$id_def]['table'], $id_def);
                if ($next_id !== null && $next_id >= 0) {
                    $this->prop[$id_def] = $next_id;
                }
                break;
            }
        }

        $sql = $this->_getSQL_Add();
        for ($i = 0; $i < 4; $i++) {
            $r =& $this->my_db_rw->query($sql);
            if (Ethna::isError($r)) {
                if ($r->getCode() == E_DB_DUPENT) {
                    // ��ʣ���顼������Ƚ��
                    $duplicate_key_list = $this->_getDuplicateKeyList();
                    if (Ethna::isError($duplicate_key_list)) {
                        return $duplicate_key_list;
                    }
                    if (is_array($duplicate_key_list)
                        && count($duplicate_key_list) > 0) {
                        foreach ($duplicate_key_list as $k) {
                            return Ethna::raiseNotice('��ʣ���顼[%s]',
                                                      E_APP_DUPENT, $k);
                        }
                    }
                } else {
                    return $r;
                }
            } else {
                break;
            }
        }
        if ($i == 4) {
            // cannot be reached
            return Ethna::raiseError('��ʣ���顼����Ƚ�̥��顼', E_GENERAL);
        }

        // last insert id�μ���: (mysql, sqlite�Τ�)
        // primary key �� 'seq' �ե饰������(�ǽ��)�ץ�ѥƥ��������
        $insert_id = $this->my_db_rw->getInsertId(); 
        if ($insert_id !== null && $insert_id >= 0) {
            foreach (to_array($this->id_def) as $id_def) {
                if (isset($this->prop_def[$id_def]['seq'])
                    && $this->prop_def[$id_def]['seq']) {
                    $this->prop[$id_def] = $insert_id;
                    break;
                }
            }
        }

        // ID������
        if (is_array($this->id_def)) {
            $this->id = array();
            foreach ($this->id_def as $k) {
                $this->id[] = $this->prop[$k];
            }
        } else if (isset($this->prop[$this->id_def])) {
            $this->id = $this->prop[$this->id_def];
        } else {
            trigger_error("primary key is missing", E_USER_ERROR);
        }

        // �Хå����å�/����å��幹��
        $this->prop_backup = $this->prop;
        $this->_clearPropCache();

        return 0;
    }
    // }}}

    // {{{ update
    /**
     *  ���֥������Ȥ򹹿�����
     *
     *  @access public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function update()
    {
        $sql = $this->_getSQL_Update();
        for ($i = 0; $i < 4; $i++) {
            $r =& $this->my_db_rw->query($sql);
            if (Ethna::isError($r)) {
                if ($r->getCode() == E_DB_DUPENT) {
                    // ��ʣ���顼������Ƚ��
                    $duplicate_key_list = $this->_getDuplicateKeyList();
                    if (Ethna::isError($duplicate_key_list)) {
                        return $duplicate_key_list;
                    }
                    if (is_array($duplicate_key_list)
                        && count($duplicate_key_list) > 0) {
                        foreach ($duplicate_key_list as $k) {
                            return Ethna::raiseNotice('��ʣ���顼[%s]',
                                                      E_APP_DUPENT, $k);
                        }
                    }
                } else {
                    return $r;
                }
            } else {
                break;
            }
        }
        if ($i == 4) {
            // cannot be reached
            return Ethna::raiseError('��ʣ���顼����Ƚ�̥��顼', E_GENERAL);
        }

        $affected_rows = $this->my_db_rw->affectedRows();
        if ($affected_rows <= 0) {
            $this->backend->log(LOG_DEBUG, "update query with 0 updated rows");
        }

        // �Хå����å�/����å��幹��
        $this->prop_backup = $this->prop;
        $this->_clearPropCache();

        return 0;
    }
    // }}}

    // {{{ replace
    /**
     *  ���֥������Ȥ��ִ�����
     *
     *  MySQL��REPLACEʸ����������ư���Ԥ�(add()�ǽ�ʣ���顼��ȯ��������
     *  update()��Ԥ�)
     *
     *  @access public
     *  @return mixed   0:���ｪλ >0:���֥�������ID(�ɲû�) Ethna_Error:���顼
     */
    function replace()
    {
        $sql = $this->_getSQL_Select($this->getIdDef(), $this->getId());

        for ($i = 0; $i < 3; $i++) {
            $r = $this->my_db_rw->query($sql);
            if (Ethna::isError($r)) {
                return $r;
            }
            $n = $r->numRows();

            if ($n > 0) {
                $r = $this->update();
                return $r;
            } else {
                $r = $this->add();
                if (Ethna::isError($r) == false) {
                    return $r;
                } else if ($r->getCode() != E_APP_DUPENT) {
                    return $r;
                }
            }
        }
        
        return $r;
    }
    // }}}

    // {{{ remove
    /**
     *  ���֥������Ȥ�������
     *
     *  @access public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function remove()
    {
        $sql = $this->_getSQL_Remove();
        $r =& $this->my_db_rw->query($sql);
        if (Ethna::isError($r)) {
            return $r;
        }

        // �ץ�ѥƥ�/�Хå����å�/����å��奯�ꥢ
        $this->id = $this->prop = $this->prop_backup = null;
        $this->_clearPropCache();

        return 0;
    }
    // }}}

    // {{{ searchId
    /**
     *  ���֥�������ID�򸡺�����
     *
     *  @access public
     *  @param  array   $filter     �������
     *  @param  array   $order      ������̥����Ⱦ��
     *  @param  int     $offset     ������̼������ե��å�
     *  @param  int     $count      ������̼�����
     *  @return mixed   array(0 => �������˥ޥå��������,
     *                  1 => $offset, $count�ˤ����ꤵ�줿����Υ��֥�������ID����)
     *                  Ethna_Error:���顼
     */
    function searchId($filter = null, $order = null, $offset = null, $count = null)
    {
        if (is_null($offset) == false || is_null($count) == false) {
            $sql = $this->_getSQL_SearchLength($filter);
            $r =& $this->my_db_ro->query($sql);
            if (Ethna::isError($r)) {
                return $r;
            }
            $row = $this->my_db_ro->fetchRow($r, DB_FETCHMODE_ASSOC);
            $length = $row['id_count'];
        } else {
            $length = null;
        }

        $id_list = array();
        $sql = $this->_getSQL_SearchId($filter, $order, $offset, $count);
        $r =& $this->my_db_ro->query($sql);
        if (Ethna::isError($r)) {
            return $r;
        }
        $n = $r->numRows();
        for ($i = 0; $i < $n; $i++) {
            $row = $this->my_db_ro->fetchRow($r, DB_FETCHMODE_ASSOC);

            // �ץ饤�ޥꥭ����1�����ʤ饹���顼�ͤ��Ѵ�
            if (is_array($this->id_def) == false) {
                $row = $row[$this->id_def];
            }
            $id_list[] = $row;
        }
        if (is_null($length)) {
            $length = count($id_list);
        }

        return array($length, $id_list);
    }
    // }}}

    // {{{ searchProp
    /**
     *  ���֥������ȥץ�ѥƥ��򸡺�����
     *
     *  @access public
     *  @param  array   $keys       ��������ץ�ѥƥ�
     *  @param  array   $filter     �������
     *  @param  array   $order      ������̥����Ⱦ��
     *  @param  int     $offset     ������̼������ե��å�
     *  @param  int     $count      ������̼�����
     *  @return mixed   array(0 => �������˥ޥå��������,
     *                  1 => $offset, $count�ˤ����ꤵ�줿����Υ��֥������ȥץ�ѥƥ�����)
     *                  Ethna_Error:���顼
     */
    function searchProp($keys = null, $filter = null, $order = null,
                        $offset = null, $count = null)
    {
        if (is_null($offset) == false || is_null($count) == false) {
            $sql = $this->_getSQL_SearchLength($filter);
            $r =& $this->my_db_ro->query($sql);
            if (Ethna::isError($r)) {
                return $r;
            }
            $row = $this->my_db_ro->fetchRow($r, DB_FETCHMODE_ASSOC);
            $length = $row['id_count'];
        } else {
            $length = null;
        }

        $prop_list = array();
        $sql = $this->_getSQL_SearchProp($keys, $filter, $order, $offset, $count);
        $r =& $this->my_db_ro->query($sql);
        if (Ethna::isError($r)) {
            return $r;
        }
        $n = $r->numRows();
        for ($i = 0; $i < $n; $i++) {
            $row = $this->my_db_ro->fetchRow($r, DB_FETCHMODE_ASSOC);
            $prop_list[] = $row;
        }
        if (is_null($length)) {
            $length = count($prop_list);
        }

        return array($length, $prop_list);
    }
    // }}}

    // {{{ _setDefault
    /**
     *  ���֥������ȤΥ��ץꥱ�������ǥե���ȥץ�ѥƥ������ꤹ��
     *
     *  ���󥹥ȥ饯���ˤ����ꤵ�줿�����˥ޥå����륨��ȥ꤬�ʤ��ä�����
     *  �ǥե���ȥץ�ѥƥ��򤳤������ꤹ�뤳�Ȥ������
     *
     *  @access protected
     *  @param  mixed   $key_type   ��������̾
     *  @param  mixed   $key        ��������
     *  @return int     0:���ｪλ
     */
    function _setDefault($key_type, $key)
    {
        return 0;
    }
    // }}}

    // {{{ _setPropByDB
    /**
     *  ���֥������ȥץ�ѥƥ���DB�����������
     *
     *  @access private
     *  @param  mixed   $key_type   ��������̾
     *  @param  mixed   $key        ��������
     */
    function _setPropByDB($key_type, $key)
    {
        global $_ETHNA_APP_OBJECT_CACHE;

        $key_type = to_array($key_type);
        $key = to_array($key);
        if (count($key_type) != count($key)) {
            trigger_error(sprintf("Unmatched key_type & key length [%d-%d]",
                          count($key_type), count($key)), E_USER_ERROR);
            return;
        }
        foreach ($key_type as $elt) {
            if (isset($this->prop_def[$elt]) == false) {
                trigger_error("Invalid key_type [$elt]", E_USER_ERROR);
                return;
            }
        }

        // ����å�������å�
        $class_name = strtolower(get_class($this));
        if (is_array($_ETHNA_APP_OBJECT_CACHE) == false
            || array_key_exists($class_name, $_ETHNA_APP_OBJECT_CACHE) == false) {
            $_ETHNA_APP_OBJECT_CACHE[$class_name] = array();
        }
        $cache_key = serialize(array($key_type, $key));
        if (array_key_exists($cache_key, $_ETHNA_APP_OBJECT_CACHE[$class_name])) {
            $this->prop = $_ETHNA_APP_OBJECT_CACHE[$class_name][$cache_key];
            return;
        }

        // SQLʸ����
        $sql = $this->_getSQL_Select($key_type, $key);

        // �ץ�ѥƥ�����
        $r =& $this->my_db_ro->query($sql);
        if (Ethna::isError($r)) {
            return;
        }
        $n = $r->numRows();
        if ($n == 0) {
            // try default
            if ($this->_setDefault($key_type, $key) == false) {
                // nop
            }
            return;
        } else if ($n > 1) {
            trigger_error("Invalid key (multiple rows found) [$key]", E_USER_ERROR);
            return;
        }
        $this->prop = $this->my_db_ro->fetchRow($r, DB_FETCHMODE_ASSOC);

        // ����å��奢�åץǡ���
        $_ETHNA_APP_OBJECT_CACHE[$class_name][$cache_key] = $this->prop;
    }
    // }}}

    // {{{ _setPropByValue
    /**
     *  ���󥹥ȥ饯���ǻ��ꤵ�줿�ץ�ѥƥ������ꤹ��
     *
     *  @access private
     *  @param  array   $prop   �ץ�ѥƥ�����
     */
    function _setPropByValue($prop)
    {
        $def = $this->getDef();
        foreach ($def as $key => $value) {
            if ($value['primary'] && isset($prop[$key]) == false) {
                // �ץ饤�ޥꥭ���Ͼ�ά�Բ�
                trigger_error("primary key is not identical", E_USER_ERROR);
            }
            $this->prop[$key] = $prop[$key];
        }
    }
    // }}}

    // {{{ _getPrimaryTable
    /**
     *  ���֥������ȤΥץ饤�ޥ�ơ��֥���������
     *
     *  @access private
     *  @return string  ���֥������ȤΥץ饤�ޥ�ơ��֥�̾
     */
    function _getPrimaryTable()
    {
        $tables = array_keys($this->table_def);
        $table = $tables[0];
        
        return $table;
    }
    // }}}

    // {{{ _getDuplicateKeyList
    /**
     *  ��ʣ�������������
     *
     *  @access private
     *  @return mixed   0:��ʣ�ʤ� Ethna_Error:���顼 array:��ʣ�����Υץ�ѥƥ�̾����
     */
    function _getDuplicateKeyList()
    {
        $duplicate_key_list = array();

        // �������ꤵ��Ƥ���ץ饤�ޥꥭ����NULL���ޤޤ����ϸ������ʤ�
        $check_pkey = true;
        foreach (to_array($this->id_def) as $k) {
            if (isset($this->prop[$k]) == false || is_null($this->prop[$k])) {
                $check_pkey = false;
                break;
            }
        }

        // �ץ饤�ޥꥭ����multi columns�ˤʤ�����Τ��̰���
        if ($check_pkey) {
            $sql = $this->_getSQL_Duplicate($this->id_def);
            $r =& $this->my_db_rw->query($sql);
            if (Ethna::isError($r)) {
                return $r;
            } else if ($r->numRows() > 0) {
                // we can overwrite $key_list here
                $duplicate_key_list = to_array($this->id_def);
            }
        }

        // ��ˡ�������
        foreach ($this->prop_def as $k => $v) {
            if ($v['primary'] == true || $v['key'] == false) {
                continue;
            }
            $sql = $this->_getSQL_Duplicate($k);
            $r =& $this->my_db_rw->query($sql);
            if (Ethna::isError($r)) {
                return $r;
            } else if ($r->NumRows() > 0) {
                $duplicate_key_list[] = $k;
            }
        }

        if (count($duplicate_key_list) > 0) {
            return $duplicate_key_list;
        } else {
            return 0;
        }
    }
    // }}}

    // {{{ _getSQL_Select
    /**
     *  ���֥������ȥץ�ѥƥ����������SQLʸ���ۤ���
     *
     *  @access private
     *  @param  array   $key_type   �����Ȥʤ�ץ�ѥƥ�̾����
     *  @param  array   $key        $key_type���б����륭������
     *  @return string  SELECTʸ
     */
    function _getSQL_Select($key_type, $key)
    {
        $key_type = to_array($key_type);
        if (is_null($key)) {
            // add()��
            $key = array();
            for ($i = 0; $i < count($key_type); $i++) {
                $key[$i] = null;
            }
        } else {
            $key = to_array($key);
        }

        // SQL����������
        Ethna_AppSQL::escapeSQL($key, $this->my_db_type);

        $tables = implode(',',
            $this->my_db_ro->quoteIdentifier(array_keys($this->table_def)));
        $columns = implode(',',
            $this->my_db_ro->quoteIdentifier(array_keys($this->prop_def)));

        // �������
        $condition = null;
        for ($i = 0; $i < count($key_type); $i++) {
            if (is_null($condition)) {
                $condition = "WHERE ";
            } else {
                $condition .= " AND ";
            }
            $condition .= Ethna_AppSQL::getCondition(
                $this->my_db_ro->quoteIdentifier($key_type[$i]), $key[$i]);
        }

        $sql = "SELECT $columns FROM $tables $condition";

        return $sql;
    }
    // }}}

    // {{{ _getSQL_Add
    /**
     *  ���֥������Ȥ��ɲä���SQLʸ���ۤ���
     *
     *  @access private
     *  @return string  ���֥������Ȥ��ɲä��뤿���INSERTʸ
     */
    function _getSQL_Add()
    {
        $tables = implode(',',
            $this->my_db_rw->quoteIdentifier(array_keys($this->table_def)));

        $key_list = array();
        $set_list = array();
        $prop_arg_list = $this->prop;

        Ethna_AppSQL::escapeSQL($prop_arg_list, $this->my_db_type);
        foreach ($this->prop_def as $k => $v) {
            if (isset($prop_arg_list[$k]) == false) {
                continue;
            }
            $key_list[] = $this->my_db_rw->quoteIdentifier($k);
            $set_list[] = $prop_arg_list[$k];
        }

        $key_list = implode(', ', $key_list);
        $set_list = implode(', ', $set_list);
        $sql = "INSERT INTO $tables ($key_list) VALUES ($set_list)";

        return $sql;
    }
    // }}}

    // {{{ _getSQL_Update
    /**
     *  ���֥������ȥץ�ѥƥ��򹹿�����SQLʸ���ۤ���
     *
     *  @access private
     *  @return ���֥������ȥץ�ѥƥ��򹹿����뤿���UPDATEʸ
     */
    function _getSQL_Update()
    {
        $tables = implode(',',
            $this->my_db_rw->quoteIdentifier(array_keys($this->table_def)));

        // SET�繽��
        $set_list = "";
        $prop_arg_list = $this->prop;
        Ethna_AppSQL::escapeSQL($prop_arg_list, $this->my_db_type);
        foreach ($this->prop_def as $k => $v) {
            if ($set_list != "") {
                $set_list .= ",";
            }
            $set_list .= sprintf("%s=%s",
                                 $this->my_db_rw->quoteIdentifier($k),
                                 $prop_arg_list[$k]);
        }

        // �������(primary key)
        $condition = null;
        foreach (to_array($this->id_def) as $k) {
            if (is_null($condition)) {
                $condition = "WHERE ";
            } else {
                $condition .= " AND ";
            }
            $v = $this->prop_backup[$k];    // equals to $this->id
            Ethna_AppSQL::escapeSQL($v, $this->my_db_type);
            $condition .= Ethna_AppSQL::getCondition(
                $this->my_db_rw->quoteIdentifier($k), $v);
        }

        $sql = "UPDATE $tables SET $set_list $condition";

        return $sql;
    }
    // }}}

    // {{{ _getSQL_Remove
    /**
     *  ���֥������Ȥ�������SQLʸ���ۤ���
     *
     *  @access private
     *  @return string  ���֥������Ȥ������뤿���DELETEʸ
     */
    function _getSQL_Remove()
    {
        $tables = implode(',',
            $this->my_db_rw->quoteIdentifier(array_keys($this->table_def)));

        // �������(primary key)
        $condition = null;
        foreach (to_array($this->id_def) as $k) {
            if (is_null($condition)) {
                $condition = "WHERE ";
            } else {
                $condition .= " AND ";
            }
            $v = $this->prop_backup[$k];    // equals to $this->id
            Ethna_AppSQL::escapeSQL($v, $this->my_db_type);
            $condition .= Ethna_AppSQL::getCondition(
                $this->my_db_rw->quoteIdentifier($k), $v);
        }
        if (is_null($condition)) {
            trigger_error("DELETE with no conditon", E_USER_ERROR);
            return null;
        }

        $sql = "DELETE FROM $tables $condition";

        return $sql;
    }
    // }}}

    // {{{ _getSQL_Duplicate
    /**
     *  ���֥������ȥץ�ѥƥ��Υ�ˡ��������å���Ԥ�SQLʸ���ۤ���
     *
     *  @access private
     *  @param  mixed   $key    ��ˡ��������å���Ԥ��ץ�ѥƥ�̾
     *  @return string  ��ˡ��������å���Ԥ������SELECTʸ
     */
    function _getSQL_Duplicate($key)
    {
        $tables = implode(',',
            $this->my_db_ro->quoteIdentifier(array_keys($this->table_def)));
        $columns = implode(',',
            $this->my_db_ro->quoteIdentifier(array_keys($this->prop_def)));

        $condition = null;
        // �������(�������ꤵ��Ƥ���ץ饤�ޥꥭ���ϸ����оݤ������)
        if (is_null($this->id) == false) {
            $primary_value = to_array($this->getId());
            $n = 0;
            foreach (to_array($this->id_def) as $k) {
                if (is_null($condition)) {
                    $condition = "WHERE ";
                } else {
                    $condition .= " AND ";
                }
                $value = $primary_value[$n];
                Ethna_AppSQL::escapeSQL($value, $this->my_db_type);
                $condition .= Ethna_AppSQL::getCondition(
                    $this->my_db_ro->quoteIdentifier($k), $value, OBJECT_CONDITION_NE);
                $n++;
            }
        }

        foreach (to_array($key) as $k) {
            if (is_null($condition)) {
                $condition = "WHERE ";
            } else {
                $condition .= " AND ";
            }
            $v = $this->prop[$k];
            Ethna_AppSQL::escapeSQL($v, $this->my_db_type);
            $condition .= Ethna_AppSQL::getCondition(
                $this->my_db_ro->quoteIdentifier($k), $v);
        }

        $sql = "SELECT $columns FROM $tables $condition";

        return $sql;
    }
    // }}}

    // {{{ _getSQL_SearchLength
    /**
     *  ���֥������ȸ������(offset, count����)���������SQLʸ���ۤ���
     *
     *  @access private
     *  @param  array   $filter     �������
     *  @return string  ���������������뤿���SELECTʸ
     *  @todo   my_db_type�λ��Ȥ��ѻ�
     */
    function _getSQL_SearchLength($filter)
    {
        // �ơ��֥�
        $tables = implode(',',
            $this->my_db_ro->quoteIdentifier(array_keys($this->table_def)));
        if ($this->_isAdditionalField($filter)) {
            $tables .= " " . $this->_SQLPlugin_SearchTable();
        }

        $id_def = to_array($this->id_def);
        $column_id = $this->my_db_ro->quoteIdentifier($this->_getPrimaryTable())
            . "." . $this->my_db_ro->quoteIdentifier($id_def[0]);
        $id_count = $this->my_db_ro->quoteIdentifier('id_count');
        $condition = $this->_getSQL_SearchCondition($filter);

        if ($this->my_db_type === 'sqlite') {
            $sql = "SELECT COUNT(*) AS $id_count FROM "
                . " (SELECT DISTINCT $column_id FROM $tables $condition)";
        } else {
            $sql = "SELECT COUNT(DISTINCT $column_id) AS $id_count "
                . "FROM $tables $condition";
        }

        return $sql;
    }
    // }}}

    // {{{ _getSQL_SearchId
    /**
     *  ���֥�������ID������Ԥ�SQLʸ���ۤ���
     *
     *  @access private
     *  @param  array   $filter     �������
     *  @param  array   $order      ������̥����Ⱦ��
     *  @param  int     $offset     ������̼������ե��å�
     *  @param  int     $count      ������̼�����
     *  @return string  ���֥������ȸ�����Ԥ�SELECTʸ
     */
    function _getSQL_SearchId($filter, $order, $offset, $count)
    {
        // �ơ��֥�
        $tables = implode(',',
            $this->my_db_ro->quoteIdentifier(array_keys($this->table_def)));
        if ($this->_isAdditionalField($filter)
            || $this->_isAdditionalField($order)) {
            $tables .= " " . $this->_SQLPlugin_SearchTable();
        }

        $column_id = "";
        foreach (to_array($this->id_def) as $id) {
            if ($column_id != "") {
                $column_id .= ",";
            }
            $column_id .= $this->my_db_ro->quoteIdentifier($this->_getPrimaryTable())
                . "." . $this->my_db_ro->quoteIdentifier($id);
        }
        $condition = $this->_getSQL_SearchCondition($filter);

        $sort = "";
        if (is_array($order)) {
            foreach ($order as $k => $v) {
                if ($sort == "") {
                    $sort = "ORDER BY ";
                } else {
                    $sort .= ", ";
                }
                $sort .= sprintf("%s %s", $this->my_db_ro->quoteIdentifier($k),
                                 $v == OBJECT_SORT_ASC ? "ASC" : "DESC");
            }
        }

        $limit = "";
        if (is_null($count) == false) {
            $limit = sprintf("LIMIT %d", $count);
            if (is_null($offset) == false) {
                $limit .= sprintf(" OFFSET %d", $offset);
            }
        }

        $sql = "SELECT DISTINCT $column_id FROM $tables $condition $sort $limit";

        return $sql;
    }
    // }}}

    // {{{ _getSQL_SearchProp
    /**
     *  ���֥������ȥץ�ѥƥ�������Ԥ�SQLʸ���ۤ���
     *
     *  @access private
     *  @param  array   $keys       �����ץ�ѥƥ�����
     *  @param  array   $filter     �������
     *  @param  array   $order      ������̥����Ⱦ��
     *  @param  int     $offset     ������̼������ե��å�
     *  @param  int     $count      ������̼�����
     *  @return string  ���֥������ȸ�����Ԥ�SELECTʸ
     */
    function _getSQL_SearchProp($keys, $filter, $order, $offset, $count)
    {
        // �ơ��֥�
        $tables = implode(',',
            $this->my_db_ro->quoteIdentifier(array_keys($this->table_def)));
        if ($this->_isAdditionalField($filter)
            || $this->_isAdditionalField($order)) {
            $tables .= " " . $this->_SQLPlugin_SearchTable();
        }
        $p_table = $this->_getPrimaryTable();

        // �������ɲåץ�ѥƥ�
        if ($this->_isAdditionalField($filter)
            || $this->_isAdditionalField($order)) {
            $search_prop_def = $this->_SQLPlugin_SearchPropDef();
        } else {
            $search_prop_def = array();
        }
        $def = array_merge($this->getDef(), $search_prop_def);

        // �����
        $column = "";
        $keys = $keys === null ? array_keys($def) : to_array($keys);
        foreach ($keys as $key) {
            if (isset($def[$key]) == false) {
                continue;
            }
            if ($column != "") {
                $column .= ", ";
            }
            $t = isset($def[$key]['table']) ? $def[$key]['table'] : $p_table;
            $column .= sprintf("%s.%s",
                               $this->my_db_ro->quoteIdentifier($t),
                               $this->my_db_ro->quoteIdentifier($key));
        }

        // WHERE �ξ��
        $condition = $this->_getSQL_SearchCondition($filter);

        // ORDER BY
        $sort = "";
        if (is_array($order)) {
            foreach ($order as $k => $v) {
                if ($sort == "") {
                    $sort = "ORDER BY ";
                } else {
                    $sort .= ", ";
                }
                $sort .= sprintf("%s %s",
                                 $this->my_db_ro->quoteIdentifier($k),
                                 $v == OBJECT_SORT_ASC ? "ASC" : "DESC");
            }
        }

        // LIMIT, OFFSET
        $limit = "";
        if (is_null($count) == false) {
            $limit = sprintf("LIMIT %d", $count);
            if (is_null($offset) == false) {
                $limit .= sprintf(" OFFSET %d", $offset);
            }
        }

        $sql = "SELECT $column FROM $tables $condition $sort $limit";

        return $sql;
    }
    // }}}

    // {{{ _getSQL_SearchCondition
    /**
     *  ���֥������ȸ���SQL�ξ��ʸ���ۤ���
     *
     *  @access private
     *  @param  array   $filter     �������
     *  @return string  ���֥������ȸ����ξ��ʸ(���顼�ʤ�null)
     */
    function _getSQL_SearchCondition($filter)
    {
        if (is_array($filter) == false) {
            return "";
        }

        $p_table = $this->_getPrimaryTable();

        // �������ɲåץ�ѥƥ�
        if ($this->_isAdditionalField($filter)) {
            $search_prop_def = $this->_SQLPlugin_SearchPropDef();
        } else {
            $search_prop_def = array();
        }
        $prop_def = array_merge($this->prop_def, $search_prop_def);

        $condition = null;
        foreach ($filter as $k => $v) {
            if (isset($prop_def[$k]) == false) {
                trigger_error(sprintf("Unknown property [%s]", $k), E_USER_ERROR);
                return null;
            }

            if (is_null($condition)) {
                $condition = "WHERE ";
            } else {
                $condition .= " AND ";
            }

            $t = isset($prop_def[$k]['table']) ? $prop_def[$k]['table'] : $p_table;

            if (is_object($v)) {
                // Ethna_AppSearchObject�����ꤵ��Ƥ�����
                $condition .= $v->toString(
                    $this->my_db_ro->quoteIdentifier($t)
                    .'.'. $this->my_db_ro->quoteIdentifier($k));
            } else if (is_array($v) && count($v) > 0 && is_object($v[0])) {
                // Ethna_AppSearchObject������ǻ��ꤵ��Ƥ�����
                $n = 0;
                foreach ($v as $so) {
                    if ($n > 0) {
                        $condition .= " AND ";
                    }
                    $condition .= $so->toString(
                        $this->my_db_ro->quoteIdentifier($t)
                        .'.'. $this->my_db_ro->quoteIdentifier($k));
                    $n++;
                }
            } else if ($prop_def[$k]['type'] == VAR_TYPE_STRING) {
                // ��ά��(ʸ����)
                Ethna_AppSQL::escapeSQL($v, $this->my_db_type);
                $condition .= Ethna_AppSQL::getCondition(
                    $this->my_db_ro->quoteIdentifier($t)
                    .'.'. $this->my_db_ro->quoteIdentifier($k),
                    $v, OBJECT_CONDITION_LIKE);
            } else {
                // ��ά��(����)
                Ethna_AppSQL::escapeSQL($v, $this->my_db_type);
                $condition .= Ethna_AppSQL::getCondition(
                    $this->my_db_ro->quoteIdentifier($t)
                    .'.'. $this->my_db_ro->quoteIdentifier($k),
                    $v, OBJECT_CONDITION_EQ);
            }
        }

        return $condition;
    }
    // }}}

    // {{{ _SQLPlugin_SearchTable
    /**
     *  ���֥������ȸ���SQL�ץ饰����(�ɲåơ��֥�)
     *
     *  sample:
     *  <code>
     *  return " LEFT JOIN bar_tbl ON foo_tbl.user_id=bar_tbl.user_id";
     *  </code>
     *
     *  @access protected
     *  @return string  �ơ��֥�JOIN��SQLʸ
     */
    function _SQLPlugin_SearchTable()
    {
        return "";
    }
    // }}}

    // {{{ _SQLPlugin_SearchPropDef
    /**
     *  ���֥������ȸ���SQL�ץ饰����(�ɲþ�����)
     *
     *  sample:
     *  <code>
     *  $search_prop_def = array(
     *    'group_id' => array(
     *      'primary' => true, 'key' => true, 'type' => VAR_TYPE_INT,
     *      'form_name' => 'group_id', 'table' => 'group_user_tbl',
     *    ),
     *  );
     *  return $search_prop_def;
     *  </code>
     *
     *  @access protected
     *  @return array   �ɲþ�����
     */
    function _SQLPlugin_SearchPropDef()
    {
        return array();
    }
    // }}}

    // {{{ _dump_csv
    /**
     *  ���֥������ȥץ�ѥƥ���CSV�����ǥ���פ���
     *
     *  @access protected
     *  @return string  ����׷��
     */
    function _dump_csv()
    {
        $dump = "";

        $n = 0;
        foreach ($this->getDef() as $k => $def) {
            if ($n > 0) {
                $dump .= ",";
            }
            $dump .= Ethna_Util::escapeCSV($this->getName($k));
            $n++;
        }

        return $dump;
    }
    // }}}

    // {{{ _isAdditionalField
    /**
     *  (�������|�����Ⱦ��)�ե�����ɤ��ɲåե�����ɤ��ޤޤ�뤫�ɤ������֤�
     *
     *  @access private
     *  @param  array   $field  (�������|�����Ⱦ��)���
     *  @return bool    true:�ޤޤ�� false:�ޤޤ�ʤ�
     */
    function _isAdditionalField($field)
    {
        if (is_array($field) == false) {
            return false;
        }

        $def = $this->getDef();
        foreach ($field as $key => $value) {
            if (array_key_exists($key, $def) == false) {
                return true;
            }
            if (is_object($value)) {
                // Ethna_AppSearchObject
                if ($value->isTarget($key)) {
                    return true;
                }
            }
        }
        return false;
    }
    // }}}

    // {{{ _clearPropCache
    /**
     *  ����å���ǡ�����������
     *
     *  @access private
     */
    function _clearPropCache()
    {
        $class_name = strtolower(get_class($this));
        foreach (array('_ETHNA_APP_OBJECT_CACHE',
                       '_ETHNA_APP_MANAGER_OL_CACHE',
                       '_ETHNA_APP_MANAGER_OPL_CACHE',
                       '_ETHNA_APP_MANAGER_OP_CACHE') as $key) {
            if (array_key_exists($key, $GLOBALS)
                && array_key_exists($class_name, $GLOBALS[$key])) {
                unset($GLOBALS[$key][$class_name]);
            }
        }
    }
    // }}}

    // {{{ _getDBList
    /**
     *  DB���֥�������(read only/read-write)���������
     *
     *  @access protected
     *  @return array   array('ro' => {read only db object}, 'rw' => {read-write db object})
     */
    function _getDBList()
    {
        $r = array('ro' => null, 'rw' => null);

        $db_list = $this->backend->getDBList();
        if (Ethna::isError($db_list)) {
            return $r;
        }
        foreach ($db_list as $elt) {
            if ($this->db_prefix) {
                // ����Υץ�ե����������ꤵ�줿DB��³������
                // (�ơ��֥뤴�Ȥ�DB���ۤʤ���ʤ�)
                if ($this->db_prefix == $elt['key']) {
//                if (strncmp($this->db_prefix,
//                            $elt['key'],
//                            strlen($this->db_prefix)) != 0) {
//                    continue;
		            if ($elt['type'] == DB_TYPE_RW) {
		                $r['rw'] =& $elt['db'];
		            } else if ($elt['type'] == DB_TYPE_RO) {
		                $r['ro'] =& $elt['db'];
		            }
                    break;
                }
            }

            $varname = $elt['varname'];

            // for B.C.
            $this->$varname =& $elt['db'];
            if ($elt['type'] == DB_TYPE_RW) {
                $r['rw'] =& $elt['db'];
            } else if ($elt['type'] == DB_TYPE_RO) {
                $r['ro'] =& $elt['db'];
            }
        }
        if ($r['ro'] == null && $r['rw'] != null) {
            $r['ro'] =& $r['rw'];
        }
        return $r;
    }
    // }}}

    // {{{ _getTableDef
    /**
     *  �ơ��֥�������������
     *
     *  (���饹̾���ơ��֥�̾�Υ롼����Ѥ���������
     *  ���Υ᥽�åɤ򥪡��С��饤�ɤ��ޤ�)
     *
     *  @access protected
     *  @return array   �ơ��֥����
     */
    function _getTableDef()
    {
        $class_name = get_class($this);
        if (preg_match('/(\w+)_(.*)/', $class_name, $match) == 0) {
            return null;
        }
        $table = $match[2];

        // PHP 4�Ͼ�˾�ʸ�����֤�...�Τ�PHP 5����
        $table = preg_replace('/^([A-Z])/e', "strtolower('\$1')", $table);
        $table = preg_replace('/([A-Z])/e', "'_' . strtolower('\$1')", $table);

        return array($table => array('primary' => true));
    }
    // }}}

    // {{{ _getPropDef
    /**
     *  �ץ�ѥƥ�������������
     *
     *  @access protected
     *  @return array   �ץ�ѥƥ����
     */
    function _getPropDef()
    {
        if (is_null($this->table_def)) {
            return null;
        }
        foreach ($this->table_def as $table_name => $table_attr) {
            // use 1st one
            break;
        }

        $cache_manager =& Ethna_CacheManager::getInstance('localfile');
        $cache_manager->setNamespace('ethna_app_object');
        $cache_key = md5($this->my_db_ro->getDSN() . '-' . $table_name);

        if ($cache_manager->isCached($cache_key, $this->prop_def_cache_lifetime)) {
            $prop_def = $cache_manager->get($cache_key,
                                            $this->prop_def_cache_lifetime);
            if (Ethna::isError($prop_def) == false) {
                return $prop_def;
            }
        }

        $r = $this->my_db_ro->getMetaData($table_name);
        if(Ethna::isError($r)){
            return null;
        }

        $prop_def = array();
        foreach ($r as $i => $field_def) {
            $primary  = in_array('primary_key', $field_def['flags']);
            $seq      = in_array('sequence',    $field_def['flags']);
            $required = in_array('not_null',    $field_def['flags']);
            $key      = in_array('primary_key', $field_def['flags'])
                        || in_array('multiple_key', $field_def['flags'])
                        || in_array('unique_key', $field_def['flags']);

            switch ($field_def['type']) {
            case 'int':
                $type = VAR_TYPE_INT;
                break;
            case 'boolean':
                $type = VAR_TYPE_BOOLEAN;
                break;
            case 'datetime':
                $type = VAR_TYPE_DATETIME;
                break;
            default:
                $type = VAR_TYPE_STRING;
                break;
            }

            $prop_def[$field_def['name']] = array(
                'primary'   => $primary,
                'seq'       => $seq,
                'key'       => $key,
                'type'      => $type,
                'required'  => $required,
                'length'    => $field_def['len'],
                'form_name' => $this->_fieldNameToFormName($field_def),
                'table'     => $table_name,
            );
        }
        
        $cache_manager->set($cache_key, $prop_def);

        return $prop_def;
    }
    // }}}

    // {{{ _fieldNameToFormName
    /**
     *  �ǡ����١����ե������̾���б�����ե�����̾���������
     *
     *  @access protected
     */
    function _fieldNameToFormName($field_def)
    {
        return $field_def['name'];
    }
    // }}}
}
// }}}
?>
