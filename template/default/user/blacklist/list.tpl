{include file="user/header.tpl"}

{html_style type="title" title="`$app.user_nickname`さんの`$ft.blacklist.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small;">
{include file="user/errors.tpl"}

<br />
{include file="user/pager.tpl"}
{foreach from=$app.listview_data item=item key=k name=bl_list}
{* foreach from=$app.bl_list item=item name=bl_list *}
{if $smarty.foreach.bl_list.first}
現在の{$app.user_nickname}さんの{$ft.blacklist.name}を表示します｡<br /><br />
{/if}
&nbsp;<a href="?action_user_profile_view=true&user_id={$item.black_list_deny_user_id}">{$item.user_nickname}</a>さん
&nbsp;<a href="?action_user_blacklist_delete_confirm=true&black_list_deny_user_id={$item.black_list_deny_user_id}">解除</a><br />
{foreachelse}
現在{$app.user_nickname}さんの{$ft.blacklist.name}はありません｡<br /><br />
{/foreach}
{include file="user/pager.tpl"}
</div>

{include file="user/footer.tpl"}
