<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.friend.name`解除の確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_friend_delete_do"}
		{form_input name="to_user_id" value=$app.to_user.user_id}
		<span style="color:{$form_name_color};">
		相手:
		</span>
		<br />
		&nbsp;<a href="?action_user_profile_view=true&user_id={$app.to_user.user_id}">{$app.to_user.user_nickname}</a>さん<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="friend_message"}:
		</span>
		<br />
		&nbsp;{$form.friend_message|nl2br}<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		{$ft.friend.name}を解除します｡<br />よろしいですか?<br />
		<br />
		</div>
		<div style="text-align:center;font-size:small;">{form_input name="delete"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
