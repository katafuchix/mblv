<?php
/**
 * Get.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザファイル取得アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserFileGet extends Tv_ActionForm
{
	var $use_validator_plugin = true;
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
 * ユーザファイル取得アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
//class Tv_Action_UserFileGet extends Tv_ActionUserOnly
// 非会員領域
class Tv_Action_UserFileGet extends Tv_ActionUser
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
				if(!$file->isValid() || $file->get('image_status') != 1 || !@file_exists($this->config->get('image_path') . $file->get('image_' . $this->af->get('attr')))){
					$um = $this->backend->getManager('Util');
					list($pre, $ext) = $um->extractName($this->config->get('noimage'));
					$mime_types = $this->config->get('mime_types');
					header('Content-Type: ' . $mime_types[$ext]);
					readfile($this->config->get('noimage'));
				}
				// ファイルが存在する場合
				else{
					// 指定属性の画像を表示
					header('Content-Type: ' . $file->get('image_mime_type'));
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
			// デコメールファイルの出力
			case 'decomail':
				// デコメール情報の取得
				$o = new Tv_Decomail($this->backend, 'decomail_id', $this->af->get('id'));
				if(!$o->isValid()) exit;
				// ファイル名の決定
				if($GLOBALS['EMOJIOBJ']->carrier == 'DOCOMO'){
					$filename = $o->get('decomail_file_d');
				}elseif($GLOBALS['EMOJIOBJ']->carrier == 'AU'){
					$filename = $o->get('decomail_file_a');
				}elseif($GLOBALS['EMOJIOBJ']->carrier == 'SOFTBANK'){
					$filename = $o->get('decomail_file_s');
				}else{
					// 暫定的にDOCOMOに対応させる
					$filename = $o->get('decomail_file_d');
				}
				// MIME-TYPEの決定
				$mime_types = $this->config->get('mime_types');
				$um = $this->backend->getManager('Util');
				list($pre, $ext) = $um->extractName($filename);
				$mime_type = $mime_types[$ext];
				// データの出力
				$file_path = $this->config->get('file_path') . "/decomail/{$filename}";
				$file_size = filesize($file_path);
				header("Content-Type: {$mime_type}");
				header("Content-Length: {$file_size}");
				readfile($file_path);
				break;
			// ゲームファイルの出力
			case 'game':
				// ゲーム情報の取得
				$o = new Tv_Game($this->backend, 'game_id', $this->af->get('id'));
				if(!$o->isValid()) exit;
				// ファイル名の決定
				$filename = $o->get('game_file3');
				// MIME-TYPEの決定
				$mime_types = $this->config->get('mime_types');
				$um = $this->backend->getManager('Util');
				list($pre, $ext) = $um->extractName($filename);
				$mime_type = $mime_types[$ext];
				// データの出力
				$file_path = $this->config->get('file_path') . "/game/{$filename}";
				$file_size = filesize($file_path);
				header("Content-Type: {$mime_type}");
				header("Content-Length: {$file_size}");
				readfile($file_path);
				break;
			// サウンドファイルの出力
			case 'sound':
				// サウンド情報の取得
				$o = new Tv_Sound($this->backend, 'sound_id', $this->af->get('id'));
				if(!$o->isValid()) exit;
				// ファイル名の決定
				if($GLOBALS['EMOJIOBJ']->carrier == 'DOCOMO'){
					$filename = $o->get('sound_file_d');
				}elseif($GLOBALS['EMOJIOBJ']->carrier == 'AU'){
					$filename = $o->get('sound_file_a');
				}elseif($GLOBALS['EMOJIOBJ']->carrier == 'SOFTBANK'){
					$filename = $o->get('sound_file_s');
				}else{
					// 暫定的にDOCOMOに対応させる
					$filename = $o->get('sound_file_d');
				}
				// MIME-TYPEの決定
				$mime_types = $this->config->get('mime_types');
				$um = $this->backend->getManager('Util');
				list($pre, $ext) = $um->extractName($filename);
				$mime_type = $mime_types[$ext];
				// データの出力
				$file_path = $this->config->get('file_path') . "/sound/{$filename}";
				$file_size = filesize($file_path);
				header("Content-Type: {$mime_type}");
				header("Content-Length: {$file_size}");
				readfile($file_path);
				break;
			// ファイル管理系ファイルの出力
			case 'file':
				// ファイル情報の取得
				$o = new Tv_File($this->backend, 'file_id', $this->af->get('id'));
				if(!$o->isValid()) exit;
				$filename = $o->get('file_name');
				// MIME-TYPEの決定
				$mime_types = $this->config->get('mime_types');
				$um = $this->backend->getManager('Util');
				list($pre, $ext) = $um->extractName($filename);
				$mime_type = $mime_types[$ext];
				// データの出力
				$file_path = $this->config->get('file_path') . "/file/{$filename}";
				$file_size = filesize($file_path);
				header("Content-Type: {$mime_type}");
				header("Content-Length: {$file_size}");
				readfile($file_path);
				break;
			// その他ファイルの出力
			default:
				// ファイル名の決定
				$file = $this->af->get('file');
				// MIME-TYPEの決定
				$mime_types = $this->config->get('mime_types');
				$um = $this->backend->getManager('Util');
				list($pre, $ext) = $um->extractName($file);
				$mime_type = $mime_types[$ext];
				// データの出力
				$file_path = $this->config->get('file_path') . $file;
				$file_size = filesize($file_path);
				header("Content-Type: {$mime_type}");
				header("Content-Length: {$file_size}");
				readfile($file_path);
				break;
		}
		exit;
	}
}

?>
