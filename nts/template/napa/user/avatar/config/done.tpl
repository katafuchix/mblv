<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.avatar.name`���괰λ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{$ft.avatar.name}�����꤬��λ���ޤ�����<br />
	</div>
	<br />
	<div align="center" style="text-align:center;font-size:small;">
	<a href="fp.php?code=guide_point">
	HOW TO<br />
	{$ft.point.name}��������
	</a>
	</div>
	<br />
	<div align="center" style="text-align:center;font-size:small;">
	<a href="?action_user_home=true">�ώ��͎ߎ����ޤ�</a>
	</div>
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
