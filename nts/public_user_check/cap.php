<?php
// 確認用サイト
$GLOBALS['check'] = true;
$GLOBALS['type'] = "captcha";
require_once '../app/Tv_Controller.php';
Tv_Controller::main('Tv_Controller', array('user_cap', 'user_*'));
?>