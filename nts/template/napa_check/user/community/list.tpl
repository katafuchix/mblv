<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$app.user_nickname`����λ���`$ft.community.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if ($config.option.guest && $session.user.user_guest_status==1) || !$config.option.guest}
		<!--�����ȥ桼���Τ�ɽ��-->
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_add=true">{$ft.community.name}�ο�������</a>
	{/if}
	
	{html_style type="line" color="gray"}
	{foreach from=$app.communityList item=item}
		{if $item.community_status == 1}
			{if $item.image_id}
			<img src="f.php?type=image&id={$item.image_id}&attr=i&SESSID={$SESSID}" style="float:left;" alt="����">
			{/if}
			&nbsp;<a href="?action_user_community_view=true&community_id={$item.community_id}">{$item.community_title}</a><br />
			{html_style type="line" color="gray"}
		{/if}
	{/foreach}
	{if count($app.communityList) == 0 && ($config.option.guest && $session.user.user_guest_status==1) || !$config.option.guest}
		<!--�����ȥ桼���Τ�ɽ��-->
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_add=true">{$ft.community.name}�ο�������</a>
	{/if}
</div>
<!--����ƥ�Ľ�λ-->
<div style="text-align:right;">
<span style="font-size:xx-small">
<a href="?action_user_community_search=true">{$ft.community.name}����</a>[x:0771]</span></div>
<!--�եå���-->
{include file="user/footer.tpl"}
