{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.item_category.name}登録</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_itemcategory_add&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.item_category.name}登録FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_ec_itemcategory_add_do" method="post" enctype="multipart/form-data"}
			{uniqid}
			<table class="sheet" id="w200">
				<tr>
					<th>{$ft.shop_name.name}</th>
					<td>{form_input name="shop_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="item_category_name"}<br /><span class="required"></span></th>
					<td>{form_input name="item_category_name" size=50}</td>
				</tr>
				<tr>
					<th>{form_name name="item_category_text"}<br /><span class="required"></span></th>
					<td>{form_input name="item_category_text" size=50}</td>
				</tr>
				<tr>
					<th>{form_name  name="item_category_image1_file"}</th>
					<td>
						{if $form.item_category_image1}
							<img src="f.php?file=item_category/{$form.item_category_image1}"><br />
						{/if}
						<br />{form_input  name="item_category_image1_file"}<br />
					</td>
				</tr>
				<tr>
					<th width="10%">{form_name  name="item_category_contents_body"}
					</th>
					<td>
						{$ft.menu_icon.name}<a href="#" onClick="javascript:void(window.open('?action_admin_file=true','ファイル管理','width=700,height=700,scrollbars=yes'))">ファイル管理</a>
						{$ft.menu_icon.name}<a href="#" onClick="javascript:void(window.open('?action_admin_util=true&page=tag_contents','タグリファレンス','width=700,height=700,scrollbars=yes'))">タグリファレンス</a><br />
						{form_input name="item_category_contents_body" cols=80 rows=10}
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_input name="add" value="　登録　"}</td>
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
