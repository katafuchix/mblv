{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.decomail.name}����</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_decomailcategory_add=true">{$ft.decomail_category.name}������Ͽ</a><br />
			{form action="$script" ethna_action="admin_decomailcategory_priority_do"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{$ft.decomail_category_priority_name.name}</th>
					<th nowrap>{$ft.decomail_category.name}̾</th>
					<th nowrap>{$ft.decomail.name}����</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.decomail_category_list item=i}
				<tr>
					<td><input name="decomail_category_priority_id[{$i.decomail_category_id}]" value="{$i.decomail_category_priority_id}" size="4"></td>
					<td>{$i.decomail_category_name}</td>
					<td nowrap><a href="?action_admin_decomail_list=true&decomail_category_id={$i.decomail_category_id}">{$ft.decomail.name}����</td>
					<td><a href="?action_admin_decomailcategory_edit=true&decomail_category_id={$i.decomail_category_id}">�Խ�</a></td>
					<td><a href="?action_admin_decomailcategory_delete_do=true&decomail_category_id={$i.decomail_category_id}" onClick="return confirm('�����ˤ���{$ft.decomail_category.name}�������Ƥ������Ǥ�����');">���</a></td>
				</tr>
				{/foreach}
			</table>
			��{$ft.decomail_category.name}ͥ���٤���0�פξ�硢�桼�����̤ˤ�ɽ������ޤ���<br />
			{form_submit value="`$ft.decomail_category.name`ͥ���ٹ���"}
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
