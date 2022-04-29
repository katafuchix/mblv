<?php
/**
 * View.php
 * 
 * @author Technovarth
 * @package SNSV
 */
 
/**
 * ユーザアバター閲覧アクションフォーム
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Form_UserFileAvatarView extends Tv_ActionForm
{
	var $use_validator_plugin = true;
	var $form = array(
		'avatar_id' => array(
			'type'  => VAR_TYPE_INT,
		),
		'attr' => array(
			'type'  => VAR_TYPE_INT,
		),
		'width' => array(
			'type'  => VAR_TYPE_INT,
		),
		'height' => array(
			'type'  => VAR_TYPE_INT,
		),
	);
}

/**
 * ユーザアバター閲覧アクション
 * 
 * @author Technovarth
 * @access public
 * @package SNSV
 */
class Tv_Action_UserFileAvatarView extends Tv_ActionUser //Only
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
		// アバターのプレビューを生成
		$avatar =& $this->backend->getManager('AvatarGenerator');
		
		// アバター情報を取得
		$a =& new Tv_Avatar($this->backend, 'avatar_id', $this->af->get('avatar_id'));
		// アバター台座の決定
		$avatar_stand_id = $a->get('avatar_stand_id');
		$avatar_category_id = $a->get('avatar_category_id');
		// アバター情報のアバター台座情報がなければアバターカテゴリのアバター台座情報を取得する
		if(!$avatar_stand_id && $avatar_category_id){
			$ac = new Tv_AvatarCategory($this->backend, 'avatar_category_id', $avatar_category_id);
			if($ac->isValid()){
				$avatar_stand_id = $ac->get('avatar_stand_id');
			}
		}
		// アバター台座IDがあればアバター台座情報を取得する
		$hit = false;
		if($avatar_stand_id){
			$as = new Tv_AvatarStand($this->backend, 'avatar_stand_id', $avatar_stand_id);
			if($as->isValid()){
				// 背景レイヤーの追加
				$hit = true;
				// 背景レイヤーはなくてもよい
				if($as->get('avatar_stand_image')){
					$item[] = $as->get('avatar_stand_image');
				}
				// 切り出しサイズの決定
				$avatar->set_base(
					$as->get('avatar_stand_base_x'),
					$as->get('avatar_stand_base_y'),
					$as->get('avatar_stand_base_w'),
					$as->get('avatar_stand_base_h')
				);
				// レイヤーの並び替えをする
				if($a->get('avatar_image1_desc')){
					$item[] = $a->get('avatar_image1_desc');
					if($a->get('avatar_image2_desc')){
						// 画像2が画像1よりも低いレイヤーの場合
						if($a->get('avatar_image1_z') > $a->get('avatar_image2_z')){
							$item[2] = $item[1];// レイヤー1
							$item[1] = $item[0];// 台座
							$item[0] = $a->get('avatar_image2_desc');// レイヤー2
						}
						// 画像2が画像1よりも高いレイヤーの場合
						else{
							$item[0] = $item[1];// レイヤー1
							$item[1] = $item[0];// 台座
							$item[2] = $a->get('avatar_image2_desc');// レイヤー2
						}
					}
				}
			}
		}
		// アバター台座情報がない場合は画像を合成して出力する
		if(!$hit){
			// レイヤーの並び替えをする
			if($a->get('avatar_image1')){
				$item[0] = $a->get('avatar_image1');
				if($a->get('avatar_image2')){
					// 画像2が画像1よりも低いレイヤーの場合
					if($a->get('avatar_image1_z') > $a->get('avatar_image2_z')){
						$item[1] = $item[0];
						$item[0] = $a->get('avatar_image2');
					}else{
						$item[1] = $a->get('avatar_image2');
					}
				}
			}
		}
		
		// 背景設定
		$avatar->set_background("#ffffff");
		// サイズの決定
		if($this->af->get('width')) $avatar->set_width($this->af->get('width'));
		if($this->af->get('height')) $avatar->set_height($this->af->get('height'));
		// レイヤーの追加
		foreach($item as $k => $v){
			if($v) $avatar->add_layer($this->config->get('file_path') . 'avatar/' . $v);
		}
		// 出力
		$avatar->build();
		exit;
	}
}

?>
