<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.message.name`受信BOX" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="center" style="text-align:center;font-size:small;">
	[<a href="?action_user_message_list_sent=true">{$ft.message_sent_box.name}</a>][{$ft.message_receive_box.name}]
</div>
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{foreach from=$app.listview_data item=item}
		<span style="color:{$timecolor}">{$item.message_created_time|jp_date_format:"%m/%d(%a) %H:%M"}</span><br />
		<span style="color:{$form_name_color}">{$ft.from_user_nickname.name}:</span><a href="?action_user_profile_view=true&user_id={$item.from_user_id}">{$item.user_nickname}</a>さん<br />
		{if $item.message_status_to == 1}{'[x:0112]'}{/if}
		{if $item.message_status_to == 4}{'[x:0760]'}{/if}
		<a href="?action_user_message_view_received=true&message_id={$item.message_id}">{$item.message_title}</a>
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
