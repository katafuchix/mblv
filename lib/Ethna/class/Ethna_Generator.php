<?php
// vim: foldmethod=marker
/**
 *  Ethna_Generator.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Generator.php,v 1.2 2006/11/17 02:32:31 ichii386 Exp $
 */

// {{{ Ethna_Generator
/**
 *  ������ȥ��������饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Generator
{
    /**
     *  ������ȥ����������
     *
     *  @access public
     *  @param  string  $type       ���������о�
     *  @param  string  $app_dir    ���ץꥱ�������Υǥ��쥯�ȥ�
     *                              (null�ΤȤ��ϥ��ץꥱ�����������ꤷ�ʤ�)
     *  @param  mixed   residue     �ץ饰�����generate()�ˤ��Τޤ��Ϥ�
     *  @static
     */
    function &generate()
    {
        $arg_list   = func_get_args();
        $type       = array_shift($arg_list);
        $app_dir    = array_shift($arg_list);

        if ($app_dir === null) {
            $ctl =& Ethna_Handle::getEthnaController();
        } else {
            $ctl =& Ethna_Handle::getAppController($app_dir);
        }
        if (Ethna::isError($ctl)) {
            return $ctl;
        }

        $plugin_manager =& $ctl->getPlugin();
        if (Ethna::isError($plugin_manager)) {
            return $plugin_manager;
        }

        $generator =& $plugin_manager->getPlugin('Generator', $type);
        if (Ethna::isError($generator)) {
            return $generator;
        }
        
        // �����ϥץ饰�����¸�Ȥ���
        $ret = call_user_func_array(array(&$generator, 'generate'), $arg_list);
        return $ret;
    }

    /**
     *  ������ȥ��������
     *
     *  @access public
     *  @param  string  $type       ���������о�
     *  @param  string  $app_dir    ���ץꥱ�������Υǥ��쥯�ȥ�
     *                              (null�ΤȤ��ϥ��ץꥱ�����������ꤷ�ʤ�)
     *  @param  mixed   residue     �ץ饰�����remove()�ˤ��Τޤ��Ϥ�
     *  @static
     */
    function &remove()
    {
        $arg_list   = func_get_args();
        $type       = array_shift($arg_list);
        $app_dir    = array_shift($arg_list);

        if ($app_dir === null) {
            $ctl =& Ethna_Handle::getEthnaController();
        } else {
            $ctl =& Ethna_Handle::getAppController($app_dir);
        }
        if (Ethna::isError($ctl)) {
            return $ctl;
        }

        $plugin_manager =& $ctl->getPlugin();
        if (Ethna::isError($plugin_manager)) {
            return $plugin_manager;
        }

        $generator =& $plugin_manager->getPlugin('Generator', $type);
        if (Ethna::isError($generator)) {
            return $generator;
        }
        
        // �����ϥץ饰�����¸�Ȥ���
        $ret = call_user_func_array(array(&$generator, 'remove'), $arg_list);
        return $ret;
    }
}
// }}}
?>
