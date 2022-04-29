<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.community_article.name`の編集" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form ethna_action="user_community_article_edit_confirm" action="$script"}
		{$app_ne.hidden_vars}
		{form_input name='community_article_id'}
		{form_input name='community_article_hash'}
		<span style="color:{$form_name_color};">
		{form_name name='community_article_title'}:
		</span>
		{form_input name='community_article_title'}
		<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name='community_article_body'}:
		</span>
		<div style="text-align:center;font-size:small;">
		{form_input name='community_article_body'}
		</div>
		{if $form.image_id}
			<br />
			<img src="f.php?type=image&id={$form.image_id}&attr=t&SESSID={$SESSID}" style="float:left;" alt="画像"><br />
			<span>
			<a href="{html_style type='mailto' account='community_article_image' hash=$form.community_article_hash}">{$ft.image_edit.name}</a><br />
			{form_input name="delete_image"}
			</span>
			{html_style type="br"}
		{else}
			<br />
			<div style="text-align:center;font-size:small;">
			<a href="{html_style type='mailto' account='community_article_image' hash=$form.community_article_hash}">{$ft.image_add.name}</a><br />
			</div>
		{/if}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		入力内容を確認するには下のﾎﾞﾀﾝを押して下さい｡<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="edit_confirm"}</div>
	{/form}
	
	<br />
	
	<!--タイトル-->
	{html_style type="title" title="`$ft.community_article.name`削除" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{form action="$script" ethna_action="user_community_article_delete_confirm"}
		{form_input name="community_article_id"}
		<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete_confirm"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
