{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.ad.name}編集</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_ad_edit_do" enctype="multipart/form-data"}
			{form_input name="ad_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="ad_name"}<br /><span class="required"></span></th>
					<td>{form_input name="ad_name" size=50}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_desc"}<br /><span class="required"></span></th>
					<td>{form_input name="ad_desc" cols="40" roes="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_url_d"}<br /><span class="required"></span></th>
					<td>
						※会員情報は選択された広告ASPコードによって自動に引き継がれます。<br />
						{form_input name="ad_url_d" size=80}
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_url_a"}<br /><span class="required"></span></th>
					<td>{form_input name="ad_url_a" size=80}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_url_s"}<br /><span class="required"></span></th>
					<td>{form_input name="ad_url_s" size=80}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_code_id"}<br /><span class="required"></span></th>
					<td>{form_input name="ad_code_id"}</td>
				</tr>
 				<tr>
					<th>{form_name name="ad_image"}</th>
					<td>
						{if $form.ad_image}<img src="f.php?&file=ad/{$form.ad_image}"><br />{/if}
						{form_input name="ad_image"}
						{form_input name="ad_image_file"}<br />
						{form_input name="ad_image_status"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_point"}<br /><span class="required"></span></th>
					<td>
						<input type="radio" name="ad_point_type" value="1" {if $form.ad_point_type!=2}checked{/if}>&nbsp;{form_input name="ad_point"}pt（備考：{form_input name="ad_item_point"}pt）<br />
						<input type="radio" name="ad_point_type" value="2" {if $form.ad_point_type==2}checked{/if}>&nbsp;{form_input name="ad_point_percent"}%（備考：{form_input name="ad_item_point_percent"}%）
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_type"}<br /><span class="required"></span></th>
					<td>{form_input name="ad_type"}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_display_type"}<br /><span class="required"></span></th>
					<td>{form_input name="ad_display_type"}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_category_id"}<br /><span class="required"></span></th>
					<td>{form_input name="ad_category_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_stock_num"}</th>
					<td>{form_input name="ad_stock_status"}{form_name name="ad_stock_status"}<br />{form_input name="ad_stock_num"}</td>
				</tr>
				<tr>
					<th>広告配信開始日時</th>
					<td>
						{form_input name="ad_start_status"}{form_name name="ad_start_status"}<br />
						{form_input name="ad_start_year" emptyoption=""}年
						{form_input name="ad_start_month" emptyoption=""}月
						{form_input name="ad_start_day" emptyoption=""}日
						{form_input name="ad_start_hour" emptyoption=""}時
						{form_input name="ad_start_min" emptyoption=""}分
					</td>
				</tr>
				<tr>
					<th>広告配信終了日時</th>
					<td>
						{form_input name="ad_end_status"}{form_name name="ad_end_status"}<br />
						{form_input name="ad_end_year" emptyoption=""}年
						{form_input name="ad_end_month" emptyoption=""}月
						{form_input name="ad_end_day" emptyoption=""}日
						{form_input name="ad_end_hour" emptyoption=""}時
						{form_input name="ad_end_min" emptyoption=""}分
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_memo"}</th>
					<td>{form_input name="ad_memo" rows="5" cols="50"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="　`$ft.ad.name`編集　"}</td>
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
