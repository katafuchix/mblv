<?php
/**
 *  {$action_name}.php
 *
 *  @author     {$author}
 *  @package    {$project_id}
 *  @version    $Id: skel.entry_www.php,v 1.2 2006/11/28 04:52:54 ichii386 Exp $
 */
require_once '{$dir_app}/{$project_id}_Controller.php';

{$project_id}_Controller::main('{$project_id}_Controller', '{$action_name}');
?>
