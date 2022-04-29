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
class Tv_AppObject extends Ethna_AppObject
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
     *  @access     public
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
                if (strncmp($this->db_prefix,
                            $elt['key'],
                            strlen($this->db_prefix)) != 0) {
                    continue;
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
}
// }}}
?>