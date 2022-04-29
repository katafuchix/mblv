<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.community.name`検索" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_add=true">{$ft.community.name}の新規作成</a>
	{html_style type="line" color="gray"}
	{form ethna_action="user_community_search" action="$script"}
		<span style="color:{$form_name_color};">
		{form_name name="keyword"}:
		</span>
		{form_input name="keyword"}<br />
		<span style="color:{$form_name_color};">
		{form_name name="community_category_id"}:
		</span>
		{form_input name="community_category_id" emptyoption=""}
		{form_input name="search"}
	{/form}
	
	{if $form.keyword == "" && $form.community_category_id == ""}
		<!--検索項目がない場合-->
		{html_style type="title" title="注目の`$ft.community.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{else}
		<!--検索項目がある場合-->
		{html_style type="title" title="検索結果" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
		{include file="user/pager.tpl"}
	{/if}
	{html_style type="line" color="gray"}
	{foreach from=$app.listview_data item=item key=key}
		<a href="?action_user_community_view=true&community_id={$item.community_id}">{$item.community_title}</a><br />
		{$item.community_description|truncate_emoji:100|nl2br}<br />
		<span style="color:{$form_name_color};">ﾒﾝﾊﾞｰ数:</span>{$item.community_member_num}人、
		<span style="color:{$form_name_color};">ｶﾃｺﾞﾘ:</span>{$item.community_category_name}
		{html_style type="line" color="gray"}
	{foreachelse}
		検索条件に合致する{$ft.community.name}は見つかりませんでした。
	{/foreach}{* $form.keyword != '' *}
	{if $form.keyword != "" || $form.community_category_id != ""}
		<!--結果がある場合のみ表示-->
		{include file="user/pager.tpl"}
	{/if}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
