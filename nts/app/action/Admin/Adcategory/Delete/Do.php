<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �������𥫥ƥ��������������ե����९�饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAdcategoryDeleteDo extends Tv_ActionForm
{
	/** @var	bool	�Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var	array   �ե���������� */
	var $form = array(
		'ad_category_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * �������𥫥ƥ��������������¹ԥ��饹
 * 
 * ���𥫥ƥ�������������¹Ԥ��ޤ�
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAdcategoryDeleteDo extends Tv_ActionAdminOnly
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
		// ad_category_id���鹭�𥫥ƥ�������ʪ��������ʤ���
		$ac =& new Tv_AdCategory($this->backend, 'ad_category_id', $this->af->get('ad_category_id'));
		$ac->set('ad_category_status', 0);
		// ����
		$r = $ac->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_adcategory_list';
		
		$this->ae->add(null, '', I_ADMIN_AD_CATEGORY_DELETE_DONE);
		return 'admin_adcategory_list';
	}
}
?>