<?php
/**
 *  Ethna_Plugin_Logwriter_File_Test.php
 */

/**
 *  Ethna_Plugin_Logwriter_File���饹�Υƥ��ȥ�����
 *
 *  @access public
 */
class Ethna_Plugin_Logwriter_File_Test extends Ethna_UnitTestBase
{
    function testLogwriterFile()
    {
        $ctl =& Ethna_Controller::getInstance();
        $plugin =& $ctl->getPlugin();
        $lw = $plugin->getPlugin('Logwriter', 'File');

        $option = array(
                        'ident'    => 'hoge',
                        'facility' => 'mail',
                        'file'     => 'logfile',
                        'mode'     => '0666',
                        );
        $lw->setOption($option);

        $level = LOG_WARNING;
        $message = 'comment';
        $lw->begin();
        $_before_size = filesize($option['file']);
        $this->assertTrue(file_exists($option['file']));
        $lw->log($level, $message);
        $lw->end();
        clearstatcache();
        $_after_size = filesize($option['file']);
        // ������Ϥ����ե�����Υ��������礭���ʤä����Ȥ��ǧ
        $this->assertTrue($_before_size < $_after_size);

        $file = file($option['file']);
        $line_count = count($file); // �Ǹ���ɵ��������ֹ�
        // ǯ������ʬ�ΰ��ס��äΥե����ޥåȡ�ID������٥롦��å������ΰ��פ��ǧ
        $this->assertTrue(preg_match('/^'.preg_quote(strftime('%Y/%m/%d %H:%M:'), '/')
                            .'[0-5][0-9] '
                            .preg_quote($option['ident'].'('
                                        .$lw->_getLogLevelName($level).'): '
                                        .$message)
                            .'/', trim($file[$line_count - 1])));


        $option = array(
                        'pid'      => true,
                        'ident'    => 'hoge',
                        'facility' => 'mail',
                        'file'     => 'logfile',
                        'mode'     => '0666',
                        );
        $lw->setOption($option);

        $level = LOG_WARNING;
        $message = 'comment';
        $lw->begin();
        $_before_size = filesize($option['file']);
        $this->assertTrue(file_exists($option['file']));
        $lw->log($level, $message);
        $lw->end();
        clearstatcache();
        $_after_size = filesize($option['file']);
        // ������Ϥ����ե�����Υ��������礭���ʤä����Ȥ��ǧ
        $this->assertTrue($_before_size < $_after_size);

        $file = file($option['file']);
        $line_count = count($file); // �Ǹ���ɵ��������ֹ�
        // ǯ������ʬ�ΰ��ס��äΥե����ޥåȡ�ID��PID������٥롦��å������ΰ��פ��ǧ
        $this->assertTrue(preg_match('/^'.preg_quote(strftime('%Y/%m/%d %H:%M:'), '/')
                            .'[0-5][0-9] '
                            .preg_quote($option['ident'].'['.getmypid().']('
                                        .$lw->_getLogLevelName($level).'): '
                                        .$message)
                            .'/', trim($file[$line_count - 1])));

        unlink($option['file']);

    }
}
?>
