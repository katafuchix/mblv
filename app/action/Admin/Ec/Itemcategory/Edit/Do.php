<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理カテゴリ編集実行アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcItemcategoryEditDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'item_category_id' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'shop_id' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'item_category_name' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'item_category_text' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'item_category_image1' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'item_category_image1_file' => array(
			'type'			=> VAR_TYPE_FILE,
			'form_type'		=> FORM_TYPE_FILE,
			'required'		=> false,
		),
		'item_category_contents_body' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'file_id' => array(
			'name'		=> 'カテゴリフリースペース用ファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type'	=> FORM_TYPE_FILE,
		),
		'item_category_image1_status' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, image_status',
		),
		'edit' => array(
		),
		'confirm' => array(
		),
	);
}

/**
 * 管理カテゴリ編集実行アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemcategoryEditDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'admin_ec_itemcategory_edit';
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
		
		// カテゴリ情報更新
		$o =& new Tv_ItemCategory($this->backend,'item_category_id',$this->af->get('item_category_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		
		// 画像周りの処理開始
		$item_category_id = $this->af->get('item_category_id');
		
		$item_category_image1_file = $this->af->get('item_category_image1_file');
		
		// 削除する　が選択された場合
		if($this->af->get('item_category_image1_status') == 2){
			// 画像論理削除
			$o->set('item_category_image1',"");
		}
		// 変更する　が選択された場合で、fileがある場合
		elseif($this->af->get('item_category_image1_status') == 1 && is_array($item_category_image1_file) && $item_category_image1_file['name'])
		{
			// 画像のアップロード
			$item_category_image1 = $um->uploadThumbImage($this->config->get('file_path') . 'item_category/PRE_', $item_category_image1_file, $item_category_id . '_1');
			if(!$item_category_image1){
				$this->ae->add(null, '', E_ADMIN_ITEM_CATEGORY_IMAGE_FILE_UPLOAD);
				return 'admin_ec_itemcategory_edit';
			}
			//画像のサムネイル
			$um->makeThumbImage($this->config->get('file_path') . 'item_category/' ,$this->config->get('file_path') . 'item_category/thumb/' ,'PRE_'.$item_category_image1,95);
			
			// 画像のリネーム
			$before = $this->config->get('file_path') . 'item_category/PRE_' . $item_category_image1;
			$after  = $this->config->get('file_path') . 'item_category/'     . $item_category_image1;
			$res = $um->renameFile($before, $after);
			
			if(!$res){
				$this->ae->add(null, '', E_ADMIN_ITEM_CATEGORY_IMAGE_FILE_UPLOAD);
				return 'admin_ec_itemcategory_edit';
			}
			$o->set('item_category_image1', $item_category_image1);
			//画像のサムネイル
			$before = $this->config->get('file_path') . 'item_category/thumb/PRE_' . $item_category_image1;
			$after  = $this->config->get('file_path') . 'item_category/thumb/'     . $item_category_image1;
			$res = $um->renameFile($before, $after);
		}
		$timestamp = date('Y-m-d H:i:s');
		$o->set('item_category_updated_time', $timestamp);
		
		$r = $o->update();
		if(Ethna::isError($r)) return 'admin_ec_itemcategory_edit';
		// カテゴリ情報をエクスポート（「shop_id」が欲しい）
		$o->exportForm(OBJECT_IMPORT_IGNORE_NULL);
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_ITEM_CATEGORY_EDIT_DONE);
		return 'admin_ec_itemcategory_list';
	}
}
?>