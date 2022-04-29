<?php
/**
 * Get.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �桼��EC�ե�����������������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcFileGet extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'file_name' => array(
			'type' => VAR_TYPE_INT,
		),
		'type' => array(
			'type' => VAR_TYPE_STRING,
		),
	);
}
/**
 * �桼���ե�����������������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
//class Tv_Action_UserFileGet extends Tv_ActionUserOnly
// �����ΰ�
class Tv_Action_UserEcFileGet extends Tv_ActionUser
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
		$file = $this->config->get('file_path').'/'.$this->af->get('type').'/'.$this->af->get('file_name');
		
		// MIME-TYPE�η���
		$mime_types = $this->config->get('mime_types');
		$um = $this->backend->getManager('Util');
		list($pre, $ext) = $um->extractName($filename);
		$mime_type = $mime_types[$ext];
		
		header('Content-Type: ' . $mime_type);
		readfile($file);
		
		exit;
	}
}
?>