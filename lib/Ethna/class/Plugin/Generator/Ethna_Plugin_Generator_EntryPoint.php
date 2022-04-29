<?php
// vim: foldmethod=marker
/**
 *  Ethna_Plugin_Generator_EntryPoint.php
 *
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin_Generator_EntryPoint.php,v 1.1 2006/11/17 02:32:31 ichii386 Exp $
 */

// {{{ Ethna_Plugin_Generator_EntryPoint
/**
 *  ������ȥ��������饹
 *
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Generator_EntryPoint extends Ethna_Plugin_Generator
{
    /**
     *  ����ȥ�ݥ���ȤΥ�����ȥ����������
     *
     *  @access public
     *  @param  string  $skelton    ������ȥ�ե�����̾
     *  @param  int     $gateway    �����ȥ�����
     *  @return true|Ethna_Error    true:���� Ethna_Error:����
     */
    function &generate($action_name, $skelton = null, $gateway = GATEWAY_WWW)
    {
        // entity
        switch ($gateway) {
        case GATEWAY_WWW:
            $entity = sprintf("%s/%s.%s", $this->ctl->getDirectory('www'),
                              $action_name, $this->ctl->getExt('php'));
            break;
        case GATEWAY_CLI:
            $entity = sprintf("%s/%s.%s", $this->ctl->getDirectory('bin'),
                              $action_name, $this->ctl->getExt('php'));
            break;
        default:
            $ret =& Ethna::raiseError(
                'add-entry-point accepts only GATEWAY_WWW or GATEWAY_CLI.');
            return $ret;
        }

        // skelton
        if ($skelton === null) {
            switch ($gateway) {
            case GATEWAY_WWW:
                $skelton = 'skel.entry_www.php';
                break;
            case GATEWAY_CLI:
                $skelton = 'skel.entry_cli.php';
                break;
            }
        }

        // macro
        $macro = array();
        $macro['project_id'] = $this->ctl->getAppId();
        $macro['action_name'] = $action_name;
        $macro['dir_app'] = $this->ctl->getDirectory('app');

        // user macro
        $user_macro = $this->_getUserMacro();
        $macro = array_merge($macro, $user_macro);

        // generate
        if (file_exists($entity)) {
            printf("file [%s] already exists -> skip\n", $entity);
        } else if ($this->_generateFile($skelton, $entity, $macro) == false) {
            printf("[warning] file creation failed [%s]\n", $entity);
        } else {
            printf("action script(s) successfully created [%s]\n", $entity);
        }

        $true = true;
        return $true;
    }
}
// }}}
?>
