<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="�Ύߎ��ݎĎ���IDǧ�ڴ�λ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	�Ύߎ��ݎĎ���ID��ǧ�ڤ���λ���ޤ�����
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<span style="color:{$menucolor}">��</span><a href="?action_user_login_do=true&easy_login=true" utn="true">��ñ�ێ��ގ���</a><br />
	<span style="color:{$menucolor}">��</span><a href="?action_user_login=true">�ێ��ގ���</a><br />
	<span style="color:{$menucolor}">��</span>�ʎߎ��܎��Ďޤ�˺��Ƥ��ޤä�����<a href="?action_user_remind=true">������</a>
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
