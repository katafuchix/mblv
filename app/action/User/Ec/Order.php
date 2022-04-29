<?php
/**
 * Index.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 注文情報入力画面振り分けアクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcOrder extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'total_price' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'order' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * 注文情報入力画面振り分けアクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcOrder extends Tv_ActionUser
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
		
		// 準備
		$cart_hash = $this->session->get('cart_hash');
		
		// 買い物カゴに商品があるかどうか確認する
		$cart = $this->backend->getManager('Cart');
		// 対象は未決済分のもののみ
		$cart_list = $cart->getCartList($cart_hash, 0, false);
		// 買い物かごの中身がない場合
		if(count($cart_list) == 0){
			$this->ae->add(null, '', E_USER_CART_EMPTY);
			return 'user_error';
		}
		
		// ユーザ情報があればオーダータイプの選択画面へ
		$userSess = $this->session->get('user');
		if($userSess['user_id']){
			// 支払い可能な注文方法を取得する
			$order_type_list = $cart->getOrderTypeList($cart_list);
			// 利用可能な支払方法がなくなった場合はエラー
			if(count($order_type_list) == 0){
				// 買い物かご画面へ遷移
				$this->ae->add(null, '', E_USER_ORDER_TYPE_EMPTY);
				return 'user_ec_cart';
			}
			// 利用可能な支払い方法が存在する場合
			else{
				// 支払い方法をセット
				$this->af->setApp('order_type_list',$order_type_list);
				// 支払い方法選択画面へ遷移
				return 'user_ec_order_type';
			}
		}else{
			// 買い物かごテーブルにXUIDを格納する
			// 複数行を更新するので、はやむを得ずautoExecuteを使用する
			$db = $this->backend->getDB();
			$updateValues = array(
				'user_uid' => $um->getXuid(),
			);
			$res = $db->db->autoExecute('cart', $updateValues, DB_AUTOQUERY_UPDATE, "cart_hash = '$cart_hash'");
			if(Ethna::isError($res)) return 'user_error';
			
			// ログインページへ遷移
			$this->ae->add(null,'',E_USER_ORDER_LOGIN);
			return 'user_login';
		}
	}
}
?>