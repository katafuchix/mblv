{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.sound.name}��Ͽ</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_sound_add_do" enctype="multipart/form-data"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="sound_name"}</th>
					<td>{form_input name="sound_name" size=50}</td>
				</tr>
				<tr>
					<th>{form_name name="sound_desc"}</th>
					<td>{form_input name="sound_desc" cols="40" roes="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="sound_file1"}</th>
					<td>{form_input name="sound_file1"}</td>
				</tr>
				<tr>
					<th>{form_name name="sound_file2"}</th>
					<td>{form_input name="sound_file2"}</td>
				</tr>
				<tr>
					<th>{form_name name="sound_file_d"}</th>
					<td>{form_input name="sound_file_d"}</td>
				</tr>
				<tr>
					<th>{form_name name="sound_file_a"}</th>
					<td>{form_input name="sound_file_a"}</td>
				</tr>
				<tr>
					<th>{form_name name="sound_file_s"}</th>
					<td>{form_input name="sound_file_s"}</td>
				</tr>
				<tr>
					<th>{form_name name="sound_point"}</th>
					<td>{form_input name="sound_point"}</td>
				</tr>
				<tr>
					<th>{form_name name="sound_category_id"}</th>
					<td>{form_input name="sound_category_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="sound_stock_num"}</th>
					<td>{form_input name="sound_stock_status"}{form_name name="sound_stock_status"}<br />{form_input name="sound_stock_num"}</td>
				</tr>
				<tr>
					<th>{$ft.sound.name}�ۿ���������</th>
					<td>
						{form_input name="sound_start_status"}{form_name name="sound_start_status"}<br />
						{form_input name="sound_start_year" emptyoption=""}ǯ
						{form_input name="sound_start_month" emptyoption=""}��
						{form_input name="sound_start_day" emptyoption=""}��
						{form_input name="sound_start_hour" emptyoption=""}��
						{form_input name="sound_start_min" emptyoption=""}ʬ
					</td>
				</tr>
				<tr>
					<th>{$ft.sound.name}�ۿ���λ����</th>
					<td>
						{form_input name="sound_end_status"}{form_name name="sound_end_status"}<br />
						{form_input name="sound_end_year" emptyoption=""}ǯ
						{form_input name="sound_end_month" emptyoption=""}��
						{form_input name="sound_end_day" emptyoption=""}��
						{form_input name="sound_end_hour" emptyoption=""}��
						{form_input name="sound_end_min" emptyoption=""}ʬ
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="`$ft.sound.name`��Ͽ"}</td>
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

