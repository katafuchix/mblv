<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$sns_name`について" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{$sns_name}は世の中に笑顔を振りまくSNSです。
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
