{include file="user/header.tpl"}

{html_style type="title" title="`$app.user_nickname`�����`$ft.blacklist.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small;">
{include file="user/errors.tpl"}

<br />

{foreach from=$app.bl_list[1] item=item name=bl_list}
{if $smarty.foreach.bl_list.first}
���ߤ�{$app.user_nickname}�����{$ft.blacklist.name}��ɽ�����ޤ���<br /><br />
{/if}
&nbsp;<a href="?action_user_profile_view=true&user_id={$item.black_list_deny_user_id}">{$item.deny_user_nickname}</a>����
&nbsp;<a href="?action_user_blacklist_delete_confirm=true&black_list_deny_user_id={$item.black_list_deny_user_id}">���</a><br />
{foreachelse}
����{$app.user_nickname}�����{$ft.blacklist.name}�Ϥ���ޤ���<br /><br />
{/foreach}
</div>

{include file="user/footer.tpl"}
