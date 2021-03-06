{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.contents.name}管理</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_contents_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.contents.name}管理FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_contents_add=true">{$ft.contents.name}登録</a><br />
				{if $app.listview_total == 0}
					検索条件に合致する{$ft.contents.name}は見つかりませんでした。
				{else}
					検索条件に合致する{$ft.contents.name}が{$app.listview_total}件見つかりました。
				{/if}
			</div>
			{form action="$script" ethna_action="admin_contents_list"}
			<table class="sheet">
				<tr>
					<th>作成期間</th>
					<td {if $app.contents_created_active}class="active"{/if} nowrap>
						{form_input name="contents_created_year_start" emptyoption=""}年
						{form_input name="contents_created_month_start" emptyoption=""}月
						{form_input name="contents_created_day_start" emptyoption=""}日
						〜
						{form_input name="contents_created_year_end" emptyoption=""}年
						{form_input name="contents_created_month_end" emptyoption=""}月
						{form_input name="contents_created_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="contents_id"}</th>
					<td {if $app.contents_id_active}class="active"{/if}>{form_input name="contents_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.contents_updated_active}class="active"{/if} nowrap>
						{form_input name="contents_updated_year_start" emptyoption=""}年
						{form_input name="contents_updated_month_start" emptyoption=""}月
						{form_input name="contents_updated_day_start" emptyoption=""}日
						〜
						{form_input name="contents_updated_year_end" emptyoption=""}年
						{form_input name="contents_updated_month_end" emptyoption=""}月
						{form_input name="contents_updated_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="contents_code"}</th>
					<td {if $app.contents_code_active}class="active"{/if}>{form_input name="contents_code"}</td>
				</tr>
				<tr>
					<th>削除期間</th>
					<td {if $app.contents_deleted_active}class="active"{/if} nowrap>
						{form_input name="contents_deleted_year_start" emptyoption=""}年
						{form_input name="contents_deleted_month_start" emptyoption=""}月
						{form_input name="contents_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="contents_deleted_year_end" emptyoption=""}年
						{form_input name="contents_deleted_month_end" emptyoption=""}月
						{form_input name="contents_deleted_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="contents_title"}</th>
					<td {if $app.contents_title_active}class="active"{/if}>{form_input name="contents_title" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="contents_body"}</th>
					<td {if $app.contents_body_active}class="active"{/if}>{form_input name="contents_body" size="50"}</td>
					<th>{form_name name="contents_status"}</th>
					<td {if $app.contents_status_active}class="active"{/if}>{form_input name="contents_status"}</td>
				</tr>
				<tr>
					<th></th>
					<td></td>
					<th></th>
					<td>{form_submit value="　検　索　"}</td>
				</tr>
			</table>
			{/form}
			
			※{$ft.contents.name}URL<br />
			サイト内からリンクを貼る場合：fp.php?code=「{$ft.contents_code.name}」<br />
			サイト外からリンクを貼る場合：{$config.user_url}fp.php?code=「{$ft.contents_code.name}」<br />
			{include file="admin/pager.tpl"}
			
			{form action="$script" ethna_action="admin_contents_list"}
			{$app_ne.hidden_vars}
			<table class="sheet" id="list">
				<tr>
					<th>ID</th>
					<th>ステータス</th>
					<th>
						作成日時<br />
						更新日時<br />
						削除日時
					</th>
					<th>{$ft.contents_code.name}</th>
					<th>{$ft.contents_title.name}</th>
					<th nowrap>解析</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.contents_id}</td>
					<td {if $item.contents_status==0}class="disable"{/if}>{$config.data_status[$item.contents_status].name}</td>
					<td nowrap>
						[作成]{$item.contents_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[更新]{$item.contents_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[削除]{$item.contents_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
					</td>
					<td>{$item.contents_code}</td>
					<td><a href="?action_admin_contents_edit=true&contents_id={$item.contents_id}">{$item.contents_title}</a></td>
					<td><a href="?action_admin_stats_list=true&type=contents&id={$item.contents_id}&term=month">解析</a></td>
					<td><a href="?action_admin_contents_edit=true&contents_id={$item.contents_id}">編集</a></td>
					<td><a href="?action_admin_contents_delete_do=true&contents_id={$item.contents_id}" onClick="return confirm('本当にこの{$ft.contents.name}を削除してもよろしいですか？');">削除</a></td>
				</tr>
				{/if}
				{/foreach}
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
