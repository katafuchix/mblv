<?php
// vim: foldmethod=marker
/**
 *  Ethna_Plugin_Validator_Custom.php
 *
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin_Validator_Custom.php,v 1.4 2006/08/03 03:30:42 ichii386 Exp $
 */

// {{{ Ethna_Plugin_Validator_Custom
/**
 *  custom�Х�ǡ����Υ�åѡ��ץ饰����
 *
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Validator_Custom extends Ethna_Plugin_Validator
{
    /** @var    bool    ����������뤫�ե饰 */
    var $accept_array = true;

    /**
     *  custom�Х�ǡ����Υ�åѡ�
     *
     *  @access public
     *  @param  string  $name       �ե������̾��
     *  @param  mixed   $var        �ե��������
     *  @param  array   $params     �ץ饰����Υѥ�᡼��
     */
    function &validate($name, $var, $params)
    {
        $true = true;
        $false = false;

        $method_list = preg_split('/\s*,\s*/', $params['custom'], -1, PREG_SPLIT_NO_EMPTY);
        if (is_array($method_list) == false) {
            return $true;
        }

        foreach ($method_list as $method) {
            if (method_exists($this->af, $method)) {
                $ret =& $this->af->$method($name);
                if (Ethna::isError($ret)) {
                    // ���Υ��顼�Ϥ��Ǥ� af::checkSomething() �� ae::add()
                    // ���Ƥ���
                    return $false;
                }
            }
        }

        return $true;
    }
}
// }}}
?>
