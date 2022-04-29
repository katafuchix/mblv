<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.bbs_name.name`編集内容確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{form action="$script" ethna_action="user_bbs_edit_do"}
		{uniqid}
		{$app_ne.hidden_vars}
		{$app.to_user.user_nickname}さんへの{$ft.bbs_name.name}を編集します｡<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="bbs_body"}:
		</span>
		<br />
		&nbsp;{$form.bbs_body|nl2br}<br />
		<br />
		{if $form.delete_image}
		<span style="color:{$form_name_color};">
		{form_name name="delete_image"}:
		</span>
		<br />
		&nbsp;はい<br />
		{/if}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		この内容で{$ft.bbs_body.name}を編集します｡<br />
		よろしいですか?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="update"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
