<?php
/**
 *  Ethna_SmartyPlugin.php
 *
 *  @author     Masaki Fujimoto <fujimoto@php.net>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_SmartyPlugin.php,v 1.21 2006/10/31 14:51:19 cocoitiban Exp $
 */

// {{{ smarty_modifier_number_format
/**
 *  smarty modifier:number_format()
 *
 *  number_format()�ؿ���wrapper
 *
 *  sample:
 *  <code>
 *  {"12345"|number_format}
 *  </code>
 *  <code>
 *  12,345
 *  </code>
 *
 *  @param  string  $string �ե����ޥå��о�ʸ����
 *  @return string  �ե����ޥåȺѤ�ʸ����
 */
function smarty_modifier_number_format($string)
{
    if ($string === "" || $string == null) {
        return "";
    }
    return number_format($string);
}
// }}}

// {{{ smarty_modifier_strftime
/**
 *  smarty modifier:strftime()
 *
 *  strftime()�ؿ���wrapper
 *
 *  sample:
 *  <code>
 *  {"2004/01/01 01:01:01"|strftime:"%Yǯ%m��%d��"}
 *  </code>
 *  <code>
 *  2004ǯ01��01��
 *  </code>
 *
 *  @param  string  $string �ե����ޥå��о�ʸ����
 *  @param  string  $format �񼰻���ʸ����(strftime()�ؿ�����)
 *  @return string  �ե����ޥåȺѤ�ʸ����
 */
function smarty_modifier_strftime($string, $format)
{
    if ($string === "" || $string == null) {
        return "";
    }
    return strftime($format, strtotime($string));
}
// }}}

// {{{ smarty_modifier_count
/**
 *  smarty modifier:count()
 *
 *  count()�ؿ���wrapper
 *
 *  sample:
 *  <code>
 *  $smarty->assign("array", array(1, 2, 3));
 *
 *  {$array|@count}
 *  </code>
 *  <code>
 *  3
 *  </code>
 *
 *  @param  array   $array  �оݤȤʤ�����
 *  @return int     ��������ǿ�
 */
function smarty_modifier_count($array)
{
    return count($array);
}
// }}}

// {{{ smarty_modifier_join
/**
 *  smarty modifier:join()
 *
 *  join()�ؿ���wrapper
 *
 *  sample:
 *  <code>
 *  $smarty->assign("array", array(1, 2, 3));
 *
 *  {$array|@join:":"}
 *  </code>
 *  <code>
 *  1:2:3
 *  </code>
 *
 *  @param  array   $array  join�оݤ�����
 *  @param  string  $glue   Ϣ��ʸ����
 *  @return string  Ϣ����ʸ����
 */
function smarty_modifier_join($array, $glue)
{
    if (is_array($array) == false) {
        return $array;
    }
    return implode($glue, $array);
}
// }}}

// {{{ smarty_modifier_filter
/**
 *  smarty modifier:filter()
 *
 *  ���ꤵ�줿Ϣ������Τ���$key�ǻ��ꤵ�줿���ǤΤߤ�����˺ƹ�������
 *
 *  sample:
 *  <code>
 *  $smarty->assign("array", array(
 *      array("foo" => 1, "bar" => 4),
 *      array("foo" => 2, "bar" => 5),
 *      array("foo" => 3, "bar" => 6),
 *  ));
 *
 *  {$array|@filter:"foo"|@join:","}
 *  </code>
 *  <code>
 *  1,2,3
 *  </code>
 *  
 *  @param  array   $array  filter�оݤȤʤ�����
 *  @param  string  $key    ȴ���Ф��������������Ϣ������Υ���
 *  @return array   �ƹ������줿����
 */
function smarty_modifier_filter($array, $key)
{
    if (is_array($array) == false) {
        return $array;
    }
    $tmp = array();
    foreach ($array as $v) {
        if (isset($v[$key]) == false) {
            continue;
        }
        $tmp[] = $v[$key];
    }
    return $tmp;
}
// }}}

