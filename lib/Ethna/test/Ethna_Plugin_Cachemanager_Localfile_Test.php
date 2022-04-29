<?php
/**
 *  Ethna_Plugin_Cachemanager_Localfile_Test.php
 */

/**
 *  Ethna_Plugin_Cachemanager_Localfile���饹�Υƥ��ȥ�����
 *
 *  @access public
 */
class Ethna_Plugin_Cachemanager_Localfile_Test extends Ethna_UnitTestBase
{
    function rm($path){
        if (is_dir($path)) {
            if ($handle = opendir($path)) {
                while (false !== ($file = readdir($handle))) {
                    if ($file != "." && $file != "..") {
                        $this->rm("$path/$file");
                    }
                }
                closedir($handle);
            }
            if (!rmdir($path)) {
                printf("fail rmdir[$path]\n");
            }
        } else {
            if (!unlink($path)) {
                printf("fail unlink[$path]\n");
            }
        }
    }

    function testCachemanagerLocalfile()
    {
        $ctl =& Ethna_Controller::getInstance();
        $plugin =& $ctl->getPlugin();
        $cm = $plugin->getPlugin('Cachemanager', 'Localfile');

        // ʸ����Υ���å���
        $string_key = 'string_key';
        $string_value = "cache\ncontent";
        $cm->set($string_key, $string_value, mktime(0, 0, 0, 7, 1, 2000));
        $cache_string = $cm->get($string_key);
        $this->assertTrue($cm->isCached($string_key));
        $this->assertEqual(mktime(0, 0, 0, 7, 1, 2000), $cm->getLastModified($string_key));
        $this->assertTrue($string_value, $cache_string);

        // �����Υ���å��� + namespace
        $int_key = 'int_key';
        $int_value = 777;
        $namespace = 'test';
        $cm->set($int_key, $int_value, mktime(0, 0, 0, 7, 1, 2000), $namespace);
        $cache_int = $cm->get($int_key, mktime(0, 0, 0, 7, 1, 2000), $namespace);
        $this->assertTrue($cm->isCached($int_key, mktime(0, 0, 0, 7, 1, 2000), $namespace));
        $this->assertTrue($int_value, $cache_int);

        // ���֥������ȤΥ���å���
        $object_key = 'object_key';
        $object_value =& $cm;
        $cm->set($object_key, $object_value);
        $this->assertTrue($cm->isCached($object_key));
        // ����å��夵�줿���󥹥���
        $cache_object = $cm->get($object_key);
        $this->assertTrue($string_value, $cache_object->get($string_key));

        // ����å���Υ��ꥢ��ƥ���
        $cm->clear($object_key);
        $this->assertFalse($cm->isCached($object_key));

        // ����å��夵��Ƥ��ʤ��Τ˸ƤӽФ����Ȥ������
        $nocache_key = 'nocache_key';
        $cm->clear($nocache_key);
        $pear_error = $cm->get($nocache_key);
        $this->assertEqual(E_CACHE_NO_VALUE, $pear_error->getCode());
        $this->assertEqual('fopen failed', $pear_error->getMessage());

        // �ե�������ɤ߹��߸��¤��ʤ����
        Ethna_Util::chmod($cm->_getCacheFile(null, $string_key), 0222);
        $pear_error = $cm->get($string_key);
        $this->assertEqual(E_CACHE_NO_VALUE, $pear_error->getCode());
        $this->assertEqual('fopen failed', $pear_error->getMessage());
        Ethna_Util::chmod($cm->_getCacheFile(null, $string_key), 0666);

        // lifetime�ڤ�ξ��
        $pear_error = $cm->get($string_key, 1);
        $this->assertEqual(E_CACHE_EXPIRED, $pear_error->getCode());
        $this->assertEqual('fopen failed', $pear_error->getMessage());

        // �ǥ��쥯�ȥ�̾��Ʊ���ե����뤬���äƥǥ��쥯�ȥ꤬�����Ǥ��ʤ����
        $tmp_key = 'tmpkey';
        $tmp_dirname = $cm->_getCacheDir(null, $tmp_key);
        Ethna_Util::mkdir(dirname($tmp_dirname), 0777);
        $tmp_file = fopen($tmp_dirname, 'w');
        fclose($tmp_file);
        $pear_error = $cm->set($tmp_key, $string_value);
        $this->assertEqual(E_USER_WARNING, $pear_error->getCode());
        $this->assertEqual("mkdir($tmp_dirname) failed", $pear_error->getMessage());

        $this->rm($cm->backend->getTmpdir());

    }
}
?>
