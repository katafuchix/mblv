<?php
// ��ǧ�ѥ�����
$GLOBALS['check'] = true;
// ���������쥯���ѥ���ȥ�ݥ����
require_once '../app/Tv_Controller.php';
//$type = Tv_Controller::getMobileType();
// PC�ϥ�����������
//if($type == 'pc')  exit();
Tv_Controller::main('Tv_Controller', array('user_ad_redirect', 'user_*'));
?>
