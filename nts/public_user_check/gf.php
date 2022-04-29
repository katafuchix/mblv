<?php
// 確認用サイト
$GLOBALS['check'] = true;
$GLOBALS['type'] = 'user';
require_once '../app/Tv_Controller.php';

if($_SERVER['REMOTE_ADDR'] != '210.172.116.113' && preg_match("/^DoCoMo/",$_SERVER["HTTP_USER_AGENT"])){
	header("Content-Type: application/xhtml+xml; charset=Shift_JIS");
}

Tv_Controller::main('Tv_Controller', array('user_game_finish', 'user_*'));
?>
