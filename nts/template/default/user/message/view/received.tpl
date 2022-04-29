<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="受信`$ft.message.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	<span style="color:{$form_name_color};">
	{$ft.from_user_nickname.name}:
	</span>
	<br />
	&nbsp;<a href="?action_user_profile_view=true&user_id={$app.from_user.user_id}">{$app.from_user.user_nickname}</a>さん<br />
	<br />
	<span style="color:{$form_name_color};">
	{$ft.message_body.name}:
	</span>
	<br />
	&nbsp;{$app.message.message_body|nl2br}<br />
	<br />
	{if $app.message.image_id}
		<div style="text-align:center;font-size:small;">
		<a href="?action_user_file_image_view=true&image_id={$app.message.image_id}&message_id={$form.message_id}&message_type=received">
		<img src="f.php?type=image&id={$app.message.image_id}&attr=t&SESSID={$SESSID}" alt="画像"><br />
		</a>
		</div>
	{/if}
	<br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<br />
	この{$ft.message.name}に返信するには下のﾎﾞﾀﾝを押してください｡<br />
	<br />
	{form action="$script" ethna_action="user_message_reply"}
		<div style="text-align:center;font-size:small;">
			{form_input name="reply_message_id" value="`$form.message_id`"}
			{form_input name="reply"}
		</div>
	{/form}
	<br />
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_message_list_sent=true">{$ft.message.name}{$ft.message_receive_box.name}へ戻る</a><br />
	
	{html_style type="title" title="受信`$ft.message.name`削除" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<br />
	この{$ft.message.name}に返信するには下のﾎﾞﾀﾝを押してください｡<br />
	<br />
	{form action="$script" ethna_action="user_message_delete_received_confirm"}
		<div style="text-align:center;font-size:small;">
			{form_input name="message_id"}
			{form_input name="confirm"}
		</div>
	{/form}
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_message_list_sent=true">{$ft.message.name}{$ft.message_receive_box.name}へ戻る</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
