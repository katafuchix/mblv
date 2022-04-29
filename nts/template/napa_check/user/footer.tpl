{if !$no_navi}
{$sns_navi_template}
{/if}
<hr color="#ff6699" style="border:solid 1px #ff6699;">
{if !$no_footer}
<div align="left" style="text-align:left;font-size:small;">
{if $session.user.user_id && !$app.logout}
	<!--ログイン時フッター開始-->
	<a href="?action_user_top=true" accesskey="0">総合TOPへ</a><br />
	<a href="?action_user_home=true" accesskey="1">ﾏｲﾍﾟｰｼﾞ</a>
	<!--ログイン時フッター終了-->
{else}
	<!--未ログイン時フッター開始-->
	<a href="?action_user_index=true" accesskey="0">総合TOPへ</a>
	<!--未ログイン時フッター終了-->
{/if}
</div>
{/if}
<div style="background-color:#ffffff;text-align:center;font-size:x-small">(c)ｽﾍﾟｰｽｱｳﾄ</div>
{*if $title}
	{html_style type="title" title="$title" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{else}
	{html_style type="title" title="(c)$sns_name" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{/if*}
</div>
<!--コンテナ終了-->
</body>
</html>
