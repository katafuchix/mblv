{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.htmltemplate.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_htmltemplate_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.htmltemplate.name}����FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_htmltemplate_log=true">{$ft.htmltemplate.name}��</a><br />
				
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.html_template.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.html_template.name}��{$app.listview_total}�︫�Ĥ���ޤ�����
				{/if}
			</div>
			
			{form action="$script" ethna_action="admin_htmltemplate_list"}
			<table class="sheet">
				<tr>
					<th>�ǽ��������ϴ���</th>
					<td {if $app.html_template_edit_start_active}class="active"{/if} nowrap>
						{form_input name="html_template_edit_start_year_start" emptyoption=""}ǯ
						{form_input name="html_template_edit_start_month_start" emptyoption=""}��
						{form_input name="html_template_edit_start_day_start" emptyoption=""}��
						��
						{form_input name="html_template_edit_start_year_end" emptyoption=""}ǯ
						{form_input name="html_template_edit_start_month_end" emptyoption=""}��
						{form_input name="html_template_edit_start_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="html_template_id"}</th>
					<td {if $app.html_template_id_active}class="active"{/if}>{form_input name="html_template_id"}</td>
				</tr>
				<tr>
					<th>�ǽ�������λ����</th>
					<td {if $app.html_template_edit_end_active}class="active"{/if} nowrap>
						{form_input name="html_template_edit_end_year_start" emptyoption=""}ǯ
						{form_input name="html_template_edit_end_month_start" emptyoption=""}��
						{form_input name="html_template_edit_end_day_start" emptyoption=""}��
						��
						{form_input name="html_template_edit_end_year_end" emptyoption=""}ǯ
						{form_input name="html_template_edit_end_month_end" emptyoption=""}��
						{form_input name="html_template_edit_end_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="html_template_code"}</th>
					<td {if $app.html_template_code_active}class="active"{/if}>{form_input name="html_template_code"}</td>
				</tr>
				<tr>
					<th>{form_name name="html_template_edit"}</th>
					<td {if $app.html_template_edit_active}class="active"{/if}>{form_input name="html_template_edit" emptyoption=""}</td>
					<th></th>
					<td>{form_submit value="����������"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			<table class="sheet">
				<tr>
					<th nowrap>{$ft.htmltemplate.name}ID</th>
					<!--th nowrap>{$ft.htmltemplate.name}̾</th-->
					<th nowrap>{$ft.htmltemplate.name}������</th>
					<th nowrap>�Խ����ơ�����</th>
					<th nowrap>
						[�ǽ�������������]<br />
						[�ǽ�������λ����]
					</th>
					<th nowrap>�Խ�</th>
					<th nowrap>��</th>
					<!--th nowrap>���</th-->
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.html_template_id}</td>
					<!--td>{$app.html_template[$i.html_template_code].name}</td-->
					<td>{$i.html_template_code}</td>
					<td>{$config.html_template_edit[$i.html_template_edit].name}</td>
					<td>
						{$i.html_template_edit_start_time|jp_date_format:"%Y/%m/%d(%a) %H:%M:%S"}<br />
						{$i.html_template_edit_end_time|jp_date_format:"%Y/%m/%d(%a) %H:%M:%S"}
					</td>
					<td><a href="?action_admin_htmltemplate_edit=true&html_template_id={$i.html_template_id}">�Խ�</a></td>
					<td><a href="?action_admin_htmltemplate_log=true&html_template_id={$i.html_template_id}">��</a></td>
					<!--td>{if $i.html_template_system_status}<a href="?action_admin_htmltemplate_delete_do=true&html_template_id={$i.html_template_id}" onClick="return confirm('�����ˤ���{$ft.htmltemplate.name}�������Ƥ������Ǥ�����');">���</a>{/if}</td-->
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
