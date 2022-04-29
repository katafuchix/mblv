<?php
//require_once '../app/Tv_Controller.php';
//Tv_Controller::main('Tv_Controller', 'admin_file_get');
require_once '../app/Tv_Controller.php';
$action = 'admin_file_get';
if($_REQUEST['type'] == 'avatar') $action = 'user_file_avatar_preview';
Tv_Controller::main('Tv_Controller', array($action, 'admin_*'));
?>