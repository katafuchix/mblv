{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.community.name}����</h2>
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{if $app.listview_total == 0}
				�������˹��פ���{$ft.community.name}�ϸ��Ĥ���ޤ���Ǥ�����
			{else}
				�������˹��פ���{$ft.community.name}��{$app.listview_total}�︫�Ĥ���ޤ�����
			{/if}
			{form action="$script" ethna_action="admin_community_list"}
			<table class="sheet">
				<tr>
					<th>��������</th>
					<td {if $app.community_created_active}class="active"{/if} nowrap>
						{form_input name="community_created_year_start" emptyoption=""}ǯ
						{form_input name="community_created_month_start" emptyoption=""}��
						{form_input name="community_created_day_start" emptyoption=""}��
						��
						{form_input name="community_created_year_end" emptyoption=""}ǯ
						{form_input name="community_created_month_end" emptyoption=""}��
						{form_input name="community_created_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="community_title"}</th>
					<td {if $app.community_title_active}class="active"{/if}>{form_input name="community_title"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.community_updated_active}class="active"{/if} nowrap>
						{form_input name="community_updated_year_start" emptyoption=""}ǯ
						{form_input name="community_updated_month_start" emptyoption=""}��
						{form_input name="community_updated_day_start" emptyoption=""}��
						��
						{form_input name="community_updated_year_end" emptyoption=""}ǯ
						{form_input name="community_updated_month_end" emptyoption=""}��
						{form_input name="community_updated_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="community_description"}</th>
					<td {if $app.community_description_active}class="active"{/if}>{form_input name="community_description"}</td>
				</tr>
				<tr>
					<th>�������</th>
					<td {if $app.community_deleted_active}class="active"{/if} nowrap>
						{form_input name="community_deleted_year_start" emptyoption=""}ǯ
						{form_input name="community_deleted_month_start" emptyoption=""}��
						{form_input name="community_deleted_day_start" emptyoption=""}��
						��
						{form_input name="community_deleted_year_end" emptyoption=""}ǯ
						{form_input name="community_deleted_month_end" emptyoption=""}��
						{form_input name="community_deleted_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="community_category_id"}</th>
					<td {if $app.community_category_id_active}class="active"{/if}>{form_input name="community_category_id" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="community_status"}</th>
					<td {if $app.community_status_active}class="active"{/if}>{form_input name="community_status" emptyoption=""}</td>
					<th>{form_name name="community_checked"}</th>
					<td {if $app.community_checked_active}class="active"{/if}>{form_input name="community_checked" emptyoption=""}</td>
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
			
			{form action="$script" ethna_action="admin_community_list"}
			{$app_ne.hidden_vars}
			<table class="sheet" id="list">
				<tr>
					<th>ID</th>
					<th>���ơ�����</th>
					<th>�ƻ�</th>
					<th>
						��������<br />
						��������<br />
						�������
					</th>
					<th>���С���</th>
					<th>���ߥ�˥ƥ������ȥ�</th>
					<th>���ߥ�˥ƥ�����</th>
					<th>���ߥ�˥ƥ����ƥ���</th>
					<th nowrap><input type="checkbox" onclick="$j('#list input:checkbox').attr('checked', this.checked);">��ɽ��</th>
				</tr>
				<tr>
					<td class="checkedrow" colspan=9 align="right">�������ߥ�˥ƥ��δƻ륹�ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.community_id}</td>
					<td {if $item.community_status==0}class="disable"{/if}>{$config.data_status[$item.community_status].name}</td>
					<td class="{if $item.community_checked==0}non{/if}checked">{$config.data_checked[$item.community_checked].name}</td>
					<td nowrap>
						[����]{$item.community_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]{$item.community_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[���]{if $item.community_status == 0 }{$item.community_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}{/if}
					</td>
					<td>{$item.community_member_num}</td>
					<td><a href="?action_admin_community_edit=true&community_id={$item.community_id}">{$item.community_title}</a></td>
					<td>{$item.community_description|nl2br}</td>
					<td>{$item.community_category_name}</td>
					<td class="checkedrow" nowrap>
						<input type="hidden" name="id[]" value="{$item.community_id}">
						<input type="checkbox" name="check[]" value="{$item.community_id}" {if $item.community_status == 0}checked="checked"{/if}>
					</td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan=9 align="right">�嵭���ߥ�˥ƥ��δƻ륹�ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>
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
