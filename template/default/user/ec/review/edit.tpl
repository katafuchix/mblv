<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="レビュー編集" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	{$app.item_name}のレビューが編集できます｡<br />
	<br />
	{form action="$script" ethna_action="user_ec_review_edit_confirm"}
	{form_name name="review_title"}<br />
	{form_input name="review_title"}<br />
	<br />
	{form_name name="review_body"}<br />
	{form_input name="review_body"}<br />
	<br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	入力内容を確認するには下のﾎﾞﾀﾝを押して下さい｡<br />
	<br />
	<div align="center" style="text-align:center;font-size:small;">
		{form_submit value="確認画面へ"}
	</div>
	{form_input name="review_id"}
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
