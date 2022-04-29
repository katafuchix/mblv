{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ¤³¤³¤«¤é¥á¥¤¥ó¥³¥ó¥Æ¥ó¥Ä-->
				<h2>{$ft.postage.name}ÊÔ½¸</h2>
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
					¡¡Á´¹ñ°ìÎ§¤Î{$ft.postage.name}¤òÀßÄê¤·¤Þ¤¹¡£<br />
					{form_input name="postage_type" value="1"}
					{form_input name="postage_same_status" value="1"}
					<tr>
						<th>{form_name  name="postage_same_price"}<br /><span class="required"></span></th>
						<td>{form_input name="postage_same_price"}±ß</td>
					</tr>
				{elseif $form.postage_type == 2}
					¡¡ÃÏ°èËè¤Ë{$ft.postage.name}¤òÀßÄê¤·¤Þ¤¹¡£<br />
					{form_input name="postage_type" value="2"}
					<tr>
						<th>{form_name  name="postage_pref_1"}</th>
						<td>{form_input name="postage_pref_1"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_2"}</th>
						<td>{form_input name="postage_pref_2"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_3"}</th>
						<td>{form_input name="postage_pref_3"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_4"}</th>
						<td>{form_input name="postage_pref_4"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_5"}</th>
						<td>{form_input name="postage_pref_5"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_6"}</th>
						<td>{form_input name="postage_pref_6"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_7"}</th>
						<td>{form_input name="postage_pref_7"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_8"}</th>
						<td>{form_input name="postage_pref_8"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_9"}</th>
						<td>{form_input name="postage_pref_9"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_10"}</th>
						<td>{form_input name="postage_pref_10"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_11"}</th>
						<td>{form_input name="postage_pref_11"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_12"}</th>
						<td>{form_input name="postage_pref_12"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_13"}</th>
						<td>{form_input name="postage_pref_13"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_14"}</th>
						<td>{form_input name="postage_pref_14"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_15"}</th>
						<td>{form_input name="postage_pref_15"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_16"}</th>
						<td>{form_input name="postage_pref_16"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_17"}</th>
						<td>{form_input name="postage_pref_17"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_18"}</th>
						<td>{form_input name="postage_pref_18"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_19"}</th>
						<td>{form_input name="postage_pref_19"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_20"}</th>
						<td>{form_input name="postage_pref_20"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_21"}</th>
						<td>{form_input name="postage_pref_21"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_22"}</th>
						<td>{form_input name="postage_pref_22"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_23"}</th>
						<td>{form_input name="postage_pref_23"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_24"}</th>
						<td>{form_input name="postage_pref_24"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_25"}</th>
						<td>{form_input name="postage_pref_25"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_26"}</th>
						<td>{form_input name="postage_pref_26"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_27"}</th>
						<td>{form_input name="postage_pref_27"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_28"}</th>
						<td>{form_input name="postage_pref_28"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_29"}</th>
						<td>{form_input name="postage_pref_29"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_30"}</th>
						<td>{form_input name="postage_pref_30"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_31"}</th>
						<td>{form_input name="postage_pref_31"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_32"}</th>
						<td>{form_input name="postage_pref_32"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_33"}</th>
						<td>{form_input name="postage_pref_33"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_34"}</th>
						<td>{form_input name="postage_pref_34"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_35"}</th>
						<td>{form_input name="postage_pref_35"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_36"}</th>
						<td>{form_input name="postage_pref_36"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_37"}</th>
						<td>{form_input name="postage_pref_37"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_38"}</th>
						<td>{form_input name="postage_pref_38"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_39"}</th>
						<td>{form_input name="postage_pref_39"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_40"}</th>
						<td>{form_input name="postage_pref_40"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_41"}</th>
						<td>{form_input name="postage_pref_41"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_42"}</th>
						<td>{form_input name="postage_pref_42"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_43"}</th>
						<td>{form_input name="postage_pref_43"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_44"}</th>
						<td>{form_input name="postage_pref_44"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_45"}</th>
						<td>{form_input name="postage_pref_45"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_46"}</th>
						<td>{form_input name="postage_pref_46"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_47"}</th>
						<td>{form_input name="postage_pref_47"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_48"}</th>
						<td>{form_input name="postage_pref_48"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_49"}</th>
						<td>{form_input name="postage_pref_49"}±ß</td>
					</tr>
				{elseif $form.postage_type == 3}
					¡¡{$ft.postage.name}¤¬ÌµÎÁ¤Ë¤Ê¤ëÇã¤¤Êª¹ç·×¶â³Û¤ò»ØÄê¤·¤Þ¤¹¡£<br />
					{form_input name="postage_type" value="3"}
					<tr>
						<th>{form_name  name="postage_total_price_set"}</th>
						<td>{form_input name="postage_total_price_set"}±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_total_price_value"}</th>
						<td><input type="text" name="postage_total_price_value" value="{$app.postage_total_price_value}" maxlength="1000000" disabled>±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_total_price_set_under"}</th>
						<td>{form_input name="postage_total_price_set_under"}±ß</td>
					</tr>
				{elseif $form.postage_type == 4}
					¡¡{$ft.postage.name}¤¬ÌµÎÁ¤Ë¤Ê¤ëÇã¤¤Êª¹ç·×¸Ä¿ô¤ò»ØÄê¤·¤Þ¤¹¡£<br />
					{form_input name="postage_type" value="4"}
					<tr>
						<th>{form_name  name="postage_total_piece_set"}</th>
						<td>{form_input name="postage_total_piece_set"}¸Ä</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_total_piece_value"}</th>
						<td><input type="text" name="postage_total_piece_value" value="{$app.postage_total_piece_value}" maxlength="1000000" disabled>±ß</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_total_piece_set_under"}</th>
						<td>{form_input name="postage_total_piece_set_under"}±ß</td>
					</tr>
				{/if}
					<tr>
						<th></th>
						<td>{form_input name="edit" value="¡¡ÊÔ½¸¡¡"}</td>
					</tr>
				</table>
				{/form}
					<!-- ¤³¤³¤Þ¤Ç¥á¥¤¥ó¥³¥ó¥Æ¥ó¥Ä-->
			</div>
		</div>
		<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
