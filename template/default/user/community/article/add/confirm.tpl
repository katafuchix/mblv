<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.community_article.name`投稿確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form ethna_action="user_community_article_add_do" action="$script"}
		{uniqid}
		{$app_ne.hidden_vars}
		<span style="color:{$form_name_color};">
		{form_name name="community_article_title"}:
		</span>
		<br />
		&nbsp;{$form.community_article_title}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="community_article_body"}:
		</span>
		<br />
		&nbsp;{$form.community_article_body|nl2br}<br />
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		この内容で{$ft.community_article.name}を投稿します｡<br />
		よろしいですか?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="add"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
