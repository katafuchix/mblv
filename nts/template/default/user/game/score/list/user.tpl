<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$app.user.user_nickname`�����`$app.game.game_name`�Υ�󥭥�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{include file="user/pager.tpl"}
	{foreach from=$app.listview_data item=item key=k}
		<span style="color:{$time_color}">{$item.rank}��:</span>{$item.user_game_score_score}��<br />
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
