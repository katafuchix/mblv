<?php
/**
 *  {$action_name}.php
 *
 *  @author     {$author}
 *  @package    Tv
 *  @version    $Id: skel.entry_cli.php,v 1.2 2006/11/28 04:52:54 ichii386 Exp $
 */
chdir(dirname(__FILE__));
require_once '{$dir_app}/Tv_Controller.php';

ini_set('max_execution_time', 0);

Tv_Controller::main_CLI('Tv_Controller', '{$action_name}');
?>
