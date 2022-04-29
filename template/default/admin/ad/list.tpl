{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>
			{php}
			 $ac = $this->_tpl_vars['app']['ac'];
			{/php}
			{if $form.ad_category_id}
				{php}
						echo $ac[$this->_tpl_vars['form']['ad_category_id']]['name'];
				{/php}
			{/if}
				{$ft.ad.name}管理
			</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_ad_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.ad.name}管理FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_adcode_list=true">{$ft.ad.name}ASP管理</a>
				{$ft.menu_icon.name}<a href="?action_admin_config_edit=true&site_type=ad">{$ft.ad.name}基本設定</a>
				{$ft.menu_icon.name}<a href="?action_admin_adcategory_list=true">{$ft.ad_category.name}管理</a>
				{$ft.menu_icon.name}<a href="?action_admin_ad_add=true&ad_category_id={$form.ad_category_id}">{$ft.ad.name}登録</a><br />
				
				{if $app.listview_total == 0}
					検索条件に合致する{$ft.ad.name}は見つかりませんでした。
				{else}
					検索条件に合致する{$ft.ad.name}が{$app.listview_total}件見つかりました。
				{/if}
			</div>
			{form action="$script" ethna_action="admin_ad_list"}
			<table class="sheet">
				<tr>
					<th>作成期間</th>
					<td {if $app.ad_created_active}class="active"{/if} nowrap>
						{form_input name="ad_created_year_start" emptyoption=""}年
						{form_input name="ad_created_month_start" emptyoption=""}月
						{form_input name="ad_created_day_start" emptyoption=""}日
						〜
						{form_input name="ad_created_year_end" emptyoption=""}年
						{form_input name="ad_created_month_end" emptyoption=""}月
						{form_input name="ad_created_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="ad_id"}</th>
					<td {if $app.ad_id_active}class="active"{/if}>{form_input name="ad_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.ad_updated_active}class="active"{/if} nowrap>
						{form_input name="ad_updated_year_start" emptyoption=""}年
						{form_input name="ad_updated_month_start" emptyoption=""}月
						{form_input name="ad_updated_day_start" emptyoption=""}日
						〜
						{form_input name="ad_updated_year_end" emptyoption=""}年
						{form_input name="ad_updated_month_end" emptyoption=""}月
						{form_input name="ad_updated_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="ad_name"}</th>
					<td {if $app.ad_name_active}class="active"{/if}>{form_input name="ad_name"}</td>
				</tr>
				<tr>
					<th>削除期間</th>
					<td {if $app.ad_deleted_active}class="active"{/if} nowrap>
						{form_input name="ad_deleted_year_start" emptyoption=""}年
						{form_input name="ad_deleted_month_start" emptyoption=""}月
						{form_input name="ad_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="ad_deleted_year_end" emptyoption=""}年
						{form_input name="ad_deleted_month_end" emptyoption=""}月
						{form_input name="ad_deleted_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="ad_desc"}</th>
					<td {if $app.ad_desc_active}class="active"{/if}>{form_input name="ad_desc"}</td>
				</tr>
				<tr>
					<th>配信開始期間</th>
					<td {if $app.ad_start_active}class="active"{/if} nowrap>
						{form_input name="ad_start_year_start" emptyoption=""}年
						{form_input name="ad_start_month_start" emptyoption=""}月
						{form_input name="ad_start_day_start" emptyoption=""}日
						〜
						{form_input name="ad_start_year_end" emptyoption=""}年
						{form_input name="ad_start_month_end" emptyoption=""}月
						{form_input name="ad_start_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="ad_start_status"}</th>
					<td {if $app.ad_start_status_active}class="active"{/if}>{form_input name="ad_start_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>配信終了期間</th>
					<td {if $app.ad_end_active}class="active"{/if} nowrap>
						{form_input name="ad_end_year_start" emptyoption=""}年
						{form_input name="ad_end_month_start" emptyoption=""}月
						{form_input name="ad_end_day_start" emptyoption=""}日
						〜
						{form_input name="ad_end_year_end" emptyoption=""}年
						{form_input name="ad_end_month_end" emptyoption=""}月
						{form_input name="ad_end_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="ad_end_status"}</th>
					<td {if $app.ad_end_status_active}class="active"{/if}>{form_input name="ad_end_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_stock_num"}</th>
					<td {if $app.ad_stock_num_active}class="active"{/if}>{form_input name="ad_stock_num" emptyoption=""}</td>
					<th>{form_name name="ad_stock_status"}</th>
					<td {if $app.ad_stock_status_active}class="active"{/if}>{form_input name="ad_stock_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_category_id"}</th>
					<td {if $app.ad_category_id_active}class="active"{/if}>{form_input name="ad_category_id" emptyoption=""}</td>
					<th>{form_name name="ad_status"}</th>
					<td {if $app.ad_status_active}class="active"{/if}>{form_input name="ad_status"}</td>
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
					<th>ID</th>
					<th>ステータス</th>
					<th nowrap>{$ft.ad_name.name}</th>
					<th nowrap>{$ft.ad_category_name.name}</th>
					<th nowrap>{$ft.ad_image.name}</th>
					<th>{$ft.banner.name}タグ</th>
					<th>リンク先URL</th>
					<th nowrap>解析</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.ad_id}</td>
					<td {if $i.ad_status==0}class="disable"{/if}>{$config.regist_status[$i.ad_status].name}</td>
					<td>{$i.ad_name}</td>
					<td>{$i.ad_category_name}</td>
					<td>{if $i.ad_image}<img src="f.php?file=ad/{$i.ad_image}">{/if}</td>
					<td nowrap>{literal}{ad id={/literal}{$i.ad_id}{literal}}{/literal}</td>
					<td nowrap><input type="text" value="ad.php?ad_id={$i.ad_id}" size="55"></td>
					<td><a href="?action_admin_stats_list=true&type=ad&id={$i.ad_id}&term=month">解析</a></td>
					<td><a href="?action_admin_ad_edit=true&ad_id={$i.ad_id}">編集</a></td>
					<td><a href="?action_admin_ad_delete_do=true&ad_id={$i.ad_id}&ad_category_id={$form.ad_category_id}" onClick="return confirm('本当にこの{$ft.ad.name}を削除してしまってもよろしいですか？');">削除</a></td>
				</tr>
				{/foreach}
			</table>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
