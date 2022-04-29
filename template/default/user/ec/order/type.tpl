{include file="user/header.tpl"}

<!--お支払い方法開始-->
{html_style type="title" title="■お支払い方法■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	お支払方法を選択してください｡<br />
	
	{if $app.no_conv}{$app.no_conv}<br />{/if}
	{form action="`$config.ssl_url``$script`" ethna_action="user_ec_order_type_index"}
		{select name="user_order_type" list=$app.order_type_list value=$form.user_order_type}<br /><br />
		{if $app.user.user_point > 0}
			商品代金合計(税込)：{$app.total_price|number_format}円<br />
			商品代金合計(税別)：{$app.total_price_taxout|number_format}円<br />
			<br />
			現在の所有{$config.point_name}：{$app.user.user_point|number_format}{$config.point_unit}<br />
			{form_input name="user_order_use_point_status" }<br />
			※{$config.point_unit}が使用できる上限高は商品代金合計（税別）までとなっております。<br />
			{form_input name="user_order_use_point" value="`$app.user_order_user_point`" size="10" istyle="4" mode="numeric"}<br /><br />
		{/if}
		<div style="text-align:center">{form_submit value="決済情報入力画面へ"}</div><br />
	{/form}
	
</div>
<!--お支払い方法終了-->

{include file="user/footer.tpl"}
