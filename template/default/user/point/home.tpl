<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.point.name`��Ģ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $config.option.point_exchange}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_point_exchange=true">{$ft.point.name}����</a><br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{/if}
	{$ft.point.name}�Ĺ�:{$app.user.user_point}{$ft.point_unit.name}<br />
	{include file="user/pager.tpl"}
	{html_style type="line" color="gray"}
	{foreach from=$app.listview_data item=item name=ad key =k}
		{if $k%2==0}
			{style align="left" bgcolor="#FFFFFF" fontcolor=$text fontsize="small"}
			[{$config.point_type[$item.point_type].name}]{$item.point_memo}&nbsp;&nbsp;{$item.point}{$ft.point_unit.name}({$config.point_status[$item.point_status].name})</a>
			{/style}
		{else}
			{style align="left" bgcolor=$bgcolor fontcolor=$text fontsize="small"}
			[{$config.point_type[$item.point_type].name}]{$item.point_memo}&nbsp;&nbsp;{$item.point}{$ft.point_unit.name}({$config.point_status[$item.point_status].name})</a>
			{/style}
		{/if}
	{/foreach}
	{include file="user/pager.tpl"}
	
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_ad=true">{$ft.point.name}�Ύߎ����٤�</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
