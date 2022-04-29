<?php
// vim: foldmethod=marker
/**
 *  Ethna_ActionError.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_ActionError.php,v 1.14 2006/11/17 08:41:53 ichii386 Exp $
 */

// {{{ Ethna_ActionError
/**
 *  ���ץꥱ������󥨥顼�������饹
 *
 *  @access     public
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @package    Ethna
 *  @todo   ����ե�����򰷤���褦�ˤ���
 */
class Ethna_ActionError
{
    /**#@+
     *  @access private
     */

    /** @var    array   ���顼���֥������Ȥΰ��� */
    var $error_list = array();

    /** @var    object  Ethna_ActionForm    ���������ե����४�֥������� */
    var $action_form = null;

    /** @var    object  Ethna_Logger        �����֥������� */
    var $logger = null;
    /**#@-*/

    /**
     *  Ethna_ActionError���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     */
    function Ethna_ActionError()
    {
    }

    /**
     *  ���顼���֥������Ȥ�����/�ɲä���
     *
     *  @access public
     *  @param  string  $name       ���顼��ȯ�������ե��������̾(���פʤ�null)
     *  @param  string  $message    ���顼��å�����
     *  @param  int     $code       ���顼������
     *  @return Ethna_Error ���顼���֥�������
     */
    function &add($name, $message, $code = null)
    {
        if (func_num_args() > 3) {
            $userinfo = array_slice(func_get_args(), 3);
            $error =& Ethna::raiseNotice($message, $code, $userinfo);
        } else {
            $error =& Ethna::raiseNotice($message, $code);
        }
        $this->addObject($name, $error);
        return $error;
    }

    /**
     *  Ethna_Error���֥������Ȥ��ɲä���
     *
     *  @access public
     *  @param  string              $name   ���顼���б�����ե��������̾(���פʤ�null)
     *  @param  object  Ethna_Error $error  ���顼���֥�������
     */
    function addObject($name, &$error)
    {
        $elt = array();
        $elt['name'] = $name;
        $elt['object'] =& $error;
        $this->error_list[] = $elt;

        // ������(��­)
        $af =& $this->_getActionForm();
        $logger =& $this->_getLogger();
        $logger->log(LOG_NOTICE, '{form} -> [%s]', $this->action_form->getName($name));
    }

    /**
     *  ���顼���֥������Ȥο����֤�
     *
     *  @access public
     *  @return int     ���顼���֥������Ȥο�
     */
    function count()
    {
        return count($this->error_list);
    }

    /**
     *  ���顼���֥������Ȥο����֤�(count()�᥽�åɤΥ����ꥢ��)
     *
     *  @access public
     *  @return int     ���顼���֥������Ȥο�
     */
    function length()
    {
        return count($this->error_list);
    }

    /**
     *  ��Ͽ���줿���顼���֥������Ȥ����ƺ������
     *
     *  @access public
     */
    function clear()
    {
        $this->error_list = array();
    }

    /**
     *  ���ꤵ�줿�ե�������ܤ˥��顼��ȯ�����Ƥ��뤫�ɤ������֤�
     *
     *  @access public
     *  @param  string  $name   �ե��������̾
     *  @return bool    true:���顼��ȯ�����Ƥ��� false:���顼��ȯ�����Ƥ��ʤ�
     */
    function isError($name)
    {
        foreach ($this->error_list as $error) {
            if (strcasecmp($error['name'], $name) == 0) {
                return true;
            }
        }
        return false;
    }

    /**
     *  ���ꤵ�줿�ե�������ܤ��б����륨�顼��å��������֤�
     *
     *  @access public
     *  @param  string  $name   �ե��������̾
     *  @return string  ���顼��å�����(���顼��̵������null)
     */
    function getMessage($name)
    {
        foreach ($this->error_list as $error) {
            if (strcasecmp($error['name'], $name) == 0) {
                return $this->_getMessage($error);
            }
        }
        return null;
    }

    /**
     *  ���顼���֥������Ȥ�����ˤ����֤�
     *
     *  @access public
     *  @return array   ���顼���֥������Ȥ�����
     */
    function getErrorList()
    {
        return $this->error_list;
    }

    /**
     *  ���顼��å�����������ˤ����֤�
     *
     *  @access public
     *  @return array   ���顼��å�����������
     */
    function getMessageList()
    {
        $message_list = array();

        foreach ($this->error_list as $error) {
            $message_list[] = $this->_getMessage($error);
        }
        return $message_list;
    }

    /**
     *  ���ץꥱ������󥨥顼��å��������������
     *
     *  @access private
     *  @param  array   ���顼����ȥ�
     *  @return string  ���顼��å�����
     */
    function _getMessage(&$error)
    {
        $af =& $this->_getActionForm();
        $form_name = $af->getName($error['name']);
        return str_replace("{form}", $form_name, $error['object']->getMessage());
    }

    /**
     *  Ethna_ActionForm���֥������Ȥ��������
     *
     *  @access private
     *  @return object  Ethna_ActionForm
     */
    function &_getActionForm()
    {
        if (is_null($this->action_form)) {
            $controller =& Ethna_Controller::getInstance();
            $this->action_form =& $controller->getActionForm();
        }
        return $this->action_form;
    }

    /**
     *  Ethna_Logger���֥������Ȥ��������
     *
     *  @access private
     *  @return object  Ethna_Logger
     */
    function &_getLogger()
    {
        if (is_null($this->logger)) {
            $controller =& Ethna_Controller::getInstance();
            $this->logger =& $controller->getLogger();
        }
        return $this->logger;
    }
}
// }}}
?>
