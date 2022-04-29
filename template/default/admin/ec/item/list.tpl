{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>
			{if $app.item_category_name}
				{$app.item_category_name}>
			{/if}
				
				{$ft.item.name}����
			</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_item_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.item.name}����FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{form action="$script" ethna_action="admin_ec_item_add"}
					{$ft.menu_icon.name}{$ft.item.name}��Ͽ
					{form_input name="item_category_id"}
					{form_submit value="�����ɲ�"}
				{/form}
				
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.item.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.item.name}��{$app.listview_total}�︫�Ĥ���ޤ�����
				{/if}
			</div>
			
			{form action="$script" ethna_action="admin_ec_item_list"}
			<table class="sheet">
				<tr>
					<th>��������</th>
					<td {if $app.item_created_active}class="active"{/if} nowrap>
						{form_input name="item_created_year_start" emptyoption=""}ǯ
						{form_input name="item_created_month_start" emptyoption=""}��
						{form_input name="item_created_day_start" emptyoption=""}��
						��
						{form_input name="item_created_year_end" emptyoption=""}ǯ
						{form_input name="item_created_month_end" emptyoption=""}��
						{form_input name="item_created_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="item_id"}</th>
					<td {if $app.item_id_active}class="active"{/if}>{form_input name="item_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.item_updated_active}class="active"{/if} nowrap>
						{form_input name="item_updated_year_start" emptyoption=""}ǯ
						{form_input name="item_updated_month_start" emptyoption=""}��
						{form_input name="item_updated_day_start" emptyoption=""}��
						��
						{form_input name="item_updated_year_end" emptyoption=""}ǯ
						{form_input name="item_updated_month_end" emptyoption=""}��
						{form_input name="item_updated_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="item_name"}</th>
					<td {if $app.item_name_active}class="active"{/if}>{form_input name="item_name"}</td>
				</tr>
				<!--
				<tr>
					<th>�������</th>
					<td {if $app.item_deleted_active}class="active"{/if} nowrap>
						{form_input name="item_deleted_year_start" emptyoption=""}ǯ
						{form_input name="item_deleted_month_start" emptyoption=""}��
						{form_input name="item_deleted_day_start" emptyoption=""}��
						��
						{form_input name="item_deleted_year_end" emptyoption=""}ǯ
						{form_input name="item_deleted_month_end" emptyoption=""}��
						{form_input name="item_deleted_day_end" emptyoption=""}��
					</td>
					<th></th>
					<td></td>
				</tr>
				-->
				<tr>
					<th>���䳫�ϴ���</th>
					<td {if $app.item_start_active}class="active"{/if} nowrap>
						{form_input name="item_start_year_start" emptyoption=""}ǯ
						{form_input name="item_start_month_start" emptyoption=""}��
						{form_input name="item_start_day_start" emptyoption=""}��
						��
						{form_input name="item_start_year_end" emptyoption=""}ǯ
						{form_input name="item_start_month_end" emptyoption=""}��
						{form_input name="item_start_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="item_start_status"}</th>
					<td {if $app.item_start_status_active}class="active"{/if}>{form_input name="item_start_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>���佪λ����</th>
					<td {if $app.item_end_active}class="active"{/if} nowrap>
						{form_input name="item_end_year_start" emptyoption=""}ǯ
						{form_input name="item_end_month_start" emptyoption=""}��
						{form_input name="item_end_day_start" emptyoption=""}��
						��
						{form_input name="item_end_year_end" emptyoption=""}ǯ
						{form_input name="item_end_month_end" emptyoption=""}��
						{form_input name="item_end_day_end" emptyoption=""}��
					</td>
					<th>{form_name name="item_end_status"}</th>
					<td {if $app.item_end_status_active}class="active"{/if}>{form_input name="item_end_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="item_category_name"}</th>
					<td {if $app.item_category_id_active}class="active"{/if}>{form_input name="item_category_id" emptyoption=""}</td>
					<th>{form_name name="item_status"}</th>
					<td {if $app.item_status_active}class="active"{/if}>{form_input name="item_status"}</td>
				</tr>
				<tr>
					<th>{form_name name="item_detail"}</th>
					<td {if $app.item_detail_active}class="active"{/if}>{form_input name="item_detail"}</td>
					<th></th>
					<td>{form_input name="search"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			{form action="$script" ethna_action="admin_ec_item_priority_do"}
				{form_input name="shop_id"}
				{form_input name="item_category_id"}
				<table class="sheet" id="list">
					<tr>
					{if $form.shop_id && $form.item_category_id}
						<th nowrap>{$ft.item_priority_id.name}</th>
					{/if}
						<th>{form_name name="item_id"}</th>
						<th>{form_name name="item_status"}</th>
						<th nowrap>
							��Ͽ����<br />
							��������<br />
						</th>
						<th nowrap>{form_name name="item_name"}</th>
						<th nowrap>{form_name name="item_category_name"}</th>
						<!--th nowrap>{$ft.item.name}����</th-->
						<th nowrap>
							���䳫������<br />
							���佪λ����<br />
						</th>
						<th nowrap>����</th>
						<th nowrap>�Խ�</th>
						<th nowrap>���</th>
					</tr>
					{foreach from=$app.listview_data item=i}
					<tr>
					{if $form.shop_id && $form.item_category_id}
						<td><input name="item_priority_id[{$item.item_id}]" value="{$item.item_priority_id}" size="4"></td>
					{/if}
						<td>{$i.item_id}</td>
						<td {if $i.item_status==0}class="disable"{/if}>{$config.regist_status[$i.item_status].name}</td>
						<td nowrap>
							[��Ͽ]:{$i.item_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
							[����]:{$i.item_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						</td>
						<td>{$i.item_name}</td>
						<td>{$i.item_category_name}</td>
						<!--td><img src="f.php?file=item/{$i.item_image}"></td-->
						<td nowrap>
							[���䳫��]:{$i.item_start_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}({$config.regist_status[$i.item_start_status].name})<br />
							[���佪λ]:{$i.item_end_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}({$config.regist_status[$i.item_end_status].name})<br />
						</td>
						<td><a href="?action_admin_stats_list=true&type=item&id={$i.item_id}&term=month">����</a></td>
						<td><a href="?action_admin_ec_item_edit=true&item_id={$i.item_id}">�Խ�</a></td>
						<td><a href="?action_admin_ec_item_delete_do=true&item_id={$i.item_id}&item_category_id={$form.item_category_id}" onClick="return confirm('�����ˤ���{$ft.item.name}�������Ƥ������Ǥ�����');">���</a></td>
					</tr>
					{/foreach}
				</table>
				{if $form.shop_id && $form.item_category_id}
					{form_input name="item_priority_edit"}
				{/if}
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
