<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.point.name`通帳" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $config.option.point_exchange}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_point_exchange=true">{$ft.point.name}換金</a><br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{/if}
	{$ft.point.name}残高:{$app.user.user_point}{$ft.point_unit.name}<br />
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
	
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_ad=true">{$ft.point.name}ﾎﾟｰﾀﾙへ</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
