<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="�����Ͽ" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	<span style="color:{$menucolor}">{$ft.menu_icon.name}</span><a href="fp.php?code=guide_terms">{$sns_name}���ѵ���</a><br />
	����Ͽ���ˡ����ѵ��󤪤�ӥץ饤�Х����ݥꥷ����褯���ɤߤξ头��Ͽ����������<br />
	<br />
	{form ethna_action="user_regist_do" action="`$script`?guid=ON"}
		{form_input name="user_hash"}
		
		<!--�˥å��͡���-->
		<span style="color:{$form_name_color}">
		{form_name name="user_nickname"}:
		</span>
		<span style="color:red;">��ɬ��</span>
		<span style="color:red;">*���ٷ�᤿�˥å��͡�����ѹ��Ǥ��ޤ���</span>
		<br />
		{form_input name="user_nickname" maxlength="32"}<br />
		
		<!--�ѥ����-->
		<span style="color:{$form_name_color}">
		{form_name name="user_password"}:
		</span>
		<span style="color:red;">��ɬ��</span>
		<span style="color:red;">*Ⱦ�ѱѿ���4ʸ���ʾ�</span><br />
		{form_input name="user_password" istyle="3" mode="alphabet"}<br />
		
		{if $config.profile.user_sex}
		<!--����-->
		<span style="color:{$form_name_color}">
		{form_name name="user_sex"}:
		</span>
		{if $config.profile_required.user_sex}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="user_sex"}
		
		{*<!--���̸���-->
		<span style="text-align:right;">
		{form_input name="user_sex_public"}
		</span>
		*}
		<br />
		{/if}
		
		{if $config.profile.user_birth_date}
		<!--��ǯ����-->
		<span style="color:{$form_name_color}">
		��ǯ����:
		</span>
		{if $config.profile_required.user_birth_date}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="user_birth_date_year" size="4" istyle="4" mode="numeric"}ǯ
		{form_input name="user_birth_date_month" size="2" istyle="4" mode="numeric"}��
		{form_input name="user_birth_date_day" size="2" istyle="4" mode="numeric"}��
		
		{*<!--��ǯ��������-->
		<span style="text-align:right;">
		{form_input name="user_birth_date_public"}
		</span>
		<br />
		*}
		{/if}
		
		{*
		{if $config.profile.prefecture_id}
		<!--�ϰ����ƻ�ܸ���-->
		<span style="color:{$form_name_color}">
		{form_name name="prefecture_id"}:
		</span>
		{if $config.profile_required.prefecture_id}<span style="color:red;">��ɬ��</span>{/if}
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
		{if $config.profile_required.user_user_address}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="user_address"}<br />
		{/if}
		
		{if $config.profile.user_address_building}
		<!--�ϰ�ʷ�ʪ��-->
		<span style="color:{$form_name_color}">
		{form_name name="user_address_building"}:
		</span>
		{if $config.profile_required.user_address_building}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="user_address_building"}<br />
		{/if}
		
		{if $config.profile.user_blood_type}
		<!--��շ�-->
		<span style="color:{$form_name_color}">
		{form_name name="user_blood_type"}:
		</span>
		{if $config.profile_required.user_blood_type}<span style="color:red;">��ɬ��</span>{/if}
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
		{if $config.profile_required.job_family_id}<span style="color:red;">��ɬ��</span>{/if}
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
		{if $config.profile_required.business_category_id}<span style="color:red;">��ɬ��</span>{/if}
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
		{if $config.profile_required.user_is_married}<span style="color:red;">��ɬ��</span>{/if}
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
		{if $config.profile_required.user_has_children}<span style="color:red;">��ɬ��</span>{/if}
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
		{if $config.profile_required.work_location_prefecture_id}<span style="color:red;">��ɬ��</span>{/if}
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
		{if $config.profile_required.user_hobby}<span style="color:red;">��ɬ��</span>{/if}
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
		{if $config.profile_required.user_url}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="user_url"}
		
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
		{if $config.profile_required.user_introduction}<span style="color:red;">��ɬ��</span>{/if}
		<br />
		{form_input name="user_introduction"}
		
		<!--���ʾҲ����-->
		<span style="text-align:right;">
		{form_input name="user_introduction_public"}
		</span>
		<br />
		{/if}
		*}
		
		<br />
		<br />
		<div style="text-align:center;font-size:small;">{form_submit name="submit" value="���ѵ����Ʊ�դ�����Ͽ"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl" no_footer="true" no_navi="true"}
