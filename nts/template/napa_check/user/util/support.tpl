<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="お問い合わせ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	■電話番号<br />
	<a href="telto:0300000000">03-0000-0000</a><br />
	（平日10:00〜19:00）<br />
	<br />
	■ﾒｰﾙｱﾄﾞﾚｽ<br />
	<a href="{$config.support_mailaccount}@{$config.mail_domain}">問い合わせる</a><br />
	（2営業日以内にお返事致します）
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
