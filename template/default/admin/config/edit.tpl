{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$config.site_type[$form.site_type].name}{$ft.config.name}管理</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_config_edit&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.config.name}管理FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_config_edit_do"}
			{form_input name="site_type"}
			{if $form.site_type == 'config'}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="site_name"}<br /><span class="required"></span></th>
					<td>{form_input name="site_name" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="site_company_name"}<br /><span class="required"></span></th>
					<td>{form_input name="site_company_name" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="site_phone"}<br /><span class="required"></span></th>
					<td>{form_input name="site_phone" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="site_html_title"}<br /><span class="required"></span></th>
					<td>{form_input name="site_html_title" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="site_information"}</th>
					<td>{form_input name="site_information" cols="50" rows="5"}</td>
				</tr>
				<tr>
					<th>{form_name name="site_public_status"}<br /><span class="required"></span></th>
					<td>{form_input name="site_public_status"}</td>
				</tr>
				<tr>
					<th>{form_name name="site_maintenance_status"}<br /><span class="required"></span></th>
					<td>{form_input name="site_maintenance_status"}</td>
				</tr>
				<tr>
					<th>{form_name name="site_meta_description"}<br /><span class="required"></span></th>
					<td>{form_input name="site_meta_description" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="site_meta_keywords"}<br /><span class="required"></span></th>
					<td>{form_input name="site_meta_keywords" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="site_meta_robots"}<br /><span class="required"></span></th>
					<td>{form_input name="site_meta_robots" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="site_meta_author"}<br /><span class="required"></span></th>
					<td>{form_input name="site_meta_author" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="site_navi_template"}</th>
					<td>{form_input name="site_navi_template" rows="10" cols="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="site_regist_point"}</th>
					<td>{form_input name="site_regist_point"}{$ft.point.name}</td>
				</tr>
				<tr>
					<th>{form_name name="site_invite_from_point"}</th>
					<td>{form_input name="site_invite_from_point"}{$ft.point.name}</td>
				</tr>
				<tr>
					<th>{form_name name="site_invite_to_point"}</th>
					<td>{form_input name="site_invite_to_point"}{$ft.point.name}</td>
				</tr>
			</table>
			{/if}
			<table class="sheet">
				<tr>
					<th>{form_name name="site_bg_color"}<br /><span class="required"></span></th>
					<td>{form_input name="site_bg_color" size="10"}</td>
					<th>{form_name name="site_text_color"}<br /><span class="required"></span></th>
					<td>{form_input name="site_text_color" size="10"}</td>
					<th>{form_name name="site_link_color"}<br /><span class="required"></span></th>
					<td>{form_input name="site_link_color" size="10"}</td>
					<th>{form_name name="site_alink_color"}<br /><span class="required"></span></th>
					<td>{form_input name="site_alink_color" size="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="site_vlink_color"}<br /><span class="required"></span></th>
					<td>{form_input name="site_vlink_color" size="10"}</td>
					<th>{form_name name="site_title_bg_color"}<br /><span class="required"></span></th>
					<td>{form_input name="site_title_bg_color" size="10"}</td>
					<th>{form_name name="site_title_font_color"}<br /><span class="required"></span></th>
					<td>{form_input name="site_title_font_color" size="10"}</td>
					<th>{form_name name="site_menu_color"}<br /><span class="required"></span></th>
					<td>{form_input name="site_menu_color" size="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="site_hr_color"}<br /><span class="required"></span></th>
					<td>{form_input name="site_hr_color" size="10"}</td>
					<th>{form_name name="site_time_color"}<br /><span class="required"></span></th>
					<td>{form_input name="site_time_color" size="10"}</td>
					<th>{form_name name="site_form_name_color"}<br /><span class="required"></span></th>
					<td>{form_input name="site_form_name_color" size="10"}</td>
					<th>{form_name name="site_error_color"}<br /><span class="required"></span></th>
					<td>{form_input name="site_error_color" size="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="site_pager_text_color"}<br /><span class="required"></span></th>
					<td>{form_input name="site_pager_text_color" size="10"}</td>
					<th>{form_name name="site_pager_bg_color"}<br /><span class="required"></span></th>
					<td>{form_input name="site_pager_bg_color" size="10"}</td>
					<th></th>
					<td></td>
					<th></th>
					<td></td>
				</tr>
			</table>
			
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="site_cms_html1"}</th>
					<td>
						{$ft.menu_icon.name}<a name="file" href="#file" onClick="javascript:void(window.open('?action_admin_file=true','ファイル管理','width=700,height=700,scrollbars=yes'))">ファイル管理</a>&nbsp;&nbsp;
						{$ft.menu_icon.name}<a name="tag" href="#tag" onClick="javascript:void(window.open('?action_admin_util=true&page=tag_contents','タグリファレンス','width=700,height=700,scrollbars=yes'))">タグリファレンス</a><br />
						{form_input name="site_cms_html1" cols="50" rows="20" style="float:left;margin-right:10px;"}
						<br class="clear">
					</td>
				</tr>
				<tr>
					<th>{form_name name="site_cms_html3"}</th>
					<td>{form_input name="site_cms_html3" cols="50" rows="20"}</td>
				</tr>
				<tr>
					<th>{form_name name="site_cms_html2"}</th>
					<td>{form_input name="site_cms_html2" cols="50" rows="20"}</td>
				</tr>
			</table>
			
			<table class="sheet" id="w200">
				<tr>
					<th>端末振り分け</th>
					<td>
						<div style="float:left">
						{form_name name="site_low_term_d"}<br />
						{form_input name="site_low_term_d" rows="30" cols="20"}
						</div>
						<div style="float:left">
						{form_name name="site_low_term_a"}<br />
						{form_input name="site_low_term_a" rows="30" cols="20"}
						</div>
						<div style="float:left">
						{form_name name="site_low_term_s"}<br />
						{form_input name="site_low_term_s" rows="30" cols="20"}
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
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}
</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
