{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.contents.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_contents_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.contents.name}����FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_contents_add=true">{$ft.contents.name}��Ͽ</a><br />
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.contents.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.contents.name}��{$app.listview_total}�︫�Ĥ���ޤ�����
				{/if}
			</div>
			{form action="$script" ethna_action="admin_contents_list"}
			<table class="sheet">
				<tr>
					<th>��������</th>
					<td {if $app.contents_created_active}class="active"{/if} nowrap>
						{form_input name="contents_created_year_start" emptyoption=""}ǯ
						{form_input name="contents_created_month_start" emptyoption=""}��
						{form_input name="contents_created_day_start" emptyoption=""}��
						��
						{form_input name="contents_created_year_end" emptyoption=""}ǯ
						{form_input name="contents_created_month_end" emptyoption=""}��
						{form_input name="contents_created_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="contents_id"}</th>
					<td {if $app.contents_id_active}class="active"{/if}>{form_input name="contents_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.contents_updated_active}class="active"{/if} nowrap>
						{form_input name="contents_updated_year_start" emptyoption=""}ǯ
						{form_input name="contents_updated_month_start" emptyoption=""}��
						{form_input name="contents_updated_day_start" emptyoption=""}��
						��
						{form_input name="contents_updated_year_end" emptyoption=""}ǯ
						{form_input name="contents_updated_month_end" emptyoption=""}��
						{form_input name="contents_updated_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="contents_code"}</th>
					<td {if $app.contents_code_active}class="active"{/if}>{form_input name="contents_code"}</td>
				</tr>
				<tr>
					<th>�������</th>
					<td {if $app.contents_deleted_active}class="active"{/if} nowrap>
						{form_input name="contents_deleted_year_start" emptyoption=""}ǯ
						{form_input name="contents_deleted_month_start" emptyoption=""}��
						{form_input name="contents_deleted_day_start" emptyoption=""}��
						��
						{form_input name="contents_deleted_year_end" emptyoption=""}ǯ
						{form_input name="contents_deleted_month_end" emptyoption=""}��
						{form_input name="contents_deleted_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="contents_title"}</th>
					<td {if $app.contents_title_active}class="active"{/if}>{form_input name="contents_title" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="contents_body"}</th>
					<td {if $app.contents_body_active}class="active"{/if}>{form_input name="contents_body" size="50"}</td>
					<th>{form_name name="contents_status"}</th>
					<td {if $app.contents_status_active}class="active"{/if}>{form_input name="contents_status"}</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<th></th>
					<td>{form_submit value="����������"}</td>
				</tr>
			</table>
			{/form}
			
			��{$ft.contents.name}URL<br />
			�������⤫���󥯤�Ž���硧fp.php?code=��{$ft.contents_code.name}��<br />
			�����ȳ������󥯤�Ž���硧{$config.user_url}fp.php?code=��{$ft.contents_code.name}��<br />
			{include file="admin/pager.tpl"}
			
			{form action="$script" ethna_action="admin_contents_list"}
			{$app_ne.hidden_vars}
			<table class="sheet" id="list">
				<tr>
					<th>ID</th>
					<th>���ơ�����</th>
					<th>
						��������<br />
						��������<br />
						�������
					</th>
					<th>{$ft.contents_code.name}</th>
					<th>{$ft.contents_title.name}</th>
					<th nowrap>����</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.contents_id}</td>
					<td {if $item.contents_status==0}class="disable"{/if}>{$config.data_status[$item.contents_status].name}</td>
					<td nowrap>
						[����]{$item.contents_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]{$item.contents_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[���]{$item.contents_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
					</td>
					<td>{$item.contents_code}</td>
					<td><a href="?action_admin_contents_edit=true&contents_id={$item.contents_id}">{$item.contents_title}</a></td>
					<td><a href="?action_admin_stats_list=true&type=contents&id={$item.contents_id}&term=month">����</a></td>
					<td><a href="?action_admin_contents_edit=true&contents_id={$item.contents_id}">�Խ�</a></td>
					<td><a href="?action_admin_contents_delete_do=true&contents_id={$item.contents_id}" onClick="return confirm('�����ˤ���{$ft.contents.name}�������Ƥ������Ǥ�����');">���</a></td>
				</tr>
				{/if}
				{/foreach}
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
