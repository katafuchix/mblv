<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="会員登録" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="fp.php?code=system_terms">{$site_name}利用規約</a><br />
	<br />
	{form ethna_action="user_regist_do" action="`$script`?guid=ON"}
		{form_input name="user_hash"}
		
		<!--ニックネーム-->
		<span style="color:{$form_name_color}">
		{form_name name="user_nickname"}:
		</span>
		<span style="color:red;">※必須</span>
		<span style="color:red;">/公開</span>
		<br />
		{form_input name="user_nickname" maxlength="128"}<br />
		
		<!--パスワード-->
		<span style="color:{$form_name_color}">
		{form_name name="user_password"}:
		</span>
		<span style="color:red;">※必須/半角英数4文字以上</span>
		<span style="color:red;">/非公開</span>
		<br />
		{form_input name="user_password" istyle="3" mode="alphabet"}<br />
		
		<!--性別-->
		{if $config.profile_regist.user_sex}
		<span style="color:{$form_name_color}">
		{form_name name="user_sex"}:
		</span>
		{if $config.profile_regist_required.user_sex}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_sex"}<br />
		
		<!--性別公開-->
		{if $config.profile_regist_public.user_sex}
		<span style="text-align:right;">
		{form_input name="user_sex_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--生年月日-->
		{if $config.profile_regist.user_birth_date}
		<span style="color:{$form_name_color}">
		生年月日:
		</span>
		{if $config.profile_regist_required.user_birth_date}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_birth_date_year" size="4" istyle="4" mode="numeric"}年
		{form_input name="user_birth_date_month" size="2" istyle="4" mode="numeric"}月
		{form_input name="user_birth_date_day" size="2" istyle="4" mode="numeric"}日<br />
		
		<!--生年月日公開-->
		{if $config.profile_regist_public.user_birth_date}
		<span style="text-align:right;">
		{form_input name="user_birth_date_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--住所検索-->
		<span style="color:{$form_name_color}">
		{form_name name="user_zipcode" size="7"}:
		</span>
		<br />
		{form_input name="user_zipcode"}<br />
		{form_submit name="zipcode_search" value="住所検索"}<br />
		
		<!--地域（都道府県）-->
		{if $config.profile_regist.prefecture_id}
		<span style="color:{$form_name_color}">
		{form_name name="prefecture_id"}:
		</span>
		{if $config.profile_regist_required.prefecture_id}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="prefecture_id" emptyoption=""}<br />
		
		<!--地域公開-->
		{if $config.profile_regist_public.user_address}
		<span style="text-align:right;">
		{form_input name="user_address_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--地域（住所）-->
		{if $config.profile_regist.user_address}
		<span style="color:{$form_name_color}">
		{form_name name="user_address"}:
		</span>
		{if $config.profile_regist_required.user_user_address}<span style="color:red;">※必須</span>{/if}
		<span style="color:red;">/非公開</span>
		<br />
		{form_input name="user_address"}<br />
		{/if}
		
		<!--地域（建物）-->
		{if $config.profile_regist.user_address_building}
		<span style="color:{$form_name_color}">
		{form_name name="user_address_building"}:
		</span>
		{if $config.profile_regist_required.user_address_building}<span style="color:red;">※必須</span>{/if}
		<span style="color:red;">/非公開</span>
		<br />
		{form_input name="user_address_building"}<br />
		{/if}
		
		<!--血液型-->
		{if $config.profile_regist.user_blood_type}
		<span style="color:{$form_name_color}">
		{form_name name="user_blood_type"}:
		</span>
		{if $config.profile_regist_required.user_blood_type}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_blood_type"}<br />
		
		<!--血液型公開-->
		{if $config.profile_regist_public.user_blood_type}
		<span style="text-align:right;">
		{form_input name="user_blood_type_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--職種-->
		{if $config.profile_regist.job_family_id}
		<span style="color:{$form_name_color}">
		{form_name name="job_family_id"}:
		</span>
		{if $config.profile_regist_required.job_family_id}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="job_family_id" emptyoption=""}<br />
		
		<!--職種公開-->
		{if $config.profile_regist_public.job_family_id}
		<span style="text-align:right;">
		{form_input name="job_family_id_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--業種-->
		{if $config.profile_regist.business_category_id}
		<span style="color:{$form_name_color}">
		{form_name name="business_category_id"}:
		</span>
		{if $config.profile_regist_required.business_category_id}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="business_category_id" emptyoption=""}<br />
		
		<!--業種公開-->
		{if $config.profile_regist_public.business_category_id}
		<span style="text-align:right;">
		{form_input name="business_category_id_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--結婚-->
		{if $config.profile_regist.user_is_married}
		<span style="color:{$form_name_color}">
		{form_name name="user_is_married"}
		</span>
		{if $config.profile_regist_required.user_is_married}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_is_married"}<br />
		
		<!--結婚公開-->
		{if $config.profile_regist_public.user_is_married}
		<span style="text-align:right;">
		{form_input name="user_is_married_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--子供-->
		{if $config.profile_regist.user_has_children}
		<span style="color:{$form_name_color}">
		{form_name name="user_has_children"}:
		</span>
		{if $config.profile_regist_required.user_has_children}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_has_children"}<br />
		
		<!--子供公開-->
		{if $config.profile_regist_public.user_has_children}
		<span style="text-align:right;">
		{form_input name="user_has_children_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--勤務地-->
		{if $config.profile_regist.work_location_prefecture_id}
		<span style="color:{$form_name_color}">
		{form_name name="work_location_prefecture_id"}:
		</span>
		{if $config.profile_regist_required.work_location_prefecture_id}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="work_location_prefecture_id" emptyoption=""}<br />
		
		<!--勤務地公開-->
		{if $config.profile_regist_public.work_location_prefecture_id}
		<span style="text-align:right;">
		{form_input name="work_location_prefecture_id_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--趣味-->
		{if $config.profile_regist.user_hobby}
		<span style="color:{$form_name_color}">
		{form_name name="user_hobby"}:
		</span>
		{if $config.profile_regist_required.user_hobby}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_hobby"}<br />
		
		<!--趣味公開-->
		{if $config.profile_regist_public.user_hobby}
		<span style="text-align:right;">
		{form_input name="user_hobby_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--URL-->
		{if $config.profile_regist.user_url}
		<span style="color:{$form_name_color}">
		{form_name name="user_url"}
		</span>
		<br />
		{form_input name="user_url"}<br />
		
		<!--URL公開-->
		{if $config.profile_regist_public.user_url}
		<span style="text-align:right;">
		{form_input name="user_url_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--自己紹介-->
		{if $config.profile_regist.user_introduction}
		<span style="color:{$form_name_color}">
		{form_name name="user_introduction"}
		</span>
		{if $config.profile_regist_required.user_introduction}<span style="color:red;">※必須</span>{/if}
		<br />
		{form_input name="user_introduction"}<br />
		
		<!--自己紹介公開-->
		{if $config.profile_regist_public.user_introduction}
		<span style="text-align:right;">
		{form_input name="user_introduction_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<br />
		<div style="text-align:center;font-size:small;">{form_submit name="submit" value="利用規約に同意して登録"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
