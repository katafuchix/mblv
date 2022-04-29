<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="すべての`$ft.community_article.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->

<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{include file="user/pager.tpl"}
	{foreach from=$app.listview_data item=item key=k}
		<span style="color:{$time_color}">{$item.blog_article_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}</span>
		<a href="?action_user_community_article_view=true&community_article_id={$item.community_article_id}">{$item.community_article_title}({$item.community_article_comment_num})</a><br />
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_view=true&community_id={$form.community_id}">{$ft.community.name}へ戻る</a>
</div>

<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
