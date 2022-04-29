<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.community.name`新規作成" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form ethna_action='user_community_add_confirm' action="$script"}
		<span style="color:{$form_name_color};">
		{form_name name='community_title'}:
		</span>
		<br />
		{form_input name='community_title'}<br />
		<span style="color:{$form_name_color};">
		{form_name name='community_category_id'}:
		</span>
		<br />
		{form_input name='community_category_id'}<br />
		<span style="color:{$form_name_color};">
		{form_name name='community_join_condition'}:
		</span>
		<br />
		{form_input name='community_join_condition'}<br />
		<span style="color:{$form_name_color};">
		{form_name name='community_topic_permission'}:
		</span>
		<br />
		{form_input name='community_topic_permission'}<br />
		<span style="color:{$form_name_color};">
		{form_name name='community_description'}:
		</span>
		<br />
		<div style="text-align:center;font-size:small;">
		{form_input name='community_description' rows=5}
		</div>
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		入力内容を確認するには下のﾎﾞﾀﾝを押して下さい｡<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="confirm"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
