<?php
/**
 * Decomail.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * �桼���ǥ��᡼��ݡ����륢�������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserDecomail extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		
	);
}
/**
 * �桼���ǥ��᡼��ݡ����륢�������¹ԥ��饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserDecomail extends Tv_ActionUserOnly
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
		$o =& new Tv_Cms($this->backend, 'cms_type', 3);
		
		// �ե��������̼���
		switch($GLOBALS['EMOJIOBJ']->carrier)
		{
			case 'DOCOMO':
				$term_list = $o->get('low_term_d');
				break;
			case 'AU':
				$term_list = $o->get('low_term_a');
				break;
			case 'SOFTBANK':
				$term_list = $o->get('low_term_s');
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
			$SESSID = session_id();
			$this->af->set('code', 'decomail_device');
			return 'user_contents';
//			header("Location: fp.php?code=decomail_device&SESSID={$SESSID}");
		}
		return 'user_decomail';
	}
}

?>
