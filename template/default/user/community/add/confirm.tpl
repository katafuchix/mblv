<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.community.name`������ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
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
		�������Ƥ�{$ft.community.name}��������ޤ���<br />
		������Ǥ���?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="add"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
