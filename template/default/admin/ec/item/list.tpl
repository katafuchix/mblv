{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>
			{if $app.item_category_name}
				{$app.item_category_name}>
			{/if}
				
				{$ft.item.name}管理
			</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_item_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.item.name}管理FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{form action="$script" ethna_action="admin_ec_item_add"}
					{$ft.menu_icon.name}{$ft.item.name}登録
					{form_input name="item_category_id"}
					{form_submit value="商品追加"}
				{/form}
				
				{if $app.listview_total == 0}
					検索条件に合致する{$ft.item.name}は見つかりませんでした。
				{else}
					検索条件に合致する{$ft.item.name}が{$app.listview_total}件見つかりました。
				{/if}
			</div>
			
			{form action="$script" ethna_action="admin_ec_item_list"}
			<table class="sheet">
				<tr>
					<th>作成期間</th>
					<td {if $app.item_created_active}class="active"{/if} nowrap>
						{form_input name="item_created_year_start" emptyoption=""}年
						{form_input name="item_created_month_start" emptyoption=""}月
						{form_input name="item_created_day_start" emptyoption=""}日
						〜
						{form_input name="item_created_year_end" emptyoption=""}年
						{form_input name="item_created_month_end" emptyoption=""}月
						{form_input name="item_created_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="item_id"}</th>
					<td {if $app.item_id_active}class="active"{/if}>{form_input name="item_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.item_updated_active}class="active"{/if} nowrap>
						{form_input name="item_updated_year_start" emptyoption=""}年
						{form_input name="item_updated_month_start" emptyoption=""}月
						{form_input name="item_updated_day_start" emptyoption=""}日
						〜
						{form_input name="item_updated_year_end" emptyoption=""}年
						{form_input name="item_updated_month_end" emptyoption=""}月
						{form_input name="item_updated_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="item_name"}</th>
					<td {if $app.item_name_active}class="active"{/if}>{form_input name="item_name"}</td>
				</tr>
				<!--
				<tr>
					<th>削除期間</th>
					<td {if $app.item_deleted_active}class="active"{/if} nowrap>
						{form_input name="item_deleted_year_start" emptyoption=""}年
						{form_input name="item_deleted_month_start" emptyoption=""}月
						{form_input name="item_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="item_deleted_year_end" emptyoption=""}年
						{form_input name="item_deleted_month_end" emptyoption=""}月
						{form_input name="item_deleted_day_end" emptyoption=""}日
					</td>
					<th></th>
					<td></td>
				</tr>
				-->
				<tr>
					<th>販売開始期間</th>
					<td {if $app.item_start_active}class="active"{/if} nowrap>
						{form_input name="item_start_year_start" emptyoption=""}年
						{form_input name="item_start_month_start" emptyoption=""}月
						{form_input name="item_start_day_start" emptyoption=""}日
						〜
						{form_input name="item_start_year_end" emptyoption=""}年
						{form_input name="item_start_month_end" emptyoption=""}月
						{form_input name="item_start_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="item_start_status"}</th>
					<td {if $app.item_start_status_active}class="active"{/if}>{form_input name="item_start_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>販売終了期間</th>
					<td {if $app.item_end_active}class="active"{/if} nowrap>
						{form_input name="item_end_year_start" emptyoption=""}年
						{form_input name="item_end_month_start" emptyoption=""}月
						{form_input name="item_end_day_start" emptyoption=""}日
						〜
						{form_input name="item_end_year_end" emptyoption=""}年
						{form_input name="item_end_month_end" emptyoption=""}月
						{form_input name="item_end_day_end" emptyoption=""}日
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
							登録日時<br />
							更新日時<br />
						</th>
						<th nowrap>{form_name name="item_name"}</th>
						<th nowrap>{form_name name="item_category_name"}</th>
						<!--th nowrap>{$ft.item.name}画像</th-->
						<th nowrap>
							販売開始日時<br />
							販売終了日時<br />
						</th>
						<th nowrap>解析</th>
						<th nowrap>編集</th>
						<th nowrap>削除</th>
					</tr>
					{foreach from=$app.listview_data item=i}
					<tr>
					{if $form.shop_id && $form.item_category_id}
						<td><input name="item_priority_id[{$item.item_id}]" value="{$item.item_priority_id}" size="4"></td>
					{/if}
						<td>{$i.item_id}</td>
						<td {if $i.item_status==0}class="disable"{/if}>{$config.regist_status[$i.item_status].name}</td>
						<td nowrap>
							[登録]:{$i.item_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
							[更新]:{$i.item_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						</td>
						<td>{$i.item_name}</td>
						<td>{$i.item_category_name}</td>
						<!--td><img src="f.php?file=item/{$i.item_image}"></td-->
						<td nowrap>
							[販売開始]:{$i.item_start_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}({$config.regist_status[$i.item_start_status].name})<br />
							[販売終了]:{$i.item_end_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}({$config.regist_status[$i.item_end_status].name})<br />
						</td>
						<td><a href="?action_admin_stats_list=true&type=item&id={$i.item_id}&term=month">解析</a></td>
						<td><a href="?action_admin_ec_item_edit=true&item_id={$i.item_id}">編集</a></td>
						<td><a href="?action_admin_ec_item_delete_do=true&item_id={$i.item_id}&item_category_id={$form.item_category_id}" onClick="return confirm('本当にこの{$ft.item.name}を削除してもよろしいですか？');">削除</a></td>
					</tr>
					{/foreach}
				</table>
				{if $form.shop_id && $form.item_category_id}
					{form_input name="item_priority_edit"}
				{/if}
			{/form}

			{include file="admin/pager.tpl"}

		<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
