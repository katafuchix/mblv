{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.supplier.name}管理</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_supplier_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.supplier.name}管理FAQ</a></blockquote>
			<!-- ここからメインコンテンツ-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_ec_supplier_add=true">{$ft.supplier.name}登録</a><br />
				{if $app.listview_total == 0}
					検索条件に合致する{$ft.supplier.name}は見つかりませんでした。
				{else}
					検索条件に合致する{$ft.supplier.name}が{$app.listview_total}件見つかりました。<br />
				{/if}
			</div>
			{form ethna_action="admin_ec_supplier_list"}
			<table class="sheet">
				<tr>
					<th>登録期間</th>
					<td {if $app.supplier_created_active}class="active"{/if} nowrap>
						{form_input name="supplier_created_year_start" emptyoption=""}年
						{form_input name="supplier_created_month_start" emptyoption=""}月
						{form_input name="supplier_created_day_start" emptyoption=""}日
						〜
						{form_input name="supplier_created_year_end" emptyoption=""}年
						{form_input name="supplier_created_month_end" emptyoption=""}月
						{form_input name="supplier_created_day_end" emptyoption=""}日
					</td>
					<th style="width:20%">{form_name name="supplier_id"}</th>
					<td {if $app.supplier_id_active}class="active"{/if}>{form_input name="supplier_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.supplier_updated_active}class="active"{/if} nowrap>
						{form_input name="supplier_updated_year_start" emptyoption=""}年
						{form_input name="supplier_updated_month_start" emptyoption=""}月
						{form_input name="supplier_updated_day_start" emptyoption=""}日
						〜
						{form_input name="supplier_updated_year_end" emptyoption=""}年
						{form_input name="supplier_updated_month_end" emptyoption=""}月
						{form_input name="supplier_updated_day_end" emptyoption=""}日
					</td>
					<th style="width:20%">{form_name name="supplier_name"}</th>
					<td {if $app.supplier_name_active}class="active"{/if}>{form_input name="supplier_name"}</td>
				</tr>
				<!--
				<tr>
					<th>退会期間</th>
					<td {if $app.supplier_deleted_active}class="active"{/if} nowrap>
						{form_input name="supplier_deleted_year_start" emptyoption=""}年
						{form_input name="supplier_deleted_month_start" emptyoption=""}月
						{form_input name="supplier_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="supplier_deleted_year_end" emptyoption=""}年
						{form_input name="supplier_deleted_month_end" emptyoption=""}月
						{form_input name="supplier_deleted_day_end" emptyoption=""}日
					</td>
					<th style="width:20%"></th>
					<td></td>
				</tr>
				-->
				<tr>
					<th>{form_name name="supplier_status"}</th>
					<td {if $app.supplier_status_active}class="active"{/if}>
						{form_input name="supplier_status"}
					</td>
					<th></th>
					<td>{form_input name="search"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{form_name name="supplier_id"}</th>
					<th nowrap>{form_name name="supplier_status"}</th>
					<th nowrap>
						登録日時<br />
						更新日時<br />
					</th>
					<th nowrap>{form_name name="supplier_name"}</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.listview_data item=item name=user}
				{if $item != false}
				<tr>
					<td>{$item.supplier_id}</td>
					<td {if $item.supplier_status==0}class="disable"{/if}>{$config.regist_status[$item.supplier_status].name}</td>
					<td nowrap>
						[登録]:{$item.supplier_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[更新]:{$item.supplier_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
					</td>
					<td>{$item.supplier_name}</td>
					<td><a href="?action_admin_ec_supplier_edit=true&supplier_id={$item.supplier_id}">編集</a></td>
					<td><a href="?action_admin_ec_supplier_delete_do=true&supplier_id={$item.supplier_id}" onClick="return confirm('本当にこの{$ft.supplier.name}を削除してもよろしいですか？');">削除</a></td>
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
