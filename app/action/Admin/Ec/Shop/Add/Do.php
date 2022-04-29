
<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ショップ登録実行アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcShopAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'shop_name' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'shop_news' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'shop_bgcolor' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'shop_textcolor' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'shop_linkcolor' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'shop_alinkcolor' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'shop_vlinkcolor' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'shop_new_arrivals' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'shop_ranking' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'shop_image1' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'shop_image1_file' => array(
			'type'			=> VAR_TYPE_FILE,
			'form_type'		=> FORM_TYPE_FILE,
		),
		'shop_image2' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'shop_image2_file' => array(
			'type'			=> VAR_TYPE_FILE,
			'form_type'		=> FORM_TYPE_FILE,
		),
		'shop_body' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'file_id' => array(
			'name'		=> 'ショップフリースペース用ファイル',
			'type'		=> VAR_TYPE_STRNG,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'shop_category_print_status' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'	=> array('1' => '表示する' , '0' => '表示しない',),
		),
		'add' => array(
		),
		'confirm' => array(
		),
	);
}

/**
 * 管理ショップ登録実行アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcShopAddDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) return 'admin_ec_shop_add';
		
		// 2重POSTの場合
		if(Ethna_Util::isDuplicatePost()) return 'admin_ec_shop_list';
		
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
		
		$is_error = false;
		
		$shop_image1_file = $this->af->get('shop_image1_file');
		if( $shop_image1_file[tmp_name] && $shop_image1_file[size]>0 ){
			// ショップIDの取得
			$param = array(
				'sql_select'	=> 'max(shop_id) as max_shop_id',
				'sql_from'		=> 'shop',
			);
			$shop = $um->dataQuery($param);
			if (PEAR::isError($rows)) return 'admin_ec_shop_add';
			$shop_id = $shop[0]['max_shop_id'];
			$shop_id++;
			
			$shop_image1 = $um->uploadThumbImage($this->config->get('file_path').'shop/', $this->af->get('shop_image1_file'), $shop_id.'_1');
			if(!$shop_image1){
				$this->ae->add(null, '', E_ADMIN_SHOP_IMAGE1_FILE_UPLOAD);
				$is_error = true;
			}
			$this->af->set('shop_image1', $shop_image1);
			//画像のサムネイル
			$um->makeThumbImage($this->config->get('file_path').'shop/', $this->config->get('file_path').'shop/thumb/', $shop_image1, 53);
		}
		else if($this->af->get('shop_image1'))
		{
			$shop_image1 = $this->af->get('shop_image1');
		}
		else
		{
			$this->ae->add(null, '', E_ADMIN_SHOP_IMAGE1_FILE_UPLOAD);
			$is_error = true;
		}
		
		$shop_image2_file = $this->af->get('shop_image2_file');
		if( $shop_image2_file[tmp_name] && $shop_image2_file[size]>0 ){
			// ショップIDの取得
			$param = array(
				'sql_select'	=> 'max(shop_id) as max_shop_id',
				'sql_from'		=> 'shop',
			);
			$shop = $um->dataQuery($param);
			if (PEAR::isError($rows)) return 'admin_ec_shop_add';
			$shop_id = $shop[0]['max_shop_id'];
			$shop_id++;
			
			$shop_image2 = $um->uploadThumbImage($this->config->get('file_path').'shop/', $this->af->get('shop_image2_file'), $shop_id.'_2');
			if(!$shop_image2){
				$this->ae->add(null, '', E_ADMIN_SHOP_IMAGE2_FILE_UPLOAD);
				$is_error = true;
			}
			$this->af->set('shop_image2', $shop_image2);
			//画像のサムネイル
			$um->makeThumbImage($this->config->get('file_path').'shop/', $this->config->get('file_path').'shop/thumb/', $shop_image2, 230);
		}
		else if($this->af->get('shop_image2'))
		{
			$shop_image2 = $this->af->get('shop_image2');
		}
		else
		{
			$this->ae->add(null, '', E_ADMIN_SHOP_IMAGE2_FILE_UPLOAD);
			$is_error = true;
		}
		
		// アップロードエラーがあれば入力画面に戻す
		if($is_error) return 'admin_ec_shop_add';
		
		// ショップ情報追加準備
		$timestamp = date('Y-m-d H:i:s');
		$o = new Tv_Shop($this->backend, 'shop_id', $this->af->get('shop_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('shop_status', 1);
		$o->set('shop_image1', $shop_image1);
		$o->set('shop_image2', $shop_image2);
		$o->set('shop_created_time', $timestamp);
		$o->set('shop_updated_time', $timestamp);
		
		// ショップ情報追加
		$r = $o->add();
		if(Ethna::isError($r)) return 'admin_ec_shop_add';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_SHOP_ADD_DONE);
		return 'admin_ec_shop_list';
	}
}
?>