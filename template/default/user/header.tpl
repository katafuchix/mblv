<html>
<head>
<title>{if $title}{$title}{else}{$site_html_title}{/if}</title>
<meta http-equiv="Content-Type" content="text/html; charset={$io_encoding}" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="Thu, 01 Dec 1994 16:00:00 GMT" />
<meta name="description" content="{$site_meta_description}" />
<meta name="keywords" content="{$site_meta_keywords}" />
<meta name="robots" content="{$site_meta_robots}" />
<meta name="author" content="{$site_meta_author}" />
{if $carrier == 'PC'}
<link rel="stylesheet" type="text/css" href="css/mobile.css" media="screen" />
{/if}
</head>
{html_style type="body" bgcolor=$bgcolor text=$text link=$link vlink=$vlink alink=$alink}

<!--コンテナ開始-->
<div id="container">
<a name="top"></a>
