{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.video_category.name}��Ͽ</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_videocategory_add_do" enctype="multipart/form-data"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="video_category_name"}<br /><span class="required"></span></th>
					<td>{form_input name="video_category_name" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="video_category_desc"}<br /><span class="required"></span></th>
					<td>{form_input name="video_category_desc" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="video_category_file1"}</th>
					<td>{form_input name="video_category_file1"}</td>
				</tr>
				<tr>
					<th>{form_name name="video_category_color"}</th>
					<td>{form_input name="video_category_color"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="����Ͽ��"}</td>
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
