<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理カテゴリ追加実行アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcItemcategoryAddDo extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'shop_id' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, shop',
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
			'name'		=> '商品カテゴリフリースペース用ファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type'	=> FORM_TYPE_FILE,
		),
		'add' => array(
		),
		'confirm' => array(
		),
	);
}

/**
 * 管理カテゴリ追加実行アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemcategoryAddDo extends Tv_ActionAdminOnly
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
		if($this->af->validate()>0) return 'admin_ec_itemcategory_add';
		
		// 二重POSTの場合
		if(Ethna_Util::isDuplicatePost()) return 'admin_ec_itemcategory_list';
		
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
		
		// カテゴリのnextidを取得
		$param = array(
			'sql_select'	=> 'ifnull(max(item_category_id),0) as max_category_id',
			'sql_from'		=> 'item_category',
		);
		$item_category = $um->dataQuery($param);
		$item_category_id = $item_category[0]['max_category_id'];
		$item_category_id++;
		
		// 次のカテゴリ優先度の取得
		$param = array(
			'sql_select'	=> 'max(item_category_priority_id) as max_category_priority_id',
			'sql_from'		=> 'item_category',
			'sql_where'		=> 'shop_id = ?',
			'sql_values'	=> array($this->af->get('shop_id')),
		);
		$item_category = $um->dataQuery($param);
		$categoryPriorityId = $item_category[0]['max_category_priority_id'];
		$categoryPriorityId++;
		
		// 画像のアップロード
		$item_category_image1_file = $this->af->get('item_category_image1_file');
		if (is_array($item_category_image1_file) && $item_category_image1_file['name'])
		{
			$item_category_image = $um->uploadThumbImage($this->config->get('file_path').'item_category/', $item_category_image1_file, $item_category_id.'_1');
			if(!$item_category_image){
				$this->ae->add(null, '', E_ADMIN_ITEM_CATEGORY_IMAGE_FILE_UPLOAD);
				return 'admin_ec_itemcategory_add';
			}
			$this->af->set('item_category_image1', $item_category_image);
			//画像のサムネイル
			$um->makeThumbImage($this->config->get('file_path') . 'item_category/' ,$this->config->get('file_path') . 'item_category/thumb/', $item_category_image, 95);
		}
		
		// カテゴリ情報追加
		$categoryObject =& new Tv_ItemCategory($this->backend);
		$categoryObject->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$categoryObject->set('item_category_priority_id',$categoryPriorityId);
		$categoryObject->set('item_category_status',1);
		$timestamp = date('Y-m-d H:i:s');
		$categoryObject->set('item_category_created_time', $timestamp);
		$categoryObject->set('item_category_updated_time', $timestamp);
		
		$r = $categoryObject->add();
		if(Ethna::isError($r)) return 'admin_ec_itemcategory_add';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_ITEM_CATEGORY_ADD_DONE);
		return 'admin_ec_itemcategory_list';
	}
}
?>