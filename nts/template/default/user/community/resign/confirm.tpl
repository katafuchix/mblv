<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.community.name`����ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form action="$script" ethna_action="user_community_resign_do"}
		{form_input name="community_id"}
		<br />
		<div align="left" style="text-align:left;font-size:small;">
			����{$ft.community.name}����񤷤ޤ���<br>
			������Ǥ�����<br />
			<br />
		</div>
		<div style="text-align:center;font-size:small;">{form_input name="resign"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
