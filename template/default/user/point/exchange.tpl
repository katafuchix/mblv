<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.point.name`換金" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	<a href="?action_user_point_exchange_account=true&point_exchange_type=1">[x:0199]<span style="color:{$headcolor}">現金に交換</span></a><br />
	<a href="?action_user_point_exchange_account=true&point_exchange_type=2">[x:0199]<span style="color:{$headcolor}">電子ﾏﾈｰに交換</span></a><br />
	<a href="?action_user_point_exchange_account=true&point_exchange_type=3">[x:0199]<span style="color:{$headcolor}">他ｻｲﾄﾎﾟｲﾝﾄに交換</span></a><br />
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_ad=true">{$ft.ad.name}ﾎﾟｰﾀﾙへ</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_point_home=true">{$ft.point.name}通帳へ</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
