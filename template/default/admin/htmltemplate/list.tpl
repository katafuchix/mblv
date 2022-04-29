{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>{$ft.htmltemplate.name}管理</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_htmltemplate_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.htmltemplate.name}管理FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_htmltemplate_log=true">{$ft.htmltemplate.name}ログ</a><br />
				
				{if $app.listview_total == 0}
					検索条件に合致する{$ft.html_template.name}は見つかりませんでした。
				{else}
					検索条件に合致する{$ft.html_template.name}が{$app.listview_total}件見つかりました。
				{/if}
			</div>
			
			{form action="$script" ethna_action="admin_htmltemplate_list"}
			<table class="sheet">
				<tr>
					<th>最終更新開始期間</th>
					<td {if $app.html_template_edit_start_active}class="active"{/if} nowrap>
						{form_input name="html_template_edit_start_year_start" emptyoption=""}年
						{form_input name="html_template_edit_start_month_start" emptyoption=""}月
						{form_input name="html_template_edit_start_day_start" emptyoption=""}日
						〜
						{form_input name="html_template_edit_start_year_end" emptyoption=""}年
						{form_input name="html_template_edit_start_month_end" emptyoption=""}月
						{form_input name="html_template_edit_start_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="html_template_id"}</th>
					<td {if $app.html_template_id_active}class="active"{/if}>{form_input name="html_template_id"}</td>
				</tr>
				<tr>
					<th>最終更新終了期間</th>
					<td {if $app.html_template_edit_end_active}class="active"{/if} nowrap>
						{form_input name="html_template_edit_end_year_start" emptyoption=""}年
						{form_input name="html_template_edit_end_month_start" emptyoption=""}月
						{form_input name="html_template_edit_end_day_start" emptyoption=""}日
						〜
						{form_input name="html_template_edit_end_year_end" emptyoption=""}年
						{form_input name="html_template_edit_end_month_end" emptyoption=""}月
						{form_input name="html_template_edit_end_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="html_template_code"}</th>
					<td {if $app.html_template_code_active}class="active"{/if}>{form_input name="html_template_code"}</td>
				</tr>
				<tr>
					<th>{form_name name="html_template_edit"}</th>
					<td {if $app.html_template_edit_active}class="active"{/if}>{form_input name="html_template_edit" emptyoption=""}</td>
					<th></th>
					<td>{form_submit value="　検　索　"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			<table class="sheet">
				<tr>
					<th nowrap>{$ft.htmltemplate.name}ID</th>
					<!--th nowrap>{$ft.htmltemplate.name}名</th-->
					<th nowrap>{$ft.htmltemplate.name}コード</th>
					<th nowrap>編集ステータス</th>
					<th nowrap>
						[最終更新開始日時]<br />
						[最終更新終了日時]
					</th>
					<th nowrap>編集</th>
					<th nowrap>ログ</th>
					<!--th nowrap>削除</th-->
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.html_template_id}</td>
					<!--td>{$app.html_template[$i.html_template_code].name}</td-->
					<td>{$i.html_template_code}</td>
					<td>{$config.html_template_edit[$i.html_template_edit].name}</td>
					<td>
						{$i.html_template_edit_start_time|jp_date_format:"%Y/%m/%d(%a) %H:%M:%S"}<br />
						{$i.html_template_edit_end_time|jp_date_format:"%Y/%m/%d(%a) %H:%M:%S"}
					</td>
					<td><a href="?action_admin_htmltemplate_edit=true&html_template_id={$i.html_template_id}">編集</a></td>
					<td><a href="?action_admin_htmltemplate_log=true&html_template_id={$i.html_template_id}">ログ</a></td>
					<!--td>{if $i.html_template_system_status}<a href="?action_admin_htmltemplate_delete_do=true&html_template_id={$i.html_template_id}" onClick="return confirm('本当にこの{$ft.htmltemplate.name}を削除してもよろしいですか？');">削除</a>{/if}</td-->
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
