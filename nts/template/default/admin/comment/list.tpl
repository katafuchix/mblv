{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.communityt.name}{$ft.comment.name}����</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{if $app.listview_total == 0}
				�������˹��פ���{$ft.comment.name}�ϸ��Ĥ���ޤ���Ǥ�����
			{else}
				�������˹��פ���{$ft.comment.name}��{$app.listview_total}�︫�Ĥ���ޤ�����
			{/if}
			{form action="$script" ethna_action="admin_comment_list"}
			<table class="sheet">
				<tr>
					<th>��ƴ���</th>
					<td {if $app.comment_created_active}class="active"{/if} nowrap>
						{form_input name="comment_created_year_start" emptyoption=""}ǯ
						{form_input name="comment_created_month_start" emptyoption=""}��
						{form_input name="comment_created_day_start" emptyoption=""}��
						��
						{form_input name="comment_created_year_end" emptyoption=""}ǯ
						{form_input name="comment_created month_end" emptyoption=""}��
						{form_input name="comment_created_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="user_id"}</th>
					<td {if $app.user_id_active}class="active"{/if}>{form_input name="user_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.comment_updated_active}class="active"{/if} nowrap>
						{form_input name="comment_updated_year_start" emptyoption=""}ǯ
						{form_input name="comment_updated_month_start" emptyoption=""}��
						{form_input name="comment_updated_day_start" emptyoption=""}��
						��
						{form_input name="comment_updated_year_end" emptyoption=""}ǯ
						{form_input name="comment_updated month_end" emptyoption=""}��
						{form_input name="comment_updated_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="user_nickname"}</th>
					<td {if $app.user_nickname_active}class="active"{/if}>{form_input name="user_nickname"}</td>
				</tr>
				<tr>
					<th>�������</th>
					<td {if $app.article_deleted_active}class="active"{/if} nowrap>
						{form_input name="comment_deleted_year_start" emptyoption=""}ǯ
						{form_input name="comment_deleted_month_start" emptyoption=""}��
						{form_input name="comment_deleted_day_start" emptyoption=""}��
						��
						{form_input name="comment_deleted_year_end" emptyoption=""}ǯ
						{form_input name="comment_deleted month_end" emptyoption=""}��
						{form_input name="comment_deleted_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="comment_id"}</th>
					<td {if $app.comment_id_active}class="active"{/if}>{form_input name="comment_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="comment_body"}</th>
					<td {if $app.comment_body_active}class="active"{/if}>{form_input name="comment_body"}</td>
					<th>{form_name name="comment_status"}</th>
					<td {if $app.comment_status_active}class="active"{/if}>{form_input name="comment_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="comment_checked"}</th>
					<td {if $app.comment_checked_active}class="active"{/if}>{form_input name="comment_checked" emptyoption=""}</td>
					<th></th>
					<td>{form_submit value="����������"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			{form action="$script" ethna_action="admin_comment_list"}
			{$app_ne.hidden_vars}
			<table class="sheet" id="list">
				<tr>
					<th>ID</th>
					<th>���ơ�����</th>
					<th>�ƻ�</th>
					<th>
						�������<br />
						��������<br />
						�������
					</th>
					<th>�����ȥ桼��̾</th>
					<th>{$ft.comment.name}</th>
					<th nowrap><input type="checkbox" onclick="$j('#list input:checkbox').attr('checked', this.checked);">��ɽ��</th>
				</tr>
				<tr>
					<td class="checkedrow" colspan="8" align="right">����{$ft.comment.name}��{$ft.comment_checked.name}���ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.comment_id}</td>
					<td {if $item.comment_status==0}class="disable"{/if}>{$config.data_status[$item.comment_status].name}</td>
					<td class="{if $item.comment_checked==0}non{/if}checked">{$config.data_checked[$item.comment_checked].name}</td>
					<td nowrap>
						[���]{$item.comment_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]{$item.comment_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[���]{if $item.comment_status == 0}{$item.comment_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}{/if}
					</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_nickname}</a>����</td>
					<td><a href="?action_admin_comment_edit=true&comment_id={$item.comment_id}">{$item.comment_body|nl2br}</a></td>
					<td class="checkedrow" nowrap>
						<input type="hidden" name="id[]" value="{$item.comment_id}">
						<input type="checkbox" name="check[]" value="{$item.comment_id}" {if $item.comment_status == 0}checked="checked"{/if}>
					</td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan="8" align="right">�嵭{$ft.comment.name}��{$ft.comment_checked.name}���ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>
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
