<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="会員登録" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="fp.php?code=guide_terms">{$sns_name}利用規約</a><br />
	ご登録前に、利用規約およびプライバシーポリシーをよくお読みの上ご登録ください。<br />
	<br />
	{form ethna_action="user_regist_do" action="`$script`?guid=ON"}
		{form_input name="user_hash"}
		
		<!--ニックネーム-->
		<span style="color:{$form_name_color}">
		{form_name name="user_nickname"}:
		</span>
		<span style="color:red;">※必須</span>
		<span style="color:red;">*一度決めたニックネームは変更できません</span>
		<br />
		{form_input name="user_nickname" maxlength="32"}<br />
		
		<!--パスワード-->
		<span style="color:{$form_name_color}">
		{form_name name="user_password"}:
		</span>
		<span style="color:red;">※必須</span>
		<span style="color:red;">*半角英数字4文字以上</span><br />
		{form_input name="user_password" istyle="3" mode="alphabet"}<br />
		
		{if $config.profile.user_sex}
		<!--性別-->
		<span style="color:{$form_name_color}">
		{form_name name="user_sex"}:
		</span>
		{if $config.profile_required.user_sex}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_sex"}
		
		{*<!--性別公開-->
		<span style="text-align:right;">
		{form_input name="user_sex_public"}
		</span>
		*}
		<br />
		{/if}
		
		{if $config.profile.user_birth_date}
		<!--生年月日-->
		<span style="color:{$form_name_color}">
		生年月日:
		</span>
		{if $config.profile_required.user_birth_date}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_birth_date_year" size="4" istyle="4" mode="numeric"}年
		{form_input name="user_birth_date_month" size="2" istyle="4" mode="numeric"}月
		{form_input name="user_birth_date_day" size="2" istyle="4" mode="numeric"}日
		
		{*<!--生年月日公開-->
		<span style="text-align:right;">
		{form_input name="user_birth_date_public"}
		</span>
		<br />
		*}
		{/if}
		
		{*
		{if $config.profile.prefecture_id}
		<!--地域（都道府県）-->
		<span style="color:{$form_name_color}">
		{form_name name="prefecture_id"}:
		</span>
		{if $config.profile_required.prefecture_id}<span style="color:red;">※必須</span>{/if}
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
		{if $config.profile_required.user_user_address}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_address"}<br />
		{/if}
		
		{if $config.profile.user_address_building}
		<!--地域（建物）-->
		<span style="color:{$form_name_color}">
		{form_name name="user_address_building"}:
		</span>
		{if $config.profile_required.user_address_building}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_address_building"}<br />
		{/if}
		
		{if $config.profile.user_blood_type}
		<!--血液型-->
		<span style="color:{$form_name_color}">
		{form_name name="user_blood_type"}:
		</span>
		{if $config.profile_required.user_blood_type}<span style="color:red;">※必須</span>{/if}
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
		{if $config.profile_required.job_family_id}<span style="color:red;">※必須</span>{/if}
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
		{if $config.profile_required.business_category_id}<span style="color:red;">※必須</span>{/if}
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
		{if $config.profile_required.user_is_married}<span style="color:red;">※必須</span>{/if}
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
		{if $config.profile_required.user_has_children}<span style="color:red;">※必須</span>{/if}
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
		{if $config.profile_required.work_location_prefecture_id}<span style="color:red;">※必須</span>{/if}
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
		{if $config.profile_required.user_hobby}<span style="color:red;">※必須</span>{/if}
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
		{if $config.profile_required.user_url}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_url"}
		
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
		{if $config.profile_required.user_introduction}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_introduction"}
		
		<!--自己紹介公開-->
		<span style="text-align:right;">
		{form_input name="user_introduction_public"}
		</span>
		<br />
		{/if}
		*}
		
		<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_submit name="submit" value="利用規約に同意して登録"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl" no_footer="true" no_navi="true"}
