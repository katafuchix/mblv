{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>ファイル検索</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{if $app.listview_total == 0}
				検索条件に合致するファイルは見つかりませんでした。
			{else}
				検索条件に合致するファイルが{$app.listview_total}個見つかりました。
			{/if}
			{form ethna_action="admin_file_list"}
			<table class="sheet">
				<tr>
					<th>アップロード期間</th>
					<td {if $app.file_upload_active}class="active"{/if} nowrap>
						{form_input name="file_upload_year_start" emptyoption=""}年
						{form_input name="file_upload_month_start" emptyoption=""}月
						{form_input name="file_upload_day_start" emptyoption=""}日
						〜
						{form_input name="file_upload_year_end" emptyoption=""}年
						{form_input name="file_upload_month_end" emptyoption=""}月
						{form_input name="file_upload_day_end" emptyoption=""}日
					</td>
					<th style="width:20%">{form_name name="user_id"}</th>
					<td {if $app.user_id_active}class="active"{/if}>{form_input name="user_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="file_mime_type"}</th>
					<td {if $app.file_mime_type_active}class="active"{/if}>{form_input name="file_mime_type"}</td>
					<th>ファイルサイズ</th>
					<td {if $app.file_size_active}class="active"{/if} nowrap>{form_input name="file_size_min"}〜{form_input name="file_size_max"}バイト</td>
				</tr>
				<tr>
					<th>{form_name name="file_status"}</th>
					<td {if $app.file_status_active}class="active"{/if}>{form_input name="file_status" emptyoption=""}</td>
					<th>表示順</th>
					<td>{form_input name="sort_key" emptyoption=""}で{form_input name="sort_order" emptyoption=""}</td>
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
			
			※監視機能未実装
			{form action="$script" ethna_action="admin_file_remove_confirm"}
				{form_input name='confirm'}
			{$app_ne.hidden_vars}
			<table class="sheet">
				<tr>
					<th>削除</th>
					<th>ファイルID</th>
					<th>サムネイル</th>
					<th>所有ユーザID</th>
					<th>MIMEタイプ</th>
					<th>ファイルサイズ（バイト）</th>
					<th>アップロード日時</th>
					<th>状態</th>
				</tr>
				{foreach from=$app.listview_data item=item name=file}
					{if $item != false}
						<tr{if $item.file_status != 1} class="file_removed"{/if}>
							<td>{if $item.file_status == 1}<input type="checkbox" name='image_id[]' value="{$item.image_id}">{/if}</td>
							<td>{$item.image_id}</td>
							<td>{if $item.file_status == 1}<a href="f.php?type=image&id={$item.image_id}"><img src="?action_user_file_get_thumbnail=true&image_id={$item.image_id}"></a>{/if}</td>
							<td><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_id}</a></td>
							<td>{$item.file_mime_type}</td>
							<td>{$item.file_size}</td>
							<td>{$item.file_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}</td>
							<td>{$config.file_status[$item.file_status].name}</td>
						</tr>
					{/if}
				{/foreach}
			</table>
			選択情報{form_input name="type"}{form_submit value="　実行　"}
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
