<?php
$GLOBALS['type'] = 'admin';
require_once '../app/Tv_Controller.php';
Tv_Controller::main('Tv_Controller', array('admin_index', '*'));
?>