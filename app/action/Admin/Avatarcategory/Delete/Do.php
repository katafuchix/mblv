<?php
/**
 * Do.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理アバターカテゴリ削除実行処理アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminAvatarcategoryDeleteDo extends Tv_ActionForm
{
	/** @var    bool    バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	/** @var    array   フォーム値定義 */
	var $form = array(
		'avatar_category_id' => array(
			'type'		=> VAR_TYPE_INT,
		),
	);
}

/**
 * 管理アバターカテゴリ削除実行処理アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminAvatarcategoryDeleteDo extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// カテゴリ以下にアバターの登録があるかチェックする
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> ' avatar ',
			'sql_where'		=> 'avatar_category_id =  ? AND avatar_status = 1 ',
			'sql_values'	=> array( $this->af->get('avatar_category_id')),
		);
		$r = $um->dataQuery($param);
		// 削除処理を中止
		if(count($r)>0){
			$this->ae->add(null, '', I_ADMIN_AVATAR_CATEGORY_DELETE_STOP);
			return 'admin_avatarcategory_list';
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
		// アバターカテゴリ削除（物理削除しない
		$ac =& new Tv_AvatarCategory($this->backend, 'avatar_category_id', $this->af->get('avatar_category_id'));
		$ac->set('avatar_category_status', 0);
		// 更新
		$r = $ac->update();
		// 更新エラーの場合
		if(Ethna::isError($r)) return 'admin_avatarcategory_list';
		
		$this->ae->add(null, '', I_ADMIN_AVATAR_CATEGORY_DELETE_DONE);
		return 'admin_avatarcategory_list';
	}
}
?>