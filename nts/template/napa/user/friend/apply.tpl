<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.friend.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_friend_apply_confirm"}
		{form_input name="to_user_id"}
		<span style="color:{$form_name_color};">
		����:
		</span>
		<br />
		&nbsp;<a href="?action_user_profile_view=true&user_id={$app.to_user.user_id}">{$app.to_user.user_nickname}</a>����<br /><br />
		<span style="color:{$form_name_color};">
		{form_name name="friend_message"}:
		</span>
		<br />
		<div style="text-align:center;font-size:small;">
		{form_input name="friend_message" rows="5"}
		</div>
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		�������Ƥ��ǧ����ˤϲ��ΎΎގ��ݤ򲡤��Ʋ�������<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="confirm"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
