<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{if $form.twitter_status}
{html_style type="title" title="`$ft.twitter.name`削除確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{else}
{html_style type="title" title="`$ft.blog_article.name`削除確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
{/if}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_blog_article_delete_do"}
		{form_input name="blog_article_id"}
		{form_input name="twitter_status"}
		<span style="color:{$form_name_color};">
		{if $form.twitter_status}
			{$ft.twitter.name}投稿
		{else}
			{form_name name="blog_article_title"}
		{/if}
		</span>
		<br />
		&nbsp;{$form.blog_article_title}<br />
		<br />
		{if !$form.twitter_status}
			<span style="color:{$form_name_color};">
			{form_name name="blog_article_body"}
			</span>
			<br />
			&nbsp;{$form.blog_article_body}<br />
			<br />
		{/if}
		{if $form.image_id}
			<a href="?action_user_file_image_view=true&image_id={$form.image_id}&blog_article_id={$form.blog_article_id}">
			<img src="f.php?type=image&id={$form.image_id}&attr=t&SESSID={$SESSID}" alt="画像">
			</a>
		{/if}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		この{if $form.twitter_status}{$ft.twitter.name}投稿{else}{$ft.blog_article.name}{/if}を削除します｡<br />
		よろしいですか?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
