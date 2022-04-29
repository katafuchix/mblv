{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.postage.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_postage_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.postage.name}����FAQ</a></blockquote>
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{form action="$script" ethna_action="admin_ec_postage_add"}
				{$ft.menu_icon.name}{$ft.postage.name}��Ͽ
				{form_input name="postage_type"}
				{form_input name="postage_add"}
				{/form}
				
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.postage.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.postage.name}��{$app.listview_total}�︫�Ĥ���ޤ�����<br />
				{/if}
			</div>
			{form ethna_action="admin_ec_postage_list"}
			<table class="sheet">
				<tr>
					<th>��Ͽ����</th>
					<td {if $app.postage_created_active}class="active"{/if} nowrap>
						{form_input name="postage_created_year_start" emptyoption=""}ǯ
						{form_input name="postage_created_month_start" emptyoption=""}��
						{form_input name="postage_created_day_start" emptyoption=""}��
						��
						{form_input name="postage_created_year_end" emptyoption=""}ǯ
						{form_input name="postage_created_month_end" emptyoption=""}��
						{form_input name="postage_created_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="postage_id"}</th>
					<td {if $app.postage_id_active}class="active"{/if}>{form_input name="postage_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.postage_updated_active}class="active"{/if} nowrap>
						{form_input name="postage_updated_year_start" emptyoption=""}ǯ
						{form_input name="postage_updated_month_start" emptyoption=""}��
						{form_input name="postage_updated_day_start" emptyoption=""}��
						��
						{form_input name="postage_updated_year_end" emptyoption=""}ǯ
						{form_input name="postage_updated_month_end" emptyoption=""}��
						{form_input name="postage_updated_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="postage_name"}</th>
					<td {if $app.postage_name_active}class="active"{/if}>{form_input name="postage_name"}</td>
				</tr>
				<!--
				<tr>
					<th>�������</th>
					<td {if $app.postage_deleted_active}class="active"{/if} nowrap>
						{form_input name="postage_deleted_year_start" emptyoption=""}ǯ
						{form_input name="postage_deleted_month_start" emptyoption=""}��
						{form_input name="postage_deleted_day_start" emptyoption=""}��
						��
						{form_input name="postage_deleted_year_end" emptyoption=""}ǯ
						{form_input name="postage_deleted_month_end" emptyoption=""}��
						{form_input name="postage_deleted_day_end" emptyoption=""}��
					</td>
					<th style="width:20%"></th>
					<td></td>
				</tr>
				-->
				<tr>
					<th>{form_name name="postage_status"}</th>
					<td {if $app.postage_status_active}class="active"{/if}>
						{form_input name="postage_status"}
					</td>
					<th></th>
					<td>{form_input name="search"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{form_name name="postage_id"}</th>
					<th nowrap>{form_name name="postage_status"}</th>
					<th nowrap>
						��Ͽ����<br />
						��������<br />
					</th>
					<th nowrap>{form_name name="postage_name"}</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.postage_id}</td>
					<td {if $item.postage_status==0}class="disable"{/if}>{$config.regist_status[$item.postage_status].name}</td>
					<td nowrap>
						[��Ͽ]:{$item.postage_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]:{$item.postage_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
					</td>
					<td>{$item.postage_name}</td>
					<td><a href="?action_admin_ec_postage_edit=true&postage_id={$item.postage_id}">�Խ�</a></td>
					<td><a href="?action_admin_ec_postage_delete_do=true&postage_id={$item.postage_id}" onClick="return confirm('�����ˤ�����������������Ƥ������Ǥ�����');">���</a></td>
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
