{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.item_category.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_itemcategory_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.item_category.name}����FAQ</a></blockquote>
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_ec_itemcategory_add=true">{$ft.item_category.name}��Ͽ</a><br />
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.item_category.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.item_category.name}��{$app.listview_total}�︫�Ĥ���ޤ�����<br />
				{/if}
			</div>
			{form ethna_action="admin_ec_itemcategory_list"}
			<table class="sheet">
				<tr>
					<th>��Ͽ����</th>
					<td {if $app.item_category_created_active}class="active"{/if} nowrap>
						{form_input name="item_category_created_year_start" emptyoption=""}ǯ
						{form_input name="item_category_created_month_start" emptyoption=""}��
						{form_input name="item_category_created_day_start" emptyoption=""}��
						��
						{form_input name="item_category_created_year_end" emptyoption=""}ǯ
						{form_input name="item_category_created_month_end" emptyoption=""}��
						{form_input name="item_category_created_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="item_category_id"}</th>
					<td {if $app.item_category_id_active}class="active"{/if}>{form_input name="item_category_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.item_category_updated_active}class="active"{/if} nowrap>
						{form_input name="item_category_updated_year_start" emptyoption=""}ǯ
						{form_input name="item_category_updated_month_start" emptyoption=""}��
						{form_input name="item_category_updated_day_start" emptyoption=""}��
						��
						{form_input name="item_category_updated_year_end" emptyoption=""}ǯ
						{form_input name="item_category_updated_month_end" emptyoption=""}��
						{form_input name="item_category_updated_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="item_category_name"}</th>
					<td {if $app.item_category_name_active}class="active"{/if}>{form_input name="item_category_name"}</td>
				</tr>
				<tr>
					<th>{form_name name="item_category_status"}</th>
					<td {if $app.item_category_status_active}class="active"{/if}>
						{form_input name="item_category_status"}
					</td>
					<th style="width:20%">{$ft.shop_name.name}</th>
					<td {if $app.shop_id_active}class="active"{/if}>{form_input name="shop_id" emptyoption=""}</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<th></th>
					<td>{form_input name="search"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			{form action="$script" ethna_action="admin_ec_itemcategory_priority_do"}
			{form_input name="shop_id"}
			<table class="sheet" id="list">
				<tr>
				{if $form.shop_id}
					<th nowrap>{$ft.item_category_priority_id.name}</th>
				{/if}
					<th nowrap>{form_name name="item_category_id"}</th>
					<th nowrap>{form_name name="item_category_status"}</th>
					<th nowrap>
						��Ͽ����<br />
						��������<br />
					<!--	������� -->
					</th>
					<th nowrap>{form_name name="item_category_name"}</th>
					<th nowrap>{$ft.item.name}����</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.listview_data item=item name=user}
				{if $item != false}
				<tr>
				{if $form.shop_id}
					<td><input name="item_category_priority_id[{$item.item_category_id}]" value="{$item.item_category_priority_id}" size="4"></td>
				{/if}
					<td>{$item.item_category_id}</td>
					<td {if $item.item_category_status==0}class="disable"{/if}>{$config.regist_status[$item.item_category_status].name}</td>
					<td nowrap>
						[��Ͽ]:{$item.item_category_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]:{$item.item_category_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
					<!--	[���]:{$item.item_category_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"} -->
					</td>
					<td>{$item.item_category_name}</td>
					<td><a href="?action_admin_ec_item_list=true&item_category_id={$item.item_category_id}&shop_id={$item.shop_id}">{$ft.item.name}������</a></td>
					<td><a href="?action_admin_ec_itemcategory_edit=true&item_category_id={$item.item_category_id}">�Խ�</a></td>
					<td><a href="?action_admin_ec_itemcategory_delete_do=true&item_category_id={$item.item_category_id}" onClick="return confirm('�����ˤ���{$ft.item_category.name}�������Ƥ������Ǥ�����');">���</a></td>
				</tr>
				{/if}
				{/foreach}
			</table>
			{include file="admin/pager.tpl"}
			
			<div class="entry_box">
				{if $form.shop_id}
					{form_input name="item_category_priority_edit"}
				{/if}
				{/form}
			</div>
			
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->
{include file="admin/footer.tpl"}
