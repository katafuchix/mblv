<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.avatar.name`買い物かご" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<div align="center" style="text-align:center;font-size:small;">
		<img src="?action_user_file_avatar_preview=true&width=100&height=100&SESSID={$SESSID}"><br />
		所持{$ft.point.name}:{$app.user.user_point}{$ft.point.name}
	</div>
	{if $app.data_list}
		{html_style type="line" color="gray"}
		{form action="$script" ethna_action="user_avatar_buy_do"}
			{foreach from=$app.data_list item=item}
				<input type="checkbox" name="avatar_id_list[]" value="{$item.avatar_id}" {if $item.avatar_wear==1}checked="checked"{/if}>
				{*$app.ac[$item.avatar_category_id].name*}<!--:-->{$item.avatar_name}:{$item.avatar_point}{$ft.point.name}
				(
				{if $item.avatar_wear==1}
					<a href="?action_user_avatar_preview=true&cmd=off&cart_avatar_id={$item.avatar_id}">脱ぐ</a>
				{else}
					<a href="?action_user_avatar_preview=true&cmd=on&cart_avatar_id={$item.avatar_id}">着る</a>
				{/if}
				)<br />
			{/foreach}
			<div style="text-align:center;font-size:small;">
				合計{$ft.point.name}:{$app.total_point}{$ft.point.name}<br />
				{form_submit value="　購入する　"}
			</div>
		{/form}
	{/if}
	{if $form.avatar_id}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar_buy=true&avatar_id={$form.avatar_id}">前の{$ft.avatar.name}ﾍﾟｰｼﾞへ</a><br />
	{/if}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar=true">{$ft.avatar.name}ﾎﾟｰﾀﾙへ</a><br />
</div>
<!--コンテンツ終了-->

<!--タイトル-->
{html_style type="title" title="`$ft.avatar_category.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--中部コンテンツ開始-->
<div align="cetner" style="text-align:center;font-size:small;">
	{foreach from=$app.category item=item name=avatar key =k}
		<a href="?action_user_avatar_list=true&avatar_category_id={$item.avatar_category_id}">{$item.avatar_category_name}</a>/
	{/foreach}
</div>
<!--中部コンテンツ終了-->

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
