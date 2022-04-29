<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.report.name`完了" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}


<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
	{$ft.report.name}を完了しました｡
	</div>
	<br />
	<br />
</div>


<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
