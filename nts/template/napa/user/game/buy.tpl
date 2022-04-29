<!--ヘッダー-->
{include file="user/header.tpl" title="ナパタウンゲーム`$form.game_name`" bgcolor="#ffffff" text="#666666" link="#3399FF" vlink="#3399FF"}

<!--タイトル-->
<table width="100%">
<tr bgcolor="blue" align="center"><td>
<span style="color:#ffffff">{$form.game_name}</span></td></tr>
</table>


<!--コンテンツ開始-->
<div align="center" style="text-align:center;">
	{if $form.game_file2}<img src="f.php?file=game/{$form.game_file2}&SESSID={$SESSID}">{/if}
	<br>
	<hr color="#ffffff">
	{if $app.low_term}
		<!--下位端末の場合エラーを表示-->
		<span style="color:#ff3366">●お客様の端末は<br>非対応となっております。</span><br />
	{else}
		{if $carrier=="AU"}
			{form action="$script" ethna_action="user_game_buy_do"}
				{form_input name="game_id"}
				{form_submit value="ﾀﾞｳﾝﾛｰﾄﾞ"}
			{/form}
		{else}
			{form action="$script" ethna_action="user_game_buy_do"}
				{form_input name="game_id"}
				{form_submit value="ﾀﾞｳﾝﾛｰﾄﾞ"}
			{/form}
		{/if}
	{/if}
	<hr color="#ffffff">
</div>

{$form.game_desc|nl2br}
<br>
<span style="color:red">[x:0166]操作説明</span><br>
{$form.game_explain|nl2br}<br />
<!--span style="color:green">[x:0062]</span><a href="?action_user_game_score_list=true&game_id={$form.game_id}">ランキング</a><br-->
<span style="color:blue">[x:0134]</span><a href="fp.php?code=game_device">対応機種</a><br><br>
 
<div align="center">
	<a href="http://i.spaceout-inc.jp/j000/top.jsp"><img src="img_napa/game/img/1.gif"></a><br>
</div>

<!--table bgcolor="#FEDCAA">
<tr align="center">
<td><img src="img_napa/game/img/c1.gif">
</td></tr>

<tr><td>
<a href="com_0001.html">ゲーム大好き(1200)</a>
</td></tr>

<tr><td>
<a href="com_0002.html">攻略コミュ(100)</a>
</td></tr>

<tr><td align="right">
<font size="1"><a href="com_other.html">他のｹﾞｰﾑｺﾐｭﾆﾃｨはｺﾁﾗ</a></font>
</td></tr>
</table-->


<table bgcolor="#BEDDF9">
<tr><td align="center">
<img src="img_napa/game/img/c2.gif">
</td></tr>

{foreach from=$app.listview_data item=item key=k}
<tr><td>
{$item.comment_body|nl2br}<br />
<div align="right" style="text-align:right;">
		<a href="?action_user_profile_view=true&user_id={$item.user_id}">{$item.user_nickname}</a>さん<br />
		{if $item.user_id == $session.user.user_id}
			[<a href="?action_user_comment_edit=true&comment_id={$item.comment_id}">編集</a> |
			<a href="?action_user_comment_delete_confirm=true&comment_id={$item.comment_id}">削除</a>]
		{/if}
</div>
</td></tr>
<tr><td><hr color="#067EEF"></td></tr>
{/foreach}

</table>
<hr color="blue">
<!--コメント終了-->

<!--フッター-->
{include file="user/footer.tpl" title_bgcolor="#ffffff" hrcolor="#000000" title="(C)ｽﾍﾟｰｽｱｳﾄ" title_fontcolor="#000000"}
