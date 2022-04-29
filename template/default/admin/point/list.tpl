{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.point.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_point_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.point.name}����FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{if $config.option.point_exchange}
				{$ft.menu_icon.name}<a href="?action_admin_point_exchange_list=true">{$ft.point.name}�������</a>
				{/if}
				<!--{$ft.menu_icon.name}<a href="?action_admin_point_csv=true">{$ft.point.name}��ǧCSV���åץ���</a-->
				<br />
				
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.point.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.point.name}��{$app.listview_total}�︫�Ĥ���ޤ�����
				{/if}
			</div>
			{form action=$script ethna_action="admin_point_list"}
			<table class="sheet">
				<tr>
					<th>��������</th>
					<td {if $app.point_created_active}class="active"{/if} nowrap>
						{form_input name="point_created_year_start" emptyoption=""}ǯ
						{form_input name="point_created_month_start" emptyoption=""}��
						{form_input name="point_created_day_start" emptyoption=""}��
						��
						{form_input name="point_created_year_end" emptyoption=""}ǯ
						{form_input name="point_created_month_end" emptyoption=""}��
						{form_input name="point_created_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="point_id"}</th>
					<td {if $app.point_id_active}class="active"{/if}>{form_input name="point_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.point_updated_active}class="active"{/if} nowrap>
						{form_input name="point_updated_year_start" emptyoption=""}ǯ
						{form_input name="point_updated_month_start" emptyoption=""}��
						{form_input name="point_updated_day_start" emptyoption=""}��
						��
						{form_input name="point_updated_year_end" emptyoption=""}ǯ
						{form_input name="point_updated_month_end" emptyoption=""}��
						{form_input name="point_updated_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="point_memo"}</th>
					<td {if $app.point_memo_active}class="active"{/if}>{form_input name="point_memo"}</td>
				</tr>
				<tr>
					<th>�������</th>
					<td {if $app.point_deleted_active}class="active"{/if} nowrap>
						{form_input name="point_deleted_year_start" emptyoption=""}ǯ
						{form_input name="point_deleted_month_start" emptyoption=""}��
						{form_input name="point_deleted_day_start" emptyoption=""}��
						��
						{form_input name="point_deleted_year_end" emptyoption=""}ǯ
						{form_input name="point_deleted_month_end" emptyoption=""}��
						{form_input name="point_deleted_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="point_type"}</th>
					<td {if $app.point_type_active}class="active"{/if}>{form_input name="point_type" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="user_sub_id"}</th>
					<td {if $app.user_sub_id_active}class="active"{/if}>{form_input name="user_sub_id"}</td>
					<th>{form_name name="point_sub_id"}</th>
					<td {if $app.point_sub_id_active}class="active"{/if}>{form_input name="point_sub_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_id"}</th>
					<td {if $app.user_id_active}class="active"{/if}>{form_input name="user_id"}</td>
					<th>{form_name name="user_nickname"}</th>
					<td {if $app.user_nickname_active}class="active"{/if}>{form_input name="user_nickname"}</td>
				</tr>
				<tr>
					<th>{form_name name="point_status"}</th>
					<td {if $app.point_status_active}class="active"{/if}>{form_input name="point_status" emptyoption=""}</td>
					<th></th>
					<td>
						{form_submit value="����������"}
						&nbsp;
						{form_input name="download" value="����������ɡ�"}
					</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet">
				<tr>
					<th>
						��������<br />
						��������
					</th>
					<th nowrap>{$ft.point.name}ID</th>
					<th nowrap>{$ft.point.name}���ơ�����</th>
					<th nowrap>{$ft.point.name}������</th>
					<th nowrap>{$ft.point.name}</th>
					<th nowrap>{$ft.point.name}����ID</th>
					<th nowrap>{$ft.point.name}���</th>
					<th nowrap>�桼������ID</th>
					<th nowrap>�桼��ID</th>
					<th nowrap>�˥å��͡���</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				<tr>
					<td nowrap>
						[����]{$item.point_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]{$item.point_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
					</td>
					<td>{$item.point_id}</td>
					<td>{$config.point_status[$item.point_status].name}</td>
					<td>{$config.point_type[$item.point_type].name}</td>
					<td>{$item.point}{$ft.point_unit.name}</td>
					<td>{$item.point_sub_id}</td>
					<td>{$item.point_memo}</td>
					<td>{$item.user_sub_id}</td>
					<td>{$item.user_id}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_nickname}����</a></td>
<!--
					<td><a href="?action_admin_point_edit=true&point_id={$i.point_id}">�Խ�</a></td>
					<td><a href="?action_admin_point_delete_do=true&point_id={$i.point_id}&point_category_id={$form.point_category_id}" onClick="return confirm('�����ˤ��Υݥ���Ȥ������Ƥ������Ǥ�����');">���</a></td>
-->
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
