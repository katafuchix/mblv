{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ��������ᥤ�󥳥�ƥ��-->
				<h2>{$ft.shop.name}��Ͽ</h2>
				<blockquote><a href="?action_admin_util=true&page=faq_shop_add&keepThis=true&TB_iframe=true&height=700&width=700" class="thickbox">{$ft.shop.name}��ϿFAQ</a></blockquote>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				{form action="$script" ethna_action="admin_ec_shop_add_do" method="post" enctype="multipart/form-data"}
				{uniqid}
				<table class="sheet" id="w200">
					<tr>
						<th width="10%">{form_name name="shop_name"}<br /><span class="required"></span></th>
						<td>{form_input name="shop_name" size=50}<br /><span class="err">*����50ʸ���ޤ�</span></td>
					</tr>
					<tr>
						<th width="10%">{form_name name="shop_news"}</th>
						<td>{form_input name="shop_news" cols=80 rows=10}</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="shop_bgcolor"}<br /><span class="required"></span></th>
						<td>{form_input name="shop_bgcolor" size=8}</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="shop_textcolor"}<br /><span class="required"></span></th>
						<td>{form_input name="shop_textcolor" size=8}</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="shop_linkcolor"}<br /><span class="required"></span></th>
						<td>{form_input name="shop_linkcolor" size=8}</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="shop_alinkcolor"}<br /><span class="required"></span></th>
						<td>{form_input name="shop_alinkcolor" size=8}</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="shop_vlinkcolor"}<br /><span class="required"></span></th>
						<td>{form_input name="shop_vlinkcolor" size=8}</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="shop_new_arrivals"}</th>
						<td>{form_input name="shop_new_arrivals" size=50}<br /><span class="err">��,�׶��ڤ��{$ft.item_id.name}�����Ϥ��Ƥ���������</span></td>
					</tr>
					<tr>
						<th width="10%">{form_name name="shop_ranking"}</th>
						<td>{form_input name="shop_ranking" size=50}<br /><span class="err">��,�׶��ڤ��{$ft.item_id.name}�����Ϥ��Ƥ���������</span></td>
					</tr>
					<tr>
						<th width="10%">{form_name name="shop_image1_file"}<br /><span class="required"></span></th>
						<td>
							{if $form.shop_image1}
								<img src="f.php?file=shop/{$form.shop_image1}">
								{form_input name="shop_image1"}
							{/if}<br />
							{form_input name="shop_image1_file"}<br /><span class="err">��ĥ�Ҥϡ�jpg�פ���gif�פˤ��Ƥ���������</span>
						</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="shop_image2_file"}<br /><span class="required"></span></th>
						<td>
							{if $form.shop_image2}
								<img src="f.php?file=shop/{$form.shop_image2}">
								{form_input name="shop_image2"}
							{/if}<br />
							{form_input name="shop_image2_file"}<br /><span class="err">��ĥ�Ҥϡ�jpg�פ���gif�פˤ��Ƥ���������</span>
						</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="shop_category_print_status"}</th>
						<td>{form_input name="shop_category_print_status"}</td>
					</tr>
					<tr>
						<th width="10%">
							{form_name  name="shop_body"}
						</th>
						<td>
							{$ft.menu_icon.name}<a name="file" href="#file" onClick="javascript:window.open('?action_admin_file=true','�ե��������','width=700,height=700,scrollbars=yes');">�ե��������</a>&nbsp;&nbsp;
							{$ft.menu_icon.name}<a name="tag" href="tag" onClick="javascript:void(window.open('?action_admin_util=true&page=tag_contents','������ե����','width=700,height=700,scrollbars=yes'))">������ե����</a><br />
							{form_input name="shop_body" cols=80 rows=10}
						</td>
					</tr>
<!--
					<tr>
						<th width="10%">{form_name name="file_1"}</th>
						<td>
							���ե�����ϡ���gif�ס�jpg�ס�swf�ס�dmt�ס�3g2�ס�3gp�פΤ��б����Ƥ��ޤ���<br />
							{form_input name="file_1"}
						</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="file_2"}</th>
						<td>
							{form_input name="file_2"}
						</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="file_3"}</th>
						<td>
							{form_input name="file_3"}
						</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="file_4"}</th>
						<td>
							{form_input name="file_4"}
						</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="file_5"}</th>
						<td>
							{form_input name="file_5"}
						</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="file_6"}</th>
						<td>
							{form_input name="file_6"}
						</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="file_7"}</th>
						<td>
							{form_input name="file_7"}
						</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="file_8"}</th>
						<td>
							{form_input name="file_8"}
						</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="file_9"}</th>
						<td>
							{form_input name="file_9"}
						</td>
					</tr>
					<tr>
						<th width="10%">{form_name name="file_10"}</th>
						<td>
							{form_input name="file_10"}
						</td>
					</tr>
-->
					<tr>
						<th width="10%"></th>
						<td>{form_input name="add" value="����Ͽ��"}</td>
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
