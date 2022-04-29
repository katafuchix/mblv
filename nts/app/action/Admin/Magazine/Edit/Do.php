<?php
/**
 * Do.php
 * 
 * @author Technovarth 
 * @package SNSV
 */

/**
 * 管理メルマガ編集実行処理アクションフォームクラス
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Form_AdminMagazineEditDo extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'magazine_id' => array(
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'year' => array(
			'name'			=> '年',
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, year',
		),
		'month' => array(
			'name'			=> '月',
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, month',
		),
		'day' => array(
			'name'			=> '日',
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, day',
		),
		'hour' => array(
			'name'			=> '時',
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, hour',
		),
		'min' => array(
			'name'			=> '分',
			'required'		=> true,
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, 10min',
		),
		'magazine_signature' => array(
			'name'			=> '署名',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'magazine_title' => array(
			'name'			=> '件名',
			'required'		=> true,
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
		),
		'magazine_body_text' => array(
			'name'			=> 'テキスト本文',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'magazine_body_html_status' => array(
			'name'			=> 'HTMLメールを使用する',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_CHECKBOX,
			'option'			=> array(1 => 'HTMLメールを使用する'),
		),
		'magazine_body_html' => array(
			'name'			=> 'HTML本文',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXTAREA,
		),
		'magazine_user_num' => array(
			'name'			=> '配信対象会員数',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_HIDDEN,
		),
		'segment_id' => array(
			'name'			=> 'セグメント',
			'type'			=> VAR_TYPE_INT,
			'form_type'		=> FORM_TYPE_SELECT,
			'option'			=> 'Util, segment',
		),
		'test_mailaddress' => array(
			'name'			=> 'テストメールアドレス',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_TEXT,
			'custom'		=> 'checkMailaddress',
		),
		'magazine_test' => array(
			'name'			=> 'テスト配送',
			'type'			=> VAR_TYPE_STRING,
			'form_type'		=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * 管理メルマガ編集実行処理アクション実行クラス
 * 
 * @author Technovarth 
 * @access public 
 * @package SNSV
 */
class Tv_Action_AdminMagazineEditDo extends Tv_ActionAdminOnly
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
		if ($this->af->validate() > 0) return 'admin_magazine_edit';
		// メールマガジン配送テストの場合
		if($this->af->get('magazine_test')){
			$m = new Tv_Mail($this->backend);
			$user_params = array(
				array(
					'user_mailaddress'	=> $this->af->get('test_mailaddress'),
					'user_hash'		=> "test",
					'user_nickname'		=> "テストニックネーム",
					'user_point'		=> "100",
				)
			);
			$magazine_params = array(
				'subject'		=> $this->af->get('magazine_title'),
				'signature'		=> $this->af->get('magazine_signature'),
				'body_text'		=> $this->af->get('magazine_body_text'),
				'body_html'		=> $this->af->get('magazine_body_html'),
				'body_html_status'	=> $this->af->get('magazine_body_html_status'),
			);
			$m->sendAll($user_params, $magazine_params);
			$this->ae->add('errors', "指定メールアドレス宛にテストメールマガジンを送信しました");
			return 'admin_magazine_edit';
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
		// メルマガ編集
		$m =& new Tv_Magazine($this->backend,'magazine_id',$this->af->get('magazine_id'));
		$m->importForm(OBJECT_IMPORT_IGNORE_NULL);
		$magazine_reserve_time = sprintf("%04d-%02d-%02d %02d:%02d:00",
										$this->af->get('year'),
										$this->af->get('month'),
										$this->af->get('day'),
										$this->af->get('hour'),
										$this->af->get('min')
									);
		$m->set('magazine_reserve_time',$magazine_reserve_time);
		// HTMLメールを使用する
		if(!$this->af->get('magazine_body_html_status')){
			$m->set('magazine_body_html_status', 0);
		}
		// 配送対象ユーザ数を計算
		$sm = $this->backend->getManager('Segment');
		$m->set('magazine_user_num', count($sm->getSegmentUser($this->af->get('segment_id'))));
		// 更新
		$r = $m->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_magazine_edit';
		
		$this->ae->add("errors","メルマガ編集が完了しました");
		return 'admin_magazine_list';
	}
}
?>