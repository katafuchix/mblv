{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->

			<h2>
			{php}
			 $dc = $this->_tpl_vars['app']['dc'];
			{/php}
			{if $form.decomail_category_id}
				{php}
						echo $dc[$this->_tpl_vars['form']['decomail_category_id']]['name'];
				{/php}
							{*$app.decomail_category_name*}>
			{/if}
				
				{$ft.decomail.name}一覧
			</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_cms_edit=true&cms_type=3">{$ft.decomail.name}ポータルCMS</a>
			{$ft.menu_icon.name}<a href="?action_admin_decomailcategory_list=true">{$ft.decomail_category.name}管理</a>
			{$ft.menu_icon.name}<a href="?action_admin_decomail_add=true">{$ft.decomail.name}新規登録</a><br />

			{form action="$script" ethna_action="admin_decomail_list"}
			<table class="sheet">
				<tr>
					<th>作成期間</th>
					<td {if $app.decomail_created_active}class="active"{/if} nowrap>
						{form_input name="decomail_created_year_start" emptyoption=""}年
						{form_input name="decomail_created_month_start" emptyoption=""}月
						{form_input name="decomail_created_day_start" emptyoption=""}日
						〜
						{form_input name="decomail_created_year_end" emptyoption=""}年
						{form_input name="decomail_created_month_end" emptyoption=""}月
						{form_input name="decomail_created_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="decomail_id"}</th>
					<td {if $app.decomail_id_active}class="active"{/if}>{form_input name="decomail_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.decomail_updated_active}class="active"{/if} nowrap>
						{form_input name="decomail_updated_year_start" emptyoption=""}年
						{form_input name="decomail_updated_month_start" emptyoption=""}月
						{form_input name="decomail_updated_day_start" emptyoption=""}日
						〜
						{form_input name="decomail_updated_year_end" emptyoption=""}年
						{form_input name="decomail_updated_month_end" emptyoption=""}月
						{form_input name="decomail_updated_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="decomail_name"}</th>
					<td {if $app.decomail_name_active}class="active"{/if}>{form_input name="decomail_name"}</td>
				</tr>
				<tr>
					<th>削除期間</th>
					<td {if $app.decomail_deleted_active}class="active"{/if} nowrap>
						{form_input name="decomail_deleted_year_start" emptyoption=""}年
						{form_input name="decomail_deleted_month_start" emptyoption=""}月
						{form_input name="decomail_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="decomail_deleted_year_end" emptyoption=""}年
						{form_input name="decomail_deleted_month_end" emptyoption=""}月
						{form_input name="decomail_deleted_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="decomail_desc"}</th>
					<td {if $app.decomail_desc_active}class="active"{/if}>{form_input name="decomail_desc"}</td>
				</tr>
				<tr>
					<th>配信開始期間</th>
					<td {if $app.decomail_start_active}class="active"{/if} nowrap>
						{form_input name="decomail_start_year_start" emptyoption=""}年
						{form_input name="decomail_start_month_start" emptyoption=""}月
						{form_input name="decomail_start_day_start" emptyoption=""}日
						〜
						{form_input name="decomail_start_year_end" emptyoption=""}年
						{form_input name="decomail_start_month_end" emptyoption=""}月
						{form_input name="decomail_start_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="decomail_start_status"}</th>
					<td {if $app.decomail_start_status_active}class="active"{/if}>{form_input name="decomail_start_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>配信終了期間</th>
					<td {if $app.decomail_end_active}class="active"{/if} nowrap>
						{form_input name="decomail_end_year_start" emptyoption=""}年
						{form_input name="decomail_end_month_start" emptyoption=""}月
						{form_input name="decomail_end_day_start" emptyoption=""}日
						〜
						{form_input name="decomail_end_year_end" emptyoption=""}年
						{form_input name="decomail_end_month_end" emptyoption=""}月
						{form_input name="decomail_end_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="decomail_end_status"}</th>
					<td {if $app.decomail_end_status_active}class="active"{/if}>{form_input name="decomail_end_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="decomail_stock_num"}</th>
					<td {if $app.decomail_stock_num_active}class="active"{/if}>{form_input name="decomail_stock_num" emptyoption=""}</td>
					<th>{form_name name="decomail_stock_status"}</th>
					<td {if $app.decomail_stock_status_active}class="active"{/if}>{form_input name="decomail_stock_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="decomail_category_id"}</th>
					<td {if $app.decomail_category_id_active}class="active"{/if}>{form_input name="decomail_category_id" emptyoption=""}</td>
					<th>{form_name name="decomail_status"}</th>
					<td {if $app.decomail_status_active}class="active"{/if}>{form_input name="decomail_status" emptyoption=""}</td>
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
					<th nowrap>{$ft.decomail.name}名</th>
					<th nowrap>{$ft.decomail_category_name.name}</th>
					<!--th nowrap>{$ft.decomail.name}画像</th-->
					<th nowrap>解析</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.decomail_id}</td>
					<td {if $i.decomail_status==0}class="disable"{/if}>{$config.regist_status[$i.decomail_status].name}</td>
					<td>{$i.decomail_name}</td>
					<td>{php} echo $dc[$this->_tpl_vars['i']['decomail_category_id']]['name'];{/php}</td>
					<!--td><img src="f.php?file=decomail/{$i.decomail_image}"></td-->
					<td><a href="?action_admin_stats_list=true&type=decomail&id={$i.decomail_id}&term=month">解析</a></td>
					<td><a href="?action_admin_decomail_edit=true&decomail_id={$i.decomail_id}">編集</a></td>
					<td><a href="?action_admin_decomail_delete_do=true&decomail_id={$i.decomail_id}&decomail_category_id={$form.decomail_category_id}" onClick="return confirm('本当にこの{$ft.decomail.name}を削除してもよろしいですか？');">削除</a></td>
				</tr>
				{/foreach}
			</table>

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
