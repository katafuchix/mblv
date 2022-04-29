<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<title>{$sns_html_title} 絵文字パレット</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="description" content="{$sns_meta_description}">
<meta name="keywords" content="{$sns_meta_keywords}">
<meta name="robots" content="{$sns_meta_robots}">
<meta name="author" content="{$sns_meta_author}">
<script src="common/common.js" language="JavaScript"></script>
</head>
<body>
<form name="fm">
	<table border=0>
		{foreach from=$app.emojiList item=i key=k name=emoji}
		{if $smarty.foreach.emoji.iteration == 0 || $smarty.foreach.emoji.iteration % 16 == 0}<tr>{/if}
		<td><a href="Javascript:JsEmoji('{$k}');"><img src="{$config.emoji_url}{$i}" border="0"></a></td>
		{if $smarty.foreach.emoji.iteration == 15 }</tr>{/if}
		{/foreach}
	</table>
	<span style="font-size:small">↓選択された絵文字が表示されます。</span><br />
	<input type="text" name="emoji" size="10">
</form>

</body>
</html>
