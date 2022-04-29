{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>{$ft.point.name}管理</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action=$script ethna_action="admin_point_list"}
			<table class="sheet">
				<tr>
					<th>取得期間</th>
					<td {if $app.point_created_active}class="active"{/if} nowrap>
						{form_input name="point_created_year_start" emptyoption=""}年
						{form_input name="point_created_month_start" emptyoption=""}月
						{form_input name="point_created_day_start" emptyoption=""}日
						〜
						{form_input name="point_created_year_end" emptyoption=""}年
						{form_input name="point_created_month_end" emptyoption=""}月
						{form_input name="point_created_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="point_id"}</th>
					<td {if $app.point_id_active}class="active"{/if}>{form_input name="point_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.point_updated_active}class="active"{/if} nowrap>
						{form_input name="point_updated_year_start" emptyoption=""}年
						{form_input name="point_updated_month_start" emptyoption=""}月
						{form_input name="point_updated_day_start" emptyoption=""}日
						〜
						{form_input name="point_updated_year_end" emptyoption=""}年
						{form_input name="point_updated_month_end" emptyoption=""}月
						{form_input name="point_updated_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="point_memo"}</th>
					<td {if $app.point_memo_active}class="active"{/if}>{form_input name="point_memo"}</td>
				</tr>
				<tr>
					<th>削除期間</th>
					<td {if $app.point_deleted_active}class="active"{/if} nowrap>
						{form_input name="point_deleted_year_start" emptyoption=""}年
						{form_input name="point_deleted_month_start" emptyoption=""}月
						{form_input name="point_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="point_deleted_year_end" emptyoption=""}年
						{form_input name="point_deleted_month_end" emptyoption=""}月
						{form_input name="point_deleted_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="point_type"}</th>
					<td {if $app.point_type_active}class="active"{/if}>{form_input name="point_type" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="user_sub_id"}</th>
					<td {if $app.user_sub_id_active}class="active"{/if}>{form_input name="user_sub_id"}</td>
					<th>{form_name name="point_sub_id"}</th>
					<td {if $app.point_sub_id_active}class="active"{/if}>{form_input name="point_sub_id"}</td>
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
					<td>{form_submit value="　検　索　"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			<br />
			<table class="sheet">
				<tr>
					<th nowrap>取得日時</th>
					<th nowrap>{$ft.point.name}ID</th>
					<th nowrap>{$ft.point.name}ステータス</th>
					<th nowrap>{$ft.point.name}タイプ</th>
					<th nowrap>{$ft.point.name}</th>
					<th nowrap>ポイントサブID</th>
					<th nowrap>ポイントメモ</th>
					<th nowrap>ユーザサブID</th>
					<th nowrap>ユーザID</th>
					<th nowrap>ニックネーム</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				<tr>
					<td nowrap>[取得]{$item.point_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}</td>
					<td>{$item.point_id}</td>
					<td>{$config.point_status[$item.point_status].name}</td>
					<td>{$config.point_type[$item.point_type].name}</td>
					<td>{$item.point}</td>
					<td>{$item.point_sub_id}</td>
					<td>{$item.point_memo}</td>
					<td>{$item.user_sub_id}</td>
					<td>{$item.user_id}</td>
					<td>{$item.user_nickname}</td>
<!--
					<td><a href="?action_admin_point_edit=true&point_id={$i.point_id}">編集</a></td>
					<td><a href="?action_admin_point_delete_do=true&point_id={$i.point_id}&point_category_id={$form.point_category_id}" onClick="return confirm('本当にこのポイントを削除してもよろしいですか？');">削除</a></td>
-->
				</tr>
				{/foreach}
			</table>
			{include file="admin/pager.tpl"}
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
		<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
