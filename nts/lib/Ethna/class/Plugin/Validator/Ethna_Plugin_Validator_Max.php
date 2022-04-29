<?php
// vim: foldmethod=marker
/**
 *  Ethna_Plugin_Validator_Max.php
 *
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin_Validator_Max.php,v 1.3 2006/08/03 03:38:59 ichii386 Exp $
 */

// {{{ Ethna_Plugin_Validator_Max
/**
 *  �����ͥ����å��ץ饰����
 *
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Validator_Max extends Ethna_Plugin_Validator
{
    /** @var    bool    ����������뤫�ե饰 */
    var $accept_array = false;

    /**
     *  �����ͤΥ����å���Ԥ�
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
        if (isset($params['max']) == false || $this->isEmpty($var, $type)) {
            return $true;
        }

        switch ($type) {
            case VAR_TYPE_INT:
                if ($var > $params['max']) {
                    if (isset($params['error'])) {
                        $msg = $params['error'];
                    } else {
                        $msg = "{form}�ˤ�%d�ʲ��ο���(����)�����Ϥ��Ʋ�����";
                    }
                    return Ethna::raiseNotice($msg, E_FORM_MAX_INT, array($params['max']));
                }
                break;

            case VAR_TYPE_FLOAT:
                if ($var > $params['max']) {
                    if (isset($params['error'])) {
                        $msg = $params['error'];
                    } else {
                        $msg = "{form}�ˤ�%f�ʲ��ο���(����)�����Ϥ��Ʋ�����";
                    }
                    return Ethna::raiseNotice($msg, E_FORM_MAX_FLOAT, array($params['max']));
                }
                break;

            case VAR_TYPE_DATETIME:
                $t_max = strtotime($params['max']);
                $t_var = strtotime($var);
                if ($t_var > $t_max) {
                    if (isset($params['error'])) {
                        $msg = $params['error'];
                    } else {
                        $msg = "{form}�ˤ�%s���������դ����Ϥ��Ʋ�����";
                    }
                    return Ethna::raiseNotice($msg, E_FORM_MAX_DATETIME, array($params['max']));
                }
                break;

            case VAR_TYPE_FILE:
                $st = stat($var['tmp_name']);
                if ($st[7] > $params['max'] * 1024) {
                    if (isset($params['error'])) {
                        $msg = $params['error'];
                    } else {
                        $msg = "{form}�ˤ�%dKB�ʲ��Υե��������ꤷ�Ʋ�����";
                    }
                    return Ethna::raiseNotice($msg, E_FORM_MAX_FILE, array($params['max']));
                }
                break;

            case VAR_TYPE_STRING:
                if (strlen($var) > $params['max']) {
                    if (isset($params['error'])) {
                        $msg = $params['error'];
                    } else {
                        $msg = "{form}������%dʸ���ʲ�(Ⱦ��%dʸ���ʲ�)�����Ϥ��Ʋ�����";
                    }
                    return Ethna::raiseNotice($msg, E_FORM_MAX_STRING,
                            array(intval($params['max']/2), $params['max']));
                }
                break;
        }

        return $true;
    }
}
// }}}
?>
