<?php
// vim: foldmethod=marker
/**
 *  Ethna_Plugin_Logwriter_Syslog.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin_Logwriter_Syslog.php,v 1.2 2006/07/19 05:22:39 fujimoto Exp $
 */

// {{{ Ethna_Plugin_Logwriter_Syslog
/**
 *  �����ϥ��饹(Syslog)
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Logwriter_Syslog extends Ethna_Plugin_Logwriter
{
    /**
     *  �����Ϥ򳫻Ϥ���
     *
     *  @access public
     */
    function begin()
    {
        // syslog�ѥ��ץ����Τߤ����
        if (array_key_exists("pid", $this->option)) {
            $option = $this->option & (LOG_PID);
        }
        openlog($this->ident, $option, $this->facility);
    }

    /**
     *  ������Ϥ���
     *
     *  @access public
     *  @param  int     $level      ����٥�(LOG_DEBUG, LOG_NOTICE...)
     *  @param  string  $message    ����å�����(+����)
     */
    function log($level, $message)
    {
        $prefix = sprintf('%s: ', $this->_getLogLevelName($level));
        if (array_key_exists("function", $this->option) ||
            array_key_exists("pos", $this->option)) {
            $tmp = "";
            $bt = $this->_getBacktrace();
            if ($bt && array_key_exists("function", $this->option) && $bt['function']) {
                $tmp .= $bt['function'];
            }
            if ($bt && array_key_exists("pos", $this->option) && $bt['pos']) {
                $tmp .= $tmp ? sprintf('(%s)', $bt['pos']) : $bt['pos'];
            }
            if ($tmp) {
                $prefix .= $tmp . ": ";
            }
        }
        syslog($level, $prefix . $message);

        return $prefix . $message;
    }

    /**
     *  �����Ϥ�λ����
     *
     *  @access public
     */
    function end()
    {
        closelog();
    }
}
// }}}
?>
