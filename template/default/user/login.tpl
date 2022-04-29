<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="ﾛｸﾞｲﾝ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{if $session.cart_hash}
		<!--ECから会員登録-->
		<span style="color:{$menucolor}">{$ft.menu_icon.name}</span>お買い物されたことのない方<br />
		<div style="text-align:center"><a href="{html_style type='mailto' account='regist' hash=$session.media_hash}">会員登録はこちらから</a></div>
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor}" />
	{/if}
	{form ethna_action="user_login_do" action="`$script`?guid=ON"}
		<br />
		<br />
		<div style="text-align:center">{form_submit name="easy_login" value="かんたんログイン"}</div>
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="user_mailaddress"}:
		</span>
		<br />
		{form_input name="user_mailaddress"  istyle="3" mode="alphabet"}
		<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="user_password"}
		</span>
		<br />
		{form_input name="user_password" istyle="3" mode="alphabet"}<br /><br />
		<div style="text-align:center;font-size:small;">{form_submit value="　ログイン　"}</div><br />
	{/form}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_remind=true">ﾊﾟｽﾜｰﾄﾞを忘れてしまった方</a><br /><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
