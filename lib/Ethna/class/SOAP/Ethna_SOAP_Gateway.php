<?php
// vim: foldmethod=marker
/**
 *  Ethna_SOAP_Gateway.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_SOAP_Gateway.php,v 1.4 2006/07/19 05:22:39 fujimoto Exp $
 */

// {{{ Ethna_SOAP_Gateway
/**
 *  SOAP�����ȥ������δ��쥯�饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_SOAP_Gateway
{
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_Controller    controller���֥������� */
    var $controller;

    /**#@-*/

    /**
     *  Ethna_SOAP_Gateway���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     */
    function Ethna_SOAP_Gateway()
    {
        $this->controller =& Ethna_Controller::getInstance();
    }

    /**
     *  SOAP����������¹Ԥ���
     *
     *  @access public
     */
    function dispatch()
    {
        $this->controller->trigger();
    }

    /**
     *  ���ץꥱ������������Ͱ������������
     *
     *  @access public
     *  @return array   ���ץꥱ������������Ͱ���
     */
    function &getApp()
    {
        $action_form =& $this->controller->getActionForm();
        return $action_form->app_vars;
    }

    /**
     *  ���顼�����ɤ��������
     *
     *  @access public
     *  @return int     ���顼������(null�ʤ饨�顼̵��)
     */
    function getErrorCode()
    {
        $action_error =& $this->controller->getActionError();
        if ($action_error->count() == 0) {
            return null;
        }
        
        // �ǽ��1�Ĥ��֤�
        $error_list = $action_error->getErrorList();
        $error =& $error_list[0];

        return $error->getCode();
    }

    /**
     *  ���顼��å��������������
     *
     *  @access public
     *  @return string  ���顼��å�����(null�ʤ饨�顼̵��)
     */
    function getErrorMessage()
    {
        $action_error =& $this->controller->getActionError();
        if ($action_error->count() == 0) {
            return null;
        }

        // �ǽ��1�Ĥ��֤�
        $message_list = $action_error->getMessageList();
        $message = $message_list[0];

        return $message;
    }
}
// }}}
?>
