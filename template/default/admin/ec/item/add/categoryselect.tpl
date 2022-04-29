{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>商品追加</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_ec_item_add" method="post" enctype="multipart/form-data"}
			　商品追加にはカテゴリ指定が必要です。<br />
			　以下よりカテゴリを選択してください。
			<table class="sheet">
				<tr>
					<th>{form_name  name="item_category_id"}</th>
					<td>{form_input name="item_category_id"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="　商品追加画面へ　"}</td>
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
