<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.community_comment.name`投稿確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form ethna_action='user_community_comment_add_do' action="$script"}
		{$app_ne.hidden_vars}
		<span style="color:{$form_name_color};">
		{form_name name="community_comment_body"}:
		</span>
		<br />
		&nbsp;{$form.community_comment_body|nl2br}
		<br />
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		この内容で{$ft.community_comment.name}を投稿します｡<br />
		よろしいですか?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="add"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
