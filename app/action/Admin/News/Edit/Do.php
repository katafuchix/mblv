<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理ニュース編集実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminNewsEditDo extends Tv_ActionForm
{
	/** @var    array   フォーム値定義 */
	var $form = array(
		'news_id' => array(
			'type'		=> VAR_TYPE_INT,
			'form_type' => FORM_TYPE_HIDDEN,
			'required'	=> true,
		),
		'news_type' => array(
			'required'	=> true,
		),
		'news_title' => array(
			'required'	=> true,
		),
		'news_body' => array(
			'required'	=> true,
		),
		'news_time' => array(
		),
		'update' => array(
		),
		// 配信開始
		'news_start_status' => array(
			'name'		=> '配信開始日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'news_start_year' => array(
			'name'		=> '配信開始日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_start_year' => array(
			'name'		=> '配信開始日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_start_month' => array(
			'name'		=> '配信開始日時（月）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_start_day' => array(
			'name'		=> '配信開始日時（日）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'news_start_hour' => array(
			'name'		=> '配信開始日時（時）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'news_start_min' => array(
			'name'		=> '配信開始日時（分）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
		// 配信終了
		'news_end_status' => array(
			'name'		=> '配信終了日時設定',
			'form_type' 	=> FORM_TYPE_CHECKBOX,
			'option'		=> array(1=>''),
		),
		'news_end_year' => array(
			'name'		=> '配信終了日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_end_year' => array(
			'name'		=> '配信終了日時（年）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, year',
		),
		'news_end_month' => array(
			'name'		=> '配信終了日時（月）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, month',
		),
		'news_end_day' => array(
			'name'		=> '配信終了日時（日）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, day',
		),
		'news_end_hour' => array(
			'name'		=> '配信終了日時（時）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, hour',
		),
		'news_end_min' => array(
			'name'		=> '配信終了日時（分）',
			'type'		=> VAR_TYPE_INT,
			'form_type' 	=> FORM_TYPE_SELECT,
			'option'		=> 'Util, 10min',
		),
	);
}

/**
 * 管理ニュース編集実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminNewsEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_news_edit';
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
		$timestamp = date('Y-m-d H:i:s');
		
		// ニュース更新
		$o =& new Tv_News($this->backend, 'news_id', $this->af->get('news_id'));
		$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
		// 配信開始日時設定
		if(!$this->af->get('news_start_status')){
			$o->set('news_start_status', 0);
			$o->set('news_start_time', '');
		}else{
			$o->set('news_start_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('news_start_year' ),
					$this->af->get('news_start_month'),
					$this->af->get('news_start_day'),
					$this->af->get('news_start_hour'),
					$this->af->get('news_start_min')
				)
			);
		}
		// 配信終了日時設定
		if(!$this->af->get('news_end_status')){
			$o->set('news_end_status', 0);
			$o->set('news_end_time', '');
		}else{
			$o->set('news_end_time', 
				sprintf(
					"%04d-%02d-%02d %02d:%02d:00",
					$this->af->get('news_end_year' ),
					$this->af->get('news_end_month'),
					$this->af->get('news_end_day'),
					$this->af->get('news_end_hour'),
					$this->af->get('news_end_min')
				)
			);
		}
		// ニュースタイプ
		$o->set('news_type', @implode(',', $this->af->get('news_type')));
		// 更新日時
		$o->set('news_updated_time', $timestamp);
		
		// 更新
		$r = $o->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_news_edit';
		
		// フォーム値のクリアー
		$this->af->clearFormVars();
		
		$this->ae->add(null, '', I_ADMIN_NEWS_EDIT_DONE);
		return 'admin_news_list';
	}
}
?>