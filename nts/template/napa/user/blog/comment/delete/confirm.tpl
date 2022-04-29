<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.blog_comment.name`削除確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_blog_comment_delete_do"}
		{form_input name="blog_comment_id"}
		<span style="color:{$form_name_color};">
		ｺﾒﾝﾄ:
		</span>
		<br />
		&nbsp;{$form.blog_comment_body|nl2br}<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		<div align="left" style="text-align:left;font-size:small;">
			この{$ft.blog_comment.name}を削除します｡<br />
			よろしいですか?<br />
			<br />
		</div>
		<div  style="text-align:center;font-size:small;">{form_input name="submit"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
