{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.game_category.name}登録</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_gamecategory_add_do"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="game_category_name"}<br /><span class="required"></span></th>
					<td>{form_input name="game_category_name" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="game_category_desc"}<br /><span class="required"></span></th>
					<td>{form_input name="game_category_desc" size="50"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="　登録　"}</td>
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
