{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>���Х�������Խ�</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_avatarstand_edit_do" enctype="multipart/form-data"}
			{form_input name="avatar_stand_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="avatar_stand_id"}</th>
					<td>{$form.avatar_stand_id}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stand_name"}<br /><span class="required"></span></th>
					<td>{form_input name="avatar_stand_name"}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stand_image_file"}</th>
					<td>
						{if $form.avatar_stand_image}<img src="f.php?file=avatar/{$form.avatar_stand_image}" style="float:left;">{/if}
						{form_input name="avatar_stand_image"}
						<div style="float:left">
						{form_input name="avatar_stand_image_file"}<br />
						{form_input name="avatar_stand_image_status"}
						</div>
						<br class="clear" />
					</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stand_base_x"}</th>
					<td>
						�����Х�������ڤ�Ф�����X��ɸ<br />
						���פʾ��϶��ˤ��Ʋ�������<br />
						{form_input name="avatar_stand_base_x"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stand_base_y"}</th>
					<td>
						�����Х�������ڤ�Ф�����Y��ɸ<br />
						���פʾ��϶��ˤ��Ʋ�������<br />
						{form_input name="avatar_stand_base_y"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stand_base_w"}</th>
					<td>
						�����Х�������ڤ�Ф���<br />
						���פʾ��϶��ˤ��Ʋ�������<br />
						{form_input name="avatar_stand_base_w"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stand_base_h"}</th>
					<td>
						�����Х�������ڤ�Ф��⤵<br />
						���פʾ��϶��ˤ��Ʋ�������<br />
						{form_input name="avatar_stand_base_h"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stand_w"}</th>
					<td>
						�����Х������ɽ����<br />
						���פʾ��϶��ˤ��Ʋ�������<br />
						{form_input name="avatar_stand_w"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stand_h"}</th>
					<td>
						�����Х������ɽ���⤵<br />
						���פʾ��϶��ˤ��Ʋ�������<br />
						{form_input name="avatar_stand_h"}
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="���Խ���"}</td>
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
