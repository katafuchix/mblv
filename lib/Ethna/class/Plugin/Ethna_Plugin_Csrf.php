<?php
// vim: foldmethod=marker
/**
 *  Ethna_Plugin_Csrf.php
 *
 *  @author     Keita Arai <cocoiti@comio.info>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin_Csrf.php,v 1.5 2006/11/06 15:26:26 cocoitiban Exp $
 */

// {{{ Ethna_Plugin_Csrf
/**
 *  CSRF�к����쥯�饹
 *
 *  CSRF�к���ȡ�������Ѥ����к����뤿��Υ�����
 *
 *  @author     Keita Arai <cocoiti@comio.info>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Csrf
{
    /**#@+
     *  @access private
     */

    var $controller;

    /** @var    object  Ethna_Controller    controller���֥�������($controller�ξ�ά��) */
    var $ctl;

    /** @var    object  Ethna_Config        ���ꥪ�֥������� */
    var $config;

    /** @var    object  Ethna_Logger        �����֥������� */
    var $logger;
    
    /** @var    string  ��ͭ�ȡ�����̾ */
    var $token_name = 'ethna_csrf';
    
    /**#@-*/


    /**
     *  Ethna_Plugin_Csrf�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Controller    &$controller    ����ȥ��饪�֥�������
     */
    function Ethna_Plugin_Csrf(&$controller)
    {
        // ���֥������Ȥ�����
        $this->controller =& $controller;
        $this->ctl =& $this->controller;

        $this->config =& $controller->getConfig();
        $this->logger =& $this->controller->getLogger();
    }
    
    /**
     *  �ȡ������View�ȥ�����ե�����˥��åȤ���
     *
     *  @access public
     *  @return string  �ȡ������Key
     */
    function set()
    {

    }

    /**
     *  �ȡ�����ID���������
     *
     *  @access public
     *  @return string �ȡ�����ID���֤���
     */
    function get()
    {

    }

    /**
     *  �ȡ�����ID��������
     *
     *  @access public
     *  @return string �ȡ�����ID���֤���
     */
    function remove()
    {

    }

    /**
     *  �ȡ�����̾���������
     *
     *  @access public
     *  @return string �ȡ�����̾���֤���
     */
    function getName()
    {
        return $this->token_name;
    }

    /**
     *  �ȡ�����ID�򸡾ڤ���
     *
     *  @access public
     *  @return mixed  ����ξ���true, �����ξ���false
     */
    function isValid()
    {
        $token = $this->_get_token();

        $local_token = $this->get();

        if (is_null($local_token)) {
            return false;
        }

        if ($token === $local_token) {
            return true;
        }

        return false;
    }

    /**
     *  ��������������
     *
     *  @access public
     *  @return string  keyname
     */
    function _generateKey()
    {
        return Ethna_Util::getRandom(32);
    }

    /**
     *  �ꥯ�����Ȥ���ȡ�����ID�ȥꥯ������ID��ȴ���Ф�
     *
     *  @access public
     *  @return mixed  ����ξ��ϥȡ�����̾, �����ξ���false
     */
    function _get_token()
    {
        $token_name = $this->getName();
        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'post') === 0) {
            return isset($_POST[$token_name]) ? $_POST[$token_name] : null;
        } else {
            return isset($_GET[$token_name]) ? $_GET[$token_name] : null;
        }
    }
}
// }}}
?>