// {{{ smarty_modifier_unique
/**
 *  smarty modifier:unique()
 *
 *  unique()�ؿ���wrapper
 *
 *  sample:
 *  <code>
 *  $smarty->assign("array1", array("a", "a", "b", "a", "b", "c"));
 *  $smarty->assign("array2", array(
 *      array("foo" => 1, "bar" => 4),
 *      array("foo" => 1, "bar" => 4),
 *      array("foo" => 1, "bar" => 4),
 *      array("foo" => 2, "bar" => 5),
 *      array("foo" => 3, "bar" => 6),
 *      array("foo" => 2, "bar" => 5),
 *  ));
 *
 *  {$array1|@unique}
 *  {$array2|@unique:"foo"}
 *  </code>
 *  <code>
 *  abc
 *  123
 *  </code>
 *  
 *  @param  array   $array  �����оݤȤʤ�����
 *  @param  key     $key    �����оݤȤʤ륭��(null�ʤ���������)
 *  @return array   �ƹ������줿����
 */
function smarty_modifier_unique($array, $key = null)
{
    if (is_array($array) == false) {
        return $array;
    }
    if ($key != null) {
        $tmp = array();
        foreach ($array as $v) {
            if (isset($v[$key]) == false) {
                continue;
            }
            $tmp[$v[$key]] = $v;
        }
        return $tmp;
    } else {
        return array_unique($array);
    }
}
// }}}

// {{{ smarty_modifier_wordwrap_i18n
/**
 *  smarty modifier:ʸ�����wordwrap����
 *
 *  [����EUC-JP�б���EUC-JP�Τ��б�]
 *
 *  sample:
 *  <code>
 *  {"������a��a��a����aaa������"|wordrap_i18n:8}
 *  </code>
 *  <code>
 *  ������a
 *  ��a��a��
 *  ��aaa��
 *  ����
 *  </code>
 *
 *  @param  string  $string wordwrap����ʸ����
 *  @param  string  $break  ����ʸ��
 *  @param  int     $width  wordwrap��(Ⱦ��$widthʸ����wordwrap����)
 *  @param  int     $indent ����ǥ����(Ⱦ��$indentʸ��)
 *  @return string  wordwrap�������줿ʸ����
 */
function smarty_modifier_wordwrap_i18n($string, $width, $break = "\n", $indent = 0)
{
    $r = "";
    $i = "$break" . str_repeat(" ", $indent);
    $tmp = $string;
    do {
        $n = strpos($tmp, $break);
        if ($n !== false && $n < $width) {
            $s = substr($tmp, 0, $n);
            $r .= $s . $i;
            $tmp = substr($tmp, strlen($s) + strlen($break));
            continue;
        }

        $s = mb_strimwidth($tmp, 0, $width, "", "EUC-JP");

        // EUC-JP�Τ��б�
        $n = strlen($s);
        if ($n >= $width && $tmp{$n} != "" && $tmp{$n} != " ") {
            while ((ord($s{$n-1}) & 0x80) == 0) {
                if ($s{$n-1} == " " || $n == 0) {
                    break;
                }
                $n--;
            }
        }
        $s = substr($s, 0, $n);

        $r .= $s . $i;
        $tmp = substr($tmp, strlen($s));
    } while (strlen($s) > 0);

    $r = preg_replace('/\s+$/', '', $r);

    return $r;
}
// }}}

// {{{ smarty_modifier_truncate_i18n
/**
 *  smarty modifier:ʸ�����ڤ�ͤ����(i18n�б�)
 *
 *  sample:
 *  <code>
 *  {"���ܸ�Ǥ�"|truncate_i18n:5:"..."}
 *  </code>
 *  <code>
 *  ����...
 *  </code>
 *
 *  @param  int     $len        ����ʸ����
 *  @param  string  $postfix    �������ղä���ʸ����
 */
