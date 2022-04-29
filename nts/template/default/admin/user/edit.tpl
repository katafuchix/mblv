{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>ユーザ情報編集</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_user_friend_list=true&user_id={$form.user_id}">友達一覧</a>
			{$ft.menu_icon.name}<a href="?action_admin_user_community_list=true&user_id={$form.user_id}">参加コミュニティ一覧</a>
			{$ft.menu_icon.name}<a href="?action_admin_point_home=true&user_id={$form.user_id}">ポイント通帳</a>
			{form ethna_action="admin_user_edit_do"}
			{form_input name="user_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="user_id"}</th>
					<td>{$form.user_id}</td>
				</tr>
				<tr>
					<th>{form_name name="user_nickname"}</th>
					<td>{form_input name="user_nickname" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_mailaddress"}</th>
					<td>{form_input name="user_mailaddress" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_password"}</th>
					<td>{form_input name="user_password"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_point"}</th>
					<td>{form_input name="user_point"}</td>
				</tr>
				<tr>
					<th>生年月日</th>
					<td>
					西暦{form_input name="user_birth_date_year" size="4"}年
					{form_input name="user_birth_date_month" size="2"}月
					{form_input name="user_birth_date_day" size="2"}日
				</tr>
				<tr>
					<th>{form_name name="user_sex"}</th>
					<td>{form_input name="user_sex"}</td>
				</tr>
				<tr>
					<th>{form_name name="prefecture_id"}</th>
					<td>{form_input name="prefecture_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_address"}</th>
					<td>{form_input name="user_address" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_address_building"}</th>
					<td>{form_input name="user_address_building" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_blood_type"}</th>
					<td>{form_input name="user_blood_type"}</td>
				</tr>
				<tr>
					<th>{form_name name="job_family_id"}</th>
					<td>{form_input name="job_family_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="business_category_id"}</th>
					<td>{form_input name="business_category_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_is_married"}</th>
					<td>{form_input name="user_is_married"}</td>
				</tr>
				<tr>
					<th>{form_name name="work_location_prefecture_id"}</th>
					<td>{form_input name="work_location_prefecture_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_hobby"}</th>
					<td>{form_input name="user_hobby" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_url"}</th>
					<td>{form_input name="user_url" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_introduction"}</th>
					<td>{form_input name="user_introduction"}</td>
				</tr>
				{if $config.option.guest}
				<tr>
					<th>{form_name name="user_guest_status"}</th>
					<td>{form_input name="user_guest_status"}※次回ログインから有効となります。</td>
				</tr>
				{/if}
				{foreach from=$app.configUserProfList item=item}
				<tr>
					<th>{$item.config_user_prof_name}</th>
					<td>
					{if $item.config_user_prof_type == 1}{* テキスト *}
						<input type="text" name="user_prof_text[{$item.config_user_prof_id}]" value="{$app.userProfValue[$item.config_user_prof_id]|replace_emoji_form}" size="50">
					{elseif $item.config_user_prof_type == 2}{* テキストエリア *}
						<textarea name="user_prof_textarea[{$item.config_user_prof_id}]" cols="40" rows="4">{$app.userProfValue[$item.config_user_prof_id]|replace_emoji_form}</textarea><br />
					{elseif $item.config_user_prof_type == 3}{* セレクトボックス *}
						<select name="user_prof_select[{$item.config_user_prof_id}]"><br />
						{foreach from=$item.config_user_prof_option item=option}
							<option value="{$option.config_user_prof_option_id}" {if $app.userProfValue[$item.config_user_prof_id] == $option.config_user_prof_option_id}selected{/if}>{$option.config_user_prof_option_name}</option>
						{/foreach}
					</select><br />
					{elseif $item.config_user_prof_type == 4}{* ラジオボタン *}
						{foreach from=$item.config_user_prof_option item=option}
						<input type="radio" name="user_prof_radio[{$item.config_user_prof_id}]" value="{$option.config_user_prof_option_id}" {if $app.userProfValue[$item.config_user_prof_id] == $option.config_user_prof_option_id}checked{/if}>{$option.config_user_prof_option_name}<br />
						{/foreach}
					{elseif $item.config_user_prof_type == 5}{* チェックボックス *}
						{foreach from=$item.config_user_prof_option item=option}
							<input type="checkbox" name="user_prof_checkbox[]" value="{$option.config_user_prof_option_id}" {if $app.isChecked[$option.config_user_prof_option_id]}checked{/if}>{$option.config_user_prof_option_name}<br />
						{/foreach}
					{/if}
					</td>
				</tr>
				{/foreach}
				<tr>
					<th>{form_name name="user_status"}</th>
					<td>{form_input name="user_status"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="　編集　"}</td>
				</tr>
			</table>
			{/form}
			
			<!--h2>ユーザ強制退会</h2>
			<div align="center">
				<td>
				{if $form.user_status == 4}{* 強制退会済み *}
					{form_name name="user_id"}：{$form.user_id}は強制退会済みです。
				{else}
					{form_name name="user_id"}：{$form.user_id}を
					<a href="?action_admin_user_resign_do=true&user_id={$form.user_id}" onClick="return confirm('本当にこの{$ft.user.name}を強制退会してもよろしいですか？');">強制退会する</a>
				{/if}
				</td>
			</div-->
			
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
