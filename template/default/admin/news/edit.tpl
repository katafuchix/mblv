{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>�˥塼���Խ�</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action="$script" ethna_action="admin_news_edit_do"}
			{form_input name="news_id"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="news_type"}</th>
					<td>{form_input name="news_type"}</td>
				</tr>
				<tr>
					<th>{form_name name="news_title"}<br /><span class="required"></span></th>
					<td>{form_input name="news_title" size=50}</td>
				</tr>
				<tr>
					<th>{form_name name="news_body"}<br /><span class="required"></span></th>
					<td>{form_input name="news_body" cols="50" rows="30"}</td>
				</tr>
				<tr>
					<th>{form_name name="news_time"}</th>
					<td>
						�����Ϥ����ƥ����Ȥ����Τޤ�ɽ������ޤ���<br />
						{form_input name="news_time"}
					</td>
				</tr>
				<tr>
					<th>�ۿ���������</th>
					<td>
						{form_input name="news_start_status"}{form_name name="news_start_status"}<br />
						{form_input name="news_start_year" emptyoption=""}ǯ
						{form_input name="news_start_month" emptyoption=""}��
						{form_input name="news_start_day" emptyoption=""}��
						{form_input name="news_start_hour" emptyoption=""}��
						{form_input name="news_start_min" emptyoption=""}ʬ
					</td>
				</tr>
				<tr>
					<th>�ۿ���λ����</th>
					<td>
						{form_input name="news_end_status"}{form_name name="news_end_status"}<br />
						{form_input name="news_end_year" emptyoption=""}ǯ
						{form_input name="news_end_month" emptyoption=""}��
						{form_input name="news_end_day" emptyoption=""}��
						{form_input name="news_end_hour" emptyoption=""}��
						{form_input name="news_end_min" emptyoption=""}ʬ
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="�˥塼���Խ�"}</td>
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

