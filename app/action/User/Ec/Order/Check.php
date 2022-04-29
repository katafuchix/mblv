<?php
/**
 * Check.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 注文確認画面アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcOrderCheck extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		// 基本パラメータ
		'cart_id' => array(
			'type'        => VAR_TYPE_INT,
		),
		'user_order_type' => array(
			'type'        => VAR_TYPE_INT,
		),
		'user_order_use_point' => array(
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_TEXT,
			'regexp'	=> '/^[0-9]+$/',
		),
		'mode' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_type' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, delivery_type',
		),
		//配達時間指定
		'user_order_delivery_day' => array(
			'type' 		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'		=> 'Util, delivery_date',
		),
		'user_order_delivery_note' => array(
			'type'        => VAR_TYPE_STRING,
		),
		// カードパラメータ
		'user_order_card_type' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, card_type',
		),
		// カード番号
		'user_order_card_number' => array(
			'type' 			=> VAR_TYPE_INT,
		),
		'user_order_card_name' => array(
			'type'        => VAR_TYPE_STRING,
		),
		// カード有効期限 月
		'user_order_card_month' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> array(
								'0' => '月',
								'01' => '01',
								'02' => '02',
								'03' => '03',
								'04' => '04',
								'05' => '05',
								'06' => '06',
								'07' => '07',
								'08' => '08',
								'09' => '09',
								'10' => '10',
								'11' => '11',
								'12' => '12',
							),
		),
		// カード有効期限 年
		'user_order_card_year' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> array(
								'0' => '年',
								'08' => '2008',
								'09' => '2009',
								'10' => '2010',
								'11' => '2011',
								'12' => '2012',
								'13' => '2013',
								'14' => '2014',
								'15' => '2015',
								'16' => '2016',
								'17' => '2017',
								'18' => '2018',
							),
		),
		// コンビニパラメータ
		'user_order_conveni_type' => array(
			'type'        => VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, user_order_conveni_type_user',
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
			'type'        => VAR_TYPE_STRING,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, region_id',
		),
		'user_order_delivery_address' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_address_building' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_phone' => array(
			'type' 			=> VAR_TYPE_INT,
			'required' 		=> true,
			'form_type' 	=> FORM_TYPE_TEXT,
			'min' 			=> 10,
			'max' 			=> 11,
			'regexp'		=> '/^[0-9]+$/',
		),
		'user_order_use_point_status' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_HIDDEN,
		),
		'user_order_card_revo_status' => array(
			'type'        => VAR_TYPE_INT,
			'form_type'        => FORM_TYPE_SELECT,
			'option'        => array(
				0 => '１回払い',
				1 => 'リボ払い',
			),
		),
	);
}

/**
 * 注文確認画面アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcOrderCheck extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// カートハッシュを元に買い物かご内の製品の在庫を確認する
		$cart = $this->backend->getManager('Cart');
		// cart_status(0:未決済,1:注文済,2:決済済,4:返品済,5:キャンセル)
		// 在庫テーブルは結合しない
		$r = $cart->getCartList($this->session->get('cart_hash'), 0, false);
		// 買い物かごの中に商品がない場合
		if(count($r) == 0){
			// エラー画面へ遷移
			$this->ae->add(null, '', E_USER_CART_EMPTY);
			return 'user_error';
		}
		
		$um = $this->backend->getManager('Util');
		
		$errors = false;
		
		// 決済方法が設定されていない場合
		if($this->af->get('user_order_type') == ""){
			$this->ae->add(null, '', E_USER_ORDER_TYPE);
			return 'user_ec_cart';
		}
		
		// 有効期限切れの商品がカートに含まれている場合
		$cart_hash = $this->session->get('cart_hash');
		
		$sqlWhere = "c.cart_hash = ? ".
				" AND c.stock_id = s.stock_id ".
				" AND s.item_id = i.item_id ".
				" AND c.cart_status = 0";
		
		$param = array(
			'sql_select'	=> '*',
			'sql_values'	=> array($cart_hash),
			'sql_from'		=> 'cart c,item i,stock s',
			'sql_where'		=> $sqlWhere
		);
		
		$cart_list = $um->dataQuery($param);
		
		$now = date('Y-m-d H:i:s');
		foreach($cart_list as $k => $v){
			// 有効なステータスの商品のみ取得する
			$sqlWhere = 'item_id = ? AND item_status = 1';
			// 配信開始日時が有効なもののみ表示する
			$sqlWhere .= ' AND (item_start_status = 0 OR (item_start_status = 1 AND item_start_time < now())) ';
			// 配信終了日時が有効なもののみ表示する
			$sqlWhere .= ' AND (item_end_status = 0 OR (item_end_status = 1 AND item_end_time > now())) ';
			
			$param = array(
				'sql_select'	=> '*',
				'sql_from'		=> 'item',
				'sql_where'		=> $sqlWhere,
				'sql_values'	=> array($v['item_id']),
			);
			
			$r = $um->dataQuery($param);
			if(count($r) == 0){
				$this->ae->add(null, '', E_USER_ITEM_NOT_FOUND);
				return 'user_ec_cart';
			}
		}
		
		// クレジットカード決済時
		if($this->af->get('user_order_type') == 1){
			if(!$this->af->get('user_order_card_type')){
				$errors[] = E_USER_ORDER_CARD_TYPE;
			}
			if(!$this->af->get('user_order_card_number')
				|| strlen($this->af->get('user_order_card_number')) < 13
				|| strlen($this->af->get('user_order_card_number')) > 19
				|| !preg_match( '/^[0-9]+$/', $this->af->get('user_order_card_number') )
			){
				$errors[] = E_USER_ORDER_CARD_NUMBER;
			}
			
			if(!$this->af->get('user_order_card_name')){
				$errors[] = E_USER_ORDER_CARD_NAME;
			}
			if(!$this->af->get('user_order_card_month')){
				$errors[] = E_USER_ORDER_CARD_MONTH;
			}
			if(!$this->af->get('user_order_card_year')){
				$errors[] = E_USER_ORDER_CARD_YEAR;
			}
			// カード有効期限が過去の場合
			if( date('Ym') > '20'.sprintf('%02d%02d', $this->af->get('user_order_card_year'), $this->af->get('user_order_card_month')) ){
				$errors[] = E_USER_ORDER_CARD_TERM;
			}
			
			// 出来ればここでクレジットカードが使用可能かチェックしたい
			
		}
		if($errors){
			foreach($errors as $v){
				$this->ae->add(null, '', $v);
			}
			// HIDDENフォーム生成
			$hidden_vars = $this->af->getHiddenVars(NULL, array());
			$this->af->setAppNE('hidden_vars', $hidden_vars);
			return 'user_ec_order_type_1';
		}
		
		// コンビニ決済時
		if($this->af->get('user_order_type') == 2){
			if(!$this->af->get('user_order_conveni_type')){
				$errors[] = E_USER_ORDER_CONVENI_TYPE;
			}
		}
		if($errors){
			foreach($errors as $v){
				$this->ae->add(null, '', $v);
			}
			// HIDDENフォーム生成
			$hidden_vars = $this->af->getHiddenVars(NULL, array());
			$this->af->setAppNE('hidden_vars', $hidden_vars);
			return 'user_ec_order_type_2';
		}
		
		// 配送住所に入力時
		if($this->af->get('user_order_delivery_type') == 2 && $this->af->get('mode') != "type"){
			if(!$this->af->get('user_order_delivery_name')){
				$errors[] = E_USER_ORDER_DELIVERY_NAME;
			}
			if(!$this->af->get('user_order_delivery_name_kana')){
				$errors[] = E_USER_ORDER_DELIVERY_NAME_KANA;
			}
			if(mb_strlen($this->af->get('user_order_delivery_zipcode')) != 7
				|| !preg_match( '/^[0-9]+$/', $this->af->get('user_order_delivery_zipcode'))
			){
				$errors[] = E_USER_ORDER_DELIVERY_ZIPCODE;
			}
			if(!$this->af->get('user_order_delivery_region_id')){
				$errors[] = E_USER_ORDER_DELIVERY_REGION_ID;
			}
			if(!$this->af->get('user_order_delivery_address')){
				$errors[] = E_USER_ORDER_DELIVERY_ADDRESS;
			}
			if(mb_strlen($this->af->get('user_order_delivery_phone')) < 10
				|| mb_strlen($this->af->get('user_order_delivery_phone')) > 11
				|| !preg_match('/^[0-9]+$/', $this->af->get('user_order_delivery_phone'))
			){
				$errors[] = E_USER_ORDER_DELIVERY_PHONE;
			}
		}
		
		/*
		 * 同梱不可設定を確認する
		 */
		
		if($errors){
			foreach($errors as $v){
				$this->ae->add(null, '', $v);
			}
			
			$this->af->set('mode','delivery');
			// HIDDENフォーム生成
			$hidden_vars = $this->af->getHiddenVars(NULL, array());
			$this->af->setAppNE('hidden_vars', $hidden_vars);
			return 'user_ec_order_delivery';
		}
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
		
		// ユーザ情報を取得
		$user = $this->session->get('user');
		$r =& new Tv_User($this->backend, 'user_id', $user['user_id']);
		
		if ($this->af->get('mode') == "type")
		{
			if($this->af->get('user_order_delivery_type') == 2)
			{
				$this->af->set('mode','delivery');
				// HIDDENフォーム生成
				$hidden_vars = $this->af->getHiddenVars(NULL, array());
				$this->af->setAppNE('hidden_vars', $hidden_vars);
				return 'user_ec_order_delivery';
			}
			// 既に登録済みの住所へ配送する場合
			else if ($this->af->get('user_order_delivery_type') == 1)
			{
				if ($r->get('user_name') == ""
					|| $r->get('user_name_kana') == ""
					|| $r->get('user_zipcode') == ""
					|| $r->get('region_id') == 0
					|| $r->get('user_address') == ""
					|| $r->get('user_phone') == "")
				{
					// HIDDENフォーム生成
					$hidden_vars = $this->af->getHiddenVars(NULL, array());
					$this->af->setAppNE('hidden_vars', $hidden_vars);
					return 'user_ec_delivery_edit';
				}
				else
				{
					// HIDDENフォーム生成
					$hidden_vars = $this->af->getHiddenVars(NULL, array());
					$this->af->setAppNE('hidden_vars', $hidden_vars);
					return 'user_ec_order_check';
				}
			}
		}
		return 'user_ec_order_check';
	}
}
?>