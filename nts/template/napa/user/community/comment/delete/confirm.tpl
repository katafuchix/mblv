<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.community_comment.name`�����ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_community_comment_delete_do"}
		{form_input name="community_comment_id"}

		<span style="color:{$form_name_color};">
		
		</span>
		<br>
		&nbsp;{$app.comment.community_comment_body}<br />
		{if $app.comment.image_id}
			<img src="?action_user_file_get_thumbnail=true&image_id={$app.comment.image_id}&SESSID={$SESSID}" alt="����"><br />
			[<a href="?action_user_file_image_view=true&image_id={$app.comment.image_id}&community_comment_id={$form.community_comment_id}">���������</a>]<br />
		{/if}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		<div align="left" style="text-align:left;font-size:small;">
			����{$ft.community_comment.name}�������ޤ���<br />
			������Ǥ�����</div>
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
