{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.ad.name}��Ͽ</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_ad_add_do" enctype="multipart/form-data"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="ad_name"}</th>
					<td>{form_input name="ad_name" size=50}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_desc"}</th>
					<td>{form_input name="ad_desc" cols="40" roes="10"}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_url_d"}</th>
					<td>
						�������������򤵤줿����ASP�����ɤˤ�äƼ�ư�˰����Ѥ���ޤ���<br />
						{form_input name="ad_url_d" size=80}
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_url_a"}</th>
					<td>{form_input name="ad_url_a" size=80}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_url_s"}</th>
					<td>{form_input name="ad_url_s" size=80}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_code_id"}</th>
					<td>{form_input name="ad_code_id"}</td>
				</tr>
 				<tr>
					<th>{form_name name="ad_image"}</th>
					<td>{form_input name="ad_image"}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_point"}</th>
					<td>
						<input type="radio" name="ad_point_type" value="1" {if $form.ad_point_type!=2}checked{/if}>&nbsp;{form_input name="ad_point"}{$ft.point.name}�����͡�{form_input name="ad_item_point"}{$ft.point.name}��<br />
						<input type="radio" name="ad_point_type" value="2" {if $form.ad_point_type==2}checked{/if}>&nbsp;{form_input name="ad_point_percent"}%�����͡�{form_input name="ad_item_point_percent"}%��
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_type"}</th>
					<td>{form_input name="ad_type"}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_display_type"}</th>
					<td>{form_input name="ad_display_type"}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_category_id"}</th>
					<td>{form_input name="ad_category_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_stock_num"}</th>
					<td>{form_input name="ad_stock_status"}{form_name name="ad_stock_status"}<br />{form_input name="ad_stock_num"}</td>
				</tr>
				<tr>
					<th>�����ۿ���������</th>
					<td>
						{form_input name="ad_start_status"}{form_name name="ad_start_status"}<br />
						{form_input name="ad_start_year" emptyoption=""}ǯ
						{form_input name="ad_start_month" emptyoption=""}��
						{form_input name="ad_start_day" emptyoption=""}��
						{form_input name="ad_start_hour" emptyoption=""}��
						{form_input name="ad_start_min" emptyoption=""}ʬ
					</td>
				</tr>
				<tr>
					<th>�����ۿ���λ����</th>
					<td>
						{form_input name="ad_end_status"}{form_name name="ad_end_status"}<br />
						{form_input name="ad_end_year" emptyoption=""}ǯ
						{form_input name="ad_end_month" emptyoption=""}��
						{form_input name="ad_end_day" emptyoption=""}��
						{form_input name="ad_end_hour" emptyoption=""}��
						{form_input name="ad_end_min" emptyoption=""}ʬ
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_memo"}</th>
					<td>{form_input name="ad_memo" rows="5" cols="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_point_give_day"}</th>
					<td>
						{form_input name="ad_point_give_day_status"}{form_name name="ad_point_give_day_status"}<br />
						{form_input name="ad_point_give_day"}
						<br />����n,m,p�ץ���޶��ڤ��ʣ�������꤬��ǽ�Ǥ�
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_point_give_term"}</th>
					<td>
						{form_input name="ad_point_give_term_status"}{form_name name="ad_point_give_term_status"}<br />
						{form_input name="ad_point_give_term" emptyoption=""}���֤˰����Ϳ����
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="`$ft.ad.name`��Ͽ"}</td>
				</tr>
			</table>
			{uniqid}
			{/form}
			<p id="pagetop"><a href="javascript:pagetop(0);">�ڡ����ȥå�</a></p>
			<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}

