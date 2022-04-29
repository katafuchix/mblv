<?php
// vim: foldmethod=marker
/**
 *  Ethna_Renderer_Smarty.php
 *
 *  @author     Kazuhiro Hosoi <hosoi@gree.co.jp>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Renderer_Smarty.php,v 1.15 2007/01/04 07:26:52 ichii386 Exp $
 */
require_once 'Smarty/Smarty.class.php';
require_once ETHNA_BASE . '/class/Ethna_SmartyPlugin.php';

// {{{ Ethna_Renderer_Smarty
/**
 *  Smarty�����饯�饹��Mojavi�Τޤ͡�
 *
 *  @author     Kazuhiro Hosoi <hosoi@gree.co.jp>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Renderer_Smarty extends Ethna_Renderer
{
    /** @var    string compile directory  */
    var $compile_dir;
    
    /**
     *  Ethna_Renderer_Smarty���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     */
    function Ethna_Renderer_Smarty(&$controller)
    {
        parent::Ethna_Renderer($controller);
        
        $this->engine =& new Smarty;
        
        $template_dir = $controller->getTemplatedir();
        $compile_dir = $controller->getDirectory('template_c');

        $this->setTemplateDir($template_dir);
        $this->compile_dir = $compile_dir;
        $this->engine->template_dir = $this->template_dir;
        $this->engine->compile_dir = $this->compile_dir;
        $this->engine->compile_id = md5($this->template_dir);

        // �������ФäƤߤ�
        if (is_dir($this->engine->compile_dir) === false) {
            Ethna_Util::mkdir($this->engine->compile_dir, 0755);
        }

        $this->engine->plugins_dir = array_merge(array(SMARTY_DIR . 'plugins'),
                                                 $controller->getDirectory('plugins'));

        $this->_setDefaultPlugin();
    }
    
    /**
     *  �ǥե���Ȥ�����.
     *
     *  @access public
     */
    function _setDefaultPlugin()
    {
        // default modifiers
        $this->setPlugin('number_format','modifier','smarty_modifier_number_format');
        $this->setPlugin('strftime','modifier','smarty_modifier_strftime');
        $this->setPlugin('count','modifier','smarty_modifier_count');
        $this->setPlugin('join','modifier','smarty_modifier_join');
        $this->setPlugin('filter','modifier', 'smarty_modifier_filter');
        $this->setPlugin('unique','modifier','smarty_modifier_unique');
        $this->setPlugin('wordwrap_i18n','modifier','smarty_modifier_wordwrap_i18n');
        $this->setPlugin('truncate_i18n','modifier','smarty_modifier_truncate_i18n');
        $this->setPlugin('i18n','modifier','smarty_modifier_i18n');
        $this->setPlugin('checkbox','modifier','smarty_modifier_checkbox');
        $this->setPlugin('select','modifier','smarty_modifier_select');
        $this->setPlugin('form_value','modifier','smarty_modifier_form_value');

        // default functions
        $this->setPlugin('is_error','function','smarty_function_is_error');
        $this->setPlugin('message','function','smarty_function_message');
        $this->setPlugin('uniqid','function','smarty_function_uniqid');
        $this->setPlugin('select','function','smarty_function_select');
        $this->setPlugin('checkbox_list','function','smarty_function_checkbox_list');
        $this->setPlugin('form_name','function','smarty_function_form_name');
        $this->setPlugin('form_input','function','smarty_function_form_input');
        $this->setPlugin('form_submit','function','smarty_function_form_submit');
        $this->setPlugin('url','function','smarty_function_url');
        $this->setPlugin('csrfid','function','smarty_function_csrfid');

        // default blocks
        $this->setPlugin('form','block','smarty_block_form');       
    }

    /**
     *  �ӥ塼����Ϥ���
     *
     *  @param  string   $template  �ƥ�ץ졼��̾
     *
     *  @access public
     */
    function perform($template = null)
    {
        if ($template === null && $this->template === null) {
            return Ethna::raiseWarning('template is not defined');
        }

        if ($template !== null) {
            $this->template = $template;
        }

        if ((is_absolute_path($this->template) && is_readable($this->template))
            || is_readable($this->template_dir . $this->template)) {
                $this->engine->display($this->template);
        } else {
            return Ethna::raiseWarning('template not found ' . $this->template);
        }
    }
    
    /**
     * �ƥ�ץ졼���ѿ����������
     * 
     *  @param string $name  �ѿ�̾
     *
     *  @return mixed���ѿ�
     *
     *  @access public
     */
    function &getProp($name = null)
    {
        $property =& $this->engine->get_template_vars($name);

        if ($property !== null) {
            return $property;
        }
        return null;
    }

    /**
     *  �ƥ�ץ졼���ѿ���������
     * 
     *  @param name    �ѿ�̾
     * 
     *  @access public
     */
    function removeProp($name)
    {
        $this->engine->clear_assign($name);
    }

    /**
     *  �ƥ�ץ졼���ѿ�������������Ƥ�
     * 
     *  @param array $array
     * 
     *  @access public
     */
    function setPropArray($array)
    {
        $this->engine->assign($array);
    }

    /**
     *  �ƥ�ץ졼���ѿ�������򻲾ȤȤ��Ƴ�����Ƥ�
     * 
     *  @param array $array
     * 
     *  @access public
     */
    function setPropArrayByRef(&$array)
    {
        $this->engine->assign_by_ref($array);
    }

    /**
     *  �ƥ�ץ졼���ѿ��������Ƥ�
     * 
     *  @param string $name �ѿ�̾
     *  @param mixed $value ��
     * 
     *  @access public
     */
    function setProp($name, $value)
    {
        $this->engine->assign($name, $value);
    }

    /**
     *  �ƥ�ץ졼���ѿ��˻��Ȥ������Ƥ�
     * 
     *  @param string $name �ѿ�̾
     *  @param mixed $value ��
     * 
     *  @access public
     */
    function setPropByRef($name, &$value)
    {
        $this->engine->assign_by_ref($name, $value);
    }

    /**
     *  �ץ饰����򥻥åȤ���
     * 
     *  @param string $name���ץ饰����̾
     *  @param string $type �ץ饰���󥿥���
     *  @param mixed $plugin �ץ饰��������
     * 
     *  @access public
     */
    function setPlugin($name, $type, $plugin) 
    {
        //�ץ饰����ؿ���̵ͭ������å�
        if (is_callable($plugin) === false) {
            return Ethna::raiseWarning('Does not exists.');
        }

        //�ץ饰����μ��������å�
        $register_method = 'register_' . $type;
        if (method_exists($this->engine, $register_method) === false) {
            return Ethna::raiseWarning('This plugin type does not exist');
        }

        // �ե��륿��̾���ʤ�����Ͽ
        if ($type === 'prefilter' || $type === 'postfilter' || $type === 'outputfilter') {
            parent::setPlugin($name, $type, $plugin);
            $this->engine->$register_method($plugin);
            return;
        }
        
        // �ץ饰�����̾��������å�
        if ($name === '') {
            return Ethna::raiseWarning('Please set plugin name');
        }
       
        // �ץ饰�������Ͽ����
        parent::setPlugin($name, $type, $plugin);
        $this->engine->$register_method($name, $plugin);
    }
}
// }}}
?>
