{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.ad_code.name}��Ͽ</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_adcode_add_do"}
			���̼���URL:{$config.admin_url}pb.php?code=(code)&[uaid]=(uaid)&[status]=(status)&[price]=(price)<br />
			{uniqid}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="ad_code_name"}<br /><span class="required"></span></th>
					<td>{form_input name="ad_code_name" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="ad_code_param"}<br /><span class="required"></span></th>
					<td>
						��ASP��������̼������ˡ�ASP���̤��뤿��Ρ�code�פ��ͤȤ��Ƽ������ѥ�᥿�Ǥ���<br />
						{form_input name="ad_code_param" size="50"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_code_send_param"}</th>
					<td>
						��ASP�ؤΥ桼��������쥯�Ȼ��ˡ��桼�����̤��뤿�����Ϳ�������Υѥ�᥿̾�Ǥ���<br />
						���פʾ��϶��ˤ��Ʋ�������<br />
						{form_input name="ad_code_send_param" size="50"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_code_uaid_param"}</th>
					<td>
						��ASP��������̼������ˡ��桼�����̤��뤿��ξ���Υѥ�᥿̾�Ǥ���<br />
						���פʾ��϶��ˤ��Ʋ�������<br />
						{form_input name="ad_code_uaid_param" size="50"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_code_status_param"}</th>
					<td>
						��ASP��������̼������ˡ����ơ��������̤��뤿��ξ���Υѥ�᥿̾�Ǥ���<br />
						���פʾ��϶��ˤ��Ʋ�������<br />
						{form_input name="ad_code_status_param" size="50"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_code_status_param_receive"}</th>
					<td>
						��ASP��������̼������ˡ����̤�ǧ���륹�ơ������Ǥ���<br />
						���פʾ��϶��ˤ��Ʋ�������<br />
						{form_input name="ad_code_status_param_receive" size="50"}
					</td>
				</tr>
				<tr>
					<th>{form_name name="ad_code_price_param"}</th>
					<td>
						��ASP��������̼������ˡ����̶�ۤ��̤��뤿��Υѥ�᥿̾�Ǥ���<br />
						���פʾ��϶��ˤ��Ʋ�������<br />
						{form_input name="ad_code_price_param" size="50"}
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="����Ͽ��"}</td>
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
