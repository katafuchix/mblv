<?php
/**
 *  Ethna_UnitTestCase.php
 *
 *  @author     Takuya Ookubo <sfio@sakura.ai.to>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_UnitTestCase.php,v 1.2 2006/03/30 07:21:43 halt1983 Exp $
 */

/**
 *  UnitTestCase�¹ԥ��饹
 *
 *  @author     Takuya Ookubo <sfio@sakura.ai.to>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_UnitTestCase extends UnitTestCase
{
    /** @var    object  Ethna_Backend       backend���֥������� */
    var $backend;

    /** @var    object  Ethna_Controller    controller���֥������� */
    var $controller;

    /** @var    object  Ethna_Controller    controller���֥�������($controller�ξ�ά��) */
    var $ctl;

    /** @var    object  Ethna_Session       ���å���󥪥֥������� */
    var $session;

    /** @var    string                      ���������̾ */
    var $action_name;

    /** @var    object  Ethna_ActionForm    ���������ե����४�֥������� */
    var $action_form;

    /** @var    object  Ethna_ActionForm    ���������ե����४�֥�������($action_form�ξ�ά��) */
    var $af;

    /** @var    object  Ethna_ActionClass   ��������󥯥饹���֥������� */
    var $action_class;

    /** @var    object  Ethna_ActionClass   ��������󥯥饹���֥�������($action_class�ξ�ά��) */
    var $ac;

    /** @var    string                      �ӥ塼̾ */
    var $forward_name;

    /** @var    object  Ethna_ViewClass     view���饹���֥������� */
    var $view_class;

    /** @var    object  Ethna_ViewClass     view���饹���֥�������($view_class�ξ�ά��) */
    var $vc;

    /**
     *  Ethna_UnitTestCase�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Controller    &$controller    ����ȥ��饪�֥�������
     */
    function Ethna_UnitTestCase(&$controller)
    {
        parent::UnitTestCase();

        // ���֥������Ȥ�����
        $this->controller =& $controller;
        $this->ctl =& $this->controller;
        $this->backend =& $this->ctl->getBackend();
        $this->session =& $this->backend->getSession();

        // �ѿ��ν����
        $this->action_form = $this->af = null;
        $this->action_class = $this->ac = null;
        $this->view_class = $this->vc = null;
    }

    /**
     *  ���������ե�����κ����ȴ�Ϣ�դ�
     *
     *  @access public
     */
    function _createActionForm($form_name)
    {
        $this->action_form =& new $form_name($this->ctl);
        $this->af =& $this->action_form;

        // controler&backend��af���Ϣ�դ�
        $this->ctl->action_name = $this->action_name;
        $this->ctl->action_form =& $this->af;
        $this->backend->action_form =& $this->af;
        $this->backend->af =& $this->af;
    }

    /**
     *  ���������ե�����κ���
     *
     *  @access public
     */
    function createActionForm()
    {
        $form_name = $this->ctl->getActionFormName($this->action_name);
        $this->_createActionForm($form_name);
    }

    /**
     *  validateOneTime()
     *
     *  @access public
     *  @return int $result
     */
    function validateOneTime()
    {
        if ($this->af == null) {
            $this->createActionForm();
        }

        $result = $this->af->validate();
        $this->af->ae->clear();

        return $result;
    }

    /**
     *  ñ��ʥ��������ե�����κ���
     *
     *  @access public
     */
    function createPlainActionForm()
    {
        $form_name = 'Ethna_ActionForm';
        $this->_createActionForm($form_name);
    }

    /**
     *  ���������κ���
     *
     *  @access public
     */
    function createActionClass()
    {
        if ($this->af == null) {
            $this->createActionForm();
        }

        // ���֥�����������
        $action_class_name = $this->ctl->getActionClassName($this->action_name);
        $this->action_class =& new $action_class_name($this->backend);
        $this->ac =& $this->action_class;

        // backend��ac���Ϣ�դ�
        $this->backend->action_class =& $this->ac;
        $this->backend->ac =& $this->ac;
    }

    /**
     *  �ӥ塼�κ���
     *
     *  @access public
     */
    function createViewClass()
    {
        if ($this->af == null) {
            $this->createPlainActionForm();
        }

        // ���֥�����������
        $view_class_name = $this->ctl->getViewClassName($this->forward_name);
        $this->view_class =& new $view_class_name($this->backend, $this->forward_name, $this->ctl->_getForwardPath($this->forward_name));
        $this->vc =& $this->view_class;
    }
}
?>
