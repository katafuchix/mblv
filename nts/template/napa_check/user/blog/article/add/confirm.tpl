<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.blog_article.name`投稿確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_blog_article_add_do"}
		{uniqid}
		{$app_ne.hidden_vars}
		<span style="color:{$form_name_color};">
		{form_name name="blog_article_title"}:
		</span>
		<br />
		&nbsp;{$form.blog_article_title}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="blog_article_body"}:
		</span>
		<br />
		&nbsp;{$form.blog_article_body|nl2br}
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="blog_article_public"}:
		</span>
		<br />
		&nbsp;{$config.blog_article_public[$form.blog_article_public].name}
		<br />
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		この内容で{$ft.blog_article.name}を投稿します｡<br />
		よろしいですか?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="submit"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
