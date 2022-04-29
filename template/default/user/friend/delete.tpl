<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.friend.name`解除の確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<span style="color:{$form_name_color};">
	相手のお名前:
	</span>
	<br />
	&nbsp;{$app.to_user.user_nickname}さん<br /><br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<br />
	<div align="left" style="text-align:left;font-size:small;">
		{$ft.friend.name}を解除します｡<br />
		よろしいですか?<br />
		<br />
	</div>
	{form action="$script" ethna_action="user_friend_delete_do"}
		<div  style="text-align:center;font-size:small;">
	{form_input name="delete"}<br />{form_input name="back"}</div>
		{form_input name="to_user_id" type="hidden" value=$app.to_user.user_id}
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
