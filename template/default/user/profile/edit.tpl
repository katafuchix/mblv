<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="`$ft.profile.name`変更" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_profile_edit_do"}
		
		<!--ニックネーム-->
		{if $config.profile_edit.user_nickname}
		<span style="color:{$form_name_color};">
		{form_name name="user_nickname"}:
		</span>
		{if $config.profile_edit_required.user_nickname}<span style="color:red;">※必須</span>{/if}
		<span style="color:red;">/公開</span>
		<br />
		{form_input name="user_nickname" maxlength="128"}<br />
		{/if}
		
		<!--性別-->
		{if $config.profile_edit.user_sex}
		<span style="color:{$form_name_color}">
		{form_name name="user_sex"}:
		</span>
		{if $config.profile_edit_required.user_sex}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_sex"}<br />
		
		<!--性別公開-->
		{if $config.profile_edit_public.user_sex}
		<span style="text-align:right;">
		{form_input name="user_sex_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--生年月日-->
		{if $config.profile_edit.user_birth_date}
		<span style="color:{$form_name_color}">
		生年月日:
		</span>
		{if $config.profile_edit_required.user_birth_date}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_birth_date_year" size="4" istyle="4" mode="numeric"}年
		{form_input name="user_birth_date_month" size="2" istyle="4" mode="numeric"}月
		{form_input name="user_birth_date_day" size="2" istyle="4" mode="numeric"}日<br />
		
		<!--生年月日公開-->
		{if $config.profile_edit_public.user_birth_date}
		<span style="text-align:right;">
		{form_input name="user_birth_date_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--地域（都道府県）-->
		{if $config.profile_edit.prefecture_id}
		<span style="color:{$form_name_color}">
		{form_name name="prefecture_id"}:
		</span>
		{if $config.profile_edit_required.prefecture_id}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="prefecture_id" emptyoption=""}<br />
		
		<!--地域公開-->
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
		{form_submit name="zipcode_search" value="住所検索"}

		<!--地域（住所）-->
		{if $config.profile_edit.user_address}
		<span style="color:{$form_name_color}">
		{form_name name="user_address"}:
		</span>
		{if $config.profile_edit_required.user_user_address}<span style="color:red;">※必須</span>{/if}
		<span style="color:red;">/非公開</span>
		<br />
		{form_input name="user_address"}<br />
		{/if}
		
		<!--地域（建物）-->
		{if $config.profile_edit.user_address_building}
		<span style="color:{$form_name_color}">
		{form_name name="user_address_building"}:
		</span>
		{if $config.profile_edit_required.user_address_building}<span style="color:red;">※必須</span>{/if}
		<span style="color:red;">/非公開</span>
		<br />
		{form_input name="user_address_building"}<br />
		{/if}
		
		<!--血液型-->
		{if $config.profile_edit.user_blood_type}
		<span style="color:{$form_name_color}">
		{form_name name="user_blood_type"}:
		</span>
		{if $config.profile_edit_required.user_blood_type}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_blood_type"}<br />
		
		<!--血液型公開-->
		{if $config.profile_edit_public.user_blood_type}
		<span style="text-align:right;">
		{form_input name="user_blood_type_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--職種-->
		{if $config.profile_edit.job_family_id}
		<span style="color:{$form_name_color}">
		{form_name name="job_family_id"}:
		</span>
		{if $config.profile_edit_required.job_family_id}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="job_family_id" emptyoption=""}<br />
		
		<!--職種公開-->
		{if $config.profile_edit_public.job_family_id}
		<span style="text-align:right;">
		{form_input name="job_family_id_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--業種-->
		{if $config.profile_edit.business_category_id}
		<span style="color:{$form_name_color}">
		{form_name name="business_category_id"}:
		</span>
		{if $config.profile_edit_required.business_category_id}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="business_category_id" emptyoption=""}<br />
		
		<!--業種公開-->
		{if $config.profile_edit_public.business_category_id}
		<span style="text-align:right;">
		{form_input name="business_category_id_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--結婚-->
		{if $config.profile_edit.user_is_married}
		<span style="color:{$form_name_color}">
		{form_name name="user_is_married"}
		</span>
		{if $config.profile_edit_required.user_is_married}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_is_married"}<br />
		
		<!--結婚公開-->
		{if $config.profile_edit_public.user_is_married}
		<span style="text-align:right;">
		{form_input name="user_is_married_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--子供-->
		{if $config.profile_edit.user_has_children}
		<span style="color:{$form_name_color}">
		{form_name name="user_has_children"}:
		</span>
		{if $config.profile_edit_required.user_has_children}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_has_children"}<br />
		
		<!--子供公開-->
		{if $config.profile_edit_public.user_has_children}
		<span style="text-align:right;">
		{form_input name="user_has_children_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--勤務地-->
		{if $config.profile_edit.work_location_prefecture_id}
		<span style="color:{$form_name_color}">
		{form_name name="work_location_prefecture_id"}:
		</span>
		{if $config.profile_edit_required.work_location_prefecture_id}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="work_location_prefecture_id" emptyoption=""}<br />
		
		<!--勤務地公開-->
		{if $config.profile_edit_public.work_location_prefecture_id}
		<span style="text-align:right;">
		{form_input name="work_location_prefecture_id_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--趣味-->
		{if $config.profile_edit.user_hobby}
		<span style="color:{$form_name_color}">
		{form_name name="user_hobby"}:
		</span>
		{if $config.profile_edit_required.user_hobby}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_hobby"}<br />
		
		<!--趣味公開-->
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
		
		<!--URL公開-->
		{if $config.profile_edit_public.user_url}
		<span style="text-align:right;">
		{form_input name="user_url_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--自己紹介-->
		{if $config.profile_edit.user_introduction}
		<span style="color:{$form_name_color}">
		{form_name name="user_introduction"}
		</span>
		{if $config.profile_edit_required.user_introduction}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_introduction"}<br />
		
		<!--自己紹介公開-->
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
					<input type="radio" name="user_prof_radio[{$item.config_user_prof_id}]" value="{$option.config_user_prof_option_id}" {if $form.user_prof_radio[$item.config_user_prof_id] == $option.config_user_prof_option_id}checked{/if}>{$option.config_user_prof_option_name}<br />
				{/foreach}
			{elseif $item.config_user_prof_type == 5}{* チェックボックス *}
				{foreach from=$item.config_user_prof_option item=option}
					<input type="checkbox" name="user_prof_checkbox[{$option.config_user_prof_option_id}]" value="{$option.config_user_prof_option_id}" {if $form.user_prof_checkbox[$option.config_user_prof_option_id]}checked{/if}>{$option.config_user_prof_option_name}<br />
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
