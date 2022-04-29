<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.community_article.name`新規作成" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form ethna_action="user_community_article_add_confirm" action="$script"}
		{uniqid}
		{form_input name="community_id"}
		<span style="color:{$form_name_color};">
		{$ft.community_title.name}:
		</span>
		<br />
		{$app.community.community_title}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="community_article_title"}
		</span>
		<br />
		{form_input name="community_article_title"}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="community_article_body"}
		</span>
		<br />
		<div style="text-align:center;font-size:small;">
		{form_input name="community_article_body" rows=5}
		</div>
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		入力内容を確認するには下のﾎﾞﾀﾝを押して下さい｡<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="confirm"}</div>
	{/form}
	<br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_view=true&community_id={$app.community.community_id}">{$ft.community.name}へ戻る</a><br />
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
