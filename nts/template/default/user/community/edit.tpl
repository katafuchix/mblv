<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.community.name`���Խ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form ethna_action='user_community_edit_confirm' action="$script"}
		{form_input name='community_id'}
		<span style="color:{$form_name_color};">
		{form_name name='community_title'}:
		</span>
		<br />
		{form_input name='community_title'}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name='community_category_id'}:
		</span>
		<br />
		{form_input name='community_category_id'}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="community_join_condition"}:
		</span>
		<br />
		{form_input name="community_join_condition"}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="community_topic_permission"}:
		</span>
		<br />
		{form_input name="community_topic_permission"}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="community_description"}:
		</span>
		<br />
		<div style="text-align:center;font-size:small;">
		{form_input name='community_description'}
		</div>
		<br />
		{if $form.image_id}
			<img src="f.php?type=image&id={$form.image_id}&attr=t&SESSID={$SESSID}" style="float:left" alt="����"><br />
			<span>
			<a href="{html_style type='mailto' account='community_image' hash=$form.community_hash}">{$ft.image_edit.name}</a><br />
			{form_input name="delete_image"}
			</span>
			{html_style type="br"}
		{else}
			<div style="text-align:center;font-size:small;">
			<a href="{html_style type='mailto' account='community_image' hash=$app.community.community_hash}">{$ft.image_add.name}</a>
			</div>
		{/if}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		�������Ƥ��ǧ����ˤϲ��ΎΎގ��ݤ򲡤��Ʋ�������<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="edit_confirm"}</div>
	{/form}
	
	<br />
	
	<!--�����ȥ�-->
	{html_style type="title" title="`$ft.community.name`���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{form action="$script" ethna_action="user_community_delete_confirm"}
		{form_input name="community_id"}
		<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete_confirm"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
