<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$app.user.user_nickname`さんの`$ft.friend_introduction.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/pager.tpl"}
	{if $app.listview_total == 0}
		{$ft.friend_introduction.name}がありません｡
	{/if}
	<br>
	{foreach from=$app.listview_data item=item}
		<span style="color:{$form_name_color}">{$ft.user_nickname.name}:</span><br />
		<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>さん<br />
		<span style="color:{$form_name_color}">{$ft.friend_introduction.name}:</span><br />
		{$item.friend_introduction|nl2br}<br />
		{if $form.to_user_id == $session.user.user_id}
			<a href="?action_user_friend_introduction_edit=true&to_user_id={$item.user_id}">{$item.user_nickname}さんの{$ft.friend_introduction.name}を書く</a>/
			<a href="?action_user_friend_introduction_delete_confirm=true&to_user_id={$form.to_user_id}&from_user_id={$item.user_id}">削除</a>
		{elseif $item.user_id == $session.user.user_id}
			<a href="?action_user_friend_introduction_delete_confirm=true&to_user_id={$form.to_user_id}&from_user_id={$item.user_id}">削除</a>
		{/if}
		<br />
		{html_style type="line" color="gray"}
	{/foreach}
	<br>
	{include file="user/pager.tpl"}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<a href="?action_user_profile_view=true&user_id={$app.user.user_id}">{$app.user.user_nickname}さんのﾌﾟﾛﾌｨｰﾙ</a>
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
