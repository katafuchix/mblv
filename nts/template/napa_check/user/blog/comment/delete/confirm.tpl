<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.blog_comment.name`�����ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_blog_comment_delete_do"}
		{form_input name="blog_comment_id"}
		<span style="color:{$form_name_color};">
		���Ҏݎ�:
		</span>
		<br />
		&nbsp;{$form.blog_comment_body|nl2br}<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		<div align="left" style="text-align:left;font-size:small;">
			����{$ft.blog_comment.name}�������ޤ���<br />
			������Ǥ���?<br />
			<br />
		</div>
		<div  style="text-align:center;font-size:small;">{form_input name="submit"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
