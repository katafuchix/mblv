<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.message.name`����BOX" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="center" style="text-align:center;font-size:small;">
	[{$ft.message_sent_box.name}][<a href="?action_user_message_list_received=true">{$ft.message_receive_box.name}</a>]
</div>
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{foreach from=$app.listview_data item=item}
		<span style="color:{$timecolor}">{$item.message_created_time|jp_date_format:"%m/%d(%a) %H:%M"}</span><br />
		<span style="color:{$form_name_color}">{$ft.to_user_nickname.name}:</span><a href="?action_user_profile_view=true&user_id={$item.to_user_id}">{$item.user_nickname}</a>����<br />
		<a href="?action_user_message_view_sent=true&message_id={$item.message_id}">{$item.message_title}</a>
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
