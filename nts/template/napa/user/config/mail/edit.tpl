<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="ﾒｰﾙｱﾄﾞﾚｽ変更" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	登録したﾒｰﾙｱﾄﾞﾚｽを変更しますので、下記のﾘﾝｸをｸﾘｯｸしてからメールをして下さい。<br />
	ﾒｰﾙ送信後しばらくするとﾒｰﾙｱﾄﾞﾚｽ変更完了ﾒｰﾙが届きます。
	<br />
	<div align="center" style="text-align:center;font-size:small;">
	<a href="{html_style type='mailto' account='change' subject='このままﾒｰﾙを送信してください' body=$session.user.user_hash}">[x:0105]ﾒｰﾙｱﾄﾞﾚｽ変更[x:0105]</a><br />
	</div>
	<br />
	迷惑メール対策をしている方は「{$config.mail_domain}」からのﾒｰﾙを受信できるよう設定をお願い致します。
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