function smarty_modifier_truncate_i18n($string, $len = 80, $postfix = "...")
{
    return mb_strimwidth($string, 0, $len, $postfix);
}
// }}}

// {{{ smarty_modifier_i18n
/**
 *  smarty modifier:i18n�ե��륿
 *
 *  sample:
 *  <code>
 *  {"english"|i18n}
 *  </code>
 *  <code>
 *  �Ѹ�
 *  </code>
 *
 *  @param  string  $string i18n�����оݤ�ʸ����
 *  @return string  ��������б�������å�����
 */
function smarty_modifier_i18n($string)
{
    $c =& Ethna_Controller::getInstance();

    $i18n =& $c->getI18N();

    return $i18n->get($string);
}
// }}}

// {{{ smarty_modifier_checkbox
/**
 *  smarty modifier:�����å��ܥå����ѥե��륿
 *
 *  sample:
 *  <code>
 *  <input type="checkbox" name="test" {""|checkbox}>
 *  <input type="checkbox" name="test" {"1"|checkbox}>
 *  </code>
 *  <code>
 *  <input type="checkbox" name="test">
 *  <input type="checkbox" name="test" checkbox>
 *  </code>
 *
 *  @param  string  $string �����å��ܥå������Ϥ��줿�ե�������
 *  @return string  $string����ʸ���󤢤뤤��0�ʳ��ξ���"checked"
 */
function smarty_modifier_checkbox($string)
{
    if ($string != "" && $string != 0) {
        return "checked";
    }
}
// }}}

// {{{ smarty_modifier_select
/**
 *  smarty modifier:���쥯�ȥܥå����ѥե��륿
 *
 *  ñ��ʥ��쥯�ȥܥå����ξ���smarty�ؿ�"select"�����Ѥ��뤳�Ȥ�
 *  �������ά��ǽ
 *
 *  sample:
 *  <code>
 *  $smarty->assign("form", 1);
 *
 *  <option value="1" {$form|select:"1"}>foo</option>
 *  <option value="2" {$form|select:"2"}>bar</option>
 *  </code>
 *  <code>
 *  <option value="1" selected>foo</option>
 *  <option value="2" >bar</option>
 *  </code>
 *
 *  @param  string  $string ���쥯�ȥܥå������Ϥ��줿�ե�������
 *  @param  string  $value  <option>�����˻��ꤵ��Ƥ�����
 *  @return string  $string��$value�˥ޥå��������"selected"
 */
function smarty_modifier_select($string, $value)
{
    if ($string == $value) {
        return 'selected="true"';
    }
}
// }}}

// {{{ smarty_modifier_form_value
/**
 *  smarty modifier:�ե������ͽ��ϥե��륿
 *
 *  �ե�����̾���ѿ��ǻ��ꤷ�ƥե������ͤ�������������˻��Ѥ���
 *
 *  sample:
 *  <code>
 *  $this->af->set('foo', 'bar);
 *  $smarty->assign('key', 'foo');
 *  {$key|form_value}
 *  </code>
 *  <code>
 *  bar
 *  </code>
 *
 *  @param  string  $string �ե��������̾
 *  @return string  �ե�������
 */
function smarty_modifier_form_value($string)
{
    $c =& Ethna_Controller::getInstance();
    $af =& $c->getActionForm();

    $elts = explode(".", $string);
    $r = $af->get($elts[0]);
    for ($i = 1; $i < count($elts); $i++) {
        $r = $r[$elts[$i]];
    }

    return htmlspecialchars($r, ENT_QUOTES);
}
// }}}

// {{{ smarty_function_is_error
/**
 *  smarty function:���ꤵ�줿�ե�������ܤǥ��顼��ȯ�����Ƥ��뤫�ɤ������֤�
 *  NOTE: {if is_error('name')} �� Ethna_Util.php �� is_error() �Ǥ��äơ�
 *        smarty_function_is_error() �ǤϤʤ����Ȥ����
 *
 *  @param  string  $name   �ե��������̾
 */
