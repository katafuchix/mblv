<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.community_comment.name`編集完了" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.community_comment.name}編集が完了しました。<br />
		{ad type="community_comment_edit_done"}<br />
	</div>
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_article_view=true&community_article_id={$form.community_article_id}">{$ft.community_comment.name}編集した{$ft.community_article.name}へ</a>
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
