<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.game.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $app.ac[$form.game_category_id].name}
		<span style="color:{$form_name_color}">
		���Î��ގ�:
		</span>
		{$app.ac[$form.game_category_id].name}<br />
	{/if}
	{include file="user/pager.tpl"}
	{html_style type="line" color="gray"}
	{foreach from=$app.listview_data item=item name=game key =k}
			{if $item.game_file1}<img src="f.php?file=game/{$item.game_file1}&SESSID={$SESSID}"><br />{/if}
			<a href="?action_user_game_buy=true&game_id={$item.game_id}">{$item.game_name}</a>&nbsp;&nbsp;{$item.game_desc}
		{html_style type="line" color="gray"}
	{/foreach}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_game=true">{$ft.game.name}�Ύߎ����٤�</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
