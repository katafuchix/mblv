<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$app.user_nickname`さんの`$ft.blog_article.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{include file="user/pager.tpl"}
	{foreach from=$app.listview_data item=item key=k}
		<span style="color:{$time_color}">{$item.blog_article_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}</span>
		{if $form.user_id == $session.user.user_id}
			[<a href="?action_user_blog_article_edit=true&blog_article_id={$item.blog_article_id}">編集</a>]
		{/if}
		<br />
		<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}</a>({$item.blog_article_comment_num})
		{if $form.user_id == $session.user.user_id && $item.blog_article_notice > 0}[x:0199]{/if}
		<br />
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_profile_view=true&user_id={$form.user_id}">{$app.user_nickname}さんの{$ft.profile.name}</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
