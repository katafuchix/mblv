{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ここからメインコンテンツ-->
				<h2>{$ft.shop.name}情報編集</h2>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				{form action="$script" ethna_action="admin_ec_shop_edit_do" method="post" enctype="multipart/form-data"}
				{form_input name="shop_id"}
				<table class="sheet" id="w200">
					<tr>
						<th>{form_name name="shop_id"}</th>
						<td>{$form.shop_id}</td>
					</tr>
					<tr>
						<th>{form_name name="shop_name"}<br /><span class="required"></span></th>
						<td>{form_input name="shop_name" size=50}<br /><span class="err">*全角50文字まで</span></td>
					</tr>
					<tr>
						<th>{form_name name="shop_news"}</th>
						<td>{form_input name="shop_news" cols=80 rows=10}</td>
					</tr>
					<tr>
						<th>{form_name name="shop_bgcolor"}<br /><span class="required"></span></th>
						<td>{form_input name="shop_bgcolor" size=8}</td>
					</tr>
					<tr>
						<th>{form_name name="shop_textcolor"}<br /><span class="required"></span></th>
						<td>{form_input name="shop_textcolor" size=8}</td>
					</tr>
					<tr>
						<th>{form_name name="shop_linkcolor"}<br /><span class="required"></span></th>
						<td>{form_input name="shop_linkcolor" size=8}</td>
					</tr>
					<tr>
						<th>{form_name name="shop_alinkcolor"}<br /><span class="required"></span></th>
						<td>{form_input name="shop_alinkcolor" size=8}</td>
					</tr>
					<tr>
						<th>{form_name name="shop_vlinkcolor"}<br /><span class="required"></span></th>
						<td>{form_input name="shop_vlinkcolor" size=8}</td>
					</tr>
					<tr>
						<th>{form_name name="shop_new_arrivals"}</th>
						<td>{form_input name="shop_new_arrivals" size=50}<br />有効な{$ft.item_id.name}：{$app.item_id_csv}<br /><span class="err">「,」区切りで{$ft.item_id.name}を入力してください。</span></td>
					</tr>
					<tr>
						<th>{form_name name="shop_ranking"}</th>
						<td>{form_input name="shop_ranking" size=50}<br />有効な{$ft.item_id.name}：{$app.item_id_csv}<br /><span class="err">「,」区切りで{$ft.item_id.name}を入力してください。</span></td>
					</tr>
					<tr>
						<th>{form_name name="shop_image1_file"}<br /><span class="required"></span></th>
						<td>{if $form.shop_image1}<img src="f.php?file=shop/{$form.shop_image1}">{/if}<br />
						{form_input name="shop_image1"}
						{form_input name="shop_image1_file"}<br />
						{form_input name="shop_image1_status"}<br /><span class="err">拡張子は「jpg」か「gif」にしてください。</span></td>
					</tr>
					<tr>
						<th>{form_name name="shop_image2_file"}<br /><span class="required"></span></th>
						<td>{if $form.shop_image2}<img src="f.php?file=shop/{$form.shop_image2}">{/if}<br />
						{form_input name="shop_image2"}
						{form_input name="shop_image2_file"}<br />
						{form_input name="shop_image2_status"}<br /><span class="err">拡張子は「jpg」か「gif」にしてください。</span></td>
					</tr>
					<tr>
						<th>{form_name name="shop_category_print_status"}</th>
						<td>{form_input name="shop_category_print_status"}</td>
					</tr>
					<tr>
							<th width="10%">{form_name  name="shop_body"}
							</th>
							<td>
								{$ft.menu_icon.name}<a name="file" href="#file" onClick="javascript:void(window.open('?action_admin_file=true','ファイル管理','width=700,height=700,scrollbars=yes'))">ファイル管理</a>&nbsp;&nbsp;
								{$ft.menu_icon.name}<a name="tag" href="#tag" onClick="javascript:void(window.open('?action_admin_util=true&page=tag_contents','タグリファレンス','width=700,height=700,scrollbars=yes'))">タグリファレンス</a><br />
								{form_input name="shop_body" cols=80 rows=10}
							</td>
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
