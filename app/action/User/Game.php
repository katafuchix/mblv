<?php
/**
 * Game.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��������ݡ����륢�������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */class Tv_Form_UserGame extends Tv_ActionForm
{
}

/**
 * �桼��������ݡ����륢�������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserGame extends Tv_ActionUserOnly
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
		// ����ü�����ɤ���Ƚ�̳���
		$o =& new Tv_Config($this->backend,'config_type', 'game');
		
		// �ե��������̼���
		switch($GLOBALS['EMOJIOBJ']->carrier)
		{
			case 'DOCOMO':
				$term_list = $o->get('site_low_term_d');
				break;
			case 'AU':
				$term_list = $o->get('site_low_term_a');
				break;
			case 'SOFTBANK':
				$term_list = $o->get('site_low_term_s');
				break;
			default:
				break;
		}
		// ����ü�����ɤ���Ƚ��
		$low_term = false;
		$term_list = explode("\n", $term_list);
		if(count($term_list) > 0){
			$um = $this->backend->getManager('Util');
			$model = $um->getModel();
			$device = strtolower($model);
			foreach($term_list as $v){
				if($v){
					if($device == strtolower(trim($v))){
						$low_term = true;
					}
				}
			}
		}
		// ����ü���ξ��
		if($low_term){
			$this->af->set('code', 'system_game_device');
			return 'user_contents';
		}
		return 'user_game';
	}
}
?>