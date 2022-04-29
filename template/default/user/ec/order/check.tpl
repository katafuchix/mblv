{include file="user/header.tpl"}

<form action="{$script}" method="post">

<!--ご注文内容の確認開始-->
{html_style type="title" title="■ご注文内容の確認 ■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	ご注文内容をご確認の上、「この内容で注文する」ﾎﾞﾀﾝ押してください｡<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;"> 
		<input type="hidden" name="action_user_ec_order_do" value="true">
		{$app_ne.hidden_vars}
		{form_submit value="この内容で注文する"}
	</div>
	<br />
	{foreach from=$app.cart_list item=c}
		<span style="color:{$title_bgcolor}">商品名:</span>{$c.item_name}<br />
		{if !$c.stock_one_type_status}<span style="color:{$title_bgcolor}">　ﾀｲﾌﾟ:</span>{$c.item_type}<br />{/if}
		<span style="color:{$title_bgcolor}">個　数:</span>{$c.cart_item_num}<br />
		<span style="color:{$title_bgcolor}">価　格:</span>{$c.item_price|number_format}円(税込)<br /><br />
		<hr color="{$hrcolor}" style="border-color:{$hrcolor};border-style:solid" noshade>
	{/foreach}
	
	<span style="color:{$title_bgcolor}">今回獲得{$config.point_name}:</span>{$app.user_order_get_point|number_format}{$config.point_unit}<br /><br />
	<span style="color:{$title_bgcolor}">小　計:</span>{$app.user_order_total_price1|number_format}円(税込)<br />
	<span style="color:{$title_bgcolor}"></span>(内消費税:{$app.user_order_tax|number_format}円)<br />
	<span style="color:{$title_bgcolor}">送　料:</span>{$app.user_order_postage|number_format}円(税込)<br />
	{if $form.user_order_type == 3}<span style="color:{$title_bgcolor}">代引料:</span>{$app.user_order_exchange_fee|number_format}円(税込)<br />{/if}
	{if $form.user_order_use_point_status == 1}
	<span style="color:{$title_bgcolor}">{$config.point_name}利用分:</span>-{$app.user_order_expend_point|number_format}円<br />
	{/if}

	<span style="color:{$title_bgcolor}">合　計:</span>{$app.user_order_total_price2|number_format}円(税込)<br /><br />
	
	{html_style type="title" title="■ご注文者情報確認■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<span style="color:{$title_bgcolor}">氏　　名:</span>{$form.user_name}<br />
	{if $form.user_zipcode}<span style="color:{$title_bgcolor}">郵便番号:</span>{$form.user_zipcode}<br />{/if}
	<span style="color:{$title_bgcolor}">住　　所:</span>{$config.region_id[$form.region_id].name}&nbsp;{$form.user_address}&nbsp;{$form.user_address_building}<br />
	<span style="color:{$title_bgcolor}">Ｔ&nbsp;Ｅ&nbsp;Ｌ:</span>{$form.user_phone}<br />
	<span style="color:{$title_bgcolor}">ﾒｰﾙｱﾄﾞﾚｽ:</span>{$form.user_mailaddress}<br />
	<br />
	
	{html_style type="title" title="■お届け先情報確認■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{if $form.user_order_delivery_type == 1}ご注文者と同じ<br />
	{elseif $form.user_order_delivery_type == 2}
		<span style="color:{$title_bgcolor}">氏　　名:</span>{$form.user_order_delivery_name}<br />
	{if $form.user_order_delivery_zipcode}<span style="color:{$title_bgcolor}">郵便番号:</span>{$form.user_order_delivery_zipcode}<br />{/if}
		<span style="color:{$title_bgcolor}">お届け先:</span>{$config.region_id[$form.user_order_delivery_region_id].name}&nbsp;{$form.user_order_delivery_address}&nbsp;{$form.user_order_delivery_address_building}<br />
		<span style="color:{$title_bgcolor}">Ｔ&nbsp;Ｅ&nbsp;Ｌ:</span>{$form.user_order_delivery_phone}<br />
	{/if}
	<span style="color:{$title_bgcolor}">配達時間指定:</span>
	{$config.delivery_date[$form.user_order_delivery_day].name}
	<br />
	{if $form.user_order_delivery_note}
		<span style="color:{$title_bgcolor}">備　　考:</span>{$form.user_order_delivery_note}<br />
	{/if}
	<br />
	<div align="center" style="text-align:center"> 
		{form_submit value="この内容で注文する"}
	</div>
	<br />
	
	{html_style type="title" title="■お支払方法確認■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{if $form.user_order_type == 1}
		ｸﾚｼﾞｯﾄｶｰﾄﾞ決済<br />
		<span style="color:{$title_bgcolor}">ｶｰﾄﾞ会社:</span>
			{if $form.user_order_card_type == 1}
			VISA
			{elseif $form.user_order_card_type == 2}
			JCB
			{elseif $form.user_order_card_type == 3}
			AMEX
			{elseif $form.user_order_card_type == 4}
			MASTER
			{elseif $form.user_order_card_type == 5}
			DINERS
			{/if}
			<br />
		<span style="color:{$title_bgcolor}">ｶｰﾄﾞ番号:</span>****************<br />
		<span style="color:{$title_bgcolor}">　名義人:</span>{$form.user_order_card_name}<br />
		<span style="color:{$title_bgcolor}">有効期限:</span>{$form.user_order_card_month}/{$form.user_order_card_year}<br />
		
		{if $form.user_order_card_revo_status == 1}
			<span style="color:{$title_bgcolor}">お支払回数:</span>リボ払い<br />
		{else}
			<span style="color:{$title_bgcolor}">お支払回数:</span>１回払い<br />
		{/if}
		
	{elseif $form.user_order_type == 2}
		ｺﾝﾋﾞﾆ払い<br />
		<span style="color:{$title_bgcolor}">ｺﾝﾋﾞﾆ:</span>
	{if $form.user_order_conveni_type == "seveneleven"}ｾﾌﾞﾝｲﾚﾌﾞﾝ{elseif $form.user_order_conveni_type == "lawson"}ﾛｰｿﾝ{elseif $form.user_order_conveni_type == "famima"}ﾌｧﾐﾘｰﾏｰﾄ{elseif $form.user_order_conveni_type == "seicomart"}ｾｲｺｰﾏｰﾄ{/if}
	{elseif $form.user_order_type == 3}
		代引き<br />
	{elseif $form.user_order_type == 4}
		銀行振込<br />
		１週間以内に指定の銀行口座にお振込みください。<br />
		お振込み確認後商品発送となります。<br />
		上記の合計をご注文内容確認メールに記載の口座までお振込みください。<br />
	{/if}
	<br />
	
	{html_style type="title" title="■消費税について■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<span style="color:{$title_bgcolor}">消費税率:</span>5%<br />
	<span style="color:{$title_bgcolor}">消費税計算順序:</span>１商品毎に消費税計算<br />
	<span style="color:{$title_bgcolor}">1円未満消費税端数:</span>切捨て<br />
	<br />
	
	<div align="center" style="text-align:center"> 
		{form_submit value="この内容で注文する"}
	</div>
</div>
{uniqid}
</form>
<br />
<!--ご注文内容の確認終了-->

{include file="user/footer.tpl"}
