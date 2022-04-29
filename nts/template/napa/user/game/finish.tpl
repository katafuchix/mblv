<!--ヘッダー-->
{include file="user/header.tpl" title="ナパタウンゲーム`$form.game_name`" bgcolor="#ffffff" text="#666666" link="#3399FF" vlink="#3399FF"}

<!--タイトル-->
<table width="100%">
<tr bgcolor="blue" align="center"><td>
<span style="color:#ffffff">{$form.game_name}</span></td></tr>
</table>

<!--コンテンツ開始-->
<div align="center" style="text-align:center;">
	{if count($errors)}
	<div align="left" style="text-align:left;font-size:small;">
	<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>
	</div>
	{/if}

	{if $app.is_best}
	<span style="color:#FF00FF;">*★</span><span style="color:red">自己BEST更新!!</span><span style="color:#FF00FF;">★*</span><br>
	{/if}

	{$session.user.user_nickname}さん<br />
	の{$ft.score.name}:{$form.scr}<br />
	<span style="color:#FF00FF">★*:｡.｡:*･ﾟ･*:｡.｡:*･★</span>

	{if $app.game.game_ranking}
		今回の順位:{$app.rank}位<br />
	{/if}
		<br />
	{if $app.game.game_ranking}
		<a href="?action_user_game_score_list=true&game_id={$app.game.game_id}">ランキングをみる</a><br />
	{/if}
	<br />
	ブラウザバックで<br />
	もう一度挑戦!!<br />
	<!--hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	関連{$ft.community.name}<br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};"-->
	
	<!--コメント開始-->
	{form action="$script" ethna_action="user_comment_add_do"}
		感想をどうぞ<br>
		{form_input name="comment_type" value="2"}
		{form_input name="comment_subid" value="`$app.game.game_id`"}
		{form_input name="comment_body"}
		{form_submit name="add" value="投稿"}<br />
	{/form}
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
</div>

<!--div align="right" style="text-align:right;font-size:small;">
	<a href="?action_user_comment_list=true&comment_type=2&comment_subid={$app.game.game_id}">他の人の感想もみる</a>
</div>
<div align="left" style="text-align:left;font-size:small;">
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_game=true">{$ft.game.name}ﾎﾟｰﾀﾙへ</a><br />
</div-->
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl" title_bgcolor="#ffffff" hrcolor="#000000" title="(C)ｽﾍﾟｰｽｱｳﾄ" title_fontcolor="#000000"}
