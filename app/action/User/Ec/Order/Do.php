<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 注文実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcOrderDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		// 基本パラメータ
		'user_order_type' => array(
			'type'        => VAR_TYPE_INT,
		),
		'user_order_use_point_status' => array(
			'type'        => VAR_TYPE_INT,
		),
		'user_order_use_point' => array(
			'type'        => VAR_TYPE_INT,
		),
		'mode' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_type' => array(
			'type'        => VAR_TYPE_STRING,
		),
		//配達時間指定
		'user_order_delivery_day' => array(
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option' 	=> 'Util, delivery_date',
		),
		'user_order_delivery_note' => array(
			'type'        => VAR_TYPE_STRING,
		),
		// カードパラメータ
		'user_order_card_type' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_card_number' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_card_name' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_card_month' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_card_year' => array(
			'type'        => VAR_TYPE_STRING,
		),
		// コンビニパラメータ
		'user_order_conveni_type' => array(
			'type'        => VAR_TYPE_STRING,
		),
		// 代引きパラメータ
		// 住所パラメータ
		'user_order_delivery_name' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_name_kana' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_zipcode' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_region_id' => array(
			'type'        => VAR_TYPE_INT,
		),
		'user_order_delivery_address' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_address_building' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_phone' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_card_revo_status' => array(
			'type'        => VAR_TYPE_INT,
		),
	);
}

