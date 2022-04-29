<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.comment.name`編集確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form ethna_action='user_comment_edit_do' action="$script"}
		{$app_ne.hidden_vars}
		<span style="color:{$form_name_color};">
		{form_name name="comment_body"}:
		</span><br />
		&nbsp;{$form.comment_body|nl2br}
		<br />
		<br />
		{if $form.delete_image}
		<span style="color:{$form_name_color};">
		{form_name name="delete_image"}:
		</span>
		<br />
		&nbsp;はい<br />
		{/if}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		この内容で{$ft.comment.name}を編集します｡<br />
		よろしいですか?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="submit"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
