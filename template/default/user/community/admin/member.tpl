<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$app.community.community_title`�ΎҎݎʎގ�����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	������:{$app.owner_nickname}����
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{include file="user/pager.tpl"}
	{foreach from=$app.listview_data item=item key=k}
		{if $item.user_status == 2}
			<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>����<br />
			<a href="?action_user_community_admin_member_remove_confirm=true&community_id={$form.community_id}&community_member_id={$item.community_member_id}">�Ҏݎʎގ����鳰��</a> |
			<a href="?action_user_community_admin_power_give_confirm=true&community_id={$form.community_id}&community_member_id={$item.community_member_id}&new_admin_user_id={$item.user_id}">���������Ϥ�</a>
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		{/if}
	{/foreach}
	{include file="user/pager.tpl"}
	<a href="?action_user_community_view=true&community_id={$app.community.community_id}">{$ft.community.name}�����</a>
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
