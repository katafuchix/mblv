{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>�᡼��ƥ�ץ졼���Խ�</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_mailtemplate_edit_do"}
			{form_input name="mail_template_id"}
			<table class="sheet">
				<tr>
					<th width="200px">{form_name name="mail_template_id"}</th>
					<td>{$form.mail_template_id}</td>
				</tr>
				<tr>
					<th width="200px">{form_name name="mail_template_code"}</th>
					<td>{form_input name="mail_template_code"}</td>
				</tr>
				<tr>
					<th width="200px">{form_name name="mail_template_title"}</th>
					<td>{form_input name="mail_template_title" size="50"}</td>
				</tr>
				<tr>
					<th width="200px">{form_name name="mail_template_body"}</th>
					<td>
						{form_input name="mail_template_body" rows="30" cols="30" style="float:left;margin-right:10px;"}
						<br />
						�����Ѳ�ǽ�ʥ�����<br />{$app.tag|nl2br}
						<br class="clear" />
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="�Խ�"}</td>
				</tr>
			</table>
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
