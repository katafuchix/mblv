{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.point.name}換金管理</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				
				{if $app.listview_total == 0}
					検索条件に合致する{$ft.point.name}換金履歴は見つかりませんでした。
				{else}
					検索条件に合致する{$ft.point.name}換金履歴が{$app.listview_total}件見つかりました。
				{/if}
			</div>
			{form action=$script ethna_action="admin_point_exchange_list"}
			<table class="sheet">
				<tr>
					<th>{$ft.point.name}換金期間</th>
					<td {if $app.point_exchange_created_active}class="active"{/if}>
					{form_input name="point_exchange_created_year_start" emptyoption=""}
					年{form_input name="point_exchange_created_month_start" emptyoption=""}
					月{form_input name="point_exchange_created_day_start" emptyoption=""}日
					〜
					{form_input name="point_exchange_created_year_end" emptyoption=""}
					年{form_input name="point_exchange_created_month_end" emptyoption=""}
					月{form_input name="point_exchange_created_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="point_type"}</th>
					<td {if $app.point_type_active}class="active"{/if}>{form_input name="point_type" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="user_id"}</th>
					<td {if $app.user_id_active}class="active"{/if}>{form_input name="user_id"}</td>
					<th>{form_name name="user_nickname"}</th>
					<td {if $app.user_nickname_active}class="active"{/if}>{form_input name="user_nickname"}</td>
				</tr>
				<tr>
					<th>{form_name name="point_status"}</th>
					<td {if $app.point_status_active}class="active"{/if}>{form_input name="point_status" emptyoption=""}</td>
					<th></th>
					<td>
						{form_submit name="search" value="　検索　"}
						&nbsp;&nbsp;
						{*<!--form_submit name="download" value="　ダウンロード　"-->*}
					</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet">
				<tr>
					<th nowrap>換金日時</th>
					<th nowrap>{$ft.point.name}ID</th>
					<th nowrap>{$ft.point.name}タイプ</th>
					<th nowrap>{$ft.point.name}ステータス</th>
					<th nowrap>手数料を除いた金額</th>
					<th nowrap>ユーザID</th>
					<th nowrap>ニックネーム</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td nowrap>{$i.point_exchange_created_time|jp_date_format:"%Y/%m/%d (%a) %H:%M"}</td>
					<td>{$i.point_id}</td>
					<td>{$config.point_type[$i.point_type].name}</td>
					<td>{$config.point_status[$i.point_status].name}</td>
					<td>{$i.price}円</td>
					<td>{$i.user_id}</td>
					<td>{$i.user_nickname}</td>
				</tr>
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
