{include file="user/header.tpl"}

<!--�㤤ʪ��������-->
{html_style type="title" title="���㤤ʪ�����ޢ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	
	{if $app.cart_list}
	{foreach from=$app.cart_list item=i}
		����̾:<a href="?action_user_ec_item=true&item_id={$i.item_id}">{$i.item_name}</a><br />
		{if !$i.item_one_type_flag}�����̎�:{$i.item_type}<br />{/if}
		����:{$i.item_price|number_format}��(�ǹ�)<br />
		�Ŀ�:{$i.cart_item_num}<br />
		<a href="?action_user_ec_item_delete_do=true&stock_id={$i.stock_id}&cart_id={$i.cart_id}">���</a>
		<hr color="{$hrcolor}" style="border-color:{$hrcolor};border-style:solid" noshade>
	{/foreach}
	���ʹ��:{$app.total_price|number_format}��(�ǹ�)<br /><br />
	{/if}
	
	{*}<span style="color:red;">�������Ϥ���ʸ�κǸ�ˤ���ʸ��ۤ˲û�����ޤ���</span><br /><br />{*}
	
	
	{if $app.cart_list}
	<div align="center" style="text-align:center">
		{form action="`$config.ssl_url``$script`" ethna_action="user_ec_order"}
			{form_input name="total_price" value="`$app.total_price`"}
			{form_input name="order" value="��ʸ���̤ؿʤ�"}
		{/form}
	</div>
	{/if}
	<div align="center" style="text-align:center">
		{form action="$script" ethna_action="user_ec"}
			{form_input name="spg_go_on" value="���㤤ʪ��³����"}
		{/form}
	</div>
	<br />
	
	<!--�������ᾦ�ʳ���-->
	{if $app_ne.shop_recommend_list}
		{html_style type="title" title="[x:0139]�������ᾦ��[x:0139]" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
		������ξ��ʤ⤪�����ᡣ<br />
		{foreach from=$app_ne.shop_recommend_list item=i key=k}
			<table valign="top">
				<tr>
					<td valign="top">
						<div style="float:left">
							{if $i.item_image}
								<img align="left" style="text-align:left;float:left;" src="f.php?file_name=thumb/{$i.item_image|escape}&contents=item" >
							{else}
								<img align="left" style="text-align:left;float:left;" src="f.php?file_name=item1.jpg&contents=item" >
							{/if}
						</div>
					</td>
					<td valign="top">
						<span style="float:left">
							<a href="?action_user_ec_item=true&item_id={$i.item_id|escape}">{$i.item_name|escape}</a><br />{$i.item_text1}
						</span>
					</td>
				</tr>
			</table>
			{*html_style type="br"*}
			<hr color="{$hrcolor}" style="border-color:{$hrcolor};border-style:solid;clear:both;" noshade>
		{/foreach}
	{/if}
	<!--�������ᾦ�ʽ�λ-->
	
</div>
<!--�㤤ʪ������λ-->

{include file="user/footer.tpl"}
