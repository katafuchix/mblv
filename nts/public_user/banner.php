<?php
// バナーリダイレクト用エントリポイント
require_once '../app/Tv_Controller.php';
$type = Tv_Controller::getMobileType();
// PCはアクセス拒否
if($type == 'pc')  exit();
Tv_Controller::main('Tv_Controller', array('user_banner_redirect', 'user_*'));
?>
