{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.ad_category.name}��Ͽ</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_adcategory_add_do"}
			<table class="sheet" id="w200">
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
					<td>{form_submit value="��`$ft.ad_category.name`��Ͽ��"}</td>
				</tr>
			</table>
			{uniqid}
			{/form}
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
