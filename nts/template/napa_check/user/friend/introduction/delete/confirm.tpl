<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.community_comment.name`�����ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	{form ethna_action="user_friend_introduction_delete_do" action="$script"}
		{$app_ne.hidden_vars}
		<span style="color:{$form_name_color};">
		{$ft.friend_introduction.name}:
		</span>
		<br />
		&nbsp;{$app.friend.friend_introduction|nl2br}<br />
		<br />
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		����{$ft.friend_introduction.name}�������ޤ���<br />
		������Ǥ���?<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_input name="delete"}<br />{form_input name="back"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
