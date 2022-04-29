<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理商品編集実行アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcItemEditDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		// 商品基本情報
		'shop_id' => array(
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'shop_name' => array(
			'type'			=> VAR_TYPE_TEXT,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'item_category_id' => array(
			'type'			=> array(VAR_TYPE_INT),
			'required'		=> true,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'		=> 'Util, item_category',
		),
		'supplier_id' => array(
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, supplier',
		),
		'postage_id' => array(
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'		=> 'Util, postage',
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
		'item_id' => array(
			'type'			=> VAR_TYPE_INT,
			'required'		=> true,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'item_name' => array(
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
		),
		'item_distinction_id' => array(
			'type'			=> VAR_TYPE_STRING,
		),
		'item_price' => array(
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
		),
		'item_text1' => array(
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
		),
		'item_text2' => array(
			'type'			=> VAR_TYPE_STRING,
			'required'		=> true,
		),
		'item_detail' => array(
			'type'			=> VAR_TYPE_STRING,
		),
		'item_spec' => array(
			'type'			=> VAR_TYPE_STRING,
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
		'item_image_status' => array(
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, image_status',
		),
		// 商品タイプ更新情報
		'stock_id' => array(
			'type'			=> array(VAR_TYPE_INT),
		),
		'item_type' => array(
			'type'			=> array(VAR_TYPE_STRING),
		),
		'stock_num' => array(
			'type'			=> array(VAR_TYPE_INT),
		),
		'stock_priority_id' => array(
			'type'			=> array(VAR_TYPE_INT),
		),
		// 商品タイプ追加情報
		'new_item_type' => array(
			'type'			=> array(VAR_TYPE_STRING),
		),
		'new_stock_num' => array(
			'type'			=> array(VAR_TYPE_STRING),
		),
		// サンプル画像更新情報
		'sample_id' => array(
			'type'			=> array(VAR_TYPE_INT),
		),
		'sample_name' => array(
			'type'			=> array(VAR_TYPE_STRING),
		),
		'sample_image' => array(
			'type'			=> array(VAR_TYPE_STRING),
		),
		'sample_image_status' => array(
			'type'			=> array(VAR_TYPE_INT),
		),
		'sample_priority_id' => array(
			'type'			=> array(VAR_TYPE_INT),
		),
		// サンプル画像追加情報
		'new_sample_name' => array(
			'type'			=> array(VAR_TYPE_STRING),
		),
		'new_sample_image' => array(
			'type'			=> array(VAR_TYPE_STRING),
		),
		'new_sample_image_file' => array(
			'type'			=> array(VAR_TYPE_FILE),
		),
		'sample_image_file' => array(
			'type'			=> array(VAR_TYPE_FILE),
		),
		'stock_one_type_status' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1 => 'このタイプのみの商品'),
		),
		'one_type_only_id' => array(
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
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
		'item_bundle_status' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(
									1 => '同梱不可',
									),
		),
		'edit' => array(
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
 * 管理商品編集実行アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemEditDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if ($this->af->validate()>0) return 'admin_ec_item_edit';
		
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
		
		//支払い方法が選択されていない場合
		if(!$this->af->get('item_use_credit_status') 
				&& !$this->af->get('item_use_conveni_status') 
				&& !$this->af->get('item_use_exchange_status')
				&& !$this->af->get('item_use_transfer_status')) 
		{
			$this->ae->add(null, '', E_ADMIN_ITEM_SETTLEMENT);
			$is_error = true;
		}
		
		
		// shop_idがない場合 category_idからshop_idを取得する。category_idもなければ終了
		if(!$this->af->get('shop_id')){
			if(!$this->af->get('category_id')){
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
			//配列から""を削除
			$new_item_type = @array_diff($this->af->get('new_item_type'), array(""));
			//タイプが2個以上設定されている場合
			if(count($new_item_type) > 0){
				$this->ae->add(null, '', E_ADMIN_ITEM_BUNDLE_STATUS);
				$this->af->set('new_item_type', array(''));
				$this->af->set('new_stock_num', array(''));
				$is_error = true;
			}
		}
		
		//商品識別IDが重複している場合
		if($this->af->get('item_distinction_id') != ''){
			$o =& new Tv_Item($this->backend, 'item_distinction_id', $this->af->get('item_distinction_id'));
			if($o->get('item_id') != $this->af->get('item_id')){
				if($o->get('item_id')){
					$this->ae->add(null, '', E_ADMIN_ITEM_NO_DUPLICATE);
					$this->ae->add(null, '', E_ADMIN_ITEM_TRY_SUPPLIER_AND_IMAGE_CHECK);
					$is_error = true;
				}
			}
		}
		
		//サンプル画像Noが重複していないかチェック
		if($this->af->get('sample_priority_id')){
			$sample_priority_id = array_diff($this->af->get('sample_priority_id'), array('') );//""を削除
			$org_cnt = count($sample_priority_id);//要素カウント
			$now_cnt = count(array_unique($sample_priority_id));//重複を削除して要素カウント
			if($org_cnt != $now_cnt){
				$this->ae->add(null, '', E_ADMIN_SAMPLE_PRIORITY_ID_DUPLICATE);
				$is_error = true;
			}
		}
		
		// 判定はまとめて出力する
		if ($is_error == true)
		{
//			$this->ae->add(null, '', E_ADMIN_ITEM_TRY_SUPPLIER_AND_IMAGE_CHECK);
			return 'admin_ec_item_edit';
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
		// 商品情報更新準備
		$itemObject =& new Tv_Item($this->backend,'item_id',$this->af->get('item_id'));
		if($itemObject->get('shop_id') != $this->af->get('shop_id')){
			$this->ae->add(null, '', E_ADMIN_AUTHORITY_EDIT);
			return 'admin_ec_item_edit';
		}
		$itemObject->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// itemオブジェクトから、stockオブジェクト系のプロパティを削除する
		$itemObject->clear('stock_type');
		$itemObject->clear('stock_num');
		
		// 画像周りの処理開始
		$um = $this->backend->getManager('Util');
		$item_id = $this->af->get('item_id');
		
		$item_image_file = $this->af->get('item_image_file');
		
		// 画像２の処理
		// 削除する が選択された場合
		if($this->af->get('item_image_status') == 2){
			// 画像論理削除
			$itemObject->set('item_image',"");
		}elseif($this->af->get('item_image_status') == 1 && is_array($item_image_file) && $item_image_file['name']){
			// 画像のアップロード
			$item_id = $this->af->get('item_id');
			$item_image = $um->uploadThumbImage($this->config->get('file_path') . 'item/PRE_', $item_image_file, $item_id . '_1');
			
			if(!$item_image){
				$this->ae->add(null, '', E_ADMIN_ITEM_IMAGE_FILE_UPLOAD);
				return 'admin_ec_item_edit';
			}
			$itemObject->set('item_image', $item_image);
			//画像のサムネイル
			$um->makeThumbImage($this->config->get('file_path') . 'item/' ,$this->config->get('file_path') . 'item/thumb/' ,'PRE_'.$item_image, 53);
			
			// 画像のリネーム
			$um = $this->backend->getManager('Util');
			$before = $this->config->get('file_path') . 'item/PRE_' . $item_image;
			$after  = $this->config->get('file_path') . 'item/'     . $item_image;
			$res = $um->renameFile($before, $after);
			if(!$res){
				$this->ae->add(null, '', E_ADMIN_ITEM_IMAGE_FILE_UPLOAD);
				return 'admin_ec_item_edit';
			}
			//画像のサムネイル
			$before = $this->config->get('file_path') . 'item/thumb/PRE_' . $item_image;
			$after  = $this->config->get('file_path') . 'item/thumb/'     . $item_image;
			$res = $um->renameFile($before, $after);
		}
		// 画像周りの処理終了
		
		// 決済
		// $this->af->get が 1 だったら xxx 、でなければ xxx
		($this->af->get('item_use_credit_status')   == '1' ? $itemObject->set('item_use_credit_status', 1)   : $itemObject->set('item_use_credit_status', 0));
		($this->af->get('item_use_conveni_status')  == '1' ? $itemObject->set('item_use_conveni_status', 1)  : $itemObject->set('item_use_conveni_status', 0));
		($this->af->get('item_use_exchange_status')  == '1' ? $itemObject->set('item_use_exchange_status', 1)  : $itemObject->set('item_use_exchange_status', 0));
		($this->af->get('item_use_transfer_status') == '1' ? $itemObject->set('item_use_transfer_status', 1) : $itemObject->set('item_use_transfer_status', 0));
		
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
		
		// 大型商品など同梱不可能な商品のばあい
		$itemObject->set('item_bundle_status', $this->af->get('item_bundle_status') );
		
		$timestamp = date('Y-m-d H:i:s');
		$itemObject->set('item_updated_time', $timestamp);
		
		// 商品情報更新
		$r = $itemObject->update();
		if(Ethna::isError($r)) return 'admin_ec_item_edit';
		
		// ストック情報更新
		$stock_id = $this->af->get('stock_id');
		$item_type = $this->af->get('item_type');
		$stock_num = $this->af->get('stock_num');
		$stock_priority_id = $this->af->get('stock_priority_id');
		if($stock_id && $item_type){
			$stock_count = 0;
			foreach($stock_id as $k => $v){
				// 商品タイプ名が入力されていれば有効データ
				if($item_type[$k]){
					$stock_count++;
				}
			}
			
			foreach($stock_id as $k => $v){
				$stock_one_type_status = 0;
				// タイプ設定が1つの場合はstock_one_type_statusの値に関係なく1に置き換える
				if($stock_count + count($this->af->get('new_item_type')) == 1){
					$stock_one_type_status = 1;
				} else {
					$stock_one_type_status = $this->af->get('stock_one_type_status');
				}
				
				$stockObject =& new Tv_Stock($this->backend,'stock_id',$v);
				//タイプ名に値がある場合（update
				if($item_type[$k]){
					$stockObject->set('stock_status',1);
					$stockObject->set('item_type',$item_type[$k]);
					$stockObject->set('stock_num',$stock_num[$k]);
					$stockObject->set('stock_priority_id',$stock_priority_id[$k]);
					$stockObject->set('stock_one_type_status', $stock_one_type_status);
					$r = $stockObject->update();
					if(Ethna::isError($r)) return 'admin_ec_item_edit';
				}
				//タイプ名がカラの場合
				else{
					$stockObject->set('stock_status',0);
					$stockObject->set('stock_one_type_status', $stock_one_type_status);
					$r = $stockObject->update();
					if(Ethna::isError($r)) return 'admin_ec_item_edit';
				}
			}
		}
		
		// ストック情報追加
		if(!$this->af->get('stock_one_type_status')){
			$new_item_type = $this->af->get('new_item_type');
			$new_stock_num = $this->af->get('new_stock_num');
			if($new_item_type && is_array($new_item_type)){
				foreach($new_item_type as $k => $v){
					if($v != ""){
						$stockObject =& new Tv_Stock($this->backend);
						$stockObject->set('item_id',$this->af->get('item_id'));
						$stockObject->set('item_type',$v);
						$stockObject->set('stock_num',$new_stock_num[$k]);
						$stockObject->set('stock_status',1);
						$r = $stockObject->add();
						if(Ethna::isError($r)) return 'admin_ec_item_edit';
					}
				}
			}
		}
		
		// ストック情報更新 "このタイプのみの商品"のばあいは、他のタイプを削除する start
		$stock_id = $this->af->get('stock_id');
		$item_type = $this->af->get('item_type');
		if($stock_id && $item_type && $this->af->get('stock_one_type_status')){
			foreach($stock_id as $k => $v){
				if($this->af->get('one_type_only_id') != $v){
					$o =& new Tv_Stock($this->backend, 'stock_id', $v);
					$o->remove();
				}
			}
		}
		// ストック情報更新 "このタイプのみの商品"のばあいは、他のタイプを削除する end
		
		// サンプル画像情報更新
		$sample_id 				= $this->af->get('sample_id');
		$sample_name 			= $this->af->get('sample_name');
		$sample_image 			= $this->af->get('sample_image');
		$sample_image_file 		= $this->af->get('sample_image_file');
		$sample_image_status 	= $this->af->get('sample_image_status');
		$sample_priority_id 	= $this->af->get('sample_priority_id');
		
		// サンプル画像情報更新
		if(is_array($sample_id)){
			foreach($sample_id as $k => $v){
				$sampleObject =& new Tv_Sample($this->backend,'sample_id',$v);
				if($sample_name[$k]){
					$i=1;
					$sampleObject->set('sample_name',$sample_name[$k]);
					$sampleObject->set('sample_priority_id',$sample_priority_id[$k]);
					if($sample_image_status[$k] == 2){
						// 画像論理削除
						$sampleObject->set('sample_image',"");
						$sampleObject->set('sample_status',0);
					}elseif($sample_image_status[$k] == 1 && $sample_image_file[$k]){
						// 画像のアップロード
						$sample_image = $um->uploadThumbImage($this->config->get('file_path') . 'sample/PRE_', $sample_image_file[$k], $sample_id . '_1_' . $k);
						if(!$sample_image){
							$this->ae->add(null, '', E_ADMIN_SAMPLE_IMAGE_FILE_UPLOAD);
							return 'admin_ec_item_edit';
						}
						$sampleObject->set('sample_image', $sample_image);
						//画像のサムネイル
						$um->makeThumbImage($this->config->get('file_path') . 'sample/' ,$this->config->get('file_path') . 'sample/thumb/' ,'PRE_'.$sample_image, 53);
						
						// 画像のリネーム
						$um = $this->backend->getManager('Util');
						$before = $this->config->get('file_path') . 'sample/PRE_' . $sample_image;
						$after  = $this->config->get('file_path') . 'sample/'     . $sample_image;
						$res = $um->renameFile($before, $after);
						if(!$res){
							$this->ae->add(null, '', E_ADMIN_ITEM_IMAGE_FILE_UPLOAD);
							return 'admin_ec_item_edit';
						}
						//画像のサムネイル
						$before = $this->config->get('file_path') . 'sample/thumb/PRE_' . $sample_image;
						$after  = $this->config->get('file_path') . 'sample/thumb/'     . $sample_image;
						$res = $um->renameFile($before, $after);
						
					}else{
						$sampleObject->set('sample_name', $sample_name[$k]);
					}
					$r = $sampleObject->update();
					if(Ethna::isError($r)) return 'admin_ec_item_edit';
				}
			}
		}
		
		$new_sample_id 				= $this->af->get('new_sample_id');
		$new_sample_name 			= $this->af->get('new_sample_name');
		$new_sample_image 			= $this->af->get('new_sample_image');
		$new_sample_image_file 		= $this->af->get('new_sample_image_file');
		$new_sample_image_status 	= $this->af->get('new_sample_image_status');
		// サンプル画像情報追加
		$new_sample_name = $this->af->get('new_sample_name');
		$new_sample_image = $this->af->get('new_sample_image');
		if($new_sample_name && is_array($new_sample_name)){
			foreach($new_sample_name as $k => $v){
				//error
				if(strlen($new_sample_name[$k]) == 0) continue;
				// サンプル画像のnextidを取得
				$param = array(
					'sql_select'	=> 'ifnull(max(sample_id),0) as max_sample_id',
					'sql_from'		=> 'sample',
				);
				$sample = $um->dataQuery($param);
				if (PEAR::isError($sample)) return 'admin_ec_item_edit';
				$sample_id = $sample[0]['max_sample_id'];
				$sample_id++;
				// サンプル画像番号(priority_id)のnextidを取得
				$param = array(
					'sql_select'	=> 'ifnull(MAX(sample_priority_id),0)as max_sample_priority_id',
					'sql_from'		=> 'sample',
					'sql_where'		=> 'item_id = ?',
					'sql_values'	=> array($this->af->get('item_id')),
				);
				$sample = $um->dataQuery($param);
				if (PEAR::isError($sample)) return 'admin_ec_item_edit';
				$max_sample_priority_id = $sample[0]['max_sample_priority_id'];
				$max_sample_priority_id++;
				
				// サンプル画像のアップロード
				$sample_image = $um->uploadThumbImage($this->config->get('file_path') . 'sample/', $new_sample_image_file[$k], $sample_id . '_1_' . $k);
				if(!$sample_image){
					$this->ae->add(null, '', E_ADMIN_SHOP_IMAGE1_FILE_NOT_FOUND);
					return 'admin_ec_item_edit';
				}
				//画像のサムネイル
				$um->makeThumbImage($this->config->get('file_path').'sample/', $this->config->get('file_path').'sample/thumb/', $sample_image, 53);
				
				// 準備開始
				$new_sampleObject =& new Tv_Sample($this->backend);
				
				$new_sampleObject->set('sample_id',$sample_id);
				$new_sampleObject->set('sample_name',$v);
				$new_sampleObject->set('sample_image',$sample_image);
				$new_sampleObject->set('item_id',$item_id);
				$new_sampleObject->set('sample_priority_id',$max_sample_priority_id);
				$new_sampleObject->set('sample_status',1);
				$r = $new_sampleObject->add();
			}
		}
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_ITEM_EDIT_DONE);
		return 'admin_ec_item_list';
	}
}
?>