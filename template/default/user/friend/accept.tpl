<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="��ǧ�Ԥ���`$ft.friend_name.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{$ft.friend_name.name}�ˤʤ���Ͼ�ǧ�򎤤ʤ�ʤ����ϵ��ݤ򎸎؎������Ʋ�������<br /><br />
	{html_style type="line" color="gray"}
	{foreach from=$app.listview_data item=item}
		<span style="color:{$form_name_color};">
		FROM:
		</span>
		&nbsp;<a href="?action_user_profile_view=true&user_id={$item.from_user_id}">{$item.from_user_nickname}</a>����<br />
		{if $item.friend_message}
		{$item.friend_message}
		<br />
		{/if}
		<div style="text-align:center;font-size:small;">
		[<a href="?action_user_friend_accept_do=true&friend_id={$item.friend_id}&accept=1">��ǧ</a>|
		<a href="?action_user_friend_accept_do=true&friend_id={$item.friend_id}&accept=0">����</a>]
		</div>
		{html_style type="line" color="gray"}
	{foreachelse}
		���߾�ǧ�Ԥ���ͧã�Ϥ��ޤ���<br />
	{/foreach}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
