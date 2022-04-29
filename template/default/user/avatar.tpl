<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.avatar.name`ﾎﾟｰﾀﾙ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--上部コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{$app_ne.cms_html1}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{if count($app.listview_data)}
		{foreach from=$app.listview_data item=news}
			[x:0112]{$news.news_time}&nbsp;<a href="?action_user_news_view=true&news_id={$news.news_id}">{$news.news_title}</a><br />
		{/foreach}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />
	{/if}
	<div align="center" style="text-align:center;font-size:small;">
	所持{$ft.point.name}:{$app.user.user_point}{$ft.point.name}
	</div>
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar_home=true">{$ft.avatar.name}ｸﾛｰｾﾞｯﾄへ</a><br />
	{if $session.cart_avatar}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar_preview=true">{$ft.avatar.name}買い物かごへ</a><br />
	{/if}
</div>
<!--上部コンテンツ終了-->

<!--タイトル-->
{html_style type="title" title="`$ft.avatar.name`ﾗﾝｷﾝｸﾞ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--中部コンテンツ開始-->
<div align="center" style="text-align:center;font-size:small;">
	<table align="center">
	{foreach from=$app.ranking item=item name=avatar key =k}
		{if $k%3==0}
			{if $k!=0}</tr>{/if}
			<tr>
		{/if}
		<td width="{$config.avatar_t_width}px" valign="top">
		<div style="float:left;width:{$config.avatar_t_width}px;font-size:small;" width="80px">
		<a href="?action_user_avatar_buy=true&avatar_id={$item.avatar_id}"><img src="?action_user_file_avatar_view=true&avatar_id={$item.avatar_id}&width={$config.avatar_t_width}&height={$config.avatar_t_height}&SESSID={$SESSID}" style="float:left;"></a><br />
		{$k+1}位
		</div>
		</td>
	{/foreach}
	</table>
	<div align="right" style="text-align:right;font-size:small;">
	=><a href="?action_user_avatar_ranking=true">もっと見る</a>
	</div>
	{html_style type="br"}
</div>
<!--中部コンテンツ終了-->

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

<!--下部コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{$app_ne.cms_html2}
</div>
<!--下部コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
