<?php
/**
 *  {$action_name}.php
 *
 *  @author     {$author}
 *  @package    {$project_id}
 *  @version    $Id: skel.entry_cli.php,v 1.2 2006/11/28 04:52:54 ichii386 Exp $
 */
chdir(dirname(__FILE__));
require_once '{$dir_app}/{$project_id}_Controller.php';

ini_set('max_execution_time', 0);

{$project_id}_Controller::main_CLI('{$project_id}_Controller', '{$action_name}');
?>
