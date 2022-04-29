<?php
// vim: foldmethod=marker
/**
 *  Ethna_ViewClass.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_ViewClass.php,v 1.34 2006/12/04 06:07:15 ichii386 Exp $
 */

// {{{ Ethna_ViewClass
/**
 *  view���饹
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_ViewClass
{
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_Backend       backend���֥������� */
    var $backend;

    /** @var    object  Ethna_Config        ���ꥪ�֥�������    */
    var $config;

    /** @var    object  Ethna_I18N          i18n���֥������� */
    var $i18n;

    /** @var    object  Ethna_Logger    �����֥������� */
    var $logger;

    /** @var    object  Ethna_Plugin    �ץ饰���󥪥֥������� */
    var $plugin;

    /** @var    object  Ethna_ActionError   ��������󥨥顼���֥������� */
    var $action_error;

    /** @var    object  Ethna_ActionError   ��������󥨥顼���֥�������(��ά��) */
    var $ae;

    /** @var    object  Ethna_ActionForm    ���������ե����४�֥������� */
    var $action_form;

    /** @var    object  Ethna_ActionForm    ���������ե����४�֥�������(��ά��) */
    var $af;

    /** @var    array   ���������ե����४�֥�������(helper) */
    var $helper_action_form = array();

    /** @var    array   helper��html��attribute�ˤϤ��ʥѥ�᡼���ΰ��� */
    var $helper_parameter_keys = array('default', 'option', 'separator');

    /** @var    object  Ethna_Session       ���å���󥪥֥������� */
    var $session;

    /** @var    string  ����̾ */
    var $forward_name;

    /** @var    string  ������ƥ�ץ졼�ȥե�����̾ */
    var $forward_path;

    /**#@-*/

    // {{{ Ethna_ViewClass
    /**
     *  Ethna_ViewClass�Υ��󥹥ȥ饯��
     *
     *  @access public
     *  @param  object  Ethna_Backend   $backend    backend���֥�������
     *  @param  string  $forward_name   �ӥ塼�˴�Ϣ�դ����Ƥ�������̾
     *  @param  string  $forward_path   �ӥ塼�˴�Ϣ�դ����Ƥ���ƥ�ץ졼�ȥե�����̾
     */
    function Ethna_ViewClass(&$backend, $forward_name, $forward_path)
    {
        $c =& $backend->getController();
        $this->backend =& $backend;
        $this->config =& $this->backend->getConfig();
        $this->i18n =& $this->backend->getI18N();
        $this->logger =& $this->backend->getLogger();
        $this->plugin =& $this->backend->getPlugin();

        $this->action_error =& $this->backend->getActionError();
        $this->ae =& $this->action_error;

        $this->action_form =& $this->backend->getActionForm();
        $this->af =& $this->action_form;

        $this->session =& $this->backend->getSession();

        $this->forward_name = $forward_name;
        $this->forward_path = $forward_path;

        foreach (array_keys($this->helper_action_form) as $action) {
            $this->addActionFormHelper($action);
        }
    }
    // }}}

    // {{{ preforward
    /**
     *  ����ɽ��������
     *
     *  �ƥ�ץ졼�Ȥ����ꤹ���ͤǥ���ƥ����Ȥ˰�¸���ʤ���Τ�
     *  ���������ꤹ��(��:���쥯�ȥܥå�����)
     *
     *  @access public
     */
    function preforward()
    {
    }
    // }}}

    // {{{ forward
    /**
     *  ����̾���б�������̤���Ϥ���
     *
     *  �ü�ʲ��̤�ɽ���������������ä˥����С��饤�ɤ���ɬ�פ�̵��
     *  (preforward()�Τߥ����С��饤�ɤ�����ɤ�)
     *
     *  @access public
     */
    function forward()
    {
        $renderer =& $this->_getRenderer();
        $this->_setDefault($renderer);
        $renderer->perform($this->forward_path);
    }
    // }}}

    // {{{ addActionFormHelper
    /**
     *  helper���������ե����४�֥������Ȥ����ꤹ��
     *
     *  @access public
     */
    function addActionFormHelper($action)
    {
        if (isset($this->helper_action_form[$action])
            && is_object($this->helper_action_form[$action])) {
            return;
        }

        $ctl =& Ethna_Controller::getInstance();
        if ($action === $ctl->getCurrentActionName()) {
            $this->helper_action_form[$action] =& $this->af;
            return;
        }

        $form_name = $ctl->getActionFormName($action);
        if ($form_name === null) {
            $this->logger->log(LOG_WARNING,
                'action form for the action [%s] not found.', $action);
            return;
        }

        $this->helper_action_form[$action] =& new $form_name($ctl);
    }
    // }}}

    // {{{ clearActionFormHelper
    /**
     *  helper���������ե����४�֥������Ȥ�������
     *
     *  @access public
     */
    function clearActionFormHelper($action)
    {
        unset($this->helper_action_form[$action]);
    }
    // }}}

    // {{{ _getHelperActionForm
    /**
     *  ���������ե����४�֥�������(helper)���������
     *  $action === null �� $name �����ꤵ��Ƥ���Ȥ��ϡ�$name�������
     *  �ޤ��Τ�õ��
     *
     *  @access protected
     *  @param  string  action  �������륢�������̾
     *  @param  string  name    �������Ƥ��뤳�Ȥ���Ԥ���ե�����̾
     *  @return object  Ethna_ActionForm�ޤ��ϷѾ����֥�������
     */
    function &_getHelperActionForm($action = null, $name = null)
    {
        // $action �����ꤵ��Ƥ�����
        if ($action !== null) {
            if (isset($this->helper_action_form[$action])
                && is_object($this->helper_action_form[$action])) {
                return $this->helper_action_form[$action];
            } else {
                $this->logger->log(LOG_WARNING,
                    'helper action form for action [%s] not found',
                    $action);
                return null;
            }
        }

        // �ǽ�� $this->af ��Ĵ�٤�
        $def = $this->af->getDef($name);
        if ($def !== null) {
            return $this->af;
        }

        // $this->helper_action_form ����Ĵ�٤�
        foreach (array_keys($this->helper_action_form) as $action) {
            if (is_object($this->helper_action_form[$action]) === false) {
                continue;
            }
            $af =& $this->helper_action_form[$action];
            $def = $af->getDef($name);
            if (is_null($def) === false) {
                return $af;
            }
        }

        // ���դ���ʤ��ä�
        $this->logger->log(LOG_WARNING,
            'action form defining form [%s] not found', $name);
        return null;
    }
    // }}}

    // {{{ getFormName
    /**
     *  ���ꤵ�줿�ե�������ܤ��б�����ե�����̾(w/ �������)���������
     *
     *  @access public
     */
    function getFormName($name, $action, $params)
    {
        $af =& $this->_getHelperActionForm($action, $name);
        if ($af === null) {
            return $name;
        }

        $def = $af->getDef($name);
        if ($def === null || isset($def['name']) === false) {
            return $name;
        }

        return $def['name'];
    }
    // }}}

    // {{{ getFormSubmit
    /**
     *  submit�ܥ�����������(�����襢�������Ǽ������褦
     *  �������Ƥ��ʤ��Ȥ��ˡ������submit�ܥ������Τ˻Ȥ�)
     *
     *  @access public
     */
    function getFormSubmit($params)
    {
        if (isset($params['type']) === false) {
            $params['type'] = 'submit';
        }
        return $this->_getFormInput_Html('input', $params);
    }
    // }}}

    // {{{ getFormInput
    /**
     *  ���ꤵ�줿�ե�������ܤ��б�����ե����ॿ�����������
     *
     *  @access public
     *  @todo   JavaScript�б�
     */
    function getFormInput($name, $action, $params)
    {
        $af =& $this->_getHelperActionForm($action, $name);
        if ($af === null) {
            return '';
        }

        $def = $af->getDef($name);
        if ($def === null) {
            return '';
        }

        if (isset($def['form_type']) === false) {
            $def['form_type'] = FORM_TYPE_TEXT;
        }

        // ����ե����ब����ƤФ줿������¸���륫����
        if (is_array($def['type'])) {
            static $form_counter = array();
            if (isset($form_counter[$action]) === false) {
                $form_counter[$action] = array();
            }
            if (isset($form_counter[$action][$name]) === false) {
                $form_counter[$action][$name] = 0;
            }
            $def['_form_counter'] = $form_counter[$action][$name]++;
        }

        switch ($def['form_type']) {
        case FORM_TYPE_BUTTON:
            $input = $this->_getFormInput_Button($name, $def, $params);
            break;

        case FORM_TYPE_CHECKBOX:
            $def['option'] = $this->_getSelectorOptions($af, $def, $params);
            $input = $this->_getFormInput_Checkbox($name, $def, $params);
            break;

        case FORM_TYPE_FILE:
            $input = $this->_getFormInput_File($name, $def, $params);
            break;

        case FORM_TYPE_HIDDEN:
            $input = $this->_getFormInput_Hidden($name, $def, $params);
            break;

        case FORM_TYPE_PASSWORD:
            $input = $this->_getFormInput_Password($name, $def, $params);
            break;

        case FORM_TYPE_RADIO:
            $def['option'] = $this->_getSelectorOptions($af, $def, $params);
            $input = $this->_getFormInput_Radio($name, $def, $params);
            break;

        case FORM_TYPE_SELECT:
            $def['option'] = $this->_getSelectorOptions($af, $def, $params);
            $input = $this->_getFormInput_Select($name, $def, $params);
            break;

        case FORM_TYPE_SUBMIT:
            $input = $this->_getFormInput_Submit($name, $def, $params);
            break;

        case FORM_TYPE_TEXTAREA:
            $input = $this->_getFormInput_Textarea($name, $def, $params);
            break;

        case FORM_TYPE_TEXT:
        default:
            $input = $this->_getFormInput_Text($name, $def, $params);
            break;
        }

        return $input;
    }
    // }}}

    // {{{ getFormBlock
    /**
     *  �ե����ॿ�����������(type="form")
     *
     *  @access protected
     */
    function getFormBlock($content, $params)
    {
        // method
        if (isset($params['method']) === false) {
            $params['method'] = 'post';
        }

        return $this->_getFormInput_Html('form', $params, $content, false);
    }
    // }}}

    // {{{ _getSelectorOptions
    /**
     *  select, radio, checkbox ���������������
     *
     *  @access protected
     */
    function _getSelectorOptions(&$af, $def, $params)
    {
        // $params, $def �ν��Ĵ�٤�
        $source = null;
        if (isset($params['option'])) {
            $source = $params['option'];
        } else if (isset($def['option'])) {
            $source = $def['option'];
        }

        // ̤��� or ����Ѥߤξ��Ϥ��Τޤ�
        if ($source === null) {
            return null;
        } else if (is_array($source)) {
            return $source;
        }
        
        // ���������
        $options = null;
        $split = array_map("trim", explode(',', $source));
        if (count($split) === 1) {
            // ���������ե����फ�����
            $method_or_property = $split[0];
            if (method_exists($af, $method_or_property)) {
                $options = $af->$method_or_property();
            } else {
                $options = $af->$method_or_property;
            }
        } else {
            // �ޥ͡����㤫�����
            $mgr =& $this->backend->getManager($split[0]);
            $attr_list = $mgr->getAttrList($split[1]);
            if (is_array($attr_list)) {
                foreach ($attr_list as $key => $val) {
                    $options[$key] = $val['name'];
                }
            }
        }

        if (is_array($options) === false) {
            $this->logger->log(LOG_WARNING,
                'selector option is not valid. [actionform=%s, option=%s]',
                get_class($af), $source);
            return null;
        }

        return $options;
    }
    // }}}

    // {{{ _getFormInput_Button
    /**
     *  �ե����ॿ�����������(type="button")
     *
     *  @access protected
     */
    function _getFormInput_Button($name, $def, $params)
    {
        $params['type'] = 'button';
        
        if (isset($def['type'])) {
            $params['name'] = is_array($def['type']) ? $name . '[]' : $name;
        } else {
            $params['name'] = $name;
        }
        if (isset($params['value']) === false) {
            if (isset($def['name'])) {
                $params['value'] = $def['name'];
            }
        }
        if (is_array($params['value'])) {
            $params['value'] = $params['value'][0];
        }

        return $this->_getFormInput_Html('input', $params);
    }
    // }}}

    // {{{ _getFormInput_Checkbox
    /**
     *  �����å��ܥå����������������(type="check")
     *
     *  @access protected
     */
    function _getFormInput_Checkbox($name, $def, $params)
    {
        $params['type'] = 'checkbox';
        if (isset($def['type'])) {
            $params['name'] = is_array($def['type']) ? $name . '[]' : $name;
        } else {
            $params['name'] = $name;
        }

        // ���ץ����ΰ���(alist)�����
        if (isset($def['option']) && is_array($def['option'])) {
            $options = $def['option'];
        } else {
            $options = array();
        }

        // default�ͤ�����
        if (isset($params['default'])) {
            $current_value = $params['default'];
        } else if (isset($def['default'])) {
            $current_value = $def['default'];
        } else {
            $current_value = array();
        }
        $current_value = array_map('strval', to_array($current_value));

        // �����Υ��ѥ졼��
        if (isset($params['separator'])) {
            $separator = $params['separator'];
        } else {
            $separator = '';
        }

        $ret = array();
        $i = 1;
        foreach ($options as $key => $value) {
            $params['value'] = $key;
            $params['id'] = $name . '_' . $i++;

            // checked
            if (in_array((string) $key, $current_value, true)) {
                $params['checked'] = 'checked';
            } else {
                unset($params['checked']);
            }

            // <input type="checkbox" />
            $input_tag = $this->_getFormInput_Html('input', $params);

            // <label for="id">..</label>
            $ret[] = $this->_getFormInput_Html('label', array('for' => $params['id']),
                                               $input_tag . $value, false);
        }

        return implode($separator, $ret);
    }
    // }}}

    // {{{ _getFormInput_File
    /**
     *  �ե����ॿ�����������(type="file")
     *
     *  @access protected
     */
    function _getFormInput_File($name, $def, $params)
    {
        $params['type'] = 'file';
        if (isset($def['type'])) {
            $params['name'] = is_array($def['type']) ? $name . '[]' : $name;
        } else {
            $params['name'] = $name;
        }
        $params['value'] = '';

        return $this->_getFormInput_Html('input', $params);
    }
    // }}}

    // {{{ _getFormInput_Hidden
    /**
     *  �ե����ॿ�����������(type="hidden")
     *
     *  @access protected
     */
    function _getFormInput_Hidden($name, $def, $params)
    {
        $params['type'] = 'hidden';
        if (isset($def['type'])) {
            $params['name'] = is_array($def['type']) ? $name . '[]' : $name;
        } else {
            $params['name'] = $name;
        }

        // value
        $value = '';
        if (isset($params['value'])) {
            $value = $params['value'];
        } else if (isset($params['default'])) {
            $value = $params['default'];
        } else if (isset($def['default'])) {
            $value = $def['default'];
        }
        if (is_array($value)) {
            if ($def['_form_counter'] < count($value)) {
                $params['value'] = $value[$def['_form_counter']];
            } else {
                $params['value'] = '';
            }
        } else {
            $params['value'] = $value;
        }

        return $this->_getFormInput_Html('input', $params);
    }
    // }}}

    // {{{ _getFormInput_Password
    /**
     *  �ե����ॿ�����������(type="password")
     *
     *  @access protected
     */
    function _getFormInput_Password($name, $def, $params)
    {
        $params['type'] = 'password';
        if (isset($def['type'])) {
            $params['name'] = is_array($def['type']) ? $name . '[]' : $name;
        } else {
            $params['name'] = $name;
        }

        // value
        $value = '';
        if (isset($params['value'])) {
            $value = $params['value'];
        } else if (isset($params['default'])) {
            $value = $params['default'];
        } else if (isset($def['default'])) {
            $value = $def['default'];
        }
        if (is_array($value)) {
            if ($def['_form_counter'] < count($value)) {
                $params['value'] = $value[$def['_form_counter']];
            } else {
                $params['value'] = '';
            }
        } else {
            $params['value'] = $value;
        }

        // maxlength
        if (isset($def['max']) && $def['max']) {
            $params['maxlength'] = $def['max'];
        }

        return $this->_getFormInput_Html('input', $params);
    }
    // }}}

    // {{{ _getFormInput_Radio
    /**
     *  �饸���ܥ��󥿥����������(type="radio")
     *
     *  @access protected
     */
    function _getFormInput_Radio($name, $def, $params)
    {
        $params['type'] = 'radio';
        if (isset($def['type'])) {
            $params['name'] = is_array($def['type']) ? $name . '[]' : $name;
        } else {
            $params['name'] = $name;
        }

        // ���ץ����ΰ���(alist)�����
        if (isset($def['option']) && is_array($def['option'])) {
            $options = $def['option'];
        } else {
            $options = array();
        }

        // default�ͤ�����
        if (isset($params['default'])) {
            $current_value = $params['default'];
        } else if (isset($def['default'])) {
            $current_value = $def['default'];
        } else {
            $current_value = null;
        }

        // �����Υ��ѥ졼��
        if (isset($params['separator'])) {
            $separator = $params['separator'];
        } else {
            $separator = '';
        }

        $ret = array();
        $i = 1;
        foreach ($options as $key => $value) {
            $params['value'] = $key;
            $params['id'] = $name . '_' . $i++;

            // checked
            if (strcmp($current_value,$key) === 0) {
                $params['checked'] = 'checked';
            } else {
                unset($params['checked']);
            }

            // <input type="radio" />
            $input_tag = $this->_getFormInput_Html('input', $params);

            // <label for="id">..</label>
            $ret[] = $this->_getFormInput_Html('label', array('for' => $params['id']),
                                               $input_tag . $value, false);
        }

        return implode($separator, $ret);
    }
    // }}}

    // {{{ _getFormInput_Select
    /**
     *  ���쥯�ȥܥå����������������(type="select")
     *
     *  @access protected
     */
    function _getFormInput_Select($name, $def, $params)
    {
        if (isset($def['type'])) {
            $params['name'] = is_array($def['type']) ? $name . '[]' : $name;
        } else {
            $params['name'] = $name;
        }

        // ���ץ����ΰ���(alist)�����
        if (isset($def['option']) && is_array($def['option'])) {
            $options = $def['option'];
        } else {
            $options = array();
        }

        // default�ͤ�����
        if (isset($params['default'])) {
            $current_value = $params['default'];
        } else if (isset($def['default'])) {
            $current_value = $def['default'];
        } else {
            $current_value = null;
        }

        // �����Υ��ѥ졼��
        if (isset($params['separator'])) {
            $separator = $params['separator'];
        } else {
            $separator = '';
        }

        // select��������Ȥ���
        $contents = array();
        $selected = false;
        foreach ($options as $key => $value) {
            $attr = array('value' => $key);
            if ($selected === false && strcmp($current_value, $key) === 0) {
                $attr['selected'] = 'selected';
                $selected = true;
            }
            $contents[] = $this->_getFormInput_Html('option', $attr, $value);
        }

        // ������ȥ�
        if (isset($params['emptyoption'])) {
            $attr = array('value' => '');
            if ($selected === false) {
                $attr['selected'] = 'selected';
            }
            array_unshift($contents, $this->_getFormInput_Html('option', $attr,
                                                               $params['emptyoption']));
            unset($params['emptyoption']);
        }

        $element = $separator . implode($separator, $contents) . $separator;
        return $this->_getFormInput_Html('select', $params, $element, false);
    }
    // }}}

    // {{{ _getFormInput_Submit
    /**
     *  �ե����ॿ�����������(type="submit")
     *
     *  @access protected
     */
    function _getFormInput_Submit($name, $def, $params)
    {
        $params['type'] = 'submit';
        if (isset($def['type'])) {
            $params['name'] = is_array($def['type']) ? $name . '[]' : $name;
        } else {
            $params['name'] = $name;
        }
        if (isset($params['value']) === false) {
            if (isset($def['name'])) {
                $params['value'] = $def['name'];
            }
        }
        if (is_array($params['value'])) {
            $params['value'] = $params['value'][0];
        }

        return $this->_getFormInput_Html('input', $params);
    }
    // }}}

    // {{{ _getFormInput_Textarea
    /**
     *  �ե����ॿ�����������(textarea)
     *
     *  @access protected
     */
    function _getFormInput_Textarea($name, $def, $params)
    {
        if (isset($def['type'])) {
            $params['name'] = is_array($def['type']) ? $name . '[]' : $name;
        } else {
            $params['name'] = $name;
        }

        // element
        $element = '';
        if (isset($params['value'])) {
            $element = $params['value'];
            unset($params['value']);
        } else if (isset($params['default'])) {
            $element = $params['default'];
        } else if (isset($def['default'])) {
            $element = $def['default'];
        }
        if (is_array($element)) {
            if ($def['_form_counter'] < count($element)) {
                $element = $element[$def['_form_counter']];
            } else {
                $element = '';
            }
        } else {
            $params['value'] = $element;
        }

        return $this->_getFormInput_Html('textarea', $params, $element);
    }
    // }}}

    // {{{ _getFormInput_Text
    /**
     *  �ե����ॿ�����������(type="text")
     *
     *  @access protected
     */
    function _getFormInput_Text($name, $def, $params)
    {
        // type
        $params['type'] = 'text';

        // name
        if (isset($def['type'])) {
            $params['name'] = is_array($def['type']) ? $name . '[]' : $name;
        } else {
            $params['name'] = $name;
        }

        // value
        $value = '';
        if (isset($params['value'])) {
            $value = $params['value'];
        } else if (isset($params['default'])) {
            $value = $params['default'];
        } else if (isset($def['default'])) {
            $value = $def['default'];
        }
        if (is_array($value)) {
            if ($def['_form_counter'] < count($value)) {
                $params['value'] = $value[$def['_form_counter']];
            } else {
                $params['value'] = '';
            }
        } else {
            $params['value'] = $value;
        }

        // maxlength
        if (isset($def['max']) && $def['max']) {
            $params['maxlength'] = $def['max'];
        }

        return $this->_getFormInput_Html('input', $params);
    }
    // }}}

    // {{{ _getFormInput_Html
    /**
     *  HTML�������������
     *
     *  @access protected
     */
    function _getFormInput_Html($tag, $attr, $element = null, $escape_element = true)
    {
        // ���פʥѥ�᡼���Ͼä�
        foreach ($this->helper_parameter_keys as $key) {
            unset($attr[$key]);
        }

        $r = "<$tag";

        foreach ($attr as $key => $value) {
            if ($value === null) {
                $r .= sprintf(' %s', $key);
            } else {
                $r .= sprintf(' %s="%s"', $key, htmlspecialchars($value, ENT_QUOTES));
            }
        }

        if ($element === null) {
            $r .= ' />';
        } else if ($escape_element) {
            $r .= sprintf('>%s</%s>', htmlspecialchars($element, ENT_QUOTES), $tag);
        } else {
            $r .= sprintf('>%s</%s>', $element, $tag);
        }

        return $r;
    }
    // }}}

    // {{{ _getRenderer
    /**
     *  �����饪�֥������Ȥ��������
     *
     *  @access protected
     *  @return object  Ethna_Renderer  �����饪�֥�������
     */
    function &_getRenderer()
    {
        $_ret_object =& $this->_getTemplateEngine();
        return $_ret_object;
    }
    // }}}

    // {{{ _getTemplateEngine
    /**
     *  �����饪�֥������Ȥ��������(���Τ���_getRenderer()�����礵���ͽ��)
     *
     *  @access protected
     *  @return object  Ethna_Renderer  �����饪�֥�������
     *  @obsolete
     */
    function &_getTemplateEngine()
    {
        $c =& $this->backend->getController();
        $renderer =& $c->getRenderer();

        $form_array =& $this->af->getArray();
        $app_array =& $this->af->getAppArray();
        $app_ne_array =& $this->af->getAppNEArray();
        $renderer->setPropByRef('form', $form_array);
        $renderer->setPropByRef('app', $app_array);
        $renderer->setPropByRef('app_ne', $app_ne_array);
        $message_list = Ethna_Util::escapeHtml($this->ae->getMessageList());
        $renderer->setPropByRef('errors', $message_list);
        if (isset($_SESSION)) {
            $tmp_session = Ethna_Util::escapeHtml($_SESSION);
            $renderer->setPropByRef('session', $tmp_session);
        }
        $renderer->setProp('script',
            htmlspecialchars(basename($_SERVER['PHP_SELF']), ENT_QUOTES));
        $renderer->setProp('request_uri',
            htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES));
        $renderer->setProp('config', $this->config->get());

        return $renderer;
    }
    // }}}

    // {{{ _setDefault
    /**
     *  �����ͤ����ꤹ��
     *
     *  @access protected
     *  @param  object  Ethna_Renderer  �����饪�֥�������
     */
    function _setDefault(&$renderer)
    {
    }
    // }}}
}
// }}}
?>
