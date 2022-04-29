<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<title>{$site_html_title} ｳｨﾊｸｻ妺ﾑ･�･ﾃ･ﾈ</title>
<meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS">
<meta http-equiv="Content-Style-Type" content="text/css">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="description" content="{$site_meta_description}">
<meta name="keywords" content="{$site_meta_keywords}">
<meta name="robots" content="{$site_meta_robots}">
<meta name="author" content="{$site_meta_author}">
{literal}
<script language="JavaScript" type="text/javascript">

var qsParm = new Array();


/* ---------------------------------------------------------------------- *\
  Function    : retrieveWYSIWYG()
  Description : Retrieves the textarea ID for which the image will be inserted into.
\* ---------------------------------------------------------------------- */
function retrieveWYSIWYG() {
  var query = window.location.search.substring(1);
  var parms = query.split('&');
  for (var i=0; i<parms.length; i++) {
    var pos = parms[i].indexOf('=');
    if (pos > 0) {
       var key = parms[i].substring(0,pos);
       var val = parms[i].substring(pos+1);
       qsParm[key] = val;
    }
  }
}


/* ---------------------------------------------------------------------- *\
  Function    : insertEmoji()
  Description : Inserts emoji into the WYSIWYG.
\* ---------------------------------------------------------------------- */
function insertEmoji(emoji) {
  window.opener.insertHTML('<img src="' + emoji + '" border="0">', qsParm['wysiwyg']);
//  window.opener.insertHTML('[x:' + emoji + ']', qsParm['wysiwyg']);
  window.close();
}

retrieveWYSIWYG();
</script>
{/literal}
</head>
<body>
<form name="fm">
	<table border=0>
		{foreach from=$app.emojiList item=i key=k name=emoji}
		{if $smarty.foreach.emoji.iteration == 0 || $smarty.foreach.emoji.iteration % 16 == 0}<tr>{/if}
		<td><a href="#" onclick="insertEmoji('{$config.emoji_url}{$i}')"><img src="{$config.emoji_url}{$i}" border="0"></a></td>
		{if $smarty.foreach.emoji.iteration == 15 }</tr>{/if}
		{/foreach}
	</table>
</form>

</body>
</html>
