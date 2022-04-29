<!--¥Ø¥Ã¥À¡¼-->
{include file="user/header.tpl"}

<!--¥¿¥¤¥È¥ë-->
{html_style type="title" title="²ñ°÷ÅÐÏ¿" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--¥³¥ó¥Æ¥ó¥Ä³«»Ï-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="fp.php?code=system_terms">{$site_name}ÍøÍÑµ¬Ìó</a><br />
	<br />
	{form ethna_action="user_regist_do" action="`$script`?guid=ON"}
		{form_input name="user_hash"}
		
		<!--¥Ë¥Ã¥¯¥Í¡¼¥à-->
		<span style="color:{$form_name_color}">
		{form_name name="user_nickname"}:
		</span>
		<span style="color:red;">¢¨É¬¿Ü</span>
		<span style="color:red;">/¸ø³«</span>
		<br />
		{form_input name="user_nickname" maxlength="128"}<br />
		
		<!--¥Ñ¥¹¥ï¡¼¥É-->
		<span style="color:{$form_name_color}">
		{form_name name="user_password"}:
		</span>
		<span style="color:red;">¢¨É¬¿Ü/È¾³Ñ±Ñ¿ô4Ê¸»ú°Ê¾å</span>
		<span style="color:red;">/Èó¸ø³«</span>
		<br />
		{form_input name="user_password" istyle="3" mode="alphabet"}<br />
		
		<!--À­ÊÌ-->
		{if $config.profile_regist.user_sex}
		<span style="color:{$form_name_color}">
		{form_name name="user_sex"}:
		</span>
		{if $config.profile_regist_required.user_sex}<span style="color:red;">¢¨É¬¿Ü</span>{/if}
		<br />
		{form_input name="user_sex"}<br />
		
		<!--À­ÊÌ¸ø³«-->
		{if $config.profile_regist_public.user_sex}
		<span style="text-align:right;">
		{form_input name="user_sex_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--À¸Ç¯·îÆü-->
		{if $config.profile_regist.user_birth_date}
		<span style="color:{$form_name_color}">
		À¸Ç¯·îÆü:
		</span>
		{if $config.profile_regist_required.user_birth_date}<span style="color:red;">¢¨É¬¿Ü</span>{/if}
		<br />
		{form_input name="user_birth_date_year" size="4" istyle="4" mode="numeric"}Ç¯
		{form_input name="user_birth_date_month" size="2" istyle="4" mode="numeric"}·î
		{form_input name="user_birth_date_day" size="2" istyle="4" mode="numeric"}Æü<br />
		
		<!--À¸Ç¯·îÆü¸ø³«-->
		{if $config.profile_regist_public.user_birth_date}
		<span style="text-align:right;">
		{form_input name="user_birth_date_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--½»½ê¸¡º÷-->
		<span style="color:{$form_name_color}">
		{form_name name="user_zipcode" size="7"}:
		</span>
		<br />
		{form_input name="user_zipcode"}<br />
		{form_submit name="zipcode_search" value="½»½ê¸¡º÷"}<br />
		
		<!--ÃÏ°è¡ÊÅÔÆ»ÉÜ¸©¡Ë-->
		{if $config.profile_regist.prefecture_id}
		<span style="color:{$form_name_color}">
		{form_name name="prefecture_id"}:
		</span>
		{if $config.profile_regist_required.prefecture_id}<span style="color:red;">¢¨É¬¿Ü</span>{/if}
		<br />
		{form_input name="prefecture_id" emptyoption=""}<br />
		
		<!--ÃÏ°è¸ø³«-->
		{if $config.profile_regist_public.user_address}
		<span style="text-align:right;">
		{form_input name="user_address_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--ÃÏ°è¡Ê½»½ê¡Ë-->
		{if $config.profile_regist.user_address}
		<span style="color:{$form_name_color}">
		{form_name name="user_address"}:
		</span>
		{if $config.profile_regist_required.user_user_address}<span style="color:red;">¢¨É¬¿Ü</span>{/if}
		<span style="color:red;">/Èó¸ø³«</span>
		<br />
		{form_input name="user_address"}<br />
		{/if}
		
		<!--ÃÏ°è¡Ê·úÊª¡Ë-->
		{if $config.profile_regist.user_address_building}
		<span style="color:{$form_name_color}">
		{form_name name="user_address_building"}:
		</span>
		{if $config.profile_regist_required.user_address_building}<span style="color:red;">¢¨É¬¿Ü</span>{/if}
		<span style="color:red;">/Èó¸ø³«</span>
		<br />
		{form_input name="user_address_building"}<br />
		{/if}
		
		<!--·ì±Õ·¿-->
		{if $config.profile_regist.user_blood_type}
		<span style="color:{$form_name_color}">
		{form_name name="user_blood_type"}:
		</span>
		{if $config.profile_regist_required.user_blood_type}<span style="color:red;">¢¨É¬¿Ü</span>{/if}
		<br />
		{form_input name="user_blood_type"}<br />
		
		<!--·ì±Õ·¿¸ø³«-->
		{if $config.profile_regist_public.user_blood_type}
		<span style="text-align:right;">
		{form_input name="user_blood_type_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--¿¦¼ï-->
		{if $config.profile_regist.job_family_id}
		<span style="color:{$form_name_color}">
		{form_name name="job_family_id"}:
		</span>
		{if $config.profile_regist_required.job_family_id}<span style="color:red;">¢¨É¬¿Ü</span>{/if}
		<br />
		{form_input name="job_family_id" emptyoption=""}<br />
		
		<!--¿¦¼ï¸ø³«-->
		{if $config.profile_regist_public.job_family_id}
		<span style="text-align:right;">
		{form_input name="job_family_id_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--¶È¼ï-->
		{if $config.profile_regist.business_category_id}
		<span style="color:{$form_name_color}">
		{form_name name="business_category_id"}:
		</span>
		{if $config.profile_regist_required.business_category_id}<span style="color:red;">¢¨É¬¿Ü</span>{/if}
		<br />
		{form_input name="business_category_id" emptyoption=""}<br />
		
		<!--¶È¼ï¸ø³«-->
		{if $config.profile_regist_public.business_category_id}
		<span style="text-align:right;">
		{form_input name="business_category_id_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--·ëº§-->
		{if $config.profile_regist.user_is_married}
		<span style="color:{$form_name_color}">
		{form_name name="user_is_married"}
		</span>
		{if $config.profile_regist_required.user_is_married}<span style="color:red;">¢¨É¬¿Ü</span>{/if}
		<br />
		{form_input name="user_is_married"}<br />
		
		<!--·ëº§¸ø³«-->
		{if $config.profile_regist_public.user_is_married}
		<span style="text-align:right;">
		{form_input name="user_is_married_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--»Ò¶¡-->
		{if $config.profile_regist.user_has_children}
		<span style="color:{$form_name_color}">
		{form_name name="user_has_children"}:
		</span>
		{if $config.profile_regist_required.user_has_children}<span style="color:red;">¢¨É¬¿Ü</span>{/if}
		<br />
		{form_input name="user_has_children"}<br />
		
		<!--»Ò¶¡¸ø³«-->
		{if $config.profile_regist_public.user_has_children}
		<span style="text-align:right;">
		{form_input name="user_has_children_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--¶ÐÌ³ÃÏ-->
		{if $config.profile_regist.work_location_prefecture_id}
		<span style="color:{$form_name_color}">
		{form_name name="work_location_prefecture_id"}:
		</span>
		{if $config.profile_regist_required.work_location_prefecture_id}<span style="color:red;">¢¨É¬¿Ü</span>{/if}
		<br />
		{form_input name="work_location_prefecture_id" emptyoption=""}<br />
		
		<!--¶ÐÌ³ÃÏ¸ø³«-->
		{if $config.profile_regist_public.work_location_prefecture_id}
		<span style="text-align:right;">
		{form_input name="work_location_prefecture_id_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--¼ñÌ£-->
		{if $config.profile_regist.user_hobby}
		<span style="color:{$form_name_color}">
		{form_name name="user_hobby"}:
		</span>
		{if $config.profile_regist_required.user_hobby}<span style="color:red;">¢¨É¬¿Ü</span>{/if}
		<br />
		{form_input name="user_hobby"}<br />
		
		<!--¼ñÌ£¸ø³«-->
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
		
		<!--URL¸ø³«-->
		{if $config.profile_regist_public.user_url}
		<span style="text-align:right;">
		{form_input name="user_url_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<!--¼«¸Ê¾Ò²ð-->
		{if $config.profile_regist.user_introduction}
		<span style="color:{$form_name_color}">
		{form_name name="user_introduction"}
		</span>
		{if $config.profile_regist_required.user_introduction}<span style="color:red;">¢¨É¬¿Ü</span>{/if}
		<br />
		{form_input name="user_introduction"}<br />
		
		<!--¼«¸Ê¾Ò²ð¸ø³«-->
		{if $config.profile_regist_public.user_introduction}
		<span style="text-align:right;">
		{form_input name="user_introduction_public"}
		</span>
		<br />
		{/if}
		{/if}
		
		<br />
		<div style="text-align:center;font-size:small;">{form_submit name="submit" value="ÍøÍÑµ¬Ìó¤ËÆ±°Õ¤·¤ÆÅÐÏ¿"}</div>
	{/form}
</div>
<!--¥³¥ó¥Æ¥ó¥Ä½ªÎ»-->

<!--¥Õ¥Ã¥¿¡¼-->
{include file="user/footer.tpl"}
