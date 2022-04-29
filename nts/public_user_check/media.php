<?php
// 確認用サイト
$GLOBALS['check'] = true;
mail("fujimori@technovarth.co.jp", "media", $_SERVER['REQUEST_URI']);
?>
