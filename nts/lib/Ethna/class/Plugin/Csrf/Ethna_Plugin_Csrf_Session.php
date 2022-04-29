<?php
// vim: foldmethod=marker
/**
 *  Ethna_Plugin_Csrf_Session.php
 *
 *  @author     Keita Arai <cocoiti@comio.info>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin_Csrf_Session.php,v 1.7 2006/11/09 12:58:16 cocoitiban Exp $
 */

// {{{ Ethna_Plugin_Csrf_Session
/**
 *  CSRF�к�
 *
 *  CSRF�к���ȡ�������Ѥ����к����뤿��Υ�����
 *
 *  @author     Keita Arai <cocoiti@comio.info>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Csrf_Session extends Ethna_Plugin_Csrf
{
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_Session    ���å���󥪥֥������� */
    var $session;
    
    /**#@-*/


    /**
     *  Ethna_Plugin_Csrf�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Controller    &$controller    ����ȥ��饪�֥�������
     */
    function Ethna_Plugin_Csrf_Session(&$controller)
    {
        parent::Ethna_Plugin_Csrf($controller);

        // ���֥������Ȥ�����
        $this->session =& $this->controller->getSession();
    }
    
    /**
     *  �ȡ������View�ȥ�����ե�����˥��åȤ���
     *
     *  @access public
     *  @return boolean  ���������Ԥ�
     */
    function set()
    {
        if (! $this->session->isStart()) {
            $this->session->start();
        }

        $token = $this->session->get($this->token_name);
        if ($token !== null) {
            return true;
        }

        $key = $this->_generateKey();
        $this->session->set($this->token_name, $key); 

        return true;       
    }

    /**
     *  �ȡ�����ID���������
     *
     *  @access public
     *  @return string �ȡ�����ID���֤���
     */
    function get()
    {
        if (! $this->session->isStart()) {
            $this->session->start();
        }
        
        return $this->session->get($this->token_name);
    }

    /**
     *  �ȡ�����ID��������
     *
     *  @access public
     */
    function remove()
    {
        if (! $this->session->isStart()) {
            $this->session->start();
        }
        $this->session->remove($this->token_name, $token);        
    }
}
// }}}
?>
