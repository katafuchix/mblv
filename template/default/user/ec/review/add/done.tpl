<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="レビュー作成完了" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<br />
	<div align="center" style="text-align:center;font-size:small;">レビューの作成が完了しました。</div>
	<br />
	
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
