<?php
// vim: foldmethod=marker
/**
 *  Ethna_SOAP_Util.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_SOAP_Util.php,v 1.2 2006/07/19 05:22:39 fujimoto Exp $
 */

// {{{ Ethna_SOAP_Util
/**
 *  SOAP�桼�ƥ���ƥ����饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_SOAP_Util
{
    /**
     *  ����������֥������ȷ������󤫤ɤ������֤�
     *
     *  @access public
     *  @param  array   $def    �����
     *  @return bool    true:���֥������ȷ����� false:����ʳ��η�
     *  @static
     */
    function isArrayOfObject($def)
    {
        if (is_array($def) == false) {
            return false;
        }
        $keys = array_keys($def);
        if (count($keys) == 1 && is_array($def[$keys[0]])) {
            return true;
        }
        return false;
    }

    /**
     *  ������������顼�ͤ����󤫤ɤ������֤�
     *
     *  @access public
     *  @param  array   $def    �����
     *  @return bool    true:�����顼������ false:����ʳ��η�
     *  @static
     */
    function isArrayOfScalar($def)
    {
        if (is_array($def) == false) {
            return false;
        }
        $keys = array_keys($def);
        if (count($keys) == 1 && is_array($def[$keys[0]]) == false) {
            return true;
        }
    }

    /**
     *  �����顼�ͤη�̾���֤�
     *
     *  @access public
     *  @param  array   $def    �����
     *  @return string  ��̾
     *  @static
     */
    function getScalarTypeName($def)
    {
        $name = null;
        switch ($def) {
        case VAR_TYPE_STRING:
            $name = "string";
            break;
        case VAR_TYPE_INT:
            $name = "int";
            break;
        case VAR_TYPE_FLOAT:
            $name = "float";
            break;
        case VAR_TYPE_DATETIME:
            $name = "datetime";
            break;
        case VAR_TYPE_BOOLEAN:
            $name = "boolean";
            break;
        }
        return $name;
    }

    /**
     *  ����η�̾���֤�
     *
     *  @access public
     *  @param  array   $def    �����
     *  @return string  ��̾
     *  @static
     */
    function getArrayTypeName($def)
    {
        $name = null;
        switch ($def) {
        case VAR_TYPE_STRING:
            $name = "ArrayOfString";
            break;
        case VAR_TYPE_INT:
            $name = "ArrayOfInt";
            break;
        case VAR_TYPE_FLOAT:
            $name = "ArrayOfFloat";
            break;
        case VAR_TYPE_DATETIME:
            $name = "ArrayOfDatetime";
            break;
        case VAR_TYPE_BOOLEAN:
            $name = "ArrayOfBoolean";
            break;
        }
        return $name;
    }

    /**
     *  ����ͷ����������������
     *
     *  @access public
     *  @param  array   $retval ����ͷ����
     *  @static
     */
    function fixRetval(&$retval)
    {
        $retval['errorcode'] = VAR_TYPE_INT;
        $retval['errormessage'] = VAR_TYPE_STRING;
    }
}
// }}}
?>
