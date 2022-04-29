<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="新規登録について" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	<div align="center" style="text-align:center;font-size:medium;">
		<span style="font-size:small;text-decoration: blink;">[x:0107]</span>
		<a href="mailto:{$config.mail_account.regist.account}_{$session.media_access_hash}@{$config.mail_domain}?subject={$config.mail_account.regist.subject}&body={$config.mail_account.regist.body}"><span style="color:{$menucolor};">無料会員登録</span></a>
		<span style="font-size:small;text-decoration: blink;">[x:0107]</span>
	</div>
	<br />
	トップページの「会員登録空メール」というリンクをクリックするとメーラーが立ち上がります。<br />
	<br />
	<div align="center" style="text-align:center;">↓↓↓</div>
	<br />
	タイトル、本文ともに空の状態でメールを送信して下さい。<br />
	<br />
	<div align="center" style="text-align:center;">↓↓↓</div>
	<br />
	自動返信メールが届きますので、本文に記載されたURLにアクセスして下さい。<br />
	<br />
	<div align="center" style="text-align:center;">↓↓↓</div>
	<br />
	アクセス先のページでプロフィール情報を入力して下さい。<br />
	<br />
	<div align="center" style="text-align:center;">↓↓↓</div>
	<br />
	本登録完了です。<br />
	<div align="center" style="text-align:center;font-size:medium;">
		<span style="font-size:small;text-decoration: blink;">[x:0107]</span>
		<a href="mailto:{$config.mail_account.regist.account}_{$session.media_access_hash}@{$config.mail_domain}?subject={$config.mail_account.regist.subject}&body={$config.mail_account.regist.body}"><span style="color:{$menucolor};">無料会員登録</span></a>
		<span style="font-size:small;text-decoration: blink;">[x:0107]</span>
	</div>
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
