<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理アバター登録実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminAvatarAddDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var	array   フォーム値定義 */
	var $form = array(
		'avatar_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'avatar_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'	=> true,
		),
		'avatar_image1' => array(
			'name'		=> '[1枚目]一覧に表示する画像',
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'avatar_image1_desc' => array(
			'name'		=> '[1枚目]実際に使用する画像',
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'avatar_image1_x' => array(
			'name'		=> '[1枚目]画像のX座標',
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_image1_y' => array(
			'name'		=> '[1枚目]画像のY座標',
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_image1_z' => array(
			'name'		=> '[1枚目]画像のZ座標',
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_image2' => array(
			'name'		=> '[2枚目]一覧に表示する画像',
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'avatar_image2_desc' => array(
			'name'		=> '[2枚目]実際に使用する画像',
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'avatar_image2_x' => array(
			'name'		=> '[2枚目]画像のX座標',
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_image2_y' => array(
			'name'		=> '[2枚目]画像のY座標',
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_image2_z' => array(
			'name'		=> '[2枚目]画像のZ座標',
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_point' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_stand_id' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,avatar_stand',
		),
		'avatar_category_id' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'required'	=> true,
			'option'		=> 'Util,avatar_category',
		),
		'avatar_sex_type' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,avatar_sex_type',
		),
		'preset_avatar' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'default_avatar' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'first_avatar' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'avatar_stock_num' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
		),
		'avatar_stock_status' => array(
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		// 配信開始
		'avatar_start_status' => array(
			'name'		=> 'アバター配信開始日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'avatar_start_year' => array(
			'name'		=> 'アバター配信開始日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_start_year' => array(
			'name'		=> 'アバター配信開始日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_start_month' => array(
			'name'		=> 'アバター配信開始日時（月）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_start_day' => array(
			'name'		=> 'アバター配信開始日時（日）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'avatar_start_hour' => array(
			'name'		=> 'アバター配信開始日時（時）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'avatar_start_min' => array(
			'name'		=> 'アバター配信開始日時（分）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		// 配信終了
		'avatar_end_status' => array(
			'name'		=> 'アバター配信終了日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'avatar_end_year' => array(
			'name'		=> 'アバター配信終了日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_end_year' => array(
			'name'		=> 'アバター配信終了日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'avatar_end_month' => array(
			'name'		=> 'アバター配信終了日時（月）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'avatar_end_day' => array(
			'name'		=> 'アバター配信終了日時（日）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'avatar_end_hour' => array(
			'name'		=> 'アバター配信終了日時（時）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'avatar_end_min' => array(
			'name'		=> 'アバター配信終了日時（分）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
	);
}

/**
 * 管理アバター登録実行処理アクション実行クラス
 * 
 * アバターを登録します
 *
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminAvatarAddDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_avatar_add';
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
		$um =& $this->backend->getManager('Util');
		// アバター登録
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_Avatar($this->backend);
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('avatar_status', 1);
		$o->set('avatar_created_time', $timestamp);
		$o->set('avatar_updated_time', $timestamp);
		// プリセットアバター設定
		if(!$this->af->get('preset_avatar')){
			$o->set('preset_avatar', 0);
		}
		// デフォルトアバター設定
		if(!$this->af->get('default_avatar')){
			$o->set('default_avatar', 0);
		}
		// 初期設定アバター設定
		if(!$this->af->get('first_avatar')){
			$o->set('first_avatar', 0);
		}
		// アバター配信終了数設定
		if(!$this->af->get('avatar_stock_status')){
			$o->set('avatar_stock_status', 0);
			$o->set('avatar_stock_num', '');
		}
		// アバター配信開始日時設定
		if(!$this->af->get('avatar_start_status')){
			$o->set('avatar_start_status', 0);
			$o->set('avatar_start_time', '');
		}else{
			$o->set('avatar_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('avatar_start_year' ),
					$this->af->get('avatar_start_month'),
					$this->af->get('avatar_start_day'),
					$this->af->get('avatar_start_hour'),
					$this->af->get('avatar_start_min')
				)
			);
		}
		// アバター配信終了日時設定
		if(!$this->af->get('avatar_end_status')){
			$o->set('avatar_end_status', 0);
			$o->set('avatar_end_time', '');
		}else{
			$o->set('avatar_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('avatar_end_year' ),
					$this->af->get('avatar_end_month'),
					$this->af->get('avatar_end_day'),
					$this->af->get('avatar_end_hour'),
					$this->af->get('avatar_end_min')
				)
			);
		}
		// アバター画像1のアップロード
		if($this->af->get('avatar_image1')){
			$o->set('avatar_image1', $um->uploadFile($this->af->get('avatar_image1'), 'avatar'));
		}
		// 実際に使用するアバター画像1のアップロード
		if($this->af->get('avatar_image1_desc')){
			$o->set('avatar_image1_desc', $um->uploadFile($this->af->get('avatar_image1_desc'), 'avatar'));
		}
		// アバター画像2のアップロード
		if($this->af->get('avatar_image2')){
			$o->set('avatar_image2', $um->uploadFile($this->af->get('avatar_image2'), 'avatar'));
		}
		// 実際に使用するアバター画像2のアップロード
		if($this->af->get('avatar_image2_desc')){
			$o->set('avatar_image2_desc', $um->uploadFile($this->af->get('avatar_image2_desc'), 'avatar'));
		}
		// 登録
		$r = $o->add();
		// 登録エラーの場合
		if(Ethna::isError($r)) return 'admin_avatar_list';
		
		// アバターカテゴリIDの保持
		$acid = $this->af->get('avatar_category_id');
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		// アバターカテゴリIDのセット
		$this->af->set('avatar_category_id', $acid);
		
		$this->ae->add(null, '', I_ADMIN_AVATAR_ADD_DONE);
		return 'admin_avatar_list';
	}
}
?>