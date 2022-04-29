<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="ﾊﾟｽﾜｰﾄﾞ請求" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	{form ethna_action="user_remind_do" action="$script"}
	ﾊﾟｽﾜｰﾄﾞを忘れてしまった場合は､こちらから登録時のﾒｰﾙｱﾄﾞﾚｽへﾊﾟｽﾜｰﾄﾞを送信します｡<br />
	<br />
	<span style="color:{$form_name_color};">
	{form_name name="user_mailaddress"}:
	</span>
	<br />
	{form_input name="user_mailaddress"  istyle="3" mode="alphabet"}
	<br />
	<br />
	<div style="text-align:center;font-size:small;">{form_submit value="送信"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
