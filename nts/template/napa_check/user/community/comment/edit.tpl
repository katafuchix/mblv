<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.community_comment.name`���Խ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form ethna_action="user_community_comment_edit_confirm" action="$script"}
		{uniqid}
		{form_input name="community_comment_id"}
		{form_input name="community_comment_hash"}
		<span style="color:{$form_name_color}">
		{$ft.community_comment_body.name}:
		</span>
		<br />
		<div style="text-align:center;font-size:small;">
		{form_input name="community_comment_body" rows="5"}
		</div>
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		�������Ƥ��ǧ����ˤϲ��ΎΎގ��ݤ򲡤��Ʋ�������<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="confirm"}</div>
	{/form}
	
	<!--�����ȥ�-->
	{html_style type="title" title="`$ft.community_comment.name`���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
	{form action="$script" ethna_action="user_community_comment_delete_confirm"}
		{form_input name="community_comment_id"}
		<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete_confirm"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
