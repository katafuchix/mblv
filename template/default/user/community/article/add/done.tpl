<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.community_article.name`投稿完了" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.community_article.name}の投稿が完了しました。<br />
		<a href="{html_style type='mailto' account='community_article_image' hash=$app.community_article_hash}">{$ft.image_add.name}</a>
		{ad type="community_article_add_done"}<br />
	</div>
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_article_view=true&community_article_id={$form.community_article_id}">投稿した{$ft.community_article.name}へ戻る</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_view=true&community_id={$form.community_id}">{$ft.community.name}へ戻る</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
