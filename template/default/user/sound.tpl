<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.sound.name`ﾎﾟｰﾀﾙ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--上部コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{$app_ne.cms_html1}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />
	{if count($app.listview_data)}
		{foreach from=$app.listview_data item=news}
			[x:0112]{$news.news_time}&nbsp;<a href="?action_user_news_view=true&news_id={$news.news_id}">{$news.news_title}</a><br />
		{/foreach}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />
	{/if}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_sound_home=true">ﾀﾞｳﾝﾛｰﾄﾞ履歴</a>
</div>
<!--上部コンテンツ終了-->

<!--検索開始-->
{html_style type="title" title="`$ft.sound.name`検索" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="center" style="text-align:center;font-size:small;">
	{form action="$script" ethna_action="user_sound_list"}
	{form_input name="keyword" size=12}&nbsp;
	{form_submit value="検索"}
	{/form}
</div>
<!--検索終了-->

<!--タイトル-->
{html_style type="title" title="`$ft.sound.name`ｶﾃｺﾞﾘ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--中部コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.category item=item name=ad key =k}
			<a href="?action_user_sound_list=true&sound_category_id={$item.sound_category_id}">
			{if $item.sound_category_file1}<img src="f.php?file=sound/{$item.sound_category_file1}&SESSID={$SESSID}"><br />{/if}
			<div style="background-color:{$item.sound_category_color}"><font size="1" color="#ffffff">&gt;{$item.sound_category_name}</font></div>
			</a>
			{*$item.sound_category_desc*}
	{/foreach}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
</div>
<!--中部コンテンツ終了-->


<!--タイトル-->
{html_style type="title" title="`$ft.sound.name`ﾗﾝｷﾝｸﾞ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--中部コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.ranking item=item name=sound key =k}
			{if $item.sound_file1}<img src="f.php?file=sound/{$item.sound_file1}&SESSID={$SESSID}"><br />{/if}
			<a href="?action_user_sound_buy=true&sound_id={$item.sound_id}">{$item.sound_name}</a>&nbsp;&nbsp;{$item.sound_desc}
		{html_style type="line" color="gray"}
	{/foreach}
	<div align="right" style="text-align:right;font-size:small;">
	=><a href="?action_user_sound_ranking=true">もっと見る</a>
	</div>
	{html_style type="br"}
</div>
<!--中部コンテンツ終了-->


<!--下部コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{$app_ne.cms_html2}
</div>
<!--下部コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
