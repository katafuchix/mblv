<?php
// vim: foldmethod=marker
/**
 *  Ethna_ActionClass.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_ActionClass.php,v 1.10 2006/07/27 01:56:31 ichii386 Exp $
 */

// {{{ Ethna_ActionClass
/**
 *  action�¹ԥ��饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_ActionClass
{
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_Backend       backend���֥������� */
    var $backend;

    /** @var    object  Ethna_Config        ���ꥪ�֥�������    */
    var $config;

    /** @var    object  Ethna_I18N          i18n���֥������� */
    var $i18n;

    /** @var    object  Ethna_ActionError   ��������󥨥顼���֥������� */
    var $action_error;

    /** @var    object  Ethna_ActionError   ��������󥨥顼���֥�������(��ά��) */
    var $ae;

    /** @var    object  Ethna_ActionForm    ���������ե����४�֥������� */
    var $action_form;

    /** @var    object  Ethna_ActionForm    ���������ե����४�֥�������(��ά��) */
    var $af;

    /** @var    object  Ethna_Session       ���å���󥪥֥������� */
    var $session;

    /** @var    object  Ethna_Plugin        �ץ饰���󥪥֥������� */
    var $plugin;

    /**#@-*/

    /**
     *  Ethna_ActionClass�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Backend   $backend    backend���֥�������
     */
    function Ethna_ActionClass(&$backend)
    {
        $c =& $backend->getController();
        $this->backend =& $backend;
        $this->config =& $this->backend->getConfig();
        $this->i18n =& $this->backend->getI18N();

        $this->action_error =& $this->backend->getActionError();
        $this->ae =& $this->action_error;

        $this->action_form =& $this->backend->getActionForm();
        $this->af =& $this->action_form;

        $this->session =& $this->backend->getSession();
        $this->plugin =& $this->backend->getPlugin();
    }

    /**
     *  ���������¹�����ǧ�ڽ�����Ԥ�
     *
     *  @access public
     *  @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
     */
    function authenticate()
    {
        return null;
    }

    /**
     *  ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
     *
     *  @access public
     *  @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
     */
    function prepare()
    {
        return null;
    }

    /**
     *  ���������¹�
     *
     *  @access public
     *  @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
     */
    function perform()
    {
        return null;
    }
}
// }}}
?>
