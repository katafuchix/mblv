<!--�إå���-->
{include file="user/header.tpl"}

<!--����������-->
<div align="center" style="text-align:center;font-size:small;">
	<img src="img/logo_user.gif" align="center" style="text-align:center"><br />
</div>
<!--��������λ-->

<!--���顼��å�����ɽ������-->
<div align="left" style="text-align:left;font-size:small;background:#ffffff;">
	{include file="user/errors.tpl"}
</div>
<!--���顼��å�����ɽ����λ-->

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{html_style type="title" title="����˥塼��" bgcolor="#00AA2B" fontcolor=$title_fontcolor}
	<div style="background-color:#EAFFEF;">
	{if count($app.listview_data)}
		{foreach from=$app.listview_data item=news}
			[x:0112]{$news.news_time}&nbsp;<a href="?action_user_news_view=true&news_id={$news.news_id}">{$news.news_title}</a><br />
		{/foreach}
	{/if}
	</div>
	<div align="right" style="text-align:right;">
		[x:0074]<a href="?action_user_news_list=true">��äȸ���</a>
	</div>
	
	{html_style type="title" title="������" bgcolor="#00A5D5" fontcolor=$title_fontcolor}
	<div align="left" style="background-color:#EAFAFF;">
		{html_style type="img_left" src="img/t7.jpg"}
		<span style="margin-top:5px;">
			100�����ȥ�ʾ�Υ������Ƴ�����Ӥˤ�ȤŤ��������ۿ������Ȥι��ۤ���ǽ�Ǥ���
		</span>
		{html_style type="br"}
	</div>
	<div align="right" style="text-align:right;">
		[x:0074]<a href="?action_user_game=true">��äȸ���</a>
	</div>
	
	{html_style type="title" title="����åԥ�" bgcolor="#D56A00" fontcolor=$title_fontcolor}
	<div style="background-color:#FFF4EA;">
		{html_style type="img_left" src="img/t4.jpg}
		<span style="margin-top:5px;">
			����ҡ������졼�٥�ʤɤ�Ƴ�����Ӥˤ�����ʪ�ΤΥ٥��ȥץ饯�ƥ����˴�Ť�EC�⡼��ι��ۤ���ǽ�Ǥ���
		</span>
		{html_style type="br"}
	</div>
	<div align="right" style="text-align:right;">
		[x:0074]<a href="?action_user_ec=true">��äȸ���</a>
	</div>
	
	{html_style type="title" title="���Х���" bgcolor="#BF0030" fontcolor=$title_fontcolor}
	<div style="background-color:#FFEAEF;">
		{html_style type="img_left" src="img/t3.jpg"}
		<span style="margin-top:5px;">
			�ȳ��ȥåץ�٥���Ǻ��ʼ���Ƴ�����Ӥˤ�ȤŤ����Х����ۿ������Ȥι��ۤ���ǽ�Ǥ���
		</span>
		{html_style type="br"}
	</div>
	<div align="right" style="text-align:right;">
		[x:0074]<a href="?action_user_avatar=true">��äȸ���</a>
	</div>
	
	{html_style type="title" title="�ǥ��᡼��" bgcolor="#D5009F" fontcolor=$title_fontcolor}
	<div style="background-color:#FFEAFA;">
		{html_style type="img_left" src="img/t6.jpg"}
		<span style="margin-top:5px;">
			�ȳ�NO.1�����Ȥ��Ǻ��ʼ���Ƴ�����Ӥˤ�ȤŤ��ǥ����ۿ������Ȥι��ۤ���ǽ�Ǥ���
		</span>
		{html_style type="br"}
	</div>
	<div align="right" style="text-align:right;">
		[x:0074]<a href="?action_user_decomail=true">��äȸ���</a>
	</div>
	
	{html_style type="title" title="�������" bgcolor="#D5D500" fontcolor=$title_fontcolor}
	<div style="background-color:#FFFFEA;">
		{html_style type="img_left" src="img/t12.jpg"}
		<span style="margin-top:5px;">
			�ȼ�����ƥ�Ĥ�Ƴ�����Ӥˤ�ȤŤ�&reg;�夦��/&reg;�����ۿ������Ȥι��ۤ���ǽ�Ǥ���
		</span>
		{html_style type="br"}
	</div>
	<div align="right" style="text-align:right;">
		[x:0074]<a href="?action_user_sound=true">��äȸ���</a>
	</div>
</div>
<!--����ƥ�Ľ�λ-->

<!--�����ȥ�-->
{html_style type="title" title="���Ύߎ��ĎҎƎ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<!--���ݡ��ȥ�˥塼����-->
<div align="left" style="text-align:left;font-size:small;">
	[x:0193]<a href="fp.php?code=system_caution">��ջ���</a><br />
	[x:0161]<a href="fp.php?code=system_support">�䤤��碌</a><br />
	[x:0046]<a href="fp.php?code=system_policy">�̎ߎ׎��ʎގ����Ύߎ؎���</a><br />
	[x:0038]<a href="fp.php?code=system_company">��ҳ���</a>
</div>
<!--���ݡ��ȥ�˥塼��λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
