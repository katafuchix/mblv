{include file="user/header.tpl"}

<!--����ʧ����ˡ����-->
{html_style type="title" title="������ʧ����ˡ��" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="left" style="text-align:left;font-size:small">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	����ʧ��ˡ�����򤷤Ƥ���������<br />
	
	{if $app.no_conv}{$app.no_conv}<br />{/if}
	{form action="`$config.ssl_url``$script`" ethna_action="user_ec_order_type_index"}
		{select name="user_order_type" list=$app.order_type_list value=$form.user_order_type}<br /><br />
		{if $app.user.user_point > 0}
			���������(�ǹ�)��{$app.total_price|number_format}��<br />
			���������(����)��{$app.total_price_taxout|number_format}��<br />
			<br />
			���ߤν�ͭ{$config.point_name}��{$app.user.user_point|number_format}{$config.point_unit}<br />
			{form_input name="user_order_use_point_status" }<br />
			��{$config.point_unit}�����ѤǤ����¹�Ͼ�������ס����̡ˤޤǤȤʤäƤ���ޤ���<br />
			{form_input name="user_order_use_point" value="`$app.user_order_user_point`" size="10" istyle="4" mode="numeric"}<br /><br />
		{/if}
		<div style="text-align:center">{form_submit value="��Ѿ������ϲ��̤�"}</div><br />
	{/form}
	
</div>
<!--����ʧ����ˡ��λ-->

{include file="user/footer.tpl"}
