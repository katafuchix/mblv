{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.exchange.name}管理</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_exchange_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.exchange.name}管理FAQ</a></blockquote>
			<!-- ここからメインコンテンツ-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{form action="$script" ethna_action="admin_ec_exchange_add"}
				{$ft.menu_icon.name}{$ft.exchange.name}登録
				{form_input name="exchange_type"}
				{form_input name="exchange_add"}
				{/form}
				
				{if $app.listview_total == 0}
					検索条件に合致する{$ft.exchange.name}は見つかりませんでした。
				{else}
					検索条件に合致する{$ft.exchange.name}が{$app.listview_total}件見つかりました。<br />
				{/if}
			</div>
			{form ethna_action="admin_ec_exchange_list"}
			<table class="sheet">
				<tr>
					<th>登録期間</th>
					<td {if $app.exchange_created_active}class="active"{/if} nowrap>
						{form_input name="exchange_created_year_start" emptyoption=""}年
						{form_input name="exchange_created_month_start" emptyoption=""}月
						{form_input name="exchange_created_day_start" emptyoption=""}日
						〜
						{form_input name="exchange_created_year_end" emptyoption=""}年
						{form_input name="exchange_created_month_end" emptyoption=""}月
						{form_input name="exchange_created_day_end" emptyoption=""}日
					</td>
					<th style="width:20%">{form_name name="exchange_id"}</th>
					<td {if $app.exchange_id_active}class="active"{/if}>{form_input name="exchange_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.exchange_updated_active}class="active"{/if} nowrap>
						{form_input name="exchange_updated_year_start" emptyoption=""}年
						{form_input name="exchange_updated_month_start" emptyoption=""}月
						{form_input name="exchange_updated_day_start" emptyoption=""}日
						〜
						{form_input name="exchange_updated_year_end" emptyoption=""}年
						{form_input name="exchange_updated_month_end" emptyoption=""}月
						{form_input name="exchange_updated_day_end" emptyoption=""}日
					</td>
					<th style="width:20%">{form_name name="exchange_name"}</th>
					<td {if $app.exchange_name_active}class="active"{/if}>{form_input name="exchange_name"}</td>
				</tr>
				<tr>
					<th>{form_name name="exchange_status"}</th>
					<td {if $app.exchange_status_active}class="active"{/if}>
						{form_input name="exchange_status"}
					</td>
					<th></th>
					<td>{form_input name="search"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{form_name name="exchange_id"}</th>
					<th nowrap>{form_name name="exchange_status"}</th>
					<th nowrap>
						登録日時<br />
						更新日時<br />
					</th>
					<th nowrap>{form_name name="exchange_name"}</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.exchange_id}</td>
					<td {if $item.exchange_status==0}class="disable"{/if}>{$config.regist_status[$item.exchange_status].name}</td>
					<td nowrap>
						[登録]:{$item.exchange_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[更新]:{$item.exchange_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
					</td>
					<td>{$item.exchange_name}</td>
					<td><a href="?action_admin_ec_exchange_edit=true&exchange_id={$item.exchange_id}">編集</a></td>
					<td><a href="?action_admin_ec_exchange_delete_do=true&exchange_id={$item.exchange_id}" onClick="return confirm('本当にこの代引き手数料設定を削除してもよろしいですか？');">削除</a></td>
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
