<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{*html_style type="title" title="�ώ�`$ft.sound.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor*}
{html_style type="title" title="���ގ��ݎێ��Ď�����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{include file="user/pager.tpl"}
	{html_style type="line" color="gray"}
	{foreach from=$app.listview_data item=item name=sound key =k}
			<span style="color:{$timecolor};">
			{$item.user_sound_created_time|jp_date_format:"%m/%d (%a) %H:%M"}
			</span>
			{$item.sound_name}
			[<a href="f.php?type=sound&id={$item.sound_id}">�̎ߎڎ�</a>]
		{html_style type="line" color="gray"}
	{/foreach}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_sound=true">{$ft.sound.name}�Ύߎ����٤�</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
