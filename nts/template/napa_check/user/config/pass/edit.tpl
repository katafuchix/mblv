<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="�ێ��ގ��ݎʎߎ��܎��Ď��ѹ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	�ێ��ގ��ݎʎߎ��܎��Ďޤ��ѹ����ޤ���<br />
	��,��ʎߎ��܎��Ďޤ����Ϥ��ƎΎގ��ݤ򲡤��Ƥ���������<br />
	<br />
	{form action="$script" ethna_action="user_config_pass_edit_do"}
		<span style="color:{$form_name_color};">
		{form_name name="user_password"}
		</span>
		<br />
		{form_input name= "user_password" istyle="3" mode="alphabet"}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="new_user_password"}
		</span>
		<br />
		{form_input name= "new_user_password" istyle="3" mode="alphabet"}<br />
		<br>
		<div style="text-align:center;font-size:small;">{form_input name="edit"}<br /></div>
		<input type="hidden" name="user_hash" value="{$form.user_hash}">
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
