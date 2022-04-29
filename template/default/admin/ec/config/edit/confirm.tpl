{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>モール基本情報変更確認</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_ec_config_edit_do"}
			{$app_ne.hidden_vars}
			<table class="sheet">
				<tr>
					<th>{form_name  name="mall_name"}</th>
					<td>{$form.mall_name}</td>
				</tr>
				<tr>
					<th>{form_name  name="mall_html_title"}</th>
					<td>{$form.mall_html_title}</td>
				</tr>
				<tr>
					<th>{form_name  name="mall_information"}</th>
					<td>{$app_ne.mall_information}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_shop_ranking"}</th>
					<td>{$form.mall_shop_ranking}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_meta_description"}</th>
					<td>{$form.mall_meta_description}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_meta_keywords"}</th>
					<td>{$form.mall_meta_keywords}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_meta_robots"}</th>
					<td>{$form.mall_meta_robots}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_meta_author"}</th>
					<td>{$form.mall_meta_author}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_contents_body"}</th>
					<td>{$app_ne.mall_contents_body|nl2br}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_bg_color"}</th>
					<td>{$form.mall_bg_color}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_text_color"}</th>
					<td>{$form.mall_text_color}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_link_color"}</th>
					<td>{$form.mall_link_color}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_alink_color"}</th>
					<td>{$form.mall_alink_color}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_vlink_color"}</th>
					<td>{$form.mall_vlink_color}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_title_bg_color"}</th>
					<td>{$form.mall_title_bg_color}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_title_font_color"}</th>
					<td>{$form.mall_title_font_color}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_menu_color"}</th>
					<td>{$form.mall_menu_color}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_hr_color"}</th>
					<td>{$form.mall_hr_color}</td>
				</tr>
				<tr>
					<th width="10%"></th>
					<td>{form_submit value="　この内容で更新する　"}</td>
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
