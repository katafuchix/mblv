<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="友達の最新日記" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{foreach from=$app.blog_article_list item=item name=blog}
		{style align="left" bgcolor="#FFFFFF" fontcolor=$text fontsize="small"}
			{$item.blog_article_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
			<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}</a><br />by {$item.user_nickname}
		{/style}
	{/foreach}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
