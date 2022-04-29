<?php
// vim: foldmethod=marker
/**
 *  Ethna_Plugin_Validator_Min.php
 *
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin_Validator_Min.php,v 1.3 2006/11/17 08:41:54 ichii386 Exp $
 */

// {{{ Ethna_Plugin_Validator_Min
/**
 *  �Ǿ��ͥ����å��ץ饰����
 *
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Validator_Min extends Ethna_Plugin_Validator
{
    /** @var    bool    ����������뤫�ե饰 */
    var $accept_array = false;

    /**
     *  �Ǿ��ͤΥ����å���Ԥ�
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
        if (isset($params['min']) == false || $this->isEmpty($var, $type)) {
            return $true;
        }

        switch ($type) {
            case VAR_TYPE_INT:
                if ($var < $params['min']) {
                    if (isset($params['error'])) {
                        $msg = $params['error'];
                    } else {
                        $msg = "{form}�ˤ�%d�ʾ�ο���(����)�����Ϥ��Ʋ�����";
                    }
                    return Ethna::raiseNotice($msg, E_FORM_MIN_INT, array($params['min']));
                }
                break;

            case VAR_TYPE_FLOAT:
                if ($var < $params['min']) {
                    if (isset($params['error'])) {
                        $msg = $params['error'];
                    } else {
                        $msg = "{form}�ˤ�%f�ʾ�ο���(����)�����Ϥ��Ʋ�����";
                    }
                    return Ethna::raiseNotice($msg, E_FORM_MIN_FLOAT, array($params['min']));
                }
                break;

            case VAR_TYPE_DATETIME:
                $t_min = strtotime($params['min']);
                $t_var = strtotime($var);
                if ($t_var < $t_min) {
                    if (isset($params['error'])) {
                        $msg = $params['error'];
                    } else {
                        $msg = "{form}�ˤ�%s�ʹߤ����դ����Ϥ��Ʋ�����";
                    }
                    return Ethna::raiseNotice($msg, E_FORM_MIN_DATETIME, array($params['min']));
                }
                break;

            case VAR_TYPE_FILE:
                $st = stat($var['tmp_name']);
                if ($st[7] < $params['min'] * 1024) {
                    if (isset($params['error'])) {
                        $msg = $params['error'];
                    } else {
                        $msg = "{form}�ˤ�%dKB�ʾ�Υե��������ꤷ�Ʋ�����";
                    }
                    return Ethna::raiseNotice($msg, E_FORM_MIN_FILE, array($params['min']));
                }
                break;

            case VAR_TYPE_STRING:
                if (strlen($var) < $params['min']) {
                    if (isset($params['error'])) {
                        $msg = $params['error'];
                    } else {
                        $msg = "{form}������%dʸ���ʾ�(Ⱦ��%dʸ���ʾ�)�����Ϥ��Ʋ�����";
                    }
                    return Ethna::raiseNotice($msg, E_FORM_MIN_STRING,
                            array(intval($params['min']/2), $params['min']));
                }
                break;
        }

        return $true;
    }
}
// }}}
?>
