<?php
$GLOBALS['type'] = 'admin';
require_once '../app/Tv_Controller.php';

// ��ʂɉ����ċN������API�𐧌�
switch($REQUEST['type'])
{
	// ���[�U�ǉ�
	case 'user_add':
		$api_type='admin_api_user_add_do';
		break;
	// ���[�U�X�V
	case 'user_update':
		$api_type='admin_api_user_edit_do';
		break;
	// ���[�U�폜
	case 'user_delete':
		$api_type='admin_api_user_delete_do';
		break;
	// �|�C���g�ǉ�
	case 'point_add':
		$api_type='admin_api_point_add_do';
		break;
	default:
		exit;
		break;
}
Tv_Controller::main('Tv_Controller', array($api_type, '*'));
?>