<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.report.name`���Ƴ�ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{form action="$script" ethna_action="user_report_send_do"}
		{$app_ne.hidden_vars}
		<span style="color:{$form_name_color};">
		{form_name name="report_fail_user_id"}:
		</span>
		<br />
		&nbsp;{$app.report_fail_user.user_nickname}����<br /><br />

		<span style="color:{$form_name_color};">
		{form_name name="report_message"}:
		</span>
		<br />
		&nbsp;{$form.report_message|nl2br}
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		<div align="left" style="text-align:left;font-size:small;">
			�������Ƥ�{$ft.report.name}���ޤ���<br />
			������Ǥ���?<br />
			<br />
		</div>
		<div style="text-align:center;font-size:small;">{form_input name="send"}<br />{form_input name="back"}</div>
		{uniqid}
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
