<?php
// vim: foldmethod=marker
/**
 *  {$project_id}_ActionClass.php
 *
 *  @author     {$author}
 *  @package    {$project_id}
 *  @version    $Id: app.actionclass.php,v 1.1 2006/08/22 15:52:26 fujimoto Exp $
 */

// {{{ {$project_id}_ActionClass
/**
 *  action�¹ԥ��饹
 *
 *  @author     {$author}
 *  @package    {$project_id}
 *  @access     public
 */
class {$project_id}_ActionClass extends Ethna_ActionClass
{
    /**
     *  ���������¹�����ǧ�ڽ�����Ԥ�
     *
     *  @access public
     *  @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
     */
    function authenticate()
    {
        return parent::authenticate();
    }

    /**
     *  ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
     *
     *  @access public
     *  @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
     */
    function prepare()
    {
        return parent::prepare();
    }

    /**
     *  ���������¹�
     *
     *  @access public
     *  @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
     */
    function perform()
    {
        return parent::perform();
    }
}
// }}}
?>
