{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.postage.name}管理</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_postage_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.postage.name}管理FAQ</a></blockquote>
			<!-- ここからメインコンテンツ-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{form action="$script" ethna_action="admin_ec_postage_add"}
				{$ft.menu_icon.name}{$ft.postage.name}登録
				{form_input name="postage_type"}
				{form_input name="postage_add"}
				{/form}
				
				{if $app.listview_total == 0}
					検索条件に合致する{$ft.postage.name}は見つかりませんでした。
				{else}
					検索条件に合致する{$ft.postage.name}が{$app.listview_total}件見つかりました。<br />
				{/if}
			</div>
			{form ethna_action="admin_ec_postage_list"}
			<table class="sheet">
				<tr>
					<th>登録期間</th>
					<td {if $app.postage_created_active}class="active"{/if} nowrap>
						{form_input name="postage_created_year_start" emptyoption=""}年
						{form_input name="postage_created_month_start" emptyoption=""}月
						{form_input name="postage_created_day_start" emptyoption=""}日
						〜
						{form_input name="postage_created_year_end" emptyoption=""}年
						{form_input name="postage_created_month_end" emptyoption=""}月
						{form_input name="postage_created_day_end" emptyoption=""}日
					</td>
					<th style="width:20%">{form_name name="postage_id"}</th>
					<td {if $app.postage_id_active}class="active"{/if}>{form_input name="postage_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.postage_updated_active}class="active"{/if} nowrap>
						{form_input name="postage_updated_year_start" emptyoption=""}年
						{form_input name="postage_updated_month_start" emptyoption=""}月
						{form_input name="postage_updated_day_start" emptyoption=""}日
						〜
						{form_input name="postage_updated_year_end" emptyoption=""}年
						{form_input name="postage_updated_month_end" emptyoption=""}月
						{form_input name="postage_updated_day_end" emptyoption=""}日
					</td>
					<th style="width:20%">{form_name name="postage_name"}</th>
					<td {if $app.postage_name_active}class="active"{/if}>{form_input name="postage_name"}</td>
				</tr>
				<!--
				<tr>
					<th>削除期間</th>
					<td {if $app.postage_deleted_active}class="active"{/if} nowrap>
						{form_input name="postage_deleted_year_start" emptyoption=""}年
						{form_input name="postage_deleted_month_start" emptyoption=""}月
						{form_input name="postage_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="postage_deleted_year_end" emptyoption=""}年
						{form_input name="postage_deleted_month_end" emptyoption=""}月
						{form_input name="postage_deleted_day_end" emptyoption=""}日
					</td>
					<th style="width:20%"></th>
					<td></td>
				</tr>
				-->
				<tr>
					<th>{form_name name="postage_status"}</th>
					<td {if $app.postage_status_active}class="active"{/if}>
						{form_input name="postage_status"}
					</td>
					<th></th>
					<td>{form_input name="search"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{form_name name="postage_id"}</th>
					<th nowrap>{form_name name="postage_status"}</th>
					<th nowrap>
						登録日時<br />
						更新日時<br />
					</th>
					<th nowrap>{form_name name="postage_name"}</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				{if $item != false}
				<tr>
					<td>{$item.postage_id}</td>
					<td {if $item.postage_status==0}class="disable"{/if}>{$config.regist_status[$item.postage_status].name}</td>
					<td nowrap>
						[登録]:{$item.postage_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[更新]:{$item.postage_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
					</td>
					<td>{$item.postage_name}</td>
					<td><a href="?action_admin_ec_postage_edit=true&postage_id={$item.postage_id}">編集</a></td>
					<td><a href="?action_admin_ec_postage_delete_do=true&postage_id={$item.postage_id}" onClick="return confirm('本当にこの送料設定を削除してもよろしいですか？');">削除</a></td>
				</tr>
				{/if}
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
