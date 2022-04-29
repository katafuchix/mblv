{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.decomail.name}編集</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_decomail_edit_do" enctype="multipart/form-data"}
			{form_input name="decomail_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="decomail_name"}</th>
					<td>{form_input name="decomail_name" size=50}</td>
				</tr>
				<tr>
					<th>{form_name name="decomail_desc"}</th>
					<td>{form_input name="decomail_desc" cols="40" roes="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="decomail_file1_file"}</th>
					<td>
						{if $form.decomail_file1}<img src="f.php?file=decomail/{$form.decomail_file1}" style="float:left;">{/if}
						{form_input name="decomail_file1"}
						<div style="float:left">
						{form_input name="decomail_file1_file"}<br />
						{form_input name="decomail_file1_status"}
						</div>
						<br class="clear" />
					</td>
				</tr>
				<tr>
					<th>{form_name name="decomail_file2_file"}</th>
					<td>
						{if $form.decomail_file2}<img src="f.php?file=decomail/{$form.decomail_file2}" style="float:left;">{/if}
						{form_input name="decomail_file2"}
						<div style="float:left">
						{form_input name="decomail_file2_file"}<br />
						{form_input name="decomail_file2_status"}
						</div>
						<br class="clear" />
					</td>
				</tr>
				<tr>
					<th>{form_name name="decomail_file_d_file"}</th>
					<td>
						{if $form.decomail_file_d}
							{html_style type="file" filename="decomail/`$form.decomail_file_d`" style="float:left;"}
							<!--img src="f.php?file=decomail/{$form.decomail_file_d}" style="float:left;"-->
						{/if}
						{form_input name="decomail_file_d"}
						<div style="float:left">
						{form_input name="decomail_file_d_file"}<br />
						{form_input name="decomail_file_d_status"}
						</div>
						<br class="clear" />
					</td>
				</tr>
				<tr>
					<th>{form_name name="decomail_file_a_file"}</th>
					<td>
						{if $form.decomail_file_a}
							{html_style type="file" filename="decomail/`$form.decomail_file_a`" style="float:left;"}
							<!--img src="f.php?file=decomail/{$form.decomail_file_a}" style="float:left;"-->
						{/if}
						{form_input name="decomail_file_a"}
						<div style="float:left">
						{form_input name="decomail_file_a_file"}<br />
						{form_input name="decomail_file_a_status"}
						</div>
						<br class="clear" />
					</td>
				</tr>
				<tr>
					<th>{form_name name="decomail_file_s_file"}</th>
					<td>
						{if $form.decomail_file_s}
							{html_style type="file" filename="decomail/`$form.decomail_file_s`" style="float:left;"}
							<!--img src="f.php?file=decomail/{$form.decomail_file_s}" style="float:left;"-->
						{/if}
						{form_input name="decomail_file_s"}
						<div style="float:left">
						{form_input name="decomail_file_s_file"}<br />
						{form_input name="decomail_file_s_status"}
						</div>
						<br class="clear" />
					</td>
				</tr>
				<tr>
					<th>{form_name name="decomail_point"}</th>
					<td>{form_input name="decomail_point"}</td>
				</tr>
				<tr>
					<th>{form_name name="decomail_category_id"}</th>
					<td>{form_input name="decomail_category_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="decomail_stock_num"}</th>
					<td>{form_input name="decomail_stock_status"}{form_name name="decomail_stock_status"}<br />{form_input name="decomail_stock_num"}</td>
				</tr>
				<tr>
					<th>デコメール配信開始日時</th>
					<td>
						{form_input name="decomail_start_status"}{form_name name="decomail_start_status"}<br />
						{form_input name="decomail_start_year" emptyoption=""}年
						{form_input name="decomail_start_month" emptyoption=""}月
						{form_input name="decomail_start_day" emptyoption=""}日
						{form_input name="decomail_start_hour" emptyoption=""}時
						{form_input name="decomail_start_min" emptyoption=""}分
					</td>
				</tr>
				<tr>
					<th>デコメール配信終了日時</th>
					<td>
						{form_input name="decomail_end_status"}{form_name name="decomail_end_status"}<br />
						{form_input name="decomail_end_year" emptyoption=""}年
						{form_input name="decomail_end_month" emptyoption=""}月
						{form_input name="decomail_end_day" emptyoption=""}日
						{form_input name="decomail_end_hour" emptyoption=""}時
						{form_input name="decomail_end_min" emptyoption=""}分
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="`$ft.decomail.name`編集"}</td>
				</tr>
			</table>
			{/form}
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}

