{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>コミュニティ編集</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_community_edit_do"}
			{form_input name="community_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="community_id"}</th>
					<td>{$form.community_id}</td>
				</tr>
				<tr>
					<th>{form_name name="community_title"}</th>
					<td>{form_input name="community_title" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="community_category_id"}</th>
					<td>{form_input name="community_category_id"}</td>
				</tr>
					<th>{form_name name="community_join_condition"}</th>
					<td>{form_input name='community_join_condition'}</td>
				</tr>
				<tr>
					<th>{form_name name="community_topic_permission"}</th>
					<td>{form_input name="community_topic_permission"}</td>
				</tr>
				<tr>
					<th>{form_name name="community_description"}</th>
					<td>{form_input name="community_description" rows=20 cols=80}</td>
				</tr>
				<tr>
					<th>画像</th>
					<td>
						{if $form.image_id}
						<img src="f.php?type=image&id={$form.image_id}&attr=t"><br />
						{form_input name="delete_image"}
						{else}
						なし
						{/if}
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="　`$ft.community.name`編集　"}</td>
				</tr>
			</table>
			{/form}
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
