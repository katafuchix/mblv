<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="���󤿤�ێ��ގ��������ѹ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	���󤿤�ێ��ގ��ݤ����ꤷ�ޤ���<br />
	�������ø�ͭ�μ����ֹ�����Ѥ��ơ����ʎߎ��܎��Ďޤ����Ϥ��ʤ��Ƥ�ێ��ގ��ݤǤ��뵡ǽ�Ǥ���<br />
	�ʎߎ��܎��Ďޤ����Ϥ��ƎΎގ��ݤ򲡤��Ƥ���������<br />
	<br />
	{form action="`$script`?guid=ON" ethna_action="user_config_login_edit_do"}
		<input type="hidden" name="guid" value="ON">
		<span style="color:{$form_name_color};">
		{form_name name="user_password"}
		</span>
		<br />
		{form_input name= "user_password" istyle="3" mode="alphabet"}<br />
		<br />
		{if $form.config_type}
			<div style="text-align:center;font-size:small;">{form_input name= "register"}</div>
		{else}
			<div style="text-align:center;font-size:small;">{form_input name= "edit"}<br />{form_input name= "delete"}</div>
		{/if}
		<input type="hidden" name="user_hash" value="{$form.user_hash}">
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
