<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_config_login_edit=true">��ñ�ێ��ގ��������ѹ�</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_config_pass_edit=true">�ʎߎ��܎��Ď��ѹ�</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_config_mail_edit=true">�Ҏ��َ��Ďގڎ��ѹ�</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_config_receive_edit=true">�Ҏ��ټ��������ѹ�</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
