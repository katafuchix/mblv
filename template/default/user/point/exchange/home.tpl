<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="ﾎﾟｲﾝﾄ交換履歴" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	[x:0162]現在のﾎﾟｲﾝﾄ<span style="color:#FF3399">{$app.user_point}</span>pt<br />
	<span style="color:{$menucolor}">◆</span><a href="?action_user_util=true&page=about-sns-exchange">ﾎﾟｲﾝﾄ交換</a><br />
	<span style="color:{$menucolor}">◆</span><a href="?action_user_ad=true">ﾎﾟｲﾝﾄﾎﾟｰﾀﾙへ</a><br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{foreach from=$app.point_list item=item name=point key =k}
		{style align="left" bgcolor=$bgcolor fontcolor=$text fontsize="small"}
		{$item.point_exchange_time|date_format:"%m/%d"}<br />{$config.point_type[$item.point_type].name}￥{$item.price}<br />（手数料:￥{$item.fee}）<!--承認非承認を非表示({$config.point_status[$item.point_status].name})--></a>
		{/style}
	<hr color="#C9DACF" style="border:solid 1px #C9DACF;">
	{/foreach}
	<br />
	{include file="user/pager.tpl"}
	<br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<span style="color:{$menucolor}">◆</span><a href="?action_user_util=true&page=about-sns-exchange">ﾎﾟｲﾝﾄ交換</a><br />
	<span style="color:{$menucolor}">◆</span><a href="?action_user_ad=true">ﾎﾟｲﾝﾄﾎﾟｰﾀﾙへ</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
