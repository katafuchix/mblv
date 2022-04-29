{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ここからメインコンテンツ-->
				<h2>{$ft.banner.name}編集</h2>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				{form action="$script" ethna_action="admin_banner_edit_do" enctype="multipart/form-data"}
				{form_input name="banner_id"}
				<table class="sheet" id="w200">
					<tr>
						<th>{form_name name="banner_client"}<br /><span class="required"></span></th>
						<td>{form_input name="banner_client" size=50}</td>
					</tr>
					<tr>
						<th>{form_name name="banner_type"}<br /><span class="required"></span></th>
						<td>{form_input name="banner_type"}</td>
					</tr>
					<tr>
						<th>{form_name name="banner_body"}</th>
						<td>{form_input name="banner_body" size=50}</td>
					</tr>
					<tr>
						<th>{form_name name="banner_url"}<br /><span class="required"></span></th>
						<td>{form_input name="banner_url" size=50}</td>
					</tr>
					<tr>
						<th>{form_name name="banner_image"}</th>
						<td>
							{if $form.banner_image}
								<img src="f.php?file=banner/{$form.banner_image}"><br />
							{/if}
							{form_input name="banner_image"}
							{form_input name="banner_image_file"}<br />
							{form_input name="banner_image_status"}
						</td>
					</tr>
					<tr>
						<th></th>
						<td>{form_submit value="`$ft.banner.name`編集"}</td>
					</tr>
				</table>
				{uniqid}
				{/form}
					<!-- ここまでメインコンテンツ-->
			</div>
		</div>
		<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}

