<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="�����Ͽ��λ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<div align="center" style="text-align:center;font-size:small;">
		{$site_name}�ؤ褦����<br />
	</div>
	<br />
	{$site_name}�Ǥ�{$ft.point.name}�Ȥ����̲ߤ�ȤäƎ������ˎߎݎ��ޤ䎹�ގ��ѡ��夦�����Îގ��Ҏ��١����ʎގ����ʤɤ�������Ύ��ݎÎݎ¤����Ѥ��뤳�Ȥ��Ǥ��ޤ���<br />
	��������{$ft.point.name}�򽸤�Ƴڤ���Ǥ��������͡�<br />
	<br />
	{if $session.cart_hash}
		<!--�㤤ʪ��������˾��ʤ�������-->
		���㤤ʪ�������<a href="?action_user_ec_cart=true">������</a><br />
	{/if}
	{if $config.option.avatar}
		<!--���Х������ץ���󤬤�����-->
		�ޤ���{$ft.avatar.name}�����ꤷ�Ʋ�������<br />
		<br />
		<div align="center" style="text-align:center;font-size:small;"><a href="?action_user_avatar_config_first=true">{$ft.avatar.name}����</a></div>
	{/if}
	<div align="center" style="text-align:center;font-size:small;"><a href="?action_user_home=true">�ώ��͎ߎ����ޤ�</a></div>
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
