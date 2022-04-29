<?php
/**
 *  ethna_run_test.php
 *
 *  Ethna Test Runner
 *
 *  @author     Kazuhiro Hosoi <hosoi@gree.co.jp>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: ethna_run_test.php,v 1.9 2007/01/04 13:58:48 ichii386 Exp $
 */

/** ���ץꥱ�������١����ǥ��쥯�ȥ� */
define('BASE', dirname(dirname(__FILE__)));

/** include_path������(����test runner������ǥ��쥯�ȥ���ɲ�) */
ini_set('include_path', dirname(BASE) . PATH_SEPARATOR . ini_get('include_path'));

/** Ethna��Ϣ���饹�Υ��󥯥롼�� */
require_once 'Ethna/Ethna.php';

/** SimpleTest�Υ��󥯥롼�� */
require_once 'simpletest/unit_tester.php';
require_once 'simpletest/reporter.php';
require_once 'Ethna/test/TextDetailReporter.php';
require_once 'Ethna/test/Ethna_UnitTestBase.php';

/** �ƥ��ȥ�����������ǥ��쥯�ȥ� */
$test_dir = ETHNA_BASE . '/test';

$test = &new GroupTest('Ethna All tests');

// �ƥ��ȥ������Υե�����ꥹ�Ȥ����
require_once 'Console/Getopt.php';
$args = Console_Getopt::readPHPArgv();
list($args, $opts) = Console_Getopt::getopt2($args, '', array());
array_shift($opts);
if (count($opts) > 0) {
    $file_list = $opts;
} else {
    $file_list = getFileList($test_dir);
}

// �ƥ��ȥ���������Ͽ
foreach ($file_list as $file) {
    $test->addTestFile($file);
}

// ��̤򥳥ޥ�ɥ饤��˽���
//$test->run(new TextReporter());
$test->run(new TextDetailReporter());

//{{{ getFileList
/**
 * getFileList
 *
 * @param string $dir_path
 */
function getFileList($dir_path)
{
    $file_list = array();

    $dir = opendir($dir_path);

    if ($dir == false) {
        return false;
    }

    while($file_path = readdir($dir)) {

        $full_path = $dir_path . '/'. $file_path;

        if (is_file($full_path)){

            // �ƥ��ȥ������Υե�����Τ��ɤ߹���
            if (preg_match('/^(Ethna_)(.*)(_Test.php)$/',$file_path,$matches)) {
                $file_list[] = $full_path;
            }

        // ���֥ǥ��쥯�ȥ꤬������ϡ��Ƶ�Ū���ɤ߹��ࡥ
        // "."�ǻϤޤ�ǥ��쥯�ȥ���ɤ߹��ޤʤ�.
        } else if (is_dir($full_path) && !preg_match('/^\./',$file_path,$matches)) {

            $file_list = array_merge($file_list,getFileList($full_path));
        }
    }

    closedir($dir);
    return $file_list;
}
//}}}
?>
