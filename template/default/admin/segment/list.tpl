{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.segment.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_segment&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.segment.name}����FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_segment_add=true">{$ft.segment.name}�ɲ�</a><br />
			</div>
			{include file="admin/pager.tpl"}
			<table class="sheet" id="list">
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
		<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
