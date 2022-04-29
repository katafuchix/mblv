<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * ���������५�ƥ���ͥ���ٹ����¹Խ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminGamecategoryPriorityDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	
	/** @var	array   �ե���������� */
	var $form = array(
		'game_category_priority_id' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
	);
}

/**
 * ���������५�ƥ���ͥ���ٹ����¹Խ������������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminGamecategoryPriorityDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_gamecategory_list';
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
		// �����५�ƥ����Խ�
		$game_category_priority_id = $this->af->get('game_category_priority_id');
		$timestamp = date('Y-m-d H:i:s');
		foreach($game_category_priority_id as $k => $v){
			if($k){
				$gc =& new Tv_GameCategory($this->backend, 'game_category_id', $k);
				$gc->set('game_category_priority_id', $v);
				$r = $gc->update();
				if(Ethna::isError($r)) return 'admin_gamecategory_list';
			}
		}
		
		$this->ae->add(null, '', I_ADMIN_GAME_CATEGORY_PRIORITY_DONE);
		return 'admin_gamecategory_list';
	}
}
?>