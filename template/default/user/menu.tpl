<!--�إå���-->
{include file="user/header.tpl"}

<!--���顼ɽ������-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
</div>
<!--���顼ɽ����λ-->

<!--�����ȥ�-->
<a name="support" name="support"></a>
{html_style type="title" title="���Ύߎ��ĎҎƎ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small;">
	<div style="font-size:small;text-align:center;">
		{if $config.option.point}[x:0167]<a href="?action_user_ad=true">{$ft.point.name}Get</a>��/{/if}
		[x:0031]<a href="?action_user_invite=true">����</a>��/
		[x:0165]<a href="?action_user_config=true">����</a><br />
		[x:0142]<a href="?action_user_blacklist_list=true">{$ft.blacklist.name}����</a>��/
		[x:0190]<a href="?action_user_logout_do=true">�ێ��ގ�����</a>��/
		[x:0186]<a href="?action_user_resign_confirm=true">���</a>
	</div>
</div>

<!--�եå���-->
{include file="user/footer.tpl"}