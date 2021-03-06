{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ここからメインコンテンツ-->

		<h2>プロフィール項目の編集</h2>
		<div class="entry_box">
			{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
		</div>
		{form ethna_action="admin_config_user_prof_edit_do"}
			{form_input name="config_user_prof_id"}
			<table>
				<tr>
					<th>{form_name name="config_user_prof_name"}</th>
					<td>{form_input name="config_user_prof_name"}</td>
				</tr>
				<tr>
					<th>{form_name name="config_user_prof_type"}</th>
					<td>
						{html_options name="config_user_prof_type" options=$app.configUserProfTypeList selected=$form.config_user_prof_type}
					</td>
				</tr>
				<tr>
					<td>
						{form_input name="back"}
						{form_input name="submit"}
					</td>
				</tr>
			</table>
		{/form}
{if $form.config_user_prof_type >= 3}
		<h2>選択枝の編集</h2>
		<table>
			<tr>
				<th>項目名</th>
				<th>表示順序</th>
				<th>操作</th>
			</tr>
{foreach from=$app.configUserProfOptionList item=item}
			<tr>
				<td>{$item.config_user_prof_option_name}</td>
				<td>
					{form ethna_action="admin_config_user_prof_option_move_do"}
						{form_input name="config_user_prof_id" value="`$item.config_user_prof_id`"}
						{form_input name="config_user_prof_option_id" value="`$item.config_user_prof_option_id`"}
						{form_input name="up"}
						{form_input name="down"}
					{/form}
				</td>
				<td>
					{form ethna_action="admin_config_user_prof_option_edit"}
						{form_input name="config_user_prof_id" value="`$item.config_user_prof_id`"}
						{form_input name="config_user_prof_id" value="`$item.config_user_prof_option_id`"}
						{form_input name="edit"}
					{/form}
				</td>
			</tr>
{foreachelse}
			<tr>
				<td colspan="2">選択枝は登録されていません</td>
			</tr>
{/foreach}
		</table>
		<h3>選択枝の追加</h3>
		{form ethna_action="admin_config_user_prof_option_add_do"}
			{form_input name="config_user_prof_id"}
			<table>
				<tr>
					<th>{form_name name="config_user_prof_option_name"}</th>
					<td>{form_input name="config_user_prof_option_name"}</td>
					<td>{form_input name="add"}</td>
				</tr>
			</table>
		{/form}
{/if}
				<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
				<!-- ここまでメインコンテンツ-->
			</div>
		</div>
		<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
