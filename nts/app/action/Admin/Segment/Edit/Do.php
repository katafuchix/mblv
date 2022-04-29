<?php
/**
 * Do.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * 管理セグメント編集実行処理アクションフォームクラス
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminSegmentEditDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'segment_id' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'segment_name' => array(
			'name'			=> 'セグメント名',
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'user_carrier_status' => array(
			'name'			=> 'キャリアセグメント',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> 'セグメント配信を使用する',
			),
		),
		'user_carrier' => array(
			'name'			=> 'キャリア',
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> 'DOCOMO',
						2	=> 'AU',
						3 	=> 'SOFTBANK',
			),
		),
		'user_point_status' => array(
			'name'			=> 'ポイントセグメント',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> 'セグメント配信を使用する',
			),
		),
		'user_point_min' => array(
			'name'			=> 'ポイント（最小）',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'user_point_max' => array(
			'name'			=> 'ポイント（最大）',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'user_age_status' => array(
			'name'			=> '年齢セグメント',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> 'セグメント配信を使用する',
			),
		),
		'user_age_min' => array(
			'name'			=> '年齢（最小）',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'user_age_max' => array(
			'name'			=> '年齢（最大）',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'user_sex_status' => array(
			'name'			=> '性別セグメント',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> 'セグメント配信を使用する',
			),
		),
		'user_sex' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
		),
		'prefecture_id_status' => array(
			'name'			=> '住所セグメント',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> 'セグメント配信を使用する',
			),
		),
		'prefecture_id' => array(
			'name'			=> '住所',
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
		),
		'job_family_id_status' => array(
			'name'			=> '職種セグメント',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> 'セグメント配信を使用する',
			),
		),
		'job_family_id' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
		),
		'business_category_id_status' => array(
			'name'			=> '業種セグメント',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> 'セグメント配信を使用する',
			),
		),
		'business_category_id' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
		),
		'user_is_married_status' => array(
			'name'			=> '結婚セグメント',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> 'セグメント配信を使用する',
			),
		),
		'user_is_married' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
		),
		'user_has_children_status' => array(
			'name'			=> '子供セグメント',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> 'セグメント配信を使用する',
			),
		),
		'user_has_children' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
		),
		'user_blood_type_status' => array(
			'name'			=> '血液型セグメント',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> 'セグメント配信を使用する',
			),
		),
		'user_blood_type' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
		),
		'work_location_prefecture_id_status' => array(
			'name'			=> '勤務地セグメント',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> 'セグメント配信を使用する',
			),
		),
		'work_location_prefecture_id' => array(
			'type'			=> array(VAR_TYPE_INT),
			'form_type'		=> FORM_TYPE_CHECKBOX,
		),
		'user_created_status' => array(
			'name'			=> '登録日セグメント',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(
						1	=> 'セグメント配信を使用する',
			),
		),
		'user_created_year_start' => array(
			'name'			=> '登録開始年',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, year',
		),
		'user_created_month_start' => array(
			'name'			=> '登録開始月',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, month',
		),
		'user_created_day_start' => array(
			'name'			=> '登録開始日',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, day',
		),
		'user_created_year_end' => array(
			'name'			=> '登録終了年',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, year',
		),
		'user_created_month_end' => array(
			'name'			=> '登録終了月',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, month',
		),
		'user_created_day_end' => array(
			'name'			=> '登録終了日',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, day',
		),
	);
}

/**
 * 管理セグメント編集実行処理アクション実行クラス
 * 
 * @author	Technovarth 
 * @access	public 
 * @package	SNSV
 */
class Tv_Action_AdminSegmentEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_segment_edit';
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
		// セグメント編集
		$m =& new Tv_Segment($this->backend,'segment_id',$this->af->get('segment_id'));
		$m->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// セグメントをセット
		$sm = $this->backend->getManager('Segment');
		$m = $sm->setSegment($m);
		// 対象ユーザ数を取得する
		$user_list = $sm->getSegmentUser();
		$m->set('segment_user_num', count($user_list));
		// 更新
		$r = $m->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_segment_edit';
		
		$this->ae->add("errors","セグメント編集が完了しました");
		return 'admin_segment_list';
	}
}
?>