<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.message.name`���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action=$script ethna_action="user_message_send_confirm"}
		{form_input name="to_user_id"}
		{form_input name='reply_message_id'}
		<span style="color:{$form_name_color};">
		{form_name name="to_user_id"}:
		</span>
		<br />
		&nbsp;<a href="?action_user_profile_view=true&user_id={$app.to_user.user_id}">{$app.to_user.user_nickname}</a>����<br /><br />
		<span style="color:{$form_name_color};">
		{form_name name="message_title"}:
		</span>
		<br />
		{form_input name="message_title"}<br /><br />
		<span style="color:{$form_name_color};">
		{form_name name="message_body"}:
		</span>
		<br />
		<div style="text-align:center;font-size:small;">
		{form_input name="message_body" rows=5}
		</div>
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		�������Ƥ��ǧ����ˤϲ��ΎΎގ��ݤ򲡤��Ƥ���������<br />
		<br />
		<div style="text-align:center;font-size:small;">
			{form_input name="confirm"}<br />
		</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
