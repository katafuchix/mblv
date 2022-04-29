{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>基本情報管理</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_config_edit_do"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="sns_name"}</th>
					<td>{form_input name="sns_name" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="sns_html_title"}</th>
					<td>{form_input name="sns_html_title" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="sns_information"}</th>
					<td>{form_input name="sns_information" cols="50" rows="5"}</td>
				</tr>
				<tr>
					<th>{form_name name="sns_public_status"}</th>
					<td>{form_input name="sns_public_status"}</td>
				</tr>
				<tr>
					<th>{form_name name="sns_maintenance_status"}</th>
					<td>{form_input name="sns_maintenance_status"}</td>
				</tr>
				<tr>
					<th>{form_name name="sns_meta_description"}</th>
					<td>{form_input name="sns_meta_description" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="sns_meta_keywords"}</th>
					<td>{form_input name="sns_meta_keywords" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="sns_meta_robots"}</th>
					<td>{form_input name="sns_meta_robots" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="sns_meta_author"}</th>
					<td>{form_input name="sns_meta_author" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="sns_navi_template"}</th>
					<td>{form_input name="sns_navi_template" rows="10" cols="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="sns_regist_point"}</th>
					<td>{form_input name="sns_regist_point"}{$ft.point.name}</td>
				</tr>
				<tr>
					<th>{form_name name="sns_invite_from_point"}</th>
					<td>{form_input name="sns_invite_from_point"}{$ft.point.name}</td>
				</tr>
				<tr>
					<th>{form_name name="sns_invite_to_point"}</th>
					<td>{form_input name="sns_invite_to_point"}{$ft.point.name}</td>
				</tr>
			</table>
			<table class="sheet">
				<tr>
					<th>{form_name name="sns_bg_color"}</th>
					<td>{form_input name="sns_bg_color" size="10"}</td>
					<th>{form_name name="sns_text_color"}</th>
					<td>{form_input name="sns_text_color" size="10"}</td>
					<th>{form_name name="sns_link_color"}</th>
					<td>{form_input name="sns_link_color" size="10"}</td>
					<th>{form_name name="sns_alink_color"}</th>
					<td>{form_input name="sns_alink_color" size="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="sns_vlink_color"}</th>
					<td>{form_input name="sns_vlink_color" size="10"}</td>
					<th>{form_name name="sns_title_bg_color"}</th>
					<td>{form_input name="sns_title_bg_color" size="10"}</td>
					<th>{form_name name="sns_title_font_color"}</th>
					<td>{form_input name="sns_title_font_color" size="10"}</td>
					<th>{form_name name="sns_menu_color"}</th>
					<td>{form_input name="sns_menu_color" size="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="sns_hr_color"}</th>
					<td>{form_input name="sns_hr_color" size="10"}</td>
					<th>{form_name name="sns_time_color"}</th>
					<td>{form_input name="sns_time_color" size="10"}</td>
					<th>{form_name name="sns_form_name_color"}</th>
					<td>{form_input name="sns_form_name_color" size="10"}</td>
					<th>{form_name name="sns_error_color"}</th>
					<td>{form_input name="sns_error_color" size="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="sns_pager_text_color"}</th>
					<td>{form_input name="sns_pager_text_color" size="10"}</td>
					<th>{form_name name="sns_pager_bg_color"}</th>
					<td>{form_input name="sns_pager_bg_color" size="10"}</td>
					<th></th>
					<td></td>
					<th></th>
					<td></td>
				</tr>
			</table>
			
			<table class="sheet" id="w200">
				<tr>
					<th>端末振り分け</th>
					<td>
						<div style="float:left">
						{form_name name="sns_low_term_d"}<br />
						{form_input name="sns_low_term_d" rows="30" cols="20"}
						</div>
						<div style="float:left">
						{form_name name="sns_low_term_a"}<br />
						{form_input name="sns_low_term_a" rows="30" cols="20"}
						</div>
						<div style="float:left">
						{form_name name="sns_low_term_s"}<br />
						{form_input name="sns_low_term_s" rows="30" cols="20"}
						</div>
						<br class="clear" />
					</td>
				</tr>
			</table>
			
			<table class="sheet" id="w200">
				<tr>
					<th></th>
					<td>{form_submit value="　編集　"}</td>
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
