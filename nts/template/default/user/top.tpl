<!--�إå���-->
{include file="user/header.tpl"}

<div align="center" style="color:{$title_fontcolor};font-size:small;background:{$title_bgcolor};text-align:center;">
	<span style="display: -wap-marquee;-wap-marquee-style: scroll;-wap-marquee-loop: infinite">
		<span style="font-size:small;color:#FFFF33;text-decoration: blink;">������</span>
		�͵�ʨƭ��
		<span style="font-size:small;color:#FFFF33;text-decoration: blink;">������</span>
	</span>
</div>
<!--���顼��å�����ɽ������-->
<div align="left" style="text-align:left;font-size:small;background:#ffffff;">
	{include file="user/errors.tpl"}
</div>
<!--���顼��å�����ɽ����λ-->
<!--����������-->
<div align="center" style="text-align:center;font-size:small;">
	<img src="snsv_logo.gif" align="center" style="text-align:center"><br />
</div>
<!--��������λ-->

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($app.listview_data)}
		{foreach from=$app.listview_data item=news}
			[x:0112]{$news.news_time}&nbsp;<a href="?action_user_news_view=true&news_id={$news.news_id}">{$news.news_title}</a><br />
		{/foreach}
	{/if}
	{html_style type="title" title="���ʎގ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/a1.gif"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">���ʎގ���</a><br />
			���ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ���<br />
			���ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ���<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
	
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/a2.gif"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">���ʎގ���</a><br />
			���ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ���<br />
			���ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ������ʎގ���<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
	
	{html_style type="title" title="�Îގ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/d1.gif"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">�Îގ���</a><br />
			�Îގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ���<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
	
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/d2.gif"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">�Îގ���</a><br />
			�Îގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ��ҎÎގ���<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
	
	{html_style type="title" title="���ގ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/g1.jpg"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">���ގ���</a><br />
			���ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ���<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
	
	<div align="left" style="text-align:left;float:left;">
		{html_style type="img_left" src="img/g2.jpg"}
		<span style="margin-top:5px;">
			<a href="?action_user_home=true">���ގ���</a><br />
			���ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ��ю��ގ���<br />
		</span>
	</div>
	{html_style type="line" color="gray"}
</div>
<!--����ƥ�Ľ�λ-->

<!--�����ȥ�-->
{html_style type="title" title="���Ύߎ��ĎҎƎ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<!--���ݡ��ȥ�˥塼����-->
<div align="left" style="text-align:left;font-size:small;">
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=caution">��ջ���</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=support">�䤤��碌</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=about-device">�б�����</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=privacy">�̎ߎ׎��ʎގ����Ύߎ؎���</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=terms">���ѵ���</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=company">��ҳ���</a>
</div>
<!--���ݡ��ȥ�˥塼��λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
