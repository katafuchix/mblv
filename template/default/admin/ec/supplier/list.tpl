{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.supplier.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_supplier_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.supplier.name}����FAQ</a></blockquote>
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_ec_supplier_add=true">{$ft.supplier.name}��Ͽ</a><br />
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.supplier.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.supplier.name}��{$app.listview_total}�︫�Ĥ���ޤ�����<br />
				{/if}
			</div>
			{form ethna_action="admin_ec_supplier_list"}
			<table class="sheet">
				<tr>
					<th>��Ͽ����</th>
					<td {if $app.supplier_created_active}class="active"{/if} nowrap>
						{form_input name="supplier_created_year_start" emptyoption=""}ǯ
						{form_input name="supplier_created_month_start" emptyoption=""}��
						{form_input name="supplier_created_day_start" emptyoption=""}��
						��
						{form_input name="supplier_created_year_end" emptyoption=""}ǯ
						{form_input name="supplier_created_month_end" emptyoption=""}��
						{form_input name="supplier_created_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="supplier_id"}</th>
					<td {if $app.supplier_id_active}class="active"{/if}>{form_input name="supplier_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.supplier_updated_active}class="active"{/if} nowrap>
						{form_input name="supplier_updated_year_start" emptyoption=""}ǯ
						{form_input name="supplier_updated_month_start" emptyoption=""}��
						{form_input name="supplier_updated_day_start" emptyoption=""}��
						��
						{form_input name="supplier_updated_year_end" emptyoption=""}ǯ
						{form_input name="supplier_updated_month_end" emptyoption=""}��
						{form_input name="supplier_updated_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="supplier_name"}</th>
					<td {if $app.supplier_name_active}class="active"{/if}>{form_input name="supplier_name"}</td>
				</tr>
				<!--
				<tr>
					<th>������</th>
					<td {if $app.supplier_deleted_active}class="active"{/if} nowrap>
						{form_input name="supplier_deleted_year_start" emptyoption=""}ǯ
						{form_input name="supplier_deleted_month_start" emptyoption=""}��
						{form_input name="supplier_deleted_day_start" emptyoption=""}��
						��
						{form_input name="supplier_deleted_year_end" emptyoption=""}ǯ
						{form_input name="supplier_deleted_month_end" emptyoption=""}��
						{form_input name="supplier_deleted_day_end" emptyoption=""}��
					</td>
					<th style="width:20%"></th>
					<td></td>
				</tr>
				-->
				<tr>
					<th>{form_name name="supplier_status"}</th>
					<td {if $app.supplier_status_active}class="active"{/if}>
						{form_input name="supplier_status"}
					</td>
					<th></th>
					<td>{form_input name="search"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{form_name name="supplier_id"}</th>
					<th nowrap>{form_name name="supplier_status"}</th>
					<th nowrap>
						��Ͽ����<br />
						��������<br />
					</th>
					<th nowrap>{form_name name="supplier_name"}</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.listview_data item=item name=user}
				{if $item != false}
				<tr>
					<td>{$item.supplier_id}</td>
					<td {if $item.supplier_status==0}class="disable"{/if}>{$config.regist_status[$item.supplier_status].name}</td>
					<td nowrap>
						[��Ͽ]:{$item.supplier_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]:{$item.supplier_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
					</td>
					<td>{$item.supplier_name}</td>
					<td><a href="?action_admin_ec_supplier_edit=true&supplier_id={$item.supplier_id}">�Խ�</a></td>
					<td><a href="?action_admin_ec_supplier_delete_do=true&supplier_id={$item.supplier_id}" onClick="return confirm('�����ˤ���{$ft.supplier.name}�������Ƥ������Ǥ�����');">���</a></td>
				</tr>
				{/if}
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
