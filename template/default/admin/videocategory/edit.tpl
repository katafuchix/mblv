{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.video_category_name.name}編集</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_videocategory_edit_do" enctype="multipart/form-data"}
			{form_input name="video_category_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="video_category_id"}</th>
					<td>{$form.video_category_id}</td>
				</tr>
				<tr>
					<th>{form_name name="video_category_name"}<br /><span class="required"></span></th>
					<td>{form_input name="video_category_name" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="video_category_desc"}<br /><span class="required"></span></th>
					<td>{form_input name="video_category_desc" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="video_category_file1"}</th>
					<td>
						{if $form.video_category_file1}<img src="f.php?file=avatar/{$form.video_category_file1}" style="float:left;">{/if}
						{form_input name="video_category_file1"}
						<div style="float:left">
						{form_input name="video_category_file1_file"}<br />
						{form_input name="video_category_file1_status"}
						</div>
						<br class="clear" />
				</tr>
				<tr>
					<th>{form_name name="video_category_color"}</th>
					<td>{form_input name="video_category_color"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="　編集　"}</td>
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
