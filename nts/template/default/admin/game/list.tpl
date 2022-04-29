{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>
			{php}
			 $gc = $this->_tpl_vars['app']['gc'];
			{/php}
			{if $form.game_category_id}
				{php}
						echo $gc[$this->_tpl_vars['form']['game_category_id']]['name'];
				{/php}
							>
			{/if}
				{$ft.game.name}一覧
			</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_cms_edit=true&cms_type=4">{$ft.game.name}ポータルCMS</a>
			{$ft.menu_icon.name}<a href="?action_admin_gamecategory_list=true">{$ft.game_category.name}管理</a>
			{$ft.menu_icon.name}<a href="?action_admin_game_add=true">{$ft.game.name}新規登録</a><br />
			
			{form action="$script" ethna_action="admin_game_list"}
			<table class="sheet">
				<tr>
					<th>作成期間</th>
					<td {if $app.game_created_active}class="active"{/if} nowrap>
						{form_input name="game_created_year_start" emptyoption=""}年
						{form_input name="game_created_month_start" emptyoption=""}月
						{form_input name="game_created_day_start" emptyoption=""}日
						〜
						{form_input name="game_created_year_end" emptyoption=""}年
						{form_input name="game_created_month_end" emptyoption=""}月
						{form_input name="game_created_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="game_id"}</th>
					<td {if $app.game_id_active}class="active"{/if}>{form_input name="game_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.game_updated_active}class="active"{/if} nowrap>
						{form_input name="game_updated_year_start" emptyoption=""}年
						{form_input name="game_updated_month_start" emptyoption=""}月
						{form_input name="game_updated_day_start" emptyoption=""}日
						〜
						{form_input name="game_updated_year_end" emptyoption=""}年
						{form_input name="game_updated_month_end" emptyoption=""}月
						{form_input name="game_updated_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="game_name"}</th>
					<td {if $app.game_name_active}class="active"{/if}>{form_input name="game_name"}</td>
				</tr>
				<tr>
					<th>削除期間</th>
					<td {if $app.game_deleted_active}class="active"{/if} nowrap>
						{form_input name="game_deleted_year_start" emptyoption=""}年
						{form_input name="game_deleted_month_start" emptyoption=""}月
						{form_input name="game_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="game_deleted_year_end" emptyoption=""}年
						{form_input name="game_deleted_month_end" emptyoption=""}月
						{form_input name="game_deleted_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="game_desc"}</th>
					<td {if $app.game_desc_active}class="active"{/if}>{form_input name="game_desc"}</td>
				</tr>
				<tr>
					<th>配信開始期間</th>
					<td {if $app.game_start_active}class="active"{/if} nowrap>
						{form_input name="game_start_year_start" emptyoption=""}年
						{form_input name="game_start_month_start" emptyoption=""}月
						{form_input name="game_start_day_start" emptyoption=""}日
						〜
						{form_input name="game_start_year_end" emptyoption=""}年
						{form_input name="game_start_month_end" emptyoption=""}月
						{form_input name="game_start_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="game_start_status"}</th>
					<td {if $app.game_start_status_active}class="active"{/if}>{form_input name="game_start_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>配信開始期間</th>
					<td {if $app.game_end_active}class="active"{/if} nowrap>
						{form_input name="game_end_year_start" emptyoption=""}年
						{form_input name="game_end_month_start" emptyoption=""}月
						{form_input name="game_end_day_start" emptyoption=""}日
						〜
						{form_input name="game_end_year_end" emptyoption=""}年
						{form_input name="game_end_month_end" emptyoption=""}月
						{form_input name="game_end_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="game_end_status"}</th>
					<td {if $app.game_end_status_active}class="active"{/if}>{form_input name="game_end_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="game_stock_num"}</th>
					<td {if $app.game_stock_num_active}class="active"{/if}>{form_input name="game_stock_num" emptyoption=""}</td>
					<th>{form_name name="game_stock_status"}</th>
					<td {if $app.game_stock_status_active}class="active"{/if}>{form_input name="game_stock_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="game_category_id"}</th>
					<td {if $app.game_category_id_active}class="active"{/if}>{form_input name="game_category_id" emptyoption=""}</td>
					<th>{form_name name="game_status"}</th>
					<td {if $app.game_status_active}class="active"{/if}>{form_input name="game_status" emptyoption=""}</td>
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
					<th nowrap>{$ft.game.name}名</th>
					<th nowrap>{$ft.game_category_name.name}</th>
					<!--th nowrap>{$ft.game_image.name}</th-->
					<th nowrap>解析</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.game_id}</td>
					<td {if $i.game_status==0}class="disable"{/if}>{$config.regist_status[$i.game_status].name}</td>
					<td>{$i.game_name}</td>
					<td>{php} echo $gc[$this->_tpl_vars['i']['game_category_id']]['name'];{/php}</td>
					<!--td><img src="f.php?file=game/{$i.game_image}"></td-->
					<td><a href="?action_admin_stats_list=true&type=game&id={$i.game_id}&term=month">解析</a></td>
					<td><a href="?action_admin_game_edit=true&game_id={$i.game_id}">編集</a></td>
					<td><a href="?action_admin_game_delete_do=true&game_id={$i.game_id}&game_category_id={$form.game_category_id}" onClick="return confirm('本当にこの{$ft.game.name}を削除してもよろしいですか？');">削除</a></td>
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
