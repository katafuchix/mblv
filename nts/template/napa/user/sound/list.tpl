<!--�إå���-->
{include file="user/header.tpl" title="NAPATOWN�夦��" bgcolor="#ffffff" text="#666666" link="#3399FF" vlink="#3399FF"}


<!--�ԣϣ�-->
<div align="center" style="text-align:center;">
	{if $app.ac[$form.sound_category_id].sound_category_file1}<img src="f.php?file=sound/{$app.ac[$form.sound_category_id].sound_category_file1}&SESSID={$SESSID}">{/if}
	<div style="background-color:{$app.ac[$form.sound_category_id].sound_category_color}">
		<span style="font-size:x-small;color:#ffff99">[x:0138]</span>
		<span style="font-size:x-small;color:#ff3399">[x:0112]</span>
		<span style="font-size:x-small;color:#ffffff">�����</span>
		<span style="font-size:x-small;color:#ffff99">[x:0138]</span>
	</div>
</div>



<!--�����ȥ�-->
{*html_style type="title" title="`$ft.sound.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor*}


<!--����ƥ�ĳ���-->


	{foreach from=$app.listview_data item=item name=sound key =k}

		<a href="?action_user_sound_buy=true&sound_id={$item.sound_id}">
		<span style="font-size:small;color:{$app.ac[$form.sound_category_id].sound_category_color}">{if $k==0}<blink>[x:0112]</blink>{/if}</span>
		<span style="font-size:x-small;color:{$app.ac[$form.sound_category_id].sound_category_color}">��{$item.sound_name}</span></a>
		<div style="background-color:{$app.ac[$form.sound_category_id].sound_category_color}">
			<span style="font-size:x-small;color:#ffffff"><img src="img/l-white.gif">{$item.sound_desc}</span><br>
		<div align="right"><span style="font-size:x-small;color:#ffffff">&gt;�ڎ��ގ��ݎێ��Ď�{if $item.sound_point == 0}̵��!{else}{$item.sound_point}{$ft.point.name}{/if}��</span></div>
		</div>


	{/foreach}
	
	{include file="user/pager.tpl"}


<!--�����륫�ƥ���-->

<hr size="2" color="#666666"></hr>

<div style="background-color:#666666">
<div><span style="font-size:small;color:#ffffff">�����ގ��ݎ٤�������</span></div>
</div>

<div align="left">

	{foreach from=$app.ac item=item name=sound key =k}

		<a href="?action_user_sound_list=true&sound_category_id={$item.sound_category_id}">
			<span style="font-size:x-small;color:{if $item.sound_category_color}{$item.sound_category_color}{else}#000000{/if}">��{$item.name}</span>
		</a>
		<br>

	{/foreach}

</div>

<!--�Хʡ���-->
<hr align="center" size="1" width="240" color="#000000"></hr>
<div align="center" style="text-align:center;">
	{ad id="22"}
</div>


<!--
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $app.ac[$form.sound_category_id].name}
		<span style="color:{$form_name_color}">
		���Î��ގ�:
		</span>
		{$app.ac[$form.sound_category_id].name}<br /> 
	{/if}
	{*include file="user/pager.tpl"*}
	{html_style type="line" color="gray"}
	{foreach from=$app.listview_data item=item name=sound key =k}
			{if $item.sound_file1}<img src="f.php?file=sound/{$item.sound_file1}&SESSID={$SESSID}"><br />{/if}
			<a href="?action_user_sound_buy=true&sound_id={$item.sound_id}">{$item.sound_name}</a>&nbsp;&nbsp;{$item.sound_desc}
		{html_style type="line" color="gray"}
	{/foreach}
	{*include file="user/pager.tpl"*}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_sound=true">{$ft.sound.name}�Ύߎ����٤�</a><br />
</div>
-->
<!--����ƥ�Ľ�λ-->


	
<!--�եå���-->
{include file="user/footer.tpl" title_bgcolor="#ffffff" hrcolor="#000000" title="(C)���͎ߎ���������" title_fontcolor="#000000"}
