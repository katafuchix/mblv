<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$app.user_nickname`�����`$ft.friend_name.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{html_style type="line" color="gray"}
	{foreach from=$app.friend_list[1] item=item}
		{if $config.option.avatar}
			<img src="f.php?type=avatar&user_id={$item.to_user_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;" />
		{else}
			{if $item.image_id}
			<img src="f.php?type=image&id={$item.image_id}&attr=i&SESSID={$SESSID}" style="float:left;" alt="����">
			{/if}
		{/if}
		&nbsp;<a href="?action_user_profile_view=true&user_id={$item.to_user_id}">{$item.to_user_nickname}</a>����<br />
		{html_style type="line" color="gray"}
	{/foreach}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
