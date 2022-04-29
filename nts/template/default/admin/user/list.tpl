{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.user.name}検索</h2>
			<!-- ここからメインコンテンツ-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{if $app.listview_total == 0}
				検索条件に合致する{$ft.user.name}は見つかりませんでした。
			{else}
				検索条件に合致する{$ft.user.name}が{$app.listview_total}人見つかりました。<br />
			{/if}
			{form ethna_action="admin_user_list"}
			<table class="sheet">
				<tr>
					<th>登録期間</th>
					<td {if $app.user_created_active}class="active"{/if} nowrap>
						{form_input name="user_created_year_start" emptyoption=""}年
						{form_input name="user_created_month_start" emptyoption=""}月
						{form_input name="user_created_day_start" emptyoption=""}日
						〜
						{form_input name="user_created_year_end" emptyoption=""}年
						{form_input name="user_created_month_end" emptyoption=""}月
						{form_input name="user_created_day_end" emptyoption=""}日
					</td>
					<th style="width:20%">{form_name name="user_id"}</th>
					<td {if $app.user_id_active}class="active"{/if}>{form_input name="user_id"}</td>
				</tr>
				<tr>
					<th>更新期間</th>
					<td {if $app.user_updated_active}class="active"{/if} nowrap>
						{form_input name="user_updated_year_start" emptyoption=""}年
						{form_input name="user_updated_month_start" emptyoption=""}月
						{form_input name="user_updated_day_start" emptyoption=""}日
						〜
						{form_input name="user_updated_year_end" emptyoption=""}年
						{form_input name="user_updated_month_end" emptyoption=""}月
						{form_input name="user_updated_day_end" emptyoption=""}日
					</td>
					<th style="width:20%">{form_name name="user_nickname"}</th>
					<td {if $app.user_nickname_active}class="active"{/if}>{form_input name="user_nickname"}さん</td>
				</tr>
				<tr>
					<th>退会期間</th>
					<td {if $app.user_deleted_active}class="active"{/if} nowrap>
						{form_input name="user_deleted_year_start" emptyoption=""}年
						{form_input name="user_deleted_month_start" emptyoption=""}月
						{form_input name="user_deleted_day_start" emptyoption=""}日
						〜
						{form_input name="user_deleted_year_end" emptyoption=""}年
						{form_input name="user_deleted_month_end" emptyoption=""}月
						{form_input name="user_deleted_day_end" emptyoption=""}日
					</td>
					<th style="width:20%">{form_name name="user_mailaddress"}</th>
					<td {if $app.user_mailaddress_active}class="active"{/if}>{form_input name="user_mailaddress"}</td>
				</tr>
				<tr>
					{if $config.profile.user_birth_date}
					<th>年齢</th>
					<td {if $app.user_age_active}class="active"{/if}>{form_input name="user_age_min" size="4"}歳〜{form_input name="user_age_max" size="4"}歳</td>
					{/if}
					{if $config.profile.user_sex}
					<th>{form_name name="user_sex"}</th>
					<td {if $app.user_sex_active}class="active"{/if}>{form_input name="user_sex"}</td>
					{/if}
				</tr>
				<tr>
					<th>{form_name name="user_carrier"}</th>
					<td {if $app.user_carrier_active || $app.user_device_active}class="active"{/if}>
							{form_input name="user_carrier" emptyoption="" } &nbsp;&nbsp;&nbsp;
							{form_name name="user_device"}&nbsp;{form_input name="user_device"}</td>
					<th>{form_name name="media_id"}</th>
					<td {if $app.media_id_active}class="active"{/if}>{form_input name="media_id" emptyoption="" }</td>
				</tr>
				<tr>
					{if $config.profile.prefecture_id}
					<th rowspan="2">{form_name name="prefecture_id"}</th>
					<td rowspan="2" {if $app.prefecture_id_active}class="active"{/if}>{form_input name="prefecture_id"}</td>
					{/if}
					{if $config.profile.user_address}
					<th>{form_name name="user_address"}</th>
					<td {if $app.user_address_active}class="active"{/if}>{form_input name="user_address" size="50"}</td>
					{/if}
				</tr>
				<tr>
					{if $config.profile.user_address_building}
					<th>{form_name name="user_address_building"}</th>
					<td {if $app.user_address_building_active}class="active"{/if}>{form_input name="user_address_building" size="50"}</td>
					{/if}
				</tr>
				<tr>
					{if $config.profile.user_blood_type}
					<th>{form_name name="user_blood_type"}</th>
					<td {if $app.user_blood_type_active}class="active"{/if}>{form_input name="user_blood_type"}</td>
					{/if}
					{if $config.profile.user_is_married}
					<th>{form_name name="user_is_married"}</th>
					<td {if $app.user_is_married_active}class="active"{/if}>{form_input name="user_is_married"}</td>
					{/if}
				</tr>
				<tr>
					{if $config.profile.work_location_prefecture_id}
					<th rowspan="2">{form_name name="work_location_prefecture_id"}</th>
					<td rowspan="2" {if $app.work_location_prefecture_id_active}class="active"{/if}>{form_input name="work_location_prefecture_id"}</td>
					{/if}
					{if $config.profile.job_family_id}
					<th>{form_name name="job_family_id"}</th>
					<td {if $app.job_family_id_active}class="active"{/if}>{form_input name="job_family_id"}</td>
					{/if}
				</tr>
				<tr>
					{if $config.profile.business_category_id}
					<th>{form_name name="business_category_id"}</th>
					<td {if $app.business_category_id_active}class="active"{/if}>{form_input name="business_category_id"}</td>
					{/if}
				</tr>
				<!--以下項目は表示画面領域を消費するので当面非表示とする-->
				<!--tr>
					<th>{form_name name="user_prof_keyword"}</th>
					<td {if $app.user_prof_keyword_active}class="active"{/if} colspan="3">{form_input name="user_prof_keyword"}</td>
				</tr-->
				<!--	{* foreach from=$app.configUserProfList item=item key=k *}
						{* if $item.config_user_prof_type >= 3}
							<tr>
								<th>{$item.config_user_prof_name}</th>
								<td colspan="3">
									{foreach from=$item.config_user_prof_option item=option}
										<input type="checkbox" name="user_prof_checkbox_{$k}[]" value="{$option.config_user_prof_option_id}" {if $app.is_checked[$option.config_user_prof_option_id]}checked{/if}>{$option.config_user_prof_option_name}
									{/foreach}
						{/if *}{* $item.config_user_prof_type >= 3 *}
					{* /foreach *}
				-->
				<tr>
					<th>{form_name name="user_status"}</th>
					<td {if $app.user_status_active}class="active"{/if}>{form_input name="user_status" emptyoption=""}</td>
					<th></th>
					<td>
						{form_submit value="　検　索　"}
						&nbsp;&nbsp;&nbsp;
						{form_input name="download" value="ダウンロード"}
					</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th>{$ft.user.name}ID</th>
					<th>ステータス</th>
					<th>
						登録日時<br />
						更新日時<br />
						退会日時
					</th>
					<th>メールアドレス</th>
					<th>ニックネーム</th>
					<th>エラーメール数</th>
				</tr>
				{foreach from=$app.listview_data item=item name=user}
				{if $item != false}
				<tr>
					<td>{$item.user_id}</td>
					<td>{$config.user_status[$item.user_status].name}</td>
					<td>
						[登録]:{$item.user_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[更新]:{$item.user_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[退会]:{$item.user_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
					</td>
					<td>{$item.user_mailaddress}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_nickname}さん</a></td>
					<td>{$item.user_magazine_error_num}</td>
				</tr>
				{/if}
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
