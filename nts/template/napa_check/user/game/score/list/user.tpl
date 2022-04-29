<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$app.user.user_nickname`さんの`$app.game.game_name`のランキング" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{include file="user/pager.tpl"}
	{foreach from=$app.listview_data item=item key=k}
		<span style="color:{$time_color}">{$item.rank}位:</span>{$item.user_game_score_score}点<br />
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
