<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理商品登録実行アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcItemAddDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'shop_id' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'shop_name' => array(
			'type'			=> VAR_TYPE_TEXT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'item_category_id' => array(
			'type'			=> array(VAR_TYPE_INT),
			'required'		=> true,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'		=> 'Util, item_category',
		),
		'supplier' => array(
		),
		'supplier_id' => array(
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, supplier',
		),
		'postage' => array(
		),
		'postage_id' => array(
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, postage',
		),
		'exchange' => array(
		),
		'exchange_id' => array(
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, exchange',
		),
		'item_use_credit_status' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1 => 'クレジット'),
		),
		'item_use_conveni_status' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1 => 'コンビニ'),
		),
		'item_use_exchange_status' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1 => '代金引換'),
		),
		'item_use_transfer_status' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1 => '銀行振込'),
		),
		'item_name' => array(
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
		),
		'item_distinction_id' => array(
			'type'			=> VAR_TYPE_STRING,
		),
		'item_price' => array(
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
		),
		'item_text1' => array(
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'item_text2' => array(
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'item_detail' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'item_spec' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'item_label_front' => array(
			'type'			=> VAR_TYPE_STRING,
		),
		'item_label_back' => array(
			'type'			=> VAR_TYPE_STRING,
		),
		'item_image' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'item_image_file' => array(
			'type'			=> VAR_TYPE_FILE,
			'form_type'		=> FORM_TYPE_FILE,
		),
		'item_type' => array(
			'type'			=> array(VAR_TYPE_STRING),
		),
		'stock_num' => array(
			'type'			=> array(VAR_TYPE_STRING),
		),
		'sample_name' => array(
			'type'			=> array(VAR_TYPE_STRING),
		),
		'sample_image' => array(
			'type'			=> array(VAR_TYPE_STRING),
		),
		'sample_image_file' => array(
			'type'			=> array(VAR_TYPE_FILE),
		),
		'stock_one_type_status' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1 => 'このタイプのみの商品'),
		),
		'item_point' => array(
			'type'			=> VAR_TYPE_INT,
		),
		'item_status' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util,data_status',
		),
		'item_contents_body' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'new_sample_list' => array(
			'type'		=> array(VAR_TYPE_STRING),
			'form_type'	=> array(FORM_TYPE_HIDDEN),
		),
		'item_bundle_status' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1 => '同梱不可',),
		),
		'item_add' => array(
		),
		'add' => array(
		),
		'confirm' => array(
		),
		// 配信開始
		'item_start_status' => array(
			'name'			=> '商品販売開始日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'item_start_time' => array(
			'name'			=> '商品販売開始日時',
		),
		'item_start_year' => array(
			'name'			=> '商品販売開始日時（年）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'item_start_year' => array(
			'name'			=> '商品販売開始日時（年）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'item_start_month' => array(
			'name'			=> '商品販売開始日時（月）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'item_start_day' => array(
			'name'			=> '商品販売開始日時（日）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'item_start_hour' => array(
			'name'			=> '商品販売開始日時（時）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'item_start_min' => array(
			'name'			=> '商品販売開始日時（分）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		// 配信終了
		'item_end_status' => array(
			'name'			=> '商品販売終了日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'item_end_time' => array(
			'name'			=> '商品販売終了日時',
		),
		'item_end_year' => array(
			'name'			=> '商品販売終了日時（年）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'item_end_year' => array(
			'name'			=> '商品販売終了日時（年）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'item_end_month' => array(
			'name'			=> '商品販売終了日時（月）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'item_end_day' => array(
			'name'			=> '商品販売終了日時（日）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'item_end_hour' => array(
			'name'			=> '商品販売終了日時（時）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'item_end_min' => array(
			'name'			=> '商品販売終了日時（分）',
			'type'			=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
	);
}

