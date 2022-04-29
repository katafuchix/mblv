<?php
/**
 * List.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理動画一覧実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminMovieList extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'user_id' => array(
			'name'	  	=> '所有ユーザID',
			'type'	  	=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'movie_mime_type' => array(
			'name'	  	=> 'MIMEタイプ',
			'type'	  	=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'movie_size_max' => array(
			'name'	  	=> '動画サイズ(最大)',
			'type'	  	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'movie_size_min' => array(
			'name'	  	=> '動画サイズ(最小)',
			'type'	  	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_TEXT,
		),
		'movie_status' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,data_status',
		),
		'movie_checked' => array(
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util,data_checked',
		),
		// 投稿期間
		'movie_created_year_start' => array(
			'type'	  	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'movie_created_month_start' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'movie_created_day_start' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'movie_created_year_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'movie_created_month_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'movie_created_day_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		// 削除期間
		'movie_deleted_year_start' => array(
			'type'	  	=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'movie_deleted_month_start' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'movie_deleted_day_start' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'movie_deleted_year_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'movie_deleted_month_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'movie_deleted_day_end' => array(
			'type'		  => VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'sort_key' => array(
			'name'	  => 'ソートに使用するキー',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> array('所有ユーザID', 'MIMEタイプ', '動画サイズ', '投稿日時', '削除日時'),
		),
		'sort_order' => array(
			'name'	  => 'ソート順',
			'type'	  => VAR_TYPE_INT,
			'form_type' => FORM_TYPE_SELECT,
			'option'	=> array('昇順', '降順'),
		),
		// 更新系処理
		'update' => array(),
		'page' => array(),
		'id' => array(
			'name'		=> 'ID',
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> array(FORM_TYPE_HIDDEN),
		),
		'check' => array(
			'name'		=> 'チェックID',
			'type'		=> array(VAR_TYPE_INT),
			'form_type'	=> FORM_TYPE_CHECKBOX,
		),
	);
}

/**
 * 管理動画一覧実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminMovieList extends Tv_ActionAdminOnly
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
		if($this->af->validate() > 0) return 'admin_movie_list';
		
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
		// ステータス、監視ステータス更新処理
		if($this->af->get('update')) $this->updateStatusAll('movie');
		
		// HIDDENフォーム生成
		$hidden_vars = $this->af->getHiddenVars(NULL, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		
		return 'admin_movie_list';
	}
}
?>