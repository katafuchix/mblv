<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="送信`$ft.message.name`削除確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	<span style="color:{$form_name_color};">
	{$ft.message_title.name}:
	</span>
	<br />
	&nbsp;{$app.message.message_title}<br />
	<br />
	<span style="color:{$form_name_color};">
	{$ft.to_user_nickname.name}:
	</span>
	<br />
	&nbsp;<a href="?action_user_profile_view=true&user_id={$app.to_user.user_id}">{$app.to_user.user_nickname}</a>さん<br />
	<br />
	<span style="color:{$form_name_color};">
	{$ft.message_body.name}:
	</span>
	<br />
	&nbsp;{$app.message.message_body|nl2br}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<br />
	<br />
	<div align="left" style="text-align:left;font-size:small;">
		この{$ft.message.name}を削除します｡<br />
		よろしいですか?<br />
		<br />
	</div>
	{form action="$script" ethna_action="user_message_delete_sent_do"}
		{form_input name="message_id"}
		<div style="text-align:center;font-size:small;">{form_input name="submit"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
