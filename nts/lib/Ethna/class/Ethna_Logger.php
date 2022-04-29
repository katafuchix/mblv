<?php
// vim: foldmethod=marker
/**
 *  Ethna_Logger.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Logger.php,v 1.20 2006/11/26 11:27:07 ichii386 Exp $
 */

/**
 *  ��ĥ���ץ�ѥƥ�: �ե��������
 */
define('LOG_FILE', 1 << 16);

/**
 *  ��ĥ���ץ�ѥƥ�: ɸ�����
 */
define('LOG_ECHO', 1 << 17);

// {{{ Ethna_Logger
/**
 *  ���������饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Logger extends Ethna_AppManager
{
    // {{{ properties
    /**#@+
     *  @access private
     */

    /** @var    array   ���ե�����ƥ����� */
    var $log_facility_list = array(
        'auth'      => array('name' => 'LOG_AUTH'),
        'cron'      => array('name' => 'LOG_CRON'),
        'daemon'    => array('name' => 'LOG_DAEMON'),
        'kern'      => array('name' => 'LOG_KERN'),
        'lpr'       => array('name' => 'LOG_LPR'),
        'mail'      => array('name' => 'LOG_MAIL'),
        'news'      => array('name' => 'LOG_NEWS'),
        'syslog'    => array('name' => 'LOG_SYSLOG'),
        'user'      => array('name' => 'LOG_USER'),
        'uucp'      => array('name' => 'LOG_UUCP'),
        'file'      => array('name' => 'LOG_FILE'),
        'echo'      => array('name' => 'LOG_ECHO'),
    );

    /** @var    array   ����٥���� */
    var $log_level_list = array(
        'emerg'     => array('name' => 'LOG_EMERG',     'value' => 7),
        'alert'     => array('name' => 'LOG_ALERT',     'value' => 6),
        'crit'      => array('name' => 'LOG_CRIT',      'value' => 5),
        'err'       => array('name' => 'LOG_ERR',       'value' => 4),
        'warning'   => array('name' => 'LOG_WARNING',   'value' => 3),
        'notice'    => array('name' => 'LOG_NOTICE',    'value' => 2),
        'info'      => array('name' => 'LOG_INFO',      'value' => 1),
        'debug'     => array('name' => 'LOG_DEBUG',     'value' => 0),
    );

    /** @var    object  Ethna_Controller    controller���֥������� */
    var $controller;

    /** @var    object  Ethna_Controller    controller���֥�������($controller�ξ�ά��) */
    var $ctl;

    /** @var    array   ���ե�����ƥ� */
    var $facility = array();

    /** @var    array   ����٥� */
    var $level = array();

    /** @var    array   �����ץ���� */
    var $option = array();

    /** @var    array   ��å������ե��륿(����) */
    var $message_filter_do = array();

    /** @var    array   ��å������ե��륿(̵��) */
    var $message_filter_ignore = array();

    /** @var    int     ���顼�ȥ�٥� */
    var $alert_level;

    /** @var    string  ���顼�ȥ᡼�륢�ɥ쥹 */
    var $alert_mailaddress;

    /** @var    array   Ethna_LogWriter �����ϥ��֥������� */
    var $writer = array();

    /** @var    bool    �����ϳ��ϥե饰 */
    var $is_begin = false;

    /** @var    array   �������å�(begin()����log()���ƤӽФ��줿���Υ����å�) */
    var $log_stack = array();

    /**#@-*/
    // }}}
    
    // {{{ Ethna_Logger
    /**
     *  Ethna_Logger���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Controller    $controller controller���֥�������
     */
    function Ethna_Logger(&$controller)
    {
        $this->controller =& $controller;
        $this->ctl =& $this->controller;
        $config =& $controller->getConfig();

        // ���ե�����ƥ��ơ��֥��䴰(LOCAL0��LOCAL8)
        for ($i = 0; $i < 8; $i++) {
            if (defined("LOG_LOCAL$i")) {
                $this->log_facility_list["local$i"] = array('name' => "LOG_LOCAL$i");
            }
        }

        $config_log = $config->get('log');

        // ���ե�����ƥ�
        if (is_array($config_log)) {
            $this->facility = array_keys($config_log);
        } else {
            $this->facility = $this->_parseLogFacility($config->get('log_facility'));
        }

        foreach ($this->facility as $f) {
            // ����٥�
            if (isset($config_log[$f]['level'])) {
                $this->level[$f] = $this->_parseLogLevel($config_log[$f]['level']);
            } else if (($level = $config->get("log_level_$f")) !== null) {
                $this->level[$f] = $this->_parseLogLevel($level);
            } else if (($level = $config->get("log_level")) !== null) {
                $this->level[$f] = $this->_parseLogLevel($level);
            } else {
                $this->level[$f] = LOG_WARNING;
            }

            // ��å������ե��륿(filter_do)
            if (isset($config_log[$f]['filter_do'])) {
                $this->message_filter_do[$f] = $config_log[$f]['filter_do'];
            } else if (($filter = $config->get("log_filter_do_$f")) !== null) {
                $this->message_filter_do[$f] = $filter;
            } else if (($filter = $config->get("log_filter_do")) !== null) {
                $this->message_filter_do[$f] = $filter;
            } else {
                $this->message_filter_do[$f] = '';
            }

            // ��å������ե��륿(filter_ignore)
            if (isset($config_log[$f]['filter_ignore'])) {
                $this->message_filter_ignore[$f] = $config_log[$f]['filter_ignore'];
            } else if (($filter = $config->get("log_filter_ignore_$f")) !== null) {
                $this->message_filter_ignore[$f] = $filter;
            } else if (($filter = $config->get("log_filter_ignore")) !== null) {
                $this->message_filter_ignore[$f] = $filter;
            } else {
                $this->message_filter_ignore[$f] = '';
            }

            // ���Τ����ץ���� (unset�Ϥ����ˤ��Τޤ��Ϥ�)
            if (isset($config_log[$f])) {
                $this->option[$f] = $config_log[$f];
            } else {
                $this->option[$f] = array();
            }

            // 'option' �ˤ�륪�ץ������� (for B.C.)
            if (isset($config_log[$f]['option'])) {
                $option = $this->_parseLogOption($config_log[$f]['option']);
            } else if (($option = $config->get("log_option_$f")) !== null) {
                $option = $this->_parseLogOption($option);
            } else if (($option = $config->get("log_option")) !== null) {
                $option = $this->_parseLogOption($option);
            }
            if ($option !== null) {
                $this->option[$f] = array_merge($this->option[$f], $option);
            }
        }

        // ���顼�ȥ��ץ����
        $this->alert_level =
            $this->_parseLogLevel($config->get('log_alert_level'));
        $this->alert_mailaddress
            = preg_split('/\s*,\s*/', $config->get('log_alert_mailaddress'));
    }
    // }}}

    // {{{ getLogFacility
    /**
     *  ���ե�����ƥ����������
     *
     *  @access public
     *  @return mixed   ���ե�����ƥ�(�ե�����ƥ���1�İʲ��ʤ�scalar��
     *                  2�İʾ�ʤ�������֤� for B.C.)
     */
    function getLogFacility()
    {
        if (is_array($this->facility)) {
            if (count($this->facility) == 0) {
                return null;
            } else if (count($this->facility) == 1) {
                return $this->facility[0];
            }
        }
        return $this->facility;
    }
    // }}}

    // {{{ errorLevelToLogLevel
    /**
     *  PHP���顼��٥�����٥���Ѵ�����
     *
     *  @access public
     *  @param  int     $errno  PHP���顼��٥�
     *  @return array   ����٥�(LOG_NOTICE,...), ���顼��٥�ɽ��̾("E_NOTICE"...)
     *  @static
     */
    function errorLevelToLogLevel($errno)
    {
        switch ($errno) {
        case E_ERROR:           $code = "E_ERROR"; $level = LOG_ERR; break;
        case E_WARNING:         $code = "E_WARNING"; $level = LOG_WARNING; break;
        case E_PARSE:           $code = "E_PARSE"; $level = LOG_CRIT; break;
        case E_NOTICE:          $code = "E_NOTICE"; $level = LOG_NOTICE; break;
        case E_USER_ERROR:      $code = "E_USER_ERROR"; $level = LOG_ERR; break;
        case E_USER_WARNING:    $code = "E_USER_WARNING"; $level = LOG_WARNING; break;
        case E_USER_NOTICE:     $code = "E_USER_NOTICE"; $level = LOG_NOTICE; break;
        case E_STRICT:          $code = "E_STRING"; $level = LOG_NOTICE; return;
        default:                $code = "E_UNKNOWN"; $level = LOG_DEBUG; break;
        }
        return array($level, $code);
    }
    // }}}

    // {{{ begin
    /**
     *  �����Ϥ򳫻Ϥ���
     *
     *  @access public
     */
    function begin()
    {
        // LogWriter���饹������
        foreach ($this->facility as $f) {
            $this->writer[$f] =& $this->_getLogWriter($this->option[$f], $f);
            if (Ethna::isError($this->writer[$f])) {
                // use default
                $this->writer[$f] =& $this->_getLogWriter($this->option[$f],
                                                          "default");
            }
        }

        foreach (array_keys($this->writer) as $key) {
            $this->writer[$key]->begin();
        }
        
        $this->is_begin = true;

        // begin()������log()�����
        if (count($this->log_stack) > 0) {
            // copy and clear for recursive calls
            $tmp_stack = $this->log_stack;
            $this->log_stack = array();

            while (count($tmp_stack) > 0) {
                $log = array_shift($tmp_stack);
                $this->log($log[0], $log[1]);
            }
        }
    }
    // }}}

    // {{{ log
    /**
     *  ������Ϥ���
     *
     *  @access public
     *  @param  int     $level      ����٥�(LOG_DEBUG, LOG_NOTICE...)
     *  @param  string  $message    ����å�����(+����)
     */
    function log($level, $message)
    {
        if ($this->is_begin == false) {
            $args = func_get_args();
            if (count($args) > 2) {
                array_splice($args, 0, 2);
                $message = vsprintf($message, $args);
            }
            $this->log_stack[] = array($level, $message);
            return;
        }

        foreach (array_keys($this->writer) as $key) {
            // ����å������ե��륿(��٥�ե��륿��ͥ�褹��)
            $r = $this->_evalMessageMask($this->message_filter_do[$key], $message);
            if (is_null($r)) {
                $r = $this->_evalMessageMask($this->message_filter_ignore[$key],
                                             $message);
                if ($r) {
                    continue;
                }
            }

            // ����٥�ե��륿
            if ($this->_evalLevelMask($this->level[$key], $level)) {
                continue;
            }

            // ������
            $args = func_get_args();
            if (count($args) > 2) {
                array_splice($args, 0, 2);
                $message = vsprintf($message, $args);
            }
            $output = $this->writer[$key]->log($level, $message);
        }

        // ���顼�Ƚ���
        if ($this->_evalLevelMask($this->alert_level, $level) == false) {
            if (count($this->alert_mailaddress) > 0) {
                $this->_alert($output);
            }
        }
    }
    // }}}

    // {{{ end
    /**
     *  �����Ϥ�λ����
     *
     *  @access public
     */
    function end()
    {
        foreach (array_keys($this->writer) as $key) {
            $this->writer[$key]->end();
        }

        $this->is_begin = false;
    }
    // }}}

    // {{{ _getLogWriter
    /**
     *  LogWriter���֥������Ȥ��������
     *
     *  @access protected
     *  @param  array   $option     �����ץ����
     *  @param  string  $facility   ���ե�����ƥ�
     *  @return object  LogWriter   LogWriter���֥�������
     */
    function &_getLogWriter($option, $facility = null)
    {
        if ($facility == null) {
            $facility = $this->getLogFacility();
            if (is_array($facility)) {
                $facility = $facility[0];
            }
        }

        if (is_null($facility)) {
            $plugin = "default";
        } else if (isset($this->log_facility_list[$facility])) {
            if ($facility == "file" || $facility == "echo") {
                $plugin = $facility;

            } else {
                $plugin = "syslog";
            }
        } else {
            $plugin = $facility;
        }

        $plugin_manager =& $this->controller->getPlugin();
        $plugin_object = $plugin_manager->getPlugin('Logwriter',
                                                    ucfirst(strtolower($plugin)));
        if (Ethna::isError($plugin_object)) {
            return $plugin_object;
        }

        if (isset($option['ident']) == false) {
            $option['ident'] = $this->controller->getAppId();
        }
        if (isset($option['facility']) == false) {
            $option['facility'] = $facility;
        }
        $plugin_object->setOption($option);

        return $plugin_object;
    }
    // }}}

    // {{{ _alert
    /**
     *  ���顼�ȥ᡼�����������
     *
     *  @access protected
     *  @param  string  $message    ����å�����
     *  @return int     0:���ｪλ
     *  @deprecated
     */
    function _alert($message)
    {
        restore_error_handler();

        // �إå�
        $header = "Mime-Version: 1.0\n";
        $header .= "Content-Type: text/plain; charset=ISO-2022-JP\n";
        $header .= "X-Alert: " . $this->controller->getAppId();
        $subject = sprintf("[%s] alert (%s%s)\n",
                           $this->controller->getAppId(),
                           substr($message, 0, 12),
                           strlen($message) > 12 ? "..." : "");
        
        // ��ʸ
        $mail = sprintf("--- [log message] ---\n%s\n\n", $message);
        if (function_exists("debug_backtrace")) {
            $bt = debug_backtrace();
            $mail .= sprintf("--- [backtrace] ---\n%s\n",
                             Ethna_Util::FormatBacktrace($bt));
        }

        foreach ($this->alert_mailaddress as $mailaddress) {
            mail($mailaddress,
                 $subject,
                 mb_convert_encoding($mail, "ISO-2022-JP"),
                 $header);
        }

        set_error_handler("ethna_error_handler");

        return 0;
    }
    // }}}

    // {{{ _evalMessageMask
    /**
     *  ����å������Υޥ��������å���Ԥ�
     *
     *  @access private
     *  @param  string  $filter     �ե��륿
     *  @param  string  $message    ����å�����
     *  @return mixed   true:match, null:skip
     */
    function _evalMessageMask($filter, $message)
    {
        $regexp = sprintf("/%s/", $filter);

        if ($filter && preg_match($regexp, $message)) {
            return true;
        }

        return null;
    }
    // }}}

    // {{{ _evalLevelMask
    /**
     *  ����٥�Υޥ��������å���Ԥ�
     *
     *  @access private
     *  @param  int     $src    ����٥�ޥ���
     *  @param  int     $dst    ����٥�
     *  @return bool    true:���Ͱʲ� false:���Ͱʾ�
     */
    function _evalLevelMask($src, $dst)
    {
        static $log_level_table = null;

        if (is_null($log_level_table)) {
            $log_level_table = array();

            // ����٥�ơ��֥�(�հ���)����
            foreach ($this->log_level_list as $key => $def) {
                if (defined($def['name']) == false) {
                    continue;
                }
                $log_level_table[constant($def['name'])] = $def['value'];
            }
        }

        // �Τ�ʤ���٥�ʤ���Ϥ��ʤ�
        if (isset($log_level_table[$src]) == false
            || isset($log_level_table[$dst]) == false) {
            return true;
        }

        if ($log_level_table[$dst] >= $log_level_table[$src]) {
            return false;
        }

        return true;
    }
    // }}}

    // {{{ _parseLogOption
    /**
     *  �����ץ����(����ե�������)����Ϥ���
     *
     *  @access private
     *  @param  mixed   $option �����ץ����(����ե�������)
     *  @return array   ���Ϥ��줿����ե�������(���顼�����Υ᡼�륢�ɥ쥹,
     *                  ���顼���оݥ���٥�, �����ץ����)
     */
    function _parseLogOption($option)
    {
        if (is_null($option)) {
            return null;
        } else if (is_array($option)) {
            return $option;
        }

        $ret = array();
        $elts = preg_split('/\s*,\s*/', $option);
        foreach ($elts as $elt) {
            if (preg_match('/^(.*?)\s*:\s*(.*)/', $elt, $match)) {
                $ret[$match[1]] = $match[2];
            } else {
                $ret[$elt] = true;
            }
        }

        return $ret;
    }
    // }}}

    // {{{ _parseLogFacility
    /**
     *  ���ե�����ƥ�(����ե�������)����Ϥ���
     *
     *  @access private
     *  @param  string  $facility   ���ե�����ƥ�(����ե�������)
     *  @return array   ���ե�����ƥ�(LOG_LOCAL0, LOG_FILE...)���Ǽ��������
     */
    function _parseLogFacility($facility)
    {
        $facility_list = preg_split('/\s*,\s*/', $facility, -1, PREG_SPLIT_NO_EMPTY);
        return $facility_list;
    }
    // }}}

    // {{{ _parseLogLevel
    /**
     *  ����٥�(����ե�������)����Ϥ���
     *
     *  @access private
     *  @param  string  $level  ����٥�(����ե�������)
     *  @return int     ����٥�(LOG_DEBUG, LOG_NOTICE...)
     */
    function _parseLogLevel($level)
    {
        if (isset($this->log_level_list[strtolower($level)]) == false) {
            return null;
        }
        $constant_name = $this->log_level_list[strtolower($level)]['name'];

        return constant($constant_name);
    }
    // }}}
}
// }}}
?>
