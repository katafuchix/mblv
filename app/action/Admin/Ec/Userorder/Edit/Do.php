<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理オーダー詳細編集実行アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcUserorderEditDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'user_order_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'cart_hash' => array(
			'type'		=> VAR_TYPE_STRING,
			'required'	=> true,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'user_order_delivery_name'	=> array(
			'type'		=> VAR_TYPE_STRING,
		),
		'user_order_delivery_name_kana'	=> array(
			'type'				=> VAR_TYPE_STRING,
		),
		'user_order_delivery_zipcode'	=> array(
			'type'			=> VAR_TYPE_STRING,
		),
		'user_order_delivery_region_id'	=> array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, region_id',
		),
		'user_order_delivery_address'	=> array(
			'type'			=> VAR_TYPE_STRING,
		),
		'user_order_delivery_address_building'	=> array(
			'type'			=> VAR_TYPE_STRING,
		),
		'user_order_delivery_phone'	=> array(
			'type'			=> VAR_TYPE_STRING,
		),
		'user_order_delivery_type'	=> array(
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_HIDDEN,
		),
		'cancel_checkbox'	=> array(
			'name' 		=> 'キャンセル',
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'cart_status'	=> array(
			'name'		=> '注文ステータス',
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'Util, cart_status',
		),
		'cart_item_num'	=> array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'cart_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'slip_code' => array(
			'type'		=> array(VAR_TYPE_STRING),
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'post_unit_group_id' => array(
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'post_unit_sent_status' => array(
			'type'		=> array(VAR_TYPE_INT),
		),
		'user_order_comment' => array(
			'name'		=> 'コメント',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXTAREA,
		),
		'user_order_no'	=> array(
		),
		'user_order_type'	=> array(
		),
		'user_order_use_point_status'	=> array(
		),
		'user_order_get_point'	=> array(
		),
		'user_order_card_revo_status' => array(
		),
		'user_order_card_cart_hash' => array(
		),
		'user_order_credit_auth_code' => array(
		),
		'user_order_conveni_cart_hash' => array(
		),
		'user_order_conveni_sale_code' => array(
		),
		'user_order_status'	=> array(
		),
		'user_order_created_time'	=> array(
		),
		'user_order_delivery_day'	=> array(
		),
		'user_order_delivery_note'	=> array(
		),
		'user_order_postage'	=> array(
		),
		'user_order_exchange_fee'	=> array(
		),
		'user_order_total_price1'	=> array(
		),
		'user_order_total_price2'	=> array(
		),
		'user_mailaddress'	=> array(
		),
		'user_address'	=> array(
		),
		'user_phone'	=> array(
		),
		'item_id'	=> array(
		),
		'item_name'	=> array(
		),
		'item_type'	=> array(
		),
		'item_price'	=> array(
		),
		'post_unit_sent_flag'	=> array(
		),
		'post_unit_item_num'	=> array(
		),
	);
}

