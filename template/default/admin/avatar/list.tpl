{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>
			{if $app.avatar_category_name}
				{$app.avatar_category_name}>
			{/if}
				{$ft.avatar.name}����
			</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_avatar_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.avatar.name}����FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_config_edit=true&site_type=avatar">{$ft.avatar.name}��������</a>
				{$ft.menu_icon.name}<a href="?action_admin_avatarcategory_list=true">{$ft.avatar_category.name}����</a>
				{$ft.menu_icon.name}<a href="?action_admin_avatarstand_list=true">{$ft.avatar.name}��´���</a>
				{$ft.menu_icon.name}<a href="?action_admin_avatar_add=true">{$ft.avatar.name}��Ͽ</a><br /><br />
				
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.avatar.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.avatar.name}��{$app.listview_total}�︫�Ĥ���ޤ�����
				{/if}
			</div>
			{form action="$script" ethna_action="admin_avatar_list"}
			<table class="sheet">
				<tr>
					<th>��������</th>
					<td {if $app.avatar_created_active}class="active"{/if} nowrap>
						{form_input name="avatar_created_year_start" emptyoption=""}ǯ
						{form_input name="avatar_created_month_start" emptyoption=""}��
						{form_input name="avatar_created_day_start" emptyoption=""}��
						��
						{form_input name="avatar_created_year_end" emptyoption=""}ǯ
						{form_input name="avatar_created_month_end" emptyoption=""}��
						{form_input name="avatar_created_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="avatar_id"}</th>
					<td {if $app.avatar_id_active}class="active"{/if}>{form_input name="avatar_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.avatar_updated_active}class="active"{/if} nowrap>
						{form_input name="avatar_updated_year_start" emptyoption=""}ǯ
						{form_input name="avatar_updated_month_start" emptyoption=""}��
						{form_input name="avatar_updated_day_start" emptyoption=""}��
						��
						{form_input name="avatar_updated_year_end" emptyoption=""}ǯ
						{form_input name="avatar_updated_month_end" emptyoption=""}��
						{form_input name="avatar_updated_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="avatar_name"}</th>
					<td {if $app.avatar_name_active}class="active"{/if}>{form_input name="avatar_name"}</td>
				</tr>
				<tr>
					<th>�������</th>
					<td {if $app.avatar_deleted_active}class="active"{/if} nowrap>
						{form_input name="avatar_deleted_year_start" emptyoption=""}ǯ
						{form_input name="avatar_deleted_month_start" emptyoption=""}��
						{form_input name="avatar_deleted_day_start" emptyoption=""}��
						��
						{form_input name="avatar_deleted_year_end" emptyoption=""}ǯ
						{form_input name="avatar_deleted_month_end" emptyoption=""}��
						{form_input name="avatar_deleted_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="avatar_desc"}</th>
					<td {if $app.avatar_desc_active}class="active"{/if}>{form_input name="avatar_desc"}</td>
				</tr>
				<tr>
					<th>�ۿ����ϴ���</th>
					<td {if $app.avatar_start_active}class="active"{/if} nowrap>
						{form_input name="avatar_start_year_start" emptyoption=""}ǯ
						{form_input name="avatar_start_month_start" emptyoption=""}��
						{form_input name="avatar_start_day_start" emptyoption=""}��
						��
						{form_input name="avatar_start_year_end" emptyoption=""}ǯ
						{form_input name="avatar_start_month_end" emptyoption=""}��
						{form_input name="avatar_start_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="avatar_start_status"}</th>
					<td {if $app.avatar_start_status_active}class="active"{/if}>{form_input name="avatar_start_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>�ۿ���λ����</th>
					<td {if $app.avatar_end_active}class="active"{/if} nowrap>
						{form_input name="avatar_end_year_start" emptyoption=""}ǯ
						{form_input name="avatar_end_month_start" emptyoption=""}��
						{form_input name="avatar_end_day_start" emptyoption=""}��
						��
						{form_input name="avatar_end_year_end" emptyoption=""}ǯ
						{form_input name="avatar_end_month_end" emptyoption=""}��
						{form_input name="avatar_end_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="avatar_end_status"}</th>
					<td {if $app.avatar_end_status_active}class="active"{/if}>{form_input name="avatar_end_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stock_num"}</th>
					<td {if $app.avatar_stock_num_active}class="active"{/if}>{form_input name="avatar_stock_num" emptyoption=""}</td>
					<th>{form_name name="avatar_stock_status"}</th>
					<td {if $app.avatar_stock_status_active}class="active"{/if}>{form_input name="avatar_stock_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_category_id"}</th>
					<td {if $app.avatar_category_id_active}class="active"{/if}>{form_input name="avatar_category_id" emptyoption=""}</td>
					<th>{form_name name="avatar_status"}</th>
					<td {if $app.avatar_status_active}class="active"{/if}>{form_input name="avatar_status"}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_z"}</th>
					<td {if $app.avatar_z_active}class="active"{/if}>{form_input name="avatar_z"}</td>
					<th></th>
					<td>{form_submit value="����������"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th>ID</th>
					<th>���ơ�����</th>
					<th nowrap>{$ft.avatar_name.name}</th>
					<th nowrap>{$ft.avatar_category_name.name}</th>
					<th nowrap>{$ft.avatar.name}�����ƥ५�ƥ���̾</th>
					<th nowrap>���Х���Z��ɸ</th>
					<th nowrap>{$ft.preset_avatar.name}</th>
					<th nowrap>{$ft.default_avatar.name}</th>
					<th nowrap>{$ft.first_avatar.name}</th>
					<!--th nowrap>���Х�������1</th>
					<th nowrap>���Х�������2</th-->
					<!--th nowrap>���Х�������</th-->
					<th nowrap>����</th>
					<th nowrap>���Х����Խ�</th>
					<th nowrap>���Х������</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.avatar_id}</td>
					<td {if $i.avatar_status==0}class="disable"{/if}>{$config.regist_status[$i.avatar_status].name}</td>
					<td>{$i.avatar_name}</td>
					<td>{$i.avatar_category_name}</td>
					<td>{$config.avatar_system[$i.avatar_system_category_id].name}</td>
					<td>{if $i.avatar_image1_desc && $i.avatar_status==1}����1:z{$i.avatar_image1_z}{/if}{if $i.avatar_image2_desc && $i.avatar_status==1}|����2:z{$i.avatar_image2_z}{/if}</td>
					<td>{if $i.preset_avatar==1}�Ϥ�{else}������{/if}</td>
					<td>{if $i.default_avatar==1}�Ϥ�{else}������{/if}</td>
					<td>{if $i.first_avatar==1}�Ϥ�{else}������{/if}</td>
					<!--td>{if $i.avatar_image1 && $i.avatar_status==1}<img src="f.php?file=avatar/{$i.avatar_image1}">{/if}</td>
					<td>{if $i.avatar_image2 && $i.avatar_status==1}<img src="f.php?file=avatar/{$i.avatar_image2}">{/if}</td-->
					<!--td>{if $i.avatar_status==1}<img src="?action_user_file_avatar_view=true&avatar_id={$i.avatar_id}&width={$config.avatar_t_width}&height={$config.avatar_t_height}">{/if}</td-->
					<td><a href="?action_admin_stats_list=true&type=avatar&id={$i.avatar_id}&term=month">����</a></td>
					<td><a href="?action_admin_avatar_edit=true&avatar_id={$i.avatar_id}">�Խ�</a></td>
					<td><a href="?action_admin_avatar_delete_do=true&avatar_id={$i.avatar_id}&avatar_category_id={$form.avatar_category_id}" onClick="return confirm('�����ˤ��Υ��Х����������Ƥ������Ǥ�����');">���</a></td>
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
