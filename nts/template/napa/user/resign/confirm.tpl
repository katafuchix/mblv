<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="����ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	��񤹤�ˤώ���Ͽ�������Ϥ����ʎߎ��܎��Ďޤ����Ϥ��Ƥ���������<br />
	<br />
	{form action="$script" ethna_action="user_resign_do"}
		<span style="color:{$form_name_color};">
		{form_name name='user_password'}:
		</span>
		<br />
		{form_input name='user_password' istyle="3" mode="alphabet"}<br />
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		<div align="left" style="text-align:left;font-size:small;">
			��������񤷤Ƥ�����Ǥ���?<br />
			<br />
		</div>
		<div style="text-align:center;font-size:small;">{form_input name="resign" value="���ϡ�����"}<br />{form_input name="back" value="����������"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
