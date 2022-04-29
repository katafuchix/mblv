{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.item.name}登録</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_item_add&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.item.name}登録FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_ec_item_add_do" method="post" enctype="multipart/form-data"}
			{uniqid}
			{form_input name="shop_id"}
			{form_input name="shop_name"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="shop_name"}</th>
					<td>{$form.shop_name}</td>
				</tr>
				<tr>
					<th>{form_name  name="item_name"}<br /><span class="required"></span></th>
					<td>{form_input name="item_name" size=50}</td>
				</tr>
				<tr>
					<th>{form_name  name="item_distinction_id"}</th>
					<td>{form_input name="item_distinction_id" size=50}</td>
				</tr>
				<tr>
					<th>{$ft.item_category.name}<br /><span class="required"></span></th>
					<td>
						{form_input name="item_category_id" emptyoption=""}
					</td>
				</tr>
				<tr>
					<th>{form_name  name="supplier"}<br /><span class="required"></span></th>
					<td>
						{form_input name="supplier_id" id="supplier_id" emptyoption="" onchange="settlementSearch(document.forms[0].supplier_id.value);"}
					</td>
				</tr>
				<tr>
					<th>{form_name  name="postage"}<br /><span class="required"></span></th>
					<td>
						{form_input name="postage_id" emptyoption=""}
					</td>
				</tr>
				<tr>
					<th>{$ft.item_settlement.name}<br /><span class="required"></span></th>
					<td>
						{form_input name="item_use_credit_status"}
						{form_input name="item_use_conveni_status"}
						{form_input name="item_use_exchange_status"}
						{form_input name="item_use_transfer_status"}
					</td>
				</tr>
				<tr>
					<th>{form_name  name="exchange"}<br /><span class="required"></span></th>
					<td>
						{form_input name="exchange_id" emptyoption=""}
					</td>
				</tr>
				<tr>
					<th>{form_name name="item_bundle_status"}</td>
					<td>{form_input name="item_bundle_status"}</td>
				</tr>
				<tr>
					<th>{form_name  name="item_price"}<br /><span class="required"></span></th>
					<td>{form_input name="item_price"}円</td>
				</tr>
				<tr>
					<th>{form_name  name="item_label_front"}</th>
					<td>{form_input name="item_label_front"}</td>
				</tr>
				<tr>
					<th>{form_name  name="item_label_back"}</th>
					<td>{form_input name="item_label_back"}</td>
				</tr>
				<tr>
					<th>{form_name  name="item_point"}</th>
					<td>{form_input name="item_point"}{$ft.point_unit.name}</td>
				</tr>
				<tr>
					<th>{form_name  name="item_text1"}<br /><span class="required"></span></th>
					<td>{form_input name="item_text1" rows="4" cols="80"}</td>
				</tr>
				<tr>
					<th>{form_name  name="item_text2"}<br /><span class="required"></span></th>
					<td>{form_input name="item_text2" rows="4" cols="80"}</td>
				</tr>
				<tr>
					<th>{form_name name="item_detail"}</td>
					<td>{form_input name="item_detail" rows="4" cols="80"}</td>
				</tr>
				<tr>
					<th>{form_name name="item_spec"}</td>
					<td>{form_input name="item_spec" rows="4" cols="80"}</td>
				</tr>
				<tr>
					<th>{form_name name="item_image_file"}</td>
					<td>
						{if $form.item_image}
							<img src="f.php?file=item/{$form.item_image}"><br />
						{/if}
						{form_input name="item_image_file"}
						{form_input name="item_image_status"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="item_type"}×{form_name name="stock_num"}<br /><span class="required"></span></th>
					<td>
						{if $form.item_type}
							{foreach from=$form.item_type item=i key=k name=temp1}
								<input type="text" name="item_type[]" value="{$i}">
								×
								<input type="text" name="stock_num[]" value="{$form.stock_num[$k]}">
								{if $smarty.foreach.temp1.first}
									{if $form.stock_one_type_status}
										{form_input name="stock_one_type_status" default="1"}
									{else}
										{form_input name="stock_one_type_status"}
									{/if}
								{/if}
								<br />
							{/foreach}
						{else}
							<input type="text" name="item_type[]" value="">
							×
							<input type="text" name="stock_num[]" value="">
							{form_input name="stock_one_type_status"}
						{/if}
						<div id="type"></div>
						<input type="button" value="フォームを追加" onClick="insertTextForm('type')">
					</td>
				</tr>
				<tr>
					<th>{form_name name="sample_name"}×{form_name name="sample_image"}</th>
					<td>
						{if $form.sample_name}
							{foreach from=$form.sample_name item=i key=k}
								<input type="text" name="sample_name[]" value="{$i}">
								×
								<input type="file" name="sample_image_file[]" value="{$form.sample_image_file[$k]}"><br />
							{/foreach}
						{else}
							<input type="text" name="sample_name[]" value="">
							×
							<input type="file" name="sample_image_file[]" value="">
						{/if}
						<div id="sample"></div>
						<input type="button" value="フォームを追加" onClick="insertTextForm('sample')">
					</td>
				</tr>
				<tr>
					<th>{form_name name="item_start_time"}</th>
					<td>
						{form_input name="item_start_status"}{form_name name="item_start_status"}<br />
						{form_input name="item_start_year" emptyoption=""}年
						{form_input name="item_start_month" emptyoption=""}月
						{form_input name="item_start_day" emptyoption=""}日
						{form_input name="item_start_hour" emptyoption=""}時
						{form_input name="item_start_min" emptyoption=""}分から販売
					</td>
				</tr>
				<tr>
					<th>{form_name name="item_end_time"}</th>
					<td>
						{form_input name="item_end_status"}{form_name name="item_end_status"}<br />
						{form_input name="item_end_year" emptyoption=""}年
						{form_input name="item_end_month" emptyoption=""}月
						{form_input name="item_end_day" emptyoption=""}日
						{form_input name="item_end_hour" emptyoption=""}時
						{form_input name="item_end_min" emptyoption=""}分まで販売
					</td>
				</tr>
				<tr>
					<th>{form_name  name="item_status"}</th>
					<td>{form_input name="item_status" }</td>
				</tr>
				<tr>
					<th width="10%">{form_name  name="item_contents_body"}
					</th>
					<td>
						{$ft.menu_icon.name}<a name="file" href="#file" onClick="javascript:void(window.open('?action_admin_file=true','ファイル管理','width=700,height=700,scrollbars=yes'))">ファイル管理</a>
						{$ft.menu_icon.name}<a name="tag" href="#tag" onClick="javascript:void(window.open('?action_admin_util=true&page=tag_contents','タグリファレンス','width=700,height=700,scrollbars=yes'))">タグリファレンス</a><br />
						{form_input name="item_contents_body" cols="80" rows="10"}
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_input name="add" value="　`$ft.item.name`登録　"}</td>
				</tr>
			</table>
			
			{/form}
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{*}{include file="admin/side.tpl"}{*}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
