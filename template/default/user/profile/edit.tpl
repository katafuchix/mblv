<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.profile.name`�ѹ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_profile_edit_do"}
		
		<!--�˥å��͡���-->
		{if $config.profile_edit.user_nickname}
		<span style="color:{$form_name_color};">
		{form_name name="user_nickname"}:
		</span>
		{if $config.profile_edit_required.user_nickname}<span style="color:red;">��ɬ��</span>{/if}
		<span style="color:red;">/����</span>
		<br />
		{form_input name="user_nickname" maxlength="128"}<br />
		{/if}
		
		<!--����-->
		{if $config.profile_edit.user_sex}
		<span style="color:{$form_name_color}">
		{form_name name="user_sex"}:
		</span>
		{if $config.profile_edit_required.user_sex}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="user_sex"}<br />
		
		<!--���̸���-->
		{if $config.profile_edit_public.user_sex}
		<span style="text-align:right;">
		{form_input name="user_sex_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--��ǯ����-->
		{if $config.profile_edit.user_birth_date}
		<span style="color:{$form_name_color}">
		��ǯ����:
		</span>
		{if $config.profile_edit_required.user_birth_date}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="user_birth_date_year" size="4" istyle="4" mode="numeric"}ǯ
		{form_input name="user_birth_date_month" size="2" istyle="4" mode="numeric"}��
		{form_input name="user_birth_date_day" size="2" istyle="4" mode="numeric"}��<br />
		
		<!--��ǯ��������-->
		{if $config.profile_edit_public.user_birth_date}
		<span style="text-align:right;">
		{form_input name="user_birth_date_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--�ϰ����ƻ�ܸ���-->
		{if $config.profile_edit.prefecture_id}
		<span style="color:{$form_name_color}">
		{form_name name="prefecture_id"}:
		</span>
		{if $config.profile_edit_required.prefecture_id}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="prefecture_id" emptyoption=""}<br />
		
		<!--�ϰ����-->
		{if $config.profile_edit_public.user_address}
		<span style="text-align:right;">
		{form_input name="user_address_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<span style="color:{$form_name_color}">
		{form_name name="zipcode"}:
		</span>
		<br />
		{form_input name="user_zipcode"}<br />
		{form_submit name="zipcode_search" value="���긡��"}

		<!--�ϰ�ʽ����-->
		{if $config.profile_edit.user_address}
		<span style="color:{$form_name_color}">
		{form_name name="user_address"}:
		</span>
		{if $config.profile_edit_required.user_user_address}<span style="color:red;">��ɬ��</span>{/if}
		<span style="color:red;">/�����</span>
		<br />
		{form_input name="user_address"}<br />
		{/if}
		
		<!--�ϰ�ʷ�ʪ��-->
		{if $config.profile_edit.user_address_building}
		<span style="color:{$form_name_color}">
		{form_name name="user_address_building"}:
		</span>
		{if $config.profile_edit_required.user_address_building}<span style="color:red;">��ɬ��</span>{/if}
		<span style="color:red;">/�����</span>
		<br />
		{form_input name="user_address_building"}<br />
		{/if}
		
		<!--��շ�-->
		{if $config.profile_edit.user_blood_type}
		<span style="color:{$form_name_color}">
		{form_name name="user_blood_type"}:
		</span>
		{if $config.profile_edit_required.user_blood_type}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="user_blood_type"}<br />
		
		<!--��շ�����-->
		{if $config.profile_edit_public.user_blood_type}
		<span style="text-align:right;">
		{form_input name="user_blood_type_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--����-->
		{if $config.profile_edit.job_family_id}
		<span style="color:{$form_name_color}">
		{form_name name="job_family_id"}:
		</span>
		{if $config.profile_edit_required.job_family_id}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="job_family_id" emptyoption=""}<br />
		
		<!--�������-->
		{if $config.profile_edit_public.job_family_id}
		<span style="text-align:right;">
		{form_input name="job_family_id_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--�ȼ�-->
		{if $config.profile_edit.business_category_id}
		<span style="color:{$form_name_color}">
		{form_name name="business_category_id"}:
		</span>
		{if $config.profile_edit_required.business_category_id}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="business_category_id" emptyoption=""}<br />
		
		<!--�ȼ����-->
		{if $config.profile_edit_public.business_category_id}
		<span style="text-align:right;">
		{form_input name="business_category_id_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--�뺧-->
		{if $config.profile_edit.user_is_married}
		<span style="color:{$form_name_color}">
		{form_name name="user_is_married"}
		</span>
		{if $config.profile_edit_required.user_is_married}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="user_is_married"}<br />
		
		<!--�뺧����-->
		{if $config.profile_edit_public.user_is_married}
		<span style="text-align:right;">
		{form_input name="user_is_married_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--�Ҷ�-->
		{if $config.profile_edit.user_has_children}
		<span style="color:{$form_name_color}">
		{form_name name="user_has_children"}:
		</span>
		{if $config.profile_edit_required.user_has_children}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="user_has_children"}<br />
		
		<!--�Ҷ�����-->
		{if $config.profile_edit_public.user_has_children}
		<span style="text-align:right;">
		{form_input name="user_has_children_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--��̳��-->
		{if $config.profile_edit.work_location_prefecture_id}
		<span style="color:{$form_name_color}">
		{form_name name="work_location_prefecture_id"}:
		</span>
		{if $config.profile_edit_required.work_location_prefecture_id}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="work_location_prefecture_id" emptyoption=""}<br />
		
		<!--��̳�ϸ���-->
		{if $config.profile_edit_public.work_location_prefecture_id}
		<span style="text-align:right;">
		{form_input name="work_location_prefecture_id_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--��̣-->
		{if $config.profile_edit.user_hobby}
		<span style="color:{$form_name_color}">
		{form_name name="user_hobby"}:
		</span>
		{if $config.profile_edit_required.user_hobby}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="user_hobby"}<br />
		
		<!--��̣����-->
		{if $config.profile_edit_public.user_hobby}
		<span style="text-align:right;">
		{form_input name="user_hobby_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--URL-->
		{if $config.profile_edit.user_url}
		<span style="color:{$form_name_color}">
		{form_name name="user_url"}
		</span>
		<br />
		{form_input name="user_url"}<br />
		
		<!--URL����-->
		{if $config.profile_edit_public.user_url}
		<span style="text-align:right;">
		{form_input name="user_url_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--���ʾҲ�-->
		{if $config.profile_edit.user_introduction}
		<span style="color:{$form_name_color}">
		{form_name name="user_introduction"}
		</span>
		{if $config.profile_edit_required.user_introduction}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="user_introduction"}<br />
		
		<!--���ʾҲ����-->
		{if $config.profile_edit_public.user_introduction}
		<span style="text-align:right;">
		{form_input name="user_introduction_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<span style="color:{$form_name_color}">
		{form_name name="user_mail_ok"}
		</span>
		<br />
		{form_input name="user_mail_ok"}
		<br />
		
		{foreach from=$app.config_user_prof_list item=item}
			<span style="color:{$form_name_color};">
			{$item.config_user_prof_name}
			</span>
			<br />
			{if $item.config_user_prof_type == 1}{* �ƥ����� *}
				<input type="text" name="user_prof_text[{$item.config_user_prof_id}]" value="{$form.user_prof_text[$item.config_user_prof_id]|replace_emoji_form}"><br />
			{elseif $item.config_user_prof_type == 2}{* �ƥ����ȥ��ꥢ *}
				<textarea name="user_prof_textarea[{$item.config_user_prof_id}]" cols="20" rows="4">{$form.user_prof_textarea[$item.config_user_prof_id]|replace_emoji_form}</textarea><br />
			{elseif $item.config_user_prof_type == 3}{* ���쥯�ȥܥå��� *}
				<select name="user_prof_select[{$item.config_user_prof_id}]"><br />
				{foreach from=$item.config_user_prof_option item=option}
					<option value="{$option.config_user_prof_option_id}" {if $form.user_prof_select[$item.config_user_prof_id] == $option.config_user_prof_option_id}selected{/if}>{$option.config_user_prof_option_name|replace_emoji_form}</option>
				{/foreach}
				</select><br />
			{elseif $item.config_user_prof_type == 4}{* �饸���ܥ��� *}
				{foreach from=$item.config_user_prof_option item=option}
					<input type="radio" name="user_prof_radio[{$item.config_user_prof_id}]" value="{$option.config_user_prof_option_id}" {if $form.user_prof_radio[$item.config_user_prof_id] == $option.config_user_prof_option_id}checked{/if}>{$option.config_user_prof_option_name}<br />
				{/foreach}
			{elseif $item.config_user_prof_type == 5}{* �����å��ܥå��� *}
				{foreach from=$item.config_user_prof_option item=option}
					<input type="checkbox" name="user_prof_checkbox[{$option.config_user_prof_option_id}]" value="{$option.config_user_prof_option_id}" {if $form.user_prof_checkbox[$option.config_user_prof_option_id]}checked{/if}>{$option.config_user_prof_option_name}<br />
				{/foreach}
			{/if}
		{/foreach}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		{$ft.profile.name}���ѹ�����ˤϲ��ΎΎގ��ݤ򲡤��Ʋ�������<br />
		<br />
		<div  style="text-align:center;font-size:small;">{form_submit value="��`$ft.profile.name`�ѹ���"}<br /></div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
