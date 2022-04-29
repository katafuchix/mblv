<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="設定" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_config_login_edit=true">簡単ﾛｸﾞｲﾝ設定変更</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_config_pass_edit=true">ﾊﾟｽﾜｰﾄﾞ変更</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_config_mail_edit=true">ﾒｰﾙｱﾄﾞﾚｽ変更</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_config_receive_edit=true">ﾒｰﾙ受信設定変更</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
