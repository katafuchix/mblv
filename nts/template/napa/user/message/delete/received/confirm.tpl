<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.message.name`�����ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{$ft.message_title.name}:{$app.message.message_title}<br />
	<span style="color:{$form_name_color};">
	{$ft.from_user_nickname.name}:
	</span>
	<br />
	&nbsp;<a href="?action_user_profile_view=true&user_id={$app.from_user.user_id}">{$app.from_user.user_nickname}</a>����<br />
	<span style="color:{$form_name_color};">
	{$ft.message_body.name}:
	</span>
	<br />
	&nbsp;{$app.message.message_body|nl2br}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<br />
	<div align="left" style="text-align:left;font-size:small;">
		����{$ft.message.name}�������ޤ���<br />
		������Ǥ���?<br />
		<br />
	</div>
	{form action="$script" ethna_action="user_message_delete_received_do"}
		{form_input name="message_id"}
		<div style="text-align:center;font-size:small;">{form_input name="submit"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
