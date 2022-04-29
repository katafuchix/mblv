<?php
// vim: foldmethod=marker
/**
 *  Ethna_Plugin_Generator_ActionTest.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin_Generator_ActionTest.php,v 1.4 2006/11/17 02:32:31 ichii386 Exp $
 */

// {{{ Ethna_Plugin_Generator_ActionTest
/**
 *  ������ȥ��������饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Generator_ActionTest extends Ethna_Plugin_Generator
{
    /**
     *  ����������ѥƥ��ȤΥ�����ȥ����������
     *  (���ߤΤȤ��� GATEWAY_WWW �Τ��б�)
     *
     *  @access public
     *  @param  string  $action_name    ���������̾
     *  @param  string  $skelton        ������ȥ�ե�����̾
     *  @param  int     $gateway        �����ȥ�����
     *  @return true|Ethna_Error        true:���� Ethna_Error:����
     */
    function &generate($action_name, $skelton = null, $gateway = GATEWAY_WWW)
    {
        $action_dir = $this->ctl->getActiondir($gateway);
        $action_class = $this->ctl->getDefaultActionClass($action_name, $gateway);
        $action_form = $this->ctl->getDefaultFormClass($action_name, $gateway);
        $action_path = $this->ctl->getDefaultActionPath($action_name . 'Test');

        // entity
        $entity = $action_dir . $action_path;
        Ethna_Util::mkdir(dirname($entity), 0755);

        // skelton
        if ($skelton === null) {
            $skelton = 'skel.action_test.php';
        }

        // macro
        $macro = array();
        $macro['project_id'] = $this->ctl->getAppId();
        $macro['action_name'] = $action_name;
        $macro['action_class'] = $action_class;
        $macro['action_form'] = $action_form;
        $macro['action_path'] = $action_path;

        // user macro
        $user_macro = $this->_getUserMacro();
        $macro = array_merge($macro, $user_macro);


        // generate
        if (file_exists($entity)) {
            printf("file [%s] already exists -> skip\n", $entity);
        } else if ($this->_generateFile($skelton, $entity, $macro) == false) {
            printf("[warning] file creation failed [%s]\n", $entity);
        } else {
            printf("action test(s) successfully created [%s]\n", $entity);
        }

        $true = true;
        return $true;
    }
}
// }}}
?>