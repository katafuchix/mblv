{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.video.name}��Ͽ</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_video_add_do" enctype="multipart/form-data"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="video_name"}<br /><span class="required"></span></th>
					<td>{form_input name="video_name" size=50}</td>
				</tr>
				<tr>
					<th>{form_name name="video_desc"}<br /><span class="required"></span></th>
					<td>{form_input name="video_desc" cols="40" roes="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="video_file1"}</th>
					<td>{form_input name="video_file1"}</td>
				</tr>
				<tr>
					<th>{form_name name="video_file2"}</th>
					<td>{form_input name="video_file2"}</td>
				</tr>
				<tr>
					<th>{form_name name="video_file_d"}</th>
					<td>{form_input name="video_file_d"}</td>
				</tr>
				<tr>
					<th>{form_name name="video_file_a"}</th>
					<td>{form_input name="video_file_a"}</td>
				</tr>
				<tr>
					<th>{form_name name="video_file_s"}</th>
					<td>{form_input name="video_file_s"}</td>
				</tr>
				<tr>
					<th>{form_name name="video_point"}</th>
					<td>{form_input name="video_point"}</td>
				</tr>
				<tr>
					<th>{form_name name="video_category_id"}<br /><span class="required"></span></th>
					<td>{form_input name="video_category_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="video_stock_num"}</th>
					<td>{form_input name="video_stock_status"}{form_name name="video_stock_status"}<br />{form_input name="video_stock_num"}</td>
				</tr>
				<tr>
					<th>{form_name name="video_start_time"}</th>
					<td>
						{form_input name="video_start_status"}{form_name name="video_start_status"}<br />
						{form_input name="video_start_year" emptyoption=""}ǯ
						{form_input name="video_start_month" emptyoption=""}��
						{form_input name="video_start_day" emptyoption=""}��
						{form_input name="video_start_hour" emptyoption=""}��
						{form_input name="video_start_min" emptyoption=""}ʬ�����ۿ�
					</td>
				</tr>
				<tr>
					<th>{form_name name="video_end_time"}</th>
					<td>
						{form_input name="video_end_status"}{form_name name="video_end_status"}<br />
						{form_input name="video_end_year" emptyoption=""}ǯ
						{form_input name="video_end_month" emptyoption=""}��
						{form_input name="video_end_day" emptyoption=""}��
						{form_input name="video_end_hour" emptyoption=""}��
						{form_input name="video_end_min" emptyoption=""}ʬ�ޤ��ۿ�
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="��`$ft.video.name`��Ͽ��"}</td>
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

