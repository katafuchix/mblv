<?php
/**
 * Do.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザアバター変更実行アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserAvatarChangeDo extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'user_avatar_id' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_INT,
			'required'	=> true,
			'name'		=> 'ﾕｰｻﾞｱﾊﾞﾀｰID',
		),
		'cmd' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_STRING,
//			'required'	=> true,
			'name'		=> 'ｺﾏﾝﾄﾞ',
		),
		'return' => array(
			'form_type' 	=> FORM_TYPE_HIDDEN,
			'type'		=> VAR_TYPE_STRING,
//			'required'	=> true,
			'name'		=> '戻りﾍﾟｰｼﾞ',
		),
	);
}

/**
 * ユーザアバター変更実行アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserAvatarChangeDo extends Tv_ActionUserOnly
{
	/**
	 * アクション実行前の処理(フォーム値チェック等)を行う
	 * 
	 * @access public
	 * @return string  遷移名(nullなら正常終了, falseなら処理終了)
	 */
	function prepare()
	{
		if($this->af->validate() > 0) return 'user_avatar_home';
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
		// ユーザアバターステータス更新
		$timestamp = date('Y-m-d H:i:s');
		$ua =& new Tv_UserAvatar($this->backend, 'user_avatar_id', $this->af->get('user_avatar_id'));
		$ua->set('user_avatar_updated_time', $timestamp);
		// 着衣ステータスを切り替える
		if($ua->get('user_avatar_wear')==1 && $this->af->get('cmd') == 'off'){
			// 脱ぐ
			$ua->set('user_avatar_wear', 0);
		}elseif($ua->get('user_avatar_wear')==0 && $this->af->get('cmd') == 'on'){
			// 着る
			$ua->set('user_avatar_wear', 1);
			// もし、アバターシステムカテゴリが、「1.顔」「2.体」「3.髪」「4.服トップス」「5.服ボトムス」「6.服ワンピース」「8.履物」「13.背景」「20. オールインワン」のものを着衣した場合、
			// ユーザアバターにある、左記アバターシステムカテゴリのアバターを脱衣する
			$a = new Tv_Avatar($this->backend, 'avatar_id', $ua->get('avatar_id'));
			if($a->isValid()){
				$ac = new Tv_AvatarCategory($this->backend, 'avatar_category_id', $a->get('avatar_category_id'));
				// アバターシステムカテゴリに該当を検索
				if($ac->isValid()){
					if(in_array($ac->get('avatar_system_category_id'), array(1,2,3,4,5,6,8,13,20))){
						$um = $this->backend->getManager('Util');
						$sess = $this->session->get('user');
						$user_id = $sess['user_id'];
						// 着衣中の、該当アバターシステムカテゴリ内のユーザアバター取得
						$sqlWhere = 'ua.user_id = ? AND ua.user_avatar_status <> 0 AND ua.user_avatar_wear = 1 AND ua.avatar_id = a.avatar_id AND a.avatar_status = 1 AND a.avatar_category_id = ac.avatar_category_id';
						$sqlWhere .= '  AND ac.avatar_system_category_id = ?';
						$param = array(
							'sql_select'	=> '*',
							'sql_from'		=> 'avatar as a,user_avatar as ua,avatar_category as ac',
							'sql_where'		=> $sqlWhere,
							'sql_values'	=> array($user_id, $ac->get('avatar_system_category_id')),
							'sql_order'		=> 'a.avatar_image1_z DESC',
						);
						$ua_list = $um->dataQuery($param);
						// 該当ユーザアバターが存在する場合
						if(count($ua_list) > 0){
							// 該当があればすべて脱衣状態に更新
							foreach($ua_list as $v){
								// 脱衣フラグ
								$hit = false;
								// 「4.服トップス」の場合は特殊で、同じZ軸のもののみを脱衣状態とする
								if($ac->get('avatar_system_category_id') == 4){
									if(
										// 1枚目のZ座標で比較
										(
											$a->get('avatar_image1_desc') && 
											(
												// 比較対象の1枚目か2枚目のZ座標に合致するか調べる
												$a->get('avatar_image1_z') == $v['avatar_image1_z']
												||
												$a->get('avatar_image1_z') == $v['avatar_image2_z']
											)
										)
										||
										// 2枚目のZ座標で比較
										(
											$a->get('avatar_image2_desc') && 
											(
												// 比較対象の1枚目か2枚目のZ座標に合致するか調べる
												$a->get('avatar_image2_z') == $v['avatar_image1_z']
												||
												$a->get('avatar_image2_z') == $v['avatar_image2_z']
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
									$_ua = new Tv_UserAvatar($this->backend, 'user_avatar_id', $v['user_avatar_id']);
									$_ua->set('user_avatar_wear', 0);
									$_ua->set('user_avatar_updated_time', $timestamp);
									$_ua->update();
									// エラー制御は行わない
								}
							}
						}
					}
				}
			}
		}else{
			// 例外のコマンド
			return 'user_avatar_home';
		}
		$r = $ua->update();
		if(Ethna::isError($r)) return 'user_avatar_home';
		
		$this->ae->add(null, '', I_USER_AVATAR_CHANGE_DONE);
		// 戻りページが決まっている場合
		if($this->af->get('return')){
			return 'user_avatar_' . $this->af->get('return');
		}else{
			return 'user_avatar_home';
		}
	}
}

?>
