<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.community.name`�κǿ�`$ft.community_article.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.communityArticleList item=item name=community}
		<span style="color:{$timecolor}">{$item.community_article_comment_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}</span><br />
		<a href="?action_user_community_article_view=true&community_article_id={$item.community_article_id}">{$item.community_article_title}</a>��{$item.community_title}��
		{html_style type="line" color="gray"}
	{/foreach}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
