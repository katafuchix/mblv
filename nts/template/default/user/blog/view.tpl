<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$app.blog_title`���������" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $config.option.avatar}
	<!--���Х�����������-->
	<img src="?action_user_file_avatar_preview=true&attr=t&user_id={$app.user.user_id}&SESSID={$SESSID}" alt="����" style="float:left;" />
	<!--���Х���������λ-->
	{else}
	<!--�ޥ���������-->
	<img src="f.php?type=image&id={$app.user.image_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" />
	<!--�ޥ�������λ-->
	{/if}
	<span>
	[x:0138]<a href="?action_user_profile_view=true&user_id={$form.user_id}">{$ft.profile.name}</a><br />
	{if $session.user.user_id == $form.user_id}
	[x:0074]<a href="?action_user_blog_article_add=true">{$ft.blog_article.name}���</a><br />
	{/if}
	</span>
	{html_style type="br"}
	
	<!--�����ȥ�-->
	{html_style type="title" title="����`$ft.blog_article.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{foreach from=$app.article_list item=item key=k}
		<span style="color:{$time_color}">{$item.blog_article_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}</span>
		{if $form.user_id == $session.user.user_id}
			[<a href="?action_user_blog_article_edit=true&blog_article_id={$item.blog_article_id}">�Խ�</a>]
		{/if}
		<br />
		<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}</a>({$item.blog_article_comment_num})<br />
		{html_style type="line" color="gray"}
	{/foreach}
	<div align="right" style="text-align:right;font-size:small;">
		&nbsp;��<a href="?action_user_blog_article_list=true&user_id={$form.user_id}">��������</a>[x:0082]
	</div>
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
