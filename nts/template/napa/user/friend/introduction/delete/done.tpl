<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.friend_introduction.name`�����λ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.friend.introduction.name}�������λ���ޤ�����<br />
	</div>
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_profile_view=true&user_id={$form.to_user_id}">{$ft.profile.name}�����</a>
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
