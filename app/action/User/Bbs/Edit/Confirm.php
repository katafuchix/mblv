<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザ伝言編集確認アクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
require_once 'Do.php';
class Tv_Form_UserBbsEditConfirm extends Tv_Form_UserBbsEditDo
{
}

/**
 * ユーザ伝言編集確認アクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBbsEditConfirm extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// 画像を削除
		if($this->af->get('delete_image')){
			$bbs =& new Tv_Bbs(
				$this->backend,
				'bbs_id',
				$this->af->get('bbs_id')
			);
			if($article->isValid()) $bbs->deleteImage();
			return 'user_bbs_edit';
		}
		// 戻る
		if($this->af->get('back')) return 'user_bbs_view';
		
		if($this->af->validate() > 0) return 'user_bbs_edit';
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
		return 'user_bbs_edit_confirm';
	}
}
?>