<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.community_comment.name`の編集" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form ethna_action="user_community_comment_edit_confirm" action="$script"}
		{uniqid}
		{form_input name="community_comment_id"}
		{form_input name="community_comment_hash"}
		<span style="color:{$form_name_color}">
		{$ft.community_comment_body.name}:
		</span>
		<br />
		<div style="text-align:center;font-size:small;">
		{form_input name="community_comment_body" rows="5"}
		</div>
		<br />
		{if $form.image_id}
			<img src="f.php?type=image&id={$form.image_id}&attr=t&SESSID={$SESSID}" style="float:left" alt="画像">
			<span>
			<a href="{html_style type='mailto' account='community_comment' hash=$form.community_comment_hash}">{$ft.image_edit.name}</a><br />
			{form_input name="delete_image"}
			</span>
			{html_style type="br"}
		{else}
			<div style="text-align:center;font-size:small;">
			<a href="{html_style type='mailto' account='community_comment' hash=$form.community_comment_hash}">{$ft.image_add.name}</a><br />
			</div>
		{/if}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		入力内容を確認するには下のﾎﾞﾀﾝを押して下さい｡<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="confirm"}</div>
	{/form}
	
	<!--タイトル-->
	{html_style type="title" title="`$ft.community_comment.name`削除" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{form action="$script" ethna_action="user_community_comment_delete_confirm"}
		{form_input name="community_comment_id"}
		<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete_confirm"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
