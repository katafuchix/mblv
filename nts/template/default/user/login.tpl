<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="�ێ��ގ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form ethna_action="user_login_do" action="`$script`?guid=ON"}
		<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_submit name="easy_login" value="�����󤿤�ێ��ގ��ݡ�"}</div><br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="user_mailaddress"}:
		</span>
		<br />
		{form_input name="user_mailaddress"  istyle="3" mode="alphabet"}
		<br />
		<br />
		<span style="color:{$form_name_color};">
		{form_name name="user_password"}
		</span>
		<br />
		{form_input name="user_password" istyle="3" mode="alphabet"}<br /><br />
		<div style="text-align:center;font-size:small;">{form_submit value="���ێ��ގ��ݡ�"}</div><br />
	{/form}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_remind=true">�ʎߎ��܎��Ďޤ�˺��Ƥ��ޤä���</a>
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
