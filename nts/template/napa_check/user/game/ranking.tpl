<!--ヘッダー-->
{include file="user/header.tpl" title="ナパタウンゲームランキング" bgcolor="#ffffff" text="#666666" link="#3399FF" vlink="#3399FF"}


<!--タイトル-->
<!--
{html_style type="title" title="`$ft.game.name`ﾎﾟｰﾀﾙ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
-->

<!--上部コンテンツ開始-->
<table align="center" width="100%" bgcolor="#98FB98">
<tr>
    <td colspan="2" align="center" height="34"><img src="img_napa/game/img/a2.gif"> 
    </td>
</tr>

	{foreach from=$app.ranking item=item name=game key =k}
	<tr>
	<td colspan="2"><span style="color:orange">[x:0167]</span>第{$k+4}位:<a href="?action_user_game_buy=true&game_id={$item.game_id}">{$item.game_name}</a>
	</td>
	</tr>
	<tr align="center">
	    <td>
		{if $item.game_file1}<img src="f.php?&file=game/{$item.game_file1}&SESSID={$SESSID}" style="float:left;">{/if}
		</td>
	    <td><span style="font-size:small">
		<div align="left">
		{$item.game_desc}<br>
		</div>
		<div align="right">
		<a href="?action_user_game_buy=true&game_id={$item.game_id}">詳細はｺﾁﾗへ</a>
		</div></span>
	</td>
	</tr>
	{/foreach}
</table>

<!--
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{$app_ne.cms_html1}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />
	{if count($app.listview_data)}
		{foreach from=$app.listview_data item=news}
			[x:0112]{$news.news_time}&nbsp;<a href="?action_user_news_view=true&news_id={$news.news_id}">{$news.news_title}</a><br />
		{/foreach}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};" />
	{/if}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_game_home=true">ｹﾞｰﾑ履歴</a>
</div>
-->
<!--上部コンテンツ終了-->



<!--タイトル-->
<!--
{html_style type="title" title="`$ft.game.name`ﾗﾝｷﾝｸﾞ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
-->


<!--中部コンテンツ開始-->

<!--
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.ranking item=item name=game key =k}
		<div align="left" style="text-align:left;float:left;">
			{if $item.game_file1}<img src="f.php?&file=game/{$item.game_file1}&SESSID={$SESSID}" style="float:left;">{/if}
			<span style="margin-top:5px;">
				<a href="?action_user_game_buy=true&game_id={$item.game_id}">{$item.game_name}</a><br />
				{$item.game_desc}
			</span>
		</div>
		{html_style type="line" color="gray"}
	{/foreach}
	<div align="right" style="text-align:right;font-size:small;">
	=><a href="?action_user_game_ranking=true">もっと見る</a>
	</div>
	{html_style type="br"}
</div>
-->
<!--中部コンテンツ終了-->


<!--タイトル-->
<div align="center">
<img src="img_napa/game/img/a3.gif"><br>
<!--
{html_style type="title" title="ｹﾞｰﾑｶ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
-->


<!--中部コンテンツ開始-->
	{foreach from=$app.category item=item name=game key =k}
		<a href="?action_user_game_list=true&game_category_id={$item.game_category_id}">{$item.game_category_name}</a>/
		{if ($k+1)/3==0}<br />{/if}
	{/foreach}
<br>
<a href="http://i.spaceout-inc.jp/s000/index.jsp"><img src="img_napa/game/img/2_1.gif"></a><br>
<br></div>

<div align="center">
<img src="img_napa/game/img/a4.gif"><br>
</div>

<!--
<div align="left" style="text-align:left;font-size:small;">
	{foreach from=$app.category item=item name=game key =k}
		<a href="?action_user_game_list=true&game_category_id={$item.game_category_id}">{$item.game_category_name}</a>/
	{/foreach}
</div>
-->
<!--中部コンテンツ終了-->

<!--検索開始-->
<!--
{html_style type="title" title="`$ft.game.name`検索" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="center" style="text-align:center;font-size:small;">
	{form action="$script" ethna_action="user_game_list"}
	{form_input name="keyword"  size=12}&nbsp;
	{form_submit value="検索"}
	{/form}
</div>
-->
<!--検索終了-->


<!--下部コンテンツ開始-->
<!--
<div align="left" style="text-align:left;font-size:small;">
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	{$app_ne.cms_html2}
</div>
-->
<!--下部コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl" title_bgcolor="#ffffff" hrcolor="#000000" title="(C)ｽﾍﾟｰｽｱｳﾄ" title_fontcolor="#000000"}
