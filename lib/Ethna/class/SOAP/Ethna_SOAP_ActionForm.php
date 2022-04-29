<?php
// vim: foldmethod=marker
/**
 *  Ethna_SOAP_ActionForm.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_SOAP_ActionForm.php,v 1.2 2006/07/19 05:22:39 fujimoto Exp $
 */

// {{{ Ethna_SOAP_ActionForm
/**
 *  SOAP�ե����९�饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_SOAP_ActionForm extends Ethna_ActionForm
{
    /**#@+
     *  @access private
     */

    /** @var    array   ������� */
    var $arg = array();

    /** @var    array   �������� */
    var $retval = array();

    /**#@-*/

    /**
     *  Ethna_SOAP_ActionForm���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_ActionError   $action_error   ��������󥨥顼���֥�������
     */
    function Ethna_SOAP_ActionForm(&$action_error)
    {
        $this->form =& $this->arg;

        parent::Ethna_ActionForm($action_error);
    }
}
// }}}
?>
