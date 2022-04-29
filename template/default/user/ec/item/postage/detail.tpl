<!--ヘッダー-->
{include file="user/header.tpl"}

{html_style type="title" title="送料について" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small">
	{*}共通{*}
	⇒【送料】{$app.postage_name}<br /><br />
	
	{*}一律{*}
	{if $app.postage_type == 1}
		■まとめ買いの時は<br />
		同梱可能商品の場合、同じ買い物かごに入れた時、送料は加算されません。<br />
		<br />
		※送料はご注文１件につき、全国一律料金になります。<br />
		（離島への発送、また同梱不可商品、大型家電等の一部の商品を除く。）<br />
		<br />
		※一回のご注文(同じ買い物かご)で複数の商品をお買い求め頂いた場合、送料は一回分のみなりますが、別々にご注文を完了された場合は、それぞれ送料がかかります。<br />
		<br />
		■送料込み商品の扱い<br />
		送料は送料別の商品に合わせた送料となります。<br />
		<br />
		■送料にかかる消費税について<br />
		送料は消費税を含んでいます。<br />
		<br />
	{*}地域別送料{*}
	{elseif $app.postage_type == 2}
		{$app.postage_list.1.name}<br />
		{$app.postage_list.1.fee|number_format}円<br />
		<br />
		{$app.postage_list.2.name}　{$app.postage_list.3.name}　{$app.postage_list.4.name}<br />
		{$app.postage_list.2.fee|number_format}円<br />
		<br />
		{$app.postage_list.5.name}　{$app.postage_list.6.name}　{$app.postage_list.7.name}<br />
		{$app.postage_list.5.fee|number_format}円<br />
		<br />
		{$app.postage_list.8.name}　{$app.postage_list.9.name}　{$app.postage_list.10.name}　{$app.postage_list.11.name}　{$app.postage_list.12.name}　{$app.postage_list.13.name}　{$app.postage_list.14.name}<br />
		{$app.postage_list.8.fee|number_format}円<br />
		<br />
		{$app.postage_list.15.name}<br />
		{$app.postage_list.15.fee|number_format}円<br />
		<br />
		{$app.postage_list.16.name}　{$app.postage_list.17.name}　{$app.postage_list.18.name}　{$app.postage_list.19.name}　{$app.postage_list.20.name}　{$app.postage_list.21.name}　{$app.postage_list.22.name}　{$app.postage_list.23.name}　{$app.postage_list.24.name}　{$app.postage_list.25.name}　{$app.postage_list.26.name}　{$app.postage_list.27.name}　{$app.postage_list.28.name}　{$app.postage_list.29.name}　{$app.postage_list.30.name}　{$app.postage_list.31.name}<br />
		{$app.postage_list.16.fee|number_format}円<br />
		<br />
		{$app.postage_list.32.name}　{$app.postage_list.33.name}　{$app.postage_list.34.name}　{$app.postage_list.35.name}　{$app.postage_list.36.name}<br />
		{$app.postage_list.32.fee|number_format}円<br />
		<br />
		{$app.postage_list.37.name}　{$app.postage_list.38.name}　{$app.postage_list.39.name}　{$app.postage_list.40.name}<br />
		{$app.postage_list.37.fee|number_format}円<br />
		<br />
		{$app.postage_list.41.name}　{$app.postage_list.42.name}　{$app.postage_list.43.name}　{$app.postage_list.44.name}　{$app.postage_list.45.name}　{$app.postage_list.46.name}　{$app.postage_list.47.name}<br />
		{$app.postage_list.41.fee|number_format}円<br />
		<br />
		{$app.postage_list.48.name}　{$app.postage_list.49.name}<br />
		{$app.postage_list.48.fee|number_format}円<br />
		<br />
		■まとめ買いの時は<br />
		同梱可能商品の場合、同じ買い物かごに入れた時、送料は加算されません。<br />
		<br />
		■送料込み商品の扱い<br />
		送料は送料別の商品に合わせた送料となります。<br />
		<br />
		■送料にかかる消費税について<br />
		送料は消費税を含んでいます。<br />
		<br />
	{*}購入金額{*}
	{elseif $app.postage_type == 3}
		一回のご注文(同じ買い物かご)で商品代金の合計が{$app.postage_total_price_set|number_format}円以上お買い求め頂いた場合、送料は無料となります。<br />
		※別々にご注文を完了された場合は、それぞれ送料がかかります。<br />
		※離島への発送、また同梱不可商品、大型家電等の一部の商品を除きます。<br />
		<br />
		■送料込み商品の扱い<br />
		送料は送料別の商品に合わせた送料となります。<br />
		<br />
		■送料にかかる消費税について<br />
		送料は消費税を含んでいます。<br />
		<br />
	{*}購入個数{*}
	{elseif $app.postage_type == 4}
		一回のご注文(同じ買い物かご)で{$app.postage_total_piece_set}個以上の商品をお買い求め頂いた場合、送料は無料となります。<br />
		※別々にご注文を完了された場合は、それぞれ送料がかかります。<br />
		※離島への発送、また同梱不可商品、大型家電等の一部の商品を除きます。<br />
		<br />
		■送料込み商品の扱い<br />
		送料は送料別の商品に合わせた送料となります。<br />
		<br />
		■送料にかかる消費税について<br />
		送料は消費税を含んでいます。<br />
		<br />
	{/if}
	
	{*}共通{*}
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
