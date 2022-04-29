<?php
/**
 * Tv_CommunityComment.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * コミュニティコメントマネージャ
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_CommunityCommentManager extends Ethna_AppManager
{
	/**
	 * コミュニティコメントを削除する
	 * 
	 * @access public
	 * @param string $communityCommentId 削除するコミュニティコメントのID
	 */
	function delete($communityCommentId)
	{
		$communityComment=& new Tv_CommunityComment(
			$this->backend,
			'community_comment_id',
			$communityCommentId
		);
		if(!$communityComment->isValid()){
			return Ethna::raiseError('コメントが存在しません', E_COMMUNITY_COMMENT_NOT_FOUND);
		}
		$communityComment->set('community_comment_status', 0);
		$communityComment->set('community_comment_deleted_time', date('Y-m-d H:i:s'));
		$communityComment->update();
	}
	
	/**
	 * 指定したユーザのコミュニティコメントを削除する
	 * 
	 * @access public
	 * @param string $user_id ユーザID
	 */
	function status_off($user_id)
	{ 
		// 日記を非表示にする
		$cc = new Tv_CommunityComment($this->backend);
		$cc_list = $cc->searchProp(
			array('community_comment_id'),
			array(
				'user_id' => $user_id,
				'community_comment_status' => 1
			)
		); 
		// community_comment_statusを"0:削除"にする
		$now = date('Y-m-d H:i:s');
		if ($cc_list[0] > 0) {
			foreach($cc_list[1] as $v) {
				$cc = new Tv_CommunityComment($this->backend, 'community_comment_id', $v['community_comment_id']);
				if (!$cc->isValid()) return false;
				$cc->set('community_comment_status', 0);
				$cc->set('community_comment_updated_time',$now);
				$cc->set('community_comment_deleted_time',$now);
				$cc->update();
				
				// community_articleのコメント数を減算する
				$ca = new Tv_CommunityArticle($this->backend, 'community_article_id', $cc->get('community_article_id'));
				$ca->set('community_article_comment_num', $ca->get('community_article_comment_num')-1);
				$ca->set('community_article_updated_time',$now);
				$ca->update();
			} 
		} 
	} 
}

/**
 * コミュニティコメントオブジェクト
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_CommunityComment extends Ethna_AppObject
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
		// オブジェクト追加
		$this->set('user_id', $user['user_id']);
		$this->set('community_comment_status', 1);
		$this->set('community_comment_checked', 0);
		$this->set('image_id', 0);
		$this->set('community_comment_created_time', $timestamp);
		$this->set('community_comment_updated_time',  $timestamp);
		parent::add();
		
		// community_comment_hashを生成する
		$id = $this->getId();
//		$hash = md5($id);
		$um = $this->backend->getManager('Util');
		$hash = $um->getUniqId();
		$o = new Tv_CommunityComment($this->backend, 'community_comment_id', $id);
		$o->set('community_comment_hash', $hash);
		$o->update();
		// community_comment_hashをセットする
		$this->set('community_comment_hash', $hash);
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
		$this->set('community_comment_updated_time', $timestamp);
		parent::update();
	}
	
	/**
	 *  コメントを論理削除する
	 *
	 *  @access public
	 *  @return mixed   0:正常終了 Ethna_Error:エラー
	 */
	function delete()
	{
		// トピックのコメント数を減らす
		$article =& new Tv_CommunityArticle($this->backend, 'community_article_id', $this->get('community_article_id'));
		$article->set('community_article_comment_num', $article->get('community_article_comment_num') - 1);
		$article->update();
		
		$timestamp = date('Y-m-d H:i:s');
		// 更新日時を保存する
		$this->set('community_comment_deleted_time', $timestamp);
		// 論理削除
		$this->set('community_comment_status', 0);
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