<?php
// napatown.jp
if(dirname(__FILE__) == '/var/www/napatown.jp/htdocs/snsv/bin'){
	require_once '/var/www/napatown.jp/htdocs/snsv/app/Tv_Controller.php';
}
// napa
elseif(dirname(__FILE__) == '/home/htdocs/napatownsns/bin'){
	require_once '/home/htdocs/napatownsns/app/Tv_Controller.php';
}
// デフォルト
else{
	require_once '/home/htdocs/snsv/app/Tv_Controller.php';
}
Tv_Controller::main_CLI('Tv_Controller', 'mail_receive');
?>