<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザー情報編集実行アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserEcDeliveryEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'user_name' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_name_kana' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_zipcode' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'min'			=> 7,
			'max'			=> 7,
			'regexp'		=> '/^[0-9]+$/',
			'min_error' 	=> '{form}を半角数字7文字で正しく入力してください', 
			'max_error' 	=> '{form}を半角数字7文字で正しく入力してください', 
			'regexp_error'	=> '{form}を半角数字7文字で正しく入力してください', 
		),
		'region_id' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, region_id',
		),
		'user_address' => array(
			'required'	=> true,
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_address_building' => array(
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'user_phone' => array(
			'min'			=> 10,
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'regexp'		=> '/^[0-9]+$/',
			'required_error'=> '{form}を半角数字10文字以上で正しく入力してください',
			'min_error'		=> '{form}を半角数字10文字以上で正しく入力してください',
			'regexp_error'	=> '{form}を半角数字10文字以上で正しく入力してください',
		),

		'cart_id' => array(
			'type'        => VAR_TYPE_INT,
		),
		'user_order_type' => array(
			'type'        => VAR_TYPE_INT,
		),
		'user_order_use_point' => array(
			'type' 		=> VAR_TYPE_INT,
		),
		'mode' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_type' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_day' => array(
			'type' 		=> VAR_TYPE_INT,
		),
		'user_order_delivery_note' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_card_type' => array(
			'type'			=> VAR_TYPE_STRING,
		),
		'user_order_card_number' => array(
			'type' 			=> VAR_TYPE_INT,
		),
		'user_order_card_name' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_card_month' => array(
			'type'		=> VAR_TYPE_STRING,
		),
		'user_order_card_year' => array(
			'type'			=> VAR_TYPE_STRING,
		),
		'user_order_conveni_type' => array(
			'type'        => VAR_TYPE_STRING,
		),
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
		),
		'user_order_delivery_address' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_address_building' => array(
			'type'        => VAR_TYPE_STRING,
		),
		'user_order_delivery_phone' => array(
			'type' 			=> VAR_TYPE_INT,
		),
		'user_order_use_point_status' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_HIDDEN,
		),
		'user_order_card_revo_status' => array(
			'type'        => VAR_TYPE_INT,
		),
	);
}

/**
 * ユーザー情報編集実行アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserEcDeliveryEditDo extends Tv_ActionUserOnly
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
		if ($this->af->validate() > 0) return 'user_ec_delivery_edit';
		
		// 入力された誕生日が未来の場合
		if( date('Ymd') < sprintf("%04d%02d%02d", $this->af->get('user_birth_date_year'), $this->af->get('user_birth_date_month'), $this->af->get('user_birth_date_day')) ){
			$this->ae->add(null, '', E_USER_BIRTHDAY);
			return 'user_ec_delivery_edit';
		}
		
		// 二重ポスト対応
		if(Ethna_Util::isDuplicatePost()) return 'user_ec_delivery_edit_done'; 
		
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
		$usersess = $this->session->get('user');
		$u =& new Tv_User($this->backend, 'user_id', $usersess['user_id']);
		$u->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$u->set('user_updated_time', date('Y-m-d H:i:s'));
		// 更新
		$u->update();
		
		// sessionにユーザ情報を保存する
		$this->session->set('user', $u->getNameObject()); 
		
		// カートハッシュが無い人はカートハッシュを発行
//		if(!$this->session->get('cart_hash')) $this->session->set('cart_hash', substr(md5(uniqid(rand(), true)), 0, 19));
		$cart_hash = $um->getUniqId();
		if(!$this->session->get('cart_hash')) $this->session->set('cart_hash', $cart_hash);
		
		$u->update();

		if ($this->af->get('user_order_type'))
		{
			return 'user_ec_order_check';
		}
		else
		{
			return 'user_ec_delivery_edit_done';
		}
	}
}
?>