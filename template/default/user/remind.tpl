<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="�ʎߎ��܎��Ď�����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<br />
	{form ethna_action="user_remind_do" action="$script"}
	�ʎߎ��܎��Ďޤ�˺��Ƥ��ޤä����ώ������餫����Ͽ���ΎҎ��َ��Ďގڎ��؎ʎߎ��܎��Ďޤ��������ޤ���<br />
	<br />
	<span style="color:{$form_name_color};">
	{form_name name="user_mailaddress"}:
	</span>
	<br />
	{form_input name="user_mailaddress"  istyle="3" mode="alphabet"}
	<br />
	<br />
	<div style="text-align:center;font-size:small;">{form_submit value="����"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
