<?php
// vim: foldmethod=marker
/**
 *  Ethna_Renderer.php
 *
 *  @author     Kazuhiro Hosoi <hosoi@gree.co.jp>
 *  @license    http://www.opensource.org/licenses/bsd-license.php The BSD License
 *  @package    Ethna
 *  @version    $Id: Ethna_Renderer.php,v 1.6 2006/11/28 04:52:54 ichii386 Exp $
 */

// {{{ Ethna_Renderer
/**
 *  �����饯�饹��Mojavi�Τޤ͡�
 *
 *  @author     Kazuhiro Hosoi <hosoi@gree.co.jp>
 *  @access     public
 *  @package    Ethna
 */
class Ethna_Renderer
{
    /**#@+
     *  @access private
     */

    /** @var    object  Ethna_Controller    controller���֥������� */
    var $controller;

    /** @var    object  Ethna_Controller    controller���֥�������($controller�ξ�ά��) */
    var $ctl;

    /** @var    string  template directory  */
    var $template_dir;

    /** @var    string  template engine */
    var $engine;

    /** @var    string  template file */
    var $template;

    /** @var    string  �ƥ�ץ졼���ѿ� */
    var $prop;
    
    /** @var    string  ������ץ饰����(Ethna_Plugin�Ȥϴط��ʤ�) */
    var $plugin_registry;
    
    /**
     *  Ethna_Renderer���饹�Υ��󥹥ȥ饯��
     *
     *  @access public
     */
    function Ethna_Renderer(&$controller)
    {
        $this->controller =& $controller;
        $this->ctl =& $this->controller;
        $this->template_dir = null;
        $this->engine = null;
        $this->template = null;
        $this->prop = array();
        $this->plugin_registry = array();
    }

    /**
     *  �ӥ塼����Ϥ���
     *
     *  @param string   $template   �ƥ�ץ졼��
     *
     *  @access public
     */
    function perform($template = null)
    {
        if ($template == null && $this->template == null) {
            return Ethna::raiseWarning('template is not defined');
        }

        if ($template != null) {
            $this->template = $template;
        }

        // �ƥ�ץ졼�Ȥ�̵ͭ�Υ����å�
        if (is_readable($this->template_dir . $this->template)) {
            include_once $this->template_dir . $this->template;
        } else {
            return Ethna::raiseWarning("template is not found: " . $this->template);
        }
    }

    /**
     *  �ƥ�ץ졼�ȥ��󥸥���������
     * 
     *  @return object   Template Engine.
     * 
     *  @access public
     */
    function &getEngine()
    {
        return $this->engine;
    }

    /**
     *  �ƥ�ץ졼�ȥǥ��쥯�ȥ���������
     * 
     *  @return string   Template Directory
     * 
     *  @access public
     */
    function getTemplateDir()
    {
        return $this->template_dir;
    }

    /**
     *  �ƥ�ץ졼���ѿ����������
     * 
     *  @param string $name  �ѿ�̾
     * 
     *  @return mixed    �ѿ�
     * 
     *  @access public
     */
    function &getProp($name)
    {
        if (isset($this->prop[$name])) {
            return $this->prop[$name];
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
    function &removeProp($name)
    {
        if (isset($this->prop[$name])) {
            unset($this->prop[$name]);
        }
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
        $this->prop = array_merge($this->prop, $array);
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
        $keys  = array_keys($array);
        $count = sizeof($keys);

        for ($i = 0; $i < $count; $i++) {
            $this->prop[$keys[$i]] =& $array[$keys[$i]];
        }
    }

    /**
     * �ƥ�ץ졼���ѿ��������Ƥ�
     * 
     * @param string $name �ѿ�̾
     * @param mixed $value ��
     * 
     * @access public
     */
    function setProp($name, $value)
    {
        $this->prop[$name] = $value;
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
        $this->prop[$name] =& $value;
    }

    /**
     *  �ƥ�ץ졼�Ȥ������Ƥ�
     * 
     *  @param string $template �ƥ�ץ졼��̾
     * 
     *  @access public
     */
    function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     *  �ƥ�ץ졼�ȥǥ��쥯�ȥ�������Ƥ�
     * 
     *  @param string $dir �ǥ��쥯�ȥ�̾
     * 
     *  @access public
     */
    function setTemplateDir($dir)
    {
        $this->template_dir = $dir;

        if (substr($this->template_dir, -1) != '/') {
            $this->template_dir .= '/';
        }
    }
    
    /**
     *  �ƥ�ץ졼�Ȥ�̵ͭ������å�����
     * 
     *  @param string $template �ƥ�ץ졼��̾
     * 
     *  @access public
     */
    function templateExists($template)
    {
        if (substr($this->template_dir, -1) != '/') {
            $this->template_dir .= '/';
        }

        return (is_readable($this->template_dir . $template));
    }

    /**
     *  �ץ饰����򥻥åȤ���
     * 
     *  @param string $name���ץ饰����̾
     *  @param string $type �ץ饰���󥿥���
     *  @param string $plugin �ץ饰��������
     * 
     *  @access public
     */
    function setPlugin($name, $type, $plugin)
    {
        $this->plugin_registry[$type][$name] = $plugin;
    }

    // {{{ proxy methods (for B.C.)
    /**
     *  �ƥ�ץ졼���ѿ��������Ƥ�(�����ߴ�)
     *
     *  @access public
     */
    function assign($name, $value)
    {
        $this->setProp($name, $value);
    }

    /**
     *  �ƥ�ץ졼���ѿ��˻��Ȥ������Ƥ�(�����ߴ�)
     *
     *  @access public
     */
    function assign_by_ref($name, &$value)
    {
        $this->setPropByRef($name, $value);
    }

    /**
     *  �ӥ塼����Ϥ���
     *
     *  @access public
     */
    function display($template = null)
    {
        return $this->perform($template);
    }
    // }}}
}
// }}}
?>
