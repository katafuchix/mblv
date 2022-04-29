{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.item.name}編集</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_ec_item_edit_do" method="post" enctype="multipart/form-data"}
			{form_input name="shop_id"}
			{form_input name="shop_name"}
			{form_input name="item_id"}
			{$app_ne.hidden_vars}
			<table class="sheet" id="w200">
				<tr>
					<th width="10%">{$ft.shop_name.name}</th>
					<td>{$form.shop_name}</td>
				</tr>
				<tr>
					<th width="10%">{form_name name="item_name"}<br /><span class="required"></span></td>
					<td>{form_input name="item_name" size="50"}</td>
				</tr>
				<tr>
					<th width="10%">{form_name name="item_distinction_id"}</td>
					<td>{form_input name="item_distinction_id" size="50"}</td>
				</tr>
				<tr>
					<th width="10%">{form_name name="item_category_id"}<br /><span class="required"></span></th>
					<td>{form_input name="item_category_id" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name  name="supplier_id"}<br /><span class="required"></span></th>
					<td>{form_input name="supplier_id"}</td>
				</tr>
				<tr>
					<th>{form_name  name="postage_id"}<br /><span class="required"></span></th>
					<td>{form_input name="postage_id"}</td>
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
					<th>{form_name  name="exchange_id"}<br /><span class="required"></span></th>
					<td>{form_input name="exchange_id"}</td>
				</tr>
				<tr>
					<th>{form_name  name="item_bundle_status"}</td>
					<td>{form_input name="item_bundle_status"}</td>
				</tr>
				<tr>
					<th>{form_name name="item_price"}<br /><span class="required"></span></td>
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
					<th>{form_name name="item_point"}</td>
					<td>{form_input name="item_point"}{$ft.point_unit.name}</td>
				</tr>
				<tr>
					<th>{form_name name="item_text1"}<br /><span class="required"></span></td>
					<td><textarea name="item_text1" rows="4" cols="80">{$form.item_text1|replace_emoji_form}</textarea></td>
				</tr>
				<tr>
					<th>{form_name name="item_text2"}<br /><span class="required"></span></td>
					<td><textarea name="item_text2" rows="4" cols="80">{$form.item_text2|replace_emoji_form}</textarea></td>
				</tr>
				<tr>
					<th>{form_name name="item_detail"}</td>
					<td><textarea name="item_detail" rows="4" cols="80">{$form.item_detail|replace_emoji_form}</textarea></td>
				</tr>
				<tr>
					<th>{form_name name="item_spec"}</td>
					<td><textarea name="item_spec" rows="4" cols="80">{$form.item_spec|replace_emoji_form}</textarea></td>
				</tr>
				<tr>
					<th>{form_name name="item_image_file"}</td>
					<td>
						{if $form.item_image}
							<img src="f.php?file=item/{$form.item_image}"><br />
						{/if}
						<br />{form_input name="item_image_file"}<br />
						{form_input name="item_image_status"}
						{form_input name="item_image"}
					</td>
				</tr>
				<tr>
					<th valign="top">{form_name name="item_type"}×{form_name name="stock_num"}:{form_name name="stock_priority_id"}<br /><span class="required"></span></td>
					<td>
						{foreach from=$app.stock_list item=i name=temp1}
							<input type="hidden" name="stock_id[]" value="{$i.stock_id}">
							<input type="text" name="item_type[]" value="{$i.item_type|replace_emoji_form}">×<input type="text" name="stock_num[]" value="{$i.stock_num}">:{select name="stock_priority_id[]" list=$app.stock_priority_id_list value=$i.stock_priority_id}
							{if $smarty.foreach.temp1.first}
								<label for="stock_one_type_status_1"><input type="hidden" name="one_type_only_id" value="{$i.stock_id}"><input type="checkbox" id="stock_one_type_status_1" name="stock_one_type_status" value="1" {if $i.stock_one_type_status}checked="checked"{/if} >このタイプのみの商品</label>
							{/if}
							<br />
						{/foreach}
						{*同梱不可設定の商品の場合はフォーム追加を表示しない*}
						{if !$form.item_bundle_status}
							{if $form.new_item_type}
								{foreach from=$form.new_item_type item=i key=k}
									<input type="text" name="new_item_type[]" value="{$i|replace_emoji_form}">×<input type="text" name="new_stock_num[]" value="{$form.new_stock_num[$k]}"><br />
								{/foreach}
							{/if}
							<div id="new_type"></div>
							<input type="button" value="フォームを追加" onClick="insertTextForm('new_type')">
						{/if}<br /><span class="err">「タイプ」を空にすることで、指定したタイプを無効にできます。<br />「在庫」を0にすることで、>指定したタイプを売り切れ状態にできます。</span>
					</td>
				</tr>
				<tr>
					<th valign="top">{form_name name="sample_name"}×{form_name name="sample_image"}</td>
					<td>
						{foreach from=$app.sample_list item=i}
							{if $i.sample_image}
								<br />
									<img src="f.php?file=sample/{$i.sample_image}">
								<br />
							{/if}
							<input type="hidden" name="sample_id[]" value="{$i.sample_id}">
							<input type="text" name="sample_name[]" value="{$i.sample_name|replace_emoji_form}">
							×
							<input type="file" name="sample_image_file[]" value="{$i.sample_id}">
							{select name="sample_priority_id[]" list=$app.sample_priority_id_list value=$i.sample_priority_id}
							{select name="sample_image_status[]" list=$app.item_image_status value=$form.sample_image_status}<br />
						{/foreach}
						{if $form.sample_name}
							{foreach from=$form.new_sample_name item=i key=k}
								<input type="text" name="new_sample_name[]" value="{$i}">
								×
								<input type="file" name="new_sample_image_file[]" value=""><br />
							{/foreach}
						{else}
							<input type="text" name="new_sample_name[]" value="">
							×
							<input type="file" name="new_sample_image_file[]" value="">
						{/if}
						<div id="new_sample"></div>
						<input type="button" value="フォームを追加" onClick="insertTextForm('new_sample')">
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
								{$ft.menu_icon.name}<a name"tag" href="#tag" onClick="javascript:void(window.open('?action_admin_util=true&page=tag_contents','タグリファレンス','width=700,height=700,scrollbars=yes'))">タグリファレンス</a><br />
								{form_input name="item_contents_body" cols="80" rows=10}
							</td>
						</tr>
					<tr>
				<tr>
					<th></td>
					<td>{form_input name="edit" value="　`$ft.item.name`編集　"}</td>
				</tr>
			</table>
			{/form}
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- ***********************  #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
