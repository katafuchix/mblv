<?php
/**
 * Confirm.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */
require_once('Do.php');
/**
 * 管理モール基本情報編集確認アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcConfigEditConfirm extends Tv_Form_AdminEcConfigEditDo
{
}
/**
 * 管理モール基本情報編集確認アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcConfigEditConfirm extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'admin_ec_config_edit';
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
		// 先にファイルをアップロードしておくことでアップしたファイル名もHIDDENに挿入する
		// ファイルをアップロード
		$um = $this->backend->getManager('Util');
		for($i=1;$i<=10;$i++){
			if($this->af->get('file_' . $i) && $this->af->get('file_' . $i . '_status') == 2){
				$filename = $um->uploadFile($this->af->get('file_' . $i));
				$this->af->set('filename_' . $i, $filename);
			}elseif($this->af->get('file_' . $i . '_status') == 3){
				$this->af->set('filename_' . $i, "");
			}
		}
		
		// コンテンツ本文の合成
		$um = $this->backend->getManager('Util');
		//$body = $um->convertHtmlPreview();
		$body = $um->convertHtml($this->af->get('mall_contents_body'));
		$this->af->setAppNe('mall_contents_body' ,$body);
		
		// HIDDENフォーム生成
		$hidden_vars = $this->af->getHiddenVars(null, array());
		$this->af->setAppNE('hidden_vars', $hidden_vars);
		return 'admin_ec_config_edit_confirm';
	}
}
?>