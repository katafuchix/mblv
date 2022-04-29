<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.blacklist.name`登録確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--ブラックリスト登録フォーム開始-->
<div align="left" style="text-align:left;font-size:small;">
	{form action="$script" ethna_action="user_blacklist_add_do"}
		<span style="color:{$form_name_color};">
		相手のお名前:
		</span>
		<br />
		&nbsp;{$app.toUser.user_nickname}さん<br />
		<br />
		{$session.user.user_nickname}さんの{$ft.blacklist.name}に登録されたﾕｰｻﾞは{$session.user.user_nickname}さんに対する下記の機能が使えなくなります｡<br />
		・友達申請<br />
		・ﾐﾆﾒｰﾙ<br />
		・日記へのｺﾒﾝﾄ<br />
		・主催ｺﾐｭﾆﾃｨへの参加<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		このﾕｰｻﾞｰを{$ft.blacklist.name}に登録します｡<br />
		よろしいですか?<br /><br />
		<div style="text-align:center;font-size:small;">
			{form_input name="submit"}
		</div>
		<input type="hidden" name="user_id" value="{$app.toUser.user_id}">
		{$app_ne.hidden_vars}
		{uniqid}
	{/form}
</div>
<!--ブラックリスト登録フォーム終了-->

<!--ブラックリスト登録中止フォーム開始-->
{form action="$script" ethna_action="user_profile_view"}
	{$app_ne.hidden_vars}
	<input type="hidden" name="user_id" value="{$app.toUser.user_id}">
	<div style="text-align:center;font-size:small;">
		<input type="submit" value="　いいえ　">
	</div>
{/form}
<!--ブラックリスト登録中止フォーム終了-->

<!--フッター-->
{include file="user/footer.tpl"}
