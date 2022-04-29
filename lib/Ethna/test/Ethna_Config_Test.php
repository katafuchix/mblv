<?php
/**
 *  Ethna_Config_Test.php
 */

/**
 *  Ethna_Config���饹�Υƥ��ȥ�����
 *
 *  @access public
 */
class Ethna_Config_Test extends Ethna_UnitTestBase
{
    function setUp()
    {
        // etc�ǥ��쥯�ȥ����
        $this->ctl->directory['etc'] = dirname(__FILE__);
        $this->config = $this->ctl->getConfig();
        $this->filename = dirname(__FILE__) . '/ethna-ini.php';
    }

    function tearDown()
    {
        if (file_exists($this->filename)) {
            unlink($this->filename);
        }
    }

    function test_getConfigFile()
    {
        $result = $this->config->_getConfigFile(); 
        $this->assertEqual($result, $this->filename);
    }

    function test_update()
    {
        // ���λ����ǤϤޤ� ethna-ini.php ��¸�ߤ��ʤ�
        $result = $this->config->get('foo');
        $this->assertEqual($result, null);

        // Ethna_Config���֥������������
        $this->config->set('foo', 'bar');
        $result = $this->config->get('foo');
        $this->assertEqual($result, 'bar');

        // ethna-ini.php ����ư���������
        $this->config->update();

        // ethna-ini.php ���ɤ߹���ľ��
        $this->config->_getConfig();
        $result = $this->config->get('foo');
        $this->assertEqual($result, 'bar');

        // �ͤ���
        $this->config->set('foo', 'baz');
        $this->config->update();

        // �⤦�����ɤ߹���ľ��
        $this->config->_getConfig();
        $result = $this->config->get('foo');
        $this->assertEqual($result, 'baz');
    }
}
?>