/**
 * 注文実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcOrderDo extends Tv_ActionUserOnly
{
	/** @var    object    UtilManagerオブジェクト */
	var $um;
	/** @var    object    モール情報オブジェクト */
	var $mall;
	/** @var    object    ショップ情報オブジェクト */
	var $shop;
	/** @var    object    ユーザ情報オブジェクト */
	var $user;
	/** @var    array     買い物かごの中身配列 */
	var $cart_list;
	/** @var    array     注文情報配列 */
	var $order;
	/** @var    array     配送先情報配列 */
	var $delivery;
	/** @var    string    ログ出力用のテキスト */
	var $log_body;
	
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 二重ポスト対応
		if(Ethna_Util::isDuplicatePost()) return 'user_ec_order_done'; 
		
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
		// ユーティルマネージャをセット
		$this->um = $this->backend->getManager('Util');
		// モール基本情報をセット
		$this->mall =& new Tv_Config($this->backend, 'config_type', 'mall');
		// ユーザ情報をセット
		$userSess = $this->session->get('user');
		$this->user =& new Tv_User($this->backend, 'user_id', $userSess['user_id']);
		
		// 買い物かごの中身をセット（[$this->cart_list]に買い物かごの中身がセットされました）
		$return = $this->_setCartList();
		if($return) return $return;
		// 在庫の確認
		$return = $this->_checkStock();
		if($return) return $return;
		
		// ログ取得
		$this->log_body .= "start {date('Y-m-d H:i:s')}\n";
		$this->log_body .= "cart_hash             = {$this->session->get('cart_hash')}\n";
		$this->log_body .= "user_name             = {$this->user->get('user_name')}\n";
		$this->log_body .= "user_mailaddress      = {$this->user->get('user_mailaddress')}\n";
		$this->log_body .= "user_zipcode          = {$this->user->get('user_zipcode')}\n";
		$this->log_body .= "region_id             = {$this->user->get('region_id')}\n";
		$this->log_body .= "user_address          = {$this->user->get('user_address')}\n";
		$this->log_body .= "user_address_building = {$this->user->get('user_address_building')}\n";
		$this->log_body .= "user_phone            = {$this->user->get('user_phone')}\n";
		$this->log_body .= "user_point            = {$this->user->get('user_point')}\n";
		
		// 支払い金額をセット
		$return = $this->_setPayment();
		if($return) return $return;
		
		//カート状態初期化
		$this->cart_status = 0;
		
		// ログ取得
		$this->log_body .= "user_order_total_price1     = {$this->order['total_price1']}\n";
		$this->log_body .= "total_num                   = {$total_num}\n";
		$this->log_body .= "user_order_tax              = {$this->order['tax']}\n";
		$this->log_body .= "pastage                     = {$this->order['postage']}\n";
		$this->log_body .= "user_order_exchange_fee     = {$this->order['exchange_fee']}\n";
		$this->log_body .= "user_order_get_point        = {$this->order['get_point']}\n";
		$this->log_body .= "user_order_use_point_status = {$this->order['use_point_status']}\n";
		$this->log_body .= "user_order_expend_point     = {$this->order['expend_point']}\n";
		$this->log_body .= "user_order_total_price2     = {$this->order['total_price2']}\n";
		
		// 支払い処理実行
		$return = $this->_payment();
		if($return) return $return;
		// 買い物かご情報を注文済みに更新
		$return = $this->_updateCart();
		if($return) return $return;
		// 注文
		$return = $this->_order();
		if($return) return $return;
		// ポイント減算
		$return = $this->_usePoint();
		if($return) return $return;
		// 在庫を減算
		$return = $this->_useStock();
		if($return) return $return;
		// 注文メールを送信
		$return = $this->_sendOrderMail();
		if($return) return $return;
		// 注文コピー
		$return = $this->_orderCopy();
		if($return) return $return;
		
		/* =============================================
		// 統計解析データ追加処理
		 ============================================= */
		$s = & $this->backend->getManager('Stats');
		foreach($this->cart_list as $k => $v){
			// 購入履歴をINSERT access:0,buy:1
			$s->addStats('item', $v['item_id'], 0, 1);
		}
		
		// ログ取得
		$this->log_body .= "user_order_mail = \n";
		$this->log_body .= @var_export($mail_values, true)."\n";
		$this->log_body .= "\nend {date('Y-m-d H:i:s')}\n";
		// ログ出力
		$o = & new Tv_Log($this->backend);
		$o->set('log_type','order_log');
		$o->set('log_body',$this->log_body);
		$o->set('log_created_time',date('Y-m-d H:i:s'));
		$o->add();
		
		// カートハッシュを再発行
		$this->session->set('cart_hash', $this->um->getUniqId());
		
		return 'user_ec_order_done';
	}
	
	/**
	 * 買い物かごの中身をセット
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 * @todo   在庫確認クエリの最適化（3テーブルを結合しているため、2テーブルまでの結合としたい）
	 */
	function _setCartList()
	{
		// カートハッシュを元に買い物かご内の製品の在庫を確認する
		$cart = $this->backend->getManager('Cart');
		// cart_status(0:未決済,1:注文済,2:決済済,4:返品済,5:キャンセル)
		// 在庫テーブルも結合する
		$r = $cart->getCartList($this->session->get('cart_hash'), 0, true);
		// 買い物かごの中に商品がない場合
		if(count($r) == 0){
			// エラー画面へ遷移
			$this->ae->add(null, '', E_USER_CART_EMPTY);
			return 'user_error';
		}
		// 買い物かごの中に商品がある場合
		else{
			// 買い物かごの中身をメンバにセット
			$this->cart_list = $r;
		}
		
		return null;
	}
	
	/**
	 * 在庫確認
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function _checkStock()
	{
		// 買い物かごの中に商品がない場合
		if(count($this->cart_list) == 0){
			// エラー画面へ遷移
			$this->ae->add(null, '', E_USER_CART_EMPTY);
			return 'user_error';
		}
		
		// タイムスタンプ
		$timestamp = date('Y-m-d H:i:s');
		
		// すべての買い物かごの中身に対して処理を行う
		$return = null;
		foreach($this->cart_list as $k => $v){
			// 買い物かごからの削除フラグ
			$delete = false;
			
			// 商品情報を取得
			$i = new Tv_Item($this->backend, 'item_id', $v['item_id']);
			// 有効なレコードの場合
			if($i->isValid()){
				// 商品ステータスが有効か確認
				if($i->get('item_status') == 0){
					// 買い物かごから削除する
					$delete = true;
				}
				// 販売期間内か確認（現在時刻が開始時刻より小さいか、終了時刻より大きい場合はNG）
				if(
					($i->get('item_start_status') == 1 && $timestamp < $i->get('item_start_time'))
					||
					($i->get('item_end_status') == 1 && $timestamp > $i->get('item_end_time'))
				){
					// 買い物かごから削除する
					$delete = true;
				}
			}
			// 無効なレコードの場合
			else{
				$delete = true;
			}
			// ストック情報を取得
			$s = new Tv_Stock($this->backend, 'stock_id', $v['stock_id']);
			// 有効なレコードの場合
			if($s->isValid()){
				// 在庫が存在するか確認（在庫数が買い物かご内の個数よりも少ない場合はNG）
				if($s->get('stock_num') < $v['item_num']){
					// 買い物かごから削除する
					$delete = true;
				}
			}
			// 無効なレコードの場合
			else{
				$delete = true;
			}
			// 買い物かごから削除する場合
			if($delete){
				// 買い物かごの中に入っているレコードを取得する
				$o = & new Tv_Cart($this->backend, cart_id, $v['cart_id']);
				// レコードが存在する場合
				if($o->isValid()){
					// 削除
					$o->remove();
				}
				
				// 商品種別がある場合
				if($v['item_type']){
					$this->ae->add('errors', W_USER_ITEM . "：{$v['item_name']}、" . W_USER_STOCK . "：{$v['item_type']}の在庫がなくなってしまいました。");
				}
				// 商品種別がない場合
				else{
					$this->ae->add('errors', W_USER_ITEM . "：{$v['item_name']}の在庫がなくなってしまいました。");
				}
				
				// 買い物かご画面へ遷移
				$return = 'user_ec_cart';
			}
		}
		
		// 遷移先が指定されている場合
		if($return){
//			$this->ae->add(null, '', E_USER_STOCK_ORDER_OVER);
			return $return;
		}
		
		return null;
	}
	
	/**
	 * 支払い金額をセット
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function _setPayment()
	{
		// 買い物合計金額の初期化
		$this->order['total_price1'] = 0;
		// 取得ポイントの初期化
		$this->order['get_point'] = 0;
		// 買い物カゴ合計商品個数の初期化
		$total_num = 0;
		// すべての買い物かごの中身に対して処理する
		foreach($this->cart_list as $k => $v){
			// 買い物カゴレコードの小計を計算する
			$this->cart_list[$k]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			// 消費税抜きの合計金額を加算する
			$this->order['total_price1'] += $v['item_price'] * $v['cart_item_num'];
			// 合計商品個数を加算する
			$total_num += $v['cart_item_num'];
			// ポイント計算
			$this->order['get_point'] += $v['item_point'] * $v['cart_item_num'];
			// 発送単位ごとの、商品ＩＤとその価格・個数のリスト
			$unit_item_detail[$v['item_id']]['item_price'] = $v['item_price'];
			//$unit_item_detail[$v['item_id']]['cart_item_num'] = $v['cart_item_num'];
			$unit_item_detail[$v['item_id']]['cart_item_num'] = $unit_item_detail[$v['item_id']]['cart_item_num'] + $v['cart_item_num'];
			//$unit_item_detail[$v['item_id']]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			$subtotal = $v['item_price'] * $v['cart_item_num'];
			$unit_item_detail[$v['item_id']]['subtotal'] = $unit_item_detail[$v['item_id']]['subtotal'] + $subtotal;
			// ストック（タイプ）ID単位ごとの、商品ＩＤとその価格・個数のリスト
			$unit_stock_detail[$v['stock_id']]['stock_id'] = $v['stock_id'];
			$unit_stock_detail[$v['stock_id']]['item_id'] = $v['item_id'];
			$unit_stock_detail[$v['stock_id']]['item_price'] = $v['item_price'];
			$unit_stock_detail[$v['stock_id']]['cart_item_num'] = $v['cart_item_num'];
			$unit_stock_detail[$v['stock_id']]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
		}
		
		/*
		 * 消費税の計算
		 */
		$this->order['tax'] = floor($this->order['total_price1']/21);
		
		/*
		 * 送料
		 * @param array $this->cart_list 商品情報リスト
		 * @return integer 送料
		 */
		$this->order['postage'] = 0;
		// その他住所へ配送の場合は、配送先の都道府県に上書き
		if($this->af->get('user_order_delivery_type') == 2) $this->user->set('region_id', $this->af->get('user_order_delivery_region_id'));
		// 送料を取得
		if(!$this->cart_list) return 'user_error';
		$this->order['postage'] = $this->um->getPostage($this->cart_list, $unit_item_detail, $unit_stock_detail, $this->user->get('region_id'));
		
		/*
		 * 代引き手数料
		 * @param array $this->cart_list 商品情報リスト
		 * @return integer 代引き手数料
		 */
		$this->order['exchange_fee'] = 0;
		if($this->af->get('user_order_type') == 3){
			if(!$this->cart_list) return 'user_error';
			$this->order['exchange_fee'] = $this->um->getExchangeFee($this->cart_list, $unit_item_detail, $unit_stock_detail);
		}
		
		/*
		 * ポイント計算
		 */
		$this->order['expend_point'] = 0;
		if($this->af->get('user_order_use_point_status') == 1){
			$this->order['use_point_status'] = 1;
			$this->order['expend_point'] = $this->af->get('user_order_use_point');
		}
		
		
		// 商品小計 < 使用するポイントの場合は調整
		$rest_point = 0;
		if($this->order['total_price1'] < $this->order['expend_point']){
			$rest_point = $this->order['expend_point'] - $this->order['total_price1'];//ポイントの余り
			$this->order['expend_point'] = $this->order['total_price1'];
		}
		$this->af->setApp('user_order_expend_point', $this->order['expend_point']);
		
		/*
		 * 合計金額
		 */
		$this->order['total_price2'] = $this->order['total_price1'] - $this->order['expend_point'] + $this->order['postage'] + $this->order['exchange_fee'];
		
	}
	
	/**
	 * 支払い処理実行
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function _payment()
	{
		//支払い方法は？10:1回払い,61:分割払い,80:リボ払い
		if($this->af->get('user_order_card_revo_status') == 1){
			$paymode = 80;
		}else{
			$paymode = 10;
		}
		
		// 決済情報送信
		switch($this->af->get('user_order_type'))
		{
			case 1:
				// クレジット決済用パラメータ
				$credit_auth_values = array(
				//	'SHOP_ID' 			=> 															//店舗ID：Utilで指定する
					'PAY'				=> $this->order['total_price2'],							//金額（カンマ不要）
					'PAN1'				=> substr($this->af->get('user_order_card_number'),0,4),	//カード番号1-4
					'PAN2'				=> substr($this->af->get('user_order_card_number'),4,4),	//カード番号5-8
					'PAN3'				=> substr($this->af->get('user_order_card_number'),8,4),	//カード番号9-12
					'PAN4'				=> substr($this->af->get('user_order_card_number'),12,4),	//カード番号13-16
					'CARDEXPIRY1'		=> $this->af->get('user_order_card_month'),					//有効期限（月）
					'CARDEXPIRY2'		=> $this->af->get('user_order_card_year'),					//有効期限（年）
					'ID'				=> $this->session->get('cart_hash'),						//伝票番号（識別用に設定）IDは半角英数字＋ハイフンが利用可能で、20文字以内
					'CARDNAME'			=> $this->af->get('user_order_card_name'),					//カード名義（全角利用可能で、半角換算で255文字以内）
				//	'CHARCODE'			=> ,														//全角を送信する場合のエンコーディング方式「euc」「sjis」「utf8」の3種類
				//	'IP'				=> ,														//承認時のユーザのIPアドレス（任意）
					'PAYMODE'			=> $paymode,												//支払い方法　10:1回払い,61:分割払い,80:リボ払い　省略可（省略時は1回払い）
				//	'PAYACOUNT'			=> ,														//支払い回数　01,02,03,05,06,10,12,15,18,20,24　省略可（省略時は1回払い）
				//	'MOBILE'			=> ,														//1:MOBILE経由,0:PC経由　省略可（省略時はPC経由）
				);
				
				// ログ取得
				$this->log_body.= "user_order_type                = {$this->af->get('user_order_type')}\n";
				$this->log_body.= "credit_auth_values PAY         = {$this->order['total_price2']}\n";
				$this->log_body.= "credit_auth_values PAN1        = ****\n";
				$this->log_body.= "credit_auth_values PAN2        = ****\n";
				$this->log_body.= "credit_auth_values PAN3        = ****\n";
				$this->log_body.= "credit_auth_values PAN4        = {substr($this->af->get('user_order_card_number'),12,4)}\n";
				$this->log_body.= "credit_auth_values CARDEXPIRY1 = {$this->af->get('user_order_card_month')}\n";
				$this->log_body.= "credit_auth_values CARDEXPIRY2 = {$this->af->get('user_order_card_year')}\n";
				$this->log_body.= "credit_auth_values ID          = {$this->session->get('cart_hash')}\n";
				$this->log_body.= "credit_auth_values CARDNAME    = {$this->af->get('user_order_card_name')}\n";
				$this->log_body.= "credit_auth_values PAYMODE     = {$paymode}\n";
				
				//クレジット決済送信
				$credit_auth_ret = $this->um->sendOrderRequest('auth',$credit_auth_values);
				
				// ログ取得
				$this->log_body.= "credit_auth_ret = \n";
				$this->log_body.= @var_export($credit_auth_ret, true)."\n";
				
				// 戻り値が取得できなかった場合(通信エラー)
				if($credit_auth_ret[0] != "OK"){
					//クレジット決済エラー
					$this->ae->add(null, '', E_USER_ORDER_USE_CARD_ERROR);
					$this->ae->add(null, '', $credit_auth_ret[1]);
					$this->cart_status = 0;//未決済
					
					// ログ取得
					$this->log_body .= "クレジット決済に失敗しました。\nクレジット決済による購入テストを実施して、問題がないことを確認してください。";
					// ログ出力
					$o = & new Tv_Log($this->backend);
					$o->set('log_type','order_error_credit');
					$o->set('log_body',$this->log_body);
					$o->set('log_created_time',date('Y-m-d H:i:s'));
					$o->add();
					
					// エラーメール送信
					$ms = new Tv_Mail($this->backend);
					$value = array ('alert_subject' => '【重要】EC alert!!! ','alert_date' => date('Y-m-d H:i:s'),'alert_file' => __FILE__,'alert_body' => "クレジット決済に失敗しました。\nクレジット決済による購入テストを実施して、問題がないことを確認してください。\n\n$this->log_body",);
					$ms->send($this->config->get('admin_mailaddress'), 'alert', $value);
					
					return 'user_ec_cart';
				}else{
					//クレジット決済OK
					$this->cart_status = 2;//決済済み
				}
				
				$this->order['credit_auth_code'] = '';
				$this->order['credit_auth_code'] = $credit_auth_ret[1];
				$this->order['credit_exchange_code'] = '';
				$this->order['credit_exchange_code'] = $credit_auth_ret[2];
				
				// ログ取得
				$this->log_body.= "credit_auth_code     = {$this->order['credit_auth_code']}\n";
				$this->log_body.= "credit_exchange_code = {$this->order['credit_exchange_code']}\n";
				
				/*
				// クレジット決済の場合、セキュリティの都合上この時点ではセールコードは立てない
				$credit_sale_values = array(
					'SHOPID'		=> $this->config->get('SHOPID'),
					'AUTHCODE'		=> $this->order['credit_auth_code'],
					'SEQNO'			=> $this->order['credit_exchange_code'],
				);
				$credit_sale_ret = $this->um->sendOrderRequest("sale",$credit_sale_values);
				if($credit_sale_ret[0] != "OK"){
					$this->ae->add(null, '', E_USER_ORDER_USE_CARD_ERROR);
					$this->ae->add("errors",$credit_sale_ret[1]);
					return 'user_ec_cart';
				}
				*/
				break;
			case 2:
				//コンビニタイプがsevenelevenの場合
				$requireurl = 0;
				if($this->af->get('user_order_conveni_type') == 'seveneleven') $requireurl = 1;
				
				// コンビニ決済
				$conveni_order_values = array(
				//	'SHOPID'			=> ,											//店舗ID：Utilで指定する							必須
					'PAY'				=> $this->order['total_price2'],					//金額：300-299999（カンマ区切り不可）				必須
					'ID'				=> $this->session->get('cart_hash'),			//伝票番号：最大20文字の英数字（取引特定に利用）	必須
					'CUSTOMERNAME1'		=> $this->user->get('user_name'),				//氏名1：日本語可能（最大10文字）性又は姓名			必須
				//	'CUSTOMERNAME2'		=> ,											//氏名2：日本語可能（最大10文字）名					任意
				//	'CHARCODE'			=> ,											//文字コード：日本語を送信する場合のエンコーディング方式「euc」「sjis」「utf8」の3種類	任意
					'CUSTOMERTEL'		=> $this->user->get('user_phone'),				//電話番号：数字13桁								必須
					'CONVENI'			=> $this->af->get('user_order_conveni_type'),	//コンビニ「seveneleven」「famima」「lawson」「seicomart」の4種類						任意
				//	'EXPIRE'			=> ,											//支払い期限：払い込みが可能な期限（yyyymmddで設定）登録時の日付より翌々日以降30日以内	任意
				//	'EXPIRESPAN'		=> ,											//支払い期限：日数のみ（2日から30日）				任意
					'REQUIREURL'		=> $requireurl,									//URL要求：「0」または「1」1の場合、セブンイレブンの払い込み票URLを取得する				任意
				//	'IP'				=> ,											//IPアドレス：管理画面上での参照用					任意
				);
				
				// ログ取得
				$this->log_body.= "user_order_type = {$this->af->get('user_order_type')}\n";
				$this->log_body.= "conveni_order_values = \n";
				$this->log_body.= @var_export($conveni_order_values, true)."\n";
				
				//コンビニ決済送信
				$conveni_order_ret = $this->um->sendOrderRequest('convorder',$conveni_order_values);
				
				// ログ取得
				$this->log_body.= "conveni_order_ret = \n";
				$this->log_body.= @var_export($conveni_order_ret, true)."\n";
				
				if($conveni_order_ret[0] != "OK"){
					//コンビニ決済エラー
					$this->ae->add(null, '', E_USER_ORDER_USE_CONVENI_ERROR);
					$this->ae->add(null, '', $conveni_order_ret[1]);
					$this->cart_status = 0;//未決済
					
					// ログ取得
					$this->log_body .= "コンビニ決済に失敗しました。\nコンビニ決済による購入テストを実施して、問題がないことを確認してください。";
					// ログ出力
					$o = & new Tv_Log($this->backend);
					$o->set('log_type','order_error_conveni');
					$o->set('log_body',$this->log_body);
					$o->set('log_created_time',date('Y-m-d H:i:s'));
					$o->add();
					
					// エラーメール送信
					$ms = new Tv_Mail($this->backend);
					$value = array (
						'alert_subject' => '【重要】EC alert!!! ',
						'site_name'		=> $site_name,
						'alert_date' 	=> date('Y-m-d H:i:s'),
						'alert_file' 	=> __FILE__,
						'alert_body' 	=> "コンビニ決済に失敗しました。\nコンビニ決済による購入テストを実施して、問題がないことを確認してください。\n\n$this->log_body",
					);
					$ms->send($this->config->get('admin_mailaddress'), 'alert', $value);
					
					return 'user_ec_cart';
				}else{
					//コンビニ決済OK
					$this->cart_status = 0;//未決済
				}
				$this->order['conveni_sale_code'] = $conveni_order_ret[1];
				$this->order['conveni_exchange_code'] = $conveni_order_ret[2];
				$this->order['conveni_pay_url'] = $conveni_order_ret[3];
				
				// ログ取得
				$this->log_body.= "user_order_conveni_sale_code     = {$this->order['conveni_sale_code']}\n";
				$this->log_body.= "user_order_conveni_exchange_code = {$this->order['conveni_exchange_code']}\n";
				$this->log_body.= "user_order_conveni_pay_url       = {$this->order['conveni_pay_url']}\n";
				break;
			default:
				break;
		}
		
		return null;
	}
	
	/**
	 * 買い物かご情報を注文済みに更新
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function _updateCart()
	{
		// 買い物かごの中に商品がない場合
		if(count($this->cart_list) == 0){
			// エラー画面へ遷移
			$this->ae->add(null, '', E_USER_CART_EMPTY);
			return 'user_error';
		}
		
		// すべての買い物かごの中身に対して処理を行う
		foreach($this->cart_list as $k => $v){
			//カート情報を更新
			$cart =& new Tv_Cart($this->backend, 'cart_id', $v['cart_id']);
			$cart->set('cart_status', $this->cart_status);
			$cart->set('user_id', $this->user->get('user_id'));
			$cart->set('cart_no', date('Y-m-d') . "-" . $v['cart_id']);
			$cart->set('cart_updated_time', date('Y-m-d H:i:s'));
			$cart->update();
			if (PEAR::isError($res)) return 'user_error';
			// ログ取得
			foreach($this->backend->db_list as $a)$this->log_body.= "cart_update_query = ".$a->db->last_query."\n";
		}
	}
	
	/**
	 * ポイントを減算
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function _usePoint()
	{
		if($this->order['use_point_status']){
			/* =============================================
			// ポイント追加系処理(ポイント付与履歴テーブルに今回のポイント付与(減算)情報登録
			 ============================================= */
			$pm = $this->backend->getManager('Point');
			$point_type_search = $this->config->get('point_type_search');
			$param = array(
				'user_id'			=> $this->user->get('user_id'),
				'point'				=> '-' . $this->order['expend_point'],
				'point_type'		=> $point_type_search['order'],
				'point_memo'		=> 'ORDER',
			);
			$pm->addPoint($param);
			//Log
			foreach($this->backend->db_list as $a)$this->log_body.= "point_update_query = ".$a->db->last_query."\n";
		}
	}
	
	/**
	 * 在庫を減算
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function _useStock()
	{
		// 在庫減算
		foreach($this->cart_list as $k => $v){
			// 在庫情報を取得
			$o =& new Tv_Stock($this->backend, 'stock_id', $v["stock_id"]);
			$o->set('stock_num', $v['stock_num'] - $v['cart_item_num']);
			$r = $o->update();
			if(Ethna::isError($r)) return 'user_error';
			
			// ログ取得
			foreach($this->backend->db_list as $a)$this->log_body.= "stock_update_query = ".$a->db->last_query."\n";
			
			// 在庫管理メール
			if($this->config->get('stock_alert_num') > $v['stock_num'] - $v['cart_item_num']){
				// 履歴テーブルから暫定的な販売総数を取得
				$param = array(
					'sql_select'	=> 'sum(cart_item_num) as cart_item_sum',
					'sql_from'		=> 'cart',
					'sql_where'		=> 'item_id = ? group by item_id',
					'sql_values'	=> array($v['item_id']),
				);
				$r =  $this->um->dataQuery($param);
				// クエリエラーでもメールの送信を優先する
				$cart_item_sum = $r[0]['cart_item_sum'];
				
				// 管理者宛にメールを配送
				$ms =& new Tv_Mail($this->backend);
				$mail_values = array(
					'from_mail_address' 	=> $this->config->get('admin_mailaddress'),
					'site_name'				=> $site_name,
					'item_id'				=> $v['item_id'],
					'item_name'				=> $v['item_name'],
					'item_type'				=> $v['item_type'],
					'item_stock'			=> $v['stock_num'] - $v['cart_item_num'],
					'now_date'				=> date('y/m/d H:i'),
					'item_distinction_id' 	=> $v['item_distinction_id'],
					'admin_url' 			=> ADMIN_URL,
					'cart_item_sum' 		=> $cart_item_sum,
				);
				$ms->sendOne($this->config->get('stock_alert_to_mailaccount'), 'stock_alert', $mail_values);
				
				// ログ取得
				$this->log_body.= "stock_alert_mail = \n";
				$this->log_body.= @var_export($mail_values, true)."\n";
			}
		}
	}
	
	/**
	 * 注文内容メールを送信
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function _sendOrderMail()
	{
		// 住所（番号から名前へ変換
		//都道府県リスト
		$this->um =& $this->backend->getManager('Util');
		$region_id_list = $this->config->get('region_id');
		$this->user->set('region_id', $region_id_list[$this->user->get('region_id')]['name']);
		$this->order['delivery_region_id'] = $region_id_list[$this->af->get('user_order_delivery_region_id')]['name'];
		
		//配達時間指定を数字→文字変換
		if($this->af->get('user_order_delivery_day')){
			$delivery_date = $this->config->get('delivery_date');
			$this->order['delivery_day'] = $delivery_date[$this->af->get('user_order_delivery_day')];
		}
		
		// 注文内容確認メール送信
		$mail_values = array(
			// 決済関連情報
			'cart_list' => $this->cart_list,
			'user_order_type' => $this->af->get('user_order_type'),
			'user_order_total_price1' => $this->order['total_price1'],
			'user_order_total_price2' => $this->order['total_price2'],
			'user_order_tax' => $this->order['tax'],
			'user_order_expend_point' => $this->order['expend_point'],
			'user_order_get_point' => $this->order['get_point'],
			'user_order_postage' => $this->order['postage'],
			'user_order_exchange_fee' => $this->order['exchange_fee'],
			// コンビニ決済関連情報
			'user_order_conveni_type' => $this->af->get('user_order_conveni_type'),
			'user_order_conveni_sale_code' => $this->order['conveni_sale_code'],
			//コンビニ払込票URL
			'user_order_conveni_pay_url' => $this->order['conveni_pay_url'],
			// ユーザ関連情報
			'user_zipcode' => $this->user->get('user_zipcode'),
			'user_name' => $this->user->get('user_name'),
			'region_id' => $this->user->get('region_id'),
			'user_address' => $this->user->get('user_address'),
			'user_address_building' => $this->user->get('user_address_building'),
			'user_phone' => $this->user->get('user_phone'),
			'user_mailaddress' => $this->user->get('user_mailaddress'),
			// 配送先関連情報
			'user_order_delivery_type' => $this->af->get('user_order_delivery_type'),
			'user_order_delivery_name' => $this->af->get('user_order_delivery_name'),
			'user_order_delivery_zipcode' => $this->af->get('user_order_delivery_zipcode'),
			'user_order_delivery_region_id' => $this->order['delivery_region_id'],
			'user_order_delivery_address' => $this->af->get('user_order_delivery_address'),
			'user_order_delivery_address_building' => $this->af->get('user_order_delivery_address_building'),
			'user_order_delivery_phone' => $this->af->get('user_order_delivery_phone'),
			'user_order_delivery_day' => $this->order['delivery_day'],
			'user_order_delivery_note' => $this->af->get('user_order_delivery_note'),
			// 送信者アドレス
			'admin_mailaddress' => $this->config->get('admin_mailaddress'),
			//注文日時(tbl_order.order_created_time)
			'user_order_created_time' => $this->order['created_time'],
			//注文番号(user_order.user_order_id)
			'user_order_id' => $this->order['id'],
			//注文番号(date('Ymd')+user_order.user_order_id)
			'user_order_no' => $this->order['no'],
		);
		// コンビニ支払いの場合
		if($this->af->get('user_order_type') == 2){
			// 指定コンビニの項目を有効化
			$mail_values[$this->af->get('user_order_conveni_type')] =true;
		}
		// ユーザへ送信
		$ms = new Tv_Mail($this->backend);
		$ms->sendOne($this->user->get('user_mailaddress') , "user_order{$this->af->get('user_order_type')}" , $mail_values );
		
		// システム管理者へも同じメールを送信
		$ms->sendOne($this->config->get('user_order_copy_mailaddress') , "user_order{$this->af->get('user_order_type')}" , $mail_values );
	}
	
	/**
	 * 注文
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function _order()
	{
		// オーダー情報登録
		$o =& new Tv_UserOrder($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('user_id', $this->user->get('user_id'));
		$o->set('cart_id', $cart_id);
		$o->set('cart_hash', $this->session->get('cart_hash'));
		$o->set('user_order_type', $this->af->get('user_order_type'));
		$o->set('user_order_use_point', $this->order['expend_point']);
		$o->set('user_order_get_point', $this->order['get_point']);
		$o->set('user_order_card_number', '************' . substr($this->af->get('user_order_card_number'), 12, 4));
		$o->set('user_order_card_expiration', $this->af->get('user_order_card_year') . "/" . $this->af->get('user_order_card_month'));
		$o->set('user_order_credit_auth_code', $this->order['credit_auth_code']);
		$o->set('user_order_credit_exchange_code', $this->order['credit_exchange_code']);
		$o->set('user_order_conveni_sale_code', $this->order['conveni_sale_code']);
		$o->set('user_order_conveni_exchange_code', $this->order['conveni_exchange_code']);
		$o->set('user_order_conveni_pay_url', $this->order['conveni_pay_url']);
		$o->set('user_order_total_price1', $this->order['total_price1']);
		$o->set('user_order_total_price2', $this->order['total_price2']);
		$o->set('user_order_tax', $this->order['tax']);
		$o->set('user_order_postage', $this->order['postage']);
		$o->set('user_order_exchange_fee', $this->order['exchange_fee']);
		$o->set('user_order_created_time', $this->order['created_time'] = date("Y-m-d H:i:s", time()));
		$r = $o->add();
		// クエリエラーの場合
		if(Ethna::isError($r)) return 'user_error';
		// ログ取得
		foreach($this->backend->db_list as $a)$this->log_body.= "user_order_insert_query = ".$a->db->last_query."\n";
		
		// user_order.user_order_noに、取得したtbl_order_id + date を入れる。
		$this->order['id'] = $o->getId();
		$user_zero_fill_order_id = sprintf("%010d", $this->order['id']);
		$this->order['no'] = date('Ymd').$user_zero_fill_order_id;
		
		// 注文履歴を更新する
		$o =& new Tv_UserOrder($this->backend, 'user_order_id', $this->order['id']);
		$o->set('user_order_no', $this->order['no']);
		$r = $o->update();
		// クエリエラーの場合
		if(Ethna::isError($r)) return 'user_error';
		
		// start
		// 同梱不可設定の時に$unit_item_detailが空になってしまうためにここで再度算出 原因が分かるまで・・・
		// すべての買い物かごの中身に対して処理する
		foreach($this->cart_list as $k => $v){
			// 買い物カゴレコードの小計を計算する
			$this->cart_list[$k]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			// 消費税抜きの合計金額を加算する
			$this->order['total_price1'] += $v['item_price'] * $v['cart_item_num'];
			// 合計商品個数を加算する
			$total_num += $v['cart_item_num'];
			// ポイント計算
			$this->order['get_point'] += $v['item_point'] * $v['cart_item_num'];
			// 発送単位ごとの、商品ＩＤとその価格・個数のリスト
			$unit_item_detail[$v['item_id']]['item_price'] = $v['item_price'];
			//$unit_item_detail[$v['item_id']]['cart_item_num'] = $v['cart_item_num'];
			$unit_item_detail[$v['item_id']]['cart_item_num'] = $unit_item_detail[$v['item_id']]['cart_item_num'] + $v['cart_item_num'];
			//$unit_item_detail[$v['item_id']]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
			$subtotal = $v['item_price'] * $v['cart_item_num'];
			$unit_item_detail[$v['item_id']]['subtotal'] = $unit_item_detail[$v['item_id']]['subtotal'] + $subtotal;
			// ストック（タイプ）ID単位ごとの、商品ＩＤとその価格・個数のリスト
			$unit_stock_detail[$v['stock_id']]['stock_id'] = $v['stock_id'];
			$unit_stock_detail[$v['stock_id']]['item_id'] = $v['item_id'];
			$unit_stock_detail[$v['stock_id']]['item_price'] = $v['item_price'];
			$unit_stock_detail[$v['stock_id']]['cart_item_num'] = $v['cart_item_num'];
			$unit_stock_detail[$v['stock_id']]['subtotal'] = $v['item_price'] * $v['cart_item_num'];
		}
		// end
		
		//発送単位をDBに格納する
		$this->um->insertPostUnit($this->cart_list, $unit_item_detail, $unit_stock_detail ,$this->user->get('region_id'));
		// ログ取得
		foreach($this->backend->db_list as $a)$this->log_body.= "user_update_query = ".$a->db->last_query."\n";
		
		/* =============================================
		// 入会経路経由の場合の処理
		 ============================================= */
