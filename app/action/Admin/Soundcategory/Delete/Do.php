<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理サウンドカテゴリ削除実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminSoundcategoryDeleteDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var    array   フォーム値定義 */
	var $form = array(
		'sound_category_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * 管理サウンドカテゴリ削除実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminSoundcategoryDeleteDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// カテゴリ以下にサウンドの登録があるかチェックする
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> ' sound ',
			'sql_where'		=> 'sound_category_id =  ? AND sound_status = 1 ',
			'sql_values'	=> array( $this->af->get('sound_category_id')),
		);
		$r = $um->dataQuery($param);
		// 削除処理を中止
		if(count($r)>0){
			$this->ae->add(null, '', I_ADMIN_SOUND_CATEGORY_DELETE_STOP);
			return 'admin_soundcategory_list';
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
		// ゲームカテゴリ削除（物理削除しない
		$ac =& new Tv_SoundCategory($this->backend, 'sound_category_id', $this->af->get('sound_category_id'));
		$ac->set('sound_category_status', 0);
		// 更新
		$r = $ac->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_soundcategory_list';
		
		$this->ae->add(null, '', I_ADMIN_SOUND_CATEGORY_DELETE_DONE);
		return 'admin_soundcategory_list';
	}
}
?>