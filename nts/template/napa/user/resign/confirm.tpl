<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="退会確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	退会するには､登録時に入力したﾊﾟｽﾜｰﾄﾞを入力してください｡<br />
	<br />
	{form action="$script" ethna_action="user_resign_do"}
		<span style="color:{$form_name_color};">
		{form_name name='user_password'}:
		</span>
		<br />
		{form_input name='user_password' istyle="3" mode="alphabet"}<br />
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		<div align="left" style="text-align:left;font-size:small;">
			本当に退会してよろしいですか?<br />
			<br />
		</div>
		<div style="text-align:center;font-size:small;">{form_input name="resign" value="　は　い　"}<br />{form_input name="back" value="　いいえ　"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
