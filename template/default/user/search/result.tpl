<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.friend_name.name`検索" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	<br />
	{if count($app.listview_data) == 0}
		検索条件に合致する{$ft.friend_name.name}は見つかりませんでした。<br />
		<br />
	{else}
		検索条件に合致する{$ft.friend_name.name}が{$app.listview_total}人見つかりました。
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		{include file="user/pager.tpl"}
	{/if}
	{foreach from=$app.listview_data item=item name=user}
		{if $item != false}
			&nbsp;&nbsp;<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>さん<br />
		{/if}
	{/foreach}
	{include file="user/pager.tpl"}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
