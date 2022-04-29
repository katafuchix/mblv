{include file="user/header.tpl"}

<!--ご注文情報の入力開始-->
{html_style type="title" title="■ｺﾝﾋﾞﾆ店舗選択■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	{form action="$script" ethna_action="user_ec_order_check"}
		{$app_ne.hidden_vars}
		
		<span style="color:#FF1493">▼{form_name name="user_order_conveni_type"}</span><br />
		お支払先のｺﾝﾋﾞﾆを選択してください。<br />
		<span style="color:#ff0000">※支払い方法は注文確認ﾒｰﾙに記載致します</span><br />
		{form_input name="user_order_conveni_type" separator="<br />"}<br /><br />
		
		<span style="color:#FF1493">▼{form_name name="user_order_delivery_type"}</span><br />
		{form_input name="user_order_delivery_type"}<br /><br />
		
		<span style="color:#FF1493">▼{form_name name="user_order_delivery_day"}</span><br />
		{form_input name="user_order_delivery_day"}<br /><br />
		
		<span style="color:#FF1493">▼{form_name name="user_order_delivery_note"}</span><br />
		{form_input name="user_order_delivery_note" size="25" istyle="1" mode="hiragana"}<br /><br />
		
		<div style="text-align:center">
			{form_submit value="　確認画面へ　"}
		</div>
		<br />
	{/form}
</div>
<!--ご注文情報の入力終了-->

{include file="user/footer.tpl"}
