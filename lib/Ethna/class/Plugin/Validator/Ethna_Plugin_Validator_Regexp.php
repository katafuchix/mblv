<?php
// vim: foldmethod=marker
/**
 *  Ethna_Plugin_Validator_Regexp.php
 *
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin_Validator_Regexp.php,v 1.3 2006/08/11 10:26:00 ichii386 Exp $
 */

// {{{ Ethna_Plugin_Validator_Regexp
/**
 *  ����ɽ���ˤ��Х�ǡ����ץ饰����
 *
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Validator_Regexp extends Ethna_Plugin_Validator
{
    /** @var    bool    ����������뤫�ե饰 */
    var $accept_array = false;

    /**
     *  ����ɽ���ˤ��ե������ͤΥ����å���Ԥ�
     *
     *  @access public
     *  @param  string  $name       �ե������̾��
     *  @param  mixed   $var        �ե��������
     *  @param  array   $params     �ץ饰����Υѥ�᡼��
     */
    function &validate($name, $var, $params)
    {
        $true = true;
        $type = $this->getFormType($name);
        if (isset($params['regexp']) == false
            || $type == VAR_TYPE_FILE || $this->isEmpty($var, $type)) {
            return $true;
        }

        if (preg_match($params['regexp'], $var) == 0) {
            if (isset($params['error'])) {
                $msg = $params['error'];
            } else {
                $msg = "{form}�����������Ϥ��Ƥ�������";
            }
            return Ethna::raiseNotice($msg, E_FORM_REGEXP);
        }

        return $true;
    }
}
// }}}
?>
