<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.bbs_name.name`�κ����ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{form action="$script" ethna_action="user_bbs_delete_do"}
		{form_input name="bbs_id"}
		{form_input name="to_user_id"}
		<span style="color:{$form_name_color};">
		{$ft.bbs_body.name}:
		</span>
		<br />
		&nbsp;{$form.bbs_body|nl2br}<br />
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		����{$ft.bbs_name.name}�������ޤ���<br />
		������Ǥ���?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
