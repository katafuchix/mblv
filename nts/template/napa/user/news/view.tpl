<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title=$app.news.news_title bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--�˥塼������-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<span style="color:#009900">{$app.news.news_time}</span><br />
	{$app_ne.news.news_body|nl2br}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<!--span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="{$app.return_href}">{$app.return_name}�����</a><br /-->
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_news_list=true&news_type={$app.news.news_type}">{$ft.news.name}���������</a>
</div>
<!--�˥塼����λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
