<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.friend.name`����γ�ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_friend_delete_do"}
		{form_input name="to_user_id" value=$app.to_user.user_id}
		<span style="color:{$form_name_color};">
		���:
		</span>
		<br />
		&nbsp;<a href="?action_user_profile_view=true&user_id={$app.to_user.user_id}">{$app.to_user.user_nickname}</a>����<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="friend_message"}:
		</span>
		<br />
		&nbsp;{$form.friend_message|nl2br}<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		{$ft.friend.name}�������ޤ���<br />������Ǥ���?<br />
		<br />
		</div>
		<div style="text-align:center;font-size:small;">{form_input name="delete"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
