{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.user.name}�����Խ�</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_user_friend_list=true&user_id={$form.user_id}">{$ft.friend_name.name}����</a>
			{$ft.menu_icon.name}<a href="?action_admin_user_community_list=true&user_id={$form.user_id}">{$ft.community_list.name}����</a>
			{$ft.menu_icon.name}<a href="?action_admin_point_home=true&user_id={$form.user_id}">{$ft.point.name}��Ģ</a>
			{form ethna_action="admin_user_edit_do"}
			{form_input name="user_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="user_id"}</th>
					<td>{$form.user_id}</td>
				</tr>
				<tr>
					<th>
					{if $config.option.avatar}
							{$ft.avatar.name}
					{else}
							����
					{/if}
					</th>
					<td>
					{if $config.option.avatar}
						{if $form.user_status==2}
						<!--���Х�����������-->
						<img src="?action_user_file_avatar_preview=true&attr=s&user_id={$form.user_id}&SESSID={$SESSID}" alt="����" style="float:left;" />
						<!--���Х���������λ-->
						{/if}
					{else}
						{*if $form.image_id*}
						<!--�ޥ���������-->
						<img src="f.php?type=image&?type=image&id={$form.image_id}&attr=s&SESSID={$SESSID}" alt="����" style="float:left;" />
						<!--�ޥ�������λ-->
						{*/if*}
					{/if}
					</td>
				</tr>
				<tr>
					<th>{form_name name="user_nickname"}<br /><span class="required"></span></th>
					<td>{form_input name="user_nickname" size="50"}����</td>
				</tr>
				<tr>
					<th>{form_name name="user_mailaddress"}<br /><span class="required"></span></th>
					<td>{form_input name="user_mailaddress" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_password"}<br /><span class="required"></span></th>
					<td>{form_input name="user_password"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_point"}</th>
					<td>{form_input name="user_point"}</td>
				</tr>
				<!--����-->
				{if $config.profile.user_sex}
				<tr>
					<th>{form_name name="user_sex"}</th>
					<td>{form_input name="user_sex"}</td>
				</tr>
				{/if}
				<!--��ǯ����-->
				{if $config.profile.user_birth_date}
				<tr>
					<th>��ǯ����</th>
					<td>
					����{form_input name="user_birth_date_year" size="4"}ǯ
					{form_input name="user_birth_date_month" size="2"}��
					{form_input name="user_birth_date_day" size="2"}��
				</tr>
				{/if}
				<!--�ϰ����ƻ�ܸ���-->
				{if $config.profile.prefecture_id}
				<tr>
					<th>{form_name name="prefecture_id"}</th>
					<td>{form_input name="prefecture_id" emptyoption=""}</td>
				</tr>
				{/if}
				<!--EC��-->
				<tr>
					<th>{form_name name="user_name"}</th>
					<td>{form_input name="user_name" size="50"}</td>
				</tr>
				<!--EC��-->
				<tr>
					<th>{form_name name="user_name_kana"}</th>
					<td>{form_input name="user_name_kana" size="50"}</td>
				</tr>
				<!--EC��-->
				<tr>
					<th>{form_name name="user_phone"}</th>
					<td>{form_input name="user_phone" size="50"}</td>
				</tr>
				<!--EC��-->
				<tr>
					<th>{form_name name="region_id"}</th>
					<td>{form_input name="region_id" emptyoption=""}</td>
				</tr>
				<!--EC��-->
				<tr>
					<th>{form_name name="user_zipcode"}</th>
					<td>{form_input name="user_zipcode" size="50"}</td>
				</tr>
				<!--�ϰ�ʽ����-->
				{if $config.profile.user_address}
				<tr>
					<th>{form_name name="user_address"}</th>
					<td>{form_input name="user_address" size="50"}</td>
				</tr>
				{/if}
				<!--�ϰ�ʷ�ʪ��-->
				{if $config.profile.user_address_building}
				<tr>
					<th>{form_name name="user_address_building"}</th>
					<td>{form_input name="user_address_building" size="50"}</td>
				</tr>
				{/if}
				<!--��շ�-->
				{if $config.profile.user_blood_type}
				<tr>
					<th>{form_name name="user_blood_type"}</th>
					<td>{form_input name="user_blood_type"}</td>
				</tr>
				{/if}
				<!--����-->
				{if $config.profile.job_family_id}
				<tr>
					<th>{form_name name="job_family_id"}</th>
					<td>{form_input name="job_family_id" emptyoption=""}</td>
				</tr>
				{/if}
				<!--�ȼ�-->
				{if $config.profile.business_category_id}
				<tr>
					<th>{form_name name="business_category_id"}</th>
					<td>{form_input name="business_category_id" emptyoption=""}</td>
				</tr>
				{/if}
				<!--�뺧-->
				{if $config.profile.user_is_married}
				<tr>
					<th>{form_name name="user_is_married"}</th>
					<td>{form_input name="user_is_married"}</td>
				</tr>
				{/if}
				<!--�Ҷ�-->
				{if $config.profile.user_has_children}
				<tr>
					<th>{form_name name="user_has_children"}</th>
					<td>{form_input name="user_has_children"}</td>
				</tr>
				{/if}
				<!--��̳��-->
				{if $config.profile.work_location_prefecture_id}
				<tr>
					<th>{form_name name="work_location_prefecture_id"}</th>
					<td>{form_input name="work_location_prefecture_id" emptyoption=""}</td>
				</tr>
				{/if}
				<!--��̣-->
				{if $config.profile.user_hobby}
				<tr>
					<th>{form_name name="user_hobby"}</th>
					<td>{form_input name="user_hobby" size="50"}</td>
				</tr>
				{/if}
				<!--URL-->
				{if $config.profile.user_url}
				<tr>
					<th>{form_name name="user_url"}</th>
					<td>{form_input name="user_url" size="50"}</td>
				</tr>
				{/if}
				<!--���ʾҲ�-->
				{if $config.profile.user_introduction}
				<tr>
					<th>{form_name name="user_introduction"}</th>
					<td>{form_input name="user_introduction"}</td>
				</tr>
				{/if}
				
				{if $config.option.guest}
				<tr>
					<th>{form_name name="user_guest_status"}<br /><span class="required"></span></th>
					<td>{form_input name="user_guest_status"}����������󤫤�ͭ���Ȥʤ�ޤ���</td>
				</tr>
				{/if}
				{foreach from=$app.configUserProfList item=item}
				<tr>
					<th>{$item.config_user_prof_name}</th>
					<td>
					{if $item.config_user_prof_type == 1}{* �ƥ����� *}
						<input type="text" name="user_prof_text[{$item.config_user_prof_id}]" value="{$app.userProfValue[$item.config_user_prof_id]|replace_emoji_form}" size="50">
					{elseif $item.config_user_prof_type == 2}{* �ƥ����ȥ��ꥢ *}
						<textarea name="user_prof_textarea[{$item.config_user_prof_id}]" cols="40" rows="4">{$app.userProfValue[$item.config_user_prof_id]|replace_emoji_form}</textarea><br />
					{elseif $item.config_user_prof_type == 3}{* ���쥯�ȥܥå��� *}
						<select name="user_prof_select[{$item.config_user_prof_id}]"><br />
						{foreach from=$item.config_user_prof_option item=option}
							<option value="{$option.config_user_prof_option_id}" {if $app.userProfValue[$item.config_user_prof_id] == $option.config_user_prof_option_id}selected{/if}>{$option.config_user_prof_option_name}</option>
						{/foreach}
					</select><br />
					{elseif $item.config_user_prof_type == 4}{* �饸���ܥ��� *}
						{foreach from=$item.config_user_prof_option item=option}
						<input type="radio" name="user_prof_radio[{$item.config_user_prof_id}]" value="{$option.config_user_prof_option_id}" {if $app.userProfValue[$item.config_user_prof_id] == $option.config_user_prof_option_id}checked{/if}>{$option.config_user_prof_option_name}<br />
						{/foreach}
					{elseif $item.config_user_prof_type == 5}{* �����å��ܥå��� *}
						{foreach from=$item.config_user_prof_option item=option}
							<input type="checkbox" name="user_prof_checkbox[]" value="{$option.config_user_prof_option_id}" {if $app.isChecked[$option.config_user_prof_option_id]}checked{/if}>{$option.config_user_prof_option_name}<br />
						{/foreach}
					{/if}
					</td>
				</tr>
				{/foreach}
				<tr>
					<th>{form_name name="user_status"}<br /><span class="required"></span></th>
					<td>{form_input name="user_status"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_mail_ok"}</th>
					<td>{form_input name="user_mail_ok"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="���Խ���"}</td>
				</tr>
			</table>
			{/form}
			
			<h2>�桼���������</h2>
			<div align="center">
				<td>
				{if $form.user_status == 4}{* �������Ѥ� *}
					{form_name name="user_id"}��{$form.user_id}�϶������ѤߤǤ���
				{else}
					{form_name name="user_id"}��{$form.user_id}��
					<a href="?action_admin_user_resign_do=true&user_id={$form.user_id}" onClick="return confirm('�����ˤ���{$ft.user.name}������񤷤Ƥ������Ǥ�����');">������񤹤�</a>
				{/if}
				</td>
			</div>
			
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