function smarty_function_is_error($params, &$smarty)
{
    $name = isset($params['name']) ? $params['name'] : null;
    return is_error($name);
}
// }}}

// {{{ smarty_function_message
/**
 *  smarty function:���ꤵ�줿�ե�������ܤ��б����륨�顼��å���������Ϥ���
 *
 *  sample:
 *  <code>
 *  <input type="text" name="foo">{message name="foo"}
 *  </code>
 *  <code>
 *  <input type="text" name="foo">foo�����Ϥ��Ƥ�������
 *  </code>
 *
 *  @param  string  $name   �ե��������̾
 */
function smarty_function_message($params, &$smarty)
{
    if (isset($params['name']) === false) {
        return '';
    }

    $c =& Ethna_Controller::getInstance();
    $action_error =& $c->getActionError();

    $message = $action_error->getMessage($params['name']);
    if ($message === null) {
        return '';
    }

    $id = isset($params['id']) ? $params['id']
        : str_replace("_", "-", "ethna-error-" . $params['name']);
    $class = isset($params['class']) ? $params['class'] : "ethna-error";
    return sprintf('<span class="%s" id="%s">%s</span>',
        $class, $id, htmlspecialchars($message));
}
// }}}

// {{{ smarty_function_uniqid
/**
 *  smarty function:��ˡ���ID����������(double post�����å���)
 *
 *  sample:
 *  <code>
 *  {uniqid}
 *  </code>
 *  <code>
 *  <input type="hidden" name="uniqid" value="a0f24f75e...e48864d3e">
 *  </code>
 *
 *  @param  string  $type   ɽ��������("get" or "post"�ݥǥե����="post")
 *  @see    isDuplicatePost
 */
function smarty_function_uniqid($params, &$smarty)
{
    $uniqid = Ethna_Util::getRandom();
    if (isset($params['type']) && $params['type'] == 'get') {
        return "uniqid=$uniqid";
    } else {
        return "<input type=\"hidden\" name=\"uniqid\" value=\"$uniqid\" />\n";
    }
}
// }}}

// {{{ smarty_function_select
/**
 *  smarty function:���쥯�ȥե����������
 *
 *  @param  array   $list   ��������
 *  @param  string  $name   �ե��������̾
 *  @param  string  $value  ���쥯�ȥܥå������Ϥ��줿�ե�������
 *  @param  string  $empty  ������ȥ�(��---���򤷤Ʋ�����---����)
 *  @deprecated
 */
function smarty_function_select($params, &$smarty)
{
    extract($params);

    print "<select name=\"$name\">\n";
    if ($empty) {
        printf("<option value=\"\">%s</option>\n", $empty);
    }
    foreach ($list as $id => $elt) {
        printf("<option value=\"%s\" %s>%s</option>\n", $id, $id == $value ? 'selected="true"' : '', $elt['name']);
    }
    print "</select>\n";
}
// }}}

// {{{ smarty_function_checkbox_list
/**
 *  smarty function:�����å��ܥå����ե��륿�ؿ�(�����б�)
 *
 *  @param  string  $form   �����å��ܥå������Ϥ��줿�ե�������
 *  @param  string  $key    ɾ���оݤ����󥤥�ǥå���
 *  @param  string  $value  ɾ����
 *  @deprecated
 */
function smarty_function_checkbox_list($params, &$smarty)
{
    extract($params);

    if (isset($key) == false) {
        $key = null;
    }
    if (isset($value) == false) {
        $value = null;
    }
    if (isset($checked) == false) {
        $checked = "checked";
    }

    if (is_null($key) == false) {
        if (isset($form[$key])) {
            if (is_null($value)) {
                print $checked;
            } else {
                if (strcmp($form[$key], $value) == 0) {
                    print $checked;
                }
            }
        }
    } else if (is_null($value) == false) {
        if (is_array($form)) {
            if (in_array($value, $form)) {
                print $checked;
            }
        } else {
            if (strcmp($value, $form) == 0) {
                print $checked;
            }
        }
    }
}
// }}}

