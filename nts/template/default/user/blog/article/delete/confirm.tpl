<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.blog_article.name`削除確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_blog_article_delete_do"}
		{form_input name="blog_article_id"}
		<span style="color:{$form_name_color};">
		{form_name name="blog_article_title"}
		</span>
		<br />
		&nbsp;{$form.blog_article_title}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="blog_article_body"}
		</span>
		<br />
		&nbsp;{$form.blog_article_body}<br />
		<br />
		{if $form.image_id}
			<a href="?action_user_file_image_view=true&image_id={$form.image_id}&blog_article_id={$form.blog_article_id}">
			<img src="f.php?type=image&id={$form.image_id}&attr=t&SESSID={$SESSID}" alt="画像">
			</a>
		{/if}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		この{$ft.blog_article.name}を削除します｡<br />
		よろしいですか?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
