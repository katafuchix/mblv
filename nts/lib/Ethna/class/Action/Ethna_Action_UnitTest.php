<?php
/**
 *  Ethna_Action_UnitTest.php
 *
 *  @author     Takuya Ookubo <sfio@sakura.ai.to>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Action_UnitTest.php,v 1.1 2006/03/09 13:47:42 halt1983 Exp $
 */

/**
 *  __ethna_unittest__�ե�����μ���
 *
 *  @author     Takuya Ookubo <sfio@sakura.ai.to>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Form_UnitTest extends Ethna_ActionForm
{
    /**
     *  @access private
     *  @var    array   �ե����������
     */
    var $form = array(
    );
}

/**
 *  __ethna_unittest__���������μ���
 *
 *  @author     Takuya Ookubo <sfio@sakura.ai.to>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Action_UnitTest extends Ethna_ActionClass
{
    /**
     *  __ethna_unittest__����������������
     *
     *  @access public
     *  @return string      Forward��(���ｪλ�ʤ�null)
     */
    function prepare()
    {
        return null;
    }

    /**
     *  __ethna_unittest__���������μ���
     *
     *  @access public
     *  @return string  ����̾
     */
    function perform()
    {
        return '__ethna_unittest__';
    }
}
?>
