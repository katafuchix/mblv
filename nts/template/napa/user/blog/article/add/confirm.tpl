<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.blog_article.name`��Ƴ�ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
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
		�������Ƥ�{$ft.blog_article.name}����Ƥ��ޤ���<br />
		������Ǥ���?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="submit"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
