<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="�ώ�`$ft.game.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{include file="user/pager.tpl"}
	{html_style type="line" color="gray"}
	{foreach from=$app.listview_data item=item name=game key =k}
		<div style="text-align:center;font-size:small;">
			{if $item.game_file1}<img src="f.php?file=game/{$item.game_file1}&SESSID={$SESSID}"><br />{/if}
			{$item.game_name}<br />
			[<a href="f.php?type=game&id={$item.game_id}">�̎ߎڎ�</a>]
		</div>
		{html_style type="line" color="gray"}
	{/foreach}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_game=true">{$ft.game.name}�Ύߎ����٤�</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
