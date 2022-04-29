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
	// ���֥������Ȥ����
	$ctl = $GLOBALS['_Ethna_controller'];
	$backend = $ctl->getBackend();
	
	// ����ID�δ�����������
	$b = array();
	if($params['id']) $b = split(',',$params['id']);
	
	// ����ꥢ���Ȥ����ꤹ�빭������
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
	
	// ���־�ꤴ�Ȥ�ɽ�����빭����������
	if($params['type']){
		$am = new Tv_AdMenu($backend, 'ad_menu_id', 1);
		$d = $am->get($params['type']);
		$c = split(',',$d);
		if(is_array($c)) $b = array_merge($b,$c);
	}
	
	// ����ɽ�����빭����������
	srand((float) microtime() * 10000000);
	$rand_key = array_rand($b);
	$ad_id = $b[$rand_key];
	
	$a = new Tv_Ad($backend, 'ad_id', $ad_id);
	if($a->isValid()){
		// ����ǡ������ɤ߹���
		$smarty->assign('ad', $a->getNameObject());
		$smarty->display('user/ad-banner.tpl');
		
		/* =============================================
		// �������ײ��Ͻ���
		 ============================================= */
		$sm = $backend->getManager('Stats');
		// ���������INSERT
		$sm->addStats('ad', $ad_id, 0, 1);
	}
}
?>