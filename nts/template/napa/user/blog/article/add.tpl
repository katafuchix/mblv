<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.blog_article.name`���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}

	<div style="text-align:right"><a href="?action_user_blog_article_search=true"><span style="color:#808000; font-size:x-small">�ߤ�ʤ������ώ�����</span></a>[x:0050]</div>


	<!--<span style="color:#808000; font-size:x-small">�����Ǥ�{$ft.blog_article.name}�������Ǥ��ޤ���</span><br />
	<br />-->
	{form action="$script" ethna_action="user_blog_article_add_confirm"}
		<span style="color:{$form_name_color};">
		{form_name name="blog_article_title"}:
		</span>
		<br />
		{form_input name="blog_article_title"}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="blog_article_body"}:
		</span>
		<br />
		<div style="text-align:center;font-size:small;">
		{form_input name="blog_article_body" rows="5"}
		</div>
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="blog_article_public"}:
		</span>
		<br />
		{form_input name="blog_article_public"}<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		�������Ƥ��ǧ����ˤϲ��ΎΎގ��ݤ򲡤��Ʋ�������<br />
		<br />
		<!--�ե��������div align�����-->
		<div style="text-align:center;font-size:small;">{form_input name="confirm"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
