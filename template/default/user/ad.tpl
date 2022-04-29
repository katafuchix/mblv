<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.ad.name`ﾎﾟｰﾀﾙ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--上部コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{$app_ne.cms_html1}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{if count($app.listview_data)}
		{foreach from=$app.listview_data item=news}
			[x:0112]{$news.news_time}&nbsp;<a href="?action_user_news_view=true&news_id={$news.news_id}">{$news.news_title}</a><br />
		{/foreach}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />
	{/if}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_point_home=true">{$ft.point.name}通帳</a>
	<!--span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=about-sns-exchange">{$ft.point.name}交換</a-->
	<!--span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_point_exchange_home=true">ﾎﾟｲﾝﾄ交換履歴</a-->
</div>
<!--上部コンテンツ終了-->

<!--広告検索開始-->
{html_style type="title" title="`$ft.ad.name`検索" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="center" style="text-align:center;font-size:small;">
	{form action="$script" ethna_action="user_ad_list"}
	{form_input name="keyword" size=12}&nbsp;
	{form_submit value="検索"}
	{/form}
</div>
<!--広告検索終了-->

<!--タイトル-->
{html_style type="title" title="`$ft.ad.name`ｶﾃｺﾞﾘ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--中部コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.category item=item name=ad key =k}
		{if $k%2==0}
			{style align="left" bgcolor="#FFFFFF" fontcolor=$text fontsize="small"}
			<a href="?action_user_ad_list=true&ad_category_id={$item.ad_category_id}">{$item.ad_category_name}</a><br />
			→{$item.ad_category_desc}
			{/style}
		{else}
			{style align="left" bgcolor=$bgcolor fontcolor=$text fontsize="small"}
			<a href="?action_user_ad_list=true&ad_category_id={$item.ad_category_id}">{$item.ad_category_name}</a><br />
			→{$item.ad_category_desc}
			{/style}
		{/if}
	{/foreach}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
</div>
<!--中部コンテンツ終了-->

<!--下部コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{$app_ne.cms_html2}
</div>
<!--下部コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
