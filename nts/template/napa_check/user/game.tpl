<!--�إå���-->
{include file="user/header.tpl" title="�ʥѥ����󥲡���TOP" bgcolor="#ffffff" text="#666666" link="#006699" vlink="#3399FF"}

<!--�����ȥ�-->
<div align="center">
	<a name="top"></a> <img src="img_napa/game/img/logo1.gif"><br>
	Flash���ގ��Ѥ���ͷ������!!<br>
<!--
	<a href="http://i.spaceout-inc.jp/j000/top.jsp"><img src="img_napa/game/img/1.gif" width="220"></a><br>-->
</div>

<!--
{html_style type="title" title="`$ft.game.name`�Ύߎ�����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
-->


{$app_ne.cms_html1}

<!--��������ƥ�ĳ���-->
<span style="color:red">[x:0112]</span>�ʥѥ�����NEWS<br>
	{if count($app.listview_data)}
		{foreach from=$app.listview_data item=news}
			��{$news.news_time}<a href="?action_user_news_view=true&news_id={$news.news_id}&return=game">{$news.news_title}</a><br />
		{/foreach}
	{/if}
<!--
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{$app_ne.cms_html1}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />
	{if count($app.listview_data)}
		{foreach from=$app.listview_data item=news}
			[x:0112]{$news.news_time}&nbsp;<a href="?action_user_news_view=true&news_id={$news.news_id}&return=game">{$news.news_title}</a><br />{* NAPATOWN *}
			{* [x:0112]{$news.news_time}&nbsp;<a href="?action_user_news_view=true&news_id={$news.news_id}">{$news.news_title}</a><br /> *}
		{/foreach}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />
	{/if}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_game_home=true">���ގ�������</a>
</div>
-->
<!--��������ƥ�Ľ�λ-->


<!--�����ȥ�-->
<!--
{html_style type="title" title="����`$ft.game.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
-->


<!--��������ƥ�ĳ���-->
<table align="center" width="100%" bgcolor="#FFDDBB">
<tr>
<td colspan="2" align="center"><img src="f.php?type=file&id=176">
</td>
</tr>
	{foreach from=$app.new item=item name=game key =k}
		<tr align="center">
		    <td>{if $item.game_file1}<img src="f.php?&file=game/{$item.game_file1}&SESSID={$SESSID}" style="float:left;">{/if}</td>
		    <td>
			<div align="left">
			{if $item.game_point}<span style="color:red">[x:0162]</span>{/if}<a href="?action_user_game_buy=true&game_id={$item.game_id}">{$item.game_name}</a>
			<!--span style="color:green">[x:0062]</span--><br>
			<span style="font-size:x-small">
			{$item.game_desc}
			</span>
			</div>
			<div align="right">
				<a href="?action_user_game_buy=true&game_id={$item.game_id}"><span style="font-size:x-small">�ܺ٤ώ����פ�</span></a>
			</div>
		</td>
		</tr>
		<tr>
		<td colspan="2" align="center"><font color="#F69523">������������������������������������</font></td>
		</tr>
	{/foreach}
<tr>
<!--<td colspan="2">
	<span style="font-size:small">
		<span style="color:red">[x:0162]:</span>���Ύώ������Ĥ��Ƥ��뎹�ގ��Ѥώ�{$ft.point.name}������Ѥ��ޤ���<br>
		�ܤ�����<a href="fp.php?code=game_desc">������</a><br>
		<!--span style="color:green">[x:0062]:</span>�׎ݎ��ݎ����б����ގ���<br-->
		<!--span style="color:orange">[x:0805]:</span>���̎ߎ؎��ގ���-->
	</span>
</td>
</tr>
</table>

<!--
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.new item=item name=game key =k}
		<div align="left" style="text-align:left;float:left;">
			{if $item.game_file1}<img src="f.php?&file=game/{$item.game_file1}&SESSID={$SESSID}" style="float:left;">{/if}
			<span style="margin-top:5px;">
				<a href="?action_user_game_buy=true&game_id={$item.game_id}">{$item.game_name}</a><br />
				{$item.game_desc}
			</span>
		</div>
		{html_style type="line" color="gray"}
	{/foreach}
</div>
-->

<!--��������ƥ�Ľ�λ-->


<!--�����ȥ�-->
<!--
{html_style type="title" title="`$ft.game.name`�׎ݎ��ݎ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
-->


{$app_ne.cms_html2}

<div align="center">
<table align="center" width="100%" bgcolor="#FFEEAA">
<tr>
    <td colspan="2" align="center" height="34"><img src="img_napa/game/img/a2.gif"> 
    </td>
</tr>
<tr>
<td colspan="2">
������<font color="#FF0000"><blink>��</blink></font><b>��1��</b><font color="#FF0000"><blink>��</blink></font>������<br>
<a href="?action_user_game_buy=true&game_id=15">����������؎Ύގَʎގ�</a><br>
</td></tr>
<tr><td>
<img src="f.php?type=file&id=156"><br>
</td>
<td>
����������<br><font color="#ff0000">������</font><br>
���ҤΎ��ˎߎ��Ď�[x:0151]���ގݎ���������!<br>
</td>
</tr>

<td colspan="2">
������<font color="#FF0000"><blink>��</blink></font><b>��2��</b><font color="#FF0000"><blink>��</blink></font>������<br>
<a href="?action_user_game_buy=true&game_id=14">����äȤ���ޤ�</a><br>
</td></tr>
<tr><td>
<img src="f.php?type=file&id=179"><br>
</td>
<td>
����������<br><font color="#ff0000">������</font><br>
[x:0006]�Ďގ��Ďގ�����������!<br>
</td>
</tr>

<td colspan="2">
������<font color="#FF0000"><blink>��</blink></font><b>��3��</b><font color="#FF0000"><blink>��</blink></font>������<br>
<a href="?action_user_game_buy=true&game_id=11">Touch�ǎΎߎݎ�</a><br>
</td></tr>
<tr><td>
<img src="f.php?type=file&id=178"><br>
</td>
<td>
����������<br><font color="#ff0000">����</font>��<br>
��®[x:0086]����������������!<br>
</td>
</tr>
</table>
</div>


<!--��������ƥ�ĳ���-->
<!--
<table align="center" width="100%" bgcolor="#FFEEAA">
<tr>
    <td colspan="2" align="center" height="34"><img src="img_napa/game/img/a2.gif"> 
    </td>
</tr>
	{foreach from=$app.ranking item=item name=game key =k}
	<tr>
	<td colspan="2"><span style="color:orange">[x:0167]</span>��{$k+1}��:{if $item.game_point}<span style="color:red">[x:0162]</span>{/if}<a href="?action_user_game_buy=true&game_id={$item.game_id}">{$item.game_name}</a>
	</td>
	</tr>
	<tr align="center">
	    <td>
		{if $item.game_file1}<img src="f.php?&file=game/{$item.game_file1}&SESSID={$SESSID}" style="float:left;">{/if}
		</td>
	    <td><span style="font-size:small">
		<div align="left">
		{$item.game_desc}<br>
		</div>
		<div align="right">
		<a href="?action_user_game_buy=true&game_id={$item.game_id}">�ܺ٤ώ����פ�</a>
		</div></span>
	</td>
	</tr>
	{/foreach}

<tr>
    <td colspan="2" align="right"> <span style="font-size:small"> <a href="?action_user_game_ranking=true">4�̡�10�̰ʲ��ώ�����</a> 
      </span> </td>
</tr>

</table>
-->

<!--
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.ranking item=item name=game key =k}
		<div align="left" style="text-align:left;float:left;">
			{if $item.game_file1}<img src="f.php?&file=game/{$item.game_file1}&SESSID={$SESSID}" style="float:left;">{/if}
			<span style="margin-top:5px;">
				<a href="?action_user_game_buy=true&game_id={$item.game_id}">{$item.game_name}</a><br />
				{$item.game_desc}
			</span>
		</div>
		{html_style type="line" color="gray"}
	{/foreach}
	<div align="right" style="text-align:right;font-size:small;">
	=><a href="?action_user_game_ranking=true">��äȸ���</a>
	</div>
	{html_style type="br"}
</div>
-->

<!--��������ƥ�Ľ�λ-->

<!--
{html_style type="title" title="���ގ��ю��Î��ގ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
-->

<!--��������ƥ�ĳ���-->
<hr color="#FF9988">
<center>���ގ��Ѱ���<br></center>
��<a href="?action_user_game_buy=true&game_id=11">Touch�ǎΎߎݎ�</a><br>
����®[x:0086]����������������!<br>����������Ǥ��뤫��?<br>

<center>/��/��/��/��/��/��/��<br></center>
��<a href="?action_user_game_buy=true&game_id=14">����äȤ���ޤ�</a><br>
��[x:0006]�Ďގ��Ďގ�����������!<br>��̣�����ʤ�������֤������<br>

<center>/��/��/��/��/��/��/��<br></center>
��<a href="?action_user_game_buy=true&game_id=15">����������؎Ύގَʎގ�</a><br>
�����ҤΎ��ˎߎ��Ď�[x:0151]���ގݎ���������!<br>(*'-')<�����Ǝ؎Ύގَʎގ�!<br>

<center>/��/��/��/��/��/��/��<br></center>
��<a href="?action_user_game_buy=true&game_id=16">���ގ����َ��ގ�����</a><br>
����ˡ�����ϲ������ێ����򤱎�����!<br>�ʎ�������������!!<br>

<center>/��/��/��/��/��/��/��<br></center>
��<a href="?action_user_game_buy=true&game_id=17">�̎ގ׎������ގ�����</a><br>
�����֎Î��̎ގَ��ގ���!<br>�ڤ������ߤ���<br>
<!--<img src="img_napa/game/img/a6.gif"><br>

<table width="100%">
<tr><td>
	<div align="center">
	{foreach from=$app.category item=item name=game key =k}
		<a href="?action_user_game_list=true&game_category_id={$item.game_category_id}">{$item.game_category_name}</a>/
		{if ($k+1)/3==0}<br />{/if}
	{/foreach}
	</div>
</td></tr>
</table>-->

<hr color="#FF9988">

<!--
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.category item=item name=game key =k}
		<a href="?action_user_game_list=true&game_category_id={$item.game_category_id}">{$item.game_category_name}</a>/
	{/foreach}
</div>
-->

<!--��������ƥ�Ľ�λ-->


<!--��������-->
<!--
{html_style type="title" title="`$ft.game.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="center" style="text-align:center;font-size:small;">
	{form action="$script" ethna_action="user_game_list"}
	{form_input name="keyword"  size=12}&nbsp;
	{form_submit value="����"}
	{/form}
</div>
-->
<!--������λ-->


<!--��������ƥ�ĳ���-->
<!--
<div align="left" style="text-align:left;font-size:small;">
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{$app_ne.cms_html2}
</div>
-->
<!--��������ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl" title_bgcolor="#ffffff" hrcolor="#000000" title="(C)���͎ߎ���������" title_fontcolor="#000000"}
