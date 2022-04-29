<?php
/**
 * Decomail.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/**
 * 管理デコメールインポート実行処理アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminImportDecomail extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = false;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
	);
}

/**
 * 管理デコメールインポート実行処理アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminImportDecomail extends Tv_ActionAdminOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
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
		// ファイル読み込み
		$base = BASE . "/import/decomail/";
		$f = file("{$base}data.txt");
		// すべてのレコードに対して処理を行う
		foreach($f as $v){
			$d = explode("\t", $v);
			// デコメール登録
			$timestamp = date('Y-m-d H:i:s');
			$o =& new Tv_Decomail($this->backend);
			// デコメール名の決定
			if($d[5]){
				$o->set('decomail_name', "{$d[5]}");
			}
			// デコメール説明の決定
			if($d[6]){
				$o->set('decomail_desc', "{$d[6]}");
			}
			// デコメールカテゴリIDの決定
			if($d[6]){
				$o->set('decomail_category_id', "{$d[7]}");
			}
			// デコメールファイル1のアップロード
			$o->set('decomail_file1', "{$d[0]}");
			// デコメールファイル2のアップロード
			$o->set('decomail_file2', "{$d[1]}");
			// DOCOMO用デコメールファイルのアップロード
			$o->set('decomail_file_d', "{$d[2]}");
			// AU用デコメールファイルのアップロード
			$o->set('decomail_file_a', "{$d[3]}");
			// SOFTBANK用デコメールファイルのアップロード
			$o->set('decomail_file_s', "{$d[4]}");
			
//			$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
			$o->set('decomail_status', 1);
			$o->set('decomail_created_time', $timestamp);
			$o->set('decomail_updated_time', $timestamp);
/*			// デコメール配信終了数設定
//			if(!$this->af->get('decomail_stock_status')){
//				$o->set('decomail_stock_status', 0);
//				$o->set('decomail_stock_num', '');
//			}
//			// デコメール配信開始日時設定
//			if(!$this->af->get('decomail_start_status')){
//				$o->set('decomail_start_status', 0);
//				$o->set('decomail_start_time', '');
//			}else{
//				$o->set('decomail_start_time', 
//					sprintf(
//						"%04d-%02d-%02d %02d:%02d:00",
//						$this->af->get('decomail_start_year' ),
//						$this->af->get('decomail_start_month'),
//						$this->af->get('decomail_start_day'),
//						$this->af->get('decomail_start_hour'),
//						$this->af->get('decomail_start_min')
//					)
//				);
//			}
//			// デコメール配信終了日時設定
//			if(!$this->af->get('decomail_end_status')){
//				$o->set('decomail_end_status', 0);
//				$o->set('decomail_end_time', '');
			}else{
				$o->set('decomail_end_time', 
					sprintf(
						"%04d-%02d-%02d %02d:%02d:00",
						$this->af->get('decomail_end_year' ),
						$this->af->get('decomail_end_month'),
						$this->af->get('decomail_end_day'),
						$this->af->get('decomail_end_hour'),
						$this->af->get('decomail_end_min')
					)
				);
			}
			// デコメールファイル1のアップロード
			if($this->af->get('decomail_file1')){
				$um =& $this->backend->getManager('Util');
				$o->set('decomail_file1', $um->uploadFile($this->af->get('decomail_file1'),'decomail'));
			}
			// デコメールファイル2のアップロード
			if($this->af->get('decomail_file2')){
				$um =& $this->backend->getManager('Util');
				$o->set('decomail_file2', $um->uploadFile($this->af->get('decomail_file2'),'decomail'));
			}
			// DOCOMO用デコメールファイルのアップロード
			if($this->af->get('decomail_file_d')){
				$um =& $this->backend->getManager('Util');
				$o->set('decomail_file_d', $um->uploadFile($this->af->get('decomail_file_d'),'decomail'));
			}
			// AU用デコメールファイルのアップロード
			if($this->af->get('decomail_file_a')){
				$um =& $this->backend->getManager('Util');
				$o->set('decomail_file_a', $um->uploadFile($this->af->get('decomail_file_a'),'decomail'));
			}
			// SOFTBANK用デコメールファイルのアップロード
			if($this->af->get('decomail_file_s')){
				$um =& $this->backend->getManager('Util');
				$o->set('decomail_file_s', $um->uploadFile($this->af->get('decomail_file_s'),'decomail'));
			}
*/			// 登録
			$r = $o->add();
			// 登録エラーの場合
			if(Ethna::isError($r)){
				print "ERROR:{$v}";
			}else{
				print "SUCCESS:{$v}";
			}
			print "<br />";
		}
	}
}
?>