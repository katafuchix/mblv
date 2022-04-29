<?php
// vim: foldmethod=marker tabstop=4 shiftwidth=4 autoindent
/**
 *  Ethna_CacheManager.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_CacheManager.php,v 1.4 2006/07/19 05:22:37 fujimoto Exp $
 */

/**
 *  ����å���ޥ͡����㥯�饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_CacheManager
{
    /**
     *  Ethna_CacheMaanger���饹�Υ��󥹥��󥹤��������
     *
     *  @access public
     *  @param  string  $type   ����å��奿����('localfile', 'memcache'...)
     *  @return object Ethna_CacheMaanger   Ethna_CacheManager���֥�������
     */
    function &getInstance($type)
    {
        $controller =& Ethna_Controller::getInstance();
        $plugin =& $controller->getPlugin();

        $cache_manager =& $plugin->getPlugin('Cachemanager', ucfirst($type));

        return $cache_manager;
    }
}
?>
