<?php
/**
 * Preview.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザアバタープレビューアクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserFileAvatarPreview extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		'attr' => array(
			'type'  => VAR_TYPE_STRING,
		),
		'place' => array(
			'type'  => VAR_TYPE_STRING,
		),
	);
}

/**
 * ユーザアバタープレビューアクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserFileAvatarPreview extends Tv_ActionUser //Only
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) exit;
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
		$um = $this->backend->getManager('Util');
		// ユーザIDを取得する
		$user_id = $this->af->get('user_id');
		// パラメタにユーザIDがある場合はそちらを優先する
		if(!$user_id){
			// セッションからユーザ情報を取得する
			$user = $this->session->get('user');
			$user_id = $user['user_id'];
			// セッションからアバター情報を取得する
			$cart_avatar = $this->session->get('cart_avatar');
		}
		// ユーザ情報を取得する
		$u =& new Tv_User($this->backend, 'user_id', $user_id);
		// アバター初期設定履歴
		$avatar_config_first = $u->get('avatar_config_first');
		// デフォルトアバター情報を取得する
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar as a,avatar_category as ac',
			'sql_where'		=> 'a.avatar_status = 1 AND a.default_avatar = 1 AND a.avatar_sex_type = ? AND a.avatar_category_id = ac.avatar_category_id',
			'sql_values'	=> array($u->get('user_sex')),
			'sql_order'		=> 'a.avatar_image1_z DESC',
		);
		$da_list = $um->dataQuery($param);
//print_r($da_list);exit;
		
		// ユーザアバター情報を取得
		$param = array(
			'sql_select'	=> '*',
			'sql_from'		=> 'avatar as a,user_avatar as ua,avatar_category as ac',
			'sql_where'		=> 'ua.user_id = ? AND ua.user_avatar_status <> 0 AND ua.user_avatar_wear = 1 AND ua.avatar_id = a.avatar_id AND a.avatar_status = 1 AND a.avatar_category_id = ac.avatar_category_id',
			'sql_values'	=> array($user_id),
			'sql_order'		=> 'a.avatar_image1_z DESC',
		);
		$ua_list = $um->dataQuery($param);
//print_r($ua_list);
		
		if(is_array($cart_avatar) && in_array($this->af->get('place'), array('cart','config_confirm'))){
			// 今回試着するアバター情報を取得
			foreach($cart_avatar as $v){
				if($v['avatar_id'] && $v['avatar_wear']){
					// アバター情報、アバターカテゴリ情報を取得
					$param = array(
						'sql_select'	=> '*',
						'sql_from'		=> 'avatar as a,avatar_category as ac',
						'sql_where'		=> 'a.avatar_id = ? AND a.avatar_status = 1 AND a.avatar_category_id = ac.avatar_category_id',
						'sql_values'	=> array($v['avatar_id']),
						'sql_order'		=> 'a.avatar_image1_z DESC',
					);
					$r = $um->dataQuery($param);
					if(count($r) > 0){
						// [ルール7]試着時にアバターシステムカテゴリ「1.顔」「2.体」「3.髪」「4.服トップス」「5.服ボトムス」「6.服ワンピース」「8.履物」「13.背景」「20. オールインワン」のものを着衣した場合、
						// ユーザアバターにある、左記アバターシステムカテゴリのアバターを脱衣する
						if(in_array($r[0]['avatar_system_category_id'], array(1,2,3,4,5,6,8,13,20))){
							foreach($ua_list as $j => $l){
								// 該当があればすべて脱衣状態に更新
								if($l['avatar_system_category_id'] == $r[0]['avatar_system_category_id']){
									// 脱衣フラグ
									$hit = false;
									// 「4.服トップス」の場合は特殊で、同じZ軸のもののみを脱衣状態とする
									if($l['avatar_system_category_id'] == 4){
										if(
											// 1枚目のZ座標で比較
											(
												$l['avatar_image1_desc'] && 
												(
													// 比較対象の1枚目か2枚目のZ座標に合致するか調べる
													$l['avatar_image1_z'] == $r[0]['avatar_image1_z']
													||
													$l['avatar_image1_z'] == $r[0]['avatar_image2_z']
												)
											)
											||
											// 2枚目のZ座標で比較
											(
												$l['avatar_image2_desc'] && 
												(
													// 比較対象の1枚目か2枚目のZ座標に合致するか調べる
													$l['avatar_image2_z'] == $r[0]['avatar_image1_z']
													||
													$l['avatar_image2_z'] == $r[0]['avatar_image2_z']
												)
											)
										){
											$hit = true;
										}
									}
									// その他のアバターシステムカテゴリの場合
									else{
										$hit = true;
									}
									
									// 該当があれば脱衣状態とする
									if($hit){
										unset($ua_list[$j]);
									}
								}
							}
						}
						// ユーザ配列に試着するアバター情報をマージ
						$ua_list[] = $r[0];
					}
				}
			}
		}
		
		// メインアバターリストを生成
		$avatar_list = $ua_list;
		
//p($avatar_list,true);
		
		// 競合解決を行う
		// [ルール1]同一システムカテゴリにデフォルトアバターがあるにもかかわらず、ユーザアバターが存在する場合はデフォルトアバターを破棄する
		// [ルール2]同一Z軸上にデフォルトアバターがあるにもかかわらず、ユーザアバターが存在する場合はデフォルトアバターを破棄する
		// 以下すべてのデフォルトアバターに対して処理を行う
		foreach($da_list as $k => $v){
			$hit = false;
			foreach($ua_list as $i => $j){
				// [ルール1]デフォルトアバターの破棄
				if($j['avatar_system_category_id'] == $v['avatar_system_category_id']) $hit = true;
				// [ルール2]デフォルトアバターの破棄
				if($j['avatar_image1_z'] != 0){
					if(
						$j['avatar_image1_z'] == $v['avatar_image1_z']
						||
						$j['avatar_image1_z'] == $v['avatar_image2_z']
					){
						$hit = true;
					}
				}
				if($j['avatar_image2_z'] != 0){
					if(
						$j['avatar_image2_z'] == $v['avatar_image1_z']
						||
						$j['avatar_image2_z'] == $v['avatar_image2_z']
					){
						$hit = true;
					}
				}
			}
			if(!$hit) $avatar_list[] = $v;
		}
		
//p($avatar_list,true);
		
		// [ルール3]システムカテゴリ「4.服トップス」「5.服ボトムス」にユーザアバターが無く、システムカテゴリ「7.服インナー（下着）」に何かしらアバターがある場合「4.服トップス」「5.服ボトムス」のデフォルトアバターを破棄。
		// [ルール4]システムカテゴリ「6.服ワンピース」にユーザアバターがある場合、「4.服トップス」「5.服ボトムス」のすべてのアバターを破棄。
		// [ルール6]システムカテゴリ「20.オールインワン」にユーザアバターがある場合、「4.服トップス」「5.服ボトムス」「6.服ワンピース」「8.履物」のすべてのアバターを破棄。このルールは[ルール3][ルール4]の上位権限をもつ。
		// 選択条件
		$select3 = array(4,5);
		$_select3 = false;
		$select4 = array(6);
		$_select4 = false;
		$select6 = array(20);
		$_select6 = false;
		// 変換条件
		$replace3 = array(7);
		$_replace3 = false;
		$replace4 = array(4,5);
		$replace6 = array(4,5,6,8);
		// すべてのユーザアバターに対して処理を行う
		foreach($ua_list as $k => $v){
			// 選択条件に合致するかどうか調べる
			if(in_array($v['avatar_system_category_id'], $select3) && !$v['default_avatar']) $_select3 = true;
			if(in_array($v['avatar_system_category_id'], $select4) && !$v['default_avatar']) $_select4 = true;
			if(in_array($v['avatar_system_category_id'], $select6) && !$v['default_avatar']) $_select6 = true;
			// 変換条件に合致するかどうか調べる
			if($v['avatar_system_category_id'] == $replace3) $_replace3 = true;
		}
		// [6]選択条件が満たされていれば以下処理を実行
		if($_select6){
			foreach($avatar_list as $k => $v){
				// 該当のシステムカテゴリにあるアバターデータを消去
				if(in_array($v['avatar_system_category_id'], $replace6)) unset($avatar_list[$k]);
			}
		}
		// 上位権限のルールが履行されない場合以下を実行
		else{
			// [3]選択条件、変換条件ともに満たされていれば以下処理を実行
			// システムカテゴリ「4.服トップス」「5.服ボトムス」にユーザアバターが無く
			// システムカテゴリ「7.服インナー（下着）」に何かしらアバターがある
			if(!$_select3 && $_replace3){
				foreach($avatar_list as $k => $v){
					// 該当のシステムカテゴリにあるアバターデータを消去
					if(in_array($v['avatar_system_category_id'], $replace3)) unset($avatar_list[$k]);
				}
			}
			// [4]選択条件が満たされていれば以下処理を実行
			// システムカテゴリ「6.服ワンピース」にユーザアバターがある
			if($_select4){
				foreach($avatar_list as $k => $v){
					// 該当のシステムカテゴリにあるアバターデータを消去
					if(in_array($v['avatar_system_category_id'], $replace4)) unset($avatar_list[$k]);
				}
			}
		}
//p($avatar_list,true);
		
		// レイヤー配列を生成する
		// [ルール5]ユーザがアバター初期設定を終えている、または初期設定確認ページの場合、システムカテゴリ「19.初期未設定」のすべてのアバターを破棄。
		$layer_list = array();
		foreach($avatar_list as $k => $v){
			// [5]
			if(
				($avatar_config_first || $this->af->get('place') == 'config_confirm')
				&&
				$v['avatar_system_category_id'] == 19
			){
				continue;
			}
			if($v['avatar_image1_desc']){
				$data[0][] = $v['avatar_image1_z'];
				$data[1][] = $v['avatar_image1_desc'];
			}
			if($v['avatar_image2_desc']){
				$data[0][] = $v['avatar_image2_z'];
				$data[1][] = $v['avatar_image2_desc'];
			}
		}
//print_r($data);exit;
		
		// レイヤーの並び替えをする
//		array_multisort($z, SORT_DESC, SORT_NUMERIC, $image, SORT_DESC, SORT_NUMERIC, $data);
//		array_multisort($z, SORT_DESC, SORT_NUMERIC, $data);
//		array_multisort($z, SORT_DESC, $image, SORT_DESC, $data);
//		array_multisort($z, SORT_NUMERIC, SORT_DESC, $image, SORT_DESC, SORT_NUMERIC, $data);
//		array_multisort($z, SORT_NUMERIC, SORT_ASC, $data);
//		array_multisort($data[0], SORT_NUMERIC, SORT_DESC, $data[1], SORT_NUMERIC, SORT_DESC);
		if(count($data[0]) > 0){
			array_multisort($data[0], SORT_NUMERIC, SORT_ASC, $data[1], SORT_NUMERIC, SORT_ASC);
		}
//print_r($data);exit;
		// アバターのプレビューを生成
		$avatar =& $this->backend->getManager('AvatarGenerator');
		$avatar->set_background("#ffffff");
		// サイズの決定
		$attr = $this->af->get('attr');
		if(!$this->af->get('attr')) $attr = 's';
		$avatar->set_width($this->config->get("avatar_{$attr}_width"));
		$avatar->set_height($this->config->get("avatar_{$attr}_height"));
		// 切り出しサイズの決定
		if($attr != 's'){
			$avatar->set_base(
				$this->config->get("avatar_{$attr}_base_x"),
				$this->config->get("avatar_{$attr}_base_y"),
				$this->config->get("avatar_{$attr}_base_w"),
				$this->config->get("avatar_{$attr}_base_h")
			);
		}
		// アバターファイル名の取得
		if(count($data[1]) > 0){
			while (list ($k, $v) = each ($data[1])){
				$avatar->add_layer($this->config->get('file_path') . 'avatar/' . $v);
			}
		}
		// 出力
		$avatar->build();
		exit;
	}
}

?>
