<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{if $form.twitter_status}
{html_style type="title" title="`$ft.twitter.name`�Խ���ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{else}
{html_style type="title" title="`$ft.blog_article.name`�Խ���ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{/if}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_blog_article_edit_do"}
		{$app_ne.hidden_vars}
		<span style="color:{$form_name_color};">
		{if $form.twitter_status}
			{$ft.twitter.name}���
		{else}
			{form_name name="blog_article_title"}:
		{/if}
		</span>
		<br />
		&nbsp;{$form.blog_article_title}<br />
		<br />
		{if !$form.twitter_status}
			<span style="color:{$form_name_color};">
			{form_name name="blog_article_body"}:
			</span>
			<br />
			&nbsp;{$form.blog_article_body|nl2br}<br />
			<br />
		{/if}
		{if $form.delete_image}
		<span style="color:{$form_name_color};">
		{form_name name="delete_image"}:
		</span>
		<br />
		&nbsp;�Ϥ�<br />
		{/if}
		<span style="color:{$form_name_color};">
		{if $form.twitter_status}
			{$ft.twitter.name}��������:
		{else}
			{form_name name="blog_article_public"}:
		{/if}
		</span>
		<br />
		&nbsp;{$config.blog_article_public[$form.blog_article_public].name}
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		�������Ƥ�{$ft.blog_article.name}�������ޤ���<br />
		������Ǥ���?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="update"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
