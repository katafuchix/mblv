<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 買い物かごへの商品登録実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcItemRegistDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'item_id' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'stock_id' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
		),
		'cart_item_num' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * 買い物かごへの商品登録実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcItemRegistDo extends Tv_ActionUser
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
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
		
		// [TODO:二重ポスト禁止処理]パラメタを取得
		$cart_hash = $this->session->get('cart_hash');
		$stock_id = $this->af->get('stock_id');
		$cart_item_num = $this->af->get('cart_item_num');
		$item_id = $this->af->get('item_id');
		
		// 準備
		$db = $this->backend->getDB();
		$old_cart_item_num = 0;
		
		// 今回かごに入れる商品がDB個数0の場合
		$s = new Tv_Stock($this->backend, 'stock_id', $stock_id);
		if($s->get('stock_num') == 0){
			$this->ae->add(null, '', E_USER_STOCK_OUT);
			return 'user_ec_item';
		}
		
		// 今回かごに入れる商品の個数がDB在庫より多い場合
		$s = new Tv_Stock($this->backend, 'stock_id', $stock_id);
		if($s->get('stock_num') < $cart_item_num){
			$this->ae->add(null, '', E_USER_STOCK_OVER);
			return 'user_ec_item';
		}
		
		// カートハッシュが無い場合は、カートハッシュ発行
		if(!$cart_hash){
			// カートハッシュを生成
			$cart_hash = $um->getUniqId();
			
			// セッション開始
			$this->session->start();
			$this->session->set('cart_hash',$cart_hash);
		}
		// カートハッシュがある場合
		else{
			// 買い物カゴの中に今回送信されてきた商品があるかどうかを取得
			$c = new Tv_Cart($this->backend);
			$rows = $c->searchProp(
				array('cart_id', 'cart_item_num'),
				array('cart_hash' => $cart_hash, 'stock_id' => $stock_id)
			);
			if (Ethna::isError($rows)) return 'user_ec_item';
			$cart_id = $rows[1][0]['cart_id'];
			$old_cart_item_num = $rows[1][0]['cart_item_num'];
		}
		
		// 新規の商品の場合
		$timestamp = date("Y-m-d H:i:s");
		if(!$old_cart_item_num){
			
			//同梱不可チェック
			$o =& new Tv_Item($this->backend, 'item_id', $this->af->get('item_id'));
			if($o->get('item_bundle_status')){
				$this->ae->add(null, '', E_USER_ITEM_BUNDLE_STATUS);
			}
			
			// アイテムを買い物カゴに追加
			$c = new Tv_Cart($this->backend);
			$c->importForm(OBJECT_IMPORT_IGNORE_NULL);
			$c->set('cart_hash', $cart_hash);
			$c->set('cart_status', 0);
			$c->set('cart_created_time', $timestamp);
			$r = $c->add();
			if(Ethna::isError($r)) return 'user_ec_item';
			
			//買い物かごページで「買い物を続ける」クリックされる時に備えて遷移元を取得しておく
			$back_url_set = true;
		}
		// 追加商品の場合
		else{
			/*
			 * １商品あたり買い物カゴに格納できる最大個数を確認する
			 */
			if($cart_item_num + $old_cart_item_num > 9){
				$this->ae->add(null, '', E_USER_CART_ITEM_NUM);
				return 'user_ec_item';
			}
			//今回の追加個数で在庫数を上回っていないか判断する
			$s = new Tv_Stock($this->backend, 'stock_id', $stock_id);
			if($cart_item_num + $old_cart_item_num > $s->get('stock_num')){
				$this->ae->add(null, '', E_USER_STOCK_OVER);
				return 'user_ec_item';
			}
			
			//同梱不可チェック
			$o =& new Tv_Item($this->backend, 'item_id', $this->af->get('item_id'));
			if($o->get('item_bundle_status')){
				$this->ae->add(null, '', E_USER_ITEM_BUNDLE_STATUS);
			}
			
			
			// 買い物カゴのアイテム数を更新
			$c = new Tv_Cart($this->backend, 'cart_id', $cart_id);
			$c->importForm(OBJECT_IMPORT_IGNORE_NULL);
			$c->set('cart_item_num', $cart_item_num + $old_cart_item_num);
			$c->set('cart_updated_time', $timestamp);
			$r = $c->update();
			if(Ethna::isError($r)) return 'user_ec_item';
			
			//買い物かごページで「買い物を続ける」クリックされる時に備えて遷移元を取得しておく
			$back_url_set = true;
		}
		
		if($back_url_set){
			//買い物かごページで「買い物を続ける」クリックされる時に備えて遷移元を取得しておく
			//直前にいたショップの直前のカテゴリへもどすこと
			$o =& new Tv_Item($this->backend, 'item_id', $item_id);
			$item_category_id_list = explode(',', $o->get('item_category_id'));
			$back_url = array('shop_id' => $o->get('shop_id'), 'item_category_id' => $item_category_id_list[0]);
			$this->session->set('back_url', $back_url);
		}
		
		return 'user_ec_cart';
	}
}
?>