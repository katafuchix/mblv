{include file="user/header.tpl"}

<!--����ʸ��������ϳ���-->
{html_style type="title" title="�����ڎ��ގ��Ď����Ď޾���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	{form action="$script" ethna_action="user_ec_order_check"}
		{$app_ne.hidden_vars}
		
		���ڎ��ގ��Ď����Ď޾�������Ϥ��Ƥ���������<br /><br />
		
		{form_name name="user_order_card_type"}<br />
		{form_input name="user_order_card_type"}<br /><br />
		
		{form_name name="user_order_card_number"}<br />
		<span style="color:red;">�����٤�Ⱦ�ѿ��������Ϥ��Ƥ���������</span><br />
		{form_input name="user_order_card_number" size="25" istyle="4" mode="numeric"}<br /><br />
		
		{form_name name="user_order_card_name"}<br />
		<span style="color:red;">�������Ďޤ�ɽ���ɤ�������Ϥ��Ƥ�������</span><br />
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
			{form_submit value="����ǧ���̤ء�"}
		</div>
		<br />
	{/form}
	<!--����ʸ��������Ͻ�λ-->
</div>


{include file="user/footer.tpl"}

