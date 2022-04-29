<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="承認待ちの`$ft.friend_name.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{$ft.friend_name.name}になる場合は承認を､ならない場合は拒否をｸﾘｯｸして下さい｡<br /><br />
	{html_style type="line" color="gray"}
	{foreach from=$app.listview_data item=item}
		<span style="color:{$form_name_color};">
		FROM:
		</span>
		&nbsp;<a href="?action_user_profile_view=true&user_id={$item.from_user_id}">{$item.from_user_nickname}</a>さん<br />
		{if $item.friend_message}
		{$item.friend_message}
		<br />
		{/if}
		<div style="text-align:center;font-size:small;">
		[<a href="?action_user_friend_accept_do=true&friend_id={$item.friend_id}&accept=1">承認</a>|
		<a href="?action_user_friend_accept_do=true&friend_id={$item.friend_id}&accept=0">拒否</a>]
		</div>
		{html_style type="line" color="gray"}
	{foreachelse}
		現在承認待ちの友達はいません。<br />
	{/foreach}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
