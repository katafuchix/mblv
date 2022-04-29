<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.message.name`送信BOX" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="center" style="text-align:center;font-size:small;">
	[{$ft.message_sent_box.name}][<a href="?action_user_message_list_received=true">{$ft.message_receive_box.name}</a>]
</div>
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{foreach from=$app.listview_data item=item}
		<span style="color:{$timecolor}">{$item.message_created_time|jp_date_format:"%m/%d(%a) %H:%M"}</span><br />
		<span style="color:{$form_name_color}">{$ft.to_user_nickname.name}:</span><a href="?action_user_profile_view=true&user_id={$item.to_user_id}">{$item.user_nickname}</a>さん<br />
		<a href="?action_user_message_view_sent=true&message_id={$item.message_id}">{$item.message_title}</a>
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
