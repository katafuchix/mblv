<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.friend.name`����γ�ǧ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<span style="color:{$form_name_color};">
	���Τ�̾��:
	</span>
	<br />
	&nbsp;{$app.to_user.user_nickname}����<br /><br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<br />
	<div align="left" style="text-align:left;font-size:small;">
		{$ft.friend.name}�������ޤ���<br />
		��������Ǥ���?<br />
		<br />
	</div>
	{form action="$script" ethna_action="user_friend_delete_do"}
		<div  style="text-align:center;font-size:small;">
	{form_input name="delete"}<br />{form_input name="back"}</div>
		{form_input name="to_user_id" type="hidden" value=$app.to_user.user_id}
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}