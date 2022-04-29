{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>
			{if $app.video_category_name}
				{$app.video_category_name}	>
			{/if}
				{$ft.video.name}管理
			</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_video_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.video.name}管理FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_config_edit=true&site_type=video">{$ft.video.name}基本設定</a>
				{$ft.menu_icon.name}<a href="?action_admin_videocategory_list=true">{$ft.video_category.name}管理</a>
				{$ft.menu_icon.name}<a href="?action_admin_video_add=true">{$ft.video.name}登録</a><br />
				
				{if $app.listview_total == 0}
					検索条件に合致する{$ft.video.name}は見つかりませんでした。
				{else}
					検索条件に合致する{$ft.video.name}が{$app.listview_total}件見つかりました。
				{/if}
			</div>
			{form action="$script" ethna_action="admin_video_list"}
			<table class="sheet">
				<tr>
					<th>作成期間</th>
					<td {if $app.video_created_active}class="active"{/if} nowrap>
						{form_input name="video_created_year_start" emptyoption=""}年
						{form_input name="video_created_month_start" emptyoption=""}月
						{form_input name="video_created_day_start" emptyoption=""}日
						〜
						{form_input name="video_created_year_end" emptyoption=""}年
						{form_input name="video_created_month_end" emptyoption=""}月
						{form_input name="video_created_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="video_id"}</th>
					<td {if $app.video_id_active}class="active"{/if}>{form_input name="video_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.video_updated_active}class="active"{/if} nowrap>
						{form_input name="video_updated_year_start" emptyoption=""}年
						{form_input name="video_updated_month_start" emptyoption=""}月
						{form_input name="video_updated_day_start" emptyoption=""}日
						〜
						{form_input name="video_updated_year_end" emptyoption=""}年
						{form_input name="video_updated_month_end" emptyoption=""}月
						{form_input name="video_updated_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="video_name"}</th>
					<td {if $app.video_name_active}class="active"{/if}>{form_input name="video_name"}</td>
				</tr>
				<tr>
					<th>削除期間</th>
					<td {if $app.video_deleted_active}class="active"{/if} nowrap>
						{form_input name="video_deleted_year_start" emptyoption=""}年
						{form_input name="video_deleted_month_start" emptyoption=""}月
						{form_input name="video_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="video_deleted_year_end" emptyoption=""}年
						{form_input name="video_deleted_month_end" emptyoption=""}月
						{form_input name="video_deleted_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="video_desc"}</th>
					<td {if $app.video_desc_active}class="active"{/if}>{form_input name="video_desc"}</td>
				</tr>
				<tr>
					<th>配信開始期間</th>
					<td {if $app.video_start_active}class="active"{/if} nowrap>
						{form_input name="video_start_year_start" emptyoption=""}年
						{form_input name="video_start_month_start" emptyoption=""}月
						{form_input name="video_start_day_start" emptyoption=""}日
						〜
						{form_input name="video_start_year_end" emptyoption=""}年
						{form_input name="video_start_month_end" emptyoption=""}月
						{form_input name="video_start_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="video_start_status"}</th>
					<td {if $app.video_start_status_active}class="active"{/if}>{form_input name="video_start_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>配信終了期間</th>
					<td {if $app.video_end_active}class="active"{/if} nowrap>
						{form_input name="video_end_year_start" emptyoption=""}年
						{form_input name="video_end_month_start" emptyoption=""}月
						{form_input name="video_end_day_start" emptyoption=""}日
						〜
						{form_input name="video_end_year_end" emptyoption=""}年
						{form_input name="video_end_month_end" emptyoption=""}月
						{form_input name="video_end_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="video_end_status"}</th>
					<td {if $app.video_end_status_active}class="active"{/if}>{form_input name="video_end_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="video_stock_num"}</th>
					<td {if $app.video_stock_num_active}class="active"{/if}>{form_input name="video_stock_num" emptyoption=""}</td>
					<th>{form_name name="video_stock_status"}</th>
					<td {if $app.video_stock_status_active}class="active"{/if}>{form_input name="video_stock_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="video_category_id"}</th>
					<td {if $app.video_category_id_active}class="active"{/if}>{form_input name="video_category_id" emptyoption=""}</td>
					<th>{form_name name="video_status"}</th>
					<td {if $app.video_status_active}class="active"{/if}>{form_input name="video_status"}</td>
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
			
			<table class="sheet" id="list">
				<tr>
					<th nowrap>ID</th>
					<th>ステータス</th>
					<th nowrap>{$ft.video_name.name}</th>
					<th nowrap>{$ft.video_category.name}</th>
					<!--th nowrap>{$ft.video.name}画像</th-->
					<th nowrap>解析</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.video_id}</td>
					<td {if $i.video_status==0}class="disable"{/if}>{$config.regist_status[$i.video_status].name}</td>
					<td>{$i.video_name}</td>
					<!--td><img src="f.php?file=video/{$i.video_image}"></td-->
					<td>{$i.video_category_name}</td>
					<td><a href="?action_admin_stats_list=true&type=video&id={$i.video_id}&term=month">解析</a></td>
					<td><a href="?action_admin_video_edit=true&video_id={$i.video_id}">編集</a></td>
					<td><a href="?action_admin_video_delete_do=true&video_id={$i.video_id}&video_category_id={$form.video_category_id}" onClick="return confirm('本当にこの{$ft.video.name}を削除してもよろしいですか？');">削除</a></td>
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
