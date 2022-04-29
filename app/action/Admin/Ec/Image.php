<?php
/**
 * Image.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * �������ϥ��������ե�����
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcImage extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'file' => array(
			'type'        => VAR_TYPE_STRING,
		),
	);
}

/**
 * �������ϥ��������
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcImage extends Tv_ActionClass
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
		$file = $this->af->get("file");
		$ext=strtolower(substr($file,strrpos($file,".")+1));
		header("Pragma: no-cache");
		
		$mime="";
		switch($ext){
			case "gif": $mime="image/gif"; break;
			case "jpg": $mime="image/jpeg"; break;
			case "jpeg": $mime="image/jpeg"; break;
			case "png": $mime="image/png"; break;
			case "bmp": $mime="image/bmp"; break;
			case "3g2": $mime="video/3gpp2"; break;
			case "3gp": $mime="video/3gpp"; break;
			case "amc": $mime="application/x-mpeg"; break;
			case "swf" : $mime="application/x-shockwave-flash";break;
		}
		$file_name = $this->config->get('file_path'). $file;
		//$file_name = $this->config->get('dataFullPath') . $file;
		if($mime!=""){
			header("Content-type: $mime");
			readfile($file_name);
		}
	}
}
?>