{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>{$app.news_category_name}{$ft.news.name}管理</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_news_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">ニュース管理FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_news_add=true">ニュース登録</a><br />
				
				{if $app.listview_total == 0}
					検索条件に合致する{$ft.news.name}は見つかりませんでした。
				{else}
					検索条件に合致する{$ft.news.name}が{$app.listview_total}件見つかりました。
				{/if}
			</div>
			
			{form action="$script" ethna_action="admin_news_list"}
			<table class="sheet">
				<tr>
					<th>作成期間</th>
					<td {if $app.news_created_active}class="active"{/if} nowrap>
						{form_input name="news_created_year_start" emptyoption=""}年
						{form_input name="news_created_month_start" emptyoption=""}月
						{form_input name="news_created_day_start" emptyoption=""}日
						〜
						{form_input name="news_created_year_end" emptyoption=""}年
						{form_input name="news_created_month_end" emptyoption=""}月
						{form_input name="news_created_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="news_id"}</th>
					<td {if $app.news_id_active}class="active"{/if}>{form_input name="news_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.news_updated_active}class="active"{/if} nowrap>
						{form_input name="news_updated_year_start" emptyoption=""}年
						{form_input name="news_updated_month_start" emptyoption=""}月
						{form_input name="news_updated_day_start" emptyoption=""}日
						〜
						{form_input name="news_updated_year_end" emptyoption=""}年
						{form_input name="news_updated_month_end" emptyoption=""}月
						{form_input name="news_updated_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="news_title"}</th>
					<td {if $app.news_title_active}class="active"{/if}>{form_input name="news_title"}</td>
				</tr>
				<tr>
					<th>削除期間</th>
					<td {if $app.news_deleted_active}class="active"{/if} nowrap>
						{form_input name="news_deleted_year_start" emptyoption=""}年
						{form_input name="news_deleted_month_start" emptyoption=""}月
						{form_input name="news_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="news_deleted_year_end" emptyoption=""}年
						{form_input name="news_deleted_month_end" emptyoption=""}月
						{form_input name="news_deleted_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="news_body"}</th>
					<td {if $app.news_body_active}class="active"{/if}>{form_input name="news_body"}</td>
				</tr>
				<tr>
					<th>配信開始期間</th>
					<td {if $app.news_start_active}class="active"{/if} nowrap>
						{form_input name="news_start_year_start" emptyoption=""}年
						{form_input name="news_start_month_start" emptyoption=""}月
						{form_input name="news_start_day_start" emptyoption=""}日
						〜
						{form_input name="news_start_year_end" emptyoption=""}年
						{form_input name="news_start_month_end" emptyoption=""}月
						{form_input name="news_start_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="news_start_status"}</th>
					<td {if $app.news_start_status_active}class="active"{/if}>{form_input name="news_start_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>配信終了期間</th>
					<td {if $app.news_end_active}class="active"{/if} nowrap>
						{form_input name="news_end_year_start" emptyoption=""}年
						{form_input name="news_end_month_start" emptyoption=""}月
						{form_input name="news_end_day_start" emptyoption=""}日
						〜
						{form_input name="news_end_year_end" emptyoption=""}年
						{form_input name="news_end_month_end" emptyoption=""}月
						{form_input name="news_end_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="news_end_status"}</th>
					<td {if $app.news_end_status_active}class="active"{/if}>{form_input name="news_end_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="news_type"}</th>
					<td {if $app.news_type_active}class="active"{/if}>{form_input name="news_type"}</td>
					<th>{form_name name="news_time"}</th>
					<td {if $app.news_time_active}class="active"{/if}>{form_input name="news_time"}</td>
				</tr>
				<tr>
					<th>{form_name name="news_status"}</th>
					<td {if $app.news_status_active}class="active"{/if}>{form_input name="news_status"}</td>
					<th></th>
					<td>{form_submit value="　検　索　"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			{form action="$script" ethna_action="admin_news_list"}
			<table class="sheet">
				<tr>
					<th nowrap>ID</th>
					<th nowrap>ステータス</th>
					<th nowrap>投稿先</th>
					<th nowrap>タイトル</th>
					<th nowrap>本文</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				<tr>
					<td>{$item.news_id}</td>
					<td {if $item.news_status==0}class="disable"{/if}>{$config.regist_status[$item.news_status].name}</td>
					<td>{$item.news_type_name}</td>
					<td><a href="?action_admin_news_edit=true&news_id={$item.news_id}">{$item.news_title}</a></td>
					<td>{$item.news_body|nl2br}</td>
					<td><a href="?action_admin_news_edit=true&news_id={$item.news_id}">編集</a></td>
					<td><a href="?action_admin_news_delete_do=true&news_id={$item.news_id}" onClick="return confirm('本当にこの{$ft.news.name}を削除してもよろしいですか？');">削除</a></td>
				</tr>
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
