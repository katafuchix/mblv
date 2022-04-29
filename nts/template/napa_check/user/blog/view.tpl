<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$app.blog_title`さんの日記" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $config.option.avatar}
	<!--アバター画像開始-->
	<img src="?action_user_file_avatar_preview=true&attr=t&user_id={$app.user.user_id}&SESSID={$SESSID}" alt="画像" style="float:left;" />
	<!--アバター画像終了-->
	{else}
	<!--マイ画像開始-->
	<img src="f.php?type=image&id={$app.user.image_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
	<!--マイ画像終了-->
	{/if}
	<span>
	[x:0138]<a href="?action_user_profile_view=true&user_id={$form.user_id}">{$ft.profile.name}</a><br />
	{if $session.user.user_id == $form.user_id}
	[x:0074]<a href="?action_user_blog_article_add=true">{$ft.blog_article.name}を書く</a><br />
	{/if}
	</span>
	{html_style type="br"}
	
	<!--タイトル-->
	{html_style type="title" title="新着`$ft.blog_article.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{foreach from=$app.article_list item=item key=k}
		<span style="color:{$time_color}">{$item.blog_article_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}</span>
		{if $form.user_id == $session.user.user_id}
			[<a href="?action_user_blog_article_edit=true&blog_article_id={$item.blog_article_id}">編集</a>]
		{/if}
		<br />
		<a href="?action_user_blog_article_view=true&blog_article_id={$item.blog_article_id}">{$item.blog_article_title}</a>({$item.blog_article_comment_num})<br />
		{html_style type="line" color="gray"}
	{/foreach}
	<div align="right" style="text-align:right;font-size:small;">
		&nbsp;→<a href="?action_user_blog_article_list=true&user_id={$form.user_id}">日記一覧</a>[x:0082]
	</div>
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
