<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.invite_name.name`削除確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_invite_delete_do"}
		{form_input name="invite_id"}
		<span style="color:{$form_name_color};">
		{$ft.to_user_mailaddress.name}
		</span>
		<br />
		&nbsp;{$form.to_user_mailaddress}<br />
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		この{$ft.invite_name.name}を削除します｡<br />
		よろしいですか?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
