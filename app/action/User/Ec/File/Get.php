<?php
/**
 * Get.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザECファイル取得アクションフォーム
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
 * ユーザファイル取得アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
//class Tv_Action_UserFileGet extends Tv_ActionUserOnly
// 非会員領域
class Tv_Action_UserEcFileGet extends Tv_ActionUser
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		return null;
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		$file = $this->config->get('file_path').'/'.$this->af->get('type').'/'.$this->af->get('file_name');
		
		// MIME-TYPEの決定
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