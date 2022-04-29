<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ǥ��᡼�륫�ƥ������¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminDecomailcategoryDeleteDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'decomail_category_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �����ǥ��᡼�륫�ƥ������¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminDecomailcategoryDeleteDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		return null;
	}
	
	/**
	 * ���������¹�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ܤϹԤ�ʤ�)
	 */
	function perform()
	{
		// �ǥ��᡼�륫�ƥ�������ʪ��������ʤ�
		$ac =& new Tv_DecomailCategory($this->backend, 'decomail_category_id', $this->af->get('decomail_category_id'));
		$ac->set('decomail_category_status', 0);
		// ����
		$r = $ac->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_decomailcategory_list';
		
		$this->ae->add(null, '', I_ADMIN_DECOMAIL_CATEGORY_DELETE_DONE);
		return 'admin_decomailcategory_list';
	}
}
?>