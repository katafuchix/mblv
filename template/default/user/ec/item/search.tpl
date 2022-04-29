{include file="user/header.tpl"}

<!--検索開始-->
{html_style type="title" title="■詳細検索■" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
細かい条件を指定して商品を捜すことができます。<br />
<div align="left" style="text-align:left;font-size:small">
	<hr>
	{form action="$script" ethna_action="user_ec_item_list"}
		{form_name  name="keyword"}<br />
		{form_input name="keyword"}<br />
		{form_name  name="item_category"}<br />
		{form_input name="item_category" emptyoption="指定しない"}<br />
		{form_name  name="sort_order"}<br />
		{form_input name="sort_order" emptyoption="指定しない"}<br />
		予算<br />
		{form_input name="price_start" istyle="4"}円から<br />
		{form_input name="price_end" istyle="4"}円まで<br />
		{form_name  name="item_order_type"}<br />
		{form_input name="item_order_type" emptyoption="すべての商品を表示"}<br />
		{form_input name="search"}
	{/form}
	<hr>
	{form action="$script" ethna_action="user_ec_shop_list"}
		{form_name  name="shop_name"}検索<br />
		{form_input name="shop_name"}
		{form_input name="search"}
	{/form}
	<hr>
</div>
<br />

{include file="user/footer.tpl"}
