<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.avatar.name`ｸﾛｰｾﾞｯﾄ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<div align="center" style="text-align:center;font-size:small;">
		<img src="?action_user_file_avatar_preview=true&width={$config.avatar_s_width}&height={$config.avatar_s_height}&SESSID={$SESSID}">
	</div>
	{include file="user/pager.tpl"}
	<table align="center">
	{foreach from=$app.listview_data item=item name=avatar key =k}
		{if $k%3==0}
			{if $k!=0}</tr>{/if}
			<tr>
		{/if}
		<td width="{$config.avatar_t_width}px" valign="top">
		<div style="float:left;width:{$config.avatar_t_width}px;font-size:small;" width="{$config.avatar_t_width}px">
		<img src="?action_user_file_avatar_view=true&avatar_id={$item.avatar_id}&width={$config.avatar_t_width}&height={$config.avatar_t_height}&SESSID={$SESSID}" style="float:left;"><br />
		{if $item.user_avatar_wear==1}
			<a href="?action_user_avatar_change_do=true&cmd=off&user_avatar_id={$item.user_avatar_id}">脱ぐ</a>
		{else}
			<a href="?action_user_avatar_change_do=true&cmd=on&user_avatar_id={$item.user_avatar_id}">着る</a>
		{/if}
		</div>
		</td>
	{/foreach}
	</table>
	{html_style type="br"}
	{include file="user/pager.tpl"}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar_preview=true">{$ft.avatar.name}買い物かごへ</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar=true">{$ft.avatar.name}ﾎﾟｰﾀﾙへ</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
