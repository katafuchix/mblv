{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.comment.name}�Խ�</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_comment_edit_do"}
			{form_input name="comment_id"}
			<table class="sheet">
				<tr>
					<th>{form_name name="comment_id"}</th>
					<td>{$form.comment_id}</td>
				</tr>
				<tr>
					<th>{form_name name="comment_body"}</th>
					<td>{form_input name="comment_body" cols="40" rows="20"}</td>
				</tr>
				{if $form.image_id}
				<tr>
					<th>����</th>
					<td>
						<img src="f.php?type=image&id={$form.image_id}&attr=t"><br />
						{form_input name="delete_image"}
					</td>
				</tr>
				{/if}
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