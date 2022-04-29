{include file="user/header.tpl"}

<!--ご注文情報の入力開始-->
{html_style type="title" title="■代引き情報■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	{form action="$script" ethna_action="user_ec_order_check"}
		{$app_ne.hidden_vars}
		
		発送方法は佐川急便のEｺﾚｸﾄです。現金のみになり､ｸﾚｼﾞｯﾄｶｰﾄﾞ､ﾃﾞﾋﾞｯﾄｶｰﾄﾞはご利用できません。<br /><br />
		
		<span style="color:{$title_bgcolor}">▼{form_name name="user_order_delivery_type"}</span><br />
		{form_input name="user_order_delivery_type"}<br /><br />		
		
		<span style="color:{$title_bgcolor}">▼{form_name name="user_order_delivery_day"}</span><br />
		{form_input name="user_order_delivery_day"}<br /><br />
		
		<span style="color:{$title_bgcolor}">▼{form_name name="user_order_delivery_note"}</span><br />
		{form_input name="user_order_delivery_note" size="25" istyle="1" mode="hiragana"}<br /><br />
		
		<div style="text-align:center">
			{form_submit value="　確認画面へ　"}
		</div>
		<br />
		
	{/form}
	<br />
</div>
<!--ご注文情報の入力終了-->

{include file="user/footer.tpl"}
