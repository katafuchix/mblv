{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ��������ᥤ�󥳥�ƥ��-->
				<h2>{$ft.postage.name}�Խ�</h2>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				{form action="$script" ethna_action="admin_ec_postage_edit_do" method="post" enctype="multipart/form-data"}
				{form_input name="postage_id"}
				<table class="sheet" id="w200">
				<tr>
					<th>{form_name  name="postage_name"}<br /><span class="required"></span></th>
					<td>{form_input name="postage_name" size=50}</td>
				</tr>
				{if $form.postage_type == 1}
					�������Χ��{$ft.postage.name}�����ꤷ�ޤ���<br />
					{form_input name="postage_type" value="1"}
					{form_input name="postage_same_status" value="1"}
					<tr>
						<th>{form_name  name="postage_same_price"}<br /><span class="required"></span></th>
						<td>{form_input name="postage_same_price"}��</td>
					</tr>
				{elseif $form.postage_type == 2}
					���ϰ����{$ft.postage.name}�����ꤷ�ޤ���<br />
					{form_input name="postage_type" value="2"}
					<tr>
						<th>{form_name  name="postage_pref_1"}</th>
						<td>{form_input name="postage_pref_1"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_2"}</th>
						<td>{form_input name="postage_pref_2"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_3"}</th>
						<td>{form_input name="postage_pref_3"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_4"}</th>
						<td>{form_input name="postage_pref_4"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_5"}</th>
						<td>{form_input name="postage_pref_5"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_6"}</th>
						<td>{form_input name="postage_pref_6"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_7"}</th>
						<td>{form_input name="postage_pref_7"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_8"}</th>
						<td>{form_input name="postage_pref_8"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_9"}</th>
						<td>{form_input name="postage_pref_9"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_10"}</th>
						<td>{form_input name="postage_pref_10"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_11"}</th>
						<td>{form_input name="postage_pref_11"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_12"}</th>
						<td>{form_input name="postage_pref_12"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_13"}</th>
						<td>{form_input name="postage_pref_13"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_14"}</th>
						<td>{form_input name="postage_pref_14"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_15"}</th>
						<td>{form_input name="postage_pref_15"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_16"}</th>
						<td>{form_input name="postage_pref_16"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_17"}</th>
						<td>{form_input name="postage_pref_17"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_18"}</th>
						<td>{form_input name="postage_pref_18"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_19"}</th>
						<td>{form_input name="postage_pref_19"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_20"}</th>
						<td>{form_input name="postage_pref_20"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_21"}</th>
						<td>{form_input name="postage_pref_21"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_22"}</th>
						<td>{form_input name="postage_pref_22"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_23"}</th>
						<td>{form_input name="postage_pref_23"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_24"}</th>
						<td>{form_input name="postage_pref_24"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_25"}</th>
						<td>{form_input name="postage_pref_25"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_26"}</th>
						<td>{form_input name="postage_pref_26"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_27"}</th>
						<td>{form_input name="postage_pref_27"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_28"}</th>
						<td>{form_input name="postage_pref_28"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_29"}</th>
						<td>{form_input name="postage_pref_29"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_30"}</th>
						<td>{form_input name="postage_pref_30"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_31"}</th>
						<td>{form_input name="postage_pref_31"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_32"}</th>
						<td>{form_input name="postage_pref_32"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_33"}</th>
						<td>{form_input name="postage_pref_33"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_34"}</th>
						<td>{form_input name="postage_pref_34"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_35"}</th>
						<td>{form_input name="postage_pref_35"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_36"}</th>
						<td>{form_input name="postage_pref_36"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_37"}</th>
						<td>{form_input name="postage_pref_37"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_38"}</th>
						<td>{form_input name="postage_pref_38"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_39"}</th>
						<td>{form_input name="postage_pref_39"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_40"}</th>
						<td>{form_input name="postage_pref_40"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_41"}</th>
						<td>{form_input name="postage_pref_41"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_42"}</th>
						<td>{form_input name="postage_pref_42"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_43"}</th>
						<td>{form_input name="postage_pref_43"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_44"}</th>
						<td>{form_input name="postage_pref_44"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_45"}</th>
						<td>{form_input name="postage_pref_45"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_46"}</th>
						<td>{form_input name="postage_pref_46"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_47"}</th>
						<td>{form_input name="postage_pref_47"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_48"}</th>
						<td>{form_input name="postage_pref_48"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_49"}</th>
						<td>{form_input name="postage_pref_49"}��</td>
					</tr>
				{elseif $form.postage_type == 3}
					��{$ft.postage.name}��̵���ˤʤ��㤤ʪ��׶�ۤ���ꤷ�ޤ���<br />
					{form_input name="postage_type" value="3"}
					<tr>
						<th>{form_name  name="postage_total_price_set"}</th>
						<td>{form_input name="postage_total_price_set"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_total_price_value"}</th>
						<td><input type="text" name="postage_total_price_value" value="{$app.postage_total_price_value}" maxlength="1000000" disabled>��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_total_price_set_under"}</th>
						<td>{form_input name="postage_total_price_set_under"}��</td>
					</tr>
				{elseif $form.postage_type == 4}
					��{$ft.postage.name}��̵���ˤʤ��㤤ʪ��׸Ŀ�����ꤷ�ޤ���<br />
					{form_input name="postage_type" value="4"}
					<tr>
						<th>{form_name  name="postage_total_piece_set"}</th>
						<td>{form_input name="postage_total_piece_set"}��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_total_piece_value"}</th>
						<td><input type="text" name="postage_total_piece_value" value="{$app.postage_total_piece_value}" maxlength="1000000" disabled>��</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_total_piece_set_under"}</th>
						<td>{form_input name="postage_total_piece_set_under"}��</td>
					</tr>
				{/if}
					<tr>
						<th></th>
						<td>{form_input name="edit" value="���Խ���"}</td>
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
