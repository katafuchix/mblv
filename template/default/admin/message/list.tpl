{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.message.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_message_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.message.name}����FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.message.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.message.name}��{$app.listview_total}�ĸ��Ĥ���ޤ�����
				{/if}
			</div>
			{form ethna_action="admin_message_list"}
			<table class="sheet">
				<tr>
					<th>��ƴ���</th>
					<td {if $app.message_created_active}class="active"{/if} nowrap>
						{form_input name="message_created_year_start" emptyoption=""}ǯ
						{form_input name="message_created_month_start" emptyoption=""}��
						{form_input name="message_created_day_start" emptyoption=""}��
						��
						{form_input name="message_created_year_end" emptyoption=""}ǯ
						{form_input name="message_created_month_end" emptyoption=""}��
						{form_input name="message_created_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="from_user_id"}</th>
					<td {if $app.from_user_id_active}class="active"{/if}>{form_input name="from_user_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.message_updated_active}class="active"{/if} nowrap>
						{form_input name="message_updated_year_start" emptyoption=""}ǯ
						{form_input name="message_updated_month_start" emptyoption=""}��
						{form_input name="message_updated_day_start" emptyoption=""}��
						��
						{form_input name="message_updated_year_end" emptyoption=""}ǯ
						{form_input name="message_updated_month_end" emptyoption=""}��
						{form_input name="message_updated_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="to_user_id"}</th>
					<td {if $app.to_user_id_active}class="active"{/if}>{form_input name="to_user_id"}</td>
				</tr>
				<tr>
					<th>�������</th>
					<td {if $app.message_deleted_active}class="active"{/if} nowrap>
						{form_input name="message_deleted_year_start" emptyoption=""}ǯ
						{form_input name="message_deleted_month_start" emptyoption=""}��
						{form_input name="message_deleted_day_start" emptyoption=""}��
						��
						{form_input name="message_deleted_year_end" emptyoption=""}ǯ
						{form_input name="message_deleted_month_end" emptyoption=""}��
						{form_input name="message_deleted_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="message_title"}</th>
					<td {if $app.message_title_active}class="active"{/if}>{form_input name="message_title"}</td>
				</tr>
				<tr>
					<th>{form_name name="message_body"}</th>
					<td {if $app.message_body_active}class="active"{/if}>{form_input name="message_body"}</td>
					<th>{form_name name="message_status"}</th>
					<td {if $app.message_status_active}class="active"{/if}>{form_input name="message_status"}</td>
				</tr>
				<tr>
					<th>{form_name name="message_checked"}</th>
					<td {if $app.message_checked_active}class="active"{/if}>{form_input name="message_checked" emptyoption=""}</td>
					<th></th>
					<td>{form_submit value="����������"}</td>
				</tr>
			</table>
			
			{include file="admin/pager.tpl"}
			
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
					<th>�����桼��</th>
					<th>�����桼��</th>
					<th>{$ft.message_title.name}</th>
					<th>{$ft.message_body.name}</th>
					<th>{$ft.image.name}</th>
					<th nowrap><input type="checkbox" onclick="$j('#list input:checkbox').attr('checked', this.checked);">��ɽ��</th>
				</tr>
				<tr>
					<td class="checkedrow" colspan=11 align="right">����{$ft.message.name}��{$ft.message_checked.name}���ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.message_id}</td>
					<td {if $item.message_status==0}class="disable"{/if}>{$config.data_status[$item.message_status].name}</td>
					<td class="{if $item.message_checked==0}non{/if}checked">{$config.data_checked[$item.message_checked].name}</td>
					<td nowrap>
						[���]{$item.message_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]{$item.message_updted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[���]{$item.message_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
					</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.from_user_id}">{$item.from_user_nickname}</a>����</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.to_user_id}">{$item.to_user_nickname}</a>����</td>
					<td>{$item.message_title}</td>
					<td>{$item.message_body|nl2br}</td>
					<td>{if $item.image_id}<img src="f.php?type=image&id={$item.image_id}&attr=t">{/if}</td>
					<td class="checkedrow" nowrap>
						<input type="hidden" name="id[]" value="{$item.message_id}">
						<input type="checkbox" name="check[]" value="{$item.message_id}" {if $item.message_status == 0}checked="checked"{/if}>
					</td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan=11 align="right">�嵭{$ft.message.name}��{$ft.message_checked.name}���ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>
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
