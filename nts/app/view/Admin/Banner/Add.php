<?php
/**
 * Add.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理バナー登録画面ビュークラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_View_AdminBannerAdd extends Tv_ViewClass
{
	/**
	 *  画面表示前処理
	 *
	 *  @access public
	 */
	function preforward()
	{
		$banner_type_list = array(
			"txt"	=> array("name" => "テキスト"),
			"jpg"	=> array("name" => "JPEG"),
			"gif"	=> array("name" => "GIF"),
			"png"	=> array("name" => "PNG"),
		);
		$this->af->setApp('banner_type_list',$banner_type_list);
	}
}
?>
