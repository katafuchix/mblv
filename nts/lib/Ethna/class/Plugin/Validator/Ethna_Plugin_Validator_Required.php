<?php
// vim: foldmethod=marker
/**
 *  Ethna_Plugin_Validator_Required.php
 *
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Plugin_Validator_Required.php,v 1.2 2006/07/19 05:22:39 fujimoto Exp $
 */

// {{{ Ethna_Plugin_Validator_Required
/**
 *  ɬ�ܥե�����θ��ڥץ饰����
 *
 *  @author     ICHII Takashi <ichii386@schweetheart.jp>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Plugin_Validator_Required extends Ethna_Plugin_Validator
{
    /** @var    bool    ����������뤫�ե饰 */
    var $accept_array = true;

    /**
     *  �ե�������ͤ����Ϥ���Ƥ��뤫�򸡾ڤ���
     *
     *  ����ξ��ϡ����Ϥ����٤� key �Υꥹ�ȡ�
     *  ���뤤�� key �ο������Ǥ��ޤ�
     *
     *  @access public
     *  @param  string  $name       �ե������̾��
     *  @param  mixed   $var        �ե��������
     *  @param  array   $params     �ץ饰����Υѥ�᡼��
     */
    function &validate($name, $var, $params)
    {
        $true = true;
        if (isset($params['required']) && $params['required'] == false) {
            return $true;
        }
        $form_def = $this->getFormDef($name);

        // ���򷿤Υե����फ�ɤ���
        switch ($form_def['form_type']) {
        case FORM_TYPE_SELECT:
        case FORM_TYPE_RADIO:
        case FORM_TYPE_CHECKBOX:
        case FORM_TYPE_FILE:
            $choice = true;
            break;
        default:
            $choice = false;
        }

        // �����顼�ξ��
        if (is_array($form_def['type']) == false) {
            if ($this->isEmpty($var, $this->getFormType($name))) {
                if (isset($params['error'])) {
                    $msg = $params['error'];
                } else if ($choice) {
                    $msg = '{form}�����򤵤�Ƥ��ޤ���';
                } else {
                    $msg = '{form}�����Ϥ���Ƥ��ޤ���';
                }
                return Ethna::raiseNotice($msg, E_FORM_REQUIRED);
            } else {
                return $true;
            }
        }
                
        // ����ξ��
        $valid_keys = array();
        if ($var != null) {
            foreach (array_keys($var) as $key) {
                if ($this->isEmpty($var[$key], $form_def['type']) == false) {
                    $valid_keys[] = $key;
                }
            }
        }

        // required_key �Υ����å�
        if (isset($params['key'])) {
            $invalid_keys = array_diff(to_array($params['key']), $valid_keys);
            if (count($invalid_keys) > 0) {
                if (isset($params['error'])) {
                    $msg = $params['error'];
                } else if ($choice) {
                    $msg = '{form}��ɬ�פʹ��ܤ����򤵤�Ƥ��ޤ���';
                } else {
                    $msg = '{form}��ɬ�פʹ��ܤ����Ϥ���Ƥ��ޤ���';
                }
                return Ethna::raiseNotice($msg, E_FORM_REQUIRED);
            }
        }

        // required_num �Υ����å�
        if (isset($params['num'])) {
            if (count($valid_keys) < intval($params['num'])) {
                if (isset($params['error'])) {
                    $msg = $params['error'];
                } else if ($choice) {
                    $msg = '{form}��ɬ�פʿ��ޤ����򤵤�Ƥ��ޤ���';
                } else {
                    $msg = '{form}��ɬ�פʿ��ޤ����Ϥ���Ƥ��ޤ���';
                }
                return Ethna::raiseNotice($msg, E_FORM_REQUIRED);
            }
        }

        // �Ȥ��˻��꤬�ʤ��Ȥ�: �ե������Ϳ����줿������
        if (isset($params['key']) == false && isset($params['num']) == false) {
            if (count($valid_keys) == 0 || count($valid_keys) != count($var)) {
                if (isset($params['error'])) {
                    $msg = $params['error'];
                } else if ($choice) {
                    $msg = '{form}�����򤵤�Ƥ��ޤ���';
                } else {
                    $msg = '{form}�����Ϥ���Ƥ��ޤ���';
                }
                return Ethna::raiseNotice($msg, E_FORM_REQUIRED);
            }
        }

        return $true;
    }

}
// }}}
?>
