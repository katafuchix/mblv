<?php
/**
 * File.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * 管理ファイル管理画面アクションフォームクラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_AdminFile extends Tv_ActionForm
{
	/** @var	bool	バリデータにプラグインを使うフラグ */
	var $use_validator_plugin = true;
	
	/** @var	array   フォーム値定義 */
	var $form = array(
		'file_id' => array(
			'name'		=> 'ファイルID',
			'type'		=> VAR_TYPE_INT,
			'form_type'	=> FORM_TYPE_HIDDEN,
		),
		'file' => array(
			'name'		=> 'ファイル',
			'type'		=> VAR_TYPE_FILE,
			'form_type'	=> FORM_TYPE_FILE,
		),
		'upload' => array(
			'name'		=> 'アップロード',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		'edit' => array(
			'name'		=> '編集',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
		'delete' => array(
			'name'		=> '削除',
			'type'		=> VAR_TYPE_STRING,
			'form_type'	=> FORM_TYPE_SUBMIT,
		),
	);
}

/**
 * 管理ファイル管理画面アクション実行クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_AdminFile extends Tv_ActionAdminOnly
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
		// ファイルIDがある場合は更新
		if($this->af->get('edit') && $this->af->get('file') && $this->af->get('file_id')){
			$timestamp = date('Y-m-d H:i:s');
			$o =& new Tv_File($this->backend, 'file_id', $this->af->get('file_id'));
			$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
			$o->set('file_updated_time', $timestamp);
			// 画像のアップロード
			if($this->af->get('file')){
				$um = $this->backend->getManager('Util');
				$o->set('file_name', $um->uploadFile($this->af->get('file'), 'file'));
				// アップロードに成功したらオリジナルのファイル名を保存する
				if($o->get('file_name')){
					$file = $this->af->get('file');
					$o->set('file_name_o', $file['name']);
				}
			}
			// 更新
			$r = $o->update();
			// 更新エラーの場合
			if(Ethna::isError($r)){
				$this->ae->add(null, '', E_ADMIN_FILE_UPLOAD);
			}
			// 更新成功の場合
			else{
				$this->ae->add(null, '', I_ADMIN_FILE_UPLOAD);
			}
			// フォーム値をクリア
			$this->af->clearFormVars();
		}
		// アップロード
		elseif($this->af->get('upload') && $this->af->get('file')){
			$timestamp = date('Y-m-d H:i:s');
			$o =& new Tv_File($this->backend);
			$o->importForm(OBJECT_IMPORT_IGNORE_NULL);
			$o->set('file_status', 1);
			$o->set('file_created_time', $timestamp);
			$o->set('file_updated_time', $timestamp);
			// 画像のアップロード
			if($this->af->get('file')){
				$um = $this->backend->getManager('Util');
				$o->set('file_name', $um->uploadFile($this->af->get('file'), 'file'));
				// アップロードに成功したらオリジナルのファイル名を保存する
				if($o->get('file_name')){
					$file = $this->af->get('file');
					$o->set('file_name_o', $file['name']);
				}
			}
			// 登録
			$r = $o->add();
			// 登録エラーの場合
			if(Ethna::isError($r)){
				$this->ae->add(null, '', E_ADMIN_FILE_UPLOAD);
			}
			// 登録成功の場合
			else{
				$this->ae->add(null, '', I_ADMIN_FILE_UPLOAD);
			}
			// フォーム値をクリア
			$this->af->clearFormVars();
		}
		// 削除
		elseif($this->af->get('delete') && $this->af->get('file_id')){
			$timestamp = date('Y-m-d H:i:s');
			$o =& new Tv_File($this->backend, 'file_id', $this->af->get('file_id'));
			$o->set('file_status', 0);
			$o->set('file_updated_time', $timestamp);
			$o->set('file_deleted_time', $timestamp);
			// 削除
			$r = $o->update();
			// 削除エラーの場合
			if(Ethna::isError($r)){
				$this->ae->add(null, '', E_ADMIN_FILE_DELETE);
			}
			// 削除成功の場合
			else{
				$this->ae->add(null, '', I_ADMIN_FILE_DELETE);
			}
			// フォーム値をクリア
			$this->af->clearFormVars();
		}
		// 一覧表示
		
		return 'admin_file';
	}
}
?>