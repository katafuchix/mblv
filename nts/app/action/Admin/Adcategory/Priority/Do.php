<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������𥫥ƥ���ͥ���ٹ������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAdcategoryPriorityDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var	array   �ե���������� */
	var $form = array(
		'ad_category_priority_id' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> array(VAR_TYPE_INT),
			'required'	=> true,
		),
	);
}

/**
 * �������𥫥ƥ���ͥ���ٹ������������¹ԥ��饹
 * 
 * ���𥫥ƥ���ͥ���٤򹹿����ޤ�
 *
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAdcategoryPriorityDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_adcategory_list';
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
		// ���𥫥ƥ����Խ�
		$ad_category_priority_id = $this->af->get('ad_category_priority_id');
		$timestamp = date('Y-m-d H:i:s');
		foreach($ad_category_priority_id as $k => $v){
			if($k){
				$ac =& new Tv_AdCategory($this->backend, 'ad_category_id', $k);
				$ac->set('ad_category_priority_id', $v);
				$r = $ac->update();
				if(Ethna::isError($r)) return 'admin_adcategory_list';
			}
		}
		
		$this->ae->add(null, '', I_ADMIN_AD_CATEGORY_PRIORITY_DONE);
		return 'admin_adcategory_list';
	}
}
?>