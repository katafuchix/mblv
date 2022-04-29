<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.profile.name`変更" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_profile_edit_do"}
		<!--ニックネーム-->
		<span style="color:{$form_name_color};">
		{form_name name="user_nickname"}:
		</span>
		<br />
		{$session.user.user_nickname}
		{form_input name="user_nickname"}<br />
		
		{if $config.profile.user_sex}
		<!--性別-->
		<span style="color:{$form_name_color};">
		{form_name name="user_sex"}:
		</span>
		<br />
		{$config.user_sex[$form.user_sex].name}
		{form_input name="user_sex"}
		
		<!--性別公開-->
		<span style="text-align:right;">
		{form_input name="user_sex_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.user_birth_date}
		<!--生年月日-->
		<span style="color:{$form_name_color}">
		生年月日:
		</span>
		<br />
		{form_input name="user_birth_date_year" size="4" istyle="4" mode="numeric"}年
		{form_input name="user_birth_date_month" size="2" istyle="4" mode="numeric"}月
		{form_input name="user_birth_date_day" size="2" istyle="4" mode="numeric"}日
		
		<!--生年月日公開-->
		<span style="text-align:right;">
		{form_input name="user_birth_date_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.prefecture_id}
		<!--地域（都道府県）-->
		<span style="color:{$form_name_color};">
		{form_name name="prefecture_id"}:
		</span>
		<br />
		{form_input name="prefecture_id"}
		
		<!--地域公開-->
		<span style="text-align:right;">
		{form_input name="user_address_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.user_address}
		<!--地域（住所）-->
		<span style="color:{$form_name_color}">
		{form_name name="user_address"}:
		</span>
		<br />
		{form_input name="user_address"}
		
		{/if}
		
		{if $config.profile.user_address_building}
		<!--地域（建物）-->
		<span style="color:{$form_name_color}">
		{form_name name="user_address_building"}:
		</span>
		<br />
		{form_input name="user_address_building"}<br />
		{/if}
		
		{if $config.profile.user_blood_type}
		<!--血液型-->
		<span style="color:{$form_name_color}">
		{form_name name="user_blood_type"}:
		</span>
		<br />
		{form_input name="user_blood_type"}
		
		<!--血液型公開-->
		<span style="text-align:right;">
		{form_input name="user_blood_type_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.job_family_id}
		<!--職種-->
		<span style="color:{$form_name_color}">
		{form_name name="job_family_id"}:
		</span>
		<br />
		{form_input name="job_family_id"}
		
		<!--職種公開-->
		<span style="text-align:right;">
		{form_input name="job_family_id_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.business_category_id}
		<!--業種-->
		<span style="color:{$form_name_color}">
		{form_name name="business_category_id"}:
		</span>
		<br />
		{form_input name="business_category_id"}
		
		<!--業種公開-->
		<span style="text-align:right;">
		{form_input name="business_category_id_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.user_is_married}
		<!--結婚-->
		<span style="color:{$form_name_color}">
		{form_name name="user_is_married"}
		</span>
		<br />
		{form_input name="user_is_married"}
		
		<!--結婚公開-->
		<span style="text-align:right;">
		{form_input name="user_is_married_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.user_has_children}
		<!--子供-->
		<span style="color:{$form_name_color}">
		{form_name name="user_has_children"}:
		</span>
		<br />
		{form_input name="user_has_children"}
		
		<!--子供公開-->
		<span style="text-align:right;">
		{form_input name="user_has_children_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.work_location_prefecture_id}
		<!--勤務地-->
		<span style="color:{$form_name_color}">
		{form_name name="work_location_prefecture_id"}:
		</span>
		<br />
		{form_input name="work_location_prefecture_id"}
		
		<!--勤務地公開-->
		<span style="text-align:right;">
		{form_input name="work_location_prefecture_id_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.user_hobby}
		<!--趣味-->
		<span style="color:{$form_name_color}">
		{form_name name="user_hobby"}:
		</span>
		<br />
		{form_input name="user_hobby"}
		
		<!--趣味公開-->
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
		
		<!--URL公開-->
		<span style="text-align:right;">
		{form_input name="user_url_public"}
		</span>
		<br />
		{/if}
		
		{if $config.profile.user_introduction}
		<!--自己紹介-->
		<span style="color:{$form_name_color}">
		{form_name name="user_introduction"}
		</span>
		<br />
		{form_input name="user_introduction"}
		
		<!--自己紹介公開-->
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
			{if $item.config_user_prof_type == 1}{* テキスト *}
				<input type="text" name="user_prof_text[{$item.config_user_prof_id}]" value="{$form.user_prof_text[$item.config_user_prof_id]|replace_emoji_form}"><br />
			{elseif $item.config_user_prof_type == 2}{* テキストエリア *}
				<textarea name="user_prof_textarea[{$item.config_user_prof_id}]" cols="20" rows="4">{$form.user_prof_textarea[$item.config_user_prof_id]|replace_emoji_form}</textarea><br />
			{elseif $item.config_user_prof_type == 3}{* セレクトボックス *}
				<select name="user_prof_select[{$item.config_user_prof_id}]"><br />
				{foreach from=$item.config_user_prof_option item=option}
					<option value="{$option.config_user_prof_option_id}" {if $form.user_prof_select[$item.config_user_prof_id] == $option.config_user_prof_option_id}selected{/if}>{$option.config_user_prof_option_name|replace_emoji_form}</option>
				{/foreach}
				</select><br />
			{elseif $item.config_user_prof_type == 4}{* ラジオボタン *}
				{foreach from=$item.config_user_prof_option item=option}
					&nbsp;&nbsp;<input type="radio" name="user_prof_radio[{$item.config_user_prof_id}]" value="{$option.config_user_prof_option_id}" {if $form.user_prof_radio[$item.config_user_prof_id] == $option.config_user_prof_option_id}checked{/if}>{$option.config_user_prof_option_name}<br />
				{/foreach}
			{elseif $item.config_user_prof_type == 5}{* チェックボックス *}
				{foreach from=$item.config_user_prof_option item=option}
					&nbsp;&nbsp;<input type="checkbox" name="user_prof_checkbox[{$option.config_user_prof_option_id}]" value="{$option.config_user_prof_option_id}" {if $form.user_prof_checkbox[$option.config_user_prof_option_id]}checked{/if}>{$option.config_user_prof_option_name}<br />
				{/foreach}
			{/if}
		{/foreach}
		<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
		<br />
		{$ft.profile.name}を変更するには下のﾎﾞﾀﾝを押して下さい｡<br />
		<br />
		<div  style="text-align:center;font-size:small;">{form_submit value="　`$ft.profile.name`変更　"}<br /></div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
