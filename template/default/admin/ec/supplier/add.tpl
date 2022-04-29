{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ここからメインコンテンツ-->
				<h2>{$ft.supplier.name}情報追加</h2>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				{form action="$script" ethna_action="admin_ec_supplier_add_do" method="post" enctype="multipart/form-data"}
				{uniqid}
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
						<th>{form_name  name="supplier_bundle_allow_id"}</th>
						<td>{form_input name="supplier_bundle_allow_id"}</td>
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
