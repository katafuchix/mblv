{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.bbs.name}検索</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{if $app.listview_total == 0}
				検索条件に合致する{$ft.bbs.name}は見つかりませんでした。
			{else}
				検索条件に合致する{$ft.bbs.name}が{$app.listview_total}件見つかりました。
			{/if}
			{form ethna_action="admin_bbs_list"}
			<table class="sheet">
					<th>投稿期間</th>
					<td {if $app.bbs_created_active}class="active"{/if} nowrap>
						{form_input name="bbs_created_year_start" emptyoption=""}年
						{form_input name="bbs_created_month_start" emptyoption=""}月
						{form_input name="bbs_created_day_start" emptyoption=""}日
						〜
						{form_input name="bbs_created_year_end" emptyoption=""}年
						{form_input name="bbs_created_month_end" emptyoption=""}月
						{form_input name="bbs_created_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="from_user_id"}</th>
					<td {if $app.from_user_id_active}class="active"{/if}>{form_input name="from_user_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.bbs_updated_active}class="active"{/if} nowrap>
						{form_input name="bbs_updated_year_start" emptyoption=""}年
						{form_input name="bbs_updated_month_start" emptyoption=""}月
						{form_input name="bbs_updated_day_start" emptyoption=""}日
						〜
						{form_input name="bbs_updated_year_end" emptyoption=""}年
						{form_input name="bbs_updated_month_end" emptyoption=""}月
						{form_input name="bbs_updated_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="to_user_id"}</th>
					<td {if $app.to_user_id_active}class="active"{/if}>{form_input name="to_user_id"}</td>
				</tr>
				<tr>
					<th>削除期間</th>
					<td {if $app.bbs_deleted_active}class="active"{/if} nowrap>
						{form_input name="bbs_deleted_year_start" emptyoption=""}年
						{form_input name="bbs_deleted_month_start" emptyoption=""}月
						{form_input name="bbs_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="bbs_deleted_year_end" emptyoption=""}年
						{form_input name="bbs_deleted_month_end" emptyoption=""}月
						{form_input name="bbs_deleted_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="bbs_body"}</th>
					<td {if $app.message_active}class="active"{/if}>{form_input name="bbs_body"}</td>
				</tr>
				<tr>
					<th>{form_name name="bbs_checked"}</th>
					<td {if $app.bbs_checked_active}class="active"{/if}>{form_input name="bbs_checked" emptyoption=""}</td>
					<th>{form_name name="bbs_status"}</th>
					<td {if $app.bbs_status_active}class="active"{/if}>{form_input name="bbs_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<th></th>
					<td>{form_submit value="　検　索　"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			{form action="$script" ethna_action="admin_bbs_list"}
			{$app_ne.hidden_vars}
			<table class="sheet" id="list">
				<tr>
					<th>ID</th>
					<th>ステータス</th>
					<th>監視</th>
					<th>
						投稿日時<br />
						更新日時<br />
						削除日時
					</th>
					<th colspan="2">伝言を送信したユーザIDとニックネーム</th>
					<th colspan="2">伝言を受信したユーザIDとニックネーム</th>
					<th>{$ft.bbs_body.name}</th>
					<th nowrap><input type="checkbox" onclick="$j('#list input:checkbox').attr('checked', this.checked);">非表示</th>
				</tr>
				<tr>
					<td class="checkedrow" colspan=10 align="right">下記{$ft.bbs.name}の{$ft.bbs_checked.name}ステータスを更新する{form_submit name="update" value="　実　行　"}</td>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.bbs_id}</td>
					<td {if $item.bbs_status==0}class="disable"{/if}>{$config.data_status[$item.bbs_status].name}</td>
					<td class="{if $item.bbs_checked==0}non{/if}checked">{$config.data_checked[$item.bbs_checked].name}</td>
					<td nowrap>
						[投稿]{$item.bbs_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[更新]{$item.bbs_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[削除]{$item.bbs_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
					</td>
					<td>{$item.from_user_id}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.from_user_id}">{$item.from_user_nickname}</a>さん</td>
					<td>{$item.to_user_id}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.to_user_id}">{$item.to_user_nickname}</a>さん</td>
					<td>{$item.bbs_body|nl2br}</td>
					<td class="checkedrow" nowrap>
						<input type="hidden" name="id[]" value="{$item.bbs_id}">
						<input type="checkbox" name="check[]" value="{$item.bbs_id}" {if $item.bbs_status == 0}checked="checked"{/if}>
					</td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan=10 align="right">上記{$ft.bbs.name}の{$ft.bbs_checked.name}ステータスを更新する{form_submit name="update" value="　実　行　"}</td>
				</tr>
			</table>
			{/form}
			
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
