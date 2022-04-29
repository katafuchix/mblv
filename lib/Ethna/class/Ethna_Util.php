<?php
// vim: foldmethod=marker
/**
 *  Ethna_Util.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Util.php,v 1.25 2006/11/20 09:13:30 ichii386 Exp $
 */

// {{{ to_array
/**
 *  �����Х�桼�ƥ���ƥ��ؿ�: �����顼�ͤ����ǿ�1������Ȥ����֤�
 *
 *  @param  mixed   $v  ����Ȥ��ư�����
 *  @return array   ������Ѵ����줿��
 */
function to_array($v)
{
    if (is_array($v)) {
        return $v;
    } else {
        return array($v);
    }
}
// }}}

// {{{ is_error
/**
 *  �����Х�桼�ƥ���ƥ��ؿ�: ���ꤵ�줿�ե�������ܤ˥��顼�����뤫�ɤ������֤�
 *
 *  @param  string  $name   �ե��������̾
 *  @return bool    true:���顼ͭ�� false:���顼̵��
 */
function is_error($name = null)
{
    $c =& Ethna_Controller::getInstance();
    $action_error =& $c->getActionError();
    if ($name !== null) {
        return $action_error->isError($name);
    } else {
        return $action_error->count() > 0;
    }
}
// }}}

// {{{ file_exists_ex
/**
 *  �����Х�桼�ƥ���ƥ��ؿ�: include_path�򸡺����Ĥ�file_exists()����
 *
 *  @param  string  $path               �ե�����̾
 *  @param  bool    $use_include_path   include_path������å����뤫�ɤ���
 *  @return bool    true:ͭ�� false:̵��
 */
function file_exists_ex($path, $use_include_path = true)
{
    if ($use_include_path == false) {
        return file_exists($path);
    }

    // check if absolute
    if (is_absolute_path($path)) {
        return file_exists($path);
    }

    $include_path_list = explode(PATH_SEPARATOR, get_include_path());
    if (is_array($include_path_list) == false) {
        return file_exists($path);
    }

    foreach ($include_path_list as $include_path) {
        if (file_exists($include_path . DIRECTORY_SEPARATOR . $path)) {
            return true;
        }
    }
    return false;
}
// }}}

// {{{ is_absolute_path
/**
 *  �����Х�桼�ƥ���ƥ��ؿ�: ���Хѥ����ɤ������֤�
 *
 *  @param  string  $path               �ե�����̾
 *  @return bool    true:���� false:����
 */
function is_absolute_path($path)
{
    if (OS_WINDOWS) {
        if (preg_match('/^[a-z]:/i', $path) && $path{2} == DIRECTORY_SEPARATOR) {
            return true;
        }
    } else {
        if ($path{0} == DIRECTORY_SEPARATOR) {
            return true;
        }
    }
    return false;
}
// }}}

