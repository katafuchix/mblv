{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.report.name}一覧</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_report_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.report.name}一覧FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{if $app.listview_total == 0}
					検索条件に合致する{$ft.report.name}は見つかりませんでした。
				{else}
					検索条件に合致する{$ft.report.name}が{$app.listview_total}件見つかりました。<br />
				{/if}
			</div>
			{form ethna_action="admin_report_list"}
			<table class="sheet">
				<tr>
					<th>投稿期間</th>
					<td {if $app.report_created_active}class="active"{/if} nowrap>
						{form_input name="report_created_year_start" emptyoption=""}年
						{form_input name="report_created_month_start" emptyoption=""}月
						{form_input name="report_created_day_start" emptyoption=""}日
						〜
						{form_input name="report_created_year_end" emptyoption=""}年
						{form_input name="report_created_month_end" emptyoption=""}月
						{form_input name="report_created_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="report_user_id"}</th>
					<td {if $app.report_user_id_active}class="active"{/if}>{form_input name="report_user_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.report_updated_active}class="active"{/if} nowrap>
						{form_input name="report_updated_year_start" emptyoption=""}年
						{form_input name="report_updated_month_start" emptyoption=""}月
						{form_input name="report_updated_day_start" emptyoption=""}日
						〜
						{form_input name="report_updated_year_end" emptyoption=""}年
						{form_input name="report_updated_month_end" emptyoption=""}月
						{form_input name="report_updated_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="report_fail_user_id"}</th>
					<td {if $app.report_fail_user_id_active}class="active"{/if}>{form_input name="report_fail_user_id"}</td>
				</tr>
				<tr>
					<th>削除期間</th>
					<td {if $app.report_deleted_active}class="active"{/if} nowrap>
						{form_input name="report_deleted_year_start" emptyoption=""}年
						{form_input name="report_deleted_month_start" emptyoption=""}月
						{form_input name="report_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="report_deleted_year_end" emptyoption=""}年
						{form_input name="report_deleted_month_end" emptyoption=""}月
						{form_input name="report_deleted_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="report_id"}</th>
					<td {if $app.report_id_active}class="active"{/if}>{form_input name="report_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="report_message"}</th>
					<td {if $app.report_message_active}class="active"{/if}>{form_input name="report_message"}</td>
					<th>{form_name name="report_status"}</th>
					<td {if $app.report_status_active}class="active"{/if}>{form_input name="report_status"}</td>
				</tr>
				<tr>
					<th>{form_name name="report_checked"}</th>
					<td {if $app.report_checked_active}class="active"{/if}>{form_input name="report_checked" emptyoption=""}</td>
					<th></th>
					<td>{form_submit value="　検　索　"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			{form action="$script" ethna_action="admin_report_list"}
			{$app_ne.hidden_vars}
			<table class="sheet">
				<tr>
					<th>ID</th>
					<th>ステータス</th>
					<th>監視</th>
					<th>
						投稿日時<br />
						更新日時<br />
						削除日時
					</th>
					<th colspan="2">{$ft.report.name}者ユーザIDとニックネーム</th>
					<th colspan="2">{$ft.report.name}されたユーザIDとニックネーム</th>
					<th>{$ft.report.name}メッセージ</th>
					<th nowrap><input type="checkbox" onclick="$j('#list input:checkbox').attr('checked', this.checked);">非表示</th>
				</tr>
				<tr>
					<td class="checkedrow" colspan=10 align="right">下記{$ft.report.name}の監視ステータスを更新する{form_submit name="update" value="　実　行　"}</td>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.report_id}</td>
					<td {if $item.report_status==0}class="disable"{/if}>{$config.regist_status[$item.report_status].name}</td>
					<td class="{if $item.report_checked==0}non{/if}checked">{$config.data_checked[$item.report_checked].name}</td>
					<td nowrap>
						[投稿]{$item.report_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[更新]{$item.report_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[削除]{if $item.report_status ==0}{$item.report_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}{/if}
					</td>
					<td>{$item.report_user_id}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.report_user_id}">{$item.report_user_nickname}さん</a></td>
					<td>{$item.report_fail_user_id}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.report_fail_user_id}">{$item.report_fail_user_nickname}さん</a></td>
					<td>{$item.report_message|nl2br}</td>
					<td class="checkedrow" nowrap>
						<input type="hidden" name="id[]" value="{$item.report_id}">
						<input type="checkbox" name="check[]" value="{$item.report_id}" {if $item.report_status == 0}checked="checked"{/if}>
					</td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan=10 align="right">上記{$ft.report.name}の監視ステータスを更新する{form_submit name="update" value="　実　行　"}</td>
				</tr>
			</table>
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
