<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.sound.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $app.ac[$form.sound_category_id].name}
		<span style="color:{$form_name_color}">
		���Î��ގ�:
		</span>
		{$app.ac[$form.sound_category_id].name}<br />
	{/if}
	{include file="user/pager.tpl"}
	{html_style type="line" color="gray"}
	{foreach from=$app.listview_data item=item name=sound key =k}
			{if $item.sound_file1}<img src="f.php?file=sound/{$item.sound_file1}&SESSID={$SESSID}"><br />{/if}
			<a href="?action_user_sound_buy=true&sound_id={$item.sound_id}">{$item.sound_name}</a>&nbsp;&nbsp;{$item.sound_desc}
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_sound=true">{$ft.sound.name}�Ύߎ����٤�</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
