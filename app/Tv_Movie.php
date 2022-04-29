<?php
/**
 * Tv_Movie.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 動画マネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_MovieManager extends Ethna_AppManager
{
	/**
	 * ファイルを削除
	 * 
	 * @access     public
	 * @param integer $movieId 削除するファイルのId
	 * @param integer $movieStatus 削除した後のファイル状態（デフォルト0）
	 * @return boolean 削除に成功したか（成功ならtrue）
	 */
	function remove($movieId, $typeName = "", $typeId = 0, $imageStatus = 0)
	{
		// ファイルオブジェクトを取得する
		$movie = new Tv_Movie($this->backend,'movie_id',$movieId);
		if (!$movie->isValid()) return false;
		
		// DB更新
		
		// DB更新
		$movie->set('movie_status', $imageStatus);
		$movie->set('type', $typeName);
		$movie->set('id', $typeId);
		$movie->set('movie_deleted_time', date('Y-m-d H:i:s'));
		$movie->update();
		
		return true;
	}
	
	/**
	 * 動画を変換
	 * 
	 * @access     public
	 * @param array
	 	movie_path1	変換元ファイルパス
	 	movie_path2	変換先ファイルパス
	 * @return ture/false
	 */
	function convert($param)
	{
		$um =& $this->backend->getManager('Util');
		
		// パラメタをチェック
		$args = array('movie_path1', 'movie_path2');
		foreach($args as $v){
			if(!array_key_exists($v, $param)) return false;
		}
	//	if( !is_movie($det) ){
			$com = $this->config->get('ffmpeg_path') . " -i {$param[movie_path1]} -an -f flv {$param[movie_path2]}"; //-an
			system( $com );
			$um->trace($com);
			$com = $this->config->get('flvtool2_path') . " -U {$param[movie_path2]}";
			system( $com );
			$um->trace($com);
	//	}
//		// パーミッションの変更
//		chmod($param['movie_path2'], 0755);
		
		return true;
	}
	
	/**
	 * メールから動画をアップロード
	 * 
	 * @access     public
	 * @param string $tmpPath 一時ファイルパス
	 * @param string $mime マイムタイプ
	 * @param integer $userId 所有者のユーザID
	 * @return integer ファイルID（失敗なら0）
	 */
	//function uploadResizeImage($tmpPath, $mimeType, $userId)
	function uploadMovieFromMail($tmpPath, $mimeType, $userId)
	{
		// movie_idが欲しいので先にDBに追加しておく
		$movie = new Tv_Movie($this->backend);
		$movie->set('user_id', $userId);
//		$movie->set('movie_status', 4); // アップロード待ち
		$movie->set('movie_mime_type', $mimeType);
		$movie->set('movie_size', filesize($tmpPath));
		$movie->set('movie_created_time', date('Y-m-d H:i:s'));
		$movie->set('movie_status', 1);
		
		$movie->add();
		
		// 更新する場合はオブジェクトを再生成する
		$movie = new Tv_Movie($this->backend, 'movie_id', $movie->getId());
		
		// フォルダ名を生成
		// 命名規則:movie_id/100000を小数点以下切捨てした数+1
		$folderName = floor(floatval($movie->getId()) / 100000) + 1;
		if(!is_dir($this->config->get('movie_path') . $folderName)){
			// フォルダが存在しない場合は作成
			mkdir($this->config->get('movie_path') . $folderName);
			chmod($this->config->get('movie_path') . $folderName, 0777);
		}
		
		// ファイル名の解析
		$um = $this->backend->getManager('Util');
		list($pre, $ext) = $um->extractName($tmpPath);
		// オリジナル
		$movie->set('movie_path_o', $folderName . '/' . $movie->getId() . 'o.' . $ext);
		$oFileFullPath = $this->config->get('movie_path') . $movie->get('movie_path_o');
		// 全画面
		$movie->set('movie_path_a', $folderName . '/' . $movie->getId() . 'a.' . $ext);
		$aFileFullPath = $this->config->get('movie_path') . $movie->get('movie_path_a');
		// 小
		$movie->set('movie_path_s', $folderName . '/' . $movie->getId() . 's.' . $ext);
		$aFileFullPath = $this->config->get('movie_path') . $movie->get('movie_path_s');
		// サムネイル
		$movie->set('movie_path_t', $folderName . '/' . $movie->getId() . 't.' . $ext);
		$tFileFullPath = $this->config->get('movie_path') . $movie->get('movie_path_t');
		// サムネイル
		$movie->set('movie_path_i', $folderName . '/' . $movie->getId() . 'i.' . $ext);
		$iFileFullPath = $this->config->get('movie_path') . $movie->get('movie_path_i');
		
		// オリジナル画像をコピー
		copy($tmpPath, $oFileFullPath);
		chmod($oFileFullPath, 0755); 
		// 全画面用画像を生成
		$values = array(
			'movie_path1'	=> $tmpPath,
			'movie_path2'	=> $aFileFullPath,
			'w'		=> $this->config->get('movie_width_a'),
			'h'		=> $this->config->get('movie_height_a')
		);
		$this->convert($values);
		// 小画像を生成
		$values = array(
			'movie_path1'	=> $tmpPath,
			'movie_path2'	=> $sFileFullPath,
			'w'		=> $this->config->get('movie_width_s'),
			'h'		=> $this->config->get('movie_height_s')
		);
		$this->convert($values);
		// サムネイル用画像を生成
		$values = array(
			'movie_path1'	=> $tmpPath,
			'movie_path2'	=> $tFileFullPath,
			'w'		=> $this->config->get('movie_width_t'),
			'h'		=> $this->config->get('movie_height_t')
		);
		$this->convert($values);
		// アイコン用画像を生成
		$values = array(
			'movie_path1'	=> $tmpPath,
			'movie_path2'	=> $iFileFullPath,
			'w'		=> $this->config->get('movie_width_i'),
			'h'		=> $this->config->get('movie_height_i')
		);
		$this->convert($values);
		
		// DBにファイル情報を追加
		$movie->update();
		
		return $movie->getId();
	}
} 

/**
 * 動画オブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Movie extends Ethna_AppObject {
} 
?>