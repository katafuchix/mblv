<?php
/**
 *  Ethna_UnitTestBase.php
 *
 *  @package    Ethna
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 */

/**
 *  Ethna�Υƥ��ȥ������δ��쥯�饹
 */
class Ethna_UnitTestBase extends UnitTestCase
{
    /** @var    object  Ethna_Backend       backend���֥������� */
    var $backend;

    /** @var    object  Ethna_Controller    ����ȥ��饪�֥������� */
    var $controller;

    /** @var    object  Ethna_Controller    ����ȥ��饪�֥�������($controller�ξ�ά��) */
    var $ctl;

    function Ethna_UnitTestBase($label = false)
    {
        parent::UnitTestCase($label);

        // controller
        $this->ctl =& Ethna_Controller::getInstance();
        if ($this->ctl === null) {
            $this->ctl =&  new Ethna_Controller();
        }
        $this->controller =& $this->ctl;

        // backend
        $this->backend =& $this->ctl->getBackend();

        // actionform
        if ($this->ctl->action_form === null) {
            $this->ctl->action_form =& new Ethna_ActionForm($this->ctl);
            $this->backend->setActionForm($this->ctl->action_form);
        }

        // viewclass
        if ($this->ctl->view === null) {
            $this->ctl->view =& new Ethna_ViewClass($this->backend, '', '');
        }
    }
}
?>
