<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="����Բ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
<br />
<br />
	<!--���顼ɽ������-->
	<div align="left" style="text-align:left;font-size:small;">
		{include file="user/errors.tpl"}
	</div>
	<!--���顼ɽ����λ-->
	<br />
	<br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_view=true&community_id={$form.community_id}">{$ft.community.name}�����</a>
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
