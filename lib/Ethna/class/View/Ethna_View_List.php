<?php
// vim: foldmethod=marker
/**
 *  Ethna_View_List.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_View_List.php,v 1.6 2006/07/19 05:22:39 fujimoto Exp $
 */

// {{{ Ethna_View_List
/**
 *  �ꥹ�ȥӥ塼���쥯�饹�μ���
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_View_List extends Ethna_ViewClass
{
    /**#@+
     *  @access private
     */

    /** @var    int     ɽ�����ϥ��ե��å� */
    var $offset = 0;

    /** @var    int     ɽ����� */
    var $count = 25;

    /** @var    array   �����оݹ��ܰ��� */
    var $search_list = array();

    /** @var    string  �����ޥ͡����㥯�饹̾ */
    var $manager_name = null;

    /** @var    string  ɽ���оݥ��饹̾ */
    var $class_name = null;

    /**#@-*/

    /**
     *  ����������
     *
     *  @access public
     */
    function preforward()
    {
        // ɽ�����ե��å�/�������
        $this->offset = $this->af->get('offset');
        if ($this->offset == "") {
            $this->offset = 0;
        }
        if (intval($this->af->get('count')) > 0) {
            $this->count = intval($this->af->get('count'));
        }

        // �������
        $filter = array();
        $sort = array();
        foreach ($this->search_list as $key) {
            if ($this->af->get("s_$key") != "") {
                $filter[$key] = $this->af->get("s_$key");
            }
            if ($this->af->get("sort") == $key) {
                $order = $this->af->get("order") == "desc" ? OBJECT_SORT_DESC : OBJECT_SORT_ASC;
                $sort = array(
                    $key => $order,
                );
            }
        }

        // ɽ�����ܰ���
        $manager_name = $this->manager_name;
        for ($i = 0; $i < 2; $i++) {
            list($total, $obj_list) = $this->$manager_name->getObjectList($this->class_name, $filter, $sort, $this->offset, $this->count);
            if (count($obj_list) == 0 && $this->offset >= $total) {
                $this->offset = 0;
                continue;
            }
            break;
        }

        $r = array();
        foreach ($obj_list as $obj) {
            $value = $obj->getNameObject();
            $value = $this->_fixNameObject($value, $obj);
            $r[] = $value;
        }
        $list_name = sprintf("%s_list", strtolower(preg_replace('/(.)([A-Z])/', '\\1_\\2', $this->class_name)));
        $this->af->setApp($list_name, $r);

        // �ʥӥ��������
        $this->af->setApp('nav', $this->_getNavigation($total, $obj_list));
        $this->af->setAppNE('query', $this->_getQueryParameter());

        // �������ץ����
        $this->_setQueryOption();
    }

    /**
     *  ɽ�����ܤ�������
     *
     *  @access protected
     */
    function _fixNameObject($value, $obj)
    {
        return $value;
    }
    
    /**
     *  �ʥӥ�������������������
     *
     *  @access private
     *  @param  int     $total      ��������
     *  @param  array   $list       �������
     *  @return array   �ʥӥ�������������Ǽ��������
     */
    function _getNavigation($total, &$list)
    {
        $nav = array();
        $nav['offset'] = $this->offset;
        $nav['from'] = $this->offset + 1;
        if ($total == 0) {
            $nav['from'] = 0;
        }
        $nav['to'] = $this->offset + count($list);
        $nav['total'] = $total;
        if ($this->offset > 0) {
            $prev_offset = $this->offset - $this->count;
            if ($prev_offset < 0) {
                $prev_offset = 0;
            }
            $nav['prev_offset'] = $prev_offset;
        }
        if ($this->offset + $this->count < $total) {
            $next_offset = $this->offset + count($list);
            $nav['next_offset'] = $next_offset;
        }
        $nav['direct_link_list'] = Ethna_Util::getDirectLinkList($total, $this->offset, $this->count);

        return $nav;
    }

    /**
     *  �������ܤ���������
     *
     *  @access protected
     */
    function _setQueryOption()
    {
    }

    /**
     *  �������Ƥ��Ǽ����GET��������������
     *
     *  @access private
     *  @param  array   $search_list    �����оݰ���
     *  @return string  �������Ƥ��Ǽ����GET����
     */
    function _getQueryParameter()
    {
        $query = "";

        foreach ($this->search_list as $key) {
            $value = $this->af->get("s_$key");
            if (is_array($value)) {
                foreach ($value as $v) {
                    $query .= "&s_$key" . "[]=" . urlencode($v);
                }
            } else {
                $query .= "&s_$key=" . urlencode($value);
            }
        }

        return $query;
    }
}
// }}}
?>
