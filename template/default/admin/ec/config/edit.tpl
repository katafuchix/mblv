{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>�⡼����ܾ������</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_ec_config_edit_confirm" method="post" enctype="multipart/form-data"}
			<table class="sheet">
				<tr>
					<th>{form_name name="mall_name"}</th>
					<td>{form_input name="mall_name" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_html_title"}</th>
					<td>{form_input name="mall_html_title" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_information"}</th>
					<td>{form_input name="mall_information" cols="40" rows="5"}</td>
				</tr>
				<!--
				<tr>
					<th>{form_name name="mall_public_flg"}</th>
					<td>{form_input name="mall_public_flg"}</td>
				</tr>
				-->
				<tr>
					<th>{form_name name="mall_shop_ranking"}<br /><span class="err">��,�׶��ڤ�ǥ���å�ID�����Ϥ��Ƥ���������</span></th>
					<td>{form_input name="mall_shop_ranking" size="100"}<br />ͭ���ʥ���å�ID��{$app.shop_id_csv}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_meta_description"}</th>
					<td>{form_input name="mall_meta_description" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_meta_keywords"}</th>
					<td>{form_input name="mall_meta_keywords" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_meta_robots"}</th>
					<td>{form_input name="mall_meta_robots" size="100"}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_meta_author"}</th>
					<td>{form_input name="mall_meta_author" size="100"}</td>
				</tr>
				<tr>
					<th width="10%">{form_name  name="mall_contents_body"}
						<br /><br /><b>������ե����</b><br />
						��������<br />��#img1<br />
						��������ɥ���<br />��#dl1<br />
						�ե꡼�ڡ�������<br />��#fp1[FreePage]<br />
						���ʥڡ�������<br />��#ip1[ItemPage]<br />
					</th>
					<td>
						{$ft.menu_icon.name}<a href="#" onClick="javascript:void(window.open('?action_admin_file=true','�ե��������','width=700,height=700,scrollbars=yes'))">�ե��������</a><br />
						{form_input name="mall_contents_body" cols=50 rows=10}
					</td>
				</tr>
				<tr>
					<th>{form_name name="mall_bg_color"}</th>
					<td>{form_input name="mall_bg_color" size="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_text_color"}</th>
					<td>{form_input name="mall_text_color" size="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_link_color"}</th>
					<td>{form_input name="mall_link_color" size="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_alink_color"}</th>
					<td>{form_input name="mall_alink_color" size="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_vlink_color"}</th>
					<td>{form_input name="mall_vlink_color" size="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_title_bg_color"}</th>
					<td>{form_input name="mall_title_bg_color" size="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_title_font_color"}</th>
					<td>{form_input name="mall_title_font_color" size="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_menu_color"}</th>
					<td>{form_input name="mall_menu_color" size="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="mall_hr_color"}</th>
					<td>{form_input name="mall_hr_color" size="10"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="����ǧ���̤ء�"}</td>
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
