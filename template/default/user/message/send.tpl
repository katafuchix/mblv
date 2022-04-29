<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.message.name`を書く" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action=$script ethna_action="user_message_send_confirm"}
		{form_input name="to_user_id"}
		{form_input name='reply_message_id'}
		<span style="color:{$form_name_color};">
		{form_name name="to_user_id"}:
		</span>
		<br />
		&nbsp;<a href="?action_user_profile_view=true&user_id={$app.to_user.user_id}">{$app.to_user.user_nickname}</a>さん<br /><br />
		<span style="color:{$form_name_color};">
		{form_name name="message_title"}:
		</span>
		<br />
		{form_input name="message_title"}<br /><br />
		<span style="color:{$form_name_color};">
		{form_name name="message_body"}:
		</span>
		<br />
		<div style="text-align:center;font-size:small;">
		{form_input name="message_body" rows=5}
		</div>
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		入力内容を確認するには下のﾎﾞﾀﾝを押してください｡<br />
		<br />
		<div style="text-align:center;font-size:small;">
			{form_input name="confirm"}<br />
		</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
