<?php
/**
 * Top.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼������ȥåץ��������ե�����
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
 class Tv_Form_UserTop extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
	);
}

/**
 * �桼������ȥåץ��������
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserTop extends Tv_ActionUser
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
		$sns_info = $this->config->get('sns_info');
		
		// �ե��������̼���
		switch($GLOBALS['EMOJIOBJ']->carrier)
		{
			case 'DOCOMO':
				$term_list = $sns_info['sns_low_term_d'];
				break;
			case 'AU':
				$term_list = $sns_info['sns_low_term_a'];
				break;
			case 'SOFTBANK':
				$term_list = $sns_info['sns_low_term_s'];
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
			$this->af->set('code', 'guide_device');
			return 'user_contents';
		}
		return 'user_top';
	}
}

?>
