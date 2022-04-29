<?php
/**
 * Index.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 支払方法選択画面表示アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcOrderTypeIndex extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'user_order_type' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> 'Util, user_order_type',
		),
		'user_order_use_point_status' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
		'user_order_use_point' => array(
		),
		'mode' => array(
			'type'        => VAR_TYPE_INT,
		),
	);
}

/**
 * 支払方法選択画面表示アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcOrderTypeIndex extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_ec_order_type';
		
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
		
		//ポイントに「000010」など、入力された場合を考慮してintvalする
		if($this->af->get('user_order_use_point_status') == 1){
			$this->af->set('user_order_use_point', intval($this->af->get('user_order_use_point')));
		}
		//ポイントを使わないなら0にしておく
		else{
			$this->af->set('user_order_use_point', 0);
		}
		
		// 入力されたポイントはユーザ所有の有効な範囲か判断する
		$usersess = $this->session->get('user');
		$userObject =& new Tv_User($this->backend, 'user_id', $usersess['user_id']);
		if($this->af->get('user_order_use_point_status') && $userObject->get('user_point') < $this->af->get('user_order_use_point')){
			$this->ae->add(null, '', E_USER_ORDER_USE_POINT_OVER);
			return 'user_ec_order_type';
		}
/*
		// 【検討】ポイントの利用下限制限は無くて良いのではないか？
		// ポイント利用は100以上から（99はだめ）
		if($this->af->get('user_order_use_point_status') && $this->af->get('user_order_use_point') < 100){
			$this->ae->add(null, '', E_USER_ORDER_USE_POINT_MIN);
			return 'user_ec_order_type';
		}
*/
		// 買い物かごの中身商品合計金額税抜の取得
		$cart = $this->backend->getManager('Cart');
		$total_price = $cart->getTotalPriceTaxout($this->session->get('cart_hash'));
		// 入力されたポイントは商品合計の範囲か判断する
		if($this->af->get('user_order_use_point_status') && $total_price < $this->af->get('user_order_use_point')){
			$this->ae->add(null, '', E_USER_ORDER_USE_POINT_MAX);
			return 'user_ec_order_type';
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
		$this->af->set('mode','type');
		return 'user_ec_order_type_' . $this->af->get('user_order_type');
	}
}
?>