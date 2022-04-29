<!--ヘッダー-->
{include file="user/header.tpl"}

{html_style type="title" title="ｺﾒﾝﾄ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コメント開始-->
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.listview_data item=item key=k}
	{if $k%2==0}
		{style align="left" bgcolor="#FFFFFF" fontcolor=$text fontsize="small"}
			投稿者:<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>さん<br />
			{$item.comment_body|nl2br}<br />
			{if $item.user_id == $session.user.user_id}
				[<a href="?action_user_comment_edit=true&comment_id={$item.comment_id}">編集</a> |
				<a href="?action_user_comment_delete_confirm=true&comment_id={$item.comment_id}">削除</a>]
			{/if}
		{/style}
	{else}
		{style align="left" bgcolor="#FFDD99" fontcolor=$text fontsize="small"}
			投稿者:<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>さん<br />
			{$item.comment_body|nl2br}<br />
			{if $item.user_id == $session.user.user_id}
				[<a href="?action_user_comment_edit=true&comment_id={$item.comment_id}">編集</a> |
				<a href="?action_user_comment_delete_confirm=true&comment_id={$item.comment_id}">削除</a>]
			{/if}
		{/style}
	{/if}
	{/foreach}
</div>
<!--コメント終了-->
	{include file="user/pager.tpl"}
<br />
<!--フッター-->
{include file="user/footer.tpl"}
