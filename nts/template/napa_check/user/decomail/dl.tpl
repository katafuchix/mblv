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
		
		<object data="{$config.file_url}decomail/{$form.decomail_file_a}" type="application/x-kddi-htmlmail" standby="���ގ��ݎێ��Ď�">
			<param name="disposition" value="dev1htm" valuetype="data" />
			<param name="title" value="{$form.decomail_name}" valuetype="data" />
		</object>
	{/if}
</div>
<br />
<br />
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl" title_bgcolor="#ff6699" hrcolor="#ff6699" title="(C)���͎ߎ���������"}
