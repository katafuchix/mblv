<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$app.user_nickname`さんの`$ft.friend_name.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{html_style type="line" color="gray"}
	{foreach from=$app.friend_list[1] item=item}
		{if $config.option.avatar}
			<img src="f.php?type=avatar&user_id={$item.to_user_id}&attr=i&SESSID={$SESSID}" alt="画像" style="float:left;" />
		{else}
			{if $item.image_id}
			<img src="f.php?type=image&id={$item.image_id}&attr=i&SESSID={$SESSID}" style="float:left;" alt="画像">
			{/if}
		{/if}
		&nbsp;<a href="?action_user_profile_view=true&user_id={$item.to_user_id}">{$item.to_user_nickname}</a>さん<br />
		{html_style type="line" color="gray"}
	{/foreach}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
