{include file="user/header.tpl"}

<!--ご注文情報の入力開始-->
{html_style type="title" title="■ｸﾚｼﾞｯﾄｶｰﾄﾞ情報■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	{form action="$script" ethna_action="user_ec_order_check"}
		{$app_ne.hidden_vars}
		
		ｸﾚｼﾞｯﾄｶｰﾄﾞ情報を入力してください｡<br /><br />
		
		{form_name name="user_order_card_type"}<br />
		{form_input name="user_order_card_type"}<br /><br />
		
		{form_name name="user_order_card_number"}<br />
		<span style="color:red;">※すべて半角数字で入力してください。</span><br />
		{form_input name="user_order_card_number" size="25" istyle="4" mode="numeric"}<br /><br />
		
		{form_name name="user_order_card_name"}<br />
		<span style="color:red;">※ｶｰﾄﾞの表示どおりに入力してください</span><br />
		{form_input name="user_order_card_name" size="25" istyle="3" mode="alphabet"}<br /><br />
		
		{form_name name="user_order_card_month"}<br />
		{form_input name="user_order_card_month"}
		&nbsp;/&nbsp;
		{form_input name="user_order_card_year"}<br /><br />
		
		{form_name  name="user_order_card_revo_status"}<br />
		{form_input name="user_order_card_revo_status"}<br /><br />
		
		{form_name name="user_order_delivery_type"}<br />
		{form_input name="user_order_delivery_type"}<br /><br />
		
		{form_name name="user_order_delivery_day"}<br />
		{form_input name="user_order_delivery_day"}<br /><br />
		
		{form_name name="user_order_delivery_note"}<br />
		{form_input name="user_order_delivery_note" size="25" istyle="1" mode="hiragana"}<br /><br />
		
		<div style="text-align:center">
			{form_submit value="　確認画面へ　"}
		</div>
		<br />
	{/form}
	<!--ご注文情報の入力終了-->
</div>


{include file="user/footer.tpl"}

