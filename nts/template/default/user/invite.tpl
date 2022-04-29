<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="友達招待" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	
	<!--友達招待開始-->
	新たに招待したい友達のﾒｰﾙｱﾄﾞﾚｽを記入してください。<br />
	{form action="$script" ethna_action="user_invite_confirm"}
		{uniqid}
		<span style="color:{$form_name_color};">
		{form_name  name="to_user_mailaddress"}:
		</span>
		<br />
		{form_input name="to_user_mailaddress" istyle="3" mode="alphabet"}<br /><br />
		<span style="color:{$form_name_color};">
		{form_name  name="message"}:
		</span>
		<br />
		<div style="text-align:center;font-size:small;">
		{form_input name="message"}
		</div>
		<br />
		<span style="color:{$form_name_color};">
		{form_name  name="capword"}:
		</span><br />
		<img src="./cap.php?rand={math equation="rand(0,99999999)"}&{$session_name}={$SESSID}"><br />
		{form_input name="capword" istyle="4" mode="numeric"}<br />
		※画像の数字を入力してください。<br /><br />
		<input type="hidden" name="user_hash" value="{$form.user_hash}">
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		入力内容を確認するには下のﾎﾞﾀﾝを押して下さい｡<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_submit value="　確認画面へ　"}</div>
	{/form}
	
	<br />
	
	<!--タイトル-->
	{html_style type="title" title="招待中一覧" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	<!--招待中開始-->
	{if $app.now_inviting_list}
		{html_style type="line" color="gray"}
		{foreach from=$app.now_inviting_list item=item}
			<a href="mailto:{$item.to_user_mailaddress}">{$item.to_user_mailaddress}</a><br />
			{html_style type="line" color="gray"}
		{/foreach}
	{else}
		現在招待中の{$ft.user.name}はいません｡
	{/if}
	<!--招待中終了-->
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
