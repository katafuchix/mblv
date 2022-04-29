<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������ߥ�˥ƥ����ƥ������¹Խ������������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminConfigCommunityCategoryDeleteDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = true;
	/** @var    array   �ե���������� */
	var $form = array(
		'community_category_id' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
	);
}

/**
 * �������ߥ�˥ƥ����ƥ������¹Խ������������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminConfigCommunityCategoryDeleteDo extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_config_community_category_delete';
		
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
		// ���ߥ�˥ƥ����ƥ��ꥪ�֥������Ȥ��������
		$category =& new Tv_CommunityCategory($this->backend,'community_category_id',$this->af->get('community_category_id'));
		$category->set('community_category_status',0);
		$category->update();
		
		// ��å�����
		$this->ae->add(null, '', I_ADMIN_CONFIG_COMMUNITY_CATEGORY_DELETE_DONE);
		
		return 'admin_config_community_category';
	}
}
?>