<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.community_comment.name`��Ƴ�ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form ethna_action='user_community_comment_add_do' action="$script"}
		{$app_ne.hidden_vars}
		<span style="color:{$form_name_color};">
		{form_name name="community_comment_body"}:
		</span>
		<br />
		&nbsp;{$form.community_comment_body|nl2br}
		<br />
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		�������Ƥ�{$ft.community_comment.name}����Ƥ��ޤ���<br />
		������Ǥ���?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="add"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
