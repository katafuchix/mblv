<!--�إå���-->
{include file="user/header.tpl" title="�ʥѥ�����ǥ�����������" bgcolor="#ffffff" text="#808080" link="#3399FF" vlink="#3399FF"}


<!-- NAPATOWN���� -->
<div style="background-color:#ff6699; text-align:center; font-size:xx-small;">
<span style="color:#00ff00">���������</span><br />
</div>
<div style="background-color:#ffffff; text-align:center; font-size:xx-small;">
	{if $form.decomail_file2}<img src="f.php?file=decomail/{$form.decomail_file2}&SESSID={$SESSID}">{/if}
	<br />
	<br />
	�����{$session.user.user_point}{$ft.point.name}<br />
	���ʡ�{$form.decomail_point}{$ft.point.name}<br /><br />
	{if $form.decomail_stock_status == 1 && 0 >= $form.decomail_stock_num}
		{* ����ڤ� *}
		<span style="color:red;font-size:small">���ѿ���������ޤ��󤬤���{$ft.decomail.name}������ڤ�Ƥ��ޤ��ޤ�����</span>
		{elseif $form.decomail_end_status == 1 && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' > $form.decomail_end_time}
		{* �ۿ����ֽ�λ *}
		<span style="color:red;font-size:small">���ѿ���������ޤ��󤬤���{$ft.decomail.name}��������֤���λ���Ƥ��ޤ��ޤ�����</span>
		{else}
		{* ������ *}
		
		{if $carrier=="AU" && $form.decomail_file_a|regex_replace:"/.*khm.*/i":"khm" eq "khm"}
			<!--AU�ǥ��᡼��ƥ�ץ졼�Ȥξ��Τߤν���-->
			{form action="$script" ethna_action="user_decomail_buy_do"}
				{form_input name="decomail_id"}
				{form_submit value="����"}
			{/form}
		{else}
			{form action="$script" ethna_action="user_decomail_buy_do"}
				{form_input name="decomail_id"}
				{form_submit value="���ގ��ݎێ��Ď�"}
			{/form}
		{/if}
	{/if}
</div>
<br />
<br />
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl" title_bgcolor="#ff6699" hrcolor="#ff6699" title="(C)���͎ߎ���������"}
