{include file="user/header.tpl"}

<!--商品開始-->
{html_style type="title" title=$form.item_name bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
</div>

<!--ショップ紹介-->
<div align="left" style="text-align:left;font-size:small">
	{$app_ne.item_text1}
</div>

<div align="center" style="text-align:center;font-size:small;">
	{if $form.item_image}
		<img src="{if $form.item_image|escape}f.php?file_name={$form.item_image|escape}&contents=item{/if}" >
	{/if}
</div>

<div align="left" style="text-align:left;font-size:small">
	{form action="$script" ethna_action="user_ec_item_regist_do"}
		{form_input name="item_id"}
		<br />
		<!--サンプル開始-->
		{foreach from=$app.sample_list item=i}
			<div align="center" style="text-align:center;font-size:small;">
				<a href="?action_user_ec_sample=true&item_id={$app.item_id}&sample_id={$i.sample_id}&shop_id={$app.shop_id}">{$i.sample_name}</a>
			</div>
		{/foreach}
		<!--サンプル終了-->
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		
		<!--商品詳細-->
		{$app_ne.item_text2}<br />
		
		<!--商品説明-->
		{if $app_ne.item_detail }<a href="?action_user_ec_item_detail=true&item_id={$app.item_id}&type=detail&shop_id={$app.shop_id}">商品詳細はこちら</a><br />{/if}
		
		<!--商品スペック-->
		{if $app_ne.item_spec }<a href="?action_user_ec_item_detail=true&item_id={$app.item_id}&type=spec&shop_id={$app.shop_id}">商品スペックはこちら</a><br />{/if}
		{if $app.shop_new_arrivals }<a href="?action_user_ec_shop_recommend=true&shop_id={$app.shop_id}">お店のｵｽｽﾒ商品へ</a><br />{/if}<br />
		
		<!--在庫エラー-->
		{if $app.zaikoerror}<span style="color:#ff0000">{$app.zaikoerror}</span><br />{/if}
		
		<div align="center" style="text-align:center;font-size:small;">
			<!--前ラベル-->{if $form.item_label_front}{$form.item_label_front}<br />{/if}
			<!--後ラベル-->{if $form.item_label_back}{$form.item_label_back}<br />{/if}
			<!--価格-->価格:{$form.item_price|number_format}円(税込)<br />
		</div>
		
		<div align="center" style="text-align:center;font-size:small;">
			<!--タイプ-->
			{if $app.item_type_list}
				<!--タイプがひとつの場合は「ﾀｲﾌﾟ:」を表示しない開始-->
				{if $app.stock_one_type_status}
					<input type="hidden" name="stock_one_type_status" value="1" >
					<input type="hidden" name="stock_id" value="{$app.one_type_only_id}" >
				{else}
					<input type="hidden" name="stock_one_type_status" value="0" >
					<span style="color:{$title_bgcolor}">{form_name name="stock_id"}:</span>{select name="stock_id" list=$app.item_type_list value=$form.stock_id}<br />
				{/if}
				<!--タイプがひとつの場合は「ﾀｲﾌﾟ:」を表示しない終了-->
			{else}
				<input type="hidden" name="stock_id" value="0"><br />
			{/if}
			
			<!--個数-->
			<span style="color:{$title_bgcolor}">{form_name name="cart_item_num"}:</span>{select name="cart_item_num" list=$app.cart_item_num_list value=$form.cart_item_num}<br />
			
			<!--ポイント-->
			<span style="color:{$title_bgcolor}">取得{$point_name}:</span>{$form.item_point}{$point_unit}<br />
		</div>
		<br />
		
		<!--かごに入れるボタン-->
		<div align="center" style="text-align:center;font-size:small;">{form_submit value="かごに入れる"}</div>
		
		<!--送料、支払い-->
		<div align="center" style="text-align:center;font-size:small;"><a href="?action_user_ec_item_postage=true&item_id={$app.item_id}">送料</a> / <a href="?action_user_ec_item_order=true&item_id={$app.item_id}">支払方法</a></div>
		
		<!--フリースペース-->
		{$app_ne.item_contents_body|nl2br}
	{/form}
</div>
<!--商品終了-->

<!--友達に教える-->
<div align="left" style="text-align:left;font-size:small;">[x:0105]<a HREF="mailto:?subject=&body={$app.user_url}%3Faction_user_ec_item%3Dtrue%26item_id%3D{$app.item_id}">友達に教える</a><br /></div>

<!--商品についてお問い合わせ-->
<div align="left" style="text-align:left;font-size:small;">[x:0105]<a HREF="mailto:{$config.item_info_mailaddress}?subject=質問&body=【商品番号】{$app.item_id}%0D%0A【商品名】{$app.item_name|replace_emoji_form}%0D%0A【お名前】{$session.user.user_name}%0D%0A【お問い合わせ内容】%0D%0A">店長に質問!</a><br /></div>

<!--このお店について-->
<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
<div align="left" style="text-align:left;font-size:small;">
	このお店をもっと見る<br />
	<a href="?action_user_ec_shop_ranking=true&shop_id={$app.shop_id}">⇒人気ランキング</a><br />
	<a href="?action_user_ec_shop_recommend=true&shop_id={$app.shop_id}">⇒この店のｵｽｽﾒ商品</a><br />
	<a href="?action_user_ec_shop=true&shop_id={$app.shop_id}">⇒ショップTOPへ</a><br />
	<a href="fp.php?code=system_ec_return">⇒返品についてはこちら</a><br />
</div>
<div align="right" style="text-align:right;font-size:small;">
	<a href="#top">▲ﾍﾟｰｼﾞの最初に</a>
</div>
<br />

<!--商品についてのレビュー-->
{if $app.review_count >0 }
	<div align="right" style="text-align:right;font-size:small;">
		<a href="?action_user_ec_review=true&item_id={$form.item_id}">この商品のレビューを見る</a> 
	</div>
{/if}

<!--フッター-->
{include file="user/footer.tpl"}
