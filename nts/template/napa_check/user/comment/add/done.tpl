<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.comment.name`投稿完了" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.comment.name}の投稿が完了しました。<br />
		{ad type="comment_add_done"}<br />
	</div>
	<br />
{if $form.comment_type == 2}
	<a href="?action_user_game_buy=true">{$ft.game.name}へ戻る</a>
{/if}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
