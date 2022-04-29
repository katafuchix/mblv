{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.decomail_category_name.name}編集</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_decomailcategory_edit_do"}
			{form_input name="decomail_category_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="decomail_category_id"}</th>
					<td>{$form.decomail_category_id}</td>
				</tr>
				<tr>
					<th>{form_name name="decomail_category_name"}</th>
					<td>{form_input name="decomail_category_name" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="decomail_category_desc"}</th>
					<td>{form_input name="decomail_category_desc" size="50"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="編集"}</td>
				</tr>
			</table>
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
