<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.profile.name`�ѹ�" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_profile_edit_do"}
		<!--�˥å��͡���-->
		<span style="color:{$form_name_color};">
		{form_name name="user_nickname"}:
		</span>
		<br />
		{$session.user.user_nickname}
		{form_input name="user_nickname"}<br />
		
		{if $config.profile.user_sex}
		<!--����-->
		<span style="color:{$form_name_color};">
		{form_name name="user_sex"}:
		</span>
		<br />
		{$config.user_sex[$form.user_sex].name}
		{form_input name="user_sex"}
		
		<!--���̸���-->
		<span style="text-align:right;">
		{form_input name="user_sex_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.user_birth_date}
		<!--��ǯ����-->
		<span style="color:{$form_name_color}">
		��ǯ����:
		</span>
		<br />
		{form_input name="user_birth_date_year" size="4" istyle="4" mode="numeric"}ǯ
		{form_input name="user_birth_date_month" size="2" istyle="4" mode="numeric"}��
		{form_input name="user_birth_date_day" size="2" istyle="4" mode="numeric"}��
		
		<!--��ǯ��������-->
		<span style="text-align:right;">
		{form_input name="user_birth_date_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.prefecture_id}
		<!--�ϰ����ƻ�ܸ���-->
		<span style="color:{$form_name_color};">
		{form_name name="prefecture_id"}:
		</span>
		<br />
		{form_input name="prefecture_id"}
		
		<!--�ϰ����-->
		<span style="text-align:right;">
		{form_input name="user_address_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.user_address}
		<!--�ϰ�ʽ����-->
		<span style="color:{$form_name_color}">
		{form_name name="user_address"}:
		</span>
		<br />
		{form_input name="user_address"}
		
		{/if}
		
		{if $config.profile.user_address_building}
		<!--�ϰ�ʷ�ʪ��-->
		<span style="color:{$form_name_color}">
		{form_name name="user_address_building"}:
		</span>
		<br />
		{form_input name="user_address_building"}<br />
		{/if}
		
		{if $config.profile.user_blood_type}
		<!--��շ�-->
		<span style="color:{$form_name_color}">
		{form_name name="user_blood_type"}:
		</span>
		<br />
		{form_input name="user_blood_type"}
		
		<!--��շ�����-->
		<span style="text-align:right;">
		{form_input name="user_blood_type_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.job_family_id}
		<!--����-->
		<span style="color:{$form_name_color}">
		{form_name name="job_family_id"}:
		</span>
		<br />
		{form_input name="job_family_id"}
		
		<!--�������-->
		<span style="text-align:right;">
		{form_input name="job_family_id_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.business_category_id}
		<!--�ȼ�-->
		<span style="color:{$form_name_color}">
		{form_name name="business_category_id"}:
		</span>
		<br />
		{form_input name="business_category_id"}
		
		<!--�ȼ����-->
		<span style="text-align:right;">
		{form_input name="business_category_id_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.user_is_married}
		<!--�뺧-->
		<span style="color:{$form_name_color}">
		{form_name name="user_is_married"}
		</span>
		<br />
		{form_input name="user_is_married"}
		
		<!--�뺧����-->
		<span style="text-align:right;">
		{form_input name="user_is_married_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.user_has_children}
		<!--�Ҷ�-->
		<span style="color:{$form_name_color}">
		{form_name name="user_has_children"}:
		</span>
		<br />
		{form_input name="user_has_children"}
		
		<!--�Ҷ�����-->
		<span style="text-align:right;">
		{form_input name="user_has_children_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.work_location_prefecture_id}
		<!--��̳��-->
		<span style="color:{$form_name_color}">
		{form_name name="work_location_prefecture_id"}:
		</span>
		<br />
		{form_input name="work_location_prefecture_id"}
		
		<!--��̳�ϸ���-->
		<span style="text-align:right;">
		{form_input name="work_location_prefecture_id_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.user_hobby}
		<!--��̣-->
		<span style="color:{$form_name_color}">
		{form_name name="user_hobby"}:
		</span>
		<br />
		{form_input name="user_hobby"}
		
		<!--��̣����-->
		<span style="text-align:right;">
		{form_input name="user_hobby_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.user_url}
		<!--URL-->
		<span style="color:{$form_name_color}">
		{form_name name="user_url"}
		</span>
		<br />
		{form_input name="user_url"}<br />
		
		<!--URL����-->
		<span style="text-align:right;">
		{form_input name="user_url_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.user_introduction}
		<!--���ʾҲ�-->
		<span style="color:{$form_name_color}">
		{form_name name="user_introduction"}
		</span>
		<br />
		{form_input name="user_introduction"}
		
		<!--���ʾҲ����-->
		<span style="text-align:right;">
		{form_input name="user_introduction_public"}
		</span>
		<br />
		{/if}
		
		
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
					&nbsp;&nbsp;<input type="radio" name="user_prof_radio[{$item.config_user_prof_id}]" value="{$option.config_user_prof_option_id}" {if $form.user_prof_radio[$item.config_user_prof_id] == $option.config_user_prof_option_id}checked{/if}>{$option.config_user_prof_option_name}<br />
				{/foreach}
			{elseif $item.config_user_prof_type == 5}{* �����å��ܥå��� *}
				{foreach from=$item.config_user_prof_option item=option}
					&nbsp;&nbsp;<input type="checkbox" name="user_prof_checkbox[{$option.config_user_prof_option_id}]" value="{$option.config_user_prof_option_id}" {if $form.user_prof_checkbox[$option.config_user_prof_option_id]}checked{/if}>{$option.config_user_prof_option_name}<br />
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
