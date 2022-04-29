{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.user_order.name}管理</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_userorder_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.user_order.name}管理FAQ</a></blockquote>
			<!-- ここからメインコンテンツ-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{if $app.listview_total == 0}
					検索条件に合致する{$ft.user_order.name}は見つかりませんでした。
				{else}
					検索条件に合致する{$ft.user_order.name}が{$app.listview_total}件見つかりました。<br />
				{/if}
			</div>
			{form ethna_action="admin_ec_userorder_list"}
			<table class="sheet">
				<tr>
					<th>登録期間</th>
					<td {if $app.user_order_created_active}class="active"{/if} nowrap>
						{form_input name="user_order_created_year_start" emptyoption=""}年
						{form_input name="user_order_created_month_start" emptyoption=""}月
						{form_input name="user_order_created_day_start" emptyoption=""}日
						〜
						{form_input name="user_order_created_year_end" emptyoption=""}年
						{form_input name="user_order_created_month_end" emptyoption=""}月
						{form_input name="user_order_created_day_end" emptyoption=""}日
					</td>
					<th style="width:20%">{form_name name="user_order_id"}</th>
					<td {if $app.user_order_id_active}class="active"{/if}>{form_input name="user_order_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.user_order_updated_active}class="active"{/if} nowrap>
						{form_input name="user_order_updated_year_start" emptyoption=""}年
						{form_input name="user_order_updated_month_start" emptyoption=""}月
						{form_input name="user_order_updated_day_start" emptyoption=""}日
						〜
						{form_input name="user_order_updated_year_end" emptyoption=""}年
						{form_input name="user_order_updated_month_end" emptyoption=""}月
						{form_input name="user_order_updated_day_end" emptyoption=""}日
					</td>
					<th style="width:20%">{form_name name="user_order_no"}</th>
					<td {if $app.user_order_no_active}class="active"{/if}>{form_input name="user_order_no"}</td>
				</tr>
				<tr>
					<!--
					<th>退会期間</th>
					<td {if $app.user_order_deleted_active}class="active"{/if} nowrap>
						{form_input name="user_order_deleted_year_start" emptyoption=""}年
						{form_input name="user_order_deleted_month_start" emptyoption=""}月
						{form_input name="user_order_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="user_order_deleted_year_end" emptyoption=""}年
						{form_input name="user_order_deleted_month_end" emptyoption=""}月
						{form_input name="user_order_deleted_day_end" emptyoption=""}日
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
						{form_input name="download" value="　ダウンロード　"}
					</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th>ID</th>
					<th>
						注文日時<br />
						<!-- 更新日時<br /> -->
						<!-- 退会日時 -->
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
						[注文]:{$item.user_order_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						<!-- [更新]:{$item.user_order_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br /> -->
						<!-- [退会]:{$item.user_order_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"} -->
					</td>
					<td><a href="?action_admin_ec_userorder_edit=true&user_order_id={$item.user_order_id}&cart_hash={$item.cart_hash}">{$item.user_order_no}</a></td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_name}</a>さん</td>
					<td>{$config.user_order_type[$item.user_order_type].name}</td>
					<td>{$item.item_name}</td>
					<td>{$item.item_type}</td>
					<td>{$config.cart_status[$item.cart_status].name}</td>
				</tr>
				{/if}
				{/foreach}
			</table>
			
			{include file="admin/pager.tpl"}
			
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->
{include file="admin/footer.tpl"}
