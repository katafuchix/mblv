{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>
			{php}
			 $sc = $this->_tpl_vars['app']['sc'];
			{/php}
			{if $form.sound_category_id}
				{php}
						echo $sc[$this->_tpl_vars['form']['sound_category_id']]['name'];
				{/php}
							>
			{/if}
				{$ft.sound.name}一覧
			</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_cms_edit=true&cms_type=5">{$ft.sound.name}ポータルCMS</a>
			{$ft.menu_icon.name}<a href="?action_admin_soundcategory_list=true">{$ft.sound_category.name}管理</a>
			{$ft.menu_icon.name}<a href="?action_admin_sound_add=true">{$ft.sound.name}新規登録</a><br />
			{form action="$script" ethna_action="admin_sound_list"}
			<table class="sheet">
				<tr>
					<th>作成期間</th>
					<td {if $app.sound_created_active}class="active"{/if} nowrap>
						{form_input name="sound_created_year_start" emptyoption=""}年
						{form_input name="sound_created_month_start" emptyoption=""}月
						{form_input name="sound_created_day_start" emptyoption=""}日
						〜
						{form_input name="sound_created_year_end" emptyoption=""}年
						{form_input name="sound_created_month_end" emptyoption=""}月
						{form_input name="sound_created_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="sound_id"}</th>
					<td {if $app.sound_id_active}class="active"{/if}>{form_input name="sound_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.sound_updated_active}class="active"{/if} nowrap>
						{form_input name="sound_updated_year_start" emptyoption=""}年
						{form_input name="sound_updated_month_start" emptyoption=""}月
						{form_input name="sound_updated_day_start" emptyoption=""}日
						〜
						{form_input name="sound_updated_year_end" emptyoption=""}年
						{form_input name="sound_updated_month_end" emptyoption=""}月
						{form_input name="sound_updated_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="sound_name"}</th>
					<td {if $app.sound_name_active}class="active"{/if}>{form_input name="sound_name"}</td>
				</tr>
				<tr>
					<th>削除期間</th>
					<td {if $app.sound_deleted_active}class="active"{/if} nowrap>
						{form_input name="sound_deleted_year_start" emptyoption=""}年
						{form_input name="sound_deleted_month_start" emptyoption=""}月
						{form_input name="sound_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="sound_deleted_year_end" emptyoption=""}年
						{form_input name="sound_deleted_month_end" emptyoption=""}月
						{form_input name="sound_deleted_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="sound_desc"}</th>
					<td {if $app.sound_desc_active}class="active"{/if}>{form_input name="sound_desc"}</td>
				</tr>
				<tr>
					<th>配信開始期間</th>
					<td {if $app.sound_start_active}class="active"{/if} nowrap>
						{form_input name="sound_start_year_start" emptyoption=""}年
						{form_input name="sound_start_month_start" emptyoption=""}月
						{form_input name="sound_start_day_start" emptyoption=""}日
						〜
						{form_input name="sound_start_year_end" emptyoption=""}年
						{form_input name="sound_start_month_end" emptyoption=""}月
						{form_input name="sound_start_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="sound_start_status"}</th>
					<td {if $app.sound_start_status_active}class="active"{/if}>{form_input name="sound_start_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>配信終了期間</th>
					<td {if $app.sound_end_active}class="active"{/if} nowrap>
						{form_input name="sound_end_year_start" emptyoption=""}年
						{form_input name="sound_end_month_start" emptyoption=""}月
						{form_input name="sound_end_day_start" emptyoption=""}日
						〜
						{form_input name="sound_end_year_end" emptyoption=""}年
						{form_input name="sound_end_month_end" emptyoption=""}月
						{form_input name="sound_end_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="sound_end_status"}</th>
					<td {if $app.sound_end_status_active}class="active"{/if}>{form_input name="sound_end_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="sound_stock_num"}</th>
					<td {if $app.sound_stock_num_active}class="active"{/if}>{form_input name="sound_stock_num" emptyoption=""}</td>
					<th>{form_name name="sound_stock_status"}</th>
					<td {if $app.sound_stock_status_active}class="active"{/if}>{form_input name="sound_stock_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="sound_category_id"}</th>
					<td {if $app.sound_category_id_active}class="active"{/if}>{form_input name="sound_category_id" emptyoption=""}</td>
					<th>{form_name name="sound_status"}</th>
					<td {if $app.sound_status_active}class="active"{/if}>{form_input name="sound_status" emptyoption=""}</td>
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
					<th nowrap>{$ft.sound_name.name}</th>
					<th nowrap>{$ft.sound_category.name}</th>
					<!--th nowrap>{$ft.sound.name}画像</th-->
					<th nowrap>解析</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.sound_id}</td>
					<td {if $i.sound_status==0}class="disable"{/if}>{$config.regist_status[$i.sound_status].name}</td>
					<td>{$i.sound_name}</td>
					<!--td><img src="f.php?file=sound/{$i.sound_image}"></td-->
					<td>{php} echo $sc[$this->_tpl_vars['i']['sound_category_id']]['name'];{/php}</td>
					<td><a href="?action_admin_stats_list=true&type=sound&id={$i.sound_id}&term=month">解析</a></td>
					<td><a href="?action_admin_sound_edit=true&sound_id={$i.sound_id}">編集</a></td>
					<td><a href="?action_admin_sound_delete_do=true&sound_id={$i.sound_id}&sound_category_id={$form.sound_category_id}" onClick="return confirm('本当にこの{$ft.sound.name}を削除してもよろしいですか？');">削除</a></td>
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
