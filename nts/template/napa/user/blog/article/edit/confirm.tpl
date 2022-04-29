<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{if $form.twitter_status}
{html_style type="title" title="`$ft.twitter.name`編集確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{else}
{html_style type="title" title="`$ft.blog_article.name`編集確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{/if}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_blog_article_edit_do"}
		{$app_ne.hidden_vars}
		<span style="color:{$form_name_color};">
		{if $form.twitter_status}
			{$ft.twitter.name}投稿
		{else}
			{form_name name="blog_article_title"}:
		{/if}
		</span>
		<br />
		&nbsp;{$form.blog_article_title}<br />
		<br />
		{if !$form.twitter_status}
			<span style="color:{$form_name_color};">
			{form_name name="blog_article_body"}:
			</span>
			<br />
			&nbsp;{$form.blog_article_body|nl2br}<br />
			<br />
		{/if}
		{if $form.delete_image}
		<span style="color:{$form_name_color};">
		{form_name name="delete_image"}:
		</span>
		<br />
		&nbsp;はい<br />
		{/if}
		<span style="color:{$form_name_color};">
		{if $form.twitter_status}
			{$ft.twitter.name}公開設定:
		{else}
			{form_name name="blog_article_public"}:
		{/if}
		</span>
		<br />
		&nbsp;{$config.blog_article_public[$form.blog_article_public].name}
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		この内容で{$ft.blog_article.name}を修正します｡<br />
		よろしいですか?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="update"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
