<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.community.name`���þ�ǧ�Ԥ��ΎՎ����ް���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{* ��ǧ�Ԥ��桼���������� *}
	{if $app.waiting_user_list[0] > 0}
		{foreach from=$app.waiting_user_list[1] item=community}
			{* ���ߥ�˥ƥ����å桼���������� *}
			{if $community.user_list[0] > 0}
				<!--�����ȥ�-->
				{html_style type="title" title=$community.community_title bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
				{foreach from=$community.user_list[1] item=user}
					<a href="?action_user_profile_view=true&user_id={$user.user_id}">{$user.user_nickname}</a>����<br />
					<a href="?action_user_community_accept_do=true&community_member_id={$user.community_member_id}&accept=1">��ǧ</a>
					<a href="?action_user_community_accept_do=true&community_member_id={$user.community_member_id}&accept=0">����</a><br />
					<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
				{/foreach}
			{/if}
		{/foreach}
	{/if}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
