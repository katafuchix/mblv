<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.friend_name.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	<br />
	{if count($app.listview_data) == 0}
		�������˹��פ���{$ft.friend_name.name}�ϸ��Ĥ���ޤ���Ǥ�����<br />
		<br />
	{else}
		�������˹��פ���{$ft.friend_name.name}��{$app.listview_total}�͸��Ĥ���ޤ�����
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		{include file="user/pager.tpl"}
	{/if}
	{foreach from=$app.listview_data item=item name=user}
		{if $item != false}
			&nbsp;&nbsp;<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>����<br />
		{/if}
	{/foreach}
	{include file="user/pager.tpl"}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
