{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.community.name}検索</h2>
			<!-- ここからメインコンテンツ-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{if $app.listview_total == 0}
				検索条件に合致する{$ft.community.name}は見つかりませんでした。
			{else}
				検索条件に合致する{$ft.community.name}が{$app.listview_total}件見つかりました。
			{/if}
			{form action="$script" ethna_action="admin_community_list"}
			<table class="sheet">
				<tr>
					<th>作成期間</th>
					<td {if $app.community_created_active}class="active"{/if} nowrap>
						{form_input name="community_created_year_start" emptyoption=""}年
						{form_input name="community_created_month_start" emptyoption=""}月
						{form_input name="community_created_day_start" emptyoption=""}日
						〜
						{form_input name="community_created_year_end" emptyoption=""}年
						{form_input name="community_created_month_end" emptyoption=""}月
						{form_input name="community_created_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="community_title"}</th>
					<td {if $app.community_title_active}class="active"{/if}>{form_input name="community_title"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.community_updated_active}class="active"{/if} nowrap>
						{form_input name="community_updated_year_start" emptyoption=""}年
						{form_input name="community_updated_month_start" emptyoption=""}月
						{form_input name="community_updated_day_start" emptyoption=""}日
						〜
						{form_input name="community_updated_year_end" emptyoption=""}年
						{form_input name="community_updated_month_end" emptyoption=""}月
						{form_input name="community_updated_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="community_description"}</th>
					<td {if $app.community_description_active}class="active"{/if}>{form_input name="community_description"}</td>
				</tr>
				<tr>
					<th>削除期間</th>
					<td {if $app.community_deleted_active}class="active"{/if} nowrap>
						{form_input name="community_deleted_year_start" emptyoption=""}年
						{form_input name="community_deleted_month_start" emptyoption=""}月
						{form_input name="community_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="community_deleted_year_end" emptyoption=""}年
						{form_input name="community_deleted_month_end" emptyoption=""}月
						{form_input name="community_deleted_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="community_category_id"}</th>
					<td {if $app.community_category_id_active}class="active"{/if}>{form_input name="community_category_id" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="community_status"}</th>
					<td {if $app.community_status_active}class="active"{/if}>{form_input name="community_status" emptyoption=""}</td>
					<th>{form_name name="community_checked"}</th>
					<td {if $app.community_checked_active}class="active"{/if}>{form_input name="community_checked" emptyoption=""}</td>
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
			
			{form action="$script" ethna_action="admin_community_list"}
			{$app_ne.hidden_vars}
			<table class="sheet" id="list">
				<tr>
					<th>ID</th>
					<th>ステータス</th>
					<th>監視</th>
					<th>
						作成日時<br />
						更新日時<br />
						削除日時
					</th>
					<th>メンバー数</th>
					<th>コミュニティタイトル</th>
					<th>コミュニティ説明</th>
					<th>コミュニティカテゴリ</th>
					<th nowrap><input type="checkbox" onclick="$j('#list input:checkbox').attr('checked', this.checked);">非表示</th>
				</tr>
				<tr>
					<td class="checkedrow" colspan=9 align="right">下記コミュニティの監視ステータスを更新する{form_submit name="update" value="　実　行　"}</td>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.community_id}</td>
					<td {if $item.community_status==0}class="disable"{/if}>{$config.data_status[$item.community_status].name}</td>
					<td class="{if $item.community_checked==0}non{/if}checked">{$config.data_checked[$item.community_checked].name}</td>
					<td nowrap>
						[作成]{$item.community_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[更新]{$item.community_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[削除]{if $item.community_status == 0 }{$item.community_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}{/if}
					</td>
					<td>{$item.community_member_num}</td>
					<td><a href="?action_admin_community_edit=true&community_id={$item.community_id}">{$item.community_title}</a></td>
					<td>{$item.community_description|nl2br}</td>
					<td>{$item.community_category_name}</td>
					<td class="checkedrow" nowrap>
						<input type="hidden" name="id[]" value="{$item.community_id}">
						<input type="checkbox" name="check[]" value="{$item.community_id}" {if $item.community_status == 0}checked="checked"{/if}>
					</td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan=9 align="right">上記コミュニティの監視ステータスを更新する{form_submit name="update" value="　実　行　"}</td>
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
