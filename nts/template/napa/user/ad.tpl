<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.point.name`GET" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--��������ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{$app_ne.cms_html1}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{if count($app.listview_data)}
		{foreach from=$app.listview_data item=news}
			[x:0112]{$news.news_time}&nbsp;<a href="?action_user_news_view=true&news_id={$news.news_id}">{$news.news_title}</a><br />
		{/foreach}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />
	{/if}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_point_home=true">�ŎʎߎΎ���Ģ</a>
	<!--span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_point_exchange_home=true">�Ύߎ��ݎĸ�����</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=about-sns-exchange">�Ύߎ��ݎĸ�</a><br /-->
	<!--span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=about-sns-point&ma_hash=">POINT GET�Ȥ�</span></a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=point-notes&ma_hash=">��ջ���</span></a><br /-->
</div>
<!--��������ƥ�Ľ�λ-->


<!--�����ȥ�-->
{html_style type="title" title="`$ft.ad.name`���Î��ގ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--��������ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.category item=item name=ad key =k}
		{if $k%2==0}
			{style align="left" bgcolor="#FFFFFF" fontcolor=$text fontsize="small"}
			<a href="?action_user_ad_list=true&ad_category_id={$item.ad_category_id}">{$item.ad_category_name}</a><br />
			��{$item.ad_category_desc}
			{/style}
		{else}
			{style align="left" bgcolor=$bgcolor fontcolor=$text fontsize="small"}
			<a href="?action_user_ad_list=true&ad_category_id={$item.ad_category_id}">{$item.ad_category_name}</a><br />
			��{$item.ad_category_desc}
			{/style}
		{/if}
	{/foreach}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
</div>
<!--��������ƥ�Ľ�λ-->


<!--���𸡺�����-->
{html_style type="title" title="`$ft.ad.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="center" style="text-align:center;font-size:small;">
	{form action="$script" ethna_action="user_ad_list"}
	{form_input name="keyword" size=12}&nbsp;
	{form_submit value="����"}
	{/form}
</div>
<!--���𸡺���λ-->


<!--��������ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{$app_ne.cms_html2}
</div>
<!--��������ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
