<?php
/**
 * Search.php
 * 
 * @author	   Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ��������������ե�����
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_Form_UserCommunitySearch extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'keyword' => array(
			'name'		=> '�����܎��Ď�',
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
		),
		'community_category_id' => array(
			'name'		=> '���Î��ގ�',
			'form_type'	=> FORM_TYPE_SELECT,
			'type'		=> VAR_TYPE_INT,
			'option'		=> 'Util,community_category',
		),
		'search' => array(
			'name'		=> '����',
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ��������������
 * 
 * @author	   Technovarth
 * @access	   public
 * @package    MBLV
 */
class Tv_Action_UserCommunitySearch extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		// ���ڥ��顼
		if($this->af->validate() > 0){
			return 'user_community_search';
		}
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
		return 'user_community_search';
	}
}
?>