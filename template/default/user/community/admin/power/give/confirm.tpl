<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="�������ξ���" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action='user_community_admin_power_give_do'}
		<input type="hidden" name="community_id" value="{$form.community_id}">
		<input type="hidden" name="new_admin_user_id" value="{$form.new_admin_user_id}">
		<br />
		<div align="left" style="text-align:left;font-size:small;">
			<a href="?action_user_profile_view=true&user_id={$app.new_admin_user.user_id}">{$app.new_admin_user.user_nickname}</a>����˴��������Ϥ��ޤ�����<br />
			<br />
		</div>
		<div style="text-align:center;font-size:small;">{form_input name="give"}<br />{form_input name="back"}</div>
	{/form}
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_community_view=true&community_id={$app.community_id}">{$ft.community.name}�����</a>
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
