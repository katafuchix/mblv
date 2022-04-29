{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.segment.name}登録</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_segment_add_do"}
			{uniqid}
			<table class="sheet">
				<tr>
					<th>{form_name name="segment_name"}</th>
					<td>{form_input name="segment_name"}</td>
				</tr>
				<tr>
					<th>
						{form_name name="user_carrier_status"}：<br />
						{form_input name="user_carrier_status"}
					</th>
					<td>
						{form_input name="user_carrier"}
					</td>
				</tr>
				<tr>
					<th>
						{form_name name="user_point_status"}：<br />
						{form_input name="user_point_status"}
					</th>
					<td>
						{form_input name="user_point_min" size="8"}{$ft.point.name}〜{form_input name="user_point_max" size="8"}{$ft.point.name}
					</td>
				</tr>
				<tr>
					<th>
						{form_name name="user_age_status"}：<br />
						{form_input name="user_age_status"}
					</th>
					<td>
						{form_input name="user_age_min" size="4"}才〜{form_input name="user_age_max" size="4"}才
					</td>
				</tr>
				<tr>
					<th>
						{form_name name="user_sex_status"}：<br />
						{form_input name="user_sex_status"}
					</th>
					<td>
						{form_input name="user_sex"}
					</td>
				</tr>
				<tr>
					<th>
						{form_name name="prefecture_id_status"}：<br />
						{form_input name="prefecture_id_status"}
					</th>
					<td>
						{form_input name="prefecture_id"}
					</td>
				</tr>
				<tr>
					<th>
						{form_name name="job_family_id_status"}：<br />
						{form_input name="job_family_id_status"}
					</th>
					<td>
						{form_input name="job_family_id"}
					</td>
				</tr>
				<tr>
					<th>
						{form_name name="business_category_id_status"}：<br />
						{form_input name="business_category_id_status"}
					</th>
					<td>
						{form_input name="business_category_id"}
					</td>
				</tr>
				<tr>
					<th>
						{form_name name="user_is_married_status"}：<br />
						{form_input name="user_is_married_status"}
					</th>
					<td>
						{form_input name="user_is_married"}
					</td>
				</tr>
				<tr>
					<th>
						{form_name name="user_has_children_status"}：<br />
						{form_input name="user_has_children_status"}
					</th>
					<td>
						{form_input name="user_has_children"}
					</td>
				</tr>
				<tr>
					<th>
						{form_name name="user_blood_type_status"}：<br />
						{form_input name="user_blood_type_status"}
					</th>
					<td>
						{form_input name="user_blood_type"}
					</td>
				</tr>
				<tr>
					<th>
						{form_name name="work_location_prefecture_id_status"}：<br />
						{form_input name="work_location_prefecture_id_status"}
					</th>
					<td>
						{form_input name="work_location_prefecture_id"}
					</td>
				</tr>
				<tr>
					<th>
						{form_name name="user_created_status"}：<br />
						{form_input name="user_created_status"}
					</th>
					<td>
						{form_input name="user_created_year_start" emptyoption=""}年
						{form_input name="user_created_month_start" emptyoption=""}月
						{form_input name="user_created_day_start" emptyoption=""}日
						〜
						{form_input name="user_created_year_end" emptyoption=""}年
						{form_input name="user_created_month_end" emptyoption=""}月
						{form_input name="user_created_day_end" emptyoption=""}日
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
						{form_submit value="`$ft.segment.name`登録"}
					</td>
				</tr>
			</table>
			{/form}
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}

