<?php
/**
 * Edit.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理バナー編集画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminBannerEdit extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		/*
		// バナー情報の取得
		$db = $this->backend->getDB();
		$values = array($this->af->get('banner_id'));
		$sql = "SELECT * FROM banner WHERE banner_id = ?";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		if (PEAR::isError($rows)){
			// デバッグ情報
			$this->ae->add("errors",$rows->getMessage());
			$this->ae->add("errors",$rows->getDebugInfo());
		}
		$this->af->setApp('banner_client',$rows[0]['banner_client']);
		$this->af->setApp('banner_url',$rows[0]['banner_url']);
		$this->af->setApp('banner_type',$rows[0]['banner_type']);
		$this->af->setApp('banner_body',$rows[0]['banner_body']);
		$this->af->setApp('banner_image',$rows[0]['banner_image']);
		
		*/
			
		// バナータイプオプション
		$banner_type_list = array(
			"txt"	=> array("name" => "テキスト"),
			"jpg"	=> array("name" => "JPEG"),
			"gif"	=> array("name" => "GIF"),
			"png"	=> array("name" => "PNG"),
		);
		$this->af->setApp('banner_type_list',$banner_type_list);

		// バナー画像ステータスオプション
		$banner_image_status_list = array(
			""	=> array("name" => "変更しない"),
			"edit"	=> array("name" => "変更する"),
			"delete"	=> array("name" => "削除する"),
		);
		$this->af->setApp('banner_image_status_list',$banner_image_status_list);
	}
}
?>
