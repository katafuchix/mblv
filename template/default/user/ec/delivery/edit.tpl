{include file="user/header.tpl"}

<!--会員確認開始-->
{html_style type="title" title="■お客様情報編集■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	<br />
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $app.delivery_insufficient}
		配送先住所が設定されていません。<br />
		以下の項目にお客様の配送先情報を入力してください。<br />
	{/if}
	<span style="color:#ff0000">*</span>印のついた項目は必ず入力してください｡<br /><br />
	
	{form action="$script" ethna_action="user_ec_delivery_edit_do"}
	<div align="center" style="text-align:center;font-size:small;"> 
		{$app_ne.hidden_vars}
	</div>
	{form_name  name="user_name"}<span style="color:red;">*</span><br />
	{form_input name="user_name" istyle="1"}<br /><br />
	
	{form_name  name="user_name_kana"}<span style="color:red;">*</span><br />
	{form_input name="user_name_kana" istyle="2"}<br /><br />
	
	{form_name  name="user_zipcode"}<span style="color:red;">*</span><br />
	例）1234567<br />
	{form_input name="user_zipcode" size="10" istyle="4"}<br /><br />
	
	{form_name  name="region_id"}<span style="color:red;">*</span><br />
	{form_input name="region_id"}<br /><br />
	
	{form_name  name="user_address"}<span style="color:red;">*</span><br />
	{form_input name="user_address" size="25" istyle="1"}<br /><br />
	
	{form_name  name="user_address_building"}<br />
	例）ﾋﾞﾙ1001<br />
	{form_input name="user_address_building" size="25" istyle="1"}<br /><br />
	
	{form_name  name="user_phone"}<span style="color:red;">*</span><br />
	{form_input name="user_phone" size="20" istyle="4"}<br /><br />
	
	<br />
	<div style="text-align:center">
	{form_submit value="　編集する　"}
	</div>
	{/form}
</div>

<!--フッター-->
{include file="user/footer.tpl"}
