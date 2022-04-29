{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.user_order.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_userorder_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.user_order.name}����FAQ</a></blockquote>
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.user_order.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.user_order.name}��{$app.listview_total}�︫�Ĥ���ޤ�����<br />
				{/if}
			</div>
			{form ethna_action="admin_ec_userorder_list"}
			<table class="sheet">
				<tr>
					<th>��Ͽ����</th>
					<td {if $app.user_order_created_active}class="active"{/if} nowrap>
						{form_input name="user_order_created_year_start" emptyoption=""}ǯ
						{form_input name="user_order_created_month_start" emptyoption=""}��
						{form_input name="user_order_created_day_start" emptyoption=""}��
						��
						{form_input name="user_order_created_year_end" emptyoption=""}ǯ
						{form_input name="user_order_created_month_end" emptyoption=""}��
						{form_input name="user_order_created_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="user_order_id"}</th>
					<td {if $app.user_order_id_active}class="active"{/if}>{form_input name="user_order_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.user_order_updated_active}class="active"{/if} nowrap>
						{form_input name="user_order_updated_year_start" emptyoption=""}ǯ
						{form_input name="user_order_updated_month_start" emptyoption=""}��
						{form_input name="user_order_updated_day_start" emptyoption=""}��
						��
						{form_input name="user_order_updated_year_end" emptyoption=""}ǯ
						{form_input name="user_order_updated_month_end" emptyoption=""}��
						{form_input name="user_order_updated_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="user_order_no"}</th>
					<td {if $app.user_order_no_active}class="active"{/if}>{form_input name="user_order_no"}</td>
				</tr>
				<tr>
					<!--
					<th>������</th>
					<td {if $app.user_order_deleted_active}class="active"{/if} nowrap>
						{form_input name="user_order_deleted_year_start" emptyoption=""}ǯ
						{form_input name="user_order_deleted_month_start" emptyoption=""}��
						{form_input name="user_order_deleted_day_start" emptyoption=""}��
						��
						{form_input name="user_order_deleted_year_end" emptyoption=""}ǯ
						{form_input name="user_order_deleted_month_end" emptyoption=""}��
						{form_input name="user_order_deleted_day_end" emptyoption=""}��
					</td>
					-->
					<th>{form_name name="user_order_type"}</th>
					<td {if $app.user_order_type_active}class="active"{/if} nowrap>
						{form_input name="user_order_type" emptyoption=""}
					</td>
					<th style="width:20%">{form_name name="cart_id"}</th>
					<td {if $app.cart_id_active}class="active"{/if}>{form_input name="cart_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_name"}</th>
					<td {if $app.user_name_active}class="active"{/if} nowrap>
						{form_input name="user_name"}
					</td>
					<th style="width:20%">{form_name name="item_name"}</th>
					<td {if $app.item_name_active}class="active"{/if}>{form_input name="item_name"}</td>
				</tr>
				<tr>
					<th>{form_name name="cart_status"}</th>
					<td {if $app.cart_status_active}class="active"{/if}>
						{form_input name="cart_status" emptyoption=""}
					</td>
					<th></th>
					<td>
						{form_input name="search"}
						&nbsp;&nbsp;
						{form_input name="download" value="����������ɡ�"}
					</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th>ID</th>
					<th>
						��ʸ����<br />
						<!-- ��������<br /> -->
						<!-- ������� -->
					</th>
					<th>{$ft.user_order_no.name}</th>
					<th>{$ft.user_name.name}</th>
					<th>{$ft.user_order_type.name}</th>
					<th>{$ft.item_name.name}</th>
					<th>{$ft.item_type.name}</th>
					<th>{$ft.cart_status.name}</th>
				</tr>
				{foreach from=$app.listview_data item=item name=user_order}
				{if $item != false}
				<tr>
					<td><a href="?action_admin_ec_userorder_edit=true&user_order_id={$item.user_order_id}&cart_has={$item.cart_hash}">{$item.user_order_id}</a></td>
					<td nowrap>
						[��ʸ]:{$item.user_order_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						<!-- [����]:{$item.user_order_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br /> -->
						<!-- [���]:{$item.user_order_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"} -->
					</td>
					<td><a href="?action_admin_ec_userorder_edit=true&user_order_id={$item.user_order_id}&cart_hash={$item.cart_hash}">{$item.user_order_no}</a></td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_name}</a>����</td>
					<td>{$config.user_order_type[$item.user_order_type].name}</td>
					<td>{$item.item_name}</td>
					<td>{$item.item_type}</td>
					<td>{$config.cart_status[$item.cart_status].name}</td>
				</tr>
				{/if}
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
