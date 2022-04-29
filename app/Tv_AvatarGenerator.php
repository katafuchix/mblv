<?php
/**
 * Tv_AvatarGenerator.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * アバタージェネレータマネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_AvatarGeneratorManager extends Ethna_AppManager
{
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
	 * @access     public
	 * @param integer $base_x アバターの切り出し開始X座標
	 * @param integer $base_y アバターの切り出し開始Y座標
	 * @param integer $base_w アバターの切り出し幅
	 * @param integer $base_h アバターの切り出し高さ
	 */
	function setBase($base_x, $base_y, $base_w, $base_h)
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
	 * @access     public
	 * @param integer $width アバターの横幅
	 */
	function setWidth($width)
	{
		// アバターの横幅を設定する
		$this->width  = $width;
	}
	
	/**
	 * 縦幅を設定
	 * 
	 * @access     public
	 * @param integer $height アバターの縦幅
	 */
	function setHeight($height)
	{
		// アバターの縦幅を設定する
		$this->height  = $height;
	}
	
	/**
	 * ファイル名を設定
	 * 
	 * @access     public
	 * @param string $filename アバターのファイル名
	 */
	function setFilename($filename)
	{
		$this->filename = $filename;
	}
	
	/**
	 * レイヤーを追加
	 * 
	 * @access     public
	 * @param string $filename 追加するレイヤー画像名
	 */
	function addLayer($filename)
	{
		$this->parts[] = $filename;
	}
	
	/**
	 * アバターを合成
	 * 
	 * @access     public
	 */
	function buildComposition($id)
	{
		// レイヤーに関する処理
		$files = "";
		for($i=0; $i<count($this->parts); $i++){
			// 画像が存在しない場合は次のループへ
			if(!is_file($this->parts[$i])) continue;
			
			$files[] = $this->parts[$i];
		}
		
		// コントローラから[avatar_generator.pl]のパスを生成
		$ctl = $this->backend->getController();
		$cmd = $this->config->get('perl_path') . " " . $ctl->getDirectory('bin') . "/avatar_generator.pl ";
		// 引数を生成
		$files = implode(',', $files);
		$cmd = "{$cmd} {$this->width} {$this->height} {$this->base} {$this->base_x} {$this->base_y} {$this->base_w} {$this->base_h} {$files}";
		
		// ID指定があればキャッシュを生成
		if($id){
			// キャッシュフォルダを取得
			$path = $this->getCacheFolder($id);
			if(!is_dir($path)){
				// フォルダが存在しない場合は作成
				mkdir($path);
				chmod($path, 0777);
			}
			
			// キャッシュファイル名の決定
			$filename = $this->getCacheFolder($id) . '/' . $this->getCacheFilename($id);
			
			// コマンドに追加
			$cmd .= " > {$filename}";
		}
		// キャッシュで無ければヘッダーを出力
		else{
			header('Content-Type: image/gif');
		}
		
		// 画像出力
		passthru($cmd);
		
		// 画像がある場合はパーミッションを更新
		if($id){
			chmod($filename, 0777);
		}
	}
	
	/**
	 * アバターキャッシュのフォルダ取得
	 * 
	 * @access     public
	 */
	function getCacheFolder($id)
	{
		$folderName = floor(floatval($id) / 100000) + 1;
		return $this->config->get('file_path') . 'avatar_cache/' . $folderName;
	}
	
	/**
	 * アバターキャッシュのファイル名取得
	 * 
	 * @access     public
	 */
	function getCacheFilename($id)
	{
		return $id . '_' . $this->width . 'x' . $this->height . '.gif';
	}
	
	/**
	 * アバターキャッシュの存在確認
	 * 
	 * @access     public
	 */
	function isCache($id)
	{
		// キャッシュファイル名の生成
		$path = $this->getCacheFolder($id) . '/' . $this->getCacheFilename($id);
		// ファイルの存在確認
		if(is_file($path)){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 * アバターキャッシュの出力
	 * 
	 * @access     public
	 */
	function buildCache($id)
	{
		// キャッシュファイル名の生成
		$path = $this->getCacheFolder($id) . '/' . $this->getCacheFilename($id);
		// 指定属性の画像を表示
		header('Content-Type: image/gif');
		readfile($path);
	}
	
	/**
	 * アバターを生成
	 * 
	 * @access     public
	 */
	 function build($id = 0)
	{
		$this->mime_types = $this->config->get('mime_types');
		$this->um = $this->backend->getManager('Util');
		$this->buildComposition($id);
	}
}
?>