<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.comment.name`�Խ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_comment_edit_confirm"}
		{form_input name='comment_id'}
		{form_input name='comment_body'}<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		�������Ƥ��ǧ����ˤϲ��ΎΎގ��ݤ򲡤��Ʋ�������<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="submit" value="�Խ���ǧ���̤�"}</div>
	{/form}
	
	<br />
	
	<!--�����ȥ�-->
	{html_style type="title" title="`$ft.comment.name`���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{form action="$script" ethna_action="user_comment_delete_confirm"}
		{form_input name="comment_id"}
		<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete_confirm"}</div>
	{/form}
	
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
