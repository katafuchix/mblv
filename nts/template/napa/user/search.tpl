<!--�إå���-->
{include file="user/header.tpl"}

<!--�����ȥ�-->
{html_style type="title" title="`$ft.friend_name.name`����" bgcolor=$title_bgcolor fontcolor=$title_fontcolor}

<!--����ƥ�ĳ���-->
<div align="left" style="text-align:left;font-size:small;">
	{include file="user/errors.tpl"}
	{form action="$script" ethna_action="user_search_do"}
	<span style="color:{$form_name_color};">
	{form_name name="user_nickname"}:
	</span>
	<br />
	{form_input name="user_nickname"}<br />
	<br />
	{form_name name="user_age"}<br />
	{form_input name="user_age_min" size="4" istyle="4" mode="numeric"}�� �� {form_input name="user_age_max" size="4" istyle="4" mode="numeric"}��<br />
	<br />
	{form_name name="user_sex"}<br />
	{form_input name="user_sex" size="2"}<br />
	<br />
	{form_name name="prefecture_id"}<br />
	{form_input name="prefecture_id"  emptyoption=""}<br />
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
	<br />
	<hr color="{$hrcolor}" style="border:solid 1px {$hrcolor};">
	<br />
	{$ft.friend_name.name}�򸡺����ޤ���<br />
	<br />
	<div  style="text-align:center;font-size:small;">{form_input name="search"}</div>
	{/form}
</div>
<!--����ƥ�Ľ�λ-->

<!--�եå���-->
{include file="user/footer.tpl"}
