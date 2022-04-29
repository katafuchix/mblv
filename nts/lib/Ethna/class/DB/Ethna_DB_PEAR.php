<?php
// vim: foldmethod=marker
/**
 *  Ethna_DB_PEAR.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_DB_PEAR.php,v 1.9 2006/11/14 08:57:34 ichii386 Exp $
 */
require_once 'DB.php';

// {{{ Ethna_DB_PEAR
/**
 *  Ethna_DB���饹�μ���(PEAR��)
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_DB_PEAR extends Ethna_DB
{
    // {{{ properties
    /**#@+
     *  @access private
     */

    /** @var    object  DB              PEAR DB���֥������� */
    var $db;

    /** @var    array   �ȥ�󥶥��������������å� */
    var $transaction = array();


    /** @var    object  Ethna_Logger    �����֥������� */
    var $logger;

    /** @var    object  Ethna_AppSQL    SQL���֥������� */
    var $sql;

    /** @var    string  DB������(mysql, pgsql...) */
    var $type;

    /** @var    string  DSN */
    var $dsn;

    /** @var    array   DSN (DB::parseDSN()���֤���) */
    var $dsninfo;

    /** @var    bool    ��³��³�ե饰 */
    var $persistent;

    /**#@-*/
    // }}}

    // {{{ Ethna_DB���饹�μ���
    // {{{ Ethna_DB_PEAR
    /**
     *  Ethna_DB_PEAR���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Controller    &$controller    ����ȥ��饪�֥�������
     *  @param  string  $dsn                                DSN
     *  @param  bool    $persistent                         ��³��³����
     */
    function Ethna_DB_PEAR(&$controller, $dsn, $persistent)
    {
        parent::Ethna_DB($controller, $dsn, $persistent);

        $this->db = null;
        $this->logger =& $controller->getLogger();
        $this->sql =& $controller->getSQL();

        $this->dsninfo = DB::parseDSN($dsn);
        $this->dsninfo['new_link'] = true;
        $this->type = $this->dsninfo['phptype'];
    }
    // }}}

    // {{{ connect
    /**
     *  DB����³����
     *
     *  @access public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function connect()
    {
        $this->db =& DB::connect($this->dsninfo, $this->persistent);
        if (DB::isError($this->db)) {
            $error = Ethna::raiseError('DB��³���顼: %s',
                E_DB_CONNECT,
                $this->db->getUserInfo());
            $error->addUserInfo($this->db);
            $this->db = null;
            return $error;
        }

        return 0;
    }
    // }}}

    // {{{ disconnect
    /**
     *  DB��³�����Ǥ���
     *
     *  @access public
     */
    function disconnect()
    {
        if ($this->isValid() == false) {
            return;
        }
        $this->db->disconnect();
    }
    // }}}

    // {{{ isValid
    /**
     *  DB��³���֤��֤�
     *
     *  @access public
     *  @return bool    true:���� false:���顼
     */
    function isValid()
    {
        if (is_null($this->db)
            || is_resource($this->db->connection) == false) {
            return false;
        } else {
            return true;
        }
    }
    // }}}

    // {{{ begin
    /**
     *  DB�ȥ�󥶥������򳫻Ϥ���
     *
     *  @access public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function begin()
    {
        if (count($this->transaction) > 0) {
            $this->transaction[] = true;
            return 0;
        }

        $r = $this->query('BEGIN;');
        if (Ethna::isError($r)) {
            return $r;
        }
        $this->transaction[] = true;

        return 0;
    }
    // }}}

    // {{{ rollback
    /**
     *  DB�ȥ�󥶥����������Ǥ���
     *
     *  @access public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function rollback()
    {
        if (count($this->transaction) == 0) {
            return 0;
        }

        // ����Хå����ϥ����å����˴ؤ�餺�ȥ�󥶥������򥯥ꥢ����
        $r = $this->query('ROLLBACK;');
        if (Ethna::isError($r)) {
            return $r;
        }
        $this->transaction = array();

        return 0;
    }
    // }}}

    // {{{ commit
    /**
     *  DB�ȥ�󥶥�������λ����
     *
     *  @access public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function commit()
    {
        if (count($this->transaction) == 0) {
            return 0;
        } else if (count($this->transaction) > 1) {
            array_pop($this->transaction);
            return 0;
        }

        $r = $this->query('COMMIT;');
        if (Ethna::isError($r)) {
            return $r;
        }
        array_pop($this->transaction);

        return 0;
    }
    // }}}

    // {{{ getMetaData
    /**
     *  �ơ��֥����������������
     *
     *  @access public
     *  @param  string  $table  �ơ��֥�̾
     *  @return mixed   array: PEAR::DB�˽स���᥿�ǡ��� Ethna_Error::���顼
     */
    function &getMetaData($table)
    {
        $def =& $this->db->tableInfo($table);
        if (is_array($def) === false) {
            return $def;
        }

        foreach (array_keys($def) as $k) {
            $def[$k] = array_map('strtolower', $def[$k]);

            // type
            $type_map = array(
                'int'       => array(
                    'int', 'integer', '^int\(?[0-9]\+', '^serial', '[a-z]+int$',
                ),
                'boolean'   => array(
                    'bit', 'bool', 'boolean',
                ),
                'datetime'  => array(
                    'timestamp', 'datetime',
                ),
            );
            foreach ($type_map as $convert_to => $regex) {
                foreach ($regex as $r) {
                    if (preg_match('/'.$r.'/', $def[$k]['type'])) {
                        $def[$k]['type'] = $convert_to;
                        break 2;
                    }
                }
            }

            // flags
            $def[$k]['flags'] = explode(' ', $def[$k]['flags']);
            switch ($this->type) {
            case 'mysql':
                // auto_increment ������� sequence
                if (in_array('auto_increment', $def[$k]['flags'])) {
                    $def[$k]['flags'][] = 'sequence';
                }
                break;
            case 'pgsql':
                // nextval ������� sequence
                foreach ($def[$k]['flags'] as $f) {
                    if (strpos($f, 'nextval') !== false) {
                        $def[$k]['flags'][] = 'sequence';
                        break;
                    }
                }
                break;
            case 'sqlite':
                // integer, primary key �ʤ�� auto_increment ���ɲ�
                if ($def[$k]['type'] == 'int'
                    && in_array('primary_key', $def[$k]['flags'])) {
                    $def[$k]['flags'][] = 'sequence';
                }
                break;
            }
        }

        return $def;
    }
    // }}}
    // }}}

    // {{{ Ethna_AppObjectϢ�ȤΤ���μ���
    // {{{ getType
    /**
     *  DB�����פ��֤�
     *
     *  @access public
     *  @return string  DB������
     */
    function getType()
    {
        return $this->type;
    }
    // }}}

    // {{{ query
    /**
     *  �������ȯ�Ԥ���
     *
     *  @access public
     *  @param  string  $query  SQLʸ
     *  @return mixed   DB_Result:��̥��֥������� Ethna_Error:���顼
     */
    function &query($query)
    {
        return $this->_query($query);
    }
    // }}}

    // {{{ getNextId
    /**
     *  ľ���INSERT�˻Ȥ�ID���������
     *  (pgsql�Τ��б�)
     *
     *  @access public
     *  @return mixed   int
     */
    function getNextId($table_name, $field_name)
    {
        if ($this->isValid() == false) {
            return null;
        } else if ($this->type == 'pgsql') {
            $seq_name = sprintf('%s_%s', $table_name, $field_name);
            $ret = $this->db->nextId($seq_name);
            return $ret;
        }

        return null;
    }
    // }}}

    // {{{ getInsertId
    /**
     *  ľ����INSERT�ˤ��ID���������
     *  (mysql, sqlite�Τ��б�)
     *
     *  @access public
     *  @return mixed   int:ľ���INSERT�ˤ���������줿ID null:̤���ݡ���
     */
    function getInsertId()
    {
        if ($this->isValid() == false) {
            return null;
        } else if ($this->type == 'mysql') {
            return mysql_insert_id($this->db->connection);
        } else if ($this->type == 'sqlite') {
            return sqlite_last_insert_rowid($this->db->connection);
        }

        return null;
    }
    // }}}

    // {{{ fetchRow
    /**
     *  DB_Result::fetchRow()�η�̤����������֤�
     *
     *  @access public
     *  @return int     �����Կ�
     */
    function &fetchRow(&$res, $fetchmode = DB_FETCHMODE_DEFAULT, $rownum = null)
    {
        $row =& $res->fetchRow($fetchmode, $rownum);
        if (is_array($row) === false) {
            return $row;
        }

        if ($this->type === 'sqlite') {
            // "table"."column" -> column
            foreach ($row as $k => $v) {
                unset($row[$k]);
                if (($f = strstr($k, '.')) !== false) {
                    $k = substr($f, 1);
                }
                if ($k{0} === '"' && $k{strlen($k)-1} === '"') {
                    $k = substr($k, 1, -1);
                }
                $row[$k] = $v;
            }
        }

        return $row;
    }
    // }}}

    // {{{ affectedRows
    /**
     *  ľ��Υ�����ˤ�빹���Կ����������
     *
     *  @access public
     *  @return int     �����Կ�
     */
    function affectedRows()
    {
        return $this->db->affectedRows();
    }
    // }}}

    // {{{ quoteIdentifier
    /**
     *  db��type�˱����Ƽ��̻Ҥ�quote����
     *  (����ξ��ϳ����Ǥ�quote)
     *
     *  @access protected
     *  @param  mixed   $identifier array or string
     */
    function quoteIdentifier($identifier)
    {
        if (is_array($identifier)) {
            foreach (array_keys($identifier) as $key) {
                $identifier[$key] = $this->quoteIdentifier($identifier[$key]);
            }
            return $identifier;
        }
            
        switch ($this->type) {
        case 'mysql':
            $ret = '`' . $identifier . '`';
            break;
        case 'pgsql':
        case 'sqlite':
        default:
            $ret = '"' . $identifier . '"';
            break;
        }
        return $ret;
    }
    // }}}
    // }}}

    // {{{ Ethna_DB_PEAR�ȼ��μ���
    // {{{ sqlquery
    /**
     *  SQLʸ���ꥯ�����ȯ�Ԥ���
     *
     *  @access public
     *  @param  string  $sqlid      SQL-ID(+����)
     *  @return mixed   DB_Result:��̥��֥������� Ethna_Error:���顼
     */
    function &sqlquery($sqlid)
    {
        $args = func_get_args();
        array_shift($args);
        $query = $this->sql->get($sqlid, $args);

        return $this->_query($query);
    }
    // }}}

    // {{{ sql
    /**
     *  SQLʸ���������
     *  
     *  @access public
     *  @param  string  $sqlid      SQL-ID
     *  @return string  SQLʸ
     */
    function sql($sqlid)
    {
        $args = func_get_args();
        array_shift($args);
        $query = $this->sql->get($sqlid, $args);

        return $query;
    }
    // }}}

    // {{{ lock
    /**
     *  �ơ��֥���å�����
     *
     *  @access public
     *  @param  mixed   ��å��оݥơ��֥�̾
     *  @return mixed   DB_Result:��̥��֥������� Ethna_Error:���顼
     */
    function lock($tables)
    {
        $this->message = null;

        $sql = "";
        foreach (to_array($tables) as $table) {
            if ($sql != "") {
                $sql .= ", ";
            }
            $sql .= "$table WRITE";
        }

        return $this->query("LOCK TABLES $sql");
    }
    // }}}

    // {{{ unlock
    /**
     *  �ơ��֥�Υ�å����������
     *
     *  @access public
     *  @return mixed   DB_Result:��̥��֥������� Ethna_Error:���顼
     */
    function unlock()
    {
        $this->message = null;
        return $this->query("UNLOCK TABLES");
    }
    // }}}

    // {{{ _query
    /**
     *  �������ȯ�Ԥ���
     *
     *  @access private
     *  @param  string  $query  SQLʸ
     *  @return mixed   DB_Result:��̥��֥������� Ethna_Error:���顼
     */
    function &_query($query)
    {
        $this->logger->log(LOG_DEBUG, "$query");
        $r =& $this->db->query($query);
        if (DB::isError($r)) {
            if ($r->getCode() == DB_ERROR_ALREADY_EXISTS) {
                $error = Ethna::raiseNotice('��ˡ������󥨥顼 SQL[%s]',
                    E_DB_DUPENT,
                    $query,
                    $this->db->errorNative(),
                    $r->getUserInfo());
            } else {
                $error = Ethna::raiseError('�����ꥨ�顼 SQL[%s] CODE[%d] MESSAGE[%s]',
                    E_DB_QUERY,
                    $query,
                    $this->db->errorNative(),
                    $r->getUserInfo());
            }
            return $error;
        }
        return $r;
    }
    // }}}
    // }}}
}
// }}}
?>
