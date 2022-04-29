<?php
// vim: foldmethod=marker
/**
 *  Ethna_DB_Creole.php
 *
 *  @package    Ethna
 *  @author     halt feits <halt.feits@gmail.com>
 *  @version    $Id: Ethna_DB_Creole.php,v 1.3 2006/10/02 05:34:49 halt1983 Exp $
 */

require_once 'creole/Creole.php';

/**
 *  Ethna��DB��ݥ��饹
 *
 *  Ethna�Υե졼������DB���֥������Ȥ򰷤��������ݥ��饹
 *  (�ΤĤ��...�������Ф餷��PHP 4)
 *
 *  @package    Ethna
 *  @author     halt feits <halt.feits@gmail.com>
 *  @access     public
 */
class Ethna_DB_Creole extends Ethna_DB
{
    /**#@+
     *  @access private
     */

    /** @var    object  DB              DB���֥������� */
    var $db;

    /** @var    string   dsn */
    var $dsn;

    /**#@-*/


    /**
     *  ���󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Controller    &$controller    ����ȥ��饪�֥�������
     *  @param  string  $dsn                                DSN
     *  @param  bool    $persistent                         ��³��³����
     */
    function Ethna_DB_Creole(&$controller, $dsn, $persistent)
    {
        parent::Ethna_DB($controller, $dsn, $persistent);
    }

    /**
     *  DB����³����
     *
     *  @access public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function connect()
    {
        $this->db = Creole::getConnection($this->dsn);
        return 0;
    }

    /**
     *  DB��³�����Ǥ���
     *
     *  @access public
     */
    function disconnect()
    {
        $this->db->close();
        return 0;
    }

    /**
     *  DB��³���֤��֤�
     *
     *  @access public
     *  @return bool    true:����(��³�Ѥ�) false:���顼/̤��³
     */
    function isValid()
    {
        if ( is_object($this->db) ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *  DB�ȥ�󥶥������򳫻Ϥ���
     *
     *  @access public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function begin()
    {
        return 0;
    }

    /**
     *  DB�ȥ�󥶥����������Ǥ���
     *
     *  @access public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function rollback()
    {
        $this->db->rollback();
        return 0;
    }

    /**
     *  DB�ȥ�󥶥�������λ����
     *
     *  @access public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function commit()
    {
        $this->db->commit();
        return 0;
    }

    /**
     *
     * PrepareStatement
     *
     * @return  Object
     * @access  public
     */
    function prepareStatement($sql)
    {
        return $this->db->prepareStatement($sql);
    }
}
?>
