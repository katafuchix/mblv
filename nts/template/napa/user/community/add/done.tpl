<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.community.name`������λ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.community.name}�κ�������λ���ޤ�����<br />
		<a href="{html_style type='mailto' account='community_image' hash=$app.community_hash}">{$ft.image_add.name}</a><br />
		{ad type="community_add_done"}<br />
	</div>
	<br />
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_view=true&community_id={$app.community_id}">��������{$ft.community.name}�����</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
