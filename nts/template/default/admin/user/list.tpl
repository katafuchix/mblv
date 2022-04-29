{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.user.name}����</h2>
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{if $app.listview_total == 0}
				�������˹��פ���{$ft.user.name}�ϸ��Ĥ���ޤ���Ǥ�����
			{else}
				�������˹��פ���{$ft.user.name}��{$app.listview_total}�͸��Ĥ���ޤ�����<br />
			{/if}
			{form ethna_action="admin_user_list"}
			<table class="sheet">
				<tr>
					<th>��Ͽ����</th>
					<td {if $app.user_created_active}class="active"{/if} nowrap>
						{form_input name="user_created_year_start" emptyoption=""}ǯ
						{form_input name="user_created_month_start" emptyoption=""}��
						{form_input name="user_created_day_start" emptyoption=""}��
						��
						{form_input name="user_created_year_end" emptyoption=""}ǯ
						{form_input name="user_created_month_end" emptyoption=""}��
						{form_input name="user_created_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="user_id"}</th>
					<td {if $app.user_id_active}class="active"{/if}>{form_input name="user_id"}</td>
				</tr>
				<tr>
					<th>��������</th>
					<td {if $app.user_updated_active}class="active"{/if} nowrap>
						{form_input name="user_updated_year_start" emptyoption=""}ǯ
						{form_input name="user_updated_month_start" emptyoption=""}��
						{form_input name="user_updated_day_start" emptyoption=""}��
						��
						{form_input name="user_updated_year_end" emptyoption=""}ǯ
						{form_input name="user_updated_month_end" emptyoption=""}��
						{form_input name="user_updated_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="user_nickname"}</th>
					<td {if $app.user_nickname_active}class="active"{/if}>{form_input name="user_nickname"}����</td>
				</tr>
				<tr>
					<th>������</th>
					<td {if $app.user_deleted_active}class="active"{/if} nowrap>
						{form_input name="user_deleted_year_start" emptyoption=""}ǯ
						{form_input name="user_deleted_month_start" emptyoption=""}��
						{form_input name="user_deleted_day_start" emptyoption=""}��
						��
						{form_input name="user_deleted_year_end" emptyoption=""}ǯ
						{form_input name="user_deleted_month_end" emptyoption=""}��
						{form_input name="user_deleted_day_end" emptyoption=""}��
					</td>
					<th style="width:20%">{form_name name="user_mailaddress"}</th>
					<td {if $app.user_mailaddress_active}class="active"{/if}>{form_input name="user_mailaddress"}</td>
				</tr>
				<tr>
					{if $config.profile.user_birth_date}
					<th>ǯ��</th>
					<td {if $app.user_age_active}class="active"{/if}>{form_input name="user_age_min" size="4"}�С�{form_input name="user_age_max" size="4"}��</td>
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
				<!--�ʲ����ܤ�ɽ�������ΰ����񤹤�Τ�������ɽ���Ȥ���-->
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
						{form_submit value="����������"}
						&nbsp;&nbsp;&nbsp;
						{form_input name="download" value="���������"}
					</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th>{$ft.user.name}ID</th>
					<th>���ơ�����</th>
					<th>
						��Ͽ����<br />
						��������<br />
						�������
					</th>
					<th>�᡼�륢�ɥ쥹</th>
					<th>�˥å��͡���</th>
					<th>���顼�᡼���</th>
				</tr>
				{foreach from=$app.listview_data item=item name=user}
				{if $item != false}
				<tr>
					<td>{$item.user_id}</td>
					<td>{$config.user_status[$item.user_status].name}</td>
					<td>
						[��Ͽ]:{$item.user_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[����]:{$item.user_updated_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}<br />
						[���]:{$item.user_deleted_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}
					</td>
					<td>{$item.user_mailaddress}</td>
					<td><a href="?action_admin_user_edit=true&user_id={$item.user_id}">{$item.user_nickname}����</a></td>
					<td>{$item.user_magazine_error_num}</td>
				</tr>
				{/if}
				{/foreach}
			</table>
			
			{include file="admin/pager.tpl"}
			
			<p id="pagetop"><a href="javascript:pagetop(0);">�ڡ����ȥå�</a></p>
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->
{include file="admin/footer.tpl"}
