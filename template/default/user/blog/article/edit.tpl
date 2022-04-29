<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.blog_article.name`編集" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_blog_article_edit_confirm"}
		{form_input name="blog_article_id"}
		{form_input name="blog_article_hash"}
		<span style="color:{$form_name_color};">
		{form_name name="blog_article_title"}:
		</span><br />
		{form_input name="blog_article_title"}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="blog_article_body"}:
		</span><br />
		<div style="text-align:center;font-size:small;">
		{form_input name="blog_article_body" rows="5"}
		</div>
		<br />
		{if $form.image_id}
			<img src="f.php?type=image&id={$form.image_id}&attr=t&SESSID={$SESSID}" style="float:left" alt="画像"><br />
			<span>
			<a href="{html_style type='mailto' account='blog_article_image' hash=$form.blog_article_hash}">{$ft.image_edit.name}</a><br />
			{form_input name="delete_image"}
			</span>
			{html_style type="br"}
		{else}
			<div style="text-align:center;font-size:small;">
			<a href="{html_style type='mailto' account='blog_article_image' hash=$form.blog_article_hash}">{$ft.image_add.name}</a><br />
			</div>
		{/if}
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="blog_article_public"}:
		</span>
		<br />
		{form_input name="blog_article_public"}<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		入力内容を確認するには下のﾎﾞﾀﾝを押して下さい｡<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="edit_confirm"}</div>
	{/form}
	
	<br />
	
	<!--タイトル-->
	{html_style type="title" title="`$ft.blog_article.name`削除" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{form action="$script" ethna_action="user_blog_article_delete_confirm"}
		{form_input name="blog_article_id"}
		<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete_confirm"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
