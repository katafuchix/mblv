{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.user.name}����</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_user_list&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.user.name}����FAQ</a></blockquote>
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{if $app.listview_total == 0}
					�������˹��פ���{$ft.user.name}�ϸ��Ĥ���ޤ���Ǥ�����
				{else}
					�������˹��פ���{$ft.user.name}��{$app.listview_total}�͸��Ĥ���ޤ�����<br />
				{/if}
			</div>
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
					{*<!--ɬ�ܹ���-->*}
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
					{*<!--ɬ�ܹ���-->*}
					<th style="width:20%">{form_name name="user_mailaddress"}</th>
					<td {if $app.user_mailaddress_active}class="active"{/if}>{form_input name="user_mailaddress"}</td>
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
					{*<!--ɬ�ܹ���-->*}
					<th style="width:20%">{form_name name="user_nickname"}</th>
					<td {if $app.user_nickname_active}class="active"{/if} nowrap>{form_input name="user_nickname"}����</td>
				</tr>
				{*<!--ξ���Ȥ�¸�ߤ��ʤ����ܤʤ��ɽ�����ʤ�-->*}
				{if $config.profile.user_birth_date || $config.profile.user_sex}
				<tr>
					{*<!--¸�ߤ����ɽ������-->*}
					{*<!--�٤ι��ܤ�¸�ߤ��ʤ���Ф��Υ��ڡ����ˤ�ɽ������-->*}
					{if $config.profile.user_birth_date}
					<th>ǯ��</th>
					<td {if $app.user_age_active}class="active"{/if} {if !$config.profile.user_sex}colspan=3{/if}>{form_input name="user_age_min" size="4"}�С�{form_input name="user_age_max" size="4"}��</td>
					{/if}
					{if $config.profile.user_sex}
					<th>{form_name name="user_sex"}</th>
					<td {if $app.user_sex_active}class="active"{/if} {if !$config.profile.user_birth_date}colspan=3{/if}>{form_input name="user_sex"}</td>
					{/if}
				</tr>
				{/if}
				{*<!--¸�ߤ����ɽ������-->*}
				{if $config.profile.prefecture_id}
				<tr>
					<th>{form_name name="prefecture_id"}</th>
					<td {if $app.prefecture_id_active}class="active"{/if} colspan=3>{form_input name="prefecture_id"}</td>
				</tr>
				{/if}
				{*<!--ξ���Ȥ�¸�ߤ��ʤ����ܤʤ��ɽ�����ʤ�-->*}
				{if $config.profile.user_address_building || $config.profile.user_address}
				<tr>
					{*<!--¸�ߤ����ɽ������-->*}
					{*<!--�٤ι��ܤ�¸�ߤ��ʤ���Ф��Υ��ڡ����ˤ�ɽ������-->*}
					{if $config.profile.user_address}
					<th>{form_name name="user_address"}</th>
					<td {if $app.user_address_active}class="active"{/if} {if !$config.profile.user_address_building}colspan=3{/if}>{form_input name="user_address" size="50"}</td>
					{/if}
					{if $config.profile.user_address_building}
					<th>{form_name name="user_address_building"}</th>
					<td {if $app.user_address_building_active}class="active"{/if} {if !$config.profile.user_address}colspan=3{/if}>{form_input name="user_address_building" size="50"}</td>
					{/if}
				</tr>
				{/if}
				{*<!--ξ���Ȥ�¸�ߤ��ʤ����ܤʤ��ɽ�����ʤ�-->*}
				{if $config.profile.user_is_married || $config.profile.user_has_children}
				<tr>
					{*<!--¸�ߤ����ɽ������-->*}
					{*<!--�٤ι��ܤ�¸�ߤ��ʤ���Ф��Υ��ڡ����ˤ�ɽ������-->*}
					{if $config.profile.user_is_married}
					<th>{form_name name="user_is_married"}</th>
					<td {if $app.user_is_married_active}class="active"{/if} {if !$config.profile.user_has_children}colspan=3{/if}>{form_input name="user_is_married"}</td>
					{/if}
					{if $config.profile.user_has_children}
					<th>{form_name name="user_has_children"}</th>
					<td {if $app.user_has_children_active}class="active"{/if} {if !$config.profile.user_is_married}colspan=3{/if}>{form_input name="user_has_children"}</td>
					{/if}
				</tr>
				{/if}
				{*<!--¸�ߤ����ɽ������-->*}
				{if $config.profile.work_location_prefecture_id}
				<tr>
					<th>{form_name name="work_location_prefecture_id"}</th>
					<td {if $app.work_location_prefecture_id_active}class="active"{/if} colspan=3>{form_input name="work_location_prefecture_id"}</td>
				</tr>
				{/if}
				{*<!--ξ���Ȥ�¸�ߤ��ʤ����ܤʤ��ɽ�����ʤ�-->*}
				{if $config.profile.job_family_id || $config.profile.business_category_id}
				<tr>
					{*<!--¸�ߤ����ɽ������-->*}
					{*<!--�٤ι��ܤ�¸�ߤ��ʤ���Ф��Υ��ڡ����ˤ�ɽ������-->*}
					{if $config.profile.job_family_id}
					<th>{form_name name="job_family_id"}</th>
					<td {if $app.job_family_id_active}class="active"{/if} {if !$config.profile.business_category_id}colspan=3{/if}>{form_input name="job_family_id"}</td>
					{/if}
					{if $config.profile.business_category_id}
					<th>{form_name name="business_category_id"}</th>
					<td {if $app.business_category_id_active}class="active"{/if} {if !$config.profile.job_family_id}colspan=3{/if}>{form_input name="business_category_id"}</td>
					{/if}
				</tr>
				{/if}
				{*<!--ξ���Ȥ�¸�ߤ��ʤ����ܤʤ��ɽ�����ʤ�-->*}
				{if $config.profile.user_blood_type || $config.profile.user_hobby}
				<tr>
					{*<!--¸�ߤ����ɽ������-->*}
					{*<!--�٤ι��ܤ�¸�ߤ��ʤ���Ф��Υ��ڡ����ˤ�ɽ������-->*}
					{if $config.profile.user_blood_type}
					<th>{form_name name="user_blood_type"}</th>
					<td {if $app.user_blood_type_active}class="active"{/if} {if !$config.profile.user_hobby}colspan=3{/if}>{form_input name="user_blood_type"}</td>
					{/if}
					{if $config.profile.user_hobby}
					<th>{form_name name="user_hobby"}</th>
					<td {if $app.user_hobby_active}class="active"{/if} {if !$config.profile.user_blood_type}colspan=3{/if}>{form_input name="user_hobby"}</td>
					{/if}
				</tr>
				{/if}
				{*<!--ξ���Ȥ�¸�ߤ��ʤ����ܤʤ��ɽ�����ʤ�-->*}
				{if $config.profile.user_url || $config.profile.user_introduction}
				<tr>
					{if $config.profile.user_url}
					<th>{form_name name="user_url"}</th>
					<td {if $app.user_url_active}class="active"{/if}>{form_input name="user_url" size="50"}</td>
					{/if}
					{if $config.profile.user_introduction}
					<th>{form_name name="user_introduction"}</th>
					<td {if $app.user_introduction_active}class="active"{/if}>{form_input name="user_introduction" size="50"}</td>
					{/if}
				</tr>
				{/if}
				{*<!--��ͳ����ץ�ե��������-->*}
				{*<!--{foreach from=$app.configUserProfList item=item key=k}
					{if $item.config_user_prof_type >= 3}
						<tr>
							<th>{$item.config_user_prof_name}</th>
							<td colspan="3">
								{foreach from=$item.config_user_prof_option item=option}
									<input type="checkbox" name="user_prof_checkbox_{$k}[]" value="{$option.config_user_prof_option_id}" {if $app.is_checked[$option.config_user_prof_option_id]}checked{/if}>{$option.config_user_prof_option_name}
								{/foreach}
							</td>
						</tr>
					{/if}
				{/foreach}-->*}
				{*<!--ɬ�ܹ���-->*}
				<tr>
					<th>{form_name name="user_carrier"}</th>
					<td {if $app.user_carrier_active}class="active"{/if}>{form_input name="user_carrier" emptyoption=""}</td>
					<th>{form_name name="user_device"}</th>
					<td {if $app.user_device_active}class="active"{/if}>{form_input name="user_device"}</td>
				</tr>
				{*<!--ɬ�ܹ���-->*}
				<tr>
					<th>{form_name name="user_prof_keyword"}</th>
					<td {if $app.user_prof_keyword_active}class="active"{/if}>{form_input name="user_prof_keyword" size="50"}</td>
					<th>������</th>
					<td {if $app.sort_active}class="active"{/if}>
						{form_name name="sort_key"}��
						{form_input name="sort_key" emptyoption=""}
						&nbsp;&nbsp;
						{form_name name="sort_order"}��
						{form_input name="sort_order" emptyoption=""}
					</td>
				</tr>
				{*<!--ɬ�ܹ���-->*}
				<tr>
					<th>{form_name name="user_status"}</th>
					<td {if $app.user_status_active}class="active"{/if}>{form_input name="user_status" emptyoption=""}</td>
					<th></th>
					<td>{form_submit value="����������"}&nbsp;&nbsp;{form_input name="download" value="����������ɡ�"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th>{$ft.user_id.name}</th>
					<th>{$ft.user_status.name}</th>
					<th>
						��Ͽ����<br />
						��������<br />
						�������
					</th>
					<th>{$ft.user_mailaddress.name}</th>
					<th>{$ft.user_nickname.name}</th>
					<th>����ꥢ</th>
					<th>����̾</th>
					<!--th>
					{*if $config.option.avatar}
							{$ft.avatar.name}
					{else}
							����
					{/if*}
					</th-->
					<th>{$ft.user_magazine_error_num.name}</th>
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
					<td>{$config.user_carrier[$item.user_carrier].name}</td>
					<td>{$item.user_device}</td>
					<!--td>
					{*if $config.option.avatar}
						{if $item.user_status==2}
						<img src="?action_user_file_avatar_preview=true&attr=t&user_id={$item.user_id}&SESSID={$SESSID}" alt="����" style="float:left;" />
						{/if}
					{else}
						{if $item.image_id}
						<img src="f.php?type=image&?type=image&id={$item.image_id}&attr=t&SESSID={$SESSID}" alt="����" style="float:left;" />
						{/if}
					{/if*}
					</td-->
					<td>{$item.user_magazine_error_num}</td>
				</tr>
				{/if}
				{/foreach}
			</table>
			
			{include file="admin/pager.tpl"}
			
			<p id="pagetop"><a href="#top0">�ڡ����ȥå�</a></p>
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->
{include file="admin/footer.tpl"}
