<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="ﾒｰﾙ受信設定変更" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	ﾒｰﾙ受信設定を変更します。<br />
	設定を選択してﾎﾞﾀﾝを押してください。<br />
	<br />
	{form action="$script" ethna_action="user_config_receive_edit_do"}
		<span style="color:{$form_name_color};">
		{form_name name="user_message_1_status"}:
		</span>
		<br />
		{form_input name= "user_message_1_status"}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="user_message_2_status"}:
		</span>
		<br />
		{form_input name= "user_message_2_status"}<br />
		<br />
		<!--span style="color:{$form_name_color};">
		{form_name name="user_message_3_status"}:
		</span>
		<br />
		{form_input name= "user_message_3_status"}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="user_message_4_status"}:
		</span>
		<br />
		{form_input name= "user_message_4_status"}<br />
		<br /-->
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="edit"}<br /></div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
