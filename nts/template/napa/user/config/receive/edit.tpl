<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="�Ҏ��ټ��������ѹ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	�Ҏ��ټ���������ѹ����ޤ���<br />
	��������򤷤ƎΎގ��ݤ򲡤��Ƥ���������<br />
	<br />
	{form action="$script" ethna_action="user_config_receive_edit_do"}
		<span style="color:{$form_name_color};">
		{form_name name="user_message_1_status"}:
		</span>
		<br />
		{form_input name= "user_message_1_status"}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="user_message_2_status"}:
		</span>
		<br />
		{form_input name= "user_message_2_status"}<br />
		<br />
		<!--span style="color:{$form_name_color};">
		{form_name name="user_message_3_status"}:
		</span>
		<br />
		{form_input name= "user_message_3_status"}<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="user_message_4_status"}:
		</span>
		<br />
		{form_input name= "user_message_4_status"}<br />
		<br /-->
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="edit"}<br /></div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
