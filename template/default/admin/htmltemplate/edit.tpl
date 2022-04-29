{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.htmltemplate.name}編集</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				
				{$ft.menu_icon.name}<a href="?action_admin_htmltemplate_log=true&html_template_id={$form.html_template_id}">{$ft.htmltemplate.name}ログ</a><br />
				{form ethna_action="admin_htmltemplate_edit_do"}
				{form_submit value="保存せずに編集を終了"}
			</div>
			{form_input name="html_template_id"}
			<table class="sheet">
				<tr>
					<th width="200px">{form_name name="html_template_id"}</th>
					<td>{$form.html_template_id}</td>
				</tr>
				<tr>
					<th width="200px">{form_name name="html_template_code"}</span></th>
					<td>{$form.html_template_code}</td>
				</tr>
				<tr>
					<th width="200px">{form_name name="html_template_body"}</th>
					<td>
						{$ft.menu_icon.name}<a href="#" onClick="javascript:void(window.open('?action_admin_file=true&mode=html','ファイル管理','width=700,height=700,scrollbars=yes'))">ファイル管理</a>&nbsp;&nbsp;
						{$ft.menu_icon.name}<a href="#" onClick="javascript:void(window.open('?action_admin_util=true&page=tag_htmltemplate','タグリファレンス','width=700,height=700,scrollbars=yes'))">タグリファレンス</a><br />
						{form_input name="html_template_body" rows="80" style="float:left;margin-right:10px;width:100%" id="example_1"}
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit name="edit" value="　編集　"}</td>
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
