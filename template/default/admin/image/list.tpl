{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.image.name}検索</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_image_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.image.name}管理FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{if $app.listview_total == 0}
					検索条件に合致する{$ft.image.name}は見つかりませんでした。
				{else}
					検索条件に合致する{$ft.image.name}が{$app.listview_total}個見つかりました。
				{/if}
			</div>
			{form ethna_action="admin_image_list"}
			<table class="sheet">
				<tr>
					<th>投稿期間</th>
					<td {if $app.image_created_active}class="active"{/if} nowrap>
						{form_input name="image_created_year_start" emptyoption=""}年
						{form_input name="image_created_month_start" emptyoption=""}月
						{form_input name="image_created_day_start" emptyoption=""}日
						〜
						{form_input name="image_created_year_end" emptyoption=""}年
						{form_input name="image_created_month_end" emptyoption=""}月
						{form_input name="image_created_day_end" emptyoption=""}日
					</td>
					<th style="width:20%">{form_name name="user_id"}</th>
					<td {if $app.user_id_active}class="active"{/if}>{form_input name="user_id"}</td>
				</tr>
				<tr>
					<th>削除期間</th>
					<td {if $app.image_deleted_active}class="active"{/if} nowrap>
						{form_input name="image_deleted_year_start" emptyoption=""}年
						{form_input name="image_deleted_month_start" emptyoption=""}月
						{form_input name="image_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="image_deleted_year_end" emptyoption=""}年
						{form_input name="image_deleted_month_end" emptyoption=""}月
						{form_input name="image_deleted_day_end" emptyoption=""}日
					</td>
					<th>{$ft.image.name}サイズ</th>
					<td {if $app.image_size_active}class="active"{/if} nowrap>{form_input name="image_size_min"}〜{form_input name="image_size_max"}バイト</td>
				</tr>
				<tr>
					<th>{form_name name="image_mime_type"}</th>
					<td {if $app.image_mime_type_active}class="active"{/if}>{form_input name="image_mime_type"}</td>
					<th>{form_name name="image_status"}</th>
					<td {if $app.image_status_active}class="active"{/if}>{form_input name="image_status"}</td>
				</tr>
				<tr>
					<th>表示順</th>
					<td>{form_input name="sort_key" emptyoption=""}で{form_input name="sort_order" emptyoption=""}</td>
					<th>{form_name name="image_checked"}</th>
					<td {if $app.image_checked_active}class="active"{/if}>{form_input name="image_checked" emptyoption=""}</td>
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
			
			{form action="$script" ethna_action="admin_image_list"}
			{$app_ne.hidden_vars}
			<table class="sheet">
				<tr>
					<th>ID</th>
					<th>ステータス</th>
					<th>監視</th>
					<th>
						投稿日時<br />
						削除日時
					</th>
					<th>サムネイル</th>
					<th>所有ユーザ</th>
					<th>MIMEタイプ</th>
					<th>ファイルサイズ（バイト）</th>
					<th nowrap><input type="checkbox" onclick="$j('#list input:checkbox').attr('checked', this.checked);">非表示</th>
				</tr>
				<tr>
					<td class="checkedrow" colspan=10 align="right">下記{$ft.image.name}の{$ft.image_checked.name}ステータスを更新する{form_submit name="update" value="　実　行　"}</td>
				</tr>
				</tr>
				{foreach from=$app.listview_data item=item name=file}
				{if $item != false}
				<tr>
					<td>{$item.image_id}</td>
					<td {if $item.image_status==0}class="disable"{/if}>{$config.data_status[$item.image_status].name}</td>
					<td class="{if $item.image_checked==0}non{/if}checked">{$config.data_checked[$item.image_checked].name}</td>
					<td nowrap>
						[投稿]{$item.image_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[削除]{$item.image_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
					</td>
					<td><img src="f.php?type=image&id={$item.image_id}&attr=t"></td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_nickname}さん</a></td>
					<td>{$item.image_mime_type}</td>
					<td>{$item.image_size}</td>
					<td class="checkedrow" nowrap>
						<input type="hidden" name="id[]" value="{$item.image_id}">
						<input type="checkbox" name="check[]" value="{$item.image_id}" {if $item.image_status == 0}checked="checked"{/if}>
					</td>
				</tr>
				{/if}
				{/foreach}
				<tr>
					<td class="checkedrow" colspan=10 align="right">上記{$ft.image.name}の{$ft.image_checked.name}ステータスを更新する{form_submit name="update" value="　実　行　"}</td>
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
