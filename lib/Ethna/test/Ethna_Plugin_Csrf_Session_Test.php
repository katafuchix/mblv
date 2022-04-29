<?php
/**
 *  Ethna_Plugin_Validator_Required_Test.php
 */

/**
 *  Ethna_Plugin_Validator_Required���饹�Υƥ��ȥ�����
 *
 *  @access public
 */
class Ethna_Plugin_Csrf_Session_Test extends Ethna_UnitTestBase
{
    /**
     * Description of the Variable
     * @var     Ethna_Plugin_Csrf_Session
     * @access  private
     */
    var $csrf;

    function testMakeInstance()
    {
        $ctl =& Ethna_Controller::getInstance();
        $plugin =& $ctl->getPlugin();
        $this->csrf =& $plugin->getPlugin('Csrf', 'Session');
        $this->assertTrue(is_object($this->csrf), 'getPlugin failed');
        $this->csrf->session =& new Ethna_Session_Dummy($ctl->appid, '',  $ctl->getLogger());
    }

    function testGetName()
    {
        $this->assertTrue(strlen($this->csrf->getName()), 'token name not found');
    }

    function testCheckCsrfSession()
    {
        $this->assertTrue($this->csrf->set());
        $this->csrfid = $this->csrf->get();
    }

    function testPostRequest()
    {
        $_SERVER['REQUEST_METHOD'] = "post";
        $_POST[$this->csrf->getName()] = "";
        $this->assertFalse($this->csrf->isValid());

        $_POST[$this->csrf->getName()] = $this->csrfid;
        $this->assertTrue($this->csrf->isValid());
    }

    function testGetRequest()
    {
        $_SERVER['REQUEST_METHOD'] = "get";
        $_GET[$this->csrf->getName()] = "";
        $this->assertFalse($this->csrf->isValid());

        $_GET[$this->csrf->getName()] = $this->csrfid;
        $this->assertTrue($this->csrf->isValid());
    }

}

/**
 *  SessionClass��_Dummy
 *
 *  @access public
 */
// {{{ Ethna_Session
/**
 *  ���å���󥯥饹�Υ��ߡ�
 *
 *  @author     Keita Arai <cocoiti@comio.info>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Session_Dummy extends Ethna_Session
{
    var $dummy_session = array();


    /**
     *  ���å�������������
     *
     *  @access public
     */
    function restore()
    {
        $this->session_start = true;
        return true;
    }

    /**
     *  ���å����������������å�
     *
     *  @access public
     *  @return bool    true:�����ʥ��å���� false:�����ʥ��å����
     */
    function isValid()
    {
        return true;
    }

    /**
     *  ���å����򳫻Ϥ���
     *
     *  @access public
     *  @param  int     $lifetime   ���å����ͭ������(��ñ��, 0�ʤ饻�å���󥯥å���)
     *  @return bool    true:���ｪλ false:���顼
     */
    function start($lifetime = 0, $anonymous = false)
    {
        $_SESSION['REMOTE_ADDR'] = "DUMMY";
        $_SESSION['__anonymous__'] = $anonymous;
        $this->session_start = true;
        return true;
    }

    /**
     *  ���å������˴�����
     *
     *  @access public
     *  @return bool    true:���ｪλ false:���顼
     */
    function destroy()
    {
        return true;
    }

    /**
     *  ���å�����ͤؤΥ�������(R)
     *
     *  @access public
     *  @param  string  $name   ����
     *  @return mixed   ����������(null:���å���󤬳��Ϥ���Ƥ��ʤ�)
     */
    function get($name)
    {
        if (!isset($this->dummy_session[$name])) {
            return null;
        }
        return $this->dummy_session[$name];
    }

    /**
     *  ���å�����ͤؤΥ�������(W)
     *
     *  @access public
     *  @param  string  $name   ����
     *  @param  string  $value  ��
     *  @return bool    true:���ｪλ false:���顼(���å���󤬳��Ϥ���Ƥ��ʤ�)
     */
    function set($name, $value)
    {
        if (!$this->session_start) {
            // no way
            return false;
        }

        $this->dummy_session[$name] = $value;

        return true;
    }

    /**
     *  ���å������ͤ��˴�����
     *
     *  @access public
     *  @param  string  $name   ����
     *  @return bool    true:���ｪλ false:���顼(���å���󤬳��Ϥ���Ƥ��ʤ�)
     */
    function remove($name)
    {
        if (!$this->session_start) {
            return false;
        }

        unset($this->dummy_session[$name]);

        return true;
    }
}
// }}}

?>
