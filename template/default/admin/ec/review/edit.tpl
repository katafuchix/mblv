{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.review.name}編集</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_ec_review_edit_do"}
			{form_input name="review_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="review_id"}</th>
					<td>{$form.review_id}</td>
				</tr>
				<tr>
					<th>{form_name name="review_title"}<br /><span class="required"></span></th>
					<td>{form_input name="review_title" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="review_body"}<br /><span class="required"></span></th>
					<td>{form_input name="review_body" cols="40" rows="20"}</td>
				</tr>
				<tr>
					<th>{form_name name="review_status"}</th>
					<td>{form_input name="review_status"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_input name="edit" value="　編集　"}</td>
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
