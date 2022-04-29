<?php
// vim: foldmethod=marker
/**
 *  Ethna_AppSQL.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_AppSQL.php,v 1.6 2006/11/13 14:06:05 ichii386 Exp $
 */

// {{{ Ethna_AppSQL
/**
 *  ���ץꥱ�������SQL�١������饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_AppSQL
{
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_Controller    controller���֥������� */
    var $controller;

    /**#@-*/

    /**
     *  Ethna_AppSQL�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Controller    &$controller    controller���֥�������
     */
    function Ethna_AppSQL(&$controller)
    {
        $this->controller =& $controller;
    }

    /**
     *  Ŭ�ڤ˥��������פ��줿SQLʸ���֤�
     *
     *  @access public
     *  @param  string  $sqlfunc    SQLʸ����̾
     *  @param  array   $args       ��������
     *  @return string  ���������פ��줿SQLʸ
     */
    function get($sqlid, $args)
    {
        Ethna_AppSQL::escapeSQL($args);

        return call_user_func_array(array(&$this, $sqlid), $args);
    }

    /**
     *  SQL�����򥨥������פ���
     *
     *  @access public
     *  @param  mixed   &$var   ���������פ�����
     *  @static
     */
    function escapeSQL(&$var, $type = null)
    {
        if (!is_array($var)) {
            if (is_null($var)) {
                $var = 'NULL';
            } else {
                if ($type === 'sqlite') {
                    $var = "'" . sqlite_escape_string($var) . "'";
                } else {
                    $var = "'" . addslashes($var) . "'";
                }
            }
            return;
        }
        foreach (array_keys($var) as $key) {
            Ethna_AppSQL::escapeSQL($var[$key], $type);
        }
    }

    /**
     *  escapeSQL�ǥ��������פ��줿ʸ�����unescape����
     *
     *  @access public
     *  @param  mixed   &$var   ���������פ�����������
     *  @static
     */
    function unescapeSQL(&$var, $type = null)
    {
        if (!is_array($var)) {
            if ($var == 'NULL') {
                return;
            }
            $var = substr($var, 1, strlen($var)-2);
            $var = stripslashes($var);
            return;
        }
        foreach (array_keys($var) as $key) {
            Ethna_AppSQL::unescapeSQL($var[$key], $type);
        }
    }

    /**
     *  WHERE���ʸ����������
     *
     *  @access public
     *  @param  string  $field      �����оݤΥե������
     *  @param  mixed   $value      ������
     *  @param  int     $condition  �������(OBJECT_CONDITION_NE,...)
     *  @return string  �������ʸ
     *  @static
     */
    function getCondition($field, $value, $condition = OBJECT_CONDITION_EQ)
    {
        switch ($condition) {
        case OBJECT_CONDITION_EQ:
            $op = "="; break;
        case OBJECT_CONDITION_NE:
            $op = "!="; break;
        case OBJECT_CONDITION_LIKE:
            $op = "LIKE"; break;
        case OBJECT_CONDITION_GT:
            $op = ">"; break;
        case OBJECT_CONDITION_LT:
            $op = "<"; break;
        case OBJECT_CONDITION_GE:
            $op = ">="; break;
        case OBJECT_CONDITION_LE:
            $op = "<="; break;
        }

        // default operand
        $operand = $value;

        if (is_array($value)) {
            if (count($value) > 0) {
                switch ($condition) {
                case OBJECT_CONDITION_EQ:
                    $op = "IN"; break;
                case OBJECT_CONDITION_NE:
                    $op = "NOT IN"; break;
                }
                $operand = sprintf("(%s)", implode(',', $value));
            } else {
                // always be false
                $op = "=";
                $operand = "NULL";
            }
        } else {
            if ($value == 'NULL') {
                switch ($condition) {
                case OBJECT_CONDITION_EQ:
                    $op = "IS"; break;
                case OBJECT_CONDITION_NE:
                    $op = "IS NOT"; break;
                }
            }
            if ($condition == OBJECT_CONDITION_LIKE) {
                Ethna_AppSQL::unescapeSQL($value);
                $value = '%' . str_replace('%', '\\%', $value) . '%';
                Ethna_AppSQL::escapeSQL($value);
                $operand = $value;
            }
        }
        return "$field $op $operand";
    }
}
// }}}
?>
