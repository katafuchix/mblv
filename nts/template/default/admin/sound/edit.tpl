{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.sound.name}編集</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_sound_edit_do" enctype="multipart/form-data"}
			{form_input name="sound_id"}
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
					<th>{form_name name="sound_file1_file"}</th>
					<td>
						{if $form.sound_file1}<img src="f.php?file=sound/{$form.sound_file1}" style="float:left;">{/if}
						{form_input name="sound_file1"}
						<div style="float:left">
						{form_input name="sound_file1_file"}<br />
						{form_input name="sound_file1_status"}
						</div>
						<br class="clear" />
					</td>
				</tr>
				<tr>
					<th>{form_name name="sound_file2_file"}</th>
					<td>
						{if $form.sound_file2}<img src="f.php?file=sound/{$form.sound_file2}" style="float:left;">{/if}
						{form_input name="sound_file2"}
						<div style="float:left">
						{form_input name="sound_file2_file"}<br />
						{form_input name="sound_file2_status"}
						</div>
						<br class="clear" />
					</td>
				</tr>
				<tr>
					<th>{form_name name="sound_file_d_file"}</th>
					<td>
						{if $form.sound_file_d}
							{html_style type="file" filename="sound/`$form.sound_file_d`" style="float:left;"}
							<!--img src="f.php?file=sound/{$form.sound_file_d}" style="float:left;"-->
						{/if}
						{form_input name="sound_file_d"}
						<div style="float:left">
						{form_input name="sound_file_d_file"}<br />
						{form_input name="sound_file_d_status"}
						</div>
						<br class="clear" />
					</td>
				</tr>
				<tr>
					<th>{form_name name="sound_file_a_file"}</th>
					<td>
						{if $form.sound_file_a}
							{html_style type="file" filename="sound/`$form.sound_file_a`" style="float:left;"}
							<!--img src="f.php?file=sound/{$form.sound_file_a}" style="float:left;"-->
						{/if}
						{form_input name="sound_file_a"}
						<div style="float:left">
						{form_input name="sound_file_a_file"}<br />
						{form_input name="sound_file_a_status"}
						</div>
						<br class="clear" />
					</td>
				</tr>
				<tr>
					<th>{form_name name="sound_file_s_file"}</th>
					<td>
						{if $form.sound_file_s}
							{html_style type="file" filename="sound/`$form.sound_file_s`" style="float:left;"}
							<!--img src="f.php?file=sound/{$form.sound_file_s}" style="float:left;"-->
						{/if}
						{form_input name="sound_file_s"}
						<div style="float:left">
						{form_input name="sound_file_s_file"}<br />
						{form_input name="sound_file_s_status"}
						</div>
						<br class="clear" />
					</td>
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
					<th>{$ft.sound.name}配信開始日時</th>
					<td>
						{form_input name="sound_start_status"}{form_name name="sound_start_status"}<br />
						{form_input name="sound_start_year" emptyoption=""}年
						{form_input name="sound_start_month" emptyoption=""}月
						{form_input name="sound_start_day" emptyoption=""}日
						{form_input name="sound_start_hour" emptyoption=""}時
						{form_input name="sound_start_min" emptyoption=""}分
					</td>
				</tr>
				<tr>
					<th>{$ft.sound.name}配信終了日時</th>
					<td>
						{form_input name="sound_end_status"}{form_name name="sound_end_status"}<br />
						{form_input name="sound_end_year" emptyoption=""}年
						{form_input name="sound_end_month" emptyoption=""}月
						{form_input name="sound_end_day" emptyoption=""}日
						{form_input name="sound_end_hour" emptyoption=""}時
						{form_input name="sound_end_min" emptyoption=""}分
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="`$ft.sound.name`編集"}</td>
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

