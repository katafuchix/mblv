<?php
/**
 *  Ethna_UnitTestReporter.php
 *
 *  @author     Takuya Ookubo <sfio@sakura.ai.to>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_UnitTestReporter.php,v 1.2 2006/03/21 12:29:43 halt1983 Exp $
 */

require_once 'simpletest/scorer.php';

/**
 *  Ethna�ޥ͡����㥯�饹
 *
 *  @author     Takuya Ookubo <sfio@sakura.ai.to>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_UnitTestReporter extends SimpleReporter {
    
    var $_character_set;

    var $report;
    var $result;

    /**
     *  Ethna_UnitTestReporter�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  string  $character_set  ����饯�����å�
     */
    function Ethna_UnitTestReporter($character_set = 'EUC-JP')
    {
        $this->SimpleReporter();
        $this->_character_set = $character_set;
        $this->report= array();
        $this->result= array();
    }

    /**
     *  ���
     *
     *  @access public
     *  @param string   $test_name  �ƥ���̾��
     */
    function paintFooter($test_name)
    {
        $colour = ($this->getFailCount() + $this->getExceptionCount() > 0 ? "red" : "green");
        $this->result = array(
            'TestCaseProgress' => $this->getTestCaseProgress(),
            'TestCaseCount' => $this->getTestCaseCount(),
            'PassCount' => $this->getPassCount(),
            'FailCount' => $this->getFailCount(),
            'ExceptionCount' => $this->getExceptionCount(),
        );
    }

    /**
     *  �ѥ�
     *
     *  @access public
     *��@param string   $message    ��å�����
     */
    function paintPass($message)
    {
        parent::paintPass($message);
            
        $test_list = $this->getTestList();
        $this->report[] = array(
            'type' => 'Pass',
            'test' => $test_list[2],
            'message' => $message,
        );
    }

    /**
     *  ����
     *
     *  @access public
     *��@param string   $message    ��å�����
     */
    function paintFail($message)
    {
        parent::paintFail($message);

        $test_list = $this->getTestList();
        $this->report[] = array(
            'type' => 'Fail',
            'test' => $test_list[2],
            'message' => $message,
        );
    }

    /**
     *  �㳰
     *
     *  @access public
     *��@param string   $message    ��å�����
     */
    function paintException($message)
    {
        parent::paintException($message);

        $breadcrumb = $this->getTestList();
        $test = $breadcrumb[2];
        array_shift($breadcrumb);
        $this->report[] = array(
            'type' => 'Exception',
            'test' => $test,
            'breadcrumb' => $breadcrumb,
            'message' => $message,
        );
    }

    /**
     *  �ƥ��ȥ���������
     *
     *  @access public
     *  @param string   $test_name  �ƥ���̾��
     */
    function paintCaseStart($test_name)
    {
        parent::paintCaseStart($test_name);

        $this->report[] = array(
            'type' => 'CaseStart',
            'test_name' => $test_name,
        );
    }

    /**
     *  �ƥ��ȥ�������λ
     *
     *  @access public
     *  @param string   $test_name  �ƥ���̾��
     */
    function paintCaseEnd($test_name)
    {
        parent::paintCaseEnd($test_name);

        $this->report[] = array(
            'type' => 'CaseEnd',
        );
    }

    /**
     *  �ե����ޥåȺѤߥ�å�����
     *
     *  @access public
     *��@param string   $message    ��å�����
     */
    function paintFormattedMessage($message)
    {
        $this->report[] = array(
            'type' => 'FormattedMessage',
            'message' => $this->_htmlEntities($message),
        );
    }

    /**
     *  HTML����ƥ��ƥ��Ѵ�
     *
     *��@access protected
     *��@param string   $message    �ץ졼��ƥ�����
     *��@return string              HTML����ƥ��ƥ��Ѵ��Ѥߥ�å�����
     */
    function _htmlEntities($message)
    {
        return htmlentities($message, ENT_COMPAT, $this->_character_set);
    }
}
?>
