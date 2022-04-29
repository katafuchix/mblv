{include file="user/header.tpl"}

<!--商品一覧開始-->
{html_style type="title" title=$form.item_category_name bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
</div>

<!--パンくず-->
<span style="font-size:small"><a href="?action_user_ec=true">TOP</a>⇒<a href="?action_user_ec_shop=true&shop_id={$app.shop_id}">{$app.shop_name}</a>⇒{$form.item_category_name}</span>
<br />

<!--フリースペース開始-->
{$app_ne.item_category_contents_body|nl2br}
<!--フリースペース終了-->

<!--アンカーへ-->
<div align="left" style="text-align:left;font-size:small;"><a href="#sort">▼並べ替え・絞り込み</a></div>

<!--ページ表示-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($app.listview_data) == 0}
		検索条件に合致する商品は見つかりませんでした。<br />
		<br />
	{else}
		検索条件に合致する商品が{$app.listview_total}件見つかりました。
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		{include file="user/pager.tpl"}
	{/if}
</div>

<!--商品一覧開始-->
<div align="left" style="text-align:left;font-size:small">
	{foreach from=$app.listview_data item=i name=n}
		{if $i.item_image}
			<img align="left" style="text-align:left;float:left;" width="53" height="46" src="?action_user_ec_file_get=true&file_name=thumb/{$i.item_image|escape}&type=item" >
		{/if}
		<a href="?action_user_ec_item=true&item_id={$i.item_id}">{$i.item_name}</a><br />
		{$i.item_price|number_format}円{html_style type="br"}
	{/foreach}
	<!--ページャー-->
	{include file="user/pager.tpl"}
</div>

<!--商品一覧終了-->

<!--検索開始-->
<a name="sort" id="sort"></a>
<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
<div align="left" style="text-align:left;font-size:small;">
	{form action="$script"  ethna_action="user_ec_item_list"}
		{form_input name="item_category_id"}
		並べ替え<br />
		{form_input name="sort_order" emptyoption="指定しない"}{form_input name="search" value="並べ替え"}<br /><br />
		絞り込み検索<br />
		{form_input name="keyword" size="8"}{form_input name="search" value="検　索"}<br /><br />
		価格で絞り込む<br />
		{form_input name='price_start' istyle="4" mode="numeric" size="6"}〜{form_input name='price_end' istyle="4" mode="numeric" size="6"}円{form_input name="search" value="絞り込む"}
	{/form}
</div>
<!--検索終了-->

{include file="user/supportmenu.tpl"}

<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">

<div align="left" style="text-align:left;font-size:small;">
	<a href="?action_user_ec_shop=true&shop_id={$app.shop_id}">⇒ショップTOPへ</a><br />
</div>

{include file="user/footer.tpl"}
