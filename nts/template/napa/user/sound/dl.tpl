<!--�إå���-->
{include file="user/header.tpl" title="�ʥѥ������夦��DL" bgcolor="#ffffff" text="#666666" link="#3399FF" vlink="#3399FF"}

<!--�����ȥ�-->
<div align="center" style="text-align:center;">
	{if $form.sound_category_file1}<img src="f.php?file=sound/{$form.sound_category_file1}&SESSID={$SESSID}">{/if}
</div>

<!--
{html_style type="title" title="`$ft.sound.name`���ގ��ݎێ��Ď�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
-->


<!--����ƥ�ĳ���-->

<!--�ե�����̾-->
<div style="text-align:center;background-color:{$form.sound_category_color}" align="center"><span style="color:#ffffff">{$form.sound_name}</span></div>

<!--�ݥ���ȿ�-->
<div align="right" style="text-align:right;">
	<span style="font-size:x-small;color:{$form.sound_category_color}">�ڎ��ގ��ݎێ��Ď�{if $form.sound_point == 0}̵����{else}{$form.sound_point}{$ft.point.name}{/if}��</span>
</div>

<!--������-->
<hr size="2" color="{$form.sound_category_color}" style="border:solid 1px {$form.sound_category_color}"></hr>
<div align="left">
	<span style="font-size:x-small;color:{$form.sound_category_color}">{$form.sound_desc}</span>
</div>
<hr size="2" color="{$form.sound_category_color}" style="border:solid 1px {$form.sound_category_color}"></hr>

<!--���������-->
<div align="center" style="text-align:center;font-size:small;">
	{if $form.sound_stock_status == 1 && 0 >= $form.sound_stock_num}
	{* ����ڤ� *}
	<span style="color:red;font-size:small">���ѿ���������ޤ��󤬤���{$ft.sound.name}������ڤ�Ƥ��ޤ��ޤ�����</span>
	{elseif $form.sound_end_status == 1 && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' > $form.sound_end_time}
	{* �ۿ����ֽ�λ *}
	<span style="color:red;font-size:small">���ѿ���������ޤ��󤬤���{$ft.sound.name}��������֤���λ���Ƥ��ޤ��ޤ�����</span>
	{else}
	{* ������ *}
		{if $app.low_term}
			<!--����ü���ξ�票�顼��ɽ��-->
			<span style="color:#ff3366">�������ͤ�ü����<br>���б��ȤʤäƤ���ޤ���</span><br />
			<!--�б��������-->
			<a href="fp.php?code=sound_device"><span style="color:#00cccc"><strong>�б��������</strong></span></a>
		{else}
			{if $carrier=="AU"}
			<object data="{$config.file_url}sound/{$form.sound_file_a}" type="audio/3gpp2" standby="���ގ��ݎێ��Ď�">
				<param name="disposition" value="devmpzz" valuetype="data" />
				<param name="size" value="{$form.file_size_row}" valuetype="data" />
				<param name="title" value="{$form.sound_name}" valuetype="data" />
			</object>
			{else}
			<a href="{$config.file_url}sound/{$form.sound_file_d}">���ގ��ݎێ��Ď�</a>
			{/if}
		{/if}
	{/if}
</div>

<!--�ե����륵����-->

<div align="center" style="font-size:small;color:#999999;text-align:center;"><span><strong>{$form.file_size}</strong></span></div>
<!--�̿�������-->

<div align="center" style="font-size:small;color:#999999;text-align:center;"><span>�����ގ��ݎێ��Ďޤˤ��̿�����<br>���Ӥ�����ޤ���</span></div>
<br>
<hr size="2" color="{$form.sound_category_color}" style="border:solid 1px {$form.sound_category_color}"></hr>

<!--����ƥ�Ľ�λ-->


<!--�եå���-->
{include file="user/footer.tpl" title_bgcolor="#ffffff" hrcolor="#000000" title="(C)���͎ߎ���������" title_fontcolor="#000000"}
