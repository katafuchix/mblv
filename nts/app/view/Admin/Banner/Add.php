<?php
/**
 * Add.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����Хʡ���Ͽ���̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminBannerAdd extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		$banner_type_list = array(
			"txt"	=> array("name" => "�ƥ�����"),
			"jpg"	=> array("name" => "JPEG"),
			"gif"	=> array("name" => "GIF"),
			"png"	=> array("name" => "PNG"),
		);
		$this->af->setApp('banner_type_list',$banner_type_list);
	}
}
?>
