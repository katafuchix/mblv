<?php
// 確認用サイト
$GLOBALS['check'] = true;
// 広告リダイレクト用エントリポイント
require_once '../app/Tv_Controller.php';
//$type = Tv_Controller::getMobileType();
// PCはアクセス拒否
//if($type == 'pc')  exit();
Tv_Controller::main('Tv_Controller', array('user_ad_redirect', 'user_*'));
?>
