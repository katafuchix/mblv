<?php
// vim: foldmethod=marker
/**
 *  Ethna_Plugin_Generator.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin_Generator.php,v 1.4 2006/11/17 02:32:31 ichii386 Exp $
 */

// {{{ Ethna_Plugin_Generator
/**
 *  ������ȥ������ץ饰����
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Generator
{
    /** @var    object  Ethna_Controller    ������ȥ������˻Ȥ�����ȥ��� */
    var $ctl;

    /**
     *  ���󥹥ȥ饯��
     *
     *  @access public
     */
    function Ethna_Plugin_Generator(&$controller, $type, $name)
    {
        // Ethna_Generator��plugin���������Ȥ��˻Ȥä�����ȥ���
        // ex, add-project�Ǥ�Ethna_Controller, app-action�Ǥ�App_Controller
        $this->ctl =& $controller;
    }

    /**
     *  ������ȥ�ե���������Хѥ����褹��
     *
     *  @access private
     *  @param  string  $skel   ������ȥ�ե�����
     */
    function _resolveSkelfile($skel)
    {
        $file = realpath($skel);
        if (file_exists($file)) {
            return $file;
        }

        // ���ץ�� skel �ǥ��쥯�ȥ�
        $base = $this->ctl->getBasedir();
        $file = "$base/skel/$skel";
        if (file_exists($file)) {
            return $file;
        }

        // Ethna���Τ� skel �ǥ��쥯�ȥ�
        $base = dirname(dirname(dirname(__FILE__)));
        $file = "$base/skel/$skel";
        if (file_exists($file)) {
            return $file;
        }

        return false;
    }

    /**
     *  ������ȥ�ե�����˥ޥ����Ŭ�Ѥ��ƥե��������������
     *
     *  @access private
     *  @param  string  $skel       ������ȥ�ե�����
     *  @param  string  $entity     �����ե�����̾
     *  @param  array   $macro      �ִ��ޥ���
     *  @param  bool    $overwrite  ��񤭥ե饰
     *  @return bool    true:���ｪλ false:���顼
     */
    function _generateFile($skel, $entity, $macro, $overwrite = false)
    {
        if (file_exists($entity)) {
            if ($overwrite === false) {
                printf("file [%s] already exists -> skip\n", $entity);
                return true;
            } else {
                printf("file [%s] already exists, to be overwriten.\n", $entity);
            }
        }

        $resolved = $this->_resolveSkelfile($skel);
        if ($resolved === false) {
            printf("skelton file [%s] not found.\n", $skel);
            return false;
        } else {
            $skel = $resolved;
        }

        $rfp = fopen($skel, "r");
        if ($rfp == null) {
            return false;
        }
        $wfp = fopen($entity, "w");
        if ($wfp == null) {
            fclose($rfp);
            return false;
        }

        for (;;) {
            $s = fread($rfp, 4096);
            if (strlen($s) == 0) {
                break;
            }

            foreach ($macro as $k => $v) {
                $s = preg_replace("/{\\\$$k}/", $v, $s);
            }
            fwrite($wfp, $s);
        }

        fclose($wfp);
        fclose($rfp);

        $st = stat($skel);
        if (chmod($entity, $st[2]) == false) {
            return false;
        }

        printf("file generated [%s -> %s]\n", $skel, $entity);

        return true;
    }

    /**
     *  �桼������Υޥ�������ꤹ��(~/.ethna)
     *
     *  @access private
     */
    function _getUserMacro()
    {
        if (isset($_SERVER['USERPROFILE']) && is_dir($_SERVER['USERPROFILE'])) {
            $home = $_SERVER['USERPROFILE'];
        } else {
            $home = $_SERVER['HOME'];
        }

        if (is_file("$home/.ethna") == false) {
            return array();
        }

        $user_macro = parse_ini_file("$home/.ethna");
        return $user_macro;
    }
}
// }}}
?>
