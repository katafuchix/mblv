<?php
/**
 * Tv_Image.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 画像マネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ImageManager extends Ethna_AppManager
{
	/**
	 * 画像を削除
	 * 
	 * @access public
	 * @param integer $imageId 削除する画像のId
	 * @param integer $imageStatus 削除した後の画像状態（デフォルト0）
	 * @return boolean 削除に成功したか（成功ならtrue）
	 */
	function remove($imageId, $imageStatus = 0)
	{
		// 画像オブジェクトを取得する
		$image = new Tv_Image($this->backend,'image_id',$imageId);
		if (!$image->isValid()) return false;
		
		// DB更新
		$image->set('image_status', $imageStatus);
		$image->set('image_deleted_time', date('Y-m-d H:i:s'));
		$image->update();
		
		return true;
	}
	
	/**
	 * 画像を変換
	 * 
	 * @access public
	 * @param array
	 	image_path1	変換元画像パス
	 	image_path2	変換先画像パス
	 	w		変換幅
	 	h		変換縦
	 * @return ture/false
	 */
	function convert($param)
	{
		// パラメタをチェック
		$args = array('image_path1', 'image_path2', 'w', 'h');
		foreach($args as $v){
			if(!array_key_exists($v, $param)) return false;
		}
		// 変換
		$cmd = $this->config->get('imagemagick_path') . ' ' . $param['image_path1'] . ' -resize ' . $param['w'] . 'x' . $param['h'] . ' ' . $param['image_path2'];
		system($cmd);
		// パーミッションの変更
		chmod($param['image_path2'], 0755);
		
		return true;
	}
	
	/**
	 * 画像をリサイズしてアップロード
	 * 
	 * @access public
	 * @param string $tmpPath 一時画像パス
	 * @param string $mime マイムタイプ
	 * @param integer $userId 所有者のユーザID
	 * @return integer 画像ID（失敗なら0）
	 */
	function uploadImageFromMail($tmpPath, $mimeType, $userId)
	{
		// image_idが欲しいので先にDBに追加しておく
		$image = new Tv_Image($this->backend);
		$image->set('user_id', $userId);
		$image->set('image_mime_type', $mimeType);
		$image->set('image_size', filesize($tmpPath));
		$image->set('image_created_time', date('Y-m-d H:i:s'));
		$image->set('image_status', 1);
		$image->set('image_checked', 0);
		
		$image->add();
		
		// 更新する場合はオブジェクトを再生成する
		$image = new Tv_Image($this->backend, 'image_id', $image->getId());
		
		// フォルダ名を生成
		// 命名規則:image_id/100000を小数点以下切捨てした数+1
		$folderName = floor(floatval($image->getId()) / 100000) + 1;
		if(!is_dir($this->config->get('image_path') . $folderName)){
			// フォルダが存在しない場合は作成
			mkdir($this->config->get('image_path') . $folderName);
			chmod($this->config->get('image_path') . $folderName, 0777);
		}
		
		// 画像名の解析
		$um = $this->backend->getManager('Util');
		list($pre, $ext) = $um->extractName($tmpPath);
		// オリジナル
		$image->set('image_o', $folderName . '/' . $image->getId() . 'o.' . $ext);
		$oImageFullPath = $this->config->get('image_path') . $image->get('image_o');
		// 全画面
		$image->set('image_a', $folderName . '/' . $image->getId() . 'a.' . $ext);
		$aImageFullPath = $this->config->get('image_path') . $image->get('image_a');
		// 小
		$image->set('image_s', $folderName . '/' . $image->getId() . 's.' . $ext);
		$sImageFullPath = $this->config->get('image_path') . $image->get('image_s');
		// サムネイル
		$image->set('image_t', $folderName . '/' . $image->getId() . 't.' . $ext);
		$tImageFullPath = $this->config->get('image_path') . $image->get('image_t');
		// サムネイル
		$image->set('image_i', $folderName . '/' . $image->getId() . 'i.' . $ext);
		$iImageFullPath = $this->config->get('image_path') . $image->get('image_i');
		
		// オリジナル画像をコピー
		copy($tmpPath, $oImageFullPath);
		chmod($oImageFullPath, 0755);
		// ファイル同期
		$um->ftpUpload('image/' . $image->get('image_o'), $oImageFullPath);
		
		// 全画面用画像を生成
		$values = array(
			'image_path1'	=> $tmpPath,
			'image_path2'	=> $aImageFullPath,
			'w'		=> $this->config->get('image_a_width'),
			'h'		=> $this->config->get('image_a_height')
		);
		$this->convert($values);
		// ファイル同期
		$um->ftpUpload('image/' . $image->get('image_a'), $aImageFullPath);
		
		// 小画像を生成
		$values = array(
			'image_path1'	=> $tmpPath,
			'image_path2'	=> $sImageFullPath,
			'w'		=> $this->config->get('image_s_width'),
			'h'		=> $this->config->get('image_s_height')
		);
		$this->convert($values);
		// ファイル同期
		$um->ftpUpload('image/' . $image->get('image_s'), $sImageFullPath);
		
		// サムネイル用画像を生成
		$values = array(
			'image_path1'	=> $tmpPath,
			'image_path2'	=> $tImageFullPath,
			'w'		=> $this->config->get('image_t_width'),
			'h'		=> $this->config->get('image_t_height')
		);
		$this->convert($values);
		// ファイル同期
		$um->ftpUpload('image/' . $image->get('image_t'), $tImageFullPath);
		
		// アイコン用画像を生成
		$values = array(
			'image_path1'	=> $tmpPath,
			'image_path2'	=> $iImageFullPath,
			'w'		=> $this->config->get('image_i_width'),
			'h'		=> $this->config->get('image_i_height')
		);
		$this->convert($values);
		// ファイル同期
		$um->ftpUpload('image/' . $image->get('image_i'), $iImageFullPath);
		
		// DBに画像情報を追加
		$image->update();
		
		return $image->getId();
	}
	
	/**
	* 指定ユーザのimageアップロード容量が設定値を超えていないか判断する
	* 
	* @access public
	* @param string $user_id ユーザID
	* @return array['user_image_size_bool'] 範囲内ならtrue,オーバーならfalse
	* @return array['user_image_size_sum'] 現在の合計サイズ（バイト）
	* @return array['user_image_size_limit'] アップ可能なサイズ（バイト）制限なしなら0
	* @return array['user_image_size_max'] 設定サイズ（バイト）制限なしなら0
	* @return array['user_image_size_message'] 容量オーバーで投稿できない場合のメッセージ
	*/
