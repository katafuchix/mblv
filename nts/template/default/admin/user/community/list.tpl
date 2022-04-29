{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>�桼��ID{$app.user.user_id} {$app.user.user_nickname}����λ��å��ߥ�˥ƥ�����</h2>
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{if $app.listview_total == 0}
				�������˹��פ���{$ft.community.name}�ϸ��Ĥ���ޤ���Ǥ�����
			{else}
				�������˹��פ���{$ft.community.name}��{$app.listview_total}�︫�Ĥ���ޤ�����
			{/if}
			{include file="admin/pager.tpl"}
			
			{form action="$script" ethna_action="admin_user_community_edit_do"}
			{form_input name="user_id"}
			<table class="sheet">
				<tr>
					<th>ID</th>
					<th>
						��������<br />
						��������<br />
						�������
					</th>
					<th>���С���</th>
					<th>���ߥ�˥ƥ������ȥ�</th>
					<th>���ߥ�˥ƥ�����</th>
					<th>���ߥ�˥ƥ����ƥ���</th>
					<th>���ߥ�˥ƥ����С�����</th>
					<th nowrap><input type="checkbox" onclick="$j('#list input:checkbox').attr('checked', this.checked);">�����ѹ�</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.community_id}</td>
					<td nowrap>
						[����]{$item.community_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]{$item.community_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[���]{if $item.community_status == 0 }{$item.community_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}{/if}
					</td>
					<td>{$item.community_member_num}</td>
					<td><a href="?action_admin_community_edit=true&community_id={$item.community_id}">{$item.community_title}</a></td>
					<td>{$item.community_description|nl2br}</td>
					<td>{$item.community_category_name}</td>
					<td>{$config.community_member_status[$item.community_member_status].name}</td>
					<td class="checkedrow" nowrap>
						<input type="checkbox" name="check[]" value="{$item.community_id}">
					</td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan=8 align="right">�嵭���ߥ�˥ƥ����С����֤�{form_input name="community_member_status"}�˹���{form_submit name="update"}</td>
				</tr>
			</table>
			{/form}
			
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
