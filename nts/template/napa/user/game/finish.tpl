<!--�إå���-->
{include file="user/header.tpl" title="�ʥѥ����󥲡���`$form.game_name`" bgcolor="#ffffff" text="#666666" link="#3399FF" vlink="#3399FF"}

<!--�����ȥ�-->
<table width="100%">
<tr bgcolor="blue" align="center"><td>
<span style="color:#ffffff">{$form.game_name}</span></td></tr>
</table>

<!--����ƥ�ĳ���-->
<div align="center" style="text-align:center;">
	{if count($errors)}
	<div align="left" style="text-align:left;font-size:small;">
	<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>
	</div>
	{/if}

	{if $app.is_best}
	<span style="color:#FF00FF;">*��</span><span style="color:red">����BEST����!!</span><span style="color:#FF00FF;">��*</span><br>
	{/if}

	{$session.user.user_nickname}����<br />
	��{$ft.score.name}:{$form.scr}<br />
	<span style="color:#FF00FF">��*:��.��:*���ߎ�*:��.��:*����</span>

	{if $app.game.game_ranking}
		����ν��:{$app.rank}��<br />
	{/if}
		<br />
	{if $app.game.game_ranking}
		<a href="?action_user_game_score_list=true&game_id={$app.game.game_id}">��󥭥󥰤�ߤ�</a><br />
	{/if}
	<br />
	�֥饦���Хå���<br />
	�⤦����ĩ��!!<br />
	<!--hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	��Ϣ{$ft.community.name}<br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};"-->
	
	<!--�����ȳ���-->
	{form action="$script" ethna_action="user_comment_add_do"}
		���ۤ�ɤ���<br>
		{form_input name="comment_type" value="2"}
		{form_input name="comment_subid" value="`$app.game.game_id`"}
		{form_input name="comment_body"}
		{form_submit name="add" value="���"}<br />
	{/form}
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
	<!--�����Ƚ�λ-->
</div>

<!--div align="right" style="text-align:right;font-size:small;">
	<a href="?action_user_comment_list=true&comment_type=2&comment_subid={$app.game.game_id}">¾�οͤδ��ۤ�ߤ�</a>
</div>
<div align="left" style="text-align:left;font-size:small;">
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_game=true">{$ft.game.name}�Ύߎ����٤�</a><br />
</div-->
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl" title_bgcolor="#ffffff" hrcolor="#000000" title="(C)���͎ߎ���������" title_fontcolor="#000000"}
