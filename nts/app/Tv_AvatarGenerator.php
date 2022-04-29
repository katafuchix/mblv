<?php
/**
 * Tv_AvatarGenerator.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * アバタージェネレータマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_AvatarGeneratorManager extends Ethna_AppManager
{
	/* @var string 出力アバターのファイル名 */
	var $filename;
	/* @var integerアバターの切り出し設定 */
	var $base = 0;
	/* @var integerアバターの切り出し開始X座標 */
	var $base_x = 0;
	/* @var integer アバターの切り出し開始Y座標 */
	var $base_y = 0;
	/* @var integerアバターの切り出し幅 */
	var $base_w = 100;
	/* @var integer アバターの切り出し高さ */
	var $base_h = 160;
	/* @var integerアバターの横幅 */
	var $width = 100;
	/* @var integer アバターの縦幅 */
	var $height = 160;
	/* @var array アバターに乗せるパーツリスト */
	var $parts  = array();
	/* @var array MIME-TYPE */
	var $mime_types = array();

	/**
	 * 元画像の切り出し値を設定
	 * 
	 * @access public
	 * @param integer $base_x アバターの切り出し開始X座標
	 * @param integer $base_y アバターの切り出し開始Y座標
	 * @param integer $base_w アバターの切り出し幅
	 * @param integer $base_h アバターの切り出し高さ
	 */
	function set_base($base_x, $base_y, $base_w, $base_h)
	{
		// 切り出し値をセットする
		$this->base = 1;
		$this->base_x = $base_x;
		$this->base_y = $base_y;
		$this->base_w = $base_w;
		$this->base_h = $base_h;
	}
	
	/**
	 * 横幅を設定
	 * 
	 * @access public
	 * @param integer $width アバターの横幅
	 */
	function set_width($width)
	{
		// アバターの横幅を設定する
		$this->width  = $width;
	}

	/**
	 * 縦幅を設定
	 * 
	 * @access public
	 * @param integer $height アバターの縦幅
	 */
	function set_height($height)
	{
		// アバターの縦幅を設定する
		$this->height  = $height;
	}

	/**
	 * ファイル名を設定
	 * 
	 * @access public
	 * @param string $filename アバターのファイル名
	 */
	function set_filename($filename)
	{
		$this->filename = $filename; 
	}

	/**
	 * 背景を設定
	 * 
	 * @access public
	 * @param string $background 背景のソース
	 */
	function set_background($background)
	{ 
		$this->background_source = $background;
	}
 
	/**
	 * レイヤーを追加
	 * 
	 * @access public
	 * @param string $filename 追加するレイヤー画像名
	 */
	function add_layer($filename)
	{
		$this->parts[] = $filename;
	}

	/**
	 * 背景を生成
	 * 
	 * @access public
	 */
	function build_background()
	{
/*
		// サイズを取得する
		if(empty($this->height)){
			$first_image = $this->parts[0];
			list($width, $height) = getimagesize($first_image);
			$this->height = ($this->width/$width)*$height;
		}
		
		// 画像の雛形を生成
		$this->background = imagecreatetruecolor($this->width, $this->height);
		if(substr_count($this->background_source, "#")>0){
			// 背景画像色処理
			$int = hexdec(str_replace("#", "", $this->background_source));
			$background_color = imagecolorallocate ($this->background, 0xFF & ($int >> 0x10), 0xFF & ($int >> 0x8), 0xFF & $int);
			imagefill($this->background, 0, 0, $background_color);
		}else{
			// 背景画像処理
			list($bg_w, $bg_h) = getimagesize($this->background_source);
			list($pre, $ext) = $this->um->extractName($this->background_source);
			switch($ext)
			{
				case 'gif':
					$img = imagecreatefromgif($this->background_source);
					break;
				case 'png':
					$img = imagecreatefrompng($this->background_source);
					break;
				case 'jpg':
					$img = imagecreatefromjpeg($this->background_source);
					break;
				default:
					break;
			}
			// 画像の切り出し設定がある場合
			if($this->base){
				imagecopyresampled($this->background, $img, $this->base_x, $this->base_y, $this->base_x, $this->base_y, $this->width, $this->height, $this->base_w, $this->base_h);
			}else{
				imagecopyresampled($this->background, $img, 0, 0, 0, 0, $this->width, $this->height, $bg_w, $bg_h);
			}
		}
*/
	}

	/**
	 * アバターを合成
	 * 
	 * @access public
	 */
	function build_composition()
	{
/*
		// キャンバスを生成
		$this->canvas = imagecreatetruecolor($this->width, $this->height);
		// 背景を生成
		if($this->background){
			imagecopyresampled($this->canvas, $this->background, 0,0,0,0,$this->width, $this->height, $this->width, $this->height);
		}
		
*/
		// レイヤーに関する処理
		$files = "";
		for($i=0; $i<count($this->parts); $i++){
			// 画像が存在しない場合は次のループへ
			if(!is_file($this->parts[$i])) continue;
			
			$files[] = $this->parts[$i];
/*
			// 画像のサイズを取得
			list($part_w, $part_h) = getimagesize($this->parts[$i]);
			// MIME-TYPEによって処理を分岐
			list($pre, $ext) = $this->um->extractName($this->parts[$i]);
			switch($ext)
			{
				case 'gif':
					$body_part = imagecreatefromgif($this->parts[$i]);
					break;
				case 'png':
					$body_part = imagecreatefrompng($this->parts[$i]);
					break;
				case 'jpg':
					$body_part = imagecreatefromjpeg($this->parts[$i]);
					break;
				default:
					continue;
					break;
			}
			imageAlphaBlending($body_part, true);
			imageSaveAlpha($body_part, true);
			// 画像の切り出し設定がある場合
			if($this->base){
//				imagecopyresampled($this->canvas, $body_part, $this->base_x, $this->base_y, $this->base_x, $this->base_y, $this->width, $this->height, $this->base_w, $this->base_h);
				imagecopyresampled($this->canvas, $body_part, 0, 0, $this->base_x, $this->base_y, $this->width, $this->height, $this->base_w, $this->base_h);
			}else{
				imagecopyresampled($this->canvas, $body_part, 0,0,0,0,$this->width, $this->height, $part_w, $part_h);
			}
*/
		}
		
		header("content-type: image/gif");
		$ctl = $this->backend->getController();
		$cmd = $this->config->get('perl_path') . " " . $ctl->getDirectory('bin') . "/avatar_generator.pl ";
		$files = implode(',', $files);
		$cmd = "{$cmd} {$this->width} {$this->height} {$this->base} {$this->base_x} {$this->base_y} {$this->base_w} {$this->base_h} {$files}";
//print $cmd;
		passthru($cmd);
//		system($cmd);
	}

	/**
	 * アバターを出力
	 * 
	 * @access public
	 */
	function output()
	{
		if(!empty($this->filename)){
			// ファイル名が設定されていればファイルに保存
			imagegif($this->canvas, $this->filename,100);
		}else{
			// ファイル名が設定されていなければ画像を出力
			header("content-type: image/gif"); 
			imagegif($this->canvas, "", 100); 
		}
		// メモリー開放
		imagedestroy($this->canvas);
	}

	/**
	 * アバターを生成
	 * 
	 * @access public
	 */
	 function build()
	{
	 	$this->mime_types = $this->config->get('mime_types');
	 	$this->um = $this->backend->getManager('Util');
		$this->build_background();
		$this->build_composition();
//		$this->output();
	}
}

?>
