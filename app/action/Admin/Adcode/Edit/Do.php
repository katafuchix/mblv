<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������𥳡����Խ����������ե����९�饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAdcodeEditDo extends Tv_ActionForm
{
	/** @var    bool    �Х�ǡ����˥ץ饰�����Ȥ��ե饰 */
	var $use_validator_plugin = false;
	/** @var    array   �ե���������� */
	var $form = array(
		'ad_code_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'name'		=> '���𥳡���ID',
		),
		'ad_code_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'name'		=> '���𥳡���̾',
		),
		'ad_code_param' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'name'		=> '���𥳡��ɥѥ�᥿',
		),
		'ad_code_send_param' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '�桼��������쥯�Ȼ���Ϳǧ�ڥѥ�᥿',
		),
		'ad_code_uaid_param' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '�ݥ���ȥХå�������ǧ�ڥѥ�᥿',
		),
		'ad_code_status_param' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '�ݥ���ȥХå����������ơ�������ʬ�ѥ�᥿',
		),
		'ad_code_status_param_receive' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '�ݥ���ȥХå���������ǧ���ơ�����',
		),
		'ad_code_price_param' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '�ݥ���ȥХå�������������ʬ�ѥ�᥿',
		),
	);
}

/**
 * �������𥳡����Խ����������¹ԥ��饹
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAdcodeEditDo extends Tv_ActionAdminOnly
{
	/**
	 * ���������¹����ν���(�ե������ͥ����å���)��Ԥ�
	 * 
	 * @access public
	 * @return string  ����̾(null�ʤ����ｪλ, false�ʤ������λ)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) return 'admin_adcode_edit';
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
		// �ѥ�᥿��ʣ��ǧ
		$ac =& new Tv_AdCode($this->backend, 'ad_code_id', $this->af->get('ad_code_id'));
		// ���μ�ʬ�Υѥ�᥿�Ⱥ���μ�ʬ�Υѥ�᥿���ۤʤ���Τ߳�ǧ������Ԥ�
		if($this->af->get('ad_code_param') != $ac->get('ad_code_param')){
			$ac =& new Tv_AdCode($this->backend);
			$result = $ac->searchProp(
				array('ad_code_id'),
				array('ad_code_status' => 1, 'ad_code_param' => new Ethna_AppSearchObject($this->af->get('ad_code_param'), OBJECT_CONDITION_EQ)),
				array('ad_code_id' => OBJECT_SORT_DESC)
			);
			if($result[0] > 0){
				$this->ae->add(null, '', E_ADMIN_AD_CODE_DUPLICATE);
				return 'admin_adcode_edit';
			}
		}
		// ad_code_id���鹭�𥳡����Խ�
		$ac =& new Tv_AdCode($this->backend, 'ad_code_id', $this->af->get('ad_code_id'));
		$ac->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// ����
		$r = $ac->update();
		// �������顼�ξ��
		if(Ethna::isError($r)) return 'admin_adcode_edit';
		
		$this->ae->add(null, '', I_ADMIN_AD_CODE_EDIT_DONE);
		return 'admin_adcode_list';
	}
}
?>