<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * �����Хʡ��Խ����̥ӥ塼���饹
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminBannerEdit extends Tv_ViewClass
{
	/**
	 *  ����ɽ��������
	 *
	 *  @access public
	 */
	function preforward()
	{
		/*
		// �Хʡ�����μ���
		$db = $this->backend->getDB();
		$values = array($this->af->get('banner_id'));
		$sql = "SELECT * FROM banner WHERE banner_id = ?";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		if (PEAR::isError($rows)){
			// �ǥХå�����
			$this->ae->add("errors",$rows->getMessage());
			$this->ae->add("errors",$rows->getDebugInfo());
		}
		$this->af->setApp('banner_client',$rows[0]['banner_client']);
		$this->af->setApp('banner_url',$rows[0]['banner_url']);
		$this->af->setApp('banner_type',$rows[0]['banner_type']);
		$this->af->setApp('banner_body',$rows[0]['banner_body']);
		$this->af->setApp('banner_image',$rows[0]['banner_image']);
		
		*/
			
		// �Хʡ������ץ��ץ����
		$banner_type_list = array(
			"txt"	=> array("name" => "�ƥ�����"),
			"jpg"	=> array("name" => "JPEG"),
			"gif"	=> array("name" => "GIF"),
			"png"	=> array("name" => "PNG"),
		);
		$this->af->setApp('banner_type_list',$banner_type_list);

		// �Хʡ��������ơ��������ץ����
		$banner_image_status_list = array(
			""	=> array("name" => "�ѹ����ʤ�"),
			"edit"	=> array("name" => "�ѹ�����"),
			"delete"	=> array("name" => "�������"),
		);
		$this->af->setApp('banner_image_status_list',$banner_image_status_list);
	}
}
?>
