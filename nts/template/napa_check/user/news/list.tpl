<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.news.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{include file="user/pager.tpl"}
	{foreach from=$app.listview_data item=news key=k}
		{if $news.news_time}<span style="color:{$time_color}">{$news.news_time}</span><br />{/if}
		<a href="?action_user_news_view=true&news_id={$news.news_id}">{$news.news_title}</a>
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
	<!--hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};"-->
	<!--span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="{$app.return_href}">{$app.return_name}へ戻る</a-->
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
