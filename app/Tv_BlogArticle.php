<?php
/**
 * Tv_BlogArticle.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 日記記事マネージャ
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_BlogArticleManager extends Ethna_AppManager
{
	/**
	 * 指定したユーザのブログ記事を削除する
	 * 
	 * @access     public
	 * @param string $user_id ユーザID
	 */
	function statusOff($user_id)
	{ 
		// 日記を非表示にする
		$ba = new Tv_BlogArticle($this->backend);
		$ba_list = $ba->searchProp(
			array('blog_article_id'),
			array(
				'user_id' => $user_id,
				'blog_article_status' => 1
			)
		); 
		// blog_article_statusを"0:削除"にする
		if ($ba_list[0] > 0) {
			foreach($ba_list[1] as $v) {
				$ba = new Tv_BlogArticle($this->backend, 'blog_article_id', $v['blog_article_id']);
				if (!$ba->isValid()) return false;
				$ba->set('blog_article_status', 0);
				$ba->update();
			} 
		} 
	} 
} 

/**
 * 日記記事オブジェクト
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_BlogArticle extends Ethna_AppObject
{
	/**
	 *  オブジェクトを追加する
	 *
	 *  @access     public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function add()
	{
		$timestamp = date('Y-m-d H:i:s');
		$user = $this->session->get('user');
		// オブジェクトの追加
		$this->set('user_id', $user['user_id']);
		$this->set('blog_article_status', 1);
		$this->set('blog_article_checked', 0);
		$this->set('blog_article_comment_num', 0);
		$this->set('image_id', 0);
		$this->set('blog_article_created_time',  $timestamp);
		$this->set('blog_article_updated_time',  $timestamp);
		$this->set('blog_article_comment_time', $timestamp);
		parent::add();
		
		// blog_article_hashを生成する
		$id = $this->getId();
//		$hash = md5($id);
		$um = $this->backend->getManager('Util');
		$hash = $um->getUniqId();
		$o = new Tv_BlogArticle($this->backend, 'blog_article_id', $id);
		$o->set('blog_article_hash', $hash);
		$o->update();
		// blog_article_hashをセットする
		$this->set('blog_article_hash', $hash);
	}
	
	/**
	 *  オブジェクトを更新する
	 *
	 *  @access     public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function update()
	{
		$timestamp = date('Y-m-d H:i:s');
		// 更新日時を保存する
		$this->set('blog_article_updated_time', $timestamp);
		parent::update();
	}
	
	/**
	 *  オブジェクトを論理削除する
	 *
	 *  @access     public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function delete()
	{
		$timestamp = date('Y-m-d H:i:s');
		// 削除日時を保存する
		$this->set('blog_article_deleted_time', $timestamp);
		// 論理削除
		$this->set('blog_article_status', 0);
		parent::update();
	}
	
	/**
	 *  画像を削除する
	 *
	 *  @access     public
	 *  @return boolean true: 正常終了, false: エラー
	 */
	function deleteImage()
	{
		// 画像を削除
		if($this->get('image_id')) {
			$im =& $this->backend->getManager('Image');
			$im->remove($this->get('image_id'),'blog_article',$this->get('blog_article_id'));
			// 画像を論理削除
			$this->set('image_id', 0);
		}
		$this->update();
		
		return true;
	}
	
	/**
	 *  動画を削除する
	 *
	 *  @access     public
	 *  @return boolean true: 正常終了, false: エラー
	 */
	function deleteMovie()
	{
		// 動画を削除
		if($this->get('movie_id')) {
			$im =& $this->backend->getManager('Movie');
			$im->remove($this->get('movie_id'),'blog_article',$this->get('blog_article_id'));
			// 動画を論理削除
			$this->set('movie_id', 0);
		}
		$this->update();
		
		return true;
	}
	
	/**
	 *  オブジェクトを削除する
	 *
	 *  @access     public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function remove()
	{
		// 画像を削除
		$this->deleteImage();
		
		return parent::remove();
	}
} 
?>