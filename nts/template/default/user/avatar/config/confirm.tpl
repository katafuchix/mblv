<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.avatar.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<div style="text-align:center;font-size:small;">
		������{$ft.avatar.name}�Ǥ�����Ǥ�����<br />
		<img src="?action_user_file_avatar_preview=true&width=100&height=100&SESSID={$SESSID}"><br />
		{form action="$script" ethna_action="user_avatar_config_do"}
		{$app_ne.hidden_vars}
		{form_input name="submit"}<br />{form_input name="back"}
		{/form}
	</div>
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
