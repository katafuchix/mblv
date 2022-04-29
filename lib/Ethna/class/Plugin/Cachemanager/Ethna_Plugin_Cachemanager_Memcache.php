<?php
// vim: foldmethod=marker tabstop=4 shiftwidth=4 autoindent
/**
 *  Ethna_Plugin_Cachemanager_Memcache.php
 *
 *  - Point Cut�������Ȼפä���
 *  - ����å��奭���ˤ�250ʸ���ޤǤ������ѤǤ��ʤ��Τ���դ��Ʋ�����
 *
 *  @todo   �͡��ॹ�ڡ���/����å��奭��Ĺ�Υ��顼�ϥ�ɥ��
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin_Cachemanager_Memcache.php,v 1.4 2006/11/17 08:41:53 ichii386 Exp $
 */

/**
 *  ����å���ޥ͡����㥯�饹(memcache��)
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Cachemanager_Memcache extends Ethna_Plugin_Cachemanager
{
    /**#@+  @access private */

    /** @var    object  MemCache    MemCache���֥������� */
    var $memcache = null;

    /** @var bool ���̥ե饰 */
    var $compress = true;

    /**#@-*/

    /**
     *  Ethna_Plugin_Cachemanager_Memcache���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     */
    function Ethna_Plugin_Cachemanager_Memcache()
    {
        parent::Ethna_Plugin_Cachemanager();
        $this->memcache_pool = array();
    }

    /**
     *  memcache����å��奪�֥������Ȥ���������������
     *
     *  @access protected
     */
    function _getMemcache($cache_key, $namespace = null)
    {
        $retry = $this->config->get('memcache_retry');
        if ($retry == "") {
            $retry = 3;
        }
        $timeout = $this->config->get('memcache_timeout');
        if ($timeout == "") {
            $timeout = 3;
        }
        $r = false;

        list($host, $port) = $this->_getMemcacheInfo($cache_key, $namespace);
        if (isset($this->memcache_pool["$host:$port"])) {
            // activate
            $this->memcache = $this->memcache_pool["$host:$port"];
            return $this->memcache;
        }
        $this->memcache_pool["$host:$port"] =& new MemCache();

        while ($retry > 0) {
            if ($this->config->get('memcache_use_connect')) {
                $r = $this->memcache_pool["$host:$port"]->connect($host, $port, $timeout);
            } else {
                $r = $this->memcache_pool["$host:$port"]->pconnect($host, $port, $timeout);
            }
            if ($r) {
                break;
            }
            sleep(1);
            $retry--;
        }
        if ($r == false) {
            trigger_error("memcache: connection failed");
            $this->memcache_pool["$host:$port"] = null;
        }

        $this->memcache = $this->memcache_pool["$host:$port"];
        return $this->memcache;
    }

    /**
     *  memcache��³������������
     *
     *  @access protected
     *  @todo   $cache_key����$index�������ˡ���ѹ��Ǥ���褦�ˤ���
     */
    function _getMemcacheInfo($cache_key, $namespace)
    {
        $namespace = is_null($namespace) ? $this->namespace : $namespace;

        $memcache_info = $this->config->get('memcache');
        $default_memcache_host = $this->config->get('memcache_host');
        if ($default_memcache_host == "") {
            $default_memcache_host = "localhost";
        }
        $default_memcache_port = $this->config->get('memcache_port');
        if ($default_memcache_port == "") {
            $default_memcache_port = 11211;
        }
        if ($memcache_info == null || isset($memcache_info[$namespace]) == false) {
            return array($default_memcache_host, $default_memcache_port);
        }

        // namespace/cache_key����³������
        $n = count($memcache_info[$namespace]);

        $index = $cache_key % $n;
        return array(
            isset($memcache_info[$namespace][$index]['memcache_host']) ?
                $memcache_info[$namespace][$index]['memcache_host'] :
                'localhost',
            isset($memcache_info[$namespace][$index]['memcache_port']) ?
                $memcache_info[$namespace][$index]['memcache_port'] :
                11211,
        );

        // for safe
        return array($default_memcache_host, $default_memcache_port);
    }

    /**
     *  ����å�������ꤵ�줿�ͤ��������
     *
     *  ����å�����ͤ����ꤵ��Ƥ�����ϥ���å�����
     *  ������ͤȤʤ롣����å�����ͤ�̵������lifetime
     *  ��᤮�Ƥ����硢���顼��ȯ����������PEAR_Error
     *  ���֥������Ȥ�����ͤȤʤ롣
     *
     *  @access public
     *  @param  string  $key        ����å��奭��
     *  @param  int     $lifetime   ����å���ͭ������
     *  @param  string  $namespace  ����å���͡��ॹ�ڡ���
     *  @return array   ����å�����
     */
    function get($key, $lifetime = null, $namespace = null)
    {
        $this->_getMemcache($key, $namespace);
        if ($this->memcache == null) {
            return Ethna::raiseError('memcache server not available', E_CACHE_NO_VALUE);
        }

        $namespace = is_null($namespace) ? $this->namespace : $namespace;

        $cache_key = $this->_getCacheKey($namespace, $key);
        if ($cache_key == null) {
            return Ethna::raiseError('invalid cache key (too long?)', E_CACHE_NO_VALUE);
        }

        $value = $this->memcache->get($cache_key);
        if ($value == null) {
            return Ethna::raiseError('no such cache', E_CACHE_NO_VALUE);
        }
        $time = $value['time'];
        $data = $value['data'];

        // �饤�ե���������å�
        if (is_null($lifetime) == false) {
            if (($time+$lifetime) < time()) {
                return Ethna::raiseError('lifetime expired', E_CACHE_EXPIRED);
            }
        }

        return $data;
    }

    /**
     *  ����å���κǽ������������������
     *
     *  @access public
     *  @param  string  $key        ����å��奭��
     *  @param  string  $namespace  ����å���͡��ॹ�ڡ���
     *  @return int     �ǽ���������(unixtime)
     */
    function getLastModified($key, $namespace = null)
    {
        $this->_getMemcache($key, $namespace);
        if ($this->memcache == null) {
            return Ethna::raiseError('memcache server not available', E_CACHE_NO_VALUE);
        }

        $namespace = is_null($namespace) ? $this->namespace : $namespace;

        $cache_key = $this->_getCacheKey($namespace, $key);
        if ($cache_key == null) {
            return Ethna::raiseError('invalid cache key (too long?)', E_CACHE_NO_VALUE);
        }

        $value = $this->memcache->get($cache_key);

        return $value['time'];
    }

    /**
     *  �ͤ�����å��夵��Ƥ��뤫�ɤ������������
     *
     *  @access public
     *  @param  string  $key        ����å��奭��
     *  @param  int     $lifetime   ����å���ͭ������
     *  @param  string  $namespace  ����å���͡��ॹ�ڡ���
     */
    function isCached($key, $lifetime = null, $namespace = null)
    {
        $r = $this->get($key, $lifetime, $namespace);

        return PEAR::isError($r) ? false: true;
    }

    /**
     *  ����å�����ͤ����ꤹ��
     *
     *  @access public
     *  @param  string  $key        ����å��奭��
     *  @param  mixed   $value      ����å�����
     *  @param  int     $timestamp  ����å���ǽ���������(unixtime)
     *  @param  string  $namespace  ����å���͡��ॹ�ڡ���
     */
    function set($key, $value, $timestamp = null, $namespace = null)
    {
        $this->_getMemcache($key, $namespace);
        if ($this->memcache == null) {
            return Ethna::raiseError('memcache server not available', E_CACHE_NO_VALUE);
        }

        $namespace = is_null($namespace) ? $this->namespace : $namespace;

        $cache_key = $this->_getCacheKey($namespace, $key);
        if ($cache_key == null) {
            return Ethna::raiseError('invalid cache key (too long?)', E_CACHE_NO_VALUE);
        }

        $time = $timestamp ? $timestamp : time();
        $this->memcache->set($cache_key, array('time' => $time, 'data' => $value), $this->compress ? MEMCACHE_COMPRESSED : null);
    }

    /**
     *  ����å����ͤ�������
     *
     *  @access public
     *  @param  string  $key        ����å��奭��
     *  @param  string  $namespace  ����å���͡��ॹ�ڡ���
     */
    function clear($key, $namespace = null)
    {
        $this->_getMemcache($key, $namespace);
        if ($this->memcache == null) {
            return Ethna::raiseError('memcache server not available', E_CACHE_NO_VALUE);
        }

        $namespace = is_null($namespace) ? $this->namespace : $namespace;

        $cache_key = $this->_getCacheKey($namespace, $key);
        if ($cache_key == null) {
            return Ethna::raiseError('invalid cache key (too long?)', E_CACHE_NO_VALUE);
        }

        $this->memcache->delete($cache_key, -1);
    }

    /**
     *  ����å���ǡ������å�����
     *
     *  @access public
     *  @param  string  $key        ����å��奭��
     *  @param  int     $timeout    ��å������ॢ����
     *  @param  string  $namespace  ����å���͡��ॹ�ڡ���
     *  @return bool    true:���� false:����
     */
    function lock($key, $timeout = 5, $namespace = null)
    {
        $this->_getMemcache($key, $namespace);
        if ($this->memcache == null) {
            return Ethna::raiseError('memcache server not available', E_CACHE_LOCK_ERROR);
        }

        // ��å��ѥ���å���ǡ��������Ѥ���
        $namespace = is_null($namespace) ? $this->namespace : $namespace;
        $cache_key = "lock::" . $this->_getCacheKey($namespace, $key);
        $lock_lifetime = 30;

        do {
            $r = $this->memcache->add($cache_key, true, false, $lock_lifetime);
            if ($r != false) {
                break;
            }
            sleep(1);
            $timeout--;
        } while ($timeout > 0);

        if ($r == false) {
            return Ethna::raiseError('lock timeout', E_CACHE_LOCK_TIMEOUT);
        }

        return true;
    }

    /**
     *  ����å���ǡ����Υ�å���������
     *
     *  @access public
     *  @param  string  $key        ����å��奭��
     *  @param  string  $namespace  ����å���͡��ॹ�ڡ���
     *  @return bool    true:���� false:����
     */
    function unlock($key, $namespace = null)
    {
        $this->_getMemcache($key, $namespace);
        if ($this->memcache == null) {
            return Ethna::raiseError('memcache server not available', E_CACHE_LOCK_ERROR);
        }

        $namespace = is_null($namespace) ? $this->namespace : $namespace;
        $cache_key = "lock::" . $this->_getCacheKey($namespace, $key);

        $this->memcache->delete($cache_key, -1);
    }

    /**
     *  �͡��ॹ�ڡ������饭��å��奭������������
     *
     *  @access private
     */
    function _getCacheKey($namespace, $key)
    {
        // ������˽������...
        $key = str_replace(":", "_", $key);
        $cache_key = $namespace . "::" . $key;
        if (strlen($cache_key) > 250) {
            return null;
        }
        return $cache_key;
    }

    /**
     * ���̥ե饰��Ω�Ƥ�
     *
     * MySQL�ʤɤ����Ĥ��λҥ��饹��ͭ��
     * 
     * @access public
     * @param bool $flag �ե饰
     */
    function setCompress($flag) {
        $this->compress = $flag;
    }
}
?>
