{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>�桼��ID{$app.user.user_id} {$app.user.user_nickname}�����ͧã</h2>
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{if $app.listview_total == 0}
					�������˹��פ���桼���ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���桼����{$app.listview_total}�͸��Ĥ���ޤ�����<br />
				{/if}
			</div>
			{include file="admin/pager.tpl"}
			{form action="$script" ethna_action="admin_user_friend_edit_do"}
			{form_input name="user_id"}
			<table class="sheet" id="list">
				<tr>
					<th>�桼��ID</th>
					<th>���ơ�����</th>
					<th>
						��Ͽ����<br />
						��������<br />
						�������
					</th>
					<th>�᡼�륢�ɥ쥹</th>
					<th>�˥å��͡���</th>
					<th>���顼�᡼���</th>
					<th>ͧã����</th>
					<th>�����ѹ�</th>
				</tr>
				{foreach from=$app.listview_data item=item name=user}
				{if $item != false}
				<tr>
					<td>{$item.user_id}</td>
					<td>{$config.user_status[$item.user_status].name}</td>
					<td>
						[��Ͽ]:{$item.user_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]:{$item.user_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[���]:{$item.user_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
					</td>
					<td>{$item.user_mailaddress}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_nickname}����</a></td>
					<td>{$item.user_magazine_error_num}</td>
					<td>{$config.friend_status[$item.friend_status].name}</td>
					<td class="checkedrow"><input name="check[]" type="checkbox" value="{$item.user_id}"></td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan="8" align="right">�����å����դ����桼���Ȥ�ͧã���֤�{form_input name="friend_status"}���Խ�{form_input name="update"}</td>
				</tr>
			</table>
			{/form}
			{include file="admin/pager.tpl"}
			
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->
{include file="admin/footer.tpl"}
