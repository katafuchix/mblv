<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.blog_article.name`�����ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
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
			<img src="f.php?type=image&id={$form.image_id}&attr=t&SESSID={$SESSID}" alt="����">
			</a>
		{/if}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		����{$ft.blog_article.name}�������ޤ���<br />
		������Ǥ���?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
