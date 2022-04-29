<!--ヘッダー-->
{include file="user/header.tpl"}

{html_style type="title" title="送料について" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}

<div align="left" style="text-align:left;font-size:small">
	■送料<br />
	商品代金とは別に送料がかかります。<br />
	┗料金表は<a href="?action_user_ec_item_postage_detail=true&item_id={$form.item_id}">こちら</a><br />
	送料が異なる商品との同梱はできません。予めご了承ください。<br />
	■消費税<br />
	消費税は商品代金に含まれます。<br />
	＊消費税率 5％<br />
	＊消費税計算方法:購入商品合計に対して消費税率計算<br />
	＊1円未満消費税端数: 切り捨て<br />
	<br />
	※詳細は店舗に直接お問い合わせください。<br />
	お問い合わせ先：{$mall_name}<br />
	e-mail:<a href="mailto:{$config.from_mailaddress}">{$config.from_mailaddress}</a><br />
	TEL:0422-70-0275 10:00-18:00（土日、祝日を除く）<br />
	<br />
</div>

<!--フッター-->
{include file="user/footer.tpl"}
