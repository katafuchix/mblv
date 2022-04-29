<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����ǥ��᡼�륫�ƥ���ͥ���ٹ����¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminDecomailcategoryPriorityDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'decomail_category_priority_id' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
	);
}

/**
 * �����ǥ��᡼�륫�ƥ���ͥ���ٹ����¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminDecomailcategoryPriorityDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼�ξ��
		if ($this->af->validate() > 0) return 'admin_decomailcategory_list';
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
		// �ǥ��᡼�륫�ƥ����Խ�
		$decomail_category_priority_id = $this->af->get('decomail_category_priority_id');
		$timestamp = date('Y-m-d H:i:s');
		foreach($decomail_category_priority_id as $k => $v){
			if($k){
				$dc =& new Tv_DecomailCategory($this->backend, 'decomail_category_id', $k);
				$dc->set('decomail_category_priority_id', $v);
				$r = $dc->update();
				if(Ethna::isError($r)) return 'admin_decomailcategory_list';
			}
		}
		
		$this->ae->add(null, '', I_ADMIN_DECOMAIL_CATEGORY_PRIORITY_DONE);
		return 'admin_decomailcategory_list';
	}
}
?>