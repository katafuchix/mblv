<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.bbs_name.name`の削除確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
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
		この{$ft.bbs_name.name}を削除します｡<br />
		よろしいですか?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
