{include file="user/header.tpl"}

<!--��������-->
{html_style type="title" title="���ܺٸ�����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
�٤���������ꤷ�ƾ��ʤ��ܤ����Ȥ��Ǥ��ޤ���<br />
<div align="left" style="text-align:left;font-size:small">
	<hr>
	{form action="$script" ethna_action="user_ec_item_list"}
		{form_name  name="keyword"}<br />
		{form_input name="keyword"}<br />
		{form_name  name="item_category"}<br />
		{form_input name="item_category" emptyoption="���ꤷ�ʤ�"}<br />
		{form_name  name="sort_order"}<br />
		{form_input name="sort_order" emptyoption="���ꤷ�ʤ�"}<br />
		ͽ��<br />
		{form_input name="price_start" istyle="4"}�ߤ���<br />
		{form_input name="price_end" istyle="4"}�ߤޤ�<br />
		{form_name  name="item_order_type"}<br />
		{form_input name="item_order_type" emptyoption="���٤Ƥξ��ʤ�ɽ��"}<br />
		{form_input name="search"}
	{/form}
	<hr>
	{form action="$script" ethna_action="user_ec_shop_list"}
		{form_name  name="shop_name"}����<br />
		{form_input name="shop_name"}
		{form_input name="search"}
	{/form}
	<hr>
</div>
<br />

{include file="user/footer.tpl"}
