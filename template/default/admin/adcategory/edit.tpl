{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			<h2>{$ft.ad_category.name}�Խ�</h2>
			{form ethna_action="admin_adcategory_edit_do"}
			{form_input name="ad_category_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="ad_category_id"}</th>
					<td>{$form.ad_category_id}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_category_name"}<br /><span class="required"></span></th>
					<td>{form_input name="ad_category_name" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_category_desc"}<br /><span class="required"></span></th>
					<td>{form_input name="ad_category_desc" size="50"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="��`$ft.ad_category.name`�Խ���"}</td>
				</tr>
			</table>
			{/form}
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
