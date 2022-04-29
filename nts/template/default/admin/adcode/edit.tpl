{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>ASPコード編集</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_adcode_edit_do"}
			{form_input name="ad_code_id"}
			成果受信URL:{$config.admin_url}pb.php?code=(code)&[uaid]=(uaid)&[status]=(status)&[price]=(price)<br />
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="ad_code_id"}</th>
					<td>{$form.ad_code_id}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_code_param"}</th>
					<td>
						※ASPからの成果受信時に、ASPを識別するための「code」の値として受け取るパラメタです。<br />
						{form_input name="ad_code_param" size="50"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_code_send_param"}</th>
					<td>
						※ASPへのユーザリダイレクト時に、ユーザを識別するために付与する情報のパラメタ名です。<br />
						不要な場合は空にして下さい。<br />
						{form_input name="ad_code_send_param" size="50"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_code_uaid_param"}</th>
					<td>
						※ASPからの成果受信時に、ユーザを識別するための情報のパラメタ名です。<br />
						不要な場合は空にして下さい。<br />
						{form_input name="ad_code_uaid_param" size="50"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_code_status_param"}</th>
					<td>
						※ASPからの成果受信時に、ステータスを識別するための情報のパラメタ名です。<br />
						不要な場合は空にして下さい。<br />
						{form_input name="ad_code_status_param" size="50"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_code_status_param_receive"}</th>
					<td>
						※ASPからの成果受信時に、成果を承認するステータスです。<br />
						不要な場合は空にして下さい。<br />
						{form_input name="ad_code_status_param_receive" size="50"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_code_price_param"}</th>
					<td>
						※ASPからの成果受信時に、成果金額を識別するためのパラメタ名です。<br />
						不要な場合は空にして下さい。<br />
						{form_input name="ad_code_price_param" size="50"}
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="編集"}</td>
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
