<?php
// vim: foldmethod=marker
/**
 *  Ethna_Plugin_Generator_Plugin.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin_Generator_Plugin.php,v 1.7 2007/01/04 13:58:48 ichii386 Exp $
 */

// {{{ Ethna_Plugin_Generator_Plugin
/**
 *  ������ȥ��������饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Generator_Plugin extends Ethna_Plugin_Generator
{
    /**
     *  �ץ饰�������������
     *
     *  @access public
     *  @param  string  $type       �ץ饰�����$type
     *  @param  string  $name       �ץ饰�����$name
     *  @param  bool    $overwrite  ��񤭥��ץ����
     *  @return bool    true:���� false:����
     */
    function generate($type, $name, $overwrite = false)
    {
        $appid = $this->ctl->getAppId();
        $plugin =& $this->ctl->getPlugin();

        list($class, $plugin_dir, $plugin_path) = $plugin->getPluginNaming($type, $name, $appid);

        $macro = array();
        $macro['project_id'] = $appid;
        $user_macro = $this->_getUserMacro();
        $macro = array_merge($macro, $user_macro);

        Ethna_Util::mkdir(dirname("$plugin_dir/$plugin_path"), 0755);

        if ($this->_generateFile("skel.plugin.{$type}_{$name}.php", "$plugin_dir/$plugin_path", $macro, $overwrite) == false) {
            printf("[warning] file creation failed [%s]\n", "$plugin_dir/$plugin_path");
        } else {
            printf("plugin script(s) successfully created [%s]\n", "$plugin_dir/$plugin_path");
        }
    }

    /**
     *  �ץ饰�����ä�
     *
     *  @access public
     *  @param  string  $type       �ץ饰�����$type
     *  @param  string  $name       �ץ饰�����$name
     *  @return bool    true:���� false:����
     */
    function remove($type, $name)
    {
        $appid = $this->ctl->getAppId();
        $plugin =& $this->ctl->getPlugin();

        list($class, $plugin_dir, $plugin_path) = $plugin->getPluginNaming($type, $name, $appid);

        $macro = array();
        $macro['project_id'] = $appid;
        $user_macro = $this->_getUserMacro();
        $macro = array_merge($macro, $user_macro);

        if (file_exists("$plugin_dir/$plugin_path")) {
            unlink("$plugin_dir/$plugin_path");
            printf("file [%s] successfully unlinked\n", "$plugin_dir/$plugin_path");
        } else {
            printf("file [%s] not found\n", "$plugin_dir/$plugin_path");
        }
    }
}
// }}}
?>
