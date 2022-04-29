<?php
/**
 * Review.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * [Cron]レビュー配送アクションクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
/*
 * 本スクリプトは毎日12:00に実行され、商品購入ユーザにレビュー投稿申請メールを送信します
 */
class Tv_Cli_Action_CronReview extends Tv_ActionClass
{
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string 遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		//文字コード
		mb_http_output("SJIS");
		mb_internal_encoding("EUC-JP");
		
		/*
		// 開始メール送信
		$ms = new Tv_Mail($this->backend);
		$value = array (
			'alert_subject' => 'レビュー依頼メール配信開始',
			'alert_date' 	=> date('Y-m-d H:i:s'),
			'alert_file' 	=> __FILE__,
			'alert_body' 	=> 'レビュー依頼メール配信を開始します',
		);
		$ms->sendOne($this->config->get('admin_mailaddress'), 'alert', $value);
		*/
		
		// 該当のレビュー cron待ちリストの取得
		// review_status 0:削除,1:cron待ち,2:投稿待ち,3:有効 
		
		$um = & $this->backend->getManager('Util');
		
		$param = array(
			'sql_select'	=> ' * ',
			'sql_from'		=> 'review as r, user as u, item i ',
			'sql_where'		=> 'u.user_id = r.user_id AND i.item_id = r.item_id AND review_status = ? AND review_created_time <= now() ',
			'sql_order'		=> 'review_id ASC ',
			'sql_values'	=> array(1,),
		);
		$review_list = $um->dataQuery($param);
		
		//$c = & new Tv_Config($this->backend,'config_id',1);
		$c =& new Tv_Config($this->backend,'config_type','mall');
		$mall_name 			= $c->get('site_name');
		$company_name 		= $c->get('site_company_name');
		$tel_no				= $c->get('site_phone');
		
		//リスト分くりかえし
		foreach($review_list as $l){
			$review_id 			= $l["review_id"];
			$cart_id			= $l["cart_id"];
			$user_id 			= $l["user_id"];
			$item_id 			= $l["item_id"];
			$item_name  		= $l["item_name"];
			$user_name			= $l["user_name"];
			$user_mailaddress 	= $l["user_mailaddress"];
			$review_hash		= $l["review_hash"];
			$value = array (
				'mall_url' 				=> $this->config->get('user_url'),
				'mall_name' 			=> $mall_name,
				'mall_meta_author'		=> $mall_meta_author,
				'review_id'				=> $review_id,
				'cart_id'				=> $cart_id,
				'user_id'				=> $user_id,
				'item_id'				=> $item_id,
				'item_name'				=> $item_name,
				'user_name'			 	=> $user_name,
				//'review_mailaddress' 	=> $this->config->get('review_mailaccount').'@'.$this->config->get('mail_domain'),
				'review_hash'			=> $review_hash,
				'admin_mailaddress'		=> $this->config->get('support_mailaddress'),
				'company_name'			=> $company_name,
				'tel_no'				=> $tel_no,
				'point_name'			=> $this->config->get('point_unit'),
			);
			// メールを配送する
			$GLOBALS['EMOJIOBJ']->to_carrier = $GLOBALS['EMOJIOBJ']->get_mailaddress_carrier($user_mailaddress);
			
			$m = new Tv_Mail($this->backend);
			$m->sendOne($user_mailaddress , 'user_review' , $value );
			
			// レビュー更新
			$reviewObject =& new Tv_Review($this->backend,'review_id',$review_id);
			$reviewObject->set('review_status',2);							//ユーザー投稿待ち
			$reviewObject->set('review_updated_time',date('Y-m-d H:i:s'));
			// 更新
			$r = $reviewObject->update();
			
			//実行したSQL
			foreach($this->backend->db_list as $a){
				$aaa.= $a->db->last_query."\n";
			}
		} //foreach
		
		sleep(1);
		
		// 終了メール送信
		$ms = new Tv_Mail($this->backend);
		$value = array (
			'alert_subject' => 'レビュー依頼メール配信終了【正常終了】',
			'alert_date' 	=> date('Y-m-d H:i:s'),
			'alert_file' 	=> __FILE__,
			'alert_body' 	=> "レビュー依頼メール配信を終了します\n\n$aaa",
		);
		$ms->sendOne($this->config->get('admin_mailaddress'), 'alert', $value);
	}
}
?>