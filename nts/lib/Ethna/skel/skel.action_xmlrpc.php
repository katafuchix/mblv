<?php
/**
 *  {$action_path}
 *
 *  @author     {$author}
 *  @package    {$project_id}
 *  @version    $Id: skel.action_xmlrpc.php,v 1.4 2006/11/06 14:31:24 cocoitiban Exp $
 */

/**
 *  {$action_name}�ե�����μ���
 *
 *  @author     {$author}
 *  @access     public
 *  @package    {$project_id}
 */
class {$action_form} extends {$project_id}_ActionForm
{
    /** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
    var $use_validator_plugin = true;

    /**
     *  @access private
     *  @var    array   �ե����������
     */
    var $form = array(
        /*
        'sample' => array(
            // �ե���������
            'type'          => VAR_TYPE_INT,    // �����ͷ�
            'form_type'     => FORM_TYPE_TEXT,  // �ե����෿
            'name'          => '����ץ�',      // ɽ��̾

            // �Х�ǡ���(���ҽ�˥Х�ǡ������¹Ԥ���ޤ�)
            'required'      => true,            // ɬ�ܥ��ץ����(true/false)
            'min'           => null,            // �Ǿ���
            'max'           => null,            // ������
            'regexp'        => null,            // ʸ�������(����ɽ��)

            // �ե��륿
            'filter'        => null,            // �������Ѵ��ե��륿���ץ����
        ),
        */
    );
}

/**
 *  {$action_name}���������μ���
 *
 *  @author     {$author}
 *  @access     public
 *  @package    {$project_id}
 */
class {$action_class} extends {$project_id}_ActionClass
{
    /**
     *  {$action_name}����������������
     *
     *  @access public
     *  @return string      ����̾(���ｪλ�ʤ�null, ������λ�ʤ�false)
     */
    function prepare()
    {
        return null;
    }

    /**
     *  {$action_name}���������μ���
     *
     *  @access public
     *  @return string  ����̾
     */
    function perform()
    {
        return '{$action_name}';
    }
}
?>
