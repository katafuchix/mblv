{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.thema.name}����</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_thema_add=true">{$ft._thema.name}������Ͽ</a>
			{form action="$script" ethna_action="admin_gamecategory_priority_do"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{$ft.thema_name.name}</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.thema_name}</td>
					<td><a href="?action_admin_thema_edit=true&thema_id={$i.thema_id}">�Խ�</a></td>
					<td><a href="?action_admin_thema_delete_do=true&thema_id={$i.thema_id}" onClick="return confirm('�����ˤ���{$ft.thema_name.name}�������Ƥ������Ǥ�����');">���</a></td>
				</tr>
				{/foreach}
			</table>
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
