<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.avatar.name`設定" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<div style="text-align:center;font-size:small;">
		下記の{$ft.avatar.name}でよろしいですか？<br />
		<img src="?action_user_file_avatar_preview=true&width=100&height=100&SESSID={$SESSID}"><br />
		{form action="$script" ethna_action="user_avatar_config_do"}
		{$app_ne.hidden_vars}
		{form_input name="submit"}<br />{form_input name="back"}
		{/form}
	</div>
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
