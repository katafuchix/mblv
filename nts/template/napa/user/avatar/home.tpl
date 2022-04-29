<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.avatar.name`ｸﾛｰｾﾞｯﾄ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<div align="center" style="text-align:center;font-size:small;">
		<img src="?action_user_file_avatar_preview=true&width={$config.avatar_s_width}&height={$config.avatar_s_height}&SESSID={$SESSID}&uniqid={$smarty.now|uniqid}"><br />

[x:0073]<a href="fp.php?code=guide_avatar"><span style="font-size:xx-small; color:red">
AUの方へ</span></a>

		{form action="`$script`" ethna_action="user_avatar_home"}
		{form_input name="keyword" size="20"}&nbsp;{form_submit value="ｸﾛｰｾﾞｯﾄ内検索"}
		{/form}
		<div align=style="text-align:center;font-size:xx-small;">
ｶﾀｶﾅは半角で入力してください</div>
		{if $form.keyword}
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar_home=true">{$ft.avatar.name}ｸﾛｰｾﾞｯﾄTOPへ</a><br />
		{/if}
	</div>
	
	{* form action="`$script`" ethna_action="user_avatar_delete_do" *}
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
		<!--input type="checkbox" name="user_avatar_id_list[]" value="{$item.user_avatar_id}"-->
		{if $item.user_avatar_wear==1}
			<a href="?action_user_avatar_change_do=true&cmd=off&user_avatar_id={$item.user_avatar_id}">脱ぐ</a>
		{else}
			<a href="?action_user_avatar_change_do=true&cmd=on&user_avatar_id={$item.user_avatar_id}">着る</a>
		{/if}
		</div>
		</td>
	{/foreach}
	</table>
	{if $app.listview_total == 0}該当の{$ft.avatar.name}はありません{/if}
	{html_style type="br"}
	{include file="user/pager.tpl"}
	
	<!--div style="text-align:center;font-size:small;">
	{* form_submit value="選択した`$ft.avatar.name`を削除" *}
	</div-->
	{* /form *}
	
	<div style="text-align:center;font-size:small;">
		◇着用中ﾘｽﾄ◇
	</div>
	{foreach from=$app.user_avatar_wear_list item=item}
		{$item.avatar_name}(<a href="?action_user_avatar_change_do=true&cmd=off&user_avatar_id={$item.user_avatar_id}">脱ぐ</a>)<br />
	{/foreach}
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar_preview=true">{$ft.avatar.name}買い物かごへ</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar=true">{$ft.avatar.name}TOPへ</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="fp.php?code=guide_inquiry">ﾍﾙﾌﾟ&問い合せはこちら</a>
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
