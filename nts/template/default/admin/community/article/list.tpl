{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.community_article.name}����</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{if $app.listview_total == 0}
				�������˹��פ���{$ft.community.name}{$ft.community_article.name}�ϸ��Ĥ���ޤ���Ǥ�����
			{else}
				�������˹��פ���{$ft.community.name}{$ft.community_article.name}��{$app.listview_total}�︫�Ĥ���ޤ�����
			{/if}
			{form action="$script" ethna_action="admin_community_article_list"}
			<table class="sheet">
				<tr>
					<th>��ƴ���</th>
					<td {if $app.community_article_created_active}class="active"{/if} nowrap>
						{form_input name="community_article_created_year_start" emptyoption=""}ǯ
						{form_input name="community_article_created_month_start" emptyoption=""}��
						{form_input name="community_article_created_day_start" emptyoption=""}��
						��
						{form_input name="community_article_created_year_end" emptyoption=""}ǯ
						{form_input name="community_article_created_month_end" emptyoption=""}��
						{form_input name="community_article_created_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="user_id"}</th>
					<td {if $app.user_id_active}class="active"{/if}>{form_input name="user_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.community_article_updated_active}class="active"{/if} nowrap>
						{form_input name="community_article_updated_year_start" emptyoption=""}ǯ
						{form_input name="community_article_updated_month_start" emptyoption=""}��
						{form_input name="community_article_updated_day_start" emptyoption=""}��
						��
						{form_input name="community_article_updated_year_end" emptyoption=""}ǯ
						{form_input name="community_article_updated_month_end" emptyoption=""}��
						{form_input name="community_article_updated_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="user_nickname"}</th>
					<td {if $app.user_nickname_active}class="active"{/if}>{form_input name="user_nickname"}</td>
				</tr>
				<tr>
					<th>�������</th>
					<td {if $app.community_article_deleted_active}class="active"{/if} nowrap>
						{form_input name="community_article_deleted_year_start" emptyoption=""}ǯ
						{form_input name="community_article_deleted_month_start" emptyoption=""}��
						{form_input name="community_article_deleted_day_start" emptyoption=""}��
						��
						{form_input name="community_article_deleted_year_end" emptyoption=""}ǯ
						{form_input name="community_article_deleted_month_end" emptyoption=""}��
						{form_input name="community_article_deleted_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="community_article_title"}</th>
					<td {if $app.community_article_title_active}class="active"{/if}>{form_input name="community_article_title"}</td>
				</tr>
				<tr>
					<th>{form_name name="community_article_body"}</th>
					<td {if $app.community_article_body_active}class="active"{/if}>{form_input name="community_article_body"}</td>
					<th>{form_name name="community_article_status"}</th>
					<td {if $app.community_article_status_active}class="active"{/if}>{form_input name="community_article_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="community_article_checked"}</th>
					<td {if $app.community_article_checked_active}class="active"{/if}>{form_input name="community_article_checked" emptyoption=""}</td>
					<th></th>
					<td>{form_submit value="����������"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			{form action="$script" ethna_action="admin_community_article_list"}
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
					<th>��ƥ桼��ID</th>
					<th>��ƥ桼��̾</th>
					<th>{$ft.community.name}</th>
					<th>{$ft.community_article_title.name}</th>
					<th>{$ft.community_article_body.name}</th>
					<th nowrap><input type="checkbox" onclick="$j('#list input:checkbox').attr('checked', this.checked);">��ɽ��</th>
				</tr>
				<tr>
					<td class="checkedrow" colspan=10 align="right">����{$ft.community_article.name}��{$ft.community_article_checked.name}���ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.community_article_id}</td>
					<td {if $item.community_article_status==0}class="disable"{/if}>{$config.data_status[$item.community_article_status].name}</td>
					<td class="{if $item.community_article_checked==0}non{/if}checked">{$config.data_checked[$item.community_article_checked].name}</td>
					<td nowrap>
						[����]{$item.community_article_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]{$item.community_article_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[���]{if $item.community_article_status == 0}{$item.community_article_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}{/if}
					</td>
					<td>{$item.user_id}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_nickname}</a>����</td>
					<td>{$item.community_title}</td>
					<td><a href="?action_admin_community_article_edit=true&community_article_id={$item.community_article_id}">{$item.community_article_title}</a></td>
					<td>{$item.community_article_body|nl2br}</td>
					<td class="checkedrow" nowrap>
						<input type="hidden" name="id[]" value="{$item.community_article_id}">
						<input type="checkbox" name="check[]" value="{$item.community_article_id}" {if $item.community_article_status == 0}checked="checked"{/if}>
					</td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan=10 align="right">�嵭{$ft.community_article.name}��{$ft.community_article_checked.name}���ơ������򹹿�����{form_submit name="update" value="���¡��ԡ�"}</td>
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
