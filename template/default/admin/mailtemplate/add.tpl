{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.mailtemplate.name}登録</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_mailtemplate_add_do"}
			{uniqid}
			<table class="sheet">
				<tr>
					<th width="200px">{form_name name="mail_template_code"}<br /><span class="required"></span></th>
					<td>{form_input name="mail_template_code"}</td>
				</tr>
				<tr>
					<th width="200px">{form_name name="mail_template_title"}<br /><span class="required"></span></th>
					<td>{form_input name="mail_template_title" size="50"}</td>
				</tr>
				<tr>
					<th width="200px">{form_name name="mail_template_body"}</th>
					<td>
						{$ft.menu_icon.name}<a href="#" onClick="javascript:void(window.open('?action_admin_util=true&page=tag_mailtemplate','タグリファレンス','width=700,height=700,scrollbars=yes'))">タグリファレンス</a><br />
						{form_input name="mail_template_body" rows="30" cols="30" style="width:100%"}
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="　`$ft.mailtemplate.name`登録　"}</td>
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
