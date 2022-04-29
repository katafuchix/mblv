<!--ヘッダー-->
{include file="user/header.tpl"}

{html_style type="title" title="代引手数料について" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small">
	{*}共通{*}
	⇒【代引手数料】{$app.exchange_name}<br /><br />
	
	{*}一律{*}
	{if $app.exchange_type == 1}
		■まとめ買いの時は<br />
		同梱可能商品の場合、同じ買い物かごに入れた時、代引手数料は加算されません。<br />
		<br />
		※代引手数料はご注文１件につき、全国一律料金になります。<br />
		（離島への発送、また同梱不可商品、大型家電等の一部の商品を除く。）<br />
		<br />
		※一回のご注文(同じ買い物かご)で複数の商品をお買い求め頂いた場合、代引手数料は一回分のみなりますが、別々にご注文を完了された場合は、それぞれ代引手数料がかかります。<br />
		<br />
	{*}地域別送料{*}
	{elseif $app.exchange_type == 2}
		{foreach from=$app.exchange_range_list item=i name=n }
			{if $smarty.foreach.n.last == false}
				{$i.start|number_format}円以上〜{$i.end|number_format}円以下/{$i.price|number_format}円<br /><br />
			{else}
				{$i.start|number_format}円以上/{$i.price|number_format}円<br /><br />
			{/if}
			
		{/foreach}
	{*}購入金額{*}
	{elseif $app.exchange_type == 3}
		一回のご注文(同じ買い物かご)で商品代金の合計が{$form.exchange_total_price_set|number_format}円以上お買い求め頂いた場合、代引手数料は無料となります。<br />
		※別々にご注文を完了された場合は、それぞれ代引手数料がかかります。<br />
		※離島への発送、また同梱不可商品、大型家電等の一部の商品を除きます。<br />
		<br />
	{*}購入個数{*}
	{elseif $app.exchange_type == 4}
		一回のご注文(同じ買い物かご)で{$form.exchange_total_piece_set}個以上の商品をお買い求め頂いた場合、代引手数料は無料となります。<br />
		※別々にご注文を完了された場合は、それぞれ代引手数料がかかります。<br />
		※離島への発送、また同梱不可商品、大型家電等の一部の商品を除きます。<br />
		<br />
	{/if}
	
	{*}共通{*}
	■代引手数料にかかる消費税について<br />
	代引手数料は消費税を含んでいます。<br />
	<br />
	※詳細は店舗に直接お問い合わせください。<br />
	<br />
	お問い合わせ先：{$mall_name}<br />
	e-mail:<a href="mailto:{$app.from_mailaddress}">{$app.from_mailaddress}</a><br />
	TEL:0422-70-0275 10:00-18:00（土日、祝日を除く）<br />
	<br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
