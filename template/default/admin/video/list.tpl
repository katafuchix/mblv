{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>
			{if $app.video_category_name}
				{$app.video_category_name}	>
			{/if}
				{$ft.video.name}����
			</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_video_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.video.name}����FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_config_edit=true&site_type=video">{$ft.video.name}��������</a>
				{$ft.menu_icon.name}<a href="?action_admin_videocategory_list=true">{$ft.video_category.name}����</a>
				{$ft.menu_icon.name}<a href="?action_admin_video_add=true">{$ft.video.name}��Ͽ</a><br />
				
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.video.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.video.name}��{$app.listview_total}�︫�Ĥ���ޤ�����
				{/if}
			</div>
			{form action="$script" ethna_action="admin_video_list"}
			<table class="sheet">
				<tr>
					<th>��������</th>
					<td {if $app.video_created_active}class="active"{/if} nowrap>
						{form_input name="video_created_year_start" emptyoption=""}ǯ
						{form_input name="video_created_month_start" emptyoption=""}��
						{form_input name="video_created_day_start" emptyoption=""}��
						��
						{form_input name="video_created_year_end" emptyoption=""}ǯ
						{form_input name="video_created_month_end" emptyoption=""}��
						{form_input name="video_created_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="video_id"}</th>
					<td {if $app.video_id_active}class="active"{/if}>{form_input name="video_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.video_updated_active}class="active"{/if} nowrap>
						{form_input name="video_updated_year_start" emptyoption=""}ǯ
						{form_input name="video_updated_month_start" emptyoption=""}��
						{form_input name="video_updated_day_start" emptyoption=""}��
						��
						{form_input name="video_updated_year_end" emptyoption=""}ǯ
						{form_input name="video_updated_month_end" emptyoption=""}��
						{form_input name="video_updated_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="video_name"}</th>
					<td {if $app.video_name_active}class="active"{/if}>{form_input name="video_name"}</td>
				</tr>
				<tr>
					<th>�������</th>
					<td {if $app.video_deleted_active}class="active"{/if} nowrap>
						{form_input name="video_deleted_year_start" emptyoption=""}ǯ
						{form_input name="video_deleted_month_start" emptyoption=""}��
						{form_input name="video_deleted_day_start" emptyoption=""}��
						��
						{form_input name="video_deleted_year_end" emptyoption=""}ǯ
						{form_input name="video_deleted_month_end" emptyoption=""}��
						{form_input name="video_deleted_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="video_desc"}</th>
					<td {if $app.video_desc_active}class="active"{/if}>{form_input name="video_desc"}</td>
				</tr>
				<tr>
					<th>�ۿ����ϴ���</th>
					<td {if $app.video_start_active}class="active"{/if} nowrap>
						{form_input name="video_start_year_start" emptyoption=""}ǯ
						{form_input name="video_start_month_start" emptyoption=""}��
						{form_input name="video_start_day_start" emptyoption=""}��
						��
						{form_input name="video_start_year_end" emptyoption=""}ǯ
						{form_input name="video_start_month_end" emptyoption=""}��
						{form_input name="video_start_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="video_start_status"}</th>
					<td {if $app.video_start_status_active}class="active"{/if}>{form_input name="video_start_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>�ۿ���λ����</th>
					<td {if $app.video_end_active}class="active"{/if} nowrap>
						{form_input name="video_end_year_start" emptyoption=""}ǯ
						{form_input name="video_end_month_start" emptyoption=""}��
						{form_input name="video_end_day_start" emptyoption=""}��
						��
						{form_input name="video_end_year_end" emptyoption=""}ǯ
						{form_input name="video_end_month_end" emptyoption=""}��
						{form_input name="video_end_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="video_end_status"}</th>
					<td {if $app.video_end_status_active}class="active"{/if}>{form_input name="video_end_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="video_stock_num"}</th>
					<td {if $app.video_stock_num_active}class="active"{/if}>{form_input name="video_stock_num" emptyoption=""}</td>
					<th>{form_name name="video_stock_status"}</th>
					<td {if $app.video_stock_status_active}class="active"{/if}>{form_input name="video_stock_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="video_category_id"}</th>
					<td {if $app.video_category_id_active}class="active"{/if}>{form_input name="video_category_id" emptyoption=""}</td>
					<th>{form_name name="video_status"}</th>
					<td {if $app.video_status_active}class="active"{/if}>{form_input name="video_status"}</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<th></th>
					<td>{form_submit value="����������"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th nowrap>ID</th>
					<th>���ơ�����</th>
					<th nowrap>{$ft.video_name.name}</th>
					<th nowrap>{$ft.video_category.name}</th>
					<!--th nowrap>{$ft.video.name}����</th-->
					<th nowrap>����</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.video_id}</td>
					<td {if $i.video_status==0}class="disable"{/if}>{$config.regist_status[$i.video_status].name}</td>
					<td>{$i.video_name}</td>
					<!--td><img src="f.php?file=video/{$i.video_image}"></td-->
					<td>{$i.video_category_name}</td>
					<td><a href="?action_admin_stats_list=true&type=video&id={$i.video_id}&term=month">����</a></td>
					<td><a href="?action_admin_video_edit=true&video_id={$i.video_id}">�Խ�</a></td>
					<td><a href="?action_admin_video_delete_do=true&video_id={$i.video_id}&video_category_id={$form.video_category_id}" onClick="return confirm('�����ˤ���{$ft.video.name}�������Ƥ������Ǥ�����');">���</a></td>
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
