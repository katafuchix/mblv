<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.bbs_name.name`�񤭹��ߴ�λ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.bbs.name}�ؤν񤭹��ߤ���λ���ޤ�����<br />
		<a href="{html_style type='mailto' account='bbs_image' hash=$app.bbs_hash}">{$ft.image_add.name}</a><br />
	<span style="font-size:xx-small;">��ź�ղ����ο侩�������ޤ�1MB�ʲ��Ǥ���</span><br />
		{ad type="bbs_add_done"}<br />
	</div>
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_bbs_list=true&user_id={$form.to_user_id}">�񤭹����{$ft.bbs.name}�����</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_profile_view=true&user_id={$form.to_user_id}">{$ft.profile.name}�����</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
