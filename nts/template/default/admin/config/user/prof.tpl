{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ここからメインコンテンツ-->
				<h2>プロフィール項目変更</h2>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				<table class="sheet">
					<tr>
						<th>項目名</th>
						<th>フォーム種別</th>
						<th>表示順序</th>
						<th>編集</th>
						<th>削除</th>
					</tr>
					{foreach from=$app.configUserProfList item=item}
						<tr>
							<td>{$item.config_user_prof_name}</td>
							<td>{$app.configUserProfTypeList[$item.config_user_prof_type]}</td>
							<td>
								{form ethna_action="admin_config_user_prof_move_do"}
									{form_input name="config_user_prof_id" value="`$item.config_user_prof_id`"}
									{form_input name="up"}
									{form_input name="down"}
								{/form}
							</td>
							<td>
								<a href="?action_admin_config_user_prof_edit=true&config_user_prof_id={$item.config_user_prof_id}">編集</a>
							</td>
							<td><a href="?action_admin_config_user_prof_delete_do=true&config_user_prof_id={$item.config_user_prof_id}" onClick="return confirm('本当にこの項目を削除してしまってよろしいですか？');">削除</a></td>
						</tr>
					{foreachelse}
						<tr>
							<td colspan="4">プロフィール項目は登録されていません</td>
						</tr>
					{/foreach}
				</table>
				
				<h2>項目の追加</h2>
				{form ethna_action="admin_config_user_prof_add_do"}
					<table class="sheet">
						<tr>
							<th>{form_name name="config_user_prof_name"}</th>
							<td>{form_input name="config_user_prof_name"}</td>
							<th>{form_name name="config_user_prof_type"}</th>
							<td>
								<select name="config_user_prof_type">
									{html_options options=$app.configUserProfTypeList}
								</select>
								※追加後のフォーム種別の変更はできません
							</td>
							<td>{form_input name="add"}</td>
						</tr>
					</table>
					{uniqid}
				{/form}
				
				<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
				<!-- ここまでメインコンテンツ-->
			</div>
		</div>
		<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
