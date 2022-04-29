<!--ヘッダー-->
{include file="user/header.tpl"}

<!--タイトル-->
{html_style type="title" title="会員登録" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--コンテンツ開始-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="?action_user_util=true&page=terms">{$sns_name}利用規約</a><br />
	<br />
	{form ethna_action="user_regist_do" action="$script"}
		{form_input name="user_hash"}
		<span style="color:{$form_name_color}">
		{form_name name="user_nickname"}:
		</span>
		<br />
		{form_input name="user_nickname" maxlength="32"}<br />
		<span style="color:{$form_name_color}">
		{form_name name="user_password"}:
		</span>
		<span style="color:red;">*半角英数字4文字以上</span><br />
		{form_input name="user_password" istyle="3" mode="alphabet"}<br />
		
		{if $config.profile.user_sex}
		<span style="color:{$form_name_color}">
		{form_name name="user_sex"}:
		</span>
		<br />
		{form_input name="user_sex"}<br />
		{/if}
		
		{if $config.profile.user_birth_date}
		<span style="color:{$form_name_color}">
		生年月日:
		</span>
		<br />
		{form_input name="user_birth_date_year" size="4" istyle="4" mode="numeric"}年
		{form_input name="user_birth_date_month" size="2" istyle="4" mode="numeric"}月
		{form_input name="user_birth_date_day" size="2" istyle="4" mode="numeric"}日<br />
		{/if}
		
		{if $config.profile.prefecture_id}
		<span style="color:{$form_name_color}">
		{form_name name="prefecture_id"}:
		</span>
		<br />
		{form_input name="prefecture_id"}<br />
		{/if}
		
		{if $config.profile.user_address}
		<span style="color:{$form_name_color}">
		{form_name name="user_address"}:
		</span>
		<br />
		{form_input name="user_address"}<br />
		{/if}
		
		{if $config.profile.user_address_building}
		<span style="color:{$form_name_color}">
		{form_name name="user_address_building"}:
		</span>
		<br />
		{form_input name="user_address_building"}<br />
		{/if}
		
		{if $config.profile.user_blood_type}
		<span style="color:{$form_name_color}">
		{form_name name="user_blood_type"}:
		</span>
		<br />
		{form_input name="user_blood_type"}<br />
		{/if}
		
		{if $config.profile.job_family_id}
		<span style="color:{$form_name_color}">
		{form_name name="job_family_id"}:
		</span>
		<br />
		{form_input name="job_family_id"}<br />
		{/if}
		
		{if $config.profile.business_category_id}
		<span style="color:{$form_name_color}">
		{form_name name="business_category_id"}:
		</span>
		<br />
		{form_input name="business_category_id"}<br />
		{/if}
		
		{if $config.profile.user_is_married}
		<span style="color:{$form_name_color}">
		{form_name name="user_is_married"}
		</span>
		<br />
		{form_input name="user_is_married"}<br />
		{/if}
		
		{if $config.profile.user_has_children}
		<span style="color:{$form_name_color}">
		{form_name name="user_has_children"}:
		</span>
		<br />
		{form_input name="user_has_children"}<br />
		{/if}
		
		{if $config.profile.work_location_prefecture_id}
		<span style="color:{$form_name_color}">
		{form_name name="work_location_prefecture_id"}:
		</span>
		<br />
		{form_input name="work_location_prefecture_id"}<br />
		{/if}
		
		{if $config.profile.user_hobby}
		<span style="color:{$form_name_color}">
		{form_name name="user_hobby"}:
		</span>
		<br />
		{form_input name="user_hobby"}<br />
		{/if}
		
		{if $config.profile.user_url}
		<span style="color:{$form_name_color}">
		{form_name name="user_url"}
		</span>
		<br />
		{form_input name="user_url"}<br />
		{/if}
		
		{if $config.profile.user_introduction}
		<span style="color:{$form_name_color}">
		{form_name name="user_introduction"}
		</span>
		<br />
		{form_input name="user_introduction"}<br />
		{/if}
		
		<br />
		<div style="text-align:center;font-size:small;">{form_submit name="submit" value="利用規約に同意して登録"}</div>
	{/form}
</div>
<!--コンテンツ終了-->

<!--フッター-->
{include file="user/footer.tpl"}
