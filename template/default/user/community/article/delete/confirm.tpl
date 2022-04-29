<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.community_article.name`削除確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form action="$script" ethna_action="user_community_article_delete_do"}
		{form_input name="community_article_id"}
		<span style="color:{$form_name_color};">
		{$ft.community_article.name}名:
		</span>
		<br />
		&nbsp;{$form.community_article_title}<br />
		<br />
		<span style="color:{$form_name_color};">
		本文:
		</span>
		<br />
		&nbsp;{$form.community_article_body}<br />
		<br />
		{if $form.image_id}
			<a href="?action_user_file_image_view=true&image_id={$form.image_id}&blog_article_id={$form.blog_article_id}">
			<img src="f.php?type=image&id={$form.image_id}&attr=t&SESSID={$SESSID}" alt="画像">
			</a>
		{/if}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		この{$ft.community_article.name}を削除します。<br />
		よろしいですか？
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
