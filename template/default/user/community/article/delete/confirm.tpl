<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.community_article.name`�����ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form action="$script" ethna_action="user_community_article_delete_do"}
		{form_input name="community_article_id"}
		<span style="color:{$form_name_color};">
		{$ft.community_article.name}̾:
		</span>
		<br />
		&nbsp;{$form.community_article_title}<br />
		<br />
		<span style="color:{$form_name_color};">
		��ʸ:
		</span>
		<br />
		&nbsp;{$form.community_article_body}<br />
		<br />
		{if $form.image_id}
			<a href="?action_user_file_image_view=true&image_id={$form.image_id}&blog_article_id={$form.blog_article_id}">
			<img src="f.php?type=image&id={$form.image_id}&attr=t&SESSID={$SESSID}" alt="����">
			</a>
		{/if}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		����{$ft.community_article.name}�������ޤ���<br />
		������Ǥ�����
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
