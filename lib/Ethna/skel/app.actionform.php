<?php
// vim: foldmethod=marker
/**
 *  {$project_id}_ActionForm.php
 *
 *  @author     {$author}
 *  @package    {$project_id}
 *  @version    $Id: app.actionform.php,v 1.1 2006/08/22 15:52:26 fujimoto Exp $
 */

// {{{ {$project_id}_ActionForm
/**
 *  ���������ե����९�饹
 *
 *  @author     {$author}
 *  @package    {$project_id}
 *  @access     public
 */
class {$project_id}_ActionForm extends Ethna_ActionForm
{
    /**#@+
     *  @access private
     */

    /** @var    array   �ե����������(�ǥե����) */
    var $form_template = array();

    /** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
    var $use_validator_plugin = true;

    /**#@-*/

    /**
     *  �ե������͸��ڤΥ��顼������Ԥ�
     *
     *  @access public
     *  @param  string      $name   �ե��������̾
     *  @param  int         $code   ���顼������
     */
    function handleError($name, $code)
    {
        return parent::handleError($name, $code);
    }

    /**
     *  �ե�����������ƥ�ץ졼�Ȥ����ꤹ��
     *
     *  @access protected
     *  @param  array   $form_template  �ե������ͥƥ�ץ졼��
     *  @return array   �ե������ͥƥ�ץ졼��
     */
    function _setFormTemplate($form_template)
    {
        return parent::_setFormTemplate($form_template);
    }

    /**
     *  �ե���������������ꤹ��
     *
     *  @access protected
     */
    function _setFormDef()
    {
        return parent::_setFormDef();
    }

}
// }}}
?>
