<?php
require_once '../app/Tv_Controller.php';
$action = 'user_file_get';
if($_REQUEST['type'] == 'avatar') $action = 'user_file_avatar_preview';
Tv_Controller::main('Tv_Controller', array($action, 'user_*'));
?>