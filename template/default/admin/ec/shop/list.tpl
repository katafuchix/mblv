{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.shop.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_shop_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.shop.name}����FAQ</a></blockquote>
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_ec_shop_add=true">{$ft.shop.name}��Ͽ</a><br />
				
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.shop.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.shop.name}��{$app.listview_total}�︫�Ĥ���ޤ�����<br />
				{/if}
			</div>
			{form ethna_action="admin_ec_shop_list"}
			<table class="sheet">
				<tr>
					<th>��Ͽ����</th>
					<td {if $app.shop_created_active}class="active"{/if} nowrap>
						{form_input name="shop_created_year_start" emptyoption=""}ǯ
						{form_input name="shop_created_month_start" emptyoption=""}��
						{form_input name="shop_created_day_start" emptyoption=""}��
						��
						{form_input name="shop_created_year_end" emptyoption=""}ǯ
						{form_input name="shop_created_month_end" emptyoption=""}��
						{form_input name="shop_created_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="shop_id"}</th>
					<td {if $app.shop_id_active}class="active"{/if}>{form_input name="shop_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.shop_updated_active}class="active"{/if} nowrap>
						{form_input name="shop_updated_year_start" emptyoption=""}ǯ
						{form_input name="shop_updated_month_start" emptyoption=""}��
						{form_input name="shop_updated_day_start" emptyoption=""}��
						��
						{form_input name="shop_updated_year_end" emptyoption=""}ǯ
						{form_input name="shop_updated_month_end" emptyoption=""}��
						{form_input name="shop_updated_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="shop_name"}</th>
					<td {if $app.shop_name_active}class="active"{/if}>{form_input name="shop_name"}</td>
				</tr>
				<!--
				<tr>
					<th>������</th>
					<td {if $app.shop_deleted_active}class="active"{/if} nowrap>
						{form_input name="shop_deleted_year_start" emptyoption=""}ǯ
						{form_input name="shop_deleted_month_start" emptyoption=""}��
						{form_input name="shop_deleted_day_start" emptyoption=""}��
						��
						{form_input name="shop_deleted_year_end" emptyoption=""}ǯ
						{form_input name="shop_deleted_month_end" emptyoption=""}��
						{form_input name="shop_deleted_day_end" emptyoption=""}��
					</td>
					<th style="width:20%"></th>
					<td></td>
				</tr>
				-->
				<tr>
					<th>{form_name name="shop_status"}</th>
					<td {if $app.shop_status_active}class="active"{/if}>
						{form_input name="shop_status"}
					</td>
					<th></th>
					<td>{form_input name="search"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			{form action="$script" ethna_action="admin_ec_shop_priority_do"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{form_name name="shop_priority_id"}</th>
					<th nowrap>{form_name name="shop_id"}</th>
					<th nowrap>{form_name name="shop_status"}</th>
					<th nowrap>
						��Ͽ����<br />
						��������<br />
					<!-- 	������� -->
					</th>
					<th nowrap>{form_name name="shop_name"}</th>
					<th nowrap>{$ft.item_category.name}����</th>
					<th nowrap>�Խ�</th>
					<th nowrap>���</th>
				</tr>
				{foreach from=$app.listview_data item=item name=user}
				{if $item != false}
				<tr>
					<td><input name="shop_priority_id[{$item.shop_id}]" value="{$item.shop_priority_id}" size="4"></td>
					<td>{$item.shop_id}</td>
					<td {if $item.shop_status==0}class="disable"{/if}>{$config.regist_status[$item.shop_status].name}</td>
					<td nowrap>
						[��Ͽ]:{$item.shop_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]:{$item.shop_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
					<!-- 	[���]:{$item.shop_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"} -->
					</td>
					<td>{$item.shop_name}</td>
					<td><a href="?action_admin_ec_itemcategory_list=true&shop_id={$item.shop_id}">{$ft.item_category.name}������</a></td>
					<td><a href="?action_admin_ec_shop_edit=true&shop_id={$item.shop_id}">�Խ�</a></td>
					<td><a href="?action_admin_ec_shop_delete_do=true&shop_id={$item.shop_id}" onClick="return confirm('�����ˤ���{$ft.shop.name}�������Ƥ������Ǥ�����');">���</a></td>
				</tr>
				{/if}
				{/foreach}
			</table>
			{form_input name="shop_priority_edit"}
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
