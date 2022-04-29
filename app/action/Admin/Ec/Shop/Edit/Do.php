<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ショップ編集実行アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcShopEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'shop_id' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
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
		'shop_image1_status' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
//			'option'			=> 'Util, image_status',
			'option'	=> array('0' => '変更しない' , '1' => '変更する',),
		),
		'shop_image2_status' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
//			'option'			=> 'Util, image_status',
			'option'	=> array('0' => '変更しない' , '1' => '変更する',),
		),
		'edit' => array(
		),
		'confirm' => array(
		),
	);
}

/**
 * 管理ショップ編集実行アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcShopEditDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if ($this->af->validate() > 0) return 'admin_ec_shop_edit';
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
		
		// ショップ情報更新準備
		$shopObject =& new Tv_Shop($this->backend,'shop_id',$this->af->get('shop_id'));
		$shopObject->importForm(OBJECT_IMPORT_IGNORE_NULL);
		
		if($this->af->get('shop_image1_status') == 2){
			// 画像論理削除
			$shopObject->set('shop_image1',"");
		}elseif($this->af->get('shop_image1_status') == 1 && $this->af->get('shop_image1_file')){
			// 画像のアップロード
			$shop_id = $this->af->get('shop_id');
			$shop_image1 = $um->uploadThumbImage($this->config->get('file_path') . 'shop/PRE_', $this->af->get('shop_image1_file'),$shop_id . '_1');
			if(!$shop_image1){
				$this->ae->add(null, '', E_ADMIN_SHOP_IMAGE1_FILE_UPLOAD);
				return 'admin_ec_shop_edit';
			}
			//画像のサムネイル
			$um->makeThumbImage($this->config->get('file_path') . 'shop/' ,$this->config->get('file_path') . 'shop/thumb/' ,'PRE_'.$shop_image1, 53);
			
			// 画像のリネーム
			$before = $this->config->get('file_path') . 'shop/PRE_' . $shop_image1;
			$after  = $this->config->get('file_path') . 'shop/'     . $shop_image1;
			$res = $um->renameFile($before, $after);
			if(!$res){
				$this->ae->add(null, '', E_ADMIN_SHOP_IMAGE1_FILE_UPLOAD);
				return 'admin_ec_shop_edit';
			}
			$shopObject->set('shop_image1', $shop_image1);
			//画像のサムネイル
			$before = $this->config->get('file_path') . 'shop/thumb/PRE_' . $shop_image1;
			$after  = $this->config->get('file_path') . 'shop/thumb/'     . $shop_image1;
			$res = $um->renameFile($before, $after);
		}
		
		if($this->af->get('shop_image2_status') == 2){
			// 画像論理削除
			$shopObject->set('shop_image2',"");
		}elseif($this->af->get('shop_image2_status') == 1 && $this->af->get('shop_image2_file')){
			// 画像のアップロード
			$shop_id = $this->af->get('shop_id');
			$shop_image2 = $um->uploadThumbImage($this->config->get('file_path') . 'shop/PRE_', $this->af->get('shop_image2_file'),$shop_id . '_2');
			if(!$shop_image2){
				$this->ae->add(null, '', E_ADMIN_SHOP_IMAGE2_FILE_UPLOAD);
				return 'admin_ec_shop_edit';
			}
			//画像のサムネイル
			$um->makeThumbImage($this->config->get('file_path') . 'shop/' ,$this->config->get('file_path') . 'shop/thumb/' ,'PRE_'.$shop_image2, 230);
			
			// 画像のリネーム
			$before = $this->config->get('file_path') . 'shop/PRE_' . $shop_image2;
			$after  = $this->config->get('file_path') . 'shop/'     . $shop_image2;
			$res = $um->renameFile($before, $after);
			if(!$res){
				$this->ae->add(null, '', E_ADMIN_SHOP_IMAGE2_FILE_UPLOAD);
				return 'admin_ec_shop_edit';
			}
			$shopObject->set('shop_image2', $shop_image2);
			//画像のサムネイル
			$before = $this->config->get('file_path') . 'shop/thumb/PRE_' . $shop_image2;
			$after  = $this->config->get('file_path') . 'shop/thumb/'     . $shop_image2;
			$res = $um->renameFile($before, $after);
		}
		
		// ショップ情報更新
		$timestamp = date("Y-m-d H:i:s");
		$shopObject->set('shop_updated_time', $timestamp);
		$r = $shopObject->update();
		if(Ethna::isError($r)) return 'admin_ec_shop_edit';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_SHOP_EDIT_DONE);
		
		return 'admin_ec_shop_list';
	}
}
?>