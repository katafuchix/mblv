{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$app.news_category_name}{$ft.news.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_news_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">�˥塼������FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_news_add=true">�˥塼����Ͽ</a><br />
				
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.news.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.news.name}��{$app.listview_total}�︫�Ĥ���ޤ�����
				{/if}
			</div>
			
			{form action="$script" ethna_action="admin_news_list"}
			<table class="sheet">
				<tr>
					<th>��������</th>
					<td {if $app.news_created_active}class="active"{/if} nowrap>
						{form_input name="news_created_year_start" emptyoption=""}ǯ
						{form_input name="news_created_month_start" emptyoption=""}��
						{form_input name="news_created_day_start" emptyoption=""}��
						��
						{form_input name="news_created_year_end" emptyoption=""}ǯ
						{form_input name="news_created_month_end" emptyoption=""}��
						{form_input name="news_created_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="news_id"}</th>
					<td {if $app.news_id_active}class="active"{/if}>{form_input name="news_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.news_updated_active}class="active"{/if} nowrap>
						{form_input name="news_updated_year_start" emptyoption=""}ǯ
						{form_input name="news_updated_month_start" emptyoption=""}��
						{form_input name="news_updated_day_start" emptyoption=""}��
						��
						{form_input name="news_updated_year_end" emptyoption=""}ǯ
						{form_input name="news_updated_month_end" emptyoption=""}��
						{form_input name="news_updated_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="news_title"}</th>
					<td {if $app.news_title_active}class="active"{/if}>{form_input name="news_title"}</td>
				</tr>
				<tr>
					<th>�������</th>
					<td {if $app.news_deleted_active}class="active"{/if} nowrap>
						{form_input name="news_deleted_year_start" emptyoption=""}ǯ
						{form_input name="news_deleted_month_start" emptyoption=""}��
						{form_input name="news_deleted_day_start" emptyoption=""}��
						��
						{form_input name="news_deleted_year_end" emptyoption=""}ǯ
						{form_input name="news_deleted_month_end" emptyoption=""}��
						{form_input name="news_deleted_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="news_body"}</th>
					<td {if $app.news_body_active}class="active"{/if}>{form_input name="news_body"}</td>
				</tr>
				<tr>
					<th>�ۿ����ϴ���</th>
					<td {if $app.news_start_active}class="active"{/if} nowrap>
						{form_input name="news_start_year_start" emptyoption=""}ǯ
						{form_input name="news_start_month_start" emptyoption=""}��
						{form_input name="news_start_day_start" emptyoption=""}��
						��
						{form_input name="news_start_year_end" emptyoption=""}ǯ
						{form_input name="news_start_month_end" emptyoption=""}��
						{form_input name="news_start_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="news_start_status"}</th>
					<td {if $app.news_start_status_active}class="active"{/if}>{form_input name="news_start_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>�ۿ���λ����</th>
					<td {if $app.news_end_active}class="active"{/if} nowrap>
						{form_input name="news_end_year_start" emptyoption=""}ǯ
						{form_input name="news_end_month_start" emptyoption=""}��
						{form_input name="news_end_day_start" emptyoption=""}��
						��
						{form_input name="news_end_year_end" emptyoption=""}ǯ
						{form_input name="news_end_month_end" emptyoption=""}��
						{form_input name="news_end_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="news_end_status"}</th>
					<td {if $app.news_end_status_active}class="active"{/if}>{form_input name="news_end_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="news_type"}</th>
					<td {if $app.news_type_active}class="active"{/if}>{form_input name="news_type"}</td>
					<th>{form_name name="news_time"}</th>
					<td {if $app.news_time_active}class="active"{/if}>{form_input name="news_time"}</td>
				</tr>
				<tr>
					<th>{form_name name="news_status"}</th>
					<td {if $app.news_status_active}class="active"{/if}>{form_input name="news_status"}</td>
					<th></th>
					<td>{form_submit value="����������"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			{form action="$script" ethna_action="admin_news_list"}
			<table class="sheet">
				<tr>
					<th nowrap>ID</th>
					<th nowrap>���ơ�����</th>
					<th nowrap>�����</th>
					<th nowrap>�����ȥ�</th>
					<th nowrap>��ʸ</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				<tr>
					<td>{$item.news_id}</td>
					<td {if $item.news_status==0}class="disable"{/if}>{$config.regist_status[$item.news_status].name}</td>
					<td>{$item.news_type_name}</td>
					<td><a href="?action_admin_news_edit=true&news_id={$item.news_id}">{$item.news_title}</a></td>
					<td>{$item.news_body|nl2br}</td>
					<td><a href="?action_admin_news_edit=true&news_id={$item.news_id}">�Խ�</a></td>
					<td><a href="?action_admin_news_delete_do=true&news_id={$item.news_id}" onClick="return confirm('�����ˤ���{$ft.news.name}�������Ƥ������Ǥ�����');">���</a></td>
				</tr>
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
