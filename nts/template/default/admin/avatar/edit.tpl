{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.avatar.name}�Խ�</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_avatar_edit_do" enctype="multipart/form-data"}
			{form_input name="avatar_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="avatar_name"}</th>
					<td>{form_input name="avatar_name" size=50}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_desc"}</th>
					<td>{form_input name="avatar_desc" cols="40" roes="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_image1_file"}</th>
					<td>
						{if $form.avatar_image1}<img src="f.php?file=avatar/{$form.avatar_image1}" style="float:left;">{/if}
						{form_input name="avatar_image1"}
						<div style="float:left">
						{form_input name="avatar_image1_file"}<br />
						{form_input name="avatar_image1_status"}
						</div>
						<br class="clear" />
					</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_image1_desc_file"}</th>
					<td>
						{if $form.avatar_image1_desc}<img src="f.php?file=avatar/{$form.avatar_image1_desc}" style="float:left;">{/if}
						{form_input name="avatar_image1_desc"}
						<div style="float:left;">
						{form_input name="avatar_image1_desc_file"}<br />
						{form_input name="avatar_image1_desc_status"}
						</div>
					</td>
				</tr>
<!--				<tr>
					<th>{form_name name="avatar_image1_x"}</th>
					<td>{form_input name="avatar_image1_x"}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_image1_y"}</th>
					<td>{form_input name="avatar_image1_y"}</td>
				</tr>
-->				<tr>
					<th>{form_name name="avatar_image1_z"}</th>
					<td>{form_input name="avatar_image1_z"}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_image2_file"}</th>
					<td>
						{if $form.avatar_image2}<img src="f.php?file=avatar/{$form.avatar_image2}" style="float:left;">{/if}
						{form_input name="avatar_image2"}
						<div style="float:left">
						{form_input name="avatar_image2_file"}<br />
						{form_input name="avatar_image2_status"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_image2_desc_file"}</th>
					<td>
						{if $form.avatar_image2_desc}<img src="f.php?file=avatar/{$form.avatar_image2_desc}" style="float:left;">{/if}
						{form_input name="avatar_image2_desc"}
						<div style="float:left;">
						{form_input name="avatar_image2_desc_file"}<br />
						{form_input name="avatar_image2_desc_status"}
						</div>
					</td>
				</tr>
<!--				<tr>
					<th>{form_name name="avatar_image2_x"}</th>
					<td>{form_input name="avatar_image2_x"}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_image2_y"}</th>
					<td>{form_input name="avatar_image2_y"}</td>
				</tr>
-->				<tr>
					<th>{form_name name="avatar_image2_z"}</th>
					<td>{form_input name="avatar_image2_z"}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_point"}</th>
					<td>{form_input name="avatar_point"}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_sex_type"}</th>
					<td>{form_input name="avatar_sex_type"}</td>
				</tr>
				<tr>
					<th>{form_name name="preset_avatar"}</th>
					<td>{form_input name="preset_avatar"}{form_name name="preset_avatar"}�ˤ��롣�ʤ��餫����桼��{$ft.avatar.name}�˲ä��ޤ�����</td>
				</tr>
				<tr>
					<th>{form_name name="default_avatar"}</th>
					<td>{form_input name="default_avatar"}{form_name name="default_avatar"}�ˤ���</td>
				</tr>
				<tr>
					<th>{form_name name="first_avatar"}</th>
					<td>{form_input name="first_avatar"}{form_name name="first_avatar"}�ˤ��롣�ʲ����Ͽ��������Ȥ���ɽ������ޤ�����</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stand_id"}</th>
					<td>{form_input name="avatar_stand_id" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_category_id"}</th>
					<td>{form_input name="avatar_category_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="avatar_stock_num"}</th>
					<td>{form_input name="avatar_stock_status"}{form_name name="avatar_stock_status"}<br />{form_input name="avatar_stock_num"}</td>
				</tr>
				<tr>
					<th>���Х����ۿ���������</th>
					<td>
						{form_input name="avatar_start_status"}{form_name name="avatar_start_status"}<br />
						{form_input name="avatar_start_year" emptyoption=""}ǯ
						{form_input name="avatar_start_month" emptyoption=""}��
						{form_input name="avatar_start_day" emptyoption=""}��
						{form_input name="avatar_start_hour" emptyoption=""}��
						{form_input name="avatar_start_min" emptyoption=""}ʬ
					</td>
				</tr>
				<tr>
					<th>���Х����ۿ���λ����</th>
					<td>
						{form_input name="avatar_end_status"}{form_name name="avatar_end_status"}<br />
						{form_input name="avatar_end_year" emptyoption=""}ǯ
						{form_input name="avatar_end_month" emptyoption=""}��
						{form_input name="avatar_end_day" emptyoption=""}��
						{form_input name="avatar_end_hour" emptyoption=""}��
						{form_input name="avatar_end_min" emptyoption=""}ʬ
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="`$ft.avatar.name`�Խ�"}</td>
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

