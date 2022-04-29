<!--ヘッダー-->
{include file="user/header.tpl" title="ナパタウンゲームランキング" bgcolor="#ffffff" text="#666666" link="#3399FF" vlink="#3399FF"}

<!--タイトル-->
{if $form.term == 'all'}
{html_style type="title" title="累計ランキング" bgcolor="blue" fontcolor="#ffffff"}
{else}
{html_style type="title" title="今月のランキング" bgcolor="blue" fontcolor="#ffffff"}
{/if}
<!--
{html_style type="title" title="`$app.game.game_name`のランキング" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
-->

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	<div align="center" style="text-align:center;font-size:small;">
	{if $form.term == 'all'}<a href="?action_user_game_score_list=true&game_id={$form.game_id}">{/if}今月{if $form.term == 'all'}</a>{/if}/{if $form.term !='all'}<a href="?action_user_game_score_list=true&game_id={$form.game_id}&term=all">{/if}累計{if $form.term!='all'}</a>{/if}
	</div>
	
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{include file="user/pager.tpl"}
	<table align="center" width="100%" >
	{foreach from=$app.listview_data item=item key=k}
		{if $k>0}
		<tr>
			<td colspan="2" align="center"><font size="1">……………………………………</font>
			</td>
		</tr>
		{/if}
		<tr align="center">
			<td width="24%"><img src="?action_user_file_avatar_preview=true&attr=t&user_id={$item.user_id}&SESSID={$SESSID}"></td>
			<td width="76%">
			<div align="left">
			{$item.rank}位：<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>
			</div>
			<div align="right">
			{$item.user_game_score_score}点
			</div>
		</td>
		</tr>
	{/foreach}
	</table>
	{include file="user/pager.tpl"}
</div>
<!--コンテンツ終了-->

{*コメントアウト
<!--コンテンツ開始>
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{include file="user/pager.tpl"}
	{foreach from=$app.listview_data item=item key=k}
		<span style="color:{$time_color}">{$item.rank}位:<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a></span><br />
		{$item.user_game_score_score}点<br />
		{html_style type="line" color="gray"}
	{/foreach}
	{include file="user/pager.tpl"}
</div>
<コンテンツ終了-->
*}

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

<!--フッター-->
{include file="user/footer.tpl" title_bgcolor="#ffffff" hrcolor="#000000" title="(C)ｽﾍﾟｰｽｱｳﾄ" title_fontcolor="#000000"}
