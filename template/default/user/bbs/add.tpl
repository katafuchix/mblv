<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.bbs_name.name`���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_bbs_add_confirm"}
		{form_input name="to_user_id" value="`$app.to_user.user_id`"}
		<a href="?action_user_profile_view=true&user_id={$app.to_user.user_id}">{$app.to_user.user_nickname}</a>�����{$ft.bbs.name}�˽񤭹���{$ft.bbs_name.name}�����Ϥ��Ƥ���������<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="bbs_body"}:
		</span>
		<br />
		<div style="text-align:center;font-size:small;">
		{form_input name="bbs_body" rows=5}
		</div>
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		�������Ƥ��ǧ����ˤϲ��ΎΎގ��ݤ򲡤��Ʋ�������<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="confirm"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
