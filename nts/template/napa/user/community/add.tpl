<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.community.name`��������" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
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
		�������Ƥ��ǧ����ˤϲ��ΎΎގ��ݤ򲡤��Ʋ�������<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="confirm"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
