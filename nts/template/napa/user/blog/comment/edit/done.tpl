<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.blog_comment.name`�Խ���λ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.blog_comment.name}���Խ�����λ���ޤ�����<br />
		{ad type="blog_comment_edit_done"}<br />
	</div>
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_blog_article_view=true&blog_article_id={$form.blog_article_id}">{$ft.blog_comment.name}�Խ�����{$ft.blog_article.name}��</a>
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
