{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ��������ᥤ�󥳥�ƥ��-->
				<h2>�Хʡ��ɲ�</h2>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				{form action="$script" ethna_action="admin_banner_add_do" enctype="multipart/form-data"}
				<table class="sheet">
					<tr>
						<th>{form_name name="banner_client"}</th>
						<td>{form_input name="banner_client" size=50}</td>
					</tr>
					<tr>
						<th>{form_name name="banner_type"}</th>
						<td>{select name="banner_type" list=$app.banner_type_list value=$form.banner_type}</td>
					</tr>
					<tr>
						<th>{form_name name="banner_body"}</th>
						<td>{form_input name="banner_body" size=50}</td>
					</tr>
					<tr>
						<th>{form_name name="banner_url"}</th>
						<td>{form_input name="banner_url" size=50}</td>
					</tr>
					<tr>
						<th>{form_name name="banner_image"}</th>
						<td>{form_input name="banner_image"}</td>
					</tr>
					<tr>
						<th></th>
						<td>{form_submit value="`$ft.banner.name`��Ͽ"}</td>
					</tr>
				</table>
				{uniqid}
				{/form}
				<p id="pagetop"><a href="javascript:pagetop(0);">�ڡ����ȥå�</a></p>
				<!-- �����ޤǥᥤ�󥳥�ƥ��-->
			</div>
		</div>
		<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}

