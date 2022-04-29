{include file="user/header.tpl"}

<!--サンプル開始-->
{html_style type="title" title="■`$form.sample_name`■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<div align="center" style="text-align:center;font-size:small;">
	{if $form.sample_id}
		<img src="{if $form.sample_image|escape}f.php?file_name={$form.sample_image|escape}&contents=sample{/if}" >
	{/if}
</div>

<div align="left" style="text-align:left;font-size:small">
	{form action="`$config.ssl_url``$script`" ethna_action="user_ec_item_regist_do" method="post"}
		{form_input name="item_id"}
		<br />
		<!--サンプル画像リンク開始-->
		{foreach from=$app.sample_list item=i}
			<div align="center" style="text-align:center;font-size:small;">
				{if $form.sample_id == $i.sample_id}
					{$i.sample_name}
				{else}
					<a href="?action_user_ec_sample=true&item_id={$form.item_id}&sample_id={$i.sample_id}&shop_id={$form.shop_id}">{$i.sample_name}</a>
				{/if}
			</div>
		{/foreach}
		<!--サンプル画像リンク終了-->
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		
		<!--商品ページTOPへ-->
		<a href="?action_user_ec_item=true&item_id={$form.item_id}&shop_id={$app.shop_id}">商品ページTOPへ</a><br />
		
		<!--商品説明-->
		{if $app_ne.item_detail }<a href="?action_user_ec_item_detail=true&item_id={$form.item_id}&type=detail&shop_id={$form.shop_id}">商品詳細はこちら</a><br />{/if}
		
		<!--商品スペック-->
		{if $app_ne.item_spec }<a href="?action_user_ec_item_detail=true&item_id={$form.item_id}&type=spec&shop_id={$form.shop_id}">商品スペックはこちら</a><br />{/if}
		{if $app.shop_new_arrivals }<a href="?action_user_ec_shop_recommend=true&shop_id={$form.shop_id}">お店のｵｽｽﾒ商品へ</a><br />{/if}<br />
		
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
			<span style="color:{$title_bgcolor}">個数:</span>{select name="item_num" list=$app.item_num_list value=$form.item_num}<br />
			
			<!--ポイント-->
			<span style="color:{$title_bgcolor}">取得{$point_name}:</span>{$form.item_point}{$point_unit}<br />
		</div>
		<br />
		
		<!--かごに入れるボタン-->
		<div align="center" style="text-align:center;font-size:small;">{form_submit value="かごに入れる"}</div>
		
		<!--送料、支払い-->
		<div align="center" style="text-align:center;font-size:small;"><a href="?action_user_ec_item_postage=true&item_id={$form.item_id}">送料</a> / <a href="?action_user_ec_item_order=true&item_id={$form.item_id}">支払方法</a></div>
		
	{/form}
</div>

{include file="user/footer.tpl"}