// {{{ Ethna_Util
/**
 *  �桼�ƥ���ƥ����饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Util
{
    // {{{ isDuplicatePost
    /**
     *  POST�Υ�ˡ��������å���Ԥ�
     *
     *  @access public
     *  @return bool    true:2���ܰʹߤ�POST false:1���ܤ�POST
     */
    function isDuplicatePost()
    {
        $c =& Ethna_Controller::getInstance();

        // use raw post data
        if (isset($_POST['uniqid'])) {
            $uniqid = $_POST['uniqid'];
        } else if (isset($_GET['uniqid'])) {
            $uniqid = $_GET['uniqid'];
        } else {
            return false;
        }

        // purge old files
        Ethna_Util::purgeTmp("uniqid_", 60*60*1);

		/* original
        $filename = sprintf("%s/uniqid_%s_%s",
                            $c->getDirectory('tmp'),
                            $_SERVER['REMOTE_ADDR'],
                            $uniqid);
        */
        // IP���ɥ쥹������å��ե�����̾�˴ޤ�ʤ�
        $filename = sprintf("%s/uniqid_%s",
                            $c->getDirectory('tmp'),
                            $uniqid);
        if (file_exists($filename) == false) {
            touch($filename);
            return false;
        }

        $st = stat($filename);
        if ($st[9] + 60*60*1 < time()) {
            // too old
            return false;
        }

        return true;
    }
    // }}}

    // {{{ clearDuplicatePost
    /**
     *  POST�Υ�ˡ��������å��ե饰�򥯥ꥢ����
     *
     *  @acccess public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function clearDuplicatePost()
    {
        $c =& Ethna_Controller::getInstance();

        // use raw post data
        if (isset($_POST['uniqid'])) {
            $uniqid = $_POST['uniqid'];
        } else {
            return 0;
        }

        $filename = sprintf("%s/uniqid_%s_%s",
                            $c->getDirectory('tmp'),
                            $_SERVER['REMOTE_ADDR'],
                            $uniqid);
        if (file_exists($filename)) {
            if (unlink($filename) == false) {
                return Ethna::raiseWarning(E_APP_WRITE, $filename);
            }
        }

        return 0;
    }
    // }}}

    // {{{ isCsrfSafeValid
    /**
     *  CSRF������å�����
     *
     *  @access public
     *  @return bool    true:�����POST false:������POST
     */
    function isCsrfSafe()
    {
        $c =& Ethna_Controller::getInstance();
        $name = $c->config->get('csrf');
        
        if (is_null($name)) {
            $name = 'Session';
        }
        
        $plugin =& $c->getPlugin('Csrf', $name);
        $csrf =& $plugin->getPlugin('Csrf', $name);
        return $csrf->isValid();
    }
    // }}}

    // {{{ setCsrfID
    /**
     *  CSRF������å�����
     *
     *  @access public
     *  @return bool    true:����
     */
    function setCsrfID()
    {
        $c =& Ethna_Controller::getInstance();
        $name = $c->config->get('csrf');
        
        if (is_null($name)) {
            $name = 'Session';
        }
        
        $plugin =& $c->getPlugin('Csrf', $name);
        $csrf =& $plugin->getPlugin('Csrf', $name);
        return $csrf->set();
    }
    // }}}

    // {{{ checkMailAddress
    /**
     *  �᡼�륢�ɥ쥹�����������ɤ���������å�����
     *
     *  @access public
     *  @param  string  $mailaddress    �����å�����᡼�륢�ɥ쥹
     *  @return bool    true: �������᡼�륢�ɥ쥹 false: �����ʷ���
     */
    function checkMailAddress($mailaddress)
    {
        if (preg_match('/^([a-z0-9_]|\-|\.|\+)+@(([a-z0-9_]|\-)+\.)+[a-z]{2,6}$/i',
                       $mailaddress)) {
            return true;
        }
        return false;
    }
    // }}}

    // {{{ explodeCSV
    /**
     *  CSV������ʸ����������ʬ�䤹��
     *
     *  @access public
     *  @param  string  $csv        CSV������ʸ����(1��ʬ)
     *  @param  string  $delimiter  �ե�����ɤζ��ڤ�ʸ��
     *  @return mixed   (array):ʬ���� Ethna_Error:���顼(�Է�³)
     */
    function explodeCSV($csv, $delimiter = ",")
    {
        $space_list = '';
        foreach (array(" ", "\t", "\r", "\n") as $c) {
            if ($c != $delimiter) {
                $space_list .= $c;
            }
        }

        $line_end = "";
        if (preg_match("/([$space_list]+)\$/sS", $csv, $match)) {
            $line_end = $match[1];
        }
        $csv = substr($csv, 0, strlen($csv)-strlen($line_end));
        $csv .= ' ';

        $field = '';
        $retval = array();

        $index = 0;
        $csv_len = strlen($csv);
        do {
            // 1. skip leading spaces
            if (preg_match("/^([$space_list]+)/sS", substr($csv, $index), $match)) {
                $index += strlen($match[1]);
            }
            if ($index >= $csv_len) {
                break;
            }

            // 2. read field
            if ($csv{$index} == '"') {
                // 2A. handle quote delimited field
                $index++;
                while ($index < $csv_len) {
                    if ($csv{$index} == '"') {
                        // handle double quote
                        if ($csv{$index+1} == '"') {
                            $field .= $csv{$index};
                            $index += 2;
                        } else {
                            // must be end of string
                            while ($csv{$index} != $delimiter && $index < $csv_len) {
                                $index++;
                            }
                            if ($csv{$index} == $delimiter) {
                                $index++;
                            }
                            break;
                        }
                    } else {
                        // normal character
                        if (preg_match("/^([^\"]*)/S", substr($csv, $index), $match)) {
                            $field .= $match[1];
                            $index += strlen($match[1]);
                        }

                        if ($index == $csv_len) {
                            $field = substr($field, 0, strlen($field)-1);
                            $field .= $line_end;

                            // request one more line
                            return Ethna::raiseNotice(E_UTIL_CSV_CONTINUE);
                        }
                    }
                }
            } else {
                // 2B. handle non-quoted field
                if (preg_match("/^([^$delimiter]*)/S", substr($csv, $index), $match)) {
                    $field .= $match[1];
                    $index += strlen($match[1]);
                }

                // remove trailing spaces
                $field = preg_replace("/[$space_list]+\$/S", '', $field);
                if ($csv{$index} == $delimiter) {
                    $index++;
                }
            }
            $retval[] = $field;
            $field = '';
        } while ($index < $csv_len);

        return $retval;
    }
    // }}}

    // {{{ escapeCSV
    /**
     *  CSV���������׽�����Ԥ�
     *
     *  @access public
     *  @param  string  $csv        �����������оݤ�ʸ����(CSV�γ�����)
     *  @param  bool    $escape_nl  ����ʸ��(\r/\n)�Υ��������ץե饰
     *  @return string  CSV���������פ��줿ʸ����
     */
    function escapeCSV($csv, $escape_nl = false)
    {
        if (preg_match('/[,"\r\n]/', $csv)) {
            if ($escape_nl) {
                $csv = preg_replace('/\r/', "\\r", $csv);
                $csv = preg_replace('/\n/', "\\n", $csv);
            }
            $csv = preg_replace('/"/', "\"\"", $csv);
            $csv = "\"$csv\"";
        }

        return $csv;
    }
    // }}}

    // {{{ escapeHtml
    /**
     *  ��������Ǥ�����HTML���������פ����֤�
     *
     *  @access public
     *  @param  array   $target     HTML�����������оݤȤʤ�����
     *  @return array   ���������פ��줿����
     */
    function escapeHtml($target)
    {
        $r = array();
        Ethna_Util::_escapeHtml($target, $r);
        return $r;
    }

    /**
     *  ��������Ǥ�����HTML���������פ����֤�
     *
     *  @access public
     *  @param  mixed   $vars   HTML�����������оݤȤʤ�����
     *  @param  mixed   $retval HTML�����������оݤȤʤ������
     */
    function _escapeHtml(&$vars, &$retval)
    {
        foreach (array_keys($vars) as $name) {
            if (is_array($vars[$name])) {
                $retval[$name] = array();
                Ethna_Util::_escapeHtml($vars[$name], $retval[$name]);
            } else if (!is_object($vars[$name])) {
                $retval[$name] = htmlspecialchars($vars[$name], ENT_QUOTES);
            }
        }
    }
    // }}}

    // {{{ encode_MIME
    /**
     *  ʸ�����MIME���󥳡��ɤ���
     *
     *  @access public
     *  @param  string  $string     MIME���󥳡��ɤ���ʸ����
     *  @return ���󥳡��ɺѤߤ�ʸ����
     */
    function encode_MIME($string)
    {
        $pos = 0;
        $split = 36;
        $_string = "";
        while ($pos < mb_strlen($string))
        {
            $tmp = mb_strimwidth($string, $pos, $split, "");
            $pos += mb_strlen($tmp);
            $_string .= (($_string)? ' ' : '') . mb_encode_mimeheader($tmp, 'ISO-2022-JP');
        }
        return $_string;
    }
    // }}}

    // {{{ getDirectLinkList
    /**
     *  Google����󥯥ꥹ�Ȥ��֤�
     *
     *  @access public
     *  @param  int     $total      ��������
     *  @param  int     $offset     ɽ�����ե��å�
     *  @param  int     $count      ɽ�����
     *  @return array   ��󥯾�����Ǽ��������
     */
    function getDirectLinkList($total, $offset, $count)
    {
        $direct_link_list = array();

        if ($total == 0) {
            return array();
        }

        // backwards
        $current = $offset - $count;
        while ($current > 0) {
            array_unshift($direct_link_list, $current);
            $current -= $count;
        }
        if ($offset != 0 && $current <= 0) {
            array_unshift($direct_link_list, 0);
        }

        // current
        $backward_count = count($direct_link_list);
        array_push($direct_link_list, $offset);

        // forwards
        $current = $offset + $count;
        for ($i = 0; $i < 10; $i++) {
            if ($current >= $total) {
                break;
            }
            array_push($direct_link_list, $current);
            $current += $count;
        }
        $forward_count = count($direct_link_list) - $backward_count - 1;

        $backward_count -= 4;
        if ($forward_count < 5) {
            $backward_count -= 5 - $forward_count;
        }
        if ($backward_count < 0) {
            $backward_count = 0;
        }

        // add index
        $n = 1;
        $r = array();
        foreach ($direct_link_list as $direct_link) {
            $v = array('offset' => $direct_link, 'index' => $n);
            $r[] = $v;
            $n++;
        }

        return array_splice($r, $backward_count, 10);
    }
    // }}}

    // {{{ getEra
    /**
     *  �������Ǥ�ǯ���֤�
     *
     *  @access public
     *  @param  int     $t      unix time
     *  @return string  ����(�����ʾ���null)
     */
    function getEra($t)
    {
        $tm = localtime($t, true);
        $year = $tm['tm_year'] + 1900;

        if ($year >= 1989) {
            return array('ʿ��', $year - 1988);
        } else if ($year >= 1926) {
            return array('����', $year - 1925);
        }

        return null;
    }
    // }}}

    // {{{ getImageExtName
    /**
     *  getimagesize()���֤����᡼�������פ��б������ĥ�Ҥ��֤�
     *
     *  @access public
     *  @param  int     $type   getimagesize()�ؿ����֤����᡼��������
     *  @return string  $type���б������ĥ��
     */
    function getImageExtName($type)
    {
        $ext_list = array(
            1   => 'gif',
            2   => 'jpg',
            3   => 'png',
            4   => 'swf',
            5   => 'psd',
            6   => 'bmp',
            7   => 'tiff',
            8   => 'tiff',
            9   => 'jpc',
            10  => 'jp2',
            11  => 'jpx',
            12  => 'jb2',
            13  => 'swc',
            14  => 'iff',
            15  => 'wbmp',
            16  => 'xbm',
        );

        return @$ext_list[$type];
    }
    // }}}

    // {{{ getRandom
    /**
     *  ������ʥϥå����ͤ���������
     *
     *  �褷�ƹ�®�ǤϤʤ��Τ����Ѥ��򤱤뤳��
     *
     *  @access public
     *  @param  int     $length �ϥå����ͤ�Ĺ��(��64)
     *  @return string  �ϥå�����
     */
    function getRandom($length = 64)
    {
        static $srand = false;

        if ($srand == false) {
            list($usec, $sec) = explode(' ', microtime());
            mt_srand((float) $sec + ((float) $usec * 100000) + getmypid());
            $srand = true;
        }

        $value = "";
        for ($i = 0; $i < 2; $i++) {
            // for Linux
            if (file_exists('/proc/net/dev')) {
                $rx = $tx = 0;
                $fp = fopen('/proc/net/dev', 'r');
                if ($fp != null) {
                    $header = true;
                    while (feof($fp) === false) {
                        $s = fgets($fp, 4096);
                        if ($header) {
                            $header = false;
                            continue;
                        }
                        $v = preg_split('/[:\s]+/', $s);
                        if (is_array($v) && count($v) > 10) {
                            $rx += $v[2];
                            $tx += $v[10];
                        }
                    }
                }
                $platform_value = $rx . $tx . mt_rand() . getmypid();
            } else {
                $platform_value = mt_rand() . getmypid();
            }
            $now = strftime('%Y%m%d %T');
            $time = gettimeofday();
            $v = $now . $time['usec'] . $platform_value . mt_rand(0, time());
            $value .= md5($v);
        }

        if ($length < 64) {
            $value = substr($value, 0, $length);
        }
        return $value;
    }
    // }}}

    // {{{ get2dArray
    /**
     *  1���������m x n�˺ƹ�������
     *
     *  @access public
     *  @param  array   $array  �����оݤ�1��������
     *  @param  int     $m      �������ǿ�
     *  @param  int     $order  $m��X���ȸ�������Y���ȸ�������(0:X�� 1:Y��)
     *  @return array   m x n�˺ƹ������줿����
     */
    function get2dArray($array, $m, $order)
    {
        $r = array();
        
        $n = intval(count($array) / $m);
        if ((count($array) % $m) > 0) {
            $n++;
        }
        for ($i = 0; $i < $n; $i++) {
            $elts = array();
            for ($j = 0; $j < $m; $j++) {
                if ($order == 0) {
                    // ���¤�(����$m�� �ġ�̵����)
                    $key = $i*$m+$j;
                } else {
                    // ���¤�(����̵���� �ġ�$m��)
                    $key = $i+$n*$j;
                }
                if (array_key_exists($key, $array) == false) {
                    $array[$key] = null;
                }
                $elts[] = $array[$key];
            }
            $r[] = $elts;
        }

        return $r;
    }
    // }}}

    // {{{ isAbsolute
    /**
     *  �ѥ�̾�����Хѥ����ɤ������֤�
     *
     *  port from File in PEAR (for BC)
     *
     *  @access public
     *  @param  string  $path
     *  @return bool    true:���Хѥ� false:���Хѥ�
     */
    function isAbsolute($path)
    {
        if (preg_match("/\.\./", $path)) {
            return false;
        }

        if (DIRECTORY_SEPARATOR == '/'
            && (substr($path, 0, 1) == '/' || substr($path, 0, 1) == '~')) {
            return true;
        } else if (DIRECTORY_SEPARATOR == '\\' && preg_match('/^[a-z]:\\\/i', $path)) {
            return true;
        }

        return false;
    }
    // }}}

    // {{{ mkdir
    /**
     *  mkdir -p
     *
     *  @access public
     *  @param  string  $dir    ��������ǥ��쥯�ȥ�
     *  @param  int     $mode   �ѡ��ߥå����
     *  @return bool    true:���� false:����
     *  @static
     */
    function mkdir($dir, $mode)
    {
        if (file_exists($dir)) {
            return is_dir($dir);
        }

        $parent = dirname($dir);
        if ($dir === $parent) {
            return true;
        }

        if (is_dir($parent) === false) {
            if (Ethna_Util::mkdir($parent, $mode) === false) {
                return false;
            }
        }

        return mkdir($dir, $mode) && Ethna_Util::chmod($dir, $mode);
    }
    // }}}

    // {{{ chmod
    /**
     *  �ե�����Υѡ��ߥå������ѹ�����
     */
    function chmod($file, $mode)
    {
        $st = stat($file);
        if (($st[2] & 0777) == $mode) {
            return true;
        }
        return chmod($file, $mode);
    }
    // }}}

    // {{{ purgeDir
    /**
     *  �ǥ��쥯�ȥ��Ƶ�Ū�˺������
     *  (����Ǽ��Ԥ��Ƥ����Ǥ���������Ǥ����ΤϤ��٤ƾä�)
     *
     *  @access public
     *  @param  string  $file   �������ե�����ޤ��ϥǥ��쥯�ȥ�
     *  @return bool    true:���� false:����
     *  @static
     */
    function purgeDir($dir)
    {
        if (file_exists($dir) === false) {
            return false;
        }
        if (is_dir($dir) === false) {
            return unlink($dir);
        }

        $dh = opendir($dir);
        if ($dh === false) {
            return false;
        }
        $ret = true;
        while (($entry = readdir($dh)) !== false) {
            if ($entry === '.' || $entry === '..') {
                continue;
            }
            $ret = $ret && Ethna_Util::purgeDir("{$dir}/{$entry}");
        }
        closedir($dh);
        if ($ret) {
            return rmdir($dir);
        } else {
            return false;
        }
    }
    // }}}

    // {{{ purgeTmp
    /**
     *  �ƥ�ݥ��ǥ��쥯�ȥ�Υե������������
     *
     *  @access public
     *  @param  string  $prefix     �ե�����Υץ�ե�����
     *  @param  int     $timeout    ����о�����(�á�60*60*1�ʤ�1����)
     */
    function purgeTmp($prefix, $timeout)
    {
        $c =& Ethna_Controller::getInstance();

        $dh = opendir($c->getDirectory('tmp'));
        if ($dh) {
            while (($file = readdir($dh)) !== false) {
                if ($file == '.' || $file == '..') {
                    continue;
                } else if (is_dir($c->getDirectory('tmp') . '/' . $file)) {
                    continue;
                } else if (strncmp($file, $prefix, strlen($prefix)) == 0) {
                    $f = $c->getDirectory('tmp') . "/" . $file;
                    $st = stat($f);
                    if ($st[9] + $timeout < time()) {
                        unlink($f);
                    }
                }
            }
            closedir($dh);
        }
    }
    // }}}

    // {{{ lockFile
    /**
     *  �ե�������å�����
     *
     *  @access public
     *  @param  string  $file       ��å�����ե�����̾
     *  @param  int     $mode       ��å��⡼��('r', 'rw')
     *  @param  int     $timeout    ��å��Ԥ������ॢ����(�á�0�ʤ�̵��)
     *  @return int     ��å��ϥ�ɥ�(false�ʤ饨�顼)
     */
    function lockFile($file, $mode, $timeout = 0)
    {
        if (file_exists($file) === false) {
            touch($file);
        }
        $lh = fopen($file, 'r');
        if ($lh == null) {
            return Ethna::raiseError(E_APP_READ, "�ե������ɤ߹��ߥ��顼[%s]", $file);
        }

        $lock_mode = $mode == 'r' ? LOCK_SH : LOCK_EX;

        for ($i = 0; $i < $timeout || $timeout == 0; $i++) {
            $r = flock($lh, $lock_mode | LOCK_NB);
            if ($r == true) {
                break;
            }
            sleep(1);
        }
        if ($timeout > 0 && $i == $timeout) {
            // timed out
            return Ethna::raiseError(E_APP_LOCK, "�ե������å��������顼[%s]", $file);
        }
 
        return $lh;
    }
    // }}}

    // {{{ unlockFile
    /**
     *  �ե�����Υ�å���������
     *
     *  @access public
     *  @param  int     $lh     ��å��ϥ�ɥ�
     */
    function unlockFile($lh)
    {
        fclose($lh);
    }
    // }}}

    // {{{ formatBacktrace
    /**
     *  �Хå��ȥ졼����ե����ޥåȤ����֤�
     *
     *  @access public
     *  @param  array   $bt     debug_backtrace()�ؿ��Ǽ��������Хå��ȥ졼��
     *  @return string  ʸ����˥ե����ޥåȤ��줿�Хå��ȥ졼��
     */
    function formatBacktrace($bt) 
    {
        $r = "";
        $i = 0;
        foreach ($bt as $elt) {
            $r .= sprintf("[%02d] %s:%d:%s.%s\n", $i,
                          isset($elt['file']) ? $elt['file'] : 'unknown file',
                          isset($elt['line']) ? $elt['line'] : 'unknown line',
                          isset($elt['class']) ? $elt['class'] : 'global',
                          $elt['function']);
            $i++;

            if (isset($elt['args']) == false || is_array($elt['args']) == false) {
                continue;
            }

            // �����Υ����
            foreach ($elt['args'] as $arg) {
                $r .= Ethna_Util::_formatBacktrace($arg);
            }
        }

        return $r;
    }

    /**
     *  �Хå��ȥ졼��������ե����ޥåȤ����֤�
     *
     *  @access private
     *  @param  string  $arg    �Хå��ȥ졼���ΰ���
     *  @param  int     $level  �Хå��ȥ졼���Υͥ��ȥ�٥�
     *  @param  int     $wrap   ���ԥե饰
     *  @return string  ʸ����˥ե����ޥåȤ��줿�Хå��ȥ졼��
     */
    function _formatBacktrace($arg, $level = 0, $wrap = true)
    {
        $pad = str_repeat("  ", $level);
        if (is_array($arg)) {
            $r = sprintf("     %s[array] => (\n", $pad);
            if ($level+1 > 4) {
                $r .= sprintf("     %s  *too deep*\n", $pad);
            } else {
                foreach ($arg as $key => $elt) {
                    $r .= Ethna_Util::_formatBacktrace($key, $level, false);
                    $r .= " => \n";
                    $r .= Ethna_Util::_formatBacktrace($elt, $level+1);
                }
            }
            $r .= sprintf("     %s)\n", $pad);
        } else if (is_object($arg)) {
            $r = sprintf("     %s[object]%s%s", $pad, get_class($arg), $wrap ? "\n" : "");
        } else {
            $r = sprintf("     %s[%s]%s%s", $pad, gettype($arg), $arg, $wrap ? "\n" : "");
        }

        return $r;
    }
    // }}}
}
// }}}
?>
