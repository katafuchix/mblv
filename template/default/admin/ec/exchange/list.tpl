{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.exchange.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_exchange_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.exchange.name}����FAQ</a></blockquote>
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{form action="$script" ethna_action="admin_ec_exchange_add"}
				{$ft.menu_icon.name}{$ft.exchange.name}��Ͽ
				{form_input name="exchange_type"}
				{form_input name="exchange_add"}
				{/form}
				
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.exchange.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.exchange.name}��{$app.listview_total}�︫�Ĥ���ޤ�����<br />
				{/if}
			</div>
			{form ethna_action="admin_ec_exchange_list"}
			<table class="sheet">
				<tr>
					<th>��Ͽ����</th>
					<td {if $app.exchange_created_active}class="active"{/if} nowrap>
						{form_input name="exchange_created_year_start" emptyoption=""}ǯ
						{form_input name="exchange_created_month_start" emptyoption=""}��
						{form_input name="exchange_created_day_start" emptyoption=""}��
						��
						{form_input name="exchange_created_year_end" emptyoption=""}ǯ
						{form_input name="exchange_created_month_end" emptyoption=""}��
						{form_input name="exchange_created_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="exchange_id"}</th>
					<td {if $app.exchange_id_active}class="active"{/if}>{form_input name="exchange_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.exchange_updated_active}class="active"{/if} nowrap>
						{form_input name="exchange_updated_year_start" emptyoption=""}ǯ
						{form_input name="exchange_updated_month_start" emptyoption=""}��
						{form_input name="exchange_updated_day_start" emptyoption=""}��
						��
						{form_input name="exchange_updated_year_end" emptyoption=""}ǯ
						{form_input name="exchange_updated_month_end" emptyoption=""}��
						{form_input name="exchange_updated_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="exchange_name"}</th>
					<td {if $app.exchange_name_active}class="active"{/if}>{form_input name="exchange_name"}</td>
				</tr>
				<tr>
					<th>{form_name name="exchange_status"}</th>
					<td {if $app.exchange_status_active}class="active"{/if}>
						{form_input name="exchange_status"}
					</td>
					<th></th>
					<td>{form_input name="search"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{form_name name="exchange_id"}</th>
					<th nowrap>{form_name name="exchange_status"}</th>
					<th nowrap>
						��Ͽ����<br />
						��������<br />
					</th>
					<th nowrap>{form_name name="exchange_name"}</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.exchange_id}</td>
					<td {if $item.exchange_status==0}class="disable"{/if}>{$config.regist_status[$item.exchange_status].name}</td>
					<td nowrap>
						[��Ͽ]:{$item.exchange_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]:{$item.exchange_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
					</td>
					<td>{$item.exchange_name}</td>
					<td><a href="?action_admin_ec_exchange_edit=true&exchange_id={$item.exchange_id}">�Խ�</a></td>
					<td><a href="?action_admin_ec_exchange_delete_do=true&exchange_id={$item.exchange_id}" onClick="return confirm('�����ˤ�����������������������Ƥ������Ǥ�����');">���</a></td>
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
