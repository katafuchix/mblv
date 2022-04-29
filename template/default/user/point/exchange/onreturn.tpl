<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="ﾎﾟｲﾝﾄｵﾝID認証完了" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	ﾎﾟｲﾝﾄｵﾝIDの認証が完了しました。
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<span style="color:{$menucolor}">◆</span><a href="?action_user_login_do=true&easy_login=true" utn="true">簡単ﾛｸﾞｲﾝ</a><br />
	<span style="color:{$menucolor}">◆</span><a href="?action_user_login=true">ﾛｸﾞｲﾝ</a><br />
	<span style="color:{$menucolor}">◆</span>ﾊﾟｽﾜｰﾄﾞを忘れてしまった方は<a href="?action_user_remind=true">ｺﾁﾗ</a>
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
