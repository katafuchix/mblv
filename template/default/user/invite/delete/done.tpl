{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.invite_name.name`削除完了" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.invite_name.name}の削除が完了しました。
		{*ad type="invite_delete_done"*}<br />
	</div>
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="index.php?action_user_invite=true">{$ft.invite_name.name}ﾄｯﾌﾟへ</a>
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
