{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.game.name}編集</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_game_edit_do" enctype="multipart/form-data"}
			{form_input name="game_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="game_name"}<br /><span class="required"></span></th>
					<td>{form_input name="game_name" size=50}</td>
				</tr>
				<tr>
					<th>{form_name name="game_code"}<br /><span class="required"></span></th>
					<td>{form_input name="game_code" size=50}</td>
				</tr>
				<tr>
					<th>{form_name name="game_desc"}<br /><span class="required"></span></th>
					<td>{form_input name="game_desc" cols="40" roes="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="game_explain"}<br /><span class="required"></span></th>
					<td>{form_input name="game_explain" cols="40" roes="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="game_file1_file"}</th>
					<td>
						{if $form.game_file1}<img src="f.php?file=game/{$form.game_file1}" style="float:left;">{/if}
						{form_input name="game_file1"}
						<div style="float:left">
						{form_input name="game_file1_file"}<br />
						{form_input name="game_file1_status"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="game_file2_file"}</th>
					<td>
						{if $form.game_file2}<img src="f.php?file=game/{$form.game_file2}" style="float:left;">{/if}
						{form_input name="game_file2"}
						<div style="float:left">
						{form_input name="game_file2_file"}<br />
						{form_input name="game_file2_status"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="game_file3_file"}</th>
					<td>
						{if $form.game_file3}{html_style type="file" filename="game/`$form.game_file3`" style="float:left;"}{/if}
						{form_input name="game_file3"}
						<div style="float:left">
						{form_input name="game_file3_file"}<br />
						{form_input name="game_file3_status"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="game_point"}</th>
					<td>{form_input name="game_point"}</td>
				</tr>
				<tr>
					<th>{form_name name="game_category_id"}<br /><span class="required"></span></th>
					<td>{form_input name="game_category_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="game_stock_num"}</th>
					<td>{form_input name="game_stock_status"}{form_name name="game_stock_status"}<br />{form_input name="game_stock_num"}</td>
				</tr>
				<tr>
					<th>{form_name name="game_start_time"}</th>
					<td>
						{form_input name="game_start_status"}{form_name name="game_start_status"}<br />
						{form_input name="game_start_year" emptyoption=""}年
						{form_input name="game_start_month" emptyoption=""}月
						{form_input name="game_start_day" emptyoption=""}日
						{form_input name="game_start_hour" emptyoption=""}時
						{form_input name="game_start_min" emptyoption=""}分から配信
					</td>
				</tr>
				<tr>
					<th>{form_name name="game_end_time"}</th>
					<td>
						{form_input name="game_end_status"}{form_name name="game_end_status"}<br />
						{form_input name="game_end_year" emptyoption=""}年
						{form_input name="game_end_month" emptyoption=""}月
						{form_input name="game_end_day" emptyoption=""}日
						{form_input name="game_end_hour" emptyoption=""}時
						{form_input name="game_end_min" emptyoption=""}分まで配信
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="　`$ft.game.name`編集　"}</td>
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

