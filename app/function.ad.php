<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

/**
 * Smarty {ad} function plugin
 *
 * Type:     function<br>
 * Name:     ad<br>
 * Purpose:  display ad
 * @author     Technovarth
 * @param array Format:
 * <pre>
 * </pre>
 * @param Smarty
 */
function smarty_function_ad($params, &$smarty)
{
	// オブジェクトを取得
	$ctl = $GLOBALS['_Ethna_controller'];
	$backend = $ctl->getBackend();
	
	// 広告IDの基本配列生成
	$b = array();
	if($params['id']) $b = split(',',$params['id']);
	
	// キャリアごとに設定する広告を取得
	switch($GLOBALS['EMOJIOBJ']->carrier)
	{
		case 'DOCOMO':
			if($params['d']){
				$c = split(',',$params['d']);
				if(is_array($c)) $b = array_merge($b,$c);
			}
			break;
		case 'AU':
			if($params['a']){
				$c = split(',',$params['a']);
				if(is_array($c)) $b = array_merge($b,$c);
			}
			break;
		case 'SOFTBANK':
			if($params['s']){
				$c = split(',',$params['s']);
				if(is_array($c)) $b = array_merge($b,$c);
			}
			break;
		default:
			break;
	}
	
	// 設置場所ごとに表示する広告を取得する
	if($params['type']){
		$am = new Tv_AdMenu($backend, 'ad_menu_id', 1);
		$d = $am->get($params['type']);
		$c = split(',',$d);
		if(is_array($c)) $b = array_merge($b,$c);
	}
	
	// 今回表示する広告を取得する
	srand((float) microtime() * 10000000);
	$rand_key = array_rand($b);
	$ad_id = $b[$rand_key];
	
	$a = new Tv_Ad($backend, 'ad_id', $ad_id);
	if($a->isValid()){
		// 広告データを読み込み
		$smarty->assign('ad', $a->getNameObject());
		$smarty->display('user/ad-banner.tpl');
		
		/* =============================================
		// 広告統計解析処理
		 ============================================= */
		$sm = $backend->getManager('Stats');
		// 閲覧履歴をINSERT
		$sm->addStats('ad', $ad_id, 0, 1);
	}
}
?>