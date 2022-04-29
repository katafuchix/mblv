<?php
// vim: foldmethod=marker
/**
 *  Ethna_Session.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Session.php,v 1.10 2006/11/17 09:03:53 cocoitiban Exp $
 */

// {{{ Ethna_Session
/**
 *  ���å���󥯥饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Session
{
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_Logger    logger���֥������� */
    var $logger;

    /** @var    string  ���å����̾ */
    var $session_name;

    /** @var    string  ���å����ǡ�����¸�ǥ��쥯�ȥ� */
    var $session_save_dir;

    /** @var    bool    ���å���󳫻ϥե饰 */
    var $session_start = false;

    /** @var    bool    ƿ̾���å����ե饰 */
    var $anonymous = false;

    /**#@-*/

    /**
     *  Ethna_Session���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  string  $appid      ���ץꥱ�������ID(���å����̾�Ȥ��ƻ���)
     *  @param  string  $save_dir   ���å����ǡ�������¸����ǥ��쥯�ȥ�
     */
    function Ethna_Session($appid, $save_dir, $logger)
    {
        $this->session_name = "${appid}SESSID";
        $this->session_save_dir = $save_dir;
        $this->logger =& $logger;

        if ($this->session_save_dir != "") {
            session_save_path($this->session_save_dir);
        }

        session_name($this->session_name);
        session_cache_limiter('private, must-revalidate');

        $this->session_start = false;
        if (isset($_SERVER['REQUEST_METHOD']) == false) {
            return;
        }

        if (strcasecmp($_SERVER['REQUEST_METHOD'], 'post') == 0) {
            $http_vars =& $_POST;
        } else {
            $http_vars =& $_GET;
        }
        if (array_key_exists($this->session_name, $http_vars)
            && $http_vars[$this->session_name] != null) {
            $_COOKIE[$this->session_name] = $http_vars[$this->session_name];
        }
    }

    /**
     *  ���å�������������
     *
     *  @access public
     */
    function restore()
    {
        if (!empty($_COOKIE[$this->session_name]) ||
        (ini_get("session.use_trans_sid") == 1 &&
        !empty($_REQUEST[$this->session_name]))
        ) {
            session_start();
            $this->session_start = true;

            // check session
            if ($this->isValid() == false) {
                setcookie($this->session_name, "", 0, "/");
                $this->session_start = false;
            }

            // check anonymous
            if ($this->get('__anonymous__')) {
                $this->anonymous = true;
            }
        }
    }

    /**
     *  ���å����������������å�
     *
     *  @access public
     *  @return bool    true:�����ʥ��å���� false:�����ʥ��å����
     */
    function isValid()
    {
        if (!$this->session_start) {
            if (!empty($_COOKIE[$this->session_name]) || session_id() != null) {
                setcookie($this->session_name, "", 0, "/");
            }
            return false;
        }

        // check remote address
        if (!isset($_SESSION['REMOTE_ADDR'])
            || $this->_validateRemoteAddr($_SESSION['REMOTE_ADDR'],
                                          $_SERVER['REMOTE_ADDR']) == false) {
            // we do not allow this
            setcookie($this->session_name, "", 0, "/");
// [2007-04-21] Comment Outed by Kazuya Fujimori<fujimori@technovarth.co.jp>
//            session_destroy();
            $this->session_start = false;
            return false;
        }

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
        if ($this->session_start) {
            // we need this?
            $_SESSION['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'];
            $_SESSION['__anonymous__'] = $anonymous;
            return true;
        }

        if (is_null($lifetime)) {
            ini_set('session.use_cookies', 0);
        } else {
            ini_set('session.use_cookies', 1);
        }

        session_set_cookie_params($lifetime);
        session_id(Ethna_Util::getRandom());
        session_start();
        $_SESSION['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'];
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
        if (!$this->session_start) {
            return true;
        }
        
        session_destroy();
        $this->session_start = false;
        setcookie($this->session_name, "", 0, "/");

        return true;
    }

    /**
     *  ���å����ID�����������
     *
     *  @access public
     *  @return bool    true:���ｪλ false:���顼
     */
    function regenerateId($lifetime = 0, $anonymous = false)
    {
        if (! $this->session_start) {
            return false;
        }
       
        $tmp = $_SESSION;

        $this->destroy();
        $this->start($lifetime, $anonymous);
        
        unset($tmp['REMOTE_ADDR']);
        unset($tmp['__anonymous__']);
        foreach ($tmp as $key => $value) {
            $_SESSION[$key] = $value;
        }

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
        if (!$this->session_start) {
            return null;
        }

        if (!isset($_SESSION[$name])) {
            return null;
        }
        return $_SESSION[$name];
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

        $_SESSION[$name] = $value;

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

        unset($_SESSION[$name]);

        return true;
    }

    /**
     *  ���å���󤬳��Ϥ���Ƥ��뤫�ɤ������֤�
     *
     *  @access public
     *  @param  string  $anonymous  ƿ̾���å�����ֳ��ϡפȤߤʤ����ɤ���(default: false)
     *  @return bool    true:���ϺѤ� false:���Ϥ���Ƥ��ʤ�
     */
    function isStart($anonymous = false)
    {
        if ($anonymous) {
            return $this->session_start;
        } else {
            if ($this->session_start && $this->isAnonymous() != true) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     *  ƿ̾���å���󤫤ɤ������֤�
     *
     *  @access public
     *  @return bool    true:ƿ̾���å���� false:��ƿ̾���å����/���å���󳫻Ϥ���Ƥ��ʤ�
     */
    function isAnonymous()
    {
        return $this->anonymous;
    }

    /**
     *  ���å�������¸���줿IP���ɥ쥹�ȥ�����������IP���ɥ쥹��
     *  Ʊ��ͥåȥ���ϰϤ��ɤ�����Ƚ�̤���(16bit mask)
     *
     *  @access private
     *  @param  string  $src_ip     ���å���󳫻ϻ��Υ���������IP���ɥ쥹
     *  @param  string  $dst_ip     ���ߤΥ���������IP���ɥ쥹
     *  @return bool    true:���ｪλ false:������IP���ɥ쥹
     */
    function _validateRemoteAddr($src_ip, $dst_ip)
    {
        $src = ip2long($src_ip);
        $dst = ip2long($dst_ip);

        if (($src & 0xffff0000) == ($dst & 0xffff0000)) {
            return true;
        } else {
            $this->logger->log(LOG_NOTICE, "session IP validation failed [%s] - [%s]",
                               $src_ip, $dst_ip);
            return false;
        }
    }
}
// }}}
?>
