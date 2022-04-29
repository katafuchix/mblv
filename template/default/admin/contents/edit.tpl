{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.contents.name}編集</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_contents_edit_do"}
			{form_input name="contents_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="contents_id"}</th>
					<td>{$form.contents_id}</td>
				</tr>
				<tr>
					<th>管理{form_name name="shop_id"}<br /><span class="required"></span></th>
					<td>{form_input name="shop_id" emptyoption="全て"}</td>
				</tr>
				<tr>
					<th>{form_name name="contents_code"}<br /><span class="required"></span></th>
					<td>{form_input name="contents_code"}</td>
				</tr>
				<tr>
					<th>{form_name name="contents_title"}<br /><span class="required"></span></th>
					<td>{form_input name="contents_title" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="contents_body"}<br /><span class="required"></span></th>
					<td>
						{$ft.menu_icon.name}<a href="#" onClick="javascript:void(window.open('?action_admin_file=true','ファイル管理','width=700,height=700,scrollbars=yes'))">ファイル管理</a>&nbsp;&nbsp;
						{$ft.menu_icon.name}<a href="#" onClick="javascript:void(window.open('?action_admin_util=true&page=tag_contents','タグリファレンス','width=700,height=700,scrollbars=yes'))">タグリファレンス</a><br />
						{form_input name="contents_body" cols="80" rows="50" style="width:100%"}
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="　編集　"}</td>
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
