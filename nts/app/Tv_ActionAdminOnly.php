<?php
/**
 * Tv_ActionAdminOnly.php
 * 
 * @author Technovarth
 * @package SNSV
 */

/** */
require_once 'Tv_ActionAdmin.php';

/**
 * 管理者のみがアクセスできるアクションの基底クラス
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_ActionAdminOnly extends Tv_ActionAdmin
{
	/**
	 * 認証
	 * 
	 * @access public
	 */
	function authenticate()
	{
		// 基本情報を取得する
		parent::setSnsInfo();
		
		// セッションが開始していることが前提
		if ( !$this->session->isStart() ) {
			// 管理者は念のため、管理者モードかどうか確認
			$s = $this->session->get('admin');
			if(!$s){
				return 'admin_index';
			}
		}
		return parent::authenticate();
	}
	
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string 遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		return parent::prepare();
	}
	
	/**
	 * アクション実行
	 * 
	 * @access public
	 * @return string 遷移名(nullなら遷移は行わない)
	 */
	function perform()
	{
		return parent::perform();
	}
	
	/**
	 * ステータス、監視ステータス更新処理
	 * 
	 * @access public
	 * @return string  遷移名(nullなら遷移は行わない)
	 */
	 /**
	  * ■要件
	  	1. 「監視ステータス」「未確認」の物がHIDDENで来た場合は「監視ステータス」を「確認済」とする
	  	2. 「監視ステータス」「確認済」の物がHIDDENで来た場合は、「監視ステータス」に関しては更新してはいけない
	  	3. 「ステータス」「表示」の物がCHECKBOXで来た場合は、「ステータス」を「非表示」とする
	  	4. 「ステータス」「非表示」の物がCHECKBOXで来た場合は、「ステータス」を「表示」とする
	  	5. 「監視ステータス」「ステータス」ともに変更する必要がない場合はオブジェクトを更新してはいけない
	  */
	function updateStatusAll($object_name)
	{
		$primary_key = $object_name . '_id';
		$status_column = $object_name . '_status';
		$checked_column = $object_name . '_checked';
		$deleted_column = $object_name . '_deleted_time';
		$um = $this->backend->getManager('Util');
		$objectName = $um->camelize($object_name);
		$class_name = 'Tv_' . $objectName;
		$id = $this->af->get('id');
		$check = $this->af->get('check');
		$checked = false;
		
		// ステータス変更
		if(is_array($id)){
			if(is_array($check)) $checked = true;
			foreach($id as $v){
				// 万が一値がない場合は以下の処理をしない
				if(!$v) continue;
				// ステータスに更新する必要があるかどうか
				$_status = false;
				// 監視ステータスに更新する必要があるかどうか
				$_checked = false;
				
				// 対象のオブジェクトを取得する
				$o = new $class_name($this->backend, $primary_key, $v);
				// 今回の処理に非表示チェックがある場合
				if($checked){
					// 非表示チェックがある
					if(in_array($v, $check)){
						// オブジェクトが表示
						if($o->get($status_column) == 1){
							// オブジェクトを非表示準備
							$_status = true;
							$status = 0;
						}
					}
					// 非表示チェックがない
					else{
						// オブジェクトが非表示
						if($o->get($status_column) == 0){
							// オブジェクトを表示準備
							$_status = true;
							$status = 1;
						}
					}
				}
				// 今回の処理にチェックがない場合
				else{
					// オブジェクトが非表示
					if($o->get($status_column) == 0){
						// オブジェクトを表示準備
						$_status = true;
						$status = 1;
					}
				}
				// 監視ステータスが未監視
				if(array_key_exists($checked_column, $o->getDef())
					&& $o->get($checked_column) == 0){
					// オブジェクト監視ステータスを監視済みにする準備
					$_checked = true;
				}
				// オブジェクトステータスを更新する必要がある場合
				if($_status){
					// オブジェクトを表示にする
					if($status == 1){
						$o->set($status_column, 1);
						$this->ae->add('errors', "ID:{$v}を表示にしました。");
					}
					// オブジェクトを非表示にする
					else{
						$o->set($status_column, 0);
						$this->ae->add('errors', "ID:{$v}を非表示にしました。");
					}
				}
				// オブジェクト監視ステータスを更新する必要がある場合
				if($_checked){
					// オブジェクトを監視済みにする
					if($_checked){
						$o->set($checked_column, 1);
					}
				}
				// オブジェクトを更新する必要がある場合
				if($_status || $_checked){
					// 更新
					$o->update();
				}
			}
		}
		
		$this->af->set('id', array());
		$this->af->set('check', array());
		
		$this->ae->add(null, '', I_ADMIN_UPDATE_STATUS_ALL_DONE);
	}
}
?>