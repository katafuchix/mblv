{include file="user/header.tpl"}

<!--����ʸ��������ϳ���-->
{html_style type="title" title="�����ݎˎގ�Ź������" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	{form action="$script" ethna_action="user_ec_order_check"}
		{$app_ne.hidden_vars}
		
		<span style="color:#FF1493">��{form_name name="user_order_conveni_type"}</span><br />
		����ʧ��Ύ��ݎˎގƤ����򤷤Ƥ���������<br />
		<span style="color:#ff0000">����ʧ����ˡ����ʸ��ǧ�Ҏ��٤˵����פ��ޤ�</span><br />
		{form_input name="user_order_conveni_type" separator="<br />"}<br /><br />
		
		<span style="color:#FF1493">��{form_name name="user_order_delivery_type"}</span><br />
		{form_input name="user_order_delivery_type"}<br /><br />
		
		<span style="color:#FF1493">��{form_name name="user_order_delivery_day"}</span><br />
		{form_input name="user_order_delivery_day"}<br /><br />
		
		<span style="color:#FF1493">��{form_name name="user_order_delivery_note"}</span><br />
		{form_input name="user_order_delivery_note" size="25" istyle="1" mode="hiragana"}<br /><br />
		
		<div style="text-align:center">
			{form_submit value="����ǧ���̤ء�"}
		</div>
		<br />
	{/form}
</div>
<!--����ʸ��������Ͻ�λ-->

{include file="user/footer.tpl"}
