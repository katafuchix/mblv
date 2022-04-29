<?php
// vim: foldmethod=marker
/**
 *  Ethna_DB.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_DB.php,v 1.9 2006/07/19 05:22:37 fujimoto Exp $
 */

// {{{ Ethna_DB
/**
 *  Ethna��DB��ݥ��饹
 *
 *  Ethna�Υե졼������DB���֥������Ȥ򰷤��������ݥ��饹
 *  (�ΤĤ��...�������Ф餷��PHP 4)
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_DB
{
    /**#@+
     *  @access private
     */

    /** @var    object  DB              DB���֥������� */
    var $db;

    /** @var    array   �ȥ�󥶥��������������å� */
    var $transaction = array();

    /**#@-*/


    /**
     *  Ethna_DB���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Controller    &$controller    ����ȥ��饪�֥�������
     *  @param  string  $dsn                                DSN
     *  @param  bool    $persistent                         ��³��³����
     */
    function Ethna_DB(&$controller, $dsn, $persistent)
    {
        $this->dsn = $dsn;
        $this->persistent = $persistent;
    }

    /**
     *  DB����³����
     *
     *  @access public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function connect()
    {
    }

    /**
     *  DB��³�����Ǥ���
     *
     *  @access public
     */
    function disconnect()
    {
    }

    /**
     *  DB��³���֤��֤�
     *
     *  @access public
     *  @return bool    true:����(��³�Ѥ�) false:���顼/̤��³
     */
    function isValid()
    {
    }

    /**
     *  DB�ȥ�󥶥������򳫻Ϥ���
     *
     *  @access public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function begin()
    {
    }

    /**
     *  DB�ȥ�󥶥����������Ǥ���
     *
     *  @access public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function rollback()
    {
    }

    /**
     *  DB�ȥ�󥶥�������λ����
     *
     *  @access public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function commit()
    {
    }

    /**
     *  �ơ��֥����������������
     *
     *  @access public
     *  @return mixed   array: PEAR::DB�˽स���᥿�ǡ��� Ethna_Error::���顼
     */
    function getMetaData()
    {
    }

    /**
     *  DSN���������
     *
     *  @access public
     *  @return string  DSN
     */
    function getDSN()
    {
        return $this->dsn;
    }
}
// }}}
?>
