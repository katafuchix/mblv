<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="レビュー作成確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form action="$script" ethna_action="user_ec_review_add_do"}
		{$app_ne.hidden_vars}
		{form_name name="review_title"}:<br />
		&nbsp;{$form.review_title}<br /><br />
		{form_name name="review_body"}:<br />
		&nbsp;{$form.review_body|nl2br}
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		この内容でレビューを作成します｡<br />
		よろしいですか?<br />
		<br />
		<div align="center" style="text-align:center;font-size:small;">{form_input name="submit"}<br />{form_input name="back"}</div>
		{uniqid}
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
