<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="����`$ft.message.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	<span style="color:{$form_name_color};">
	{$ft.to_user_nickname.name}:
	</span>
	<br />
	&nbsp;<a href="?action_user_profile_view=true&user_id={$app.to_user.user_id}">{$app.to_user.user_nickname}</a>����<br />
	<br />
	<span style="color:{$form_name_color};">
	{$ft.message_title.name}:
	</span>
	<br />
	&nbsp;{$app.message.message_title}<br />
	<br />
	<span style="color:{$form_name_color};">
	{$ft.message_body.name}:
	</span>
	<br />
	&nbsp;{$app.message.message_body|nl2br}<br />
	<br />
	{if $app.message.image_id}
		<div style="text-align:center;font-size:small;">
			<a href="?action_user_file_image_view=true&image_id={$app.message.image_id}&message_id={$form.message_id}&message_type=sent"><img src="f.php?type=image&id={$app.message.image_id}&attr=t&SESSID={$SESSID}" alt="����"></a>
		</div>
	{/if}
	<br />
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_message_list_sent=true">{$ft.message.name}{$ft.message_sent_box.name}�����</a><br />
	<br />
	
	{html_style type="title" title="����`$ft.message.name`���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<br />
	����{$ft.message.name}����������ϲ��ΎΎގ��ݤ򲡤��Ƥ���������<br />
	<br />
	{form action="$script" ethna_action="user_message_delete_sent_confirm"}
		{form_input name="message_id"}
		<div style="text-align:center;font-size:small;">
			{form_input name="confirm"}<br />
		</div>
	{/form}
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_message_list_sent=true">{$ft.message.name}{$ft.message_sent_box.name}�����</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
