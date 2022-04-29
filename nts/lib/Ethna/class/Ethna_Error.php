<?php
// vim: foldmethod=marker
/**
 *  Ethna_Error.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Error.php,v 1.10 2006/11/09 01:05:55 halt1983 Exp $
 */

// {{{ ethna_error_handler
/**
 *  ���顼������Хå��ؿ�
 *
 *  @param  int     $errno      ���顼��٥�
 *  @param  string  $errstr     ���顼��å�����
 *  @param  string  $errfile    ���顼ȯ���ս�Υե�����̾
 *  @param  string  $errline    ���顼ȯ���ս�ι��ֹ�
 */
function ethna_error_handler($errno, $errstr, $errfile, $errline)
{
    if ($errno === E_STRICT || ($errno & error_reporting()) === 0) {
        return;
    }

    list($level, $name) = Ethna_Logger::errorLevelToLogLevel($errno);
    switch ($errno) {
    case E_ERROR:
    case E_CORE_ERROR:
    case E_COMPILE_ERROR:
    case E_USER_ERROR:
        $php_errno = 'Fatal error'; break;
    case E_WARNING:
    case E_CORE_WARNING:
    case E_COMPILE_WARNING:
    case E_USER_WARNING:
        $php_errno = 'Warning'; break;
    case E_PARSE:
        $php_errno = 'Parse error'; break;
    case E_NOTICE:
    case E_USER_NOTICE:
        $php_errno = 'Notice'; break;
    default:
        $php_errno = 'Unknown error'; break;
    }
    $php_errstr = sprintf('PHP %s: %s in %s on line %d',
                          $php_errno, $errstr, $errfile, $errline);

    // error_log()
    if (ini_get('log_errors')) {
        $locale = setlocale(LC_TIME, 0);
        setlocale(LC_TIME, 'C');
        error_log($php_errstr, 0);
        setlocale(LC_TIME, $locale);
    }

    // $logger->log()
    $c =& Ethna_Controller::getInstance();
    if ($c !== null) {
        $logger =& $c->getLogger();
        $logger->log($level, sprintf("[PHP] %s: %s in %s on line %d",
                                     $name, $errstr, $errfile, $errline));
    }

    // printf()
    if (ini_get('display_errors')) {
        $is_debug = true;
        $has_echo = false;
        if ($c !== null) {
            $config =& $c->getConfig();
            $is_debug = $config->get('debug');
            $facility = $logger->getLogFacility();
            $has_echo = is_array($facility)
                        ? in_array('echo', $facility) : $facility === 'echo';
        }
        if ($is_debug == true && $has_echo === false) {
            if ($c !== null && $c->getGateway() === GATEWAY_WWW) {
                $format = "<b>%s</b>: %s in <b>%s</b> on line <b>%d</b><br />\n";
            } else {
                $format = "%s: %s in %s on line %d\n";
            }
            printf($format, $php_errno, $errstr, $errfile, $errline);
        }
    }
}
set_error_handler('ethna_error_handler');
// }}}

// {{{ Ethna_Error
/**
 *  ���顼���饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Error extends PEAR_Error
{
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_I18N  i18n���֥������� */
    var $i18n;

    /** @var    object  Ethna_Logger    logger���֥������� */
    var $logger;

    /**#@-*/

    /**
     *  Ethna_Error���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  int     $level              ���顼��٥�
     *  @param  string  $message            ���顼��å�����
     *  @param  int     $code               ���顼������
     *  @param  array   $userinfo           ���顼�ɲþ���(���顼�����ɰʹߤ����Ƥΰ���)
     */
    function Ethna_Error($message = null, $code = null, $mode = null, $options = null)
    {
        $controller =& Ethna_Controller::getInstance();
        if ($controller !== null) {
            $this->i18n =& $controller->getI18N();
        }

        // $options�ʹߤΰ���->$userinfo
        if (func_num_args() > 4) {
            $userinfo = array_slice(func_get_args(), 4);
            if (count($userinfo) == 1) {
                if (is_array($userinfo[0])) {
                    $userinfo = $userinfo[0];
                } else if (is_null($userinfo[0])) {
                    $userinfo = array();
                }
            }
        } else {
            $userinfo = array();
        }

        // ��å�������������
        if (is_null($message)) {
            // $code�����å��������������
            $message = $controller->getErrorMessage($code);
            if (is_null($message)) {
                $message = 'unknown error';
            }
        }

        parent::PEAR_Error($message, $code, $mode, $options, $userinfo);

        // Ethna�ե졼�����Υ��顼�ϥ�ɥ�(PEAR_Error�Υ�����Хå��Ȥϰۤʤ�)
        Ethna::handleError($this);
    }

    /**
     *  level�ؤΥ�������(R)
     *
     *  @access public
     *  @return int     ���顼��٥�
     */
    function getLevel()
    {
        return $this->level;
    }

    /**
     *  message�ؤΥ�������(R)
     *
     *  PEAR_Error::getMessage()�򥪡��С��饤�ɤ��ưʲ��ν�����Ԥ�
     *  - ���顼��å�������i18n����
     *  - $userinfo�Ȥ����Ϥ��줿�ǡ����ˤ��vsprintf()����
     *
     *  @access public
     *  @return string  ���顼��å�����
     */
    function getMessage()
    {
        $tmp_message = $this->i18n ? $this->i18n->get($this->message) : $this->message;
        $tmp_userinfo = to_array($this->userinfo);
        $tmp_message_arg_list = array();
        for ($i = 0; $i < count($tmp_userinfo); $i++) {
            $tmp_message_arg_list[] = $this->i18n ? $this->i18n->get($tmp_userinfo[$i]) : $tmp_userinfo[$i];
        }
        return vsprintf($tmp_message, $tmp_message_arg_list);
    }

    /**
     *  ���顼�ɲþ���ؤΥ�������(R)
     *
     *  PEAR_Error::getUserInfo()�򥪡��С��饤�ɤ��ơ�����θġ���
     *  ����ȥ�ؤΥ��������򥵥ݡ���
     *
     *  @access public
     *  @param  int     $n      ���顼�ɲþ���Υ���ǥå���(��ά��)
     *  @return mixed   message����
     */
    function getUserInfo($n = null)
    {
        if (is_null($n)) {
            return $this->userinfo;
        }

        if (isset($this->userinfo[$n])) {
            return $this->userinfo[$n];
        } else {
            return null;
        }
    }

    /**
     *  ���顼�ɲþ���ؤΥ�������(W)
     *
     *  PEAR_Error::addUserInfo()�򥪡��С��饤��
     *
     *  @access public
     *  @param  string  $info   �ɲä��륨�顼����
     */
    function addUserInfo($info)
    {
        $this->userinfo[] = $info;
    }
}
// }}}
?>
