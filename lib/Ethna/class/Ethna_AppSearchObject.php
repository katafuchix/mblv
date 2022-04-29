<?php
// vim: foldmethod=marker
/**
 *  Ethna_AppSearchObject.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_AppSearchObject.php,v 1.6 2006/07/19 05:22:37 fujimoto Exp $
 */

/** ���ץꥱ������󥪥֥������ȸ������: != */
define('OBJECT_CONDITION_NE', 0);

/** ���ץꥱ������󥪥֥������ȸ������: == */
define('OBJECT_CONDITION_EQ', 1);

/** ���ץꥱ������󥪥֥������ȸ������: LIKE */
define('OBJECT_CONDITION_LIKE', 2);

/** ���ץꥱ������󥪥֥������ȸ������: > */
define('OBJECT_CONDITION_GT', 3);

/** ���ץꥱ������󥪥֥������ȸ������: < */
define('OBJECT_CONDITION_LT', 4);

/** ���ץꥱ������󥪥֥������ȸ������: >= */
define('OBJECT_CONDITION_GE', 5);

/** ���ץꥱ������󥪥֥������ȸ������: <= */
define('OBJECT_CONDITION_LE', 6);

/** ���ץꥱ������󥪥֥������ȸ������: AND */
define('OBJECT_CONDITION_AND', 7);

/** ���ץꥱ������󥪥֥������ȸ������: OR */
define('OBJECT_CONDITION_OR', 8);



// {{{ Ethna_AppSearchObject
/**
 *  ���ץꥱ������󥪥֥������ȸ�����說�饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_AppSearchObject
{
    /**#@+
     *  @access private
     */

    /** @var    string  ������ */
    var $value;

    /** @var    int     ������� */
    var $condition;

    /**
     *  @var    array   �ɲø��������ݻ�����Ethna_AppSearchObject�ΰ���
     */
    var $object_list = array();

    /**#@-*/


    /**
     *  Ethna_AppSearchObject�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  string  $value      ������
     *  @param  int     $condition  �������(OBJECT_CONDITION_NE,...)
     */
    function Ethna_AppSearchObject($value, $condition)
    {
        $this->value = $value;
        $this->condition = $condition;
    }

    /**
     *  ��������OR/AND���ɲä���
     *
     *  @access public
     *  @param  string                          $name           �����оݥ����̾
     *  @param  object  Ethna_AppSearchObject   $search_object  �ɲä��븡�����
     *  @param  int                             $condition      �ɲþ��(OR/AND)
     */
    function addObject($name, $search_object, $condition)
    {
        $tmp = array();
        $tmp['name'] = $name;
        $tmp['object'] =& $search_object;
        $tmp['condition'] = $condition;
        $this->object_list[] = $tmp;
    }

    /**
     *  ���ꤵ�줿�ե�����ɤ������оݤȤʤäƤ��뤫�ɤ������֤�
     *
     *  @access public
     */
    function isTarget($field)
    {
        foreach ($this->object_list as $object) {
            if ($object['name'] == $field) {
                return true;
            }
            if (is_object($object['object'])) {
                $r = $object['object']->isTarget($field);
                if ($r) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     *  �������SQLʸ���֤�
     *
     *  @access public
     *  @param  string  �����оݥ����̾
     *  @return SQLʸ
     */
    function toString($column)
    {
        $condition = "(";
        $tmp_value = $this->value;
        Ethna_AppSQL::escapeSQL($tmp_value);
        $condition .= Ethna_AppSQL::getCondition("$column", $tmp_value, $this->condition);

        foreach ($this->object_list as $elt) {
            if ($elt['condition'] == OBJECT_CONDITION_OR) {
                $condition .= " OR ";
            } else {
                $condition .= " AND ";
            }
            $condition .= $elt['object']->toString($elt['name']);
        }

        return $condition . ")";
    }
}
// }}}
?>
