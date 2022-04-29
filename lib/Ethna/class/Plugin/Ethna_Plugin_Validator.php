<?php
// vim: foldmethod=marker
/**
 *  Ethna_Plugin_Validator.php
 *
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin_Validator.php,v 1.2 2006/07/19 05:22:38 fujimoto Exp $
 */

// UPLOAD_ERR_* ��̤����ξ�� (PHP 4.3.0 ����)
if (defined('UPLOAD_ERR_OK') == false) {
    define('UPLOAD_ERR_OK', 0);
}

// {{{ Ethna_Plugin_Validator
/**
 *  �Х�ǡ����ץ饰����δ��쥯�饹
 *  
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Validator
{
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_Backend   backend���֥������� */
    var $backend;

    /** @var    object  Ethna_Logger    �����֥������� */
    var $logger;

    /** @var    object  Ethna_ActionForm    �ե����४�֥������� */
    var $action_form;

    /** @var    object  Ethna_ActionForm    �ե����४�֥������� */
    var $af;

    /** @var    bool    �����������Х�ǡ������ɤ����Υե饰 */
    var $accept_array = false;

    /**#@-*/

    /**
     *  ���󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Controller    $controller ����ȥ��饪�֥�������
     */
    function Ethna_Plugin_Validator(&$controller)
    {
        $this->backend =& $controller->getBackend();
        $this->logger =& $controller->getLogger();
        $this->action_form =& $controller->getActionForm();
        $this->af =& $this->action_form;
    }

    /**
     *  �ե������͸��ڤΤ����ActionForm����ƤӽФ����᥽�å�
     *
     *  @access public
     *  @param  string  $name       �ե������̾��
     *  @param  mixed   $var        �ե��������
     *  @param  array   $params     �ץ饰����Υѥ�᡼��
     */
    function &validate($name, $var, $params)
    {
        die('override!');
    }

    /**
     *  �ե�����������������
     *
     *  @access public
     *  @param  string  $name       �ե������̾��
     */
    function getFormDef($name)
    {
        return $this->af->getDef($name);
    }

    /**
     *  �ե������type���������(����ξ����ͤΤ�)
     *
     *  @access public
     *  @param  string  $name       �ե������̾��
     */
    function getFormType($name)
    {
        $def = $this->af->getDef($name);
        if (isset($def['type'])) {
            if (is_array($def['type'])) {
                return $def['type'][0];
            } else {
                return $def['type'];
            }
        } else {
            return null;
        }
    }

    /**
     *  �ե������ͤ������ɤ�����Ƚ�� (����ե�����ξ��ϳ����Ǥ��Ф��ƸƤӽФ�)
     *
     *  @access protected
     *  @param  mixed   $var       �ե�������� (����ե�����ξ��ϳ�����)
     *  @param  int     $type      �ե������type
     */
    function isEmpty($var, $type)
    {
        if ($type == VAR_TYPE_FILE) {
            if (isset($var['error']) == false || $var['error'] != UPLOAD_ERR_OK) {
                return true;
            }
            if (isset($var['tmp_name']) == false || is_uploaded_file($var['tmp_name']) == false) {
                return true;
            }
            if (isset($var['size']) == false || $var['size'] == 0) {
                return true;
            }
        } else {
            if (is_scalar($var) == false || strlen($var) == 0) {
                return true;
            }
        }
        return false;
    }

    /**
     *  true �򻲾Ȥ��֤�
     *
     *  @access protected
     */
    function &ok()
    {
        $true = true;
        return $true;
    }

    /**
     *  ���顼���֤�
     *
     *  @access protected
     *  @param  string  $msg        ���顼��å�����
     *  @param  int     $code       ���顼������
     *  @param  mixed   $info       ���顼��å�������sprintf���Ϥ��ѥ�᡼��
     */
    function &error($msg, $code, $info = null)
    {
        if ($info != null) {
            if (is_array($info)) {
                return Ethna::raiseNotice($msg, $code, $info);
            } else {
                return Ethna::raiseNotice($msg, $code, array($info));
            }
        } else {
            return Ethna::raiseNotice($msg, $code);
        }
    }
}
// }}}
?>
