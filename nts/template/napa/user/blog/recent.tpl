<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="ͧã�κǿ�����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{foreach from=$app.blog_article_list item=item name=blog}
		{style align="left" bgcolor="#FFFFFF" fontcolor=$text fontsize="small"}
			{$item.blog_article_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
			<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}</a><br />by {$item.user_nickname}
		{/style}
	{/foreach}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
