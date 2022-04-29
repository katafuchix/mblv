<?php
/**
 * Add.php
 * 
 * @author     Technovarth
 * @package    MBLV
 */

/**
 * 管理カテゴリ追加アクションフォームクラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Form_AdminEcItemcategoryAdd extends Tv_ActionForm
{
}

/**
 * 管理カテゴリ追加アクション実行クラス
 * 
 * @author     Technovarth
 * @access     public
 * @package    MBLV
 */
class Tv_Action_AdminEcItemcategoryAdd extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		// まだショップがない場合はカテゴリを作れない
		$um = $this->backend->getManager('Util');
		$param = array(
			'sql_select'	=> ' count(shop_id)as cnt ',
			'sql_from'		=> ' shop ',
			'sql_where'		=> ' shop_status = ? ',
			'sql_values'	=> array(1,),
		);
		$rows = $um->dataQuery($param);
		if( $rows[0]['cnt'] == 0 ){
			$this->ae->add('errors',"カテゴリを追加するには、まずショップを作成してください。");
			return 'admin_ec_shop_list';
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
		return 'admin_ec_itemcategory_add';
	}
}
?>