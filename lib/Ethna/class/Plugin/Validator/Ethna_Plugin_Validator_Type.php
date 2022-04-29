<?php
// vim: foldmethod=marker
/**
 *  Ethna_Plugin_Validator_Type.php
 *
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin_Validator_Type.php,v 1.2 2006/07/19 05:22:39 fujimoto Exp $
 */

// {{{ Ethna_Plugin_Validator_Type
/**
 *  �����ץ����å��ץ饰����
 *
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Validator_Type extends Ethna_Plugin_Validator
{
    /** @var    bool    ����������뤫�ե饰 */
    var $accept_array = false;

    /**
     *  �ե������ͤη������å���Ԥ�
     *
     *  @access public
     *  @param  string  $name       �ե������̾��
     *  @param  mixed   $var        �ե��������
     *  @param  array   $params     �ץ饰����Υѥ�᡼��
     */
    function &validate($name, $var, $params)
    {
        $true = true;
        $type = $params['type'];
        if ($type == VAR_TYPE_FILE || $this->isEmpty($var, $type)) {
            return $true;
        }

        foreach (array_keys(to_array($var)) as $key) {
            switch ($type) {
                case VAR_TYPE_INT:
                    if (!preg_match('/^-?\d+$/', $var)) {
                        if (isset($params['error'])) {
                            $msg = $params['error'];
                        } else {
                            $msg = "{form}�ˤϿ���(����)�����Ϥ��Ʋ�����";
                        }
                        return Ethna::raiseNotice($msg, E_FORM_WRONGTYPE_INT);
                    }
                    break;

                case VAR_TYPE_FLOAT:
                    if (!preg_match('/^-?\d+$/', $var) && !preg_match('/^-?\d+\.\d+$/', $var)) {
                        if (isset($params['error'])) {
                            $msg = $params['error'];
                        } else {
                            $msg = "{form}�ˤϿ���(����)�����Ϥ��Ʋ�����";
                        }
                        return Ethna::raiseNotice($msg, E_FORM_WRONGTYPE_FLOAT);
                    }
                    break;

                case VAR_TYPE_BOOLEAN:
                    if ($var != "1" && $var != "0") {
                        if (isset($params['error'])) {
                            $msg = $params['error'];
                        } else {
                            $msg = "{form}�ˤ�1�ޤ���0�Τ����ϤǤ��ޤ�";
                        }
                        return Ethna::raiseNotice($msg, E_FORM_WRONGTYPE_BOOLEAN);
                    }
                    break;

                case VAR_TYPE_DATETIME:
                    $r = strtotime($var);
                    if ($r == -1 || $r === false) {
                        if (isset($params['error'])) {
                            $msg = $params['error'];
                        } else {
                            $msg = "{form}�ˤ����դ����Ϥ��Ʋ�����";
                        }
                        return Ethna::raiseNotice($msg, E_FORM_WRONGTYPE_DATETIME);
                    }
                    break;
            }
        }

        return $true;
    }
}
// }}}
?>
