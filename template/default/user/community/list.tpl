<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$app.user_nickname`����λ���`$ft.community.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
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
	{if count($app.communityList) == 0}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_add=true">{$ft.community.name}�ο�������</a>
	{/if}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
