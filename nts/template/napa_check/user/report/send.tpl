<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.report.name`ﾒｯｾｰｼﾞを書く" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action=$script ethna_action="user_report_send_confirm"}
		{form_input name="report_fail_user_id"}
		<span style="color:{$form_name_color};">
		{form_name name="report_fail_user_id"}:
		</span>
		<br />
		&nbsp;{$app.report_fail_user.user_nickname}さん<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="report_message"}:
		</span>
		<br />
		{form_input name="report_message"}
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<div align="left" style="text-align:left;font-size:small;">
		<br />
		入力内容を確認するには下のﾎﾞﾀﾝを押してください｡<br />
		<br />
		</div>
		<div  style="text-align:center;font-size:small;">
			{form_input name="confirm"}<br />
		</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
