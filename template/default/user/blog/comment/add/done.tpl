<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.blog_comment.name`投稿完了" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.blog_comment.name}の投稿が完了しました。<br />
		<a href="{html_style type='mailto' account='blog_comment_image' hash=$app.blog_comment_hash}">{$ft.image_add.name}</a><br />
		{ad type="blog_comment_add_done"}<br />
	</div>
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_blog_article_view=true&blog_article_id={$form.blog_article_id}">投稿した{$ft.blog_article.name}へ</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
