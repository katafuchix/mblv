<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.invite_name.name`送信内容確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	
	{form action=$script ethna_action="user_invite_do"}
		{uniqid}
		{$app_ne.hidden_vars}
		<span style="color:{$form_name_color};">
		{form_name name="to_user_mailaddress"}:
		</span>
		<br />
		&nbsp;{$form.to_user_mailaddress}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="message"}:
		</span>
		<br />
		&nbsp;{$form.message}<br />
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		この内容で招待ﾒｰﾙを送信します｡<br />
		よろしいですか?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="send"}<br />{form_input name="back"}</div>
	{/form}
	
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
