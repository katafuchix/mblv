{include file="user/header.tpl"}

<!--商品開始-->
{html_style type="title" title="■`$form.item_name`■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}

<!--商品画像-->
<div align="center" style="text-align:center;font-size:small;">
		{if $form.item_image}
			<img src="{if $form.item_image|escape}f.php?file_name={$form.item_image|escape}&contents=item{/if}" >
		{/if}
</div>

<div align="left" style="text-align:left;font-size:small">
	{form action="$script" ethna_action="user_ec_item_regist_do" method="post"}
	{form_input name="item_id"}
	<br />
	<!--サンプル開始-->
	{foreach from=$app.sample_list item=i}
		<div align="center" style="text-align:center;font-size:small;">
			<a href="?action_user_ec_sample=true&item_id={$app.item_id}&sample_id={$i.sample_id}&shop_id={$app.shop_id}">{$i.sample_name}</a>
		</div>
	{/foreach}
	<!--サンプル終了-->
	<br /><hr>
	
	<!--商品詳細情報開始-->
	<br />
	{if $app.type == 'detail'}
		{$app_ne.item_detail}
	{else}
		{$app_ne.item_spec}
	{/if}
	<br /><br />
	
	<!--商品ページTOPへ-->
	<a href="?action_user_ec_item=true&item_id={$form.item_id}&shop_id={$app.shop_id}">商品ページTOPへ</a><br />
	
	<!--商品スペックへ-->
	{if $form.type=='detail' && $app_ne.item_spec}
		<a href="?action_user_ec_item_detail=true&item_id={$form.item_id}&type=spec&shop_id={$app.shop_id}">商品スペックはこちら</a><br />
	{/if}
	
	<!--商品説明へ-->
	{if $form.type=='spec' && $app_ne.item_detail}
		<a href="?action_user_ec_item_detail=true&item_id={$form.item_id}&type=detail&shop_id={$app.shop_id}">商品詳細はこちら</a><br />
	{/if}
	<br />
	<!--商品詳細情報終了-->
	
		<!--在庫エラー-->
		{if $app.zaikoerror}<span style="color:#ff0000">{$app.zaikoerror}</span><br />{/if}
		
		<div align="center" style="text-align:center;font-size:small;">
			<!--前ラベル-->{if $form.item_label_front}<p>{$form.item_label_front}</p>{/if}
			<!--後ラベル-->{if $form.item_label_back}<p>{$form.item_label_back}</p>{/if}
			<!--価格--><p>価格:{$form.item_price|number_format}円(税込)</p>
			</div>
		<br />
		
		<div align="center" style="text-align:center;font-size:small;">
			<!--タイプ-->
			{if $app.item_type_list}
				<!--タイプがひとつの場合は「ﾀｲﾌﾟ:」を表示しない開始-->
				{if $app.stock_one_type_status}
					<input type="hidden" name="stock_id" value="{$app.one_type_only_id}" >
				{else}
					<span style="color:{$title_bgcolor}">{form_name name="stock_id"}:</span>{select name="stock_id" list=$app.item_type_list value=$form.stock_id}<br />
				{/if}
				<!--タイプがひとつの場合は「ﾀｲﾌﾟ:」を表示しない終了-->
			{else}
				<input type="hidden" name="stock_id" value="0"><br />
			{/if}
			
			<!--個数-->
			<span style="color:{$title_bgcolor}">{form_name name="cart_item_num"}:</span>{select name="item_num" list=$app.item_num_list value=$form.item_num}<br />
			
			<!--ポイント-->
			<span style="color:{$title_bgcolor}">取得{$point_name}:</span>{$form.item_point}{$point_unit}<br />
		</div>
		<br />
		
		<!--かごに入れるボタン-->
		<div align="center" style="text-align:center;font-size:small;">{form_submit value="かごに入れる"}</div>
		
		<!--送料、支払い-->
		<div align="center" style="text-align:center;font-size:small;"><a href="?action_user_ec_item_postage=true&item_id={$app.item_id}">送料</a> / <a href="?action_user_ec_item_order=true&item_id={$app.item_id}">支払方法</a></div>
		
		<!--フリースペース-->
		<font size="-1">{$app_ne.contents_body|nl2br}<br /></font>
		
	{/form}
</div>
<!--商品終了-->

{*}
<hr>
<a href="">お気に入り商品登録*</a><br />
<a href="">お気に入り店舗登録*</a><br />
{*}

<!--友達に教える-->
<div align="left" style="text-align:left;font-size:small;">[x:0105]<a HREF="mailto:?subject=&body={$app.user_url}%3Faction_mall_item%3Dtrue%26item_id%3D{$app.item_id}">友達に教える</a><br /></div>

<!--商品についてお問い合わせ-->
<div align="left" style="text-align:left;font-size:small;">[x:0105]<a HREF="mailto:{$config.item_info_mailaddress}?subject=質問&body=【商品番号】{$app.item_id}%0D%0A【商品名】{$app.item_name|replace_emoji_form}%0D%0A【お名前】{$session.user.user_name|replace_emoji_form}%0D%0A【お問い合わせ内容】%0D%0A">店長に質問!</a><br /></div>

<!--レビュー-->
{if $app.review_count >0 }
	<div align="right" style="text-align:right;font-size:small;">
		<a href="?action_user_ec_review=true&item_id={$form.item_id}">この商品のレビューを見る</a> 
	</div>
{/if}

{include file="user/footer.tpl"}
