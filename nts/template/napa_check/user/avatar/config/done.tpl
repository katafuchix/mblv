<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.avatar.name`設定完了" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.avatar.name}の設定が完了しました。<br />
	</div>
	<br />
	<div align="center" style="text-align:center;font-size:small;">
	<a href="fp.php?code=guide_point">
	HOW TO<br />
	{$ft.point.name}の貯め方
	</a>
	</div>
	<br />
	<div align="center" style="text-align:center;font-size:small;">
	<a href="?action_user_home=true">ﾏｲﾍﾟｰｼﾞへ</a>
	</div>
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
