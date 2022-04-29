<?php
// vim: foldmethod=marker
/**
 *  Ethna_Filter.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Filter.php,v 1.6 2006/07/19 05:22:37 fujimoto Exp $
 */

// {{{ Ethna_Filter
/**
 *  �ե졼�����Υե��륿���쥯�饹
 *
 *  Mojavi�ο����Ǥ��ʤ��äѤ�ˡ����������¹����˳Ƽ������Ԥ����Ȥ�
 *  ����ޤ���
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 *  @obsolete
 */
class Ethna_Filter
{
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_Controller    controller���֥������� */
    var $controller;

    /** @var    object  Ethna_Controller    controller���֥�������($controller�ξ�ά��) */
    var $ctl;

    /** @var    object  Ethna_Config        ���ꥪ�֥������� */
    var $config;

    /** @var    object  Ethna_Logger        �����֥������� */
    var $logger;

    /**#@-*/


    /**
     *  Ethna_Filter�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Controller    &$controller    ����ȥ��饪�֥�������
     */
    function Ethna_Filter(&$controller)
    {
        // ���֥������Ȥ�����
        $this->controller =& $controller;
        $this->ctl =& $this->controller;

        $this->config =& $controller->getConfig();
        $this->logger =& $this->controller->getLogger();
    }

    /**
     *  �¹����ե��륿
     *
     *  @access public
     *  @return Ethna_Error:�¹���� any:���ｪλ
     */
    function preFilter()
    {
    }

    /**
     *  ���������¹����ե��륿
     *
     *  @access public
     *  @param  string  $action_name    �¹Ԥ���륢�������̾
     *  @return string  null:���ｪλ (string):�¹Ԥ��륢�������̾���ѹ�
     */
    function preActionFilter($action_name)
    {
        return null;
    }

    /**
     *  ���������¹Ը�ե��륿
     *
     *  @access public
     *  @param  string  $action_name    �¹Ԥ��줿���������̾
     *  @param  string  $forward_name   �¹Ԥ��줿��������󤫤�������
     *  @return string  null:���ｪλ (string):����̾���ѹ�
     */
    function postActionFilter($action_name, $forward_name)
    {
        return null;
    }

    /**
     *  �¹Ը�ե��륿
     *
     *  @access public
     *  @return Ethna_Error:�¹���� any:���ｪλ
     */
    function postFilter()
    {
    }
}
// }}}
?>