/*	function user_image_size($user_id)
	{
		//設定値は？
		$max = intval($this->config->get('image_max_size'));
		$item['user_image_size_max'] = $max;
		
		//削除フラグの立っていない画像の全容量は？
		$q = 'select ifnull(sum(image_size),0)as sum_size , '.$max.' - ifnull(sum(image_size),0)as limit_size from image where user_id = '.$user_id.' and image_status = 1 ';
		$db =& $this->backend->getDB();
		$r = $db->db->getAll($q ,array(), DB_FETCHMODE_ASSOC);
		$item['user_image_size_sum'] = intval($r[0]['sum_size']);
		
		//アップ可能な容量は？
		$item['user_image_size_limit'] = intval($r[0]['limit_size']);
		
		//まだアップかのうか？
		if($item['user_image_size_sum'] < $max){
			//まだ可能
			$item['user_image_size_bool'] = true;
		}else{
			//もうだめ
			$item['user_image_size_bool'] = false;
			
			//投稿できない場合のメッセージ
			$item['user_image_size_message'] = "投稿可能な容量をｵｰﾊﾞｰしています｡\n画像を投稿するには既存の画像を削除してください｡\n";
		}
		
		//設定が制限なしならばlimitは0で上書き。
		//設定が制限なしならばboolはtrueで上書き。
		if($max == 0){
			$item['user_image_size_limit'] = 0;
			$item['user_image_size_bool'] = true;
		}
		
		return $item;
	}
*/
} 

/**
 * 画像オブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Image extends Ethna_AppObject {
} 
?>