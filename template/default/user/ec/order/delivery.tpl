{include file="user/header.tpl"}

<!--���Ϥ�������곫��-->
{html_style type="title" title="�����Ϥ�����ꢣ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	
	{form action="$script" ethna_action="user_ec_order_check"}
		
		{$app_ne.hidden_vars}
		
		���Ϥ����������Ϥ��Ƥ���������<br />
		<span style="color:#ff0000">*</span>���ΤĤ������ܤ�ɬ�����Ϥ��Ƥ���������<br /><br />
		
		
		{form_name  name="user_order_delivery_name"}<span style="color:#ff0000">*</span><br />
		{form_input name="user_order_delivery_name" size="25" istyle="1" mode="hiragana"}<br /><br />
		
		
		{form_name  name="user_order_delivery_name_kana"}<span style="color:#ff0000">*</span><br />
		{form_input name="user_order_delivery_name_kana" size="25" istyle="2" mode="hankakukana"}<br /><br />
		
		
		{form_name  name="user_order_delivery_zipcode"}<br />
		���1234567<span style="color:#ff0000">*</span><br />
		{form_input name="user_order_delivery_zipcode" size="10" istyle="4" mode="numeric"}<br /><br />
		
		
		{form_name  name="user_order_delivery_region_id"}<span style="color:#ff0000">*</span><br />
		{form_input  name="user_order_delivery_region_id"}<br /><br />
		
		{form_name  name="user_order_delivery_address"}<span style="color:#ff0000">*</span><br />
		{form_input name="user_order_delivery_address" size="25" istyle="1" mode="hiragana"}<br /><br />
		
		
		{form_name  name="user_order_delivery_address_building"}<br />
		{form_input name="user_order_delivery_address_building" size="25" istyle="1" mode="hiragana"}<br /><br />
		
		
		{form_name  name="user_order_delivery_phone"}:<span style="color:#ff0000">*</span><br />
		{form_input name="user_order_delivery_phone" size="10" istyle="4" mode="numeric"}
		
		
		<div style="text-align:center">
			{form_submit value="����ǧ���̤ء�"}
		</div>
		<br />
	{/form}
</div>
<!--���Ϥ�������꽪λ-->

{include file="user/footer.tpl"}
