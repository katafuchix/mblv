<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.blacklist.name`��Ͽ��ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--�֥�å��ꥹ����Ͽ�ե����೫��-->
<div align="left" style="text-align:left;font-size:small;">
	{form action="$script" ethna_action="user_blacklist_add_do"}
		<span style="color:{$form_name_color};">
		���Τ�̾��:
		</span>
		<br />
		&nbsp;{$app.toUser.user_nickname}����<br />
		<br />
		{$session.user.user_nickname}�����{$ft.blacklist.name}����Ͽ���줿�Վ����ޤ�{$session.user.user_nickname}������Ф��벼���ε�ǽ���Ȥ��ʤ��ʤ�ޤ���<br />
		��ͧã����<br />
		���ЎƎҎ���<br />
		�������ؤΎ��Ҏݎ�<br />
		����Ŏ��Ў��ƎÎ��ؤλ���<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		���ΎՎ����ގ���{$ft.blacklist.name}����Ͽ���ޤ���<br />
		������Ǥ���?<br /><br />
		<div style="text-align:center;font-size:small;">
			{form_input name="submit"}
		</div>
		<input type="hidden" name="user_id" value="{$app.toUser.user_id}">
		{$app_ne.hidden_vars}
		{uniqid}
	{/form}
</div>
<!--�֥�å��ꥹ����Ͽ�ե����ཪλ-->

<!--�֥�å��ꥹ����Ͽ��ߥե����೫��-->
{form action="$script" ethna_action="user_profile_view"}
	{$app_ne.hidden_vars}
	<input type="hidden" name="user_id" value="{$app.toUser.user_id}">
	<div style="text-align:center;font-size:small;">
		<input type="submit" value="����������">
	</div>
{/form}
<!--�֥�å��ꥹ����Ͽ��ߥե����ཪλ-->

<!--�եå���-->
{include file="user/footer.tpl"}
