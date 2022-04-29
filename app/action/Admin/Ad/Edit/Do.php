<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理広告編集アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAdEditDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var    array   フォーム値定義 */
	var $form = array(
		'ad_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'ad_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'ad_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'	=> true,
		),
		'ad_url_d' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'ad_url_a' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'ad_url_s' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'ad_code_id' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
			'name'		=> '広告ASPコード',
			'option'		=> 'Util, ad_code',
		),
		'ad_image' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'ad_image_file' => array(
			'form_type' 	=> FORM_TYPE_FILE,
			'type'		=> VAR_TYPE_FILE,
			'name'		=> '広告画像ファイル',
		),
		'ad_image_status' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
			'type'		=> VAR_TYPE_STRING,
			'name'		=> '広告画像ステータス',
			'option'		=> 'Util,image_status',
		),
		'ad_point_type' => array(
			'form_type' 	=> FORM_TYPE_RADIO,
			'required'	=> true,
		),
		'ad_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_item_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_point_percent' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_item_point_percent' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_category_id' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'required'	=> true,
			'option'		=> 'Util,ad_category',
		),
		'ad_stock_num' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'ad_stock_status' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'ad_start_status' => array(
			'name'		=> '広告配信開始日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'ad_start_year' => array(
			'name'		=> '広告配信開始日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_start_year' => array(
			'name'		=> '広告配信開始日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_start_month' => array(
			'name'		=> '広告配信開始日時（月）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'ad_start_day' => array(
			'name'		=> '広告配信開始日時（日）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'ad_start_hour' => array(
			'name'		=> '広告配信開始日時（時）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'ad_start_min' => array(
			'name'		=> '広告配信開始日時（分）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		'ad_end_status' => array(
			'name'		=> '広告配信終了日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'ad_end_year' => array(
			'name'		=> '広告配信終了日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_end_year' => array(
			'name'		=> '広告配信終了日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'ad_end_month' => array(
			'name'		=> '広告配信終了日時（月）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'ad_end_day' => array(
			'name'		=> '広告配信終了日時（日）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'ad_end_hour' => array(
			'name'		=> '広告配信終了日時（時）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'ad_end_min' => array(
			'name'		=> '広告配信終了日時（分）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		'ad_type' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, ad_type',
		),
		'ad_display_type' => array(
			'required'	=> true,
			'form_type'	=> FORM_TYPE_RADIO,
			'option'		=> 'Util, ad_display_type',
		),
		'ad_memo' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
		),
	);
}

/**
 * 管理広告編集アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAdEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_ad_edit';
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
		// ad_idから広告編集
		$timestamp = date('Y-m-d H:i:s');
		$a =& new Tv_Ad($this->backend, 'ad_id', $this->af->get('ad_id'));
		$a->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$a->set('ad_updated_time', $timestamp);
		// 広告配信終了数設定
		if(!$this->af->get('ad_stock_status')){
			$a->set('ad_stock_status', 0);
			$a->set('ad_stock_num', '');
		}
		// 広告配信開始日時設定
		if(!$this->af->get('ad_start_status')){
			$a->set('ad_start_status', 0);
			$a->set('ad_start_time', '');
		}else{
			$a->set('ad_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('ad_start_year' ),
					$this->af->get('ad_start_month'),
					$this->af->get('ad_start_day'),
					$this->af->get('ad_start_hour'),
					$this->af->get('ad_start_min')
				)
			);
		}
		// 広告配信終了日時設定
		if(!$this->af->get('ad_end_status')){
			$a->set('ad_end_status', 0);
			$a->set('ad_end_time', '');
		}else{
			$a->set('ad_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('ad_end_year' ),
					$this->af->get('ad_end_month'),
					$this->af->get('ad_end_day'),
					$this->af->get('ad_end_hour'),
					$this->af->get('ad_end_min')
				)
			);
		}
		// 広告画像のアップロード(1=編集)
		if($this->af->get('ad_image_status') == 1){
			$um =& $this->backend->getManager('Util');
			$a->set('ad_image', $um->uploadFile($this->af->get('ad_image_file'), 'ad'));
		}
		// 広告画像の削除(2=削除)
		elseif($this->af->get('ad_image_status') == 2){
			$a->set('ad_image', '');
		}
		// 更新
		$r = $a->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_ad_list';
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_AD_EDIT_DONE);
		return 'admin_ad_list';
	}
}
?>