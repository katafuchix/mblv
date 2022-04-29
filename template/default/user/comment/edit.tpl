<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.comment.name`編集" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_comment_edit_confirm"}
		{form_input name='comment_id'}
		{form_input name='comment_body'}<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		入力内容を確認するには下のﾎﾞﾀﾝを押して下さい｡<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="submit" value="編集確認画面へ"}</div>
	{/form}
	
	<br />
	
	<!--タイトル-->
	{html_style type="title" title="`$ft.comment.name`削除" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{form action="$script" ethna_action="user_comment_delete_confirm"}
		{form_input name="comment_id"}
		<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete_confirm"}</div>
	{/form}
	
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
