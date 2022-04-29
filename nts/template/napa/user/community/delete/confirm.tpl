<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.community.name`削除確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_community_delete_do"}
		{form_input name="community_id"}
		<br />
		<div align="left" style="text-align:left;font-size:small;">
			{$ft.community.name}を削除します｡<br />
			よろしいですか?<br />
			<br />
		</div>
		<div style="text-align:center;font-size:small;">{form_input name="delete"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
