{include file="user/header.tpl"}

<!--ショップタイトル-->
{html_style type="title" title=$form.shop_name bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--ショップ画像-->
{if $form.shop_image2}
<div align="center" style="text-align:center;font-size:small;">
		<img align="left" style="text-align:left;float:left;" src="f.php?file_name=thumb/{$form.shop_image2}&contents=shop" >
</div>
{/if}

<!--フリースペース開始-->
{$app_ne.shop_body|nl2br}<br />
<!--フリースペース終了-->

<!--おすすめ商品開始-->
{if $app_ne.shop_new_arrivals_list}
{html_style type="title" title="[x:0139]おすすめ商品[x:0139]" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app_ne.shop_new_arrivals_list item=i key=k name=n}
	<table>
		<tr>
			<td>
			{if $i.item_image}
				<img align="left" style="text-align:left;float:left;" width="53" height="46" 
				 src="{if $i.item_image|escape}f.php?file_name=thumb/{$i.item_image|escape}&contents=item{/if}" >
			{/if}
			</td>
			<td>
				<a href="?action_user_ec_item=true&item_id={$i.item_id|escape}">{$i.item_name|escape}</a>
				<div style="font-size:small">{$i.item_text1}</div>
			</td>
		</tr>
	</table>
	{if $smarty.foreach.n.last != true}<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />{/if}
	{/foreach}
</div>
{/if}
<!--おすすめ商品終了-->

<!--人気ランキング開始-->
{if $app_ne.shop_ranking_list}
{html_style type="title" title="[x:0167]人気ﾗﾝｷﾝｸﾞ[x:0167]" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app_ne.shop_ranking_list item=i key=k name=n}
	<table>
		<tr>
			<td>
			{if $i.item_image}
			<img align="left" style="text-align:left;float:left;" width="53" height="46" 
				 src="{if $i.item_image|escape}f.php?file_name=thumb/{$i.item_image|escape}&contents=item{/if}" >
			{/if}
			</td>
			<td>
				第{$smarty.foreach.n.iteration}位<br />
				<a href="?action_user_ec_item=true&item_id={$i.item_id|escape}">{$i.item_name|escape}</a>
				<div style="font-size:small">{$i.item_text1}</div>
			</td>
		</tr>
	</table>
	{if $smarty.foreach.n.last != true}<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />{/if}
	{/foreach}
</div>
{/if}
<!--人気ランキング終了-->

{if $app.shop_category_print_status == 1}
<!--カテゴリ開始-->
{html_style type="title" title="カテゴリ一覧" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{foreach from=$app.item_category_list item=i name=n}
	<table>
		<tr>
			<td>
			{if $i.item_category_image1}
				<img align="left" style="text-align:left;float:left;" width="53" height="46" 
				 src="f.php?file_name=thumb/{$i.item_category_image1|escape}&contents=item_category" >
			{/if}
			</td>
			<td>
				<a href="?action_user_ec_category=true&shop_id={$form.shop_id}&item_category_id={$i.item_category_id}">{$i.item_category_name}</a>
				<div style="font-size:small">{$i.item_category_text}</div>
			</td>
		</tr>
	</table>
	{if !$smarty.foreach.n.last}<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />{/if}
	{/foreach}
</div>
<!--カテゴリ終了-->
{/if}

<!--検索開始-->
<div align="center" style="text-align:center;font-size:small;">
	{form action="$script" ethna_action="user_ec_item_list"}
		<input type="hidden" name="shop" value="{$form.shop_id}">
		{form_input name="keyword" size="14"}
		{form_submit value="商品検索"}
	{/form}
</div>
<!--検索終了-->

<!--サポートメニュー-->
{include file="user/supportmenu.tpl"}

<!--連携リンク-->
<div align="left" style="text-align:left;font-size:small">
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />
	<a href="?action_user_ec=true">⇒{$app.mall_html_title}TOPへ</a>
	<div align="right" style="text-align:right;font-size:small;"><a href="#top">▲ﾍﾟｰｼﾞTOPへ</a><br /></div>
</div>

<!--フッター-->
{include file="user/footer.tpl"}
