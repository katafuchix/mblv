{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.community_comment.name}�Խ�</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_community_comment_edit_do"}
			{form_input name="community_comment_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="community_comment_id"}</th>
					<td>{$form.community_comment_id}</td>
				</tr>
				<tr>
					<th>{form_name name="community_comment_body"}</th>
					<td>{form_input name="community_comment_body" cols="40" rows="20"}</td>
				</tr>
				<tr>
					<th>����</th>
					<td>
						{if $form.image_id}
							<img src="f.php?type=image&id={$form.image_id}&attr=t"><br />
							{form_input name="delete_image"}
						{else}
							�ʤ�
						{/if}
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="��`$ft.community_comment.name`�Խ���"}</td>
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
