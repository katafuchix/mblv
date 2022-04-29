<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザゲーム購入実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserGameBuyDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'game_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'name'		=> 'ｹﾞｰﾑID',
		),
	);
}

/**
 * ユーザゲーム購入実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserGameBuyDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_game_buy';
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
		// タイムスタンプ生成
		$timestamp = date('Y-m-d H:i:s');
		
		// セッションからユーザ情報を取得する
		$user = $this->session->get('user');
		
		$game_id = $this->af->get('game_id');
		// ゲーム情報取得
		$g =& new Tv_Game($this->backend, 'game_id', $game_id);
		$game_file3 = $g->get('game_file3');
		$ug =& new Tv_UserGame($this->backend);
		// 重複デコメール購入確認
		$ug_list =& $ug->searchProp(
			array('game_id'),
			array(
				'user_id'			=> $user['user_id'],
				'game_id'			=> $game_id,
				'user_game_status'		=> new Ethna_AppSearchObject(0, OBJECT_CONDITION_NE)
			)
		);
		// 購入履歴に該当がなければ購入
		if($ug_list[0] == 0){
			/* =============================================
			// ポイントチェック
			 ============================================= */
			$u =& new Tv_User($this->backend, 'user_id', $user['user_id']);
			if($u->get('user_point') < $g->get('game_point')){
				$this->ae->add(null, '', E_USER_POINT_SHORTAGE);
				return 'user_game_buy';
			}
			
			/* =============================================
			// ゲーム購入
			 ============================================= */
			$ug = new Tv_UserGame($this->backend);
			$ug->set('user_id', $user['user_id']);
			$ug->set('game_id', $game_id);
			$ug->set('user_game_status', 1);
			$ug->set('user_game_created_time', $timestamp);
			$ug->set('user_game_updated_time', $timestamp);
			$r = $ug->add();
			if(Ethna::isError($r)) return 'user_game_buy';
			// ユーザゲームID
			$ugid = $ug->getId();
			
			/* =============================================
			// ゲーム配信終了数設定がされていれば、-1
			 ============================================= */
			$g = new Tv_Game($this->backend, 'game_id', $game_id);
			$game_category_id = $g->get('game_category_id');
			if($g->get('game_stock_status')){
				$g->set('game_stock_num', $g->get('game_stock_num') -1 );
				$r = $g->update();
				if(Ethna::isError($r)) return 'user_game_buy';
			}
			
			/* =============================================
			// ポイント追加系処理
			 ============================================= */
			$pm = $this->backend->getManager('Point');
			$point_type_search = $this->config->get('point_type_search');
			$param = array(
				'user_id'	=> $user['user_id'],
				'point'		=> 0 - $g->get('game_point'),
				'point_type'	=> $point_type_search['game'],
				'point_status'	=> 2,// 承認済み
				'user_sub_id'	=> $ugid,
				'point_sub_id'	=> $game_id,
				'point_memo'	=> $g->get('game_name'),
			);
			$pm->addPoint($param);
			
			/* =============================================
			// ログ追加処理
			 ============================================= */
			$s = & $this->backend->getManager('Stats');
			$s->addStats('game',$game_id, $game_category_id);
		}
		
//		// AUの場合ダウンロードページを表示
		// AUの場合swfへリダイレクト
		if($GLOBALS['EMOJIOBJ']->carrier == 'AU'){
			$file_url = $this->config->get('file_url');
			header("Location: {$file_url}game/{$game_file3}");
			
//			$this->ae->add(null, '', I_USER_SOUND_BUY_DONE);
//			return 'user_game_dl';
		}else{
			// ダウンロード開始
//			$user_url = $this->config->get('user_url');
//			$SESSID = $_REQUEST['SESSID'];
			//アクション名の指定
			$action_name = 'user_file_get';
			$c =& $this->backend->getController();
			$form_name = $c->getActionFormName($action_name);
			$backend =& new Ethna_Backend($c);
			$backend->action_form =& new $form_name($c);
			$backend->af =& $backend->action_form;
			$backend->af->setFormVars();
			$backend->af->set('type', 'game');
			$backend->af->set('id', $game_id);
			$r = $backend->perform($action_name);
//			header("Location: f.php?type=game&id={$game_id}&SESSID={$SESSID}");
		}
	}
}

?>
