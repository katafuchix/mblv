{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.game_category.name}�Խ�</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_gamecategory_edit_do"}
			{form_input name="game_category_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="game_category_id"}</th>
					<td>{$form.game_category_id}</td>
				</tr>
				<tr>
					<th>{form_name name="game_category_name"}</th>
					<td>{form_input name="game_category_name" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="game_category_desc"}</th>
					<td>{form_input name="game_category_desc" size="50"}</td>
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
