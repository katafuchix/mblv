{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>ポイント換金管理</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action=$script ethna_action="admin_point_exchange_list"}
			<table class="sheet">
				<tr>
					<th>{form_name name="user_id"}</th>
					<td>{form_input name="user_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_nickname"}</th>
					<td>{form_input name="user_nickname"}</td>
				</tr>
				<tr>
					<th>{form_name name="point_type"}</th>
					<td>{form_input name="point_type" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="point_status"}</th>
					<td>{form_input name="point_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>ポイント換金期間</th>
					<td>
					{form_input name="point_exchange_year_start" emptyoption=""}
					年{form_input name="point_exchange_month_start" emptyoption=""}
					月{form_input name="point_exchange_day_start" emptyoption=""}日
					〜
					{form_input name="point_exchange_year_end" emptyoption=""}
					年{form_input name="point_exchange_month_end" emptyoption=""}
					月{form_input name="point_exchange_day_end" emptyoption=""}日
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit name="search" value="検索"}{form_submit name="csv" value="CSVダウンロード"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			<br />
			<table class="sheet">
				<tr>
					<th nowrap>換金日時</th>
					<th nowrap>ポイントID</th>
					<th nowrap>ポイントタイプ</th>
					<th nowrap>ポイントステータス</th>
					<th nowrap>手数料を除いた金額</th>
					<th nowrap>ユーザID</th>
					<th nowrap>ニックネーム</th>
				</tr>
				{foreach from=$app.point_list item=i}
				<tr>
					<td nowrap>{$i.point_exchange_time|jp_date_format:"%Y/%m/%d (%a) %H:%M"}</td>
					<td>{$i.point_id}</td>
					<td>{$config.point_type[$i.point_type].name}</td>
					<td>{$config.point_status[$i.point_status].name}</td>
					<td>{$i.price}円</td>
					<td>{$i.user_id}</td>
					<td>{$i.user_nickname}</td>
				</tr>
				{/foreach}
			</table>
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
		<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- ***********************　#main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
