<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.point.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	<a href="?action_user_point_exchange_account=true&point_exchange_type=1">[x:0199]<span style="color:{$headcolor}">����˸�</span></a><br />
	<a href="?action_user_point_exchange_account=true&point_exchange_type=2">[x:0199]<span style="color:{$headcolor}">�ŻҎώȎ��˸�</span></a><br />
	<a href="?action_user_point_exchange_account=true&point_exchange_type=3">[x:0199]<span style="color:{$headcolor}">¾�����ĎΎߎ��ݎĤ˸�</span></a><br />
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_ad=true">{$ft.ad.name}�Ύߎ����٤�</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_point_home=true">{$ft.point.name}��Ģ��</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
