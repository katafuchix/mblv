<!--�إå���-->
{include file="user/header.tpl"}

{html_style type="title" title="���Ҏݎ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--�����ȳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.listview_data item=item key=k}
	{if $k%2==0}
		{style align="left" bgcolor="#FFFFFF" fontcolor=$text fontsize="small"}
			��Ƽ�:<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>����<br />
			{$item.comment_body|nl2br}<br />
			{if $item.user_id == $session.user.user_id}
				[<a href="?action_user_comment_edit=true&comment_id={$item.comment_id}">�Խ�</a> |
				<a href="?action_user_comment_delete_confirm=true&comment_id={$item.comment_id}">���</a>]
			{/if}
		{/style}
	{else}
		{style align="left" bgcolor="#FFDD99" fontcolor=$text fontsize="small"}
			��Ƽ�:<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>����<br />
			{$item.comment_body|nl2br}<br />
			{if $item.user_id == $session.user.user_id}
				[<a href="?action_user_comment_edit=true&comment_id={$item.comment_id}">�Խ�</a> |
				<a href="?action_user_comment_delete_confirm=true&comment_id={$item.comment_id}">���</a>]
			{/if}
		{/style}
	{/if}
	{/foreach}
</div>
<!--�����Ƚ�λ-->
	{include file="user/pager.tpl"}
<br />
<!--�եå���-->
{include file="user/footer.tpl"}
