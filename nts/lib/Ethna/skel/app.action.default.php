<?php
/**
 *  Index.php
 *
 *  @author    {$author}
 *  @package   {$project_id}
 *  @version   $Id: app.action.default.php,v 1.15 2006/11/06 14:31:24 cocoitiban Exp $
 */

/**
 *  index�ե�����μ���
 *
 *  @author    {$author}
 *  @access    public
 *  @package   {$project_id}
 */

class {$project_id}_Form_Index extends {$project_id}_ActionForm
{
    /** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
    var $use_validator_plugin = false;

    /**
     *  @access   private
     *  @var      array   �ե����������
     */
     var $form = array(
       /*
        *  TODO: ���Υ�������󤬻��Ѥ���ե�����򵭽Ҥ��Ƥ�������
        *
        *  ������(type��������Ƥ����ǤϾ�ά��ǽ)��
        *
        *  'sample' => array(
        *  // �ե���������
        *      'type'        => VAR_TYPE_INT,        // �����ͷ�
        *      'form_type'   => FORM_TYPE_TEXT,      // �ե����෿
        *      'name'        => '����ץ�',          // ɽ��̾
        *  
        *  // �Х�ǡ���(���ҽ�˥Х�ǡ������¹Ԥ���ޤ�)
        *      'required'    => true,                        // ɬ�ܥ��ץ����(true/false)
        *      'min'         => null,                        // �Ǿ���
        *      'max'         => null,                        // ������
        *      'regexp'      => null,                        // ʸ�������(����ɽ��)
        *
        *  // �ե��륿
        *      'filter'      => null,                        // �������Ѵ��ե��륿���ץ����
        *  ),
        */
      );
}

/**
 *  index���������μ���
 *
 *  @author     {$author}
 *  @access     public
 *  @package    {$project_id}
 */
class {$project_id}_Action_Index extends {$project_id}_ActionClass
{
        /**
         *  index����������������
         *
         *  @access    public
         *  @return    string  Forward��(���ｪλ�ʤ�null)
         */
        function prepare()
        {
                return null;
        }

        /**
         *  index���������μ���
         *
         *  @access    public
         *  @return    string  ����̾
         */
        function perform()
        {
                return 'index';
        }
}
?>
