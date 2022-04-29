<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������𥫥ƥ����Խ����������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
require_once 'Edit/Do.php';
class Tv_Form_AdminAdcategoryEdit extends Tv_Form_AdminAdcategoryEditDo
{
}

/**
 * �������𥫥ƥ����Խ����������¹ԥ��饹
 * 
 * ���𥫥ƥ����Խ��ե�������̤�ɽ�����ޤ�
 *
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAdcategoryEdit extends Tv_ActionAdminOnly
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
		// ad_category_id���鹭��������
		$ac =& new Tv_AdCategory($this->backend, 'ad_category_id', $this->af->get('ad_category_id'));
		$ac->exportForm();
		return 'admin_adcategory_edit';
	}
}
?>