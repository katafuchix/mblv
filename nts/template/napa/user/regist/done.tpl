<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="�����Ͽ��λ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{*include file="user/errors.tpl"*}
	<div align="center" style="text-align:center;font-size:small;">
		{$sns_name}�ؤ褦����<br />
	</div>
	<br />
	{$sns_name}�Ǥ�{$ft.point.name}�Ȥ����̲ߤ�ȤäƎ��ގ��ѡ��夦�����Îގ��Ҏ��١����ʎގ����ʤɤ�������Ύ��ݎÎݎ¤����Ѥ��뤳�Ȥ��Ǥ��ޤ���<br />
	��������{$ft.point.name}�򽸤�Ƴڤ���Ǥ��������͡�<br />
	<br />
	{*
	<!--���Х������ץ���󤬤�����-->
	{if $config.option.avatar}
	�ޤ���{$ft.avatar.name}�����ꤷ�Ʋ�������<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
	<a href="?action_user_avatar_config_first=true">{$ft.avatar.name}����</a>
	</div>
	{/if}
	*}
	<div align="center" style="text-align:center;font-size:small;">
	<a href="fp.php?code=guide_point">
	HOW TO<br />
	{$ft.point.name}��������
	</a>
	</div>
	<div align="center" style="text-align:center;font-size:small;">
	<a href="?action_user_home=true">�ώ��͎ߎ����ޤ�</a>
	</div>
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl" no_navi="true" no_footer="true"}
