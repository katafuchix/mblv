<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.community.name`作成確認" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form ethna_action='user_community_add_do' action="$script"}
		{$app_ne.hidden_vars}
		<span style="color:{$form_name_color};">
		{form_name name='community_title'}:
		</span>
		<br />
		&nbsp;{$form.community_title}<br />
		<span style="color:{$form_name_color};">
		{form_name name='community_category_id'}:
		</span>
		<br />
		&nbsp;{$form.community_category_name}<br />
		<span style="color:{$form_name_color};">
		{form_name name='community_join_condition'}:
		</span>
		<br />
		&nbsp;{$config.community_join_condition[$form.community_join_condition].name}<br />
		<span style="color:{$form_name_color};">
		{form_name name='community_topic_permission'}:
		</span>
		<br />
		&nbsp;{$config.community_topic_permission[$form.community_topic_permission].name}<br />
		<span style="color:{$form_name_color};">
		{form_name name='community_description'}:
		</span>
		<br />
		&nbsp;{$form.community_description|nl2br}<br />
		{uniqid}
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		この内容で{$ft.community.name}を作成します｡<br />
		よろしいですか?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="add"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
