<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.report.name`内容確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{form action="$script" ethna_action="user_report_send_do"}
		{$app_ne.hidden_vars}
		<span style="color:{$form_name_color};">
		{form_name name="report_fail_user_id"}:
		</span>
		<br />
		&nbsp;{$app.report_fail_user.user_nickname}さん<br /><br />

		<span style="color:{$form_name_color};">
		{form_name name="report_message"}:
		</span>
		<br />
		&nbsp;{$form.report_message|nl2br}
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		<div align="left" style="text-align:left;font-size:small;">
			この内容で{$ft.report.name}します｡<br />
			よろしいですか?<br />
			<br />
		</div>
		<div style="text-align:center;font-size:small;">{form_input name="send"}<br />{form_input name="back"}</div>
		{uniqid}
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
