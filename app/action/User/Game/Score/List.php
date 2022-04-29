<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼�������ॹ�����������������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserGameScoreList extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'game_id' => array(
			'required'	=> true,
		),
		'user_id' => array(
		),
		'term' => array(
		),
	);
}

/**
 * �桼�������ॹ�����������������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserGameScoreList extends Tv_ActionUserOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_error';
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
		if($this->af->get('user_id')){
			// ����Υ�����ˤ����롢����Υ桼���Υ�������󥭥�
			return 'user_game_score_list_user';
		}else{
			// ����Υ�����ˤ����롢���桼���Υ�������󥭥�
			return 'user_game_score_list_game';
		}
	}
}
?>