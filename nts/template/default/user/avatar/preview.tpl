<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.avatar.name`�㤤ʪ����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{if count($errors)}<span style="color:red;font-size:small">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
	<div align="center" style="text-align:center;font-size:small;">
		<img src="?action_user_file_avatar_preview=true&width=100&height=100&SESSID={$SESSID}"><br />
		���{$ft.point.name}:{$app.user.user_point}{$ft.point.name}
	</div>
	{if $app.data_list}
		{html_style type="line" color="gray"}
		{form action="$script" ethna_action="user_avatar_buy_do"}
			{foreach from=$app.data_list item=item}
				<input type="checkbox" name="avatar_id_list[]" value="{$item.avatar_id}" {if $item.avatar_wear==1}checked="checked"{/if}>
				{*$app.ac[$item.avatar_category_id].name*}<!--:-->{$item.avatar_name}:{$item.avatar_point}{$ft.point.name}
				(
				{if $item.avatar_wear==1}
					<a href="?action_user_avatar_preview=true&cmd=off&cart_avatar_id={$item.avatar_id}">æ��</a>
				{else}
					<a href="?action_user_avatar_preview=true&cmd=on&cart_avatar_id={$item.avatar_id}">���</a>
				{/if}
				)<br />
			{/foreach}
			<div style="text-align:center;font-size:small;">
				���{$ft.point.name}:{$app.total_point}{$ft.point.name}<br />
				{form_submit value="���������롡"}
			</div>
		{/form}
	{/if}
	{if $form.avatar_id}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar_buy=true&avatar_id={$form.avatar_id}">����{$ft.avatar.name}�͎ߎ����ޤ�</a><br />
	{/if}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_avatar=true">{$ft.avatar.name}�Ύߎ����٤�</a><br />
</div>
<!--����ƥ�Ľ�λ-->

<!--�����ȥ�-->
{html_style type="title" title="`$ft.avatar_category.name`" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--��������ƥ�ĳ���-->
<div align="cetner" style="text-align:center;font-size:small;">
	{foreach from=$app.category item=item name=avatar key =k}
		<a href="?action_user_avatar_list=true&avatar_category_id={$item.avatar_category_id}">{$item.avatar_category_name}</a>/
	{/foreach}
</div>
<!--��������ƥ�Ľ�λ-->

<!--��������-->
{html_style type="title" title="`$ft.avatar.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}
<div align="center" style="text-align:center;font-size:small;">
	{form action="$script" ethna_action="user_avatar_list"}
	{form_input name="keyword" size=12}&nbsp;
	{form_submit value="����"}
	{/form}
</div>
<!--������λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
