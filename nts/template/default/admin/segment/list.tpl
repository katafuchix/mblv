{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.segment.name}����</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_segment_add=true">{$ft.segment.name}�ɲ�</a><br />
			{include file="admin/pager.tpl"}
			<table class="sheet">
				<tr>
					<th nowrap>��������̾</th>
					<th nowrap>�оݥ桼����</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.segment_name}</td>
					<td>{$i.segment_user_num}��</td>
					<td><a href="?action_admin_segment_edit=true&segment_id={$i.segment_id}">�Խ�</a></td>
					<td><a href="?action_admin_segment_delete_do=true&segment_id={$i.segment_id}" onClick="return confirm('�����ˤ���{$ft.segment.name}����������Ƥ������Ǥ�����');">���</a></td>
				</tr>
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
