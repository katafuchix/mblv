<?php
/**
 * Get.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ファイル取得アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminFileGet extends Tv_ActionForm
{
	/** @var bool   バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var array   フォーム値定義 */
	var $form = array(
		'id' => array(
			'type' => VAR_TYPE_INT,
		),
		'type' => array(
			'type' => VAR_TYPE_STRING,
		),
		'attr' => array(
			'type' => VAR_TYPE_STRING,
		),
		'file' => array(
			'type' => VAR_TYPE_STRING,
		),
	);
}

/**
 * 管理ファイル取得アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminFileGet extends Tv_ActionAdminOnly
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
		// ファイルオブジェクト取得
		switch($this->af->get('type'))
		{
			// 画像の場合の処理
			case 'image':
				$file = new Tv_Image($this->backend,'image_id',$this->af->get('id'));
				// ファイルが無効な場合
				// ファイルが存在しない場合
				
				if(!$file->isValid() ||  !@file_exists($this->config->get('image_path') . $file->get('image_' . $this->af->get('attr')))
				){
					$um = $this->backend->getManager('Util');
					list($pre, $ext) = $um->extractName($this->config->get('noimage'));
					$mime_types = $this->config->get('mime_types');
					// attrを置き換えて最適サイズのnoimage画像を出力する
					$noimage = str_replace('%attr%', $this->af->get('attr'), $this->config->get('noimage'));
					header('Content-Type: ' . $mime_types[$ext]);
					readfile($this->config->get('file_path') . $noimage);
				}
				// ファイルが存在する場合
				else{
					// 指定属性の画像を表示
					header('Content-type: ' . $file->get('image_mime_type'));
					readfile($this->config->get('image_path') . $file->get('image_' . $this->af->get('attr')));
				}
				break;
			// 動画の場合の処理
			case 'movie':
				$file = new Tv_Movie($this->backend,'movie_id',$this->af->get('id'));
/*
				// ファイルが無効な場合
				// ファイルが存在しない場合
				if(!$file->isValid() || $file->get('movie_status') != 1 || !@file_exists($this->config->get('file_path') . $file->get('image_' . $this->af->get('attr'))){
					$um = $this->backend->getManager('Util');
					list($pre, $ext) = $um->extractName($this->config->get('noimage_path'));
					$mime_types = $this->config->get('mime_types');
					header('Content-type: ' . $mime_types[$ext]);
					readfile($this->config->get('noimage_path'));
				}
				// ファイルが存在する場合
				else{
					// 指定属性の画像を表示
					header('Content-type: ' . $file->get('file_mime_type'));
					readfile($this->config->get('file_path') . $file->get('image_path_' . $this->af->get('attr')));
				}
*/
				break;
			// その他ファイルの出力
			default:
				$file = $this->af->get('file');
				$mime_types = $this->config->get('mime_types');
				$um = $this->backend->getManager('Util');
				list($pre, $ext) = $um->extractName($file);
				$mime_type = $mime_types[$ext];
				header("Content-type: {$mime_type}");
				readfile($this->config->get('file_path') . $file);
				break;
		}
		exit;
	}
}
?>