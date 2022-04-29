<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理アバター編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAvatarEditDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'avatar_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'avatar_name' => array(
			'form_type' 	=> FORM_TYPE_TEXT,
			'required'	=> true,
		),
		'avatar_desc' => array(
			'form_type' 	=> FORM_TYPE_TEXTAREA,
			'required'	=> true,
		),
		'avatar_image1' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'avatar_image1_file' => array(
			'name'		=> '[1枚目]一覧に表示する画像',
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'avatar_image1_status' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'avatar_image1_desc' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'avatar_image1_desc_file' => array(
			'name'		=> '[1枚目]実際に使用する画像',
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'avatar_image1_desc_status' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'avatar_image1_x' => array(
			'name'		=> '[1枚目]画像のX座標',
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_INT,
		),
		'avatar_image1_y' => array(
			'name'		=> '[1枚目]画像のY座標',
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_INT,
		),
		'avatar_image1_z' => array(
			'name'		=> '[1枚目]画像のZ座標',
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_INT,
		),
		'avatar_image2' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'avatar_image2_file' => array(
			'name'		=> '[2枚目]一覧に表示する画像',
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'avatar_image2_status' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'avatar_image2_desc' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
		),
		'avatar_image2_desc_file' => array(
			'name'		=> '[2枚目]実際に使用する画像',
			'form_type' 	=> FORM_TYPE_FILE,
		),
		'avatar_image2_desc_status' => array(
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,image_status',
		),
		'avatar_image2_x' => array(
			'name'		=> '[1枚目]画像のX座標',
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_INT,
		),
		'avatar_image2_y' => array(
			'name'		=> '[2枚目]画像のY座標',
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_INT,
		),
		'avatar_image2_z' => array(
			'name'		=> '[2枚目]画像のZ座標',
			'form_type' 	=> FORM_TYPE_TEXT,
			'type'		=> VAR_TYPE_INT,
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
		'avatar_start_time' => array(
			'name'		=> 'アバター配信開始日時',
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
		'avatar_end_time' => array(
			'name'		=> 'アバター配信終了日時',
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
 * 管理アバター編集実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAvatarEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_avatar_edit';
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
		// アバター編集
		$timestamp = date('Y-m-d H:i:s');
		$o =& new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('avatar_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$o->set('avatar_updated_time', $timestamp);
		// プリセットアバター設定
		if(!$this->af->get('preset_avatar')){
			$o->set('preset_avatar', 0);
		}
		// デフォルトアバター設定
		if(!$this->af->get('default_avatar')){
			$o->set('default_avatar', 0);
		}
		// 初期選択アバター設定
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
		// アバター画像1のアップロード(1=編集)
		if($this->af->get('avatar_image1_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('avatar_image1', $um->uploadFile($this->af->get('avatar_image1_file'), 'avatar'));
		}
		// アバター画像1の削除(2=削除)
		elseif($this->af->get('avatar_image1_status') == 2){
			$o->set('avatar_image1', '');
		}
		// 実際に使用するアバター画像1のアップロード(1=編集)
		if($this->af->get('avatar_image1_desc_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('avatar_image1_desc', $um->uploadFile($this->af->get('avatar_image1_desc_file'), 'avatar'));
		}
		// 実際に使用するアバター画像1の削除(2=削除)
		elseif($this->af->get('avatar_image1_desc_status') == 2){
			$o->set('avatar_image1_desc', '');
		}
		// アバター画像2のアップロード(1=編集)
		if($this->af->get('avatar_image2_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('avatar_image2', $um->uploadFile($this->af->get('avatar_image2_file'), 'avatar'));
		}
		// アバター画像2の削除(2=削除)
		elseif($this->af->get('avatar_image2_status') == 2){
			$o->set('avatar_image2', '');
		}
		// 実際に使用するアバター画像2のアップロード(1=編集)
		if($this->af->get('avatar_image2_desc_status') == 1){
			$um =& $this->backend->getManager('Util');
			$o->set('avatar_image2_desc', $um->uploadFile($this->af->get('avatar_image2_desc_file'), 'avatar'));
		}
		// 実際に使用するアバター画像2の削除(2=削除)
		elseif($this->af->get('avatar_image2_desc_status') == 2){
			$o->set('avatar_image2_desc', '');
		}
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_avatar_list';
		
		// アバターカテゴリIDの保持
		$acid = $this->af->get('avatar_category_id');
		
		// フォーム値のクリア
		$this->af->clearFormVars();
		
		// アバターカテゴリIDのセット
		$this->af->set('avatar_category_id', $acid);
		
		$this->ae->add(null, '', I_ADMIN_AVATAR_EDIT_DONE);
		return 'admin_avatar_list';
	}
}
?>