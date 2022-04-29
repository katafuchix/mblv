<?php
/**
 * Search.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�����ߥ�˥ƥ��ȥԥå��������������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserCommunityArticleSearch extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'keyword' => array(
			'name'		=> '�����܎��Ď�',
			'form_type'	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
		),
		'search' => array(
			'name'		=> '����',
			'form_type'	=> FORM_TYPE_SUBMIT,
			'type'		=> VAR_TYPE_STRING,
		),
	);
}

/**
 * �桼�����ߥ�˥ƥ��ȥԥå��������������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserCommunityArticleSearch extends Tv_ActionUserOnly
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
		if($this->af->validate() > 0) return 'user_community_article_search';
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
		return 'user_community_article_search';
	}
}
?>