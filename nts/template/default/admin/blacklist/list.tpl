{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.blacklist.name}����</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{if $app.listview_total == 0}
				�������˹��פ���{$ft.blacklist.name}�ϸ��Ĥ���ޤ���Ǥ�����
			{else}
				�������˹��פ���{$ft.blacklist.name}��{$app.listview_total}�︫�Ĥ���ޤ�����<br />
			{/if}
			{form ethna_action="admin_blacklist_list"}
			<table class="sheet">
				<tr>
					<th>��Ͽ����</th>
					<td {if $app.black_list_created_active}class="active"{/if} nowrap>
						{form_input name="black_list_created_year_start" emptyoption=""}ǯ
						{form_input name="black_list_created_month_start" emptyoption=""}��
						{form_input name="black_list_created_day_start" emptyoption=""}��
						��
						{form_input name="black_list_created_year_end" emptyoption=""}ǯ
						{form_input name="black_list_created_month_end" emptyoption=""}��
						{form_input name="black_list_created_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="black_list_user_id"}</th>
					<td {if $app.black_list_user_id_active}class="active"{/if}>{form_input name="black_list_user_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.black_list_updated_active}class="active"{/if} nowrap>
						{form_input name="black_list_updated_year_start" emptyoption=""}ǯ
						{form_input name="black_list_updated_month_start" emptyoption=""}��
						{form_input name="black_list_updated_day_start" emptyoption=""}��
						��
						{form_input name="black_list_updated_year_end" emptyoption=""}ǯ
						{form_input name="black_list_updated_month_end" emptyoption=""}��
						{form_input name="black_list_updated_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="black_list_deny_user_id"}</th>
					<td {if $app.black_list_deny_user_id_active}class="active"{/if}>{form_input name="black_list_deny_user_id"}</td>
				</tr>
				<tr>
					<th>�������</th>
					<td {if $app.black_list_deleted_active}class="active"{/if} nowrap>
						{form_input name="black_list_deleted_year_start" emptyoption=""}ǯ
						{form_input name="black_list_deleted_month_start" emptyoption=""}��
						{form_input name="black_list_deleted_day_start" emptyoption=""}��
						��
						{form_input name="black_list_deleted_year_end" emptyoption=""}ǯ
						{form_input name="black_list_deleted_month_end" emptyoption=""}��
						{form_input name="black_list_deleted_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="black_list_id"}</th>
					<td {if $app.black_list_id_active}class="active"{/if}>{form_input name="black_list_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="black_list_status"}</th>
					<td {if $app.black_list_status_active}class="active"{/if}>{form_input name="black_list_status" emptyoption=""}</td>
					<th>{form_name name="black_list_checked"}</th>
					<td {if $app.black_list_checked_active}class="active"{/if}>{form_input name="black_list_checked" emptyoption=""}</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<th></th>
					<td>{form_submit value="����������"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			{form action="$script" ethna_action="admin_blacklist_list"}
			{$app_ne.hidden_vars}
			<table class="sheet" id="list">
				<tr>
					<th>ID</th>
					<th>���ơ�����</th>
					<th>�ƻ�</th>
					<th>
						��Ͽ����<br />
						��������<br />
						�������
					</th>
					<th colspan="2">{$ft.black_list_user_id.name}�ȥ˥å��͡���</th>
					<th colspan="2">{$ft.black_list_deny_user_id.name}�ȥ˥å��͡���</th>
					<th nowrap><input type="checkbox" onclick="$j('#list input:checkbox').attr('checked', this.checked);">��ɽ��</th>
				</tr>
				<tr>
					<td class="checkedrow" colspan=10 align="right">����{$ft.blacklist.name}��{$ft.black_list_checked.name}���ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.black_list_id}</td>
					<td {if $item.black_list_status==0}class="disable"{/if}>{$config.regist_status[$item.black_list_status].name}</td>
					<td class="{if $item.black_list_checked==0}non{/if}checked">{$config.data_checked[$item.black_list_checked].name}</td>
					<td nowrap>
						[���]{$item.black_list_regist_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]{$item.black_list_update_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[���]{if $item.black_list_status == 0}
								{$item.black_list_delete_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
							  {/if}
					</td>
					<td>{$item.black_list_user_id}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.black_list_user_id}">{$item.black_list_user_nickname}</a>����</td>
					<td>{$item.black_list_deny_user_id}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.black_list_deny_user_id}">{$item.black_list_deny_user_nickname}</a>����</td>
					<td class="checkedrow" nowrap>
						<input type="hidden" name="id[]" value="{$item.black_list_id}">
						<input type="checkbox" name="check[]" value="{$item.black_list_id}" {if $item.black_list_status == 0}checked="checked"{/if}>
					</td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan=10 align="right">�嵭{$ft.blacklist.name}��{$ft.black_list_checked.name}���ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>
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
