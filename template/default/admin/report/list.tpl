{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.report.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_report_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.report.name}����FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.report.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.report.name}��{$app.listview_total}�︫�Ĥ���ޤ�����<br />
				{/if}
			</div>
			{form ethna_action="admin_report_list"}
			<table class="sheet">
				<tr>
					<th>��ƴ���</th>
					<td {if $app.report_created_active}class="active"{/if} nowrap>
						{form_input name="report_created_year_start" emptyoption=""}ǯ
						{form_input name="report_created_month_start" emptyoption=""}��
						{form_input name="report_created_day_start" emptyoption=""}��
						��
						{form_input name="report_created_year_end" emptyoption=""}ǯ
						{form_input name="report_created_month_end" emptyoption=""}��
						{form_input name="report_created_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="report_user_id"}</th>
					<td {if $app.report_user_id_active}class="active"{/if}>{form_input name="report_user_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.report_updated_active}class="active"{/if} nowrap>
						{form_input name="report_updated_year_start" emptyoption=""}ǯ
						{form_input name="report_updated_month_start" emptyoption=""}��
						{form_input name="report_updated_day_start" emptyoption=""}��
						��
						{form_input name="report_updated_year_end" emptyoption=""}ǯ
						{form_input name="report_updated_month_end" emptyoption=""}��
						{form_input name="report_updated_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="report_fail_user_id"}</th>
					<td {if $app.report_fail_user_id_active}class="active"{/if}>{form_input name="report_fail_user_id"}</td>
				</tr>
				<tr>
					<th>�������</th>
					<td {if $app.report_deleted_active}class="active"{/if} nowrap>
						{form_input name="report_deleted_year_start" emptyoption=""}ǯ
						{form_input name="report_deleted_month_start" emptyoption=""}��
						{form_input name="report_deleted_day_start" emptyoption=""}��
						��
						{form_input name="report_deleted_year_end" emptyoption=""}ǯ
						{form_input name="report_deleted_month_end" emptyoption=""}��
						{form_input name="report_deleted_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="report_id"}</th>
					<td {if $app.report_id_active}class="active"{/if}>{form_input name="report_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="report_message"}</th>
					<td {if $app.report_message_active}class="active"{/if}>{form_input name="report_message"}</td>
					<th>{form_name name="report_status"}</th>
					<td {if $app.report_status_active}class="active"{/if}>{form_input name="report_status"}</td>
				</tr>
				<tr>
					<th>{form_name name="report_checked"}</th>
					<td {if $app.report_checked_active}class="active"{/if}>{form_input name="report_checked" emptyoption=""}</td>
					<th></th>
					<td>{form_submit value="����������"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			{form action="$script" ethna_action="admin_report_list"}
			{$app_ne.hidden_vars}
			<table class="sheet">
				<tr>
					<th>ID</th>
					<th>���ơ�����</th>
					<th>�ƻ�</th>
					<th>
						�������<br />
						��������<br />
						�������
					</th>
					<th colspan="2">{$ft.report.name}�ԥ桼��ID�ȥ˥å��͡���</th>
					<th colspan="2">{$ft.report.name}���줿�桼��ID�ȥ˥å��͡���</th>
					<th>{$ft.report.name}��å�����</th>
					<th nowrap><input type="checkbox" onclick="$j('#list input:checkbox').attr('checked', this.checked);">��ɽ��</th>
				</tr>
				<tr>
					<td class="checkedrow" colspan=10 align="right">����{$ft.report.name}�δƻ륹�ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.report_id}</td>
					<td {if $item.report_status==0}class="disable"{/if}>{$config.regist_status[$item.report_status].name}</td>
					<td class="{if $item.report_checked==0}non{/if}checked">{$config.data_checked[$item.report_checked].name}</td>
					<td nowrap>
						[���]{$item.report_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]{$item.report_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[���]{if $item.report_status ==0}{$item.report_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}{/if}
					</td>
					<td>{$item.report_user_id}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.report_user_id}">{$item.report_user_nickname}����</a></td>
					<td>{$item.report_fail_user_id}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.report_fail_user_id}">{$item.report_fail_user_nickname}����</a></td>
					<td>{$item.report_message|nl2br}</td>
					<td class="checkedrow" nowrap>
						<input type="hidden" name="id[]" value="{$item.report_id}">
						<input type="checkbox" name="check[]" value="{$item.report_id}" {if $item.report_status == 0}checked="checked"{/if}>
					</td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan=10 align="right">�嵭{$ft.report.name}�δƻ륹�ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>
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