// {{{ smarty_function_url
/**
 *  smarty function:url����
 */
function smarty_function_url($params, &$smarty)
{
    $action = $path = $path_key = null;
    $query = $params;

    foreach (array('action', 'anchor', 'scheme') as $key) {
        if (isset($params[$key])) {
            ${$key} = $params[$key];
        } else {
            ${$key} = null;
        }
        unset($query[$key]);
    }

    $c =& Ethna_Controller::getInstance();
    $config =& $c->getConfig();
    $url_handler =& $c->getUrlHandler();
    list($path, $path_key) = $url_handler->actionToRequest($action, $query);

    if ($path != "") {
        if (is_array($path_key)) {
            foreach ($path_key as $key) {
                unset($query[$key]);
            }
        }
    } else {
        $query = $url_handler->buildActionParameter($query, $action);
    }
    $query = $url_handler->buildQueryParameter($query);

    $url = sprintf('%s%s', $config->get('url'), $path);

    if (preg_match('|^(\w+)://(.*)$|', $url, $match)) {
        if ($scheme) {
            $match[1] = $scheme;
        }
        $match[2] = preg_replace('|/+|', '/', $match[2]);
        $url = $match[1] . '://' . $match[2];
    }

    $url .= $query ? "?$query" : "";
    $url .= $anchor ? "#$anchor" : "";

    return $url;
}
// }}}

// {{{ smarty_function_form_name
/**
 *  smarty function:�ե�����ɽ��̾����
 *
 *  @param  string  $name   �ե��������̾
 */
function smarty_function_form_name($params, &$smarty)
{
    // name
    if (isset($params['name'])) {
        $name = $params['name'];
        unset($params['name']);
    } else {
        return null;
    }

    // view object
    $c =& Ethna_Controller::getInstance();
    $view =& $c->getView();
    if ($view === null) {
        return null;
    }

    // action
    $action = null;
    if (isset($params['action'])) {
        $action = $params['action'];
        unset($params['action']);
    } else {
        for ($i = count($smarty->_tag_stack); $i >= 0; --$i) {
            if ($smarty->_tag_stack[$i][0] === 'form') {
                if (isset($smarty->_tag_stack[$i][1]['ethna_action'])) {
                    $action = $smarty->_tag_stack[$i][1]['ethna_action'];
                }
                break;
            }
        }
    }
    if ($action !== null) {
        $view->addActionFormHelper($action);
    }

    return $view->getFormName($name, $action, $params);
}
// }}}

// {{{ smarty_function_form_submit
/**
 *  smarty function:�ե������submit�ܥ�������
 *
 *  @param  string  $submit   �ե��������̾
 */
function smarty_function_form_submit($params, &$smarty)
{
    $c =& Ethna_Controller::getInstance();
    $view =& $c->getView();
    if ($view === null) {
        return null;
    }
    return $view->getFormSubmit($params);
}
// }}}

// {{{ smarty_function_form_input
/**
 *  smarty function:�ե����ॿ������
 *
 *  @param  string  $name   �ե��������̾
 */
