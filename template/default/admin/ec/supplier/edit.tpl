{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ここからメインコンテンツ-->
				<h2>{$ft.supplier.name}情報編集</h2>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				{form action="$script" ethna_action="admin_ec_supplier_edit_do" method="post" enctype="multipart/form-data"}
				{form_input name="supplier_id"}
				<table class="sheet" id="w200">
					<tr>
						<th>{form_name  name="supplier_name"}<br /><span class="required"></span></th>
						<td>{form_input name="supplier_name" size=50}</td>
					</tr>
					<tr>
						<th>{form_name  name="supplier_shipping_type"}<br /><span class="required"></span></th>
						<td>{form_input name="supplier_shipping_type"}</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_id"}<br /><span class="required"></span></th>
						<td>{form_input name="postage_id"}</td>
					</tr>
					<tr>
						<th>{$ft.supplier_settlement.name}<br /><span class="required"></span></th>
						<td>
							{form_input name="supplier_use_credit_status"}
							{form_input name="supplier_use_conveni_status"}
							{form_input name="supplier_use_exchange_status"}
							{form_input name="supplier_use_transfer_status"}
						</td>
					</tr>
					<tr>
						<th>{form_name  name="exchange_id"}<br /><span class="required"></span></th>
						<td>{form_input name="exchange_id"}</td>
					</tr>
					<tr>
						<th>{form_name name="supplier_bundle_allow_id"}</th>
						<td>
							{foreach from=$app.supplier_allow_list item=i}
							<label for="supplier_bundle_allow_id_{$i.id}"><input type="checkbox" name="supplier_bundle_allow_id[]" value="{$i.id}" id="supplier_bundle_allow_id_{$i.id}" {if $i.checked}checked="checked"{/if} {if $i.id == $app.supplier_id }checked="checked" disabled{/if} />{$i.name}</label>
							{/foreach}
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
