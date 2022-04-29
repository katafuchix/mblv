<?php
/**
 *  Ethna_Plugin_Validator_Custom_Test.php
 */

/**
 *  Ethna_Plugin_Validator_Custom���饹�Υƥ��ȥ�����
 *
 *  @access public
 */
class Ethna_Plugin_Validator_Custom_Test extends Ethna_UnitTestBase
{
    function testCheckValidatorCustom()
    {
        $ctl =& Ethna_Controller::getInstance();
        $plugin =& $ctl->getPlugin();
        $vld = $plugin->getPlugin('Validator', 'Custom');


        // mailaddress������������å��Υƥ���
        $form_string = array(
                             'type'          => VAR_TYPE_STRING,
                             'required'      => true,
                             'custom' => 'checkMailaddress',
                             );
        $vld->af->form_vars['namae_string'] = 'hoge@fuga.net';
        $this->assertTrue($vld->validate('namae_string', '', $form_string));

        $vld->af->form_vars['namae_string'] = '-hoge@fuga.net';
        $this->assertTrue($vld->validate('namae_string', '', $form_string));

        $vld->af->form_vars['namae_string'] = '.hoge@fuga.net';
        $this->assertTrue($vld->validate('namae_string', '', $form_string));

        $vld->af->form_vars['namae_string'] = '+hoge@fuga.net';
        $this->assertTrue($vld->validate('namae_string', '', $form_string));

        // @���ʤ�
        $vld->af->form_vars['namae_string'] = 'hogefuga.net';
        $this->assertFalse($vld->validate('namae_string', '', $form_string));

        // @������ʸ�����ʤ�
        $vld->af->form_vars['namae_string'] = '@hogefuga.net';
        $this->assertFalse($vld->validate('namae_string', '', $form_string));

        // @�θ��ʸ�����ʤ�
        $vld->af->form_vars['namae_string'] = 'hogefuga.net@';
        $this->assertFalse($vld->validate('namae_string', '', $form_string));

        // ��Ƭʸ����������Ƥ��ʤ�
        $vld->af->form_vars['namae_string'] = '%hoge@fuga.net';
        $this->assertFalse($vld->validate('namae_string', '', $form_string));

        // ����ʸ����������Ƥ��ʤ�
        $vld->af->form_vars['namae_string'] = 'hoge@fuga.net.';
        $this->assertFalse($vld->validate('namae_string', '', $form_string));



        $form_boolean = array(
                              'type'          => VAR_TYPE_BOOLEAN,
                              'required'      => true,
                              'custom' => 'checkBoolean',
                              );
        $vld->af->form_vars['namae_boolean'] = true;
        $this->assertTrue($vld->validate('namae_boolean', '', $form_boolean));

        $vld->af->form_vars['namae_boolean'] = false;
        $this->assertTrue($vld->validate('namae_boolean', '', $form_boolean));

        $vld->af->form_vars['namae_boolean'] = '';
        $this->assertTrue($vld->validate('namae_boolean', '', $form_boolean));

        $vld->af->form_vars['namae_boolean'] = array();
        $this->assertTrue($vld->validate('namae_boolean', '', $form_boolean));

        $vld->af->form_vars['namae_boolean'] = array(true);
        $this->assertTrue($vld->validate('namae_boolean', '', $form_boolean));

        // 0,1�ʳ�����
        $vld->af->form_vars['namae_boolean'] = 3;
        $this->assertFalse($vld->validate('namae_boolean', '', $form_boolean));




        $form_url = array(
                          'type'          => VAR_TYPE_STRING,
                          'required'      => true,
                          'custom' => 'checkURL',
                          );
        $vld->af->form_vars['namae_url'] = 'http://uga.net';
        $this->assertTrue($vld->validate('namae_url', '', $form_url));

        $vld->af->form_vars['namae_url'] = 'https://uga.net';
        $this->assertTrue($vld->validate('namae_url', '', $form_url));

        $vld->af->form_vars['namae_url'] = 'ftp://uga.net';
        $this->assertTrue($vld->validate('namae_url', '', $form_url));

        $vld->af->form_vars['namae_url'] = 'http://';
        $this->assertTrue($vld->validate('namae_url', '', $form_url));

        $vld->af->form_vars['namae_url'] = '';
        $this->assertTrue($vld->validate('namae_url', '', $form_url));

        // '/'��­��ʤ�
        $vld->af->form_vars['namae_url'] = 'http:/';
        $this->assertFalse($vld->validate('namae_url', '', $form_url));

        // ��Ƭ�����ʤ�
        $vld->af->form_vars['namae_url'] = 'hoge@fuga.net';
        $this->assertFalse($vld->validate('namae_url', '', $form_url));




        $form_string = array(
                             'type'          => VAR_TYPE_STRING,
                             'required'      => true,
                             'custom' => 'checkVendorChar',
                             );
        $vld->af->form_vars['namae_string'] = 'http://uga.net';
        $this->assertTrue($vld->validate('namae_string', '', $form_string));

        $vld->af->form_vars['namae_string'] = chr(0x00);
        $this->assertTrue($vld->validate('namae_string', '', $form_string));

        $vld->af->form_vars['namae_string'] = chr(0x79);
        $this->assertTrue($vld->validate('namae_string', '', $form_string));

        $vld->af->form_vars['namae_string'] = chr(0x80);
        $this->assertTrue($vld->validate('namae_string', '', $form_string));

        $vld->af->form_vars['namae_string'] = chr(0x8e);
        $this->assertTrue($vld->validate('namae_string', '', $form_string));

        $vld->af->form_vars['namae_string'] = chr(0x8f);
        $this->assertTrue($vld->validate('namae_string', '', $form_string));

        $vld->af->form_vars['namae_string'] = chr(0xae);
        $this->assertTrue($vld->validate('namae_string', '', $form_string));

        $vld->af->form_vars['namae_string'] = chr(0xf8);
        $this->assertTrue($vld->validate('namae_string', '', $form_string));

        $vld->af->form_vars['namae_string'] = chr(0xfd);
        $this->assertTrue($vld->validate('namae_string', '', $form_string));

        /* IBM��ĥʸ�� / NEC����IBM��ĥʸ�� */
        //$c == 0xad || ($c >= 0xf9 && $c <= 0xfc)
        $vld->af->form_vars['namae_string'] = chr(0xad);
        $this->assertFalse($vld->validate('namae_string', '', $form_string));

        $vld->af->form_vars['namae_string'] = chr(0xf9);
        $this->assertFalse($vld->validate('namae_string', '', $form_string));

        $vld->af->form_vars['namae_string'] = chr(0xfa);
        $this->assertFalse($vld->validate('namae_string', '', $form_string));

        $vld->af->form_vars['namae_string'] = chr(0xfc);
        $this->assertFalse($vld->validate('namae_string', '', $form_string));


    }
}
?>
