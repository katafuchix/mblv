{include file="user/header.tpl"}

<!--���ʰ�������-->
{html_style type="title" title=$form.item_category_name bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
</div>

<!--�ѥ󤯤�-->
<span style="font-size:small"><a href="?action_user_ec=true">TOP</a>��<a href="?action_user_ec_shop=true&shop_id={$app.shop_id}">{$app.shop_name}</a>��{$form.item_category_name}</span>
<br />

<!--�ե꡼���ڡ�������-->
{$app_ne.item_category_contents_body|nl2br}
<!--�ե꡼���ڡ�����λ-->

<!--���󥫡���-->
<div align="left" style="text-align:left;font-size:small;"><a href="#sort">���¤��ؤ����ʤ����</a></div>

<!--�ڡ���ɽ��-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($app.listview_data) == 0}
		�������˹��פ��뾦�ʤϸ��Ĥ���ޤ���Ǥ�����<br />
		<br />
	{else}
		�������˹��פ��뾦�ʤ�{$app.listview_total}�︫�Ĥ���ޤ�����
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		{include file="user/pager.tpl"}
	{/if}
</div>

<!--���ʰ�������-->
<div align="left" style="text-align:left;font-size:small">
	{foreach from=$app.listview_data item=i name=n}
		{if $i.item_image}
			<img align="left" style="text-align:left;float:left;" width="53" height="46" src="?action_user_ec_file_get=true&file_name=thumb/{$i.item_image|escape}&type=item" >
		{/if}
		<a href="?action_user_ec_item=true&item_id={$i.item_id}">{$i.item_name}</a><br />
		{$i.item_price|number_format}��{html_style type="br"}
	{/foreach}
	<!--�ڡ����㡼-->
	{include file="user/pager.tpl"}
</div>

<!--���ʰ�����λ-->

<!--��������-->
<a name="sort" id="sort"></a>
<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
<div align="left" style="text-align:left;font-size:small;">
	{form action="$script"  ethna_action="user_ec_item_list"}
		{form_input name="item_category_id"}
		�¤��ؤ�<br />
		{form_input name="sort_order" emptyoption="���ꤷ�ʤ�"}{form_input name="search" value="�¤��ؤ�"}<br /><br />
		�ʤ���߸���<br />
		{form_input name="keyword" size="8"}{form_input name="search" value="������"}<br /><br />
		���ʤǹʤ����<br />
		{form_input name='price_start' istyle="4" mode="numeric" size="6"}��{form_input name='price_end' istyle="4" mode="numeric" size="6"}��{form_input name="search" value="�ʤ����"}
	{/form}
</div>
<!--������λ-->

{include file="user/supportmenu.tpl"}

<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">

<div align="left" style="text-align:left;font-size:small;">
	<a href="?action_user_ec_shop=true&shop_id={$app.shop_id}">�ͥ���å�TOP��</a><br />
</div>

{include file="user/footer.tpl"}
