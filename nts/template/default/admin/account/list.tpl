{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.admin_account.name}����</h2>
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<div class="entry_box">
				{$ft.menu_icon.name}<a href="?action_admin_account_add=true">{$ft.admin_account.name}�ɲ�</a><br />
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th>������ID</th>
					<th>������̾</th>
					<th>������ID</th>
					<th>�ѥ����</th>
					<th>�����Ը���</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.listview_data item=item name=user}
				{if $item != false}
				<tr>
					<td>{$item.admin_id}</td>
					<td>{$item.admin_name}</td>
					<td>{$item.login_id}</td>
					<td>{$item.login_password}</td>
					<td>{$config.admin_status[$item.admin_status].name}</td>
					<td><a href="?action_admin_account_edit=true&admin_id={$item.admin_id}">�Խ�</a></td>
					<td><a href="?action_admin_account_delete_do=true&admin_id={$item.admin_id}" onClick="return confirm('�����ˤ���{$ft.admin_account.name}�������Ƥ������Ǥ�����');">���</a></td>
				</tr>
				{/if}
				{/foreach}
			</table>
			
			{include file="admin/pager.tpl"}
			
			<p id="pagetop"><a href="javascript:pagetop(0);">�ڡ����ȥå�</a></p>
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->
{include file="admin/footer.tpl"}
