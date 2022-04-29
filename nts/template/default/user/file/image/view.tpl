<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.image.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	<div align="center" style="text-align:center;font-size:small;">
	<img src="f.php?type=image&id={$form.image_id}&attr=a&SESSID={$SESSID}" alt="{$ft.image.name}"><br />
	</div>
	<br />
	{if $form.blog_article_id}
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_blog_article_view=true&blog_article_id={$form.blog_article_id}">{$ft.blog_article.name}へ戻る</a><br />
	{/if}
	{if $form.community_id}
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_view=true&community_id={$form.community_id}">{$ft.community.name}へ戻る</a><br />
	{/if}
	{if $form.community_article_id}
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_article_view=true&community_article_id={$form.community_article_id}">{$ft.community_article.name}へ戻る</a><br />
	{/if}
	{if $form.community_comment_id}
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_article_view=true&community_article_id={$form.community_comment_id}">{$ft.community_comment.name}へ戻る</a><br />
	{/if}
	{if $form.message_id}
		{if $form.message_type == 'sent'}
			<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_message_view_sent=true&message_id={$form.message_id}">送信{$ft.message.name}へ戻る</a><br />
		{else}
			<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_message_view_received=true&message_id={$form.message_id}">受信{$ft.message.name}へ戻る</a><br />
		{/if}
	{/if}
	{if $form.bbs_id}
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_profile_view=true&user_id={$form.to_user_id}">{$ft.bbs.name}へ戻る</a><br />
	{/if}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
