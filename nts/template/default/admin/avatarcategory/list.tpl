{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.avatar.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_avatar&keepThis=true&TB_iframe=true&height=800&width=800" class="thickbox">{$ft.avatar.name}����FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_avatarcategory_add=true">{$ft.avatar_category.name}������Ͽ</a><br />
			{form action="$script" ethna_action="admin_avatarcategory_priority_do"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{$ft.avatar_category_priority.name}</th>
					<th nowrap>{$ft.avatar.name}�����ƥ५�ƥ���</th>
					<th nowrap>{$ft.avatar_category.name}̾</th>
					<th nowrap>{$ft.avatar_category.name}�Խ�</th>
					<th nowrap>{$ft.avatar_category.name}���</th>
					<th nowrap>{$ft.avatar.name}����</th>
				</tr>
				{foreach from=$app.avatar_category_list item=i}
				<tr>
					<td><input name="avatar_category_priority_id[{$i.avatar_category_id}]" value="{$i.avatar_category_priority_id}" size="4"></td>
					<td>{$config.avatar_system[$i.avatar_system_category_id].name}</td>
					<td>{$i.avatar_category_name}</td>
					<td nowrap><a href="?action_admin_avatar_list=true&avatar_category_id={$i.avatar_category_id}">{$ft.avatar.name}����</td>
					<td><a href="?action_admin_avatarcategory_edit=true&avatar_category_id={$i.avatar_category_id}">�Խ�</a></td>
					<td><a href="?action_admin_avatarcategory_delete_do=true&avatar_category_id={$i.avatar_category_id}" onClick="return confirm('�����ˤ���{$ft.avatar_category.name}�������Ƥ������Ǥ�����');">���</a></td>
				</tr>
				{/foreach}
			</table>
			��{$ft.avatar_category.name}ͥ���٤���0�פξ�硢�桼�����̤ˤ�ɽ������ޤ���<br />
			{form_submit value="`$ft.avatar_category.name`ͥ���ٹ���"}
			{/form}
			<p id="pagetop"><a href="javascript:pagetop(0);">�ڡ����ȥå�</a></p>
		<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
