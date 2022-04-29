<!--ヘッダー-->
{include file="user/header.tpl"}

{html_style type="title" title="支払い方法について" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}

<div align="left" style="text-align:left;font-size:small">
	■お支払いについて<br />
	以下の支払方法がご利用になれます｡<br />
	<br />
	{if $app.item_use_credit_status == 1}
		・クレジットカード決済<br />
	{/if}
	{if $app.item_use_conveni_status == 1}
	・コンビニ決済<br />
	ファミリーマート<br />
	ローソン<br />
	セブンイレブン<br />
	{/if}
	{if $app.item_use_transfer_status == 1}
	･銀行振込確認後に商品発送<br />
	{/if}
	{if $app.item_use_exchange_status == 1}
		･代金引換便<br />
		<br />
		■<a href="?action_user_ec_item_exchange_detail=ture&item_id={$form.item_id}">代引手数料について</a><br />
	{/if}
	<br />
</div>

<!--フッター-->
{include file="user/footer.tpl"}
