{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ここからメインコンテンツ-->
				<h2>{$ft.postage.name}追加</h2>
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				{form action="$script" ethna_action="admin_ec_postage_add_do" method="post" enctype="multipart/form-data"}
				{uniqid}
				<table class="sheet" id="w200">
				<tr>
					<th>{form_name  name="postage_name"}<br /><span class="required"></span></th>
					<td>{form_input name="postage_name" size=50}</td>
				</tr>
				{if $form.postage_type == 1}
					　全国一律の{$ft.postage.name}を設定します。<br />
					{form_input name="postage_type" value="1"}
					{form_input name="postage_same_status" value="1"}
					<tr>
						<th>{form_name  name="postage_same_price"}<br /><span class="required"></span></th>
						<td>{form_input name="postage_same_price"}円</td>
					</tr>
				{elseif $form.postage_type == 2}
					　地域毎に{$ft.postage.name}を設定します。<br />
					{form_input name="postage_type" value="2"}
					<tr>
						<th>{form_name  name="postage_pref_1"}</th>
						<td>{form_input name="postage_pref_1"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_2"}</th>
						<td>{form_input name="postage_pref_2"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_3"}</th>
						<td>{form_input name="postage_pref_3"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_4"}</th>
						<td>{form_input name="postage_pref_4"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_5"}</th>
						<td>{form_input name="postage_pref_5"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_6"}</th>
						<td>{form_input name="postage_pref_6"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_7"}</th>
						<td>{form_input name="postage_pref_7"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_8"}</th>
						<td>{form_input name="postage_pref_8"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_9"}</th>
						<td>{form_input name="postage_pref_9"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_10"}</th>
						<td>{form_input name="postage_pref_10"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_11"}</th>
						<td>{form_input name="postage_pref_11"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_12"}</th>
						<td>{form_input name="postage_pref_12"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_13"}</th>
						<td>{form_input name="postage_pref_13"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_14"}</th>
						<td>{form_input name="postage_pref_14"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_15"}</th>
						<td>{form_input name="postage_pref_15"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_16"}</th>
						<td>{form_input name="postage_pref_16"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_17"}</th>
						<td>{form_input name="postage_pref_17"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_18"}</th>
						<td>{form_input name="postage_pref_18"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_19"}</th>
						<td>{form_input name="postage_pref_19"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_20"}</th>
						<td>{form_input name="postage_pref_20"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_21"}</th>
						<td>{form_input name="postage_pref_21"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_22"}</th>
						<td>{form_input name="postage_pref_22"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_23"}</th>
						<td>{form_input name="postage_pref_23"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_24"}</th>
						<td>{form_input name="postage_pref_24"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_25"}</th>
						<td>{form_input name="postage_pref_25"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_26"}</th>
						<td>{form_input name="postage_pref_26"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_27"}</th>
						<td>{form_input name="postage_pref_27"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_28"}</th>
						<td>{form_input name="postage_pref_28"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_29"}</th>
						<td>{form_input name="postage_pref_29"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_30"}</th>
						<td>{form_input name="postage_pref_30"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_31"}</th>
						<td>{form_input name="postage_pref_31"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_32"}</th>
						<td>{form_input name="postage_pref_32"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_33"}</th>
						<td>{form_input name="postage_pref_33"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_34"}</th>
						<td>{form_input name="postage_pref_34"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_35"}</th>
						<td>{form_input name="postage_pref_35"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_36"}</th>
						<td>{form_input name="postage_pref_36"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_37"}</th>
						<td>{form_input name="postage_pref_37"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_38"}</th>
						<td>{form_input name="postage_pref_38"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_39"}</th>
						<td>{form_input name="postage_pref_39"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_40"}</th>
						<td>{form_input name="postage_pref_40"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_41"}</th>
						<td>{form_input name="postage_pref_41"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_42"}</th>
						<td>{form_input name="postage_pref_42"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_43"}</th>
						<td>{form_input name="postage_pref_43"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_44"}</th>
						<td>{form_input name="postage_pref_44"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_45"}</th>
						<td>{form_input name="postage_pref_45"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_46"}</th>
						<td>{form_input name="postage_pref_46"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_47"}</th>
						<td>{form_input name="postage_pref_47"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_48"}</th>
						<td>{form_input name="postage_pref_48"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_pref_49"}</th>
						<td>{form_input name="postage_pref_49"}円</td>
					</tr>
				{elseif $form.postage_type == 3}
					　{$ft.postage.name}が無料になる買い物合計金額を指定します。<br />
					{form_input name="postage_type" value="3"}
					<tr>
						<th>{form_name  name="postage_total_price_set"}</th>
						<td>{form_input name="postage_total_price_set"}円</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_total_price_value"}</th>
						<td>
							<input type="text" name="postage_total_price_value" value="0" maxlength="1000000" disabled>円
							<input type="hidden" name="postage_total_price_value" value="0" >
						</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_total_price_set_under"}</th>
						<td>{form_input name="postage_total_price_set_under"}円</td>
					</tr>
				{elseif $form.postage_type == 4}
					　{$ft.postage.name}が無料になる買い物合計個数を指定します。<br />
					{form_input name="postage_type" value="4"}
					<tr>
						<th>{form_name  name="postage_total_piece_set"}</th>
						<td>{form_input name="postage_total_piece_set"}個</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_total_piece_value"}</th>
						<td>
							<input type="text" name="postage_total_piece_value" value="0" maxlength="1000000" disabled>円
							<input type="hidden" name="postage_total_piece_value" value="0" >
						</td>
					</tr>
					<tr>
						<th>{form_name  name="postage_total_piece_set_under"}</th>
						<td>{form_input name="postage_total_piece_set_under"}円</td>
					</tr>
				{/if}
					<tr>
						<th></th>
						<td>{form_input name="add" value="　登録　"}</td>
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
