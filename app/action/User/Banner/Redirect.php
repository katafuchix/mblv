<?php
/**
 * Redirect.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * ユーザバナーリダイレクトアクションフォーム
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_UserBannerRedirect extends Tv_ActionForm
{
	var $use_validator_plugin = false;
	var $form = array(
		'banner_id' => array(
			'type'		=> VAR_TYPE_STRING,
			'required' => true,
		),
	);
}

/**
 * ユーザバナーリダイレクトアクション
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_UserBannerRedirect extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_error';
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
		$banner_id = $this->af->get('banner_id');
		// バナー情報の取得
		$db = $this->backend->getDB();
		$values = array($banner_id);
		$sql = "SELECT * FROM banner WHERE banner_id = ?";
		$rows = $db->db->getAll($sql, $values, DB_FETCHMODE_ASSOC);
		if(PEAR::isError($rows)){
			return 'user_error';
		}
		$banner_url = $rows[0]["banner_url"];
		$banner_id = $rows[0]["banner_id"];
		
		if(count($rows)>0){
			/* =============================================
			// バナー統計解析処理
			 ============================================= */
			$sm = $this->backend->getManager('Stats');
			// クリック履歴をINSERT
			$sm->addStats('banner', $banner_id, 0, 2);
			
			// リダイレクト
			header("Location:$banner_url");
			exit;
		}else{
			return 'user_error';
		}
	}
}
?>