/**
 * 管理オーダー詳細編集実行アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcUserorderEditDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 検証エラーの場合
		if ($this->af->validate() > 0) return 'admin_ec_userorder_edit';
		
		// 二重ポスト対応
		if(Ethna_Util::isDuplicatePost()) return 'admin_ec_userorder_list';
		
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
		$um = $this->backend->getManager('Util');
		
		//db
		$db = $this->backend->getDB();
		$this->cart_hash = $this->af->get('cart_hash');
		
		//ご注文者情報 start
		$o =& new Tv_UserOrder($this->backend, 'user_order_id', $this->af->get('user_order_id'));
		//$o->importForm(OBJECT_IMPORT_IGNORE_NULL);//cart_id.arrayでerrorのため。
		
		// 商品お届け先が「指定」でお届け先情報が空の場合
		if($o->get('user_order_delivery_type') == 2
			&&
			($this->af->get('user_order_delivery_name') == ""
				|| $this->af->get('user_order_delivery_region_id') == ""
				|| $this->af->get('user_order_delivery_address') == ""
				|| $this->af->get('user_order_delivery_zipcode') == ""
			)
		) {
			// エラー表示
			$this->ae->add(null, '', E_ADMIN_USER_ORDER_DELIVERY_TYPE);
			return 'admin_ec_userorder_edit';
		}
		
		// お届け先氏名が入っていない場合は商品お届け先を「指定住所」に変更
		if($this->af->get('user_order_delivery_name')){
			$o->set('user_order_delivery_type', 2);
		}
		
		$o->set('user_order_delivery_name', 			$this->af->get('user_order_delivery_name'));
		$o->set('user_order_delivery_zipcode', 			$this->af->get('user_order_delivery_zipcode'));
		$o->set('user_order_delivery_region_id', 			$this->af->get('user_order_delivery_region_id'));
		$o->set('user_order_delivery_address', 			$this->af->get('user_order_delivery_address'));
		$o->set('user_order_delivery_address_building', $this->af->get('user_order_delivery_address_building'));
		$o->set('user_order_delivery_phone', 			$this->af->get('user_order_delivery_phone'));
		$o->set('user_order_updated_time',				date("Y-m-d H:i:s"));
		$o->set('user_order_comment',					$this->af->get('user_order_comment'));
		$o->update();
		//ご注文者情報 end
		
		
		//注文タイプ 1:クレジット,2:コンビニ,3:代引,4:銀行振込
		$this->order_type 		= $o->get('user_order_type');
		//ポイントを使用するか
		$this->use_point_flag 	= $o->get('user_order_use_point_status');
		//使用するポイント
		$this->use_point 		= $o->get('user_order_use_point');
		
		//ご注文商品内容注文ステータス start
		// 0:未決済,1:注文済,2:決済済,4:返品済,5:キャンセル
		$cart_status_name = array(0 => '未決済', 1 => '注文済', 2 => '決済済', 4 => '返品済', 5 => 'キャンセル',);
//		$um = $this->backend->getManager('Util');
//		$cart_status_name = $um->getAttrList('cart_status');
		if($this->af->get('cart_status')){
			foreach($this->af->get('cart_status') as $this->cart_id => $new_cart_status){
				//カート情報取得
				$o =& new Tv_Cart($this->backend, 'cart_id', $this->cart_id);
				$this->user_id 	= $o->get('user_id');
				$this->cart_item_num = $o->get('cart_item_num');
				$this->item_id 	= $o->get('item_id');
				// ユーザ情報の取得
				$u =& new Tv_User($this->backend, 'user_id', $this->user_id);
				$this->user_point 		= $u->get('user_point');
				$this->user_mailaddress = $u->get('user_mailaddress');
				$this->user_name 		= $u->get('user_name');
				$this->region_id 		= $u->get('region_id');
				
				//すでに指定のステータスなら更新しない
				$old_cart_status = $o->get('cart_status');
				if($old_cart_status == $new_cart_status) continue;
				
				//旧ステータスが返品済みの場合はステータス変更はできない
				if($old_cart_status == 4){
					$this->ae->add(null, '', E_ADMIN_CART_STATUS_NOT_EDIT_FROM_RETURN);
					continue;
				}
				//旧ステータスがキャンセルの場合はステータス変更はできない
				if($old_cart_status == 5){
					$this->ae->add(null, '', E_ADMIN_CART_STATUS_NOT_EDIT_FROM_CANCEL);
					continue;
				}
				
				//未決済
				if($new_cart_status == 0){
				}
				//注文済み
				elseif($new_cart_status == 1){
				}
				//決済済み
				elseif($new_cart_status == 2){
				}
				//返品済み　カートを返品済みにする
				elseif($new_cart_status == 4){
					$res = $this->cart_status_update($new_cart_status);
				}
				//キャンセル
				elseif($new_cart_status == 5){
					$res = $this->cart_status_update($new_cart_status);
				}
				
				//共通処理 ステータス更新
				$o =& new Tv_Cart($this->backend, 'cart_id', $this->cart_id);
				$o->set('cart_status', $new_cart_status);
				$o->set('cart_updated_time', date('Y-m-d H:i:s'));
				$o->update();
				
				// 管理者情報
				$admin = $this->session->get('admin');
				
				// 更新履歴の挿入
				$och =& new Tv_UserOrderHist($this->backend);
				$och->set('user_order_id', $this->af->get('user_order_id'));
				$och->set('cart_id', $this->cart_id);
				$och->set('cart_item_num', $this->cart_item_num);
				$och->set('cart_status', $new_cart_status);
				$och->set('user_order_hist_user', $admin['admin_id']);
				$och->set('user_order_hist_created_time', date('Y-m-d H:i:s'));
				$och->set('user_order_hist_updated_time', date('Y-m-d H:i:s'));
				$och->add();
				
				$this->ae->add('errors',"カート番号「".$this->cart_id."」を更新しました。$cart_status_name[$old_cart_status] -> $cart_status_name[$new_cart_status]");
			}
		}
		//ご注文商品内容注文ステータス end
		
		
		
		//ご注文商品内容数量 start
		//整形
		foreach($this->af->get('cart_id') as $k => $v){
			$cart_item_num = $this->af->get('cart_item_num');
			$cart[$v] = $cart_item_num[$k];
		}
		
		//カート更新処理 , 発送単位更新処理
		foreach($cart as $cart_id => $cart_item_num){
			//カート更新処理
			$o =& new Tv_Cart($this->backend, 'cart_id', $cart_id);
			//返品済みの場合
			if($o->get('cart_status') == 4) continue;
			//キャンセル済みの場合
			if($o->get('cart_status') == 5) continue;
			//個数に変更がないなら更新しない
			$old_cart_item_num = $o->get('cart_item_num');
			
			/////////////////
			//個数加算の場合/
			/////////////////
			if($old_cart_item_num < $cart_item_num){
				$this->ae->add(null, '', E_ADMIN_CART_ITEM_NUM_SUBTRACTION);
				return 'admin_ec_userorder_edit';
			}
			/////////////////////
			//個数変更なしの場合/
			/////////////////////
			elseif($old_cart_item_num == $cart_item_num) continue;
			
			/////////////////////
			//個数減算の場合/
			/////////////////////
			else{
				//個数を更新
				$o->set('cart_item_num', $cart_item_num);
				$res = $o->update();
				if(Ethna::isError($res)) return 'admin_error';
				$this->ae->add('errors',"カート番号「".$cart_id."」を更新しました。$old_cart_item_num -> $cart_item_num 個");
				
				//在庫調整する
				$num = $old_cart_item_num - $cart_item_num;
				$s =& new Tv_Stock($this->backend, 'stock_id', $o->get('stock_id'));
				$s->set('stock_num', $s->get('stock_num') + $num);
				$r = $s->update();
				if(Ethna::isError($r)) return 'master_error';
				
				// 更新履歴の挿入
				$och =& new Tv_UserOrderHist($this->backend);
				$och->set('user_order_id', $this->af->get('user_order_id'));
				$och->set('cart_id', $cart_id);
				$och->set('cart_item_num', $cart_item_num);
				$och->set('cart_status', $o->get('cart_status'));
				$och->set('user_order_hist_user', $this->session->get('admin_id'));
				$och->set('user_order_hist_created_time', date('Y-m-d H:i:s'));
				$och->set('user_order_hist_updated_time', date('Y-m-d H:i:s'));
				$och->add();
				
				//発送単位更新処理
				//cart_idでpost_unitをselectして、結果件数が一件なら、そのpost_unit_item_numをform値で更新する
				//cart_idでpost_unitをselectして、結果件数が複数件なら、その件数を取得。件数がform値になるように論理削除を繰り返す
				$sql = "select count(post_unit_id)as cnt from post_unit where cart_id = ?";
				$rows = $db->db->getAll($sql, array($cart_id), DB_FETCHMODE_ASSOC);
				if (Ethna::isError($rows)) return 'admin_error';
				//結果件数が一件なら
				if($rows[0]['cnt'] == 1){
					$updateValues = array(
						'post_unit_item_num' => $cart_item_num,
						'post_unit_updated_time' => date('Y-m-d H:i:s'),
					);
					$res = $db->db->autoExecute('post_unit', $updateValues, DB_AUTOQUERY_UPDATE, " cart_id = $cart_id ");
					if (Ethna::isError($res)) return 'admin_error';
					$this->ae->add(null, '', I_ADMIN_POST_UNIT_EDIT_DONE);
				}
				//結果件数が複数件なら
				elseif($rows[0]['cnt'] > 1){
					//件数がform値になるように論理削除を繰り返す
					$cnt = $rows[0]['cnt'] - $cart_item_num;
					for($i=0;$i<$cnt;$i++){
						$updateValues = array(
							'post_unit_item_num' => '0',
							'post_unit_status' => '0',
							'post_unit_updated_time' => date('Y-m-d H:i:s'),
							'post_unit_deleted_time' => date('Y-m-d H:i:s'),
						);
						$res = $db->db->autoExecute('post_unit', $updateValues, DB_AUTOQUERY_UPDATE, "cart_id = $cart_id limit 1");
						if(Ethna::isError($res)) return 'admin_error';
					}
				}
				
				//かごの中身が0になるなら、送料手数料、合計なども0にする
				$sql = 'select max(cart_item_num)as cart_item_num_max from cart where cart_hash = ?';
				$rows = $db->db->getAll($sql, array($this->cart_hash), DB_FETCHMODE_ASSOC);
				if (Ethna::isError($rows)) return 'admin_error';
				if($rows[0]['cart_item_num_max'] == 0) $order_zero_flag = true;
			}
		}
		//ご注文商品内容数量 end
		
		
		//発送情報 start
		if(is_array($this->af->get('post_unit_group_id'))){
			foreach($this->af->get('post_unit_group_id') as $k => $this->group_id){
				//佐川伝票コードstart
				$slip = $this->af->get('slip_code');
				$slip_code = $slip[$k];
				$updateValues = array(
					'slip_code' => $slip_code,
					'post_unit_updated_time' => date('Y-m-d H:i:s'),
				);
				$res = $db->db->autoExecute('post_unit', $updateValues, DB_AUTOQUERY_UPDATE, "post_unit_group_id = $this->group_id and cart_hash = '$this->cart_hash'");
				if(Ethna::isError($res)) return 'admin_error';
				//佐川伝票コードend
				
				//商品発送ステータスstart
				//現在の発送ステータスを取得
				$sql = "select post_unit_sent_status from post_unit where cart_hash = ? and post_unit_group_id = $this->group_id limit 1";
				$rows = $db->db->getAll($sql, array($this->cart_hash), DB_FETCHMODE_ASSOC);
				if (Ethna::isError($rows)) return 'admin_error';
				$old_status = $rows[0]['post_unit_sent_status'];
				
				//発送ステータス変更ならば更新する
				$this->post_sent_flag = $this->af->get('post_unit_sent_status');
				if($this->post_sent_flag[$this->group_id] != $old_status){
					//更新
					$updateValues = array(
						'post_unit_sent_status' => $this->post_sent_flag[$this->group_id],
						'post_unit_updated_time' => date('Y-m-d H:i:s'),
					);
					$res = $db->db->autoExecute('post_unit', $updateValues, DB_AUTOQUERY_UPDATE, "cart_hash = '$this->cart_hash' and post_unit_group_id = $this->group_id");
					if(Ethna::isError($res)) return 'admin_error';
					
					//「発送済み」へ更新したら注文者と管理者へメールする
					if($this->post_sent_flag[$this->group_id] == 1){
						//現在のメール送信ステータスを取得
						$sql = "select post_unit_mail_sent_status from post_unit where cart_hash = ? and post_unit_group_id = $this->group_id limit 1";
						$rows = $db->db->getAll($sql, array($this->cart_hash), DB_FETCHMODE_ASSOC);
						if (Ethna::isError($rows)) return 'admin_error';
						$old_status = $rows[0]['post_unit_mail_sent_status'];
						//未送信ならメールを送る
						if($old_status != 1){
						//	$this->post_mail_sent();
						}
							
						//出荷日を登録
						$updateValues = array(
							'post_unit_sent_date' => date('Y-m-d H:i:s'),
							'post_unit_updated_time' => date('Y-m-d H:i:s'),
						);
						$res = $db->db->autoExecute('post_unit', $updateValues, DB_AUTOQUERY_UPDATE, "cart_hash = '$this->cart_hash' and post_unit_group_id = $this->group_id");
						if(Ethna::isError($res)) return 'admin_error';
						
						//レビュー登録
						$sql = "select cart_id, item_id from post_unit where cart_hash = ? and post_unit_group_id = ?";
						$rows = $db->db->getAll($sql, array($this->cart_hash, $this->group_id), DB_FETCHMODE_ASSOC);
						if (Ethna::isError($rows)) return 'admin_error';
						if($rows){
							foreach($rows as $k => $v){
								// 既にこのカートIDとユーザIDに対してレビュー投稿申請があるかどうか確認する
								$review =& new Tv_Review($this->backend, array('cart_id', 'user_id'), array($v['cart_id'], $this->user_id));
								if(!$review->isValid()){
									$review =& new Tv_Review($this->backend);
									$review->set('cart_id', $v['cart_id']);
									$review->set('user_id', $this->user_id);
									$review->set('item_id', $v['item_id']);
									$review->set('review_status', 1);
									$review->set('review_hash', $um->getUniqId());
									$review->set('review_created_time', date('Y-m-d H:i:s'));
									$review->set('review_updated_time', date('Y-m-d H:i:s'));
									$r = $review->add();
									if(Ethna::isError($r)) return 'admin_error';
								}
							}
						}
					}
				}
				//商品発送ステータスend
			}
		}
		//発送情報 end
		
		//他に発送するべき商品がなくなった場合、ポイントを付与する
		$added =& new Tv_UserOrder($this->backend, 'user_order_id', $this->af->get('user_order_id'));
		if($added->get('user_order_point_added_status') != 1){
			//post_unit をcart_hash,postsent_falgで検索
			$sql = "select count(post_unit_id)as cnt from post_unit where cart_hash = ? and post_unit_sent_status = 0";
			$rows = $db->db->getAll($sql, array($this->cart_hash), DB_FETCHMODE_ASSOC);
			if (Ethna::isError($rows)) return 'admin_error';
			$cnt = $rows[0]['cnt'];
			if($cnt == 0){
				/* =============================================
				// ポイント追加系処理(ポイント付与履歴テーブルに今回のポイント付与情報登録
				 ============================================= */
				//付与するポイントを取得
				$order =& new Tv_UserOrder($this->backend, 'cart_hash', $this->cart_hash);
				
				$get_point = $order->get('user_order_get_point');
				
				$pm = $this->backend->getManager('Point');
				$point_type_search = $this->config->get('point_type_search');
				$param = array(
					'user_id'			=> $this->user_id,
					'point'				=> $get_point,
					'point_type'		=> $point_type_search['order'],
					'point_memo'		=> 'ORDER',
				);
				$pm->addPoint($param);
				
				//注文テーブルのポイント付与確定日に現在日時を登録する
				$o =& new Tv_UserOrder($this->backend, 'user_order_id', $this->af->get('user_order_id'));
				$o->set('user_order_get_point_date', date('Y-m-d H:i:s'));
				$o->set('user_order_updated_time', date('Y-m-d H:i:s'));
				$r = $o->update();
				if(Ethna::isError($r)) return 'admin_error';
				
				//ポイント付与したフラグをON
			//	$added->set('point_added_flag', '1');
			//	$r = $added->update();
			//	if(Ethna::isError($r)) return 'master_error';
				
			}
		}
		//////////////////////////////////////////////////////////////////////
		//カート個数を減算した場合は料金計算も行う →改修→ 必ず再計算を行う//
		//////////////////////////////////////////////////////////////////////
		//準備
		$c = $this->backend->getManager('Cart');
		$o =& new Tv_UserOrder($this->backend, 'user_order_id', $this->af->get('user_order_id'));
		
		//買い物かご取得
		$cart_list = $c->getCartList($this->cart_hash);
		if(count($cart_list) == 0){
			// フォーム値のクリア
			$this->af->clearFormVars();
			return 'admin_ec_userorder_list';
		}
		// 買い物合計金額の初期化
		$new_total_price1 = 0;
		// 取得ポイントの初期化
		$get_point = 0;
		// 買い物カゴ合計商品個数の初期化
		$total_num = 0;
		// すべての買い物カゴレコードに対して処理する
		foreach($cart_list as $k => $v){
			// 買い物カゴレコードの小計を計算する
			$cart_list[$k]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			// 消費税抜きの合計金額を加算する
			$new_total_price1 += $v['item_price'] * $v['cart_item_num'];
			// 合計商品個数を加算する
			$total_num += $v['cart_item_num'];
			// ポイント計算
			$get_point += $v['item_point'] * $v['cart_item_num'];
			// 発送単位ごとの、商品ＩＤとその価格・個数のリスト
			$unit_item_detail[$v['item_id']]['item_price'] = $v['item_price'];
			$unit_item_detail[$v['item_id']]['cart_item_num'] = $unit_item_detail[$v['item_id']]['cart_item_num'] + $v['cart_item_num'];
			$subtotal = $v['item_price'] * $v['cart_item_num'];
			$unit_item_detail[$v['item_id']]['subtotal'] = $unit_item_detail[$v['item_id']]['subtotal'] + $subtotal;
			// ストック（タイプ）ID単位ごとの、商品ＩＤとその価格・個数のリスト
			$unit_stock_detail[$v['stock_id']]['stock_id'] = $v['stock_id'];
			$unit_stock_detail[$v['stock_id']]['item_id'] = $v['item_id'];
			$unit_stock_detail[$v['stock_id']]['item_price'] = $v['item_price'];
			$unit_stock_detail[$v['stock_id']]['cart_item_num'] = $v['cart_item_num'];
			$unit_stock_detail[$v['stock_id']]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			//人気商品の算出用に購買ログにaddするために配列に格納
			$ranking_item_detail[$k]['item_id'] = $v['item_id'];
			$ranking_item_detail[$k]['stock_id'] = $v['stock_id'];
			$ranking_item_detail[$k]['ranking_order_cart_item_num'] = $v['cart_item_num'];
		}
		$o->set('user_order_total_price1', $new_total_price1);//小計
		
		/**
		 * 消費税の計算
		 */
		$new_tax = floor($new_total_price1/21);
		$o->set('user_order_tax', $new_tax);
		
		/*
		 * 送料
		 * @param array $cart_list 商品情報リスト
		 * @return integer 送料
		 */
		$new_postage = 0;
		// 購入ユーザの都道府県
		$region_id = $this->region_id;
		// その他住所へ配送の場合は、配送先の都道府県に上書き
		if($this->af->get('user_order_delivery_type') == 2) $region_id = $this->af->get('user_order_delivery_region_id');
		// 送料を取得
		$new_postage = $um->getPostage($cart_list, $unit_item_detail, $unit_stock_detail, $region_id);
		$o->set('user_order_postage', $new_postage);
		
		/*
		 * 代引き手数料
		 * @param array $cart_list 商品情報リスト
		 * @return integer 代引き手数料
		 */
		$new_exchange_fee = 0;
		if($this->order_type == 3){
			$new_exchange_fee = $um->getExchangeFee($cart_list, $unit_item_detail, $unit_stock_detail);
		}
		$o->set('user_order_exchange_fee', $new_exchange_fee);
		
		/*
		 * ポイント計算
		 */
		//消費ポイントを初期化
		$new_expend_point = 0;
		if($this->use_point_flag == 1) $new_expend_point = $this->use_point;
		// 商品小計 < 使用するポイントの場合は調整
		$rest_point = 0;
		if($new_total_price1 < $new_expend_point){
			$rest_point = $new_expend_point - $new_total_price1;//ポイントの余り
			$new_expend_point = $new_total_price1;
			//ポイントの余りをユーザへ返す
			/* ========================================================================
			// ポイント追加系処理(ポイント付与履歴テーブルに今回のポイント付与情報登録
			 ========================================================================== */
			//付与するポイントを取得
			$get_point = $rest_point;
			$pm = $this->backend->getManager('Point');
			$point_type_search = $this->config->get('point_type_search');
			$param = array(
				'user_id'			=> $this->user_id,
				'point'				=> $get_point,
				'point_type'		=> $point_type_search['admin'],
				'point_memo'		=> 'ADMIN',
			);
			$pm->addPoint($param);
			$this->ae->add('errors', '利用ポイント('.$this->use_point.')が商品合計('.$new_total_price1.')を超えたため、ポイント調整しました。');
			$this->ae->add('errors', '　利用ポイントを'.$new_expend_point.'に変更しました。ユーザへ'.$rest_point.'をポイント返還しました。');
		}
		$o->set('user_order_use_point', $new_expend_point);
		
		/*
		 * 合計金額
		 */
		$new_total_price2 = $new_total_price1 - $new_expend_point + $new_postage + $new_exchange_fee;
		$o->set('user_order_total_price2', $new_total_price2);
		
		//更新
		$o->set('user_order_updated_time', date('Y-m-d H:i:s'));
		$o->update();
		
		//かごの中すべて0になったので、送料、代引手数料、商品小計、商品合計、取得ポイントを0円に
		if($order_zero_flag == true){
			$order =& new Tv_UserOrder($this->backend, 'cart_hash', $this->cart_hash);
			$order->set('user_order_get_point', '0');
			$order->set('user_order_total_price1', '0');
			$order->set('user_order_total_price2', '0');
			$order->set('user_order_tax', '0');
			$order->set('user_order_postage', '0');
			$order->set('user_order_exchange_fee', '0');
			$order->set('user_order_updated_time', date('Y-m-d H:i:s'));
			$r = $order->update();
			if(Ethna::isError($r)) return 'admin_error';
			$this->ae->add(null, '', I_ADMIN_CART_ITEM_EDIT_DONE_FOR_EMPTY);
		}
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_USER_ORDER_EDIT_DONE);
		
		return 'admin_ec_userorder_list';
	}
	
	//注文者へ「商品を発送しました」メールを送る
	function post_mail_sent()
	{
		//準備
		$db = $this->backend->getDB();
		
		//送る商品は何？
		$values = array($this->cart_hash, $this->group_id);
		$sql = "select * from post_unit where cart_hash = ? and group_id = ? ";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		if (Ethna::isError($rows)) return 'admin_error';
		$i=0;
		foreach($rows as $k => $v){
			$post_list[$i]['item_id'] = $v['item_id'];
			$post_list[$i]['stock_id'] = $v['stock_id'];
			$post_list[$i]['post_unit_item_num'] = $v['post_unit_item_num'];
			//item_name取得
			$item =& new Tv_Item($this->backend, 'item_id', $v['item_id']);
			$post_list[$i]['item_name'] = $item->get('item_name');
			$post_list[$i]['item_price'] = $item->get('item_price');
			//item_type,one_type_only_flag取得
			$stock =& new Tv_Stock($this->backend, 'stock_id', $v['stock_id']);
			$post_list[$i]['item_type'] = $stock->get('item_type');
			$post_list[$i]['stock_one_type_status'] = $stock->get('stock_one_type_status');
			$i++;
		}
		
		//カート情報取得
		$values = array($this->cart_hash);
		$sql = "SELECT * FROM cart c,item i,stock s  WHERE c.cart_hash = ? AND c.stock_id = s.stock_id AND s.item_id = i.item_id ";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		if (Ethna::isError($rows)) return 'admin_error';
		$cart_list = $rows;
		
		//仕入れ先情報取得
		$sql = "SELECT s.supplier_shipping_type, s.supplier_name FROM supplier s, item i WHERE item_id = ? AND i.supplier_id = s.supplier_id";
		$rows = $db->db->getAll($sql, array($cart_list[0]['item_id']), DB_FETCHMODE_ASSOC);
		if (Ethna::isError($rows)) return 'admin_error';
		$supplier_shipping_type = $rows[0]['supplier_shipping_type'];
		$supplier_name = $rows[0]['supplier_name'];
		
		//オーダー情報取得
		$order =& new Tv_UserOrder($this->backend, 'cart_hash', $this->cart_hash);
		
		//佐川伝票コード取得
		$values = array($this->cart_hash);
		$sql = "select slip_code from post_unit where cart_hash = ? and post_unit_status = 1 and post_unit_group_id = $this->group_id limit 1";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		if (Ethna::isError($rows)) return 'admin_error';
		$slip_code_list = $rows;
		
		// 発送済みメール送信
		$mail_values = array(
			// 送信者アドレス
			'adminMailaddress' => $this->config->get('adminMailaddress'),
			//cart_list
			'cart_list' => $cart_list,
			//post_list
			'post_list' => $post_list,
			//slip_code_list
			'slip_code_list' => $slip_code_list,
			//ユーザ名
			'user_name' => $this->user_name,
			//発送日
			'sent_date' => date("Y-m-d H:i:s", time()),
			'total_price1' 	=> $order->get('total_price1'),
			'postage' 		=> $order->get('postage'),
			'exchange_fee' 	=> $order->get('exchange_fee'),
			'tax' 			=> $order->get('tax'),
			'use_point' 	=> $order->get('use_point'),
			'total_price2' 	=> $order->get('total_price2'),
			'supplier_shipping_type' => $supplier_shipping_type,
			'supplier_name' => $supplier_name,
		);
		
		// ユーザへ送信
		$ms = new Tv_Mail($this->backend);
		$ms->sendOne($this->user_mailaddress, "item_send{$supplier_shipping_type}" , $mail_values );
		// 管理者へ送信
		$ms->sendOne($this->config->get('user_order_copy_mailaddress'), "item_send{$supplier_shipping_type}" , $mail_values );
		
		$this->ae->add(null, '', I_ADMIN_POST_UNIT_MAIL_SENT_DONE);
		
		//「商品発送しました」メールを送ったらpost_mail_sent_statusを1に更新する
		$updateValues = array(
			'post_unit_sent_status' => 1,
			'post_unit_updated_time' => date('Y-m-d H:i:s'),
		);
		$res = $db->db->autoExecute('post_unit', $updateValues, DB_AUTOQUERY_UPDATE, "cart_hash = '$this->cart_hash' and group_id = $this->group_id");
		if(Ethna::isError($res)) return 'admin_error';
	}
	
	//カートステータスを更新する
	// 0:未決済,1:注文済,2:決済済,4:返品済,5:キャンセル
	function cart_status_update($cart_status)
	{
		//db
		$db = $this->backend->getDB();
		
		// オーダー情報を取得する
		$o =& new Tv_UserOrder($this->backend, 'user_order_id', $this->af->get('user_order_id'));
		$use_point = $o->get('user_order_use_point');//使用ポイント
		$get_point = $o->get('user_order_get_point');//取得ポイント
		$point_added_flag = $o->get('user_order_point_added_status');//1:ポイント付与完了
		
		// レビュー情報のステータスを無効に
		$res = $db->db->autoExecute('review', array('review_status' => 0), DB_AUTOQUERY_UPDATE,"cart_id = " . $this->cart_id);
		if(Ethna::isError($res)) exit;
		
		//買い物かごキャンセル
		$c =& new Tv_Cart($this->backend, 'cart_id', $this->cart_id);
		$cart_item_num = $c->get('cart_item_num');
		$c->set('cart_status', 5);//5:買い物かごキャンセル
		$c->set('cart_item_num', 0);
		$c->set('cart_updated_time', date('Y-m-d H:i:s'));
		$r = $c->update();
		
		if(Ethna::isError($r)) exit;
		
		//キャンセルなら在庫数をもどす
		if($cart_status == 5){
			//在庫キャンセル(在庫に今回の個数を戻す)
			$s =& new Tv_Stock($this->backend, 'stock_id', $c->get('stock_id'));
			$s->set('stock_num', $s->get('stock_num') + $cart_item_num);
			$s->set('stock_updated_time', date('Y-m-d H:i:s'));
			$r = $s->update();
			if(Ethna::isError($r)) exit;
		}
		
		//発送情報テーブル更新（商品個数を0にする）
		$res = $db->db->autoExecute('post_unit', array('post_unit_item_num' => 0, 'post_unit_updated_time' => 'now()'), DB_AUTOQUERY_UPDATE,"cart_id = " . $this->cart_id);
		if(Ethna::isError($res)) exit;
		
		//金額再計算を行う
		//準備
		$um = $this->backend->getManager('Util');
		$c = $this->backend->getManager('Cart');
		$o =& new Tv_UserOrder($this->backend, 'user_order_id', $this->af->get('user_order_id'));
		
		//買い物かご取得
		$cart_list = $c->getCartList($this->cart_hash);
		if(count($cart_list) == 0){
			$this->ae->add(null, '', I_ADMIN_CART_ITEM_EDIT_DONE_FOR_EMPTY);
			$o->set('user_order_get_point', '0');
			$o->set('user_order_total_price1', 0);
			$o->set('user_order_total_price2', 0);
			$o->set('user_order_tax', 0);
			$o->set('user_order_postage', 0);
			$o->set('user_order_exchange_fee', 0);
			$o->set('user_order_use_point', 0);
			$o->set('user_order_updated_time', date('Y-m-d H:i:s'));
			//$o->update();
			
			/*
			 * ポイント計算
			 */
			//消費ポイントを初期化
			$new_expend_point = 0;
			if($this->use_point_flag == 1) $new_expend_point = $this->use_point;
			// 商品小計 < 使用するポイントの場合は調整
			$rest_point = 0;
			if(0 < $new_expend_point){
				$rest_point = $new_expend_point;//ポイントの余り
				$new_expend_point = 0;
				
				//ポイントの余りをユーザへ返す
				// ========================================================================
				// ポイント追加系処理(ポイント付与履歴テーブルに今回のポイント付与情報登録
				// ========================================================================== 
				//付与するポイントを取得
				
				//ポイント付与済みならば、そのポイントを返してもらう
				if($point_added_flag){
					$add_point = $rest_point - $get_point;
				}else{
					$add_point = $rest_point;
				}
				$pm = $this->backend->getManager('Point');
				$point_type_search = $this->config->get('point_type_search');
				$param = array(
					'user_id'			=> $this->user_id,
					'point'				=> $add_point,
					'point_type'		=> $point_type_search['admin'],
					'point_memo'		=> 'ADMIN',
				);
				$pm->addPoint($param);
				$this->ae->add('errors', '利用ポイント('.$this->use_point.')が商品合計(0)を超えたためポイント調整しました。利用ポイントを('.$new_expend_point.')に変更。ユーザポイントを調整('.$add_point.')');
			}
			
			$o->set('user_order_use_point', $new_expend_point);
			$o->update();
		}
		// 買い物合計金額の初期化
		$new_total_price1 = 0;
		// 取得ポイントの初期化
		$get_point = 0;
		// 買い物カゴ合計商品個数の初期化
		$total_num = 0;
		// すべての買い物カゴレコードに対して処理する
		foreach($cart_list as $k => $v){
			// 買い物カゴレコードの小計を計算する
			$cart_list[$k]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			// 消費税抜きの合計金額を加算する
			$new_total_price1 += $v['item_price'] * $v['cart_item_num'];
			// 合計商品個数を加算する
			$total_num += $v['cart_item_num'];
			// ポイント計算
			$get_point += $v['item_point'] * $v['cart_item_num'];
			// 発送単位ごとの、商品ＩＤとその価格・個数のリスト
			$unit_item_detail[$v['item_id']]['item_price'] = $v['item_price'];
			$unit_item_detail[$v['item_id']]['cart_item_num'] = $unit_item_detail[$v['item_id']]['cart_item_num'] + $v['cart_item_num'];
			$subtotal = $v['item_price'] * $v['cart_item_num'];
			$unit_item_detail[$v['item_id']]['subtotal'] = $unit_item_detail[$v['item_id']]['subtotal'] + $subtotal;
			// ストック（タイプ）ID単位ごとの、商品ＩＤとその価格・個数のリスト
			$unit_stock_detail[$v['stock_id']]['stock_id'] = $v['stock_id'];
			$unit_stock_detail[$v['stock_id']]['item_id'] = $v['item_id'];
			$unit_stock_detail[$v['stock_id']]['item_price'] = $v['item_price'];
			$unit_stock_detail[$v['stock_id']]['cart_item_num'] = $v['cart_item_num'];
			$unit_stock_detail[$v['stock_id']]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			//人気商品の算出用に購買ログにaddするために配列に格納
			$ranking_item_detail[$k]['item_id'] = $v['item_id'];
			$ranking_item_detail[$k]['stock_id'] = $v['stock_id'];
			$ranking_item_detail[$k]['ranking_order_item_num'] = $v['cart_item_num'];
		}
		$o->set('user_order_total_price1', $new_total_price1);//小計
		
		/**
		 * 消費税の計算
		 */
		$new_tax = floor($new_total_price1/21);
		$o->set('user_order_tax', $new_tax);
		
		/*
		 * 送料
		 * @param array $cart_list 商品情報リスト
		 * @return integer 送料
		 */
		$new_postage = 0;
		// 購入ユーザの都道府県
		$region_id = $this->region_id;
		// その他住所へ配送の場合は、配送先の都道府県に上書き
		if($this->af->get('user_order_delivery_type') == 2) $region_id = $this->af->get('user_order_delivery_region_id');
		// 送料を取得
		$new_postage = $um->getPostage($cart_list, $unit_item_detail, $unit_stock_detail, $region_id);
		$o->set('user_order_postage', $new_postage);
		
		/*
		 * 代引き手数料
		 * @param array $cart_list 商品情報リスト
		 * @return integer 代引き手数料
		 */
		$new_exchange_fee = 0;
		if($this->order_type == 3){
			$new_exchange_fee = $um->getExchangeFee($cart_list, $unit_item_detail, $unit_stock_detail);
		}
		$o->set('user_order_exchange_fee', $new_exchange_fee);
		
		/*
		 * 合計金額
		 */
		$new_total_price2 = $new_total_price1 - $new_expend_point + $new_postage + $new_exchange_fee;
		$o->set('user_order_total_price2', $new_total_price2);
		
		//更新
		$o->set('user_order_updated_time', date('Y-m-d H:i:s'));
		$o->update();
	}
}
?>