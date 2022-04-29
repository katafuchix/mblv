<?php
/**
 * Tv_BlogComment.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 日記コメントマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_BlogCommentManager extends Ethna_AppManager
{
	/**
	 * 指定したユーザのブログコメントを削除する
	 * 
	 * @access public
	 * @param string $user_id ユーザID
	 */
	function status_off($user_id)
	{ 
		// 日記コメントを非表示にする
		$bc = new Tv_BlogComment($this->backend);
		$bc_list = $bc->searchProp(
			array('blog_comment_id'),
			array(
				'user_id' => $user_id,
				'blog_comment_status' => 1
			)
		); 
		// blog_comment_statusを"0:削除"にする
		$now = date('Y-m-d H:i:s');
		if ($bc_list[0] > 0) {
			foreach($bc_list[1] as $v) {
				$bc = new Tv_BlogComment($this->backend, 'blog_comment_id', $v['blog_comment_id']);
				if (!$bc->isValid()) continue; //return false;
				$bc->set('blog_comment_status', 0);
				$bc->set('blog_comment_updated_time',$now);
				$bc->set('blog_comment_deleted_time',$now);
				$bc->update();
				
				// blog_articleのコメント数を減算する
				$ba = new Tv_BlogArticle($this->backend, 'blog_article_id', $bc->get('blog_article_id'));
				$ba->set('blog_article_comment_num', $ba->get('blog_article_comment_num')-1);
				
				// 未読blog_comment数
				$bac = new Tv_BlogComment($this->backend);
				$bac_list = $bac->searchProp(
					array('blog_comment_id'),
					array(
						'blog_article_id' => $bc->get('blog_article_id'),
						'blog_comment_status' => 1
					)
				); 
				// 未読blog_commentあり なにもしない
				if($bac_list[0] > 0){
				
				}
				// 未読blog_commentなし blog_article側の未読コメントフラグを0にする
				else{
					$ba->set('blog_article_notice',0);
				}
				
				$ba->set('blog_article_updated_time',$now);
				$ba->update();
			}
		} 
	
	} 
	
	/**
	 * 指定したユーザの表示している分のブログコメント未読ステータスを既読ステータスに変更する
	 * 
	 * @access public
	 * @param string $listview_data
	 */
	 function updateNoticeList($listview_data)
	 {
		 $user = $this->session->get('user');
		 
		// 不正なアクセス
		if (!$this->session->isValid() || $user['user_id'] == ''){
				return;
		}
		
		foreach($listview_data as $k=>$v){
				$o = &new Tv_BlogComment($this->backend, 'blog_comment_id', $v['blog_comment_id']);
				// 未読のデータであれば既読に変更する
				if( $o->get('blog_comment_notice') == 1 && $user['user_id'] == $v['blog_article_user_id']){
					$o->set('blog_comment_notice', 0);
					$o->update();
				}
		}
	 }
} 

/**
 * 日記コメントオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_BlogComment extends Ethna_AppObject
{
	/**
	 *  オブジェクトを追加する
	 *
	 *  @access public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function add()
	{
		$timestamp = date('Y-m-d H:i:s');
		$user = $this->session->get('user');
		// オブジェクトの追加
		$this->set('user_id',$user['user_id']);
		$this->set('image_id', 0);
		$this->set('blog_comment_status', 1);
		$this->set('blog_comment_checked', 0);
		$this->set('blog_comment_created_time', $timestamp);
		$this->set('blog_comment_updated_time', $timestamp);
		parent::add();
		
		// blog_comment_hashを生成する
		$id = $this->getId();
//		$hash = md5($id);
		$um = $this->backend->getManager('Util');
		$hash = $um->getUniqId();
		$o = new Tv_BlogComment($this->backend, 'blog_comment_id', $id);
		$o->set('blog_comment_hash', $hash);
		$o->update();
		// blog_comment_hashをセットする
		$this->set('blog_comment_hash', $hash);
	}
	
	/**
	 *  オブジェクトを更新する
	 *
	 *  @access public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function update()
	{
		$timestamp = date('Y-m-d H:i:s');
		// 更新日時を保存する
		$this->set('blog_comment_updated_time', $timestamp);
		parent::update();
	}
	
	/**
	 *  オブジェクトを論理削除する
	 *
	 *  @access public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function delete()
	{
		// 記事のコメント数を減らす
		$article = new Tv_BlogArticle($this->backend, 'blog_article_id', $this->get('blog_article_id'));
		$article->set('blog_article_comment_num', $article->get('blog_article_comment_num') - 1);
		$article->update();
		
		$timestamp = date('Y-m-d H:i:s');
		// 更新日時を保存する
		$this->set('blog_comment_deleted_time', $timestamp);
		// 論理削除
		$this->set('blog_comment_status', 0);
		parent::update();
	}
	
	/**
	 *  画像を削除する
	 *
	 *  @access public
	 *  @return boolean true: 正常終了, false: エラー
	 */
	function deleteImage()
	{
		// 画像を削除
		if($this->get('image_id')) {
			$im =& $this->backend->getManager('Image');
			$im->remove($this->get('image_id'));
			$this->set('image_id', 0);
		}
		$this->update();
		
		return true;
	}
	
	/**
	 *  オブジェクトを削除する
	 *
	 *  @access public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function remove()
	{
		$this->delete();
		
		return parent::remove();
	}
} 

?>