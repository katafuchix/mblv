<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.avatar.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span color="{$errorcolor}" style="color:{$errorcolor}">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<div align="center" style="text-align:center;font-size:small;">
		<img src="?action_user_file_avatar_view=true&avatar_id={$form.avatar_id}&width={$config.avatar_t_width}&height={$config.avatar_t_height}&SESSID={$SESSID}">
	</div>
	<span style="color:{$form_name_color};">
	{$ft.avatar.name}̾:
	</span>
	{$form.avatar_name}<br />
	<span style="color:{$form_name_color};">
	{$ft.avatar.name}����:
	</span>
	{$form.avatar_desc}<br />
	<span style="color:{$form_name_color};">
	����{$ft.point.name}:
	</span>
	{$form.avatar_point}{$ft.point_unit.name}<br />
	<div style="text-align:center;font-size:small;">
		{if $form.avatar_stock_status == 1 && 0 >= $form.avatar_stock_num}
			{* ����ڤ� *}
			<span style="color:red;font-size:small">���ѿ���������ޤ��󤬤���{$ft.avatar.name}������ڤ�Ƥ��ޤ��ޤ�����</span>
		{elseif $form.avatar_end_status == 1 && $smarty.now|date_format:'%Y-%m-%d %H:%M:%S' > $form.avatar_end_time}
			{* �ۿ����ֽ�λ *}
			<span style="color:red;font-size:small">���ѿ���������ޤ��󤬤���{$ft.avatar.name}��������֤���λ���Ƥ��ޤ��ޤ�����</span>
		{else}
			{* ������ *}
			{form action="$script" ethna_action="user_avatar_preview"}
				{form_input name="avatar_id"}
				{form_input name="cart"}
			{/form}
		{/if}
	</div>
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar_preview=true&avatar_id={$form.avatar_id}">{$ft.avatar.name}�㤤ʪ������</a><br />
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar=true">{$ft.avatar.name}�Ύߎ����٤�</a><br /></div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
