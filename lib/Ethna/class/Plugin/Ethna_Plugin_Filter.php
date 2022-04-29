<?php
// vim: foldmethod=marker
/**
 *  Ethna_Plugin_Filter.php
 *
 *  @author     Kazuhiro Hosoi <hosoi@gree.co.jp>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin_Filter.php,v 1.1 2006/07/10 13:47:31 fujimoto Exp $
 */

// {{{ Ethna_Plugin_Filter
/**
 *  �ץ饰����ե��륿���쥯�饹
 *
 *  Plugin�����ˤ�ꡤEthna_Filter�θ�ѤȤ��ơ�
 *  Ethna_Plugin_Filter���ɲä��ޤ���������Ū��Ethna_Filter��Ʊ���Ǥ���
 *  
 *  Mojavi�ο����Ǥ��ʤ��äѤ�ˡ����������¹����˳Ƽ������Ԥ����Ȥ�
 *  ����ޤ���
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Filter
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
     *  Ethna_Plugin_Filter�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Controller    &$controller    ����ȥ��饪�֥�������
     */
    function Ethna_Plugin_Filter(&$controller)
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
