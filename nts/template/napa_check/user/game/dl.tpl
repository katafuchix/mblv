<!--�إå���-->
{include file="user/header.tpl" title="�ʥѥ����󥲡���`$form.game_name`" bgcolor="#ffffff" text="#666666" link="#3399FF" vlink="#3399FF"}

<!--�����ȥ�-->
<table width="100%">
<tr bgcolor="blue" align="center"><td>
<span style="color:#ffffff">{$form.game_name}</span></td></tr>
</table>


<!--����ƥ�ĳ���-->
<div align="center" style="text-align:center;">
	{if $form.game_file2}<img src="f.php?file=game/{$form.game_file2}&SESSID={$SESSID}">{/if}
	<br>

	{if $app.low_term}
		<!--����ü���ξ�票�顼��ɽ��-->
		<span style="color:#ff3366">�������ͤ�ü����<br>���б��ȤʤäƤ���ޤ���</span><br />
	{else}
		<object data="{$config.file_url}game/{$form.game_file3}" type="application/x-shockwave-flash" standby="���ގ��ݎێ��Ď�">
			<param name="disposition" value="devfl7r" valuetype="data" />
			<param name="title" value="{$form.game_name}" valuetype="data" />
		</object>
	{/if}

</div>

{$form.game_desc}
<br>
<span style="color:red">[x:0166]�������</span><br>
{$form.game_explain}<br />
<!--span style="color:green">[x:0062]</span><a href="?action_user_game_score_list=true&game_id={$form.game_id}">��󥭥�</a><br-->
<span style="color:blue">[x:0134]</span><a href="fp.php?code=game_device">�б�����</a><br><br>
 
<div align="center">
	<a href="http://i.spaceout-inc.jp/j000/top.jsp"><img src="img_napa/game/img/1.gif"></a><br>
</div>

<!--table bgcolor="#FEDCAA">
<tr align="center">
<td><img src="img_napa/game/img/c1.gif">
</td></tr>

<tr><td>
<a href="com_0001.html">�������繥��(1200)</a>
</td></tr>

<tr><td>
<a href="com_0002.html">��ά���ߥ�(100)</a>
</td></tr>

<tr><td align="right">
<font size="1"><a href="com_other.html">¾�Ύ��ގ��ю��Ў��ƎÎ��ώ�����</a></font>
</td></tr>
</table-->


<table bgcolor="#BEDDF9">
<tr><td align="center">
<img src="img_napa/game/img/c2.gif">
</td></tr>

{foreach from=$app.listview_data item=item key=k}
<tr><td>
{$item.comment_body|nl2br}<br />
<div align="right" style="text-align:right;">
		<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>����<br />
		{if $item.user_id == $session.user.user_id}
			[<a href="?action_user_comment_edit=true&comment_id={$item.comment_id}">�Խ�</a> |
			<a href="?action_user_comment_delete_confirm=true&comment_id={$item.comment_id}">���</a>]
		{/if}
</div>
</td></tr>
<tr><td><hr color="#067EEF"></td></tr>
{/foreach}

</table>
<hr color="blue">

<!--�����ȳ���-->
<!--
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.listview_data item=item key=k}
		{if $item.user_image_id}
			<img src="f.php?type=image&id={$item.user_image_id}&attr=i&SESSID={$SESSID}" alt="����" style="float:left;">
		{/if}
		<span style="color:{$timecolor};">{$item.comment_created_time|jp_date_format:"%m/%d(%a) %H:%M"}</span>
		{if $item.user_id == $session.user.user_id}
			[<a href="?action_user_comment_edit=true&comment_id={$item.comment_id}">�Խ�</a>]
		{/if}
		<br />
		<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>����<br />
		{$item.comment_body|nl2br}
		{html_style type="line" color="gray"}
	{/foreach}
	{*include file="user/pager.tpl"*}
	{if $app.listview_total != 0}
	<div align="right" style="text-align:right;font-size:small;">
		����<a href="?action_user_comment_view=true&comment_type=2&comment_subid={$form.comment_dub_id}">���Ҏݎİ���</a>[x:0082]
	</div>
	{/if}
	{html_style type="title" title="���ۤ��" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{form action="$script" ethna_action="user_comment_add_do"}
		{form_input name="comment_type" value="2"}<br />
		{form_input name="comment_subid" value="`$form.game_id`"}<br />
		{form_name name="comment_body"}<br />
		{form_input name="comment_body"}<br />
		{form_input name="add"}<br />
	{/form}
</div>
-->
<!--�����Ƚ�λ-->

<!--�եå���-->
{include file="user/footer.tpl" title_bgcolor="#ffffff" hrcolor="#000000" title="(C)���͎ߎ���������" title_fontcolor="#000000"}
