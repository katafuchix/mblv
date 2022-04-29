<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.avatar.name`ﾗﾝｷﾝｸﾞ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--上部コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<div align="center" style="text-align:center;font-size:small;">
	所持{$ft.point.name}:{$app.user.user_point}{$ft.point.name}
	</div>
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar_home=true">{$ft.avatar.name}ｸﾛｰｾﾞｯﾄへ</a><br />
	{if $session.cart_avatar}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar_preview=true">{$ft.avatar.name}買い物かごへ</a><br />
	{/if}
	
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{foreach from=$app.ranking item=item name=avatar key =k}
		<div align="left" style="text-align:left;float:left;">
		<img src="?action_user_file_avatar_view=true&avatar_id={$item.avatar_id}&width={$config.avatar_t_width}&height={$config.avatar_t_height}&SESSID={$SESSID}" style="float:left;"><br />
			第{$k+4}位<br />
			<span style="margin-top:5px;">
				<a href="?action_user_avatar_buy=true&avatar_id={$item.avatar_id}">{$item.avatar_name}</a><br />
				{$item.avatar_desc}
			</span>
		</div>
		{html_style type="line" color="gray"}
	{/foreach}
</div>
<!--上部コンテンツ終了-->

<!--タイトル-->
{html_style type="title" title="`$ft.avatar_category.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--中部コンテンツ開始-->
<div align="cetner" style="text-align:center;font-size:small;">
	{foreach from=$app.category item=item name=avatar key =k}
		<a href="?action_user_avatar_list=true&avatar_category_id={$item.avatar_category_id}">{$item.avatar_category_name}</a>/
	{/foreach}
</div>
<!--中部コンテンツ終了-->

<!--下部コンテンツ開始-->
{html_style type="title" title="`$ft.avatar.name`検索" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="center" style="text-align:center;font-size:small;">
	{form action="$script" ethna_action="user_avatar_list"}
	{form_input name="keyword" size=12}&nbsp;
	{form_submit value="検索"}
	{/form}
</div>
<!--下部コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
