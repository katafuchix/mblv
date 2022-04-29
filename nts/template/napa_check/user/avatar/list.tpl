<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.avatar.name`一覧" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{if $app.ac[$form.avatar_category_id].name}
		<span style="color:{$form_name_color}">
		ｶﾃｺﾞﾘ:
		</span>
		{$app.ac[$form.avatar_category_id].name}<br />
	{/if}
	{include file="user/pager.tpl"}
	<div align="center" style="text-align:center;font-size:small;">
	{if $form.sort_key!='avatar_point' || $form.sort_order != 'ASC'}
	<a href="{$app.listview_uri}&sort_key=avatar_point&sort_order=ASC">安い順</a>/
	{/if}
	{if $form.sort_key!='avatar_point' || $form.sort_order != 'DESC'}
	<a href="{$app.listview_uri}&sort_key=avatar_point&sort_order=DESC">高い順</a>/
	{/if}
	{if $form.sort_key=='avatar_updated_time' && $form.sort_order == 'ASC'}
	<a href="{$app.listview_uri}&sort_key=avatar_updated_time&sort_order=DESC">新しい順</a>
	{else}
	<a href="{$app.listview_uri}&sort_key=avatar_updated_time&sort_order=ASC">古い順</a>
	{/if}
	</div>
	<table align="center">
	{foreach from=$app.listview_data item=item name=avatar key =k}
		{if $k%3==0}
			{if $k!=0}</tr>{/if}
			<tr>
		{/if}
		<td width="{$config.avatar_t_width}px" valign="top">
		<div style="float:left;width:{$config.avatar_t_width}px;font-size:small;" width="{$config.avatar_t_width}px">
			<a href="?action_user_avatar_buy=true&avatar_id={$item.avatar_id}">
			<img src="?action_user_file_avatar_view=true&avatar_id={$item.avatar_id}&width={$config.avatar_t_width}&height={$config.avatar_t_height}&SESSID={$SESSID}" style="float:left;"></a><br />
			<div align="center" style="text-align:center;">{$item.avatar_point}{$ft.point.name}</div>
		</div>
		</td>
	{/foreach}
	</table>
	{html_style type="br"}
	{include file="user/pager.tpl"}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar_preview=true">{$ft.avatar.name}買い物かごへ</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar=true">{$ft.avatar.name}TOPへ</a><br />
</div>
<!--コンテンツ終了-->

<!--検索開始-->
{html_style type="title" title="`$ft.avatar.name`検索" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="center" style="text-align:center;font-size:small;">
	{form action="$script" ethna_action="user_avatar_list"}
	{form_input name="keyword" size=12}&nbsp;
	{form_submit value="検索"}
	{/form}
</div>
<!--検索終了-->


<!--フッター-->
{include file="user/footer.tpl"}
