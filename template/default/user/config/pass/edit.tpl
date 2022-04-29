<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="ﾛｸﾞｲﾝﾊﾟｽﾜｰﾄﾞ変更" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	ﾛｸﾞｲﾝﾊﾟｽﾜｰﾄﾞを変更します。<br />
	新,旧ﾊﾟｽﾜｰﾄﾞを入力してﾎﾞﾀﾝを押してください。<br />
	<br />
	{form action="$script" ethna_action="user_config_pass_edit_do"}
		<span style="color:{$form_name_color};">
		{form_name name="user_password"}
		</span>
		<br />
		{form_input name= "user_password" istyle="3" mode="alphabet"}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="new_user_password"}
		</span>
		<br />
		{form_input name= "new_user_password" istyle="3" mode="alphabet"}<br />
		<br>
		<div style="text-align:center;font-size:small;">{form_input name="edit"}<br /></div>
		<input type="hidden" name="user_hash" value="{$form.user_hash}">
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
