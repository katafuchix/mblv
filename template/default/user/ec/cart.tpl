{include file="user/header.tpl"}

<!--買い物カゴ開始-->
{html_style type="title" title="■買い物ｶｺﾞ■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	
	{if $app.cart_list}
	{foreach from=$app.cart_list item=i}
		商品名:<a href="?action_user_ec_item=true&item_id={$i.item_id}">{$i.item_name}</a><br />
		{if !$i.item_one_type_flag}ﾀｲﾌﾟ:{$i.item_type}<br />{/if}
		価格:{$i.item_price|number_format}円(税込)<br />
		個数:{$i.cart_item_num}<br />
		<a href="?action_user_ec_item_delete_do=true&stock_id={$i.stock_id}&cart_id={$i.cart_id}">削除</a>
		<hr color="{$hrcolor}" style="border-color:{$hrcolor};border-style:solid" noshade>
	{/foreach}
	商品合計:{$app.total_price|number_format}円(税込)<br /><br />
	{/if}
	
	{*}<span style="color:red;">※送料はご注文の最後にご注文金額に加算されます。</span><br /><br />{*}
	
	
	{if $app.cart_list}
	<div align="center" style="text-align:center">
		{form action="`$config.ssl_url``$script`" ethna_action="user_ec_order"}
			{form_input name="total_price" value="`$app.total_price`"}
			{form_input name="order" value="注文画面へ進む"}
		{/form}
	</div>
	{/if}
	<div align="center" style="text-align:center">
		{form action="$script" ethna_action="user_ec"}
			{form_input name="spg_go_on" value="お買い物を続ける"}
		{/form}
	</div>
	<br />
	
	<!--おすすめ商品開始-->
	{if $app_ne.shop_recommend_list}
		{html_style type="title" title="[x:0139]おすすめ商品[x:0139]" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
		こちらの商品もおすすめ。<br />
		{foreach from=$app_ne.shop_recommend_list item=i key=k}
			<table valign="top">
				<tr>
					<td valign="top">
						<div style="float:left">
							{if $i.item_image}
								<img align="left" style="text-align:left;float:left;" src="f.php?file_name=thumb/{$i.item_image|escape}&contents=item" >
							{else}
								<img align="left" style="text-align:left;float:left;" src="f.php?file_name=item1.jpg&contents=item" >
							{/if}
						</div>
					</td>
					<td valign="top">
						<span style="float:left">
							<a href="?action_user_ec_item=true&item_id={$i.item_id|escape}">{$i.item_name|escape}</a><br />{$i.item_text1}
						</span>
					</td>
				</tr>
			</table>
			{*html_style type="br"*}
			<hr color="{$hrcolor}" style="border-color:{$hrcolor};border-style:solid;clear:both;" noshade>
		{/foreach}
	{/if}
	<!--おすすめ商品終了-->
	
</div>
<!--買い物カゴ終了-->

{include file="user/footer.tpl"}
