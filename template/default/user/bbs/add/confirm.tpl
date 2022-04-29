<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.bbs_name.name`投稿確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{form action="$script" ethna_action="user_bbs_add_do"}
		{uniqid}
		{$app_ne.hidden_vars}
		<span style="color:{$form_name_color};">
		{form_name name="bbs_body"}:
		</span>
		<br />
		&nbsp;{$form.bbs_body|nl2br}<br />
		<br />
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		この内容で{$ft.bbs_body.name}を書き込みます｡<br />
		よろしいですか?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="send"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
