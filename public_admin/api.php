<?php
$GLOBALS['type'] = 'admin';
require_once '../app/Tv_Controller.php';

// 種別に応じて起動するAPIを制御
switch($REQUEST['type'])
{
	// ユーザ追加
	case 'user_add':
		$api_type='admin_api_user_add_do';
		break;
	// ユーザ更新
	case 'user_update':
		$api_type='admin_api_user_edit_do';
		break;
	// ユーザ削除
	case 'user_delete':
		$api_type='admin_api_user_delete_do';
		break;
	// ポイント追加
	case 'point_add':
		$api_type='admin_api_point_add_do';
		break;
	default:
		exit;
		break;
}
Tv_Controller::main('Tv_Controller', array($api_type, '*'));
?>