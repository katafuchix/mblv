{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.invite_name.name`�����λ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.invite_name.name}�κ������λ���ޤ�����
		{*ad type="invite_delete_done"*}<br />
	</div>
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="index.php?action_user_invite=true">{$ft.invite_name.name}�Ď��̎ߤ�</a>
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}