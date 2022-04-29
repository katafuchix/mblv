{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			<h2>{$ft.ad_category.name}登録</h2>
			{form ethna_action="admin_adcategory_add_do"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="ad_category_name"}</th>
					<td>{form_input name="ad_category_name" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_category_desc"}</th>
					<td>{form_input name="ad_category_desc" size="50"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="登録"}</td>
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
