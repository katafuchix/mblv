{include file="admin/header.tpl"}

<div id="two_column">
		<!-- *********************** /* #main ****************************** -->
		<div id="main" class="floatr">
			<div id="mainC">
				<!-- ここからメインコンテンツ-->
				<h2>受注詳細情報編集</h2>
				
				<!--エラーがあれば表示-->
				<div class="entry_box">
					{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				</div>
				{form action="$script" ethna_action="admin_ec_userorder_edit_do" method="post"}
				
				{form_input name="user_order_id"}
				{form_input name="cart_hash" default="`$app_ne.cart.cart_hash`"}
				{form_input name="delivery_type" value="`$app.delivery_type`"}
				
				　表示する <= <a href="?action_admin_ec_userorder_edit=true&user_order_id={$form.user_order_id}">編集する</a><br>
				
				<table class="sheet">
					<tr>
						<th colspan=2 style="text-align:center;">ご注文者情報</th>
					</tr>
					<tr>
						<th width=200>{form_name name="user_order_no"}</th>
						<td>{$form.user_order_no}</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_status"}</th>
						<td>
							{$config.cart_status[$app_ne.cart.cart_status].name}
						</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_created_time"}</th>
						<td>{$form.user_order_created_time|jp_date_format:"%Y/%m/%d (%a) %H:%M:%S"}</td>
					</tr>
					<tr>
						<th>{$ft.user_order_name.name}</th>
						<td>{$form.user_order_delivery_name}</td>
					</tr>
					<tr>
						<th>{$ft.user_order_name.name}{form_name name="user_mailaddress"}</th>
						<td>{$app.user.user_mailaddress}</td>
					</tr>
					<tr>
						<th>{$ft.user_order_name.name}{form_name name="user_address"}</th>
						<td>
								〒{$form.user_order_delivery_zipcode}
								&nbsp;
								{$config.region_id[$form.user_order_delivery_region_id].name}
								&nbsp;
								{$app.user.user_address}
								&nbsp;
								{$app.user.user_address_building}
						</td>
					</tr>
					<tr>
						<th>{$ft.user_order_name.name}{form_name name="user_phone"}</th>
						<td>{$app.user.user_phone}</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_delivery_type"}</th>
						<td>{if $form.user_order_delivery_type == 1}注文者住所{elseif $form.user_order_delivery_type== 2}指定住所{/if}</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_delivery_name"}</th>
						<td>{$form.user_order_delivery_name}</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_delivery_address"}</th>
						<td>
							〒{$form.user_order_delivery_zipcode}
							&nbsp;
							{$config.region_id[$form.user_order_delivery_region_id].name}
							&nbsp;
							{$form.user_order_delivery_address}
							&nbsp;
							{$form.user_order_delivery_address_building}
						</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_delivery_phone"}</th>
						<td>{$form.user_order_delivery_phone}</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_type"}</th>
						<td>{$config.user_order_type[$form.user_order_type].name}
							{if $form.user_order_type==2}
								{$config.user_order_conveni_type[$form.user_order_conveni_type].name}
							{/if}
						</td>
					</tr>
					{if $form.user_order_type==1}
						<tr>
							<th>{form_name name="user_order_card_revo_status"}</th>
							<td>{if $form.user_order_card_revo_status==1}リボ払い{else}一回払い{/if}</td>
						</tr>
						<tr>
							<th>{form_name name="user_order_card_cart_hash"}</th>
							<td>{$app_ne.crat.cart_hash}</td>
						</tr>
						<tr>
							<th>{form_name name="user_order_credit_auth_code"}</th>
							<td>{$app.credit_auth_code}</td>
						</tr>
					{elseif $app.order_type==2}
						<tr>
							<th>{form_name name="user_order_conveni_cart_hash"}</th>
							<td>{$app.cart_hash}</td>
						</tr>
						<tr>
							<th>{form_name name="user_order_conveni_sale_code"}</th>
							<td>{$app.conveni_sale_code}</td>
						</tr>
					{/if}
					<tr>
						<th>{$config.point_name}{form_name name="user_order_use_point_status"}</th>
						<td>{if $form.user_order_use_point_status==1}利用する（ {$form.user_order_use_point} pt ）{else}利用しない{/if}</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_get_point"}{$config.point_name}</th>
						<td>{$form.user_order_get_point|number_format}{$config.point_unit}</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_delivery_day"}</th>
						<td>
							{if $form.user_order_delivery_day == 0}指定なし
							{elseif $form.user_order_delivery_day == 1}午前中
							{elseif $form.user_order_delivery_day == 2}12-14時
							{elseif $form.user_order_delivery_day == 3}14-16時
							{elseif $form.user_order_delivery_day == 4}16-18時
							{elseif $form.user_order_delivery_day == 5}18-21時
							{/if}
						</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_delivery_note"}</th>
						<td>{$form.user_order_delivery_note}</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_comment"}</th>
						<td>{$form.user_order_comment}</td>
					</tr>
				</table>
				
				
				<table class="sheet">
					<tr>
						<th colspan=8 style="text-align:center;">ご注文商品内容</th>
					</tr>
					<tr>
						<th width=100>{form_name name="cart_id"}</th>
						<th width=100>{form_name name="item_id"}</th>
						<th width=200>{form_name name="item_name"}</th>
						<th width=200>{form_name name="item_type"}</th>
						<th width=60>{form_name name="item_price"}</th>
						<th width=60>{form_name name="cart_item_num"}</th>
						<th width=60>{form_name name="cart_status"}</th>
					</tr>
					{foreach from=$app.item_list item=i}
					{form_input name="cart_id" value="`$i.cart_id`"}
					<tr>
						<td>{$i.cart_id}</td>
						<td>{$i.item_id}</td>
						<td>{$i.item_name}</td>
						<td>{$i.item_type}</td>
						<td>{$i.item_price}</td>
						<td>{$i.cart_item_num}</td>
						<td>
							{$app.status_list[$i.cart_status].name}
						</td>
					</tr>
					{/foreach}
				</table>
				
				<table class="sheet">
					<tr>
						<th colspan=9 style="text-align:center;">発送情報</th>
					</tr>
					<tr>
						<th>{form_name name="post_unit_group_id"}</th>
						<th>{form_name name="slip_code"}</th>
						<th>{form_name name="post_unit_sent_status"}</th>
						<th width=60>{form_name name="item_id"}</th>
						<th>{form_name name="item_name"}</th>
						<th>{form_name name="item_type"}</th>
						<th>{form_name name="post_unit_item_num"}</th>
					</tr>
					{foreach from=$app.post_unit_list item=i}
					<tr>
						{if $i.rowspan > 0}
							{form_input name="cart_hash" value="`$i.cart_hash`"}
							{form_input name="post_unit_group_id" value="`$i.post_unit_group_id`"}
							<td rowspan={$i.rowspan}>{$i.post_unit_group_id}</td>
							<td rowspan={$i.rowspan}>{$i.slip_code}</td>
							{*}<td rowspan={$i.rowspan}>{$i.post_sent_flag}</td>{*}
							
							<td rowspan={$i.rowspan}>{$app.post_sent_flag_list[$i.post_unit_sent_status].name}</td>
							
						{/if}
						<td>{$i.item_id}</td>
						<td>{$i.item_name}</td>
						<td>{$i.item_type}</td>
						<td>{$i.post_unit_item_num}</td>
					</tr>
					{/foreach}
				</table>
				
				
{*}
				<table class="sheet">
					<tr>
						<th colspan=3 style="text-align:center;">ご注文金額</th>
					</tr>
					<tr>
						<th width=200>{form_name name="user_order_total_price1}</th>
						<td>{$form.user_order_total_price1}円</td><td>　→　{form_input name="total_price1" default=$app.total_price1 size=10}円</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_postage"}</th>
						<td>{$form.user_order_postage}円</td><td>　→　{form_input name="user_order_postage" default=$app.user_order_postage size=10}円</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_exchange_fee"}</th>
						<td>{$app.user_order_exchange_fee}円</td><td>　→　{form_input name="user_order_exchange_fee" default=$app.user_order_exchange_fee size=10}円</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_use_point"}{$config.point_name}</th>
						<td>{$app.use_point|number_format}{$config.point_unit}</td><td>　→　{form_input name="use_point" default=$app.use_point size=10}{$config.point_unit}</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_total_price2"}</th>
						<td>{$app.total_price2}円</td><td>　→　{form_input name="total_price2" default=$app.total_price2 size=10}円</td>
					</tr>
				</table>
{*}
				<table class="sheet">
					<tr>
						<th colspan=2 style="text-align:center;">ご注文金額</th>
					</tr>
					<tr>
						<th width=200>{form_name name="user_order_total_price1"}</th>
						<td>{$form.user_order_total_price1}円</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_postage"}</th>
						<td>{$form.user_order_postage}円</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_exchange_fee"}</th>
						<td>{$form.user_order_exchange_fee}円</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_use_point_status"}{$config.point_name}</th>
						<td>{$form.user_order_use_point|number_format}{$config.point_unit}</td>
					</tr>
					<tr>
						<th>{form_name name="user_order_total_price2"}</th>
						<td>{$form.user_order_total_price2}円</td>
					</tr>
				</table>
				<div align="center">
					<!-- input type="submit" value="この内容で更新する" -->
				{/form}
					<input type="button" value="受注一覧に戻る" onClick="location.href='?action_admin_ec_userorder_list=true';">
				</div>
				
					<!-- ここまでメインコンテンツ-->
			</div>
		</div>
		<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
