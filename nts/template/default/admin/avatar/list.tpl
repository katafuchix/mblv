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
			{if $form.avatar_category_id}
				{php}
						echo $ac[$this->_tpl_vars['form']['avatar_category_id']]['name'];
				{/php}
							{*$app.avatar_category_name*}>
			{/if}
				アバター一覧
			</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_cms_edit=true&cms_type=2">{$ft.avatar.name}ポータルCMS</a>
			{$ft.menu_icon.name}<a href="?action_admin_avatarcategory_list=true">{$ft.avatar_category.name}管理</a>
			{$ft.menu_icon.name}<a href="?action_admin_avatarstand_list=true">{$ft.avatar.name}台座管理</a>
			{$ft.menu_icon.name}<a href="?action_admin_avatar_add=true">{$ft.avatar.name}新規登録</a><br /><br />
			
			{if $app.listview_total == 0}
				検索条件に合致する{$ft.avatar.name}は見つかりませんでした。
			{else}
				検索条件に合致する{$ft.avatar.name}が{$app.listview_total}件見つかりました。
			{/if}
			
			{form action="$script" ethna_action="admin_avatar_list"}
			<table class="sheet">
				<tr>
					<th>作成期間</th>
					<td {if $app.avatar_created_active}class="active"{/if} nowrap>
						{form_input name="avatar_created_year_start" emptyoption=""}年
						{form_input name="avatar_created_month_start" emptyoption=""}月
						{form_input name="avatar_created_day_start" emptyoption=""}日
						〜
						{form_input name="avatar_created_year_end" emptyoption=""}年
						{form_input name="avatar_created_month_end" emptyoption=""}月
						{form_input name="avatar_created_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="avatar_id"}</th>
					<td {if $app.avatar_id_active}class="active"{/if}>{form_input name="avatar_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.avatar_updated_active}class="active"{/if} nowrap>
						{form_input name="avatar_updated_year_start" emptyoption=""}年
						{form_input name="avatar_updated_month_start" emptyoption=""}月
						{form_input name="avatar_updated_day_start" emptyoption=""}日
						〜
						{form_input name="avatar_updated_year_end" emptyoption=""}年
						{form_input name="avatar_updated_month_end" emptyoption=""}月
						{form_input name="avatar_updated_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="avatar_name"}</th>
					<td {if $app.avatar_name_active}class="active"{/if}>{form_input name="avatar_name"}</td>
				</tr>
				<tr>
					<th>削除期間</th>
					<td {if $app.avatar_deleted_active}class="active"{/if} nowrap>
						{form_input name="avatar_deleted_year_start" emptyoption=""}年
						{form_input name="avatar_deleted_month_start" emptyoption=""}月
						{form_input name="avatar_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="avatar_deleted_year_end" emptyoption=""}年
						{form_input name="avatar_deleted_month_end" emptyoption=""}月
						{form_input name="avatar_deleted_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="avatar_desc"}</th>
					<td {if $app.avatar_desc_active}class="active"{/if}>{form_input name="avatar_desc"}</td>
				</tr>
				<tr>
					<th>配信開始期間</th>
					<td {if $app.avatar_start_active}class="active"{/if} nowrap>
						{form_input name="avatar_start_year_start" emptyoption=""}年
						{form_input name="avatar_start_month_start" emptyoption=""}月
						{form_input name="avatar_start_day_start" emptyoption=""}日
						〜
						{form_input name="avatar_start_year_end" emptyoption=""}年
						{form_input name="avatar_start_month_end" emptyoption=""}月
						{form_input name="avatar_start_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="avatar_start_status"}</th>
					<td {if $app.avatar_start_status_active}class="active"{/if}>{form_input name="avatar_start_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>配信終了期間</th>
					<td {if $app.avatar_end_active}class="active"{/if} nowrap>
						{form_input name="avatar_end_year_start" emptyoption=""}年
						{form_input name="avatar_end_month_start" emptyoption=""}月
						{form_input name="avatar_end_day_start" emptyoption=""}日
						〜
						{form_input name="avatar_end_year_end" emptyoption=""}年
						{form_input name="avatar_end_month_end" emptyoption=""}月
						{form_input name="avatar_end_day_end" emptyoption=""}日
					</td>
					<th>{form_name name="avatar_end_status"}</th>
					<td {if $app.avatar_end_status_active}class="active"{/if}>{form_input name="avatar_end_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stock_num"}</th>
					<td {if $app.avatar_stock_num_active}class="active"{/if}>{form_input name="avatar_stock_num" emptyoption=""}</td>
					<th>{form_name name="avatar_stock_status"}</th>
					<td {if $app.avatar_stock_status_active}class="active"{/if}>{form_input name="avatar_stock_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_category_id"}</th>
					<td {if $app.avatar_category_id_active}class="active"{/if}>{form_input name="avatar_category_id" emptyoption=""}</td>
					<th>{form_name name="avatar_status"}</th>
					<td {if $app.avatar_status_active}class="active"{/if}>{form_input name="avatar_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_z"}</th>
					<td {if $app.avatar_z_active}class="active"{/if}>{form_input name="avatar_z"}</td>
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
					<th nowrap>{$ft.avatar_name.name}</th>
					<th nowrap>{$ft.avatar_category_name.name}</th>
					<th nowrap>{$ft.avatar.name}アバターシステムカテゴリ名</th>
					<th nowrap>アバターZ座標</th>
					<th nowrap>{$ft.preset_avatar.name}</th>
					<th nowrap>{$ft.default_avatar.name}</th>
					<th nowrap>{$ft.first_avatar.name}</th>
					<!--th nowrap>アバター画像1</th>
					<th nowrap>アバター画像1</th-->
					<th nowrap>アバター画像</th>
					<th nowrap>解析</th>
					<th nowrap>アバター編集</th>
					<th nowrap>アバター削除</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.avatar_id}</td>
					<td {if $i.avatar_status==0}class="disable"{/if}>{$config.regist_status[$i.avatar_status].name}</td>
					<td>{$i.avatar_name}</td>
					<td>{$i.avatar_category_name}</td>
					<td>{$config.avatar_system[$i.avatar_system_category_id].name}</td>
					<td>{if $i.avatar_image1_desc && $i.avatar_status==1}画像1:z{$i.avatar_image1_z}{/if}{if $i.avatar_image2_desc && $i.avatar_status==1}|画像2:z{$i.avatar_image2_z}{/if}</td>
					<td>{if $i.preset_avatar==1}はい{else}いいえ{/if}</td>
					<td>{if $i.default_avatar==1}はい{else}いいえ{/if}</td>
					<td>{if $i.first_avatar==1}はい{else}いいえ{/if}</td>
					<!--td>{if $i.avatar_image1 && $i.avatar_status==1}<img src="f.php?file=avatar/{$i.avatar_image1}">{/if}</td>
					<td>{if $i.avatar_image2 && $i.avatar_status==1}<img src="f.php?file=avatar/{$i.avatar_image2}">{/if}</td-->
					<td>{if $i.avatar_status==1}<img src="?action_user_file_avatar_view=true&avatar_id={$i.avatar_id}&width={$config.avatar_t_width}&height={$config.avatar_t_height}">{/if}</td>
					<td><a href="?action_admin_stats_list=true&type=avatar&id={$i.avatar_id}&term=month">解析</a></td>
					<td><a href="?action_admin_avatar_edit=true&avatar_id={$i.avatar_id}">編集</a></td>
					<td><a href="?action_admin_avatar_delete_do=true&avatar_id={$i.avatar_id}&avatar_category_id={$form.avatar_category_id}" onClick="return confirm('本当にこのアバターを削除してもよろしいですか？');">削除</a></td>
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
