<?php
$GLOBALS['type'] = 'user';
require_once '../app/Tv_Controller.php';

if($_SERVER['REMOTE_ADDR'] != '210.172.116.113' && preg_match("/^DoCoMo/",$_SERVER["HTTP_USER_AGENT"])){
	header("Content-Type: application/xhtml+xml; charset=Shift_JIS");
}

//if technovarth
if($_SERVER['REMOTE_ADDR'] == '210.172.116.113') $start = microtime(true);

// URLハンドラで使うマッピングルールを指定
//$_SERVER['URL_HANDLER'] = 'user_index';

//main
Tv_Controller::main('Tv_Controller', array('user_index', 'user_*'));

//if technovarth
if($_SERVER['REMOTE_ADDR'] == '210.172.116.113') echo "SpanTime : " . (microtime(true) - $start);
?>