function smarty_function_form_input($params, &$smarty)
{
    // name
    if (isset($params['name'])) {
        $name = $params['name'];
        unset($params['name']);
    } else {
        return null;
    }

    // view object
    $c =& Ethna_Controller::getInstance();
    $view =& $c->getView();
    if ($view === null) {
        return null;
    }

    // ���ߤ�{form_input}��Ϥ�form block������Хѥ�᡼����������Ƥ���
    $block_params = null;
    for ($i = count($smarty->_tag_stack); $i >= 0; --$i) {
        if ($smarty->_tag_stack[$i][0] === 'form') {
            $block_params = $smarty->_tag_stack[$i][1];
            break;
        }
    }

    // action
    $action = null;
    if (isset($params['action'])) {
        $action = $params['action'];
        unset($params['action']);
    } else if (isset($block_params['ethna_action'])) {
        $action = $block_params['ethna_action'];
    }
    if ($action !== null) {
        $view->addActionFormHelper($action);
    }

    // default
    if (isset($params['default'])) {
        // {form_input default=...}�����ꤵ��Ƥ���Ф��Τޤ�

    } else if (isset($block_params['default'])) {
        // ��¦�� {form default=...} �֥�å�
        if (isset($block_params['default'][$name])) {
            $params['default'] = $block_params['default'][$name];
        }
    } else {
        // ���ߤΥ��������Ǽ�����ä��ե�������
        $af =& $c->getActionForm();
        $val = $af->get($name);
        if ($val !== null) {
            $params['default'] = $val;
        }
    }

    return $view->getFormInput($name, $action, $params);
}
// }}}

// {{{ smarty_block_form
/**
 *  smarty block:�ե����ॿ�����ϥץ饰����
 */
function smarty_block_form($params, $content, &$smarty, &$repeat)
{
    if ($repeat) {
        // {form}: �֥�å������˿ʤ����ν���

        // default
        if (isset($params['default']) === false) {
            // ����ʤ��ΤȤ��� $form ��Ȥ�
            $c =& Ethna_Controller::getInstance();
            $af =& $c->getActionForm();

            // c.f. http://smarty.php.net/manual/en/plugins.block.functions.php
            $smarty->_tag_stack[count($smarty->_tag_stack)-1][1]['default']
                =& $af->getArray(false);
        }

        // �������֤��ͤϽ��Ϥ���ʤ�
        return '';

    } else {
        // {/form}: �֥�å����Τ����

        $c =& Ethna_Controller::getInstance();
        $view =& $c->getView();
        if ($view === null) {
            return null;
        }

        // ethna_action
        if (isset($params['ethna_action'])) {
            $ethna_action = $params['ethna_action'];
            unset($params['ethna_action']);

            $view->addActionFormHelper($ethna_action);
            $hidden = $c->getActionRequest($ethna_action, 'hidden');
            $content = $hidden . $content;
        }

        // enctype ��ά���б�
        if (isset($params['enctype'])) {
            if ($params['enctype'] == 'file'
                || $params['enctype'] == 'multipart') {
                $params['enctype'] = 'multipart/form-data';
            } else if ($params['enctype'] == 'url') {
                $params['enctype'] = 'application/x-www-form-urlencoded';
            }
        }

        // default�Ϥ⤦����
        if (isset($params['default'])) {
            unset($params['default']);
        }

        // $content��Ϥ�<form>�֥�å����Τ����
        return $view->getFormBlock($content, $params);
    }
}
// }}}


// {{{ smarty_function_csrfid
/**
 *  smarty function: �����ʥݥ��ȤǤ��뤳�Ȥ��ݾڤ���ID����Ϥ���
 *
 *  sample:
 *  <code>
 *  {csrfid}
 *  </code>
 *  <code>
 *  <input type="hidden" name="csrfid" value="a0f24f75e...e48864d3e">
 *  </code>
 *
 *  @param  string  $type   ɽ��������("get" or "post"�ݥǥե����="post")
 *  @see    isRequestValid
 */
function smarty_function_csrfid($params, &$smarty)
{
    $c =& Ethna_Controller::getInstance();
    $name = $c->config->get('csrf');
    if (is_null($name)) {
        $name = 'Session';
    }
    $plugin =& $c->getPlugin();
    $csrf = $plugin->getPlugin('Csrf', $name);
    $csrfid = $csrf->get();
    $token_name = $csrf->getName();
    if (isset($params['type']) && $params['type'] == 'get') {
        return sprintf("%s=%s", $token_name, $csrfid);
    } else {
        return sprintf("<input type=\"hidden\" name=\"%s\" value=\"%s\" />\n", $token_name, $csrfid);
    }
}
// }}}

?>
