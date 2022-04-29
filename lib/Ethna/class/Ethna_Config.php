<?php
// vim: foldmethod=marker
/**
 *  Ethna_Config.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Config.php,v 1.6 2006/11/26 11:24:31 ichii386 Exp $
 */

// {{{ Ethna_Config
/**
 *  ���ꥯ�饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Config
{
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_Controller    controller���֥������� */
    var $controller;
    
    /** @var    array   �������� */
    var $config = null;

    /**#@-*/


    /**
     *  Ethna_Config���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Controller    &$controller    controller���֥�������
     */
    function Ethna_Config(&$controller)
    {
        $this->controller =& $controller;

        // ����ե�������ɤ߹���
        $r = $this->_getConfig();
        if (Ethna::isError($r)) {
            // ���λ����Ǥ�logging���Ͻ���ʤ�(Logger���֥������Ȥ���������Ƥ��ʤ�)
            $fp = fopen("php://stderr", "r");
            fputs($fp, sprintf("error occured while reading config file(s) [%s]\n"), $r->getInfo(0));
            fclose($fp);
            $this->controller->fatal();
        }
    }

    /**
     *  �����ͤؤΥ�������(R)
     *
     *  @access public
     *  @param  string  $key    �������̾
     *  @return string  ������
     */
    function get($key = null)
    {
        if (is_null($key)) {
            return $this->config;
        }
        if (isset($this->config[$key]) == false) {
            return null;
        }
        return $this->config[$key];
    }

    /**
     *  �����ͤؤΥ�������(W)
     *
     *  @access public
     *  @param  string  $key    �������̾
     *  @param  string  $value  ������
     */
    function set($key, $value)
    {
        $this->config[$key] = $value;
    }

    /**
     *  ����ե�����򹹿�����
     *
     *  @access public
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function update()
    {
        return $this->_setConfig();
    }

    /**
     *  ����ե�������ɤ߹���
     *
     *  @access private
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function _getConfig()
    {
        $config = array();
        $file = $this->_getConfigFile();
        if (file_exists($file)) {
            $lh = Ethna_Util::lockFile($file, 'r');
            if (Ethna::isError($lh)) {
                return $lh;
            }

            include($file);

            Ethna_Util::unlockFile($lh);
        }

        // �ǥե����������
        if (isset($_SERVER['HTTP_HOST']) && isset($config['url']) == false) {
            $config['url'] = sprintf("http://%s", $_SERVER['HTTP_HOST']);
        }
        if (isset($config['dsn']) == false) {
            $config['dsn'] = "";
        }
        if (isset($config['log_facility']) == false) {
            $config['log_facility'] = "";
        }
        if (isset($config['log_level']) == false) {
            $config['log_level'] = "";
        }
        if (isset($config['log_option']) == false) {
            $config['log_option'] = "";
        }

        $this->config = $config;

        return 0;
    }

    /**
     *  ����ե�����˽񤭹���
     *
     *  @access private
     *  @return mixed   0:���ｪλ Ethna_Error:���顼
     */
    function _setConfig()
    {
        $file = $this->_getConfigFile();

        $lh = Ethna_Util::lockFile($file, 'w');
        if (Ethna::isError($lh)) {
            return $lh;
        }

        $fp = fopen($file, 'w');
        if ($fp == null) {
            return Ethna::raiseError(E_APP_WRITE, "�ե�����񤭹��ߥ��顼[%s]", $file);
        }
        fwrite($fp, "<?php\n");
        fwrite($fp, sprintf("/*\n * %s\n *\n * update: %s\n */\n", basename($file), strftime('%Y/%m/%d %H:%M:%S')));
        fwrite($fp, "\$config = array(\n");
        foreach ($this->config as $key => $value) {
            $this->_setConfigValue($fp, $key, $value, 0);
        }
        fwrite($fp, ");\n?>\n");
        fclose($fp);

        Ethna_Util::unlockFile($lh);

        return 0;
    }

    /**
     *  ����ե�����������ͤ�񤭹���
     *
     *  @access private
     */
    function _setConfigValue($fp, $key, $value, $level)
    {
        fputs($fp, sprintf("%s'%s' => ", str_repeat("    ", $level+1), $key));
        if (is_array($value)) {
            fputs($fp, sprintf("array(\n"));
            foreach ($value as $k => $v) {
                $this->_setConfigValue($fp, $k, $v, $level+1);
            }
            fputs($fp, sprintf("%s),\n", str_repeat("    ", $level+1)));
        } else {
            fputs($fp, sprintf("'%s',\n", $value));
        }
    }

    /**
     *  ����ե�����̾���������
     *
     *  @access private
     *  @return string  ����ե�����ؤΥե�ѥ�̾
     */
    function _getConfigFile()
    {
        return $this->controller->getDirectory('etc') . '/' . strtolower($this->controller->getAppId()) . '-ini.php';
    }
}
// }}}
?>
