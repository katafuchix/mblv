{include file="user/header.tpl"}

<form action="{$script}" method="post">

<!--����ʸ���Ƥγ�ǧ����-->
{html_style type="title" title="������ʸ���Ƥγ�ǧ ��" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	����ʸ���Ƥ򤴳�ǧ�ξ塢�֤������Ƥ���ʸ����׎Ύގ��ݲ����Ƥ���������<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;"> 
		<input type="hidden" name="action_user_ec_order_do" value="true">
		{$app_ne.hidden_vars}
		{form_submit value="�������Ƥ���ʸ����"}
	</div>
	<br />
	{foreach from=$app.cart_list item=c}
		<span style="color:{$title_bgcolor}">����̾:</span>{$c.item_name}<br />
		{if !$c.stock_one_type_status}<span style="color:{$title_bgcolor}">�������̎�:</span>{$c.item_type}<br />{/if}
		<span style="color:{$title_bgcolor}">�ġ���:</span>{$c.cart_item_num}<br />
		<span style="color:{$title_bgcolor}">������:</span>{$c.item_price|number_format}��(�ǹ�)<br /><br />
		<hr color="{$hrcolor}" style="border-color:{$hrcolor};border-style:solid" noshade>
	{/foreach}
	
	<span style="color:{$title_bgcolor}">�������{$config.point_name}:</span>{$app.user_order_get_point|number_format}{$config.point_unit}<br /><br />
	<span style="color:{$title_bgcolor}">������:</span>{$app.user_order_total_price1|number_format}��(�ǹ�)<br />
	<span style="color:{$title_bgcolor}"></span>(�������:{$app.user_order_tax|number_format}��)<br />
	<span style="color:{$title_bgcolor}">������:</span>{$app.user_order_postage|number_format}��(�ǹ�)<br />
	{if $form.user_order_type == 3}<span style="color:{$title_bgcolor}">�����:</span>{$app.user_order_exchange_fee|number_format}��(�ǹ�)<br />{/if}
	{if $form.user_order_use_point_status == 1}
	<span style="color:{$title_bgcolor}">{$config.point_name}����ʬ:</span>-{$app.user_order_expend_point|number_format}��<br />
	{/if}

	<span style="color:{$title_bgcolor}">�硡��:</span>{$app.user_order_total_price2|number_format}��(�ǹ�)<br /><br />
	
	{html_style type="title" title="������ʸ�Ծ����ǧ��" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<span style="color:{$title_bgcolor}">�ᡡ��̾:</span>{$form.user_name}<br />
	{if $form.user_zipcode}<span style="color:{$title_bgcolor}">͹���ֹ�:</span>{$form.user_zipcode}<br />{/if}
	<span style="color:{$title_bgcolor}">��������:</span>{$config.region_id[$form.region_id].name}&nbsp;{$form.user_address}&nbsp;{$form.user_address_building}<br />
	<span style="color:{$title_bgcolor}">��&nbsp;��&nbsp;��:</span>{$form.user_phone}<br />
	<span style="color:{$title_bgcolor}">�Ҏ��َ��Ďގڎ�:</span>{$form.user_mailaddress}<br />
	<br />
	
	{html_style type="title" title="�����Ϥ�������ǧ��" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{if $form.user_order_delivery_type == 1}����ʸ�Ԥ�Ʊ��<br />
	{elseif $form.user_order_delivery_type == 2}
		<span style="color:{$title_bgcolor}">�ᡡ��̾:</span>{$form.user_order_delivery_name}<br />
	{if $form.user_order_delivery_zipcode}<span style="color:{$title_bgcolor}">͹���ֹ�:</span>{$form.user_order_delivery_zipcode}<br />{/if}
		<span style="color:{$title_bgcolor}">���Ϥ���:</span>{$config.region_id[$form.user_order_delivery_region_id].name}&nbsp;{$form.user_order_delivery_address}&nbsp;{$form.user_order_delivery_address_building}<br />
		<span style="color:{$title_bgcolor}">��&nbsp;��&nbsp;��:</span>{$form.user_order_delivery_phone}<br />
	{/if}
	<span style="color:{$title_bgcolor}">��ã���ֻ���:</span>
	{$config.delivery_date[$form.user_order_delivery_day].name}
	<br />
	{if $form.user_order_delivery_note}
		<span style="color:{$title_bgcolor}">��������:</span>{$form.user_order_delivery_note}<br />
	{/if}
	<br />
	<div align="center" style="text-align:center"> 
		{form_submit value="�������Ƥ���ʸ����"}
	</div>
	<br />
	
	{html_style type="title" title="������ʧ��ˡ��ǧ��" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{if $form.user_order_type == 1}
		���ڎ��ގ��Ď����Ď޷��<br />
		<span style="color:{$title_bgcolor}">�����Ď޲��:</span>
			{if $form.user_order_card_type == 1}
			VISA
			{elseif $form.user_order_card_type == 2}
			JCB
			{elseif $form.user_order_card_type == 3}
			AMEX
			{elseif $form.user_order_card_type == 4}
			MASTER
			{elseif $form.user_order_card_type == 5}
			DINERS
			{/if}
			<br />
		<span style="color:{$title_bgcolor}">�����Ď��ֹ�:</span>****************<br />
		<span style="color:{$title_bgcolor}">��̾����:</span>{$form.user_order_card_name}<br />
		<span style="color:{$title_bgcolor}">ͭ������:</span>{$form.user_order_card_month}/{$form.user_order_card_year}<br />
		
		{if $form.user_order_card_revo_status == 1}
			<span style="color:{$title_bgcolor}">����ʧ���:</span>���ʧ��<br />
		{else}
			<span style="color:{$title_bgcolor}">����ʧ���:</span>����ʧ��<br />
		{/if}
		
	{elseif $form.user_order_type == 2}
		���ݎˎގ�ʧ��<br />
		<span style="color:{$title_bgcolor}">���ݎˎގ�:</span>
	{if $form.user_order_conveni_type == "seveneleven"}���̎ގݎ��ڎ̎ގ�{elseif $form.user_order_conveni_type == "lawson"}�ێ�����{elseif $form.user_order_conveni_type == "famima"}�̎��Ў؎��ώ���{elseif $form.user_order_conveni_type == "seicomart"}���������ώ���{/if}
	{elseif $form.user_order_type == 3}
		�����<br />
	{elseif $form.user_order_type == 4}
		��Կ���<br />
		�����ְ���˻���ζ�Ը��¤ˤ������ߤ���������<br />
		�������߳�ǧ�徦��ȯ���Ȥʤ�ޤ���<br />
		�嵭�ι�פ���ʸ���Ƴ�ǧ�᡼��˵��ܤθ��¤ޤǤ������ߤ���������<br />
	{/if}
	<br />
	
	{html_style type="title" title="�������ǤˤĤ��Ƣ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<span style="color:{$title_bgcolor}">������Ψ:</span>5%<br />
	<span style="color:{$title_bgcolor}">�����Ƿ׻����:</span>��������˾����Ƿ׻�<br />
	<span style="color:{$title_bgcolor}">1��̤��������ü��:</span>�ڼΤ�<br />
	<br />
	
	<div align="center" style="text-align:center"> 
		{form_submit value="�������Ƥ���ʸ����"}
	</div>
</div>
{uniqid}
</form>
<br />
<!--����ʸ���Ƥγ�ǧ��λ-->

{include file="user/footer.tpl"}