/**
 * 管理商品登録実行アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemAddDo extends Tv_ActionAdminOnly
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
		if($this->af->validate()>0) return 'admin_ec_item_add';
		
		// 二重POSTの場合
		if(Ethna_Util::isDuplicatePost()) return 'admin_ec_item_list';
		
		$is_error = false;
		
		// 商品販売期間
		if($this->af->get('item_start_status') && $this->af->get('item_end_status')){
			$start = sprintf("%04d-%02d-%02d %02d:%02d:00",$this->af->get('item_start_year'),$this->af->get('item_start_month'),$this->af->get('item_start_day'),$this->af->get('item_start_hour'),$this->af->get('item_start_min'));
			$end = sprintf("%04d-%02d-%02d %02d:%02d:00",$this->af->get('item_end_year'),$this->af->get('item_end_month'),$this->af->get('item_end_day'),$this->af->get('item_end_hour'),$this->af->get('item_end_min'));
			$now = date('Y-m-d H:i:s');
			if($now > $end || $start > $end){
				$this->ae->add(null, '', E_ADMIN_ITEM_START_TO_END_TIME);
				$is_error = true;
			}
		}
		
		//仕入先がない場合
		if(!$this->af->get('supplier_id')){
			$this->ae->add(null, '', E_ADMIN_ITEM_SUPPLIER);
			$is_error = true;
		}
		
		//支払い方法が選択されていない場合
		if(!$this->af->get('item_use_credit_status') 
				&& !$this->af->get('item_use_conveni_status') 
				&& !$this->af->get('item_use_exchange_status')
				&& !$this->af->get('item_use_transfer_status'))
		{
			$this->ae->add(null, '', E_ADMIN_ITEM_SETTLEMENT);
			$is_error = true;
		}
		
		//在庫数が入力されていない場合
		$item_type_array = $this->af->get('item_type');
		$stock_num_array = $this->af->get('stock_num');
		if(!strlen($item_type_array[0]) || !strlen($stock_num_array[0])){
			$this->ae->add(null, '', E_ADMIN_STOCK_NUM);
			$is_error = true;
		}
		
		// shop_idがない場合 category_idからshop_idを取得する。category_idもなければ終了
		if(!$this->af->get('shop_id')){
			if(!$this->af->get('item_category_id')){
				$is_error = true;
			}else{
				$o =& new Tv_Category($this->backend, 'category_id', $this->af->get('category_id'));
				$shop_id = $o->get('shop_id');
				$this->ifnull_shop_id = $o->get('shop_id');
			}
		}
		
		//同梱不可の商品には、複数のタイプを設定出来ません。
		if($this->af->get('item_bundle_status')){
			//配列から""を削除
			$item_type = @array_diff($this->af->get('item_type'), array(""));
			//タイプが2個以上設定されている場合
			if(count($item_type) > 1){
				$this->ae->add(null, '', E_ADMIN_ITEM_BUNDLE_STATUS);
				$is_error = true;
			}
		}
		
		//商品識別IDが重複している場合
		if($this->af->get('item_distinction_id') != ''){
			$o =& new Tv_Item($this->backend, 'item_distinction_id', $this->af->get('item_distinction_id'));
			if($o->get('item_id')){
				$this->ae->add(null, '', E_ADMIN_ITEM_NO_DUPLICATE);
				$is_error = true;
			}
		}
		
		// 判定はまとめて出力する
		if ($is_error == true)
		{
//			$this->ae->add(null, '', E_ADMIN_ITEM_TRY_SUPPLIER_AND_IMAGE_CHECK);
			return 'admin_ec_item_add';
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
		//準備
		$um = $this->backend->getManager('Util');
		
		// アイテム追加準備
		$itemObject =& new Tv_Item($this->backend);
		$itemObject->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// itemオブジェクトから、stockオブジェクト系のプロパティを削除する
		$itemObject->clear('stock_type');
		$itemObject->clear('stock_num');
		
		// アイテムのnextidを取得
		$param = array(
			'sql_select'	=> 'ifnull(MAX(item_id),0)as max_item_id',
			'sql_from'		=> 'item',
		);
		$item = $um->dataQuery($param);
		$item_id = $item[0]['max_item_id'];
		$item_id++;
		
		// 画像のアップロード
		$item_image_file = $this->af->get('item_image_file');
		if (is_array($item_image_file) && $item_image_file['name'])
		{
			$item_image = $um->uploadThumbImage($this->config->get('file_path').'item/', $item_image_file, $item_id . '_1');
			
			if(!$item_image){
				$this->ae->add(null, '', E_ADMIN_ITEM_IMAGE_FILE_UPLOAD);
				return 'admin_ec_item_add';
			}
			$itemObject->set('item_image',$item_image);
			
			//画像のサムネイル
			$um->makeThumbImage($this->config->get('file_path') . 'item/' ,$this->config->get('file_path') . 'item/thumb/' ,$item_image, 53);
		}
		
		// アイテム追加
		$itemObject->set('item_priority_id',0);
		$itemObject->set('item_status',1);
		
		// 商品販売開始日時設定
		if(!$this->af->get('item_start_status')){
			$itemObject->set('item_start_status', 0);
			$itemObject->set('item_start_time', '');
		}else{
			$itemObject->set('item_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('item_start_year' ),
					$this->af->get('item_start_month'),
					$this->af->get('item_start_day'),
					$this->af->get('item_start_hour'),
					$this->af->get('item_start_min')
				)
			);
		}
		// 商品販売終了日時設定
		if(!$this->af->get('item_end_status')){
			$itemObject->set('item_end_status', 0);
			$itemObject->set('item_end_time', '');
		}else{
			$itemObject->set('item_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('item_end_year' ),
					$this->af->get('item_end_month'),
					$this->af->get('item_end_day'),
					$this->af->get('item_end_hour'),
					$this->af->get('item_end_min')
				)
			);
		}
		
		// 商品表示ステータス
		$itemObject->set('item_status',$this->af->get('item_status') );
		
		// カテゴリのセット カンマで区切ってひとつのカラムに入れる
		$item_category_id = $this->af->get('item_category_id');
		if($item_category_id && is_array($item_category_id)){
			$category = "";
			foreach($item_category_id as $v){
				if($category==""){
					$category .= $v;
				}else{
					$category .= "," . $v;
				}
			}
			$itemObject->set('item_category_id', $category);
		}
		
		$timestamp = date('Y-m-d H:i:s');
		$itemObject->set('item_created_time', $timestamp);
		$itemObject->set('item_updated_time', $timestamp);
		
		$r = $itemObject->add();
		if(Ethna::isError($r)) return 'admin_ec_item_add';
		$item_id_a = $itemObject->getId();
		
		// ストック情報追加
		$item_type = array_diff($this->af->get('item_type'), array(""));
		$stock_num = $this->af->get('stock_num');
		
		if($item_type){
			$stock_one_type_status = 0;
			// タイプ設定が1つの場合はstock_one_type_statusの値に関係なく1に置き換える
			if(count($item_type) == 1){
				$stock_one_type_status = 1;
			} else {
				$stock_one_type_status = $this->af->get('stock_one_type_status');
			}
			
			foreach($item_type as $k => $v){
				$stockObject =& new Tv_Stock($this->backend);
				$stockObject->importForm(OBJECT_IMPORT_IGNORE_NULL);
				$stockObject->set('item_id',$item_id);
				$stockObject->set('item_type',$v);
				$stockObject->set('stock_num',$stock_num[$k]);
				$stockObject->set('stock_status',1);
				$stockObject->set('stock_one_type_status', $stock_one_type_status);
				$r = $stockObject->add();
				if(Ethna::isError($r)) return 'admin_ec_item_add';
				
				// "このタイプのみの商品"ならば一回でbreak
				if($stock_one_type_status) break;
			}
		}
		
		// サンプル画像情報追加
		$sample_name = $this->af->get('sample_name');
		$sample_image_file = $this->af->get('sample_image_file');
		if($sample_name && is_array($sample_name)){
			$i=1;
			foreach($sample_name as $k => $v){
				if(strlen($sample_name[$k]) == 0) continue;
				if($sample_image_file[$k]['error'] == 4) continue;
				
				// サンプル画像のnextidを取得
				$param = array(
					'sql_select'	=> 'ifnull(max(sample_id),0) as max_sample_id',
					'sql_from'		=> 'sample',
				);
				$sample = $um->dataQuery($param);
				if (PEAR::isError($sample)) return 'admin_ec_item_add';
				$sample_id = $sample[0]['max_sample_id'];
				$sample_id++;
				
				// サンプル画像のアップロード
				if($sample_image_file[$k]){
					$sample_image = $um->uploadThumbImage($this->config->get('file_path').'sample/', $sample_image_file[$k], $sample_id.'_1_'.$k);
					if(!$sample_image){
						$this->ae->add(null, '', E_ADMIN_SHOP_IMAGE1_FILE_NOT_FOUND);
						return 'admin_ec_item_add';
					}
					//画像のサムネイル
					$um->makeThumbImage($this->config->get('file_path').'sample/', $this->config->get('file_path').'sample/thumb/', $sample_image, 53);
					
					// 準備開始
					$sampleObject =& new Tv_Sample($this->backend);
					$sampleObject->importForm(OBJECT_IMPORT_IGNORE_NULL);
					
					$sampleObject->set('sample_name',$v);
					$sampleObject->set('sample_image',$sample_image);
					$sampleObject->set('item_id',$item_id);
					$sampleObject->set('sample_status',1);
					$sampleObject->set('sample_priority_id',$i);
					$sampleObject->set('sample_created_time', $timestamp);
					$sampleObject->set('sample_updated_time', $timestamp);
					$r = $sampleObject->add();
					if(Ethna::isError($r)) return 'admin_ec_item_add';
					$i++;
				}
			}
		}
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_ITEM_ADD_DONE);
		return 'admin_ec_item_list';
	}
}
?>