/* 入会経路に対する成果送信は行わない
		if($this->session->get('media_access_hash')){
			$mm = $this->backend->getManager('Media');
			$mm->mediaResponse($this->session->get('media_access_hash'), $no_point);
		}
*/
		/* =============================================
		// 入会経路購買統計解析処理
		 ============================================= */
		if($this->user->get('media_id')){
			$sm = $this->backend->getManager('Stats');
			// 購買履歴をINSERT 0:mail 1:access 2:reg
			$sm->addStats('media', $this->user->get('media_id'), 0, 5);
		}
	}
	
	/**
	 * 注文をコピー
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	function _orderCopy()
	{
		// DBができるまで保留
		//購入時のユーザ情報を登録
		$o =& new Tv_UserOrderCopy($this->backend);
		$o->set('user_order_id', $this->order['id']);
		$o->set('user_id', $this->user->get('user_id'));
		$o->set('user_name', $this->user->get('user_name'));
		$o->set('user_nickname', $this->user->get('user_nickname'));
		$o->set('user_name_kana', $this->user->get('user_name_kana'));
		$o->set('user_zipcode', $this->user->get('user_zipcode'));
		$o->set('region_id', $this->user->get('region_id'));
		$o->set('user_address', $this->user->get('user_address'));
		$o->set('user_address_building', $this->user->get('user_address_building'));
		$o->set('user_phone', $this->user->get('user_phone'));
		$o->set('user_birth_date', $this->user->get('user_birth_date'));
		$o->set('user_sex', $this->user->get('user_sex'));
		$o->set('user_mailaddress', $this->user->get('user_mailaddress'));
		$o->set('user_password', $this->user->get('user_password'));
		$o->set('user_point', $this->user->get('user_point'));
		$o->set('user_hash', $this->user->get('user_hash'));
		$o->set('user_status', $this->user->get('user_status'));
		$o->set('user_created_time', $this->user->get('user_created_time'));
		$o->set('user_updated_time', $this->user->get('user_updated_time'));
		$o->set('user_order_time', $this->user->get('user_order_time'));
		$o->set('user_deleted_time', $this->user->get('user_deleted_time'));
		$o->set('user_uid', $this->user->get('user_uid'));
		$o->set('user_magazine_error_num', $this->user->get('user_magazine_error_num'));
		$o->set('user_sessid', $this->user->get('user_sessid'));
		$r = $o->add();
		// クエリエラーの場合
		if(Ethna::isError($r)) return 'user_error';
		
		// 最終オーダー日時更新
		$user =& new Tv_User($this->backend, 'user_id', $this->user->get('user_id'));
		$user->set('user_order_time', date('Y-m-d H:i:s'));
		$r = $user->update();
		// クエリエラーの場合
		if(Ethna::isError($r)) return 'user_error';
	}
}
?>