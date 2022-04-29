<!--ヘッダー-->
{include file="user/header.tpl"}

<!--ロゴ画像開始-->
<div align="center" style="text-align:center;font-size:small;">
	<img src="img/logo_user.gif" align="center" style="text-align:center"><br />
</div>
<!--ロゴ画像終了-->

<!--errorsがあれば-->
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}

<!--上部コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:#f00;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{$app_ne.cms_html1}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />
	{if $mall_information}{$mall_information}<br />{/if}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_ec_contents_list=true">特集一覧</a>
</div>
<!--上部コンテンツ終了-->

<!--人気商品開始-->
{html_style type="title" title="商品ﾗﾝｷﾝｸﾞ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.ranking item=item name=item key =k}
		<div align="left" style="text-align:left;float:left;">
			{if $item.item_image}<img src="f.php?&file=item/thumb/{$item.item_image}&SESSID={$SESSID}" style="float:left;">{/if}
			<span style="margin-top:5px;">
				<a href="?action_user_ec_item=true&item_id={$item.item_id}">{$item.item_name}</a><br />
				{$item.game_desc}
			</span>
		</div>
		{html_style type="line" color="gray"}
	{/foreach}
	{html_style type="br"}
</div>
<!--人気商品終了-->

<!--EC SHOP-->
{html_style type="title" title="ｼｮｯﾌﾟ紹介" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app_ne.shop_list item=i name=n}
		{if $i.shop_image1}
			<img align="left" style="text-align:left;float:left;" src="f.php?file=shop/thumb/{$i.shop_image1}&SESSID={$SESSID}" />
		{/if}
		<a href="?action_user_ec_shop=true&shop_id={$i.shop_id|escape}">{$i.shop_name|escape}</a><br />
		┗<span style="font-size:small">{$i.shop_news}</span>{html_style type="br"}
		{if !$smarty.foreach.n.last}{html_style type="line" color="gray"}{/if}
	{/foreach}
</div>
<!--EC SHOP-->

<!--EC RANKING-->
{if $mall_shop_ranking_list}
{html_style type="title" title="ランキング" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$mall_shop_ranking_list item=i name=n}
		第{$smarty.foreach.n.iteration}位<br />
		{if $i.shop_image1}
				<img align="left" style="text-align:left;float:left;" src="f.php?file=shop/thumb/{$i.shop_image1}&SESSID={$SESSID}" />
		{/if}
		<a href="?action_user_ec_shop=true&shop_id={$i.shop_id|escape}">{$i.shop_name|escape}</a>{html_style type="br"}
		{if !$smarty.foreach.n.last}{html_style type="line" color="gray"}{/if}
	{/foreach}
</div>
{/if}
<!--EC RANKING-->

<!--検索開始-->
<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />
<div align="center" style="text-align:center;font-size:small;">
	{form action="$script" ethna_action="user_ec_item_list"}
		{form_input name="shop" emptyoption="ｼｮｯﾌﾟを選んで検索"}<br />
		{form_name name="keyword"}:<input type="text" size="14" name="keyword"/>
		{form_submit value="商品検索"}<br />
		<a href="?action_user_ec_item_search=true">商品検索(詳細)</a>
	{/form}
</div>
<!--検索終了-->

<!--下部コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{$app_ne.cms_html2}
</div>
<!--下部コンテンツ終了-->

<!--サポートメニュー-->
{include file="user/supportmenu.tpl"}

<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />
<div align="right" style="text-align:right;font-size:small;">
	<a href="#top">▲ﾍﾟｰｼﾞTOPへ</a>
</div>

<!--フッター-->
{include file="user/footer.tpl"}
