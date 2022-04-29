<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="かんたんﾛｸﾞｲﾝ設定変更" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	かんたんﾛｸﾞｲﾝを設定します。<br />
	携帯電話固有の識別番号を利用して、毎回ﾊﾟｽﾜｰﾄﾞを入力しなくてもﾛｸﾞｲﾝできる機能です。<br />
	ﾊﾟｽﾜｰﾄﾞを入力してﾎﾞﾀﾝを押してください。<br />
	<br />
	{form action="`$script`?guid=ON" ethna_action="user_config_login_edit_do"}
		<input type="hidden" name="guid" value="ON">
		<span style="color:{$form_name_color};">
		{form_name name="user_password"}
		</span>
		<br />
		{form_input name= "user_password" istyle="3" mode="alphabet"}<br />
		<br />
		{if $form.config_type}
			<div style="text-align:center;font-size:small;">{form_input name= "register"}</div>
		{else}
			<div style="text-align:center;font-size:small;">{form_input name= "edit"}<br />{form_input name= "delete"}</div>
		{/if}
		<input type="hidden" name="user_hash" value="{$form.user_hash}">
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
