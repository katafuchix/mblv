{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$ft.thema.name}��Ͽ</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form ethna_action="admin_thema_add_do"}
			<table class="sheet" id="w200">
				<tr>
					<th>{form_name name="thema_name"}</th>
					<td>{form_input name="thema_name" size="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="thema_desc"}</th>
					<td>{form_input name="thema_desc" rows="5" cols="50"}</td>
				</tr>
				<tr>
					<th>{form_name name="thema_point"}</th>
					<td>
						{form_input name="thema_point"}{$ft.point.name}<br />
					</td>
				</tr>
				<tr>
					<th>{form_name name="thema_stock_num"}</th>
					<td>{form_input name="thema_stock_status"}{form_name name="thema_stock_status"}<br />{form_input name="thema_stock_num"}</td>
				</tr>
				<tr>
					<th>{$ft.thema.name}�ۿ���������</th>
					<td>
						{form_input name="thema_start_status"}{form_name name="thema_start_status"}<br />
						{form_input name="thema_start_year" emptyoption=""}ǯ
						{form_input name="thema_start_month" emptyoption=""}��
						{form_input name="thema_start_day" emptyoption=""}��
						{form_input name="thema_start_hour" emptyoption=""}��
						{form_input name="thema_start_min" emptyoption=""}ʬ
					</td>
				</tr>
				<tr>
					<th>{$ft.thema.name}�ۿ���λ����</th>
					<td>
						{form_input name="thema_end_status"}{form_name name="thema_end_status"}<br />
						{form_input name="thema_end_year" emptyoption=""}ǯ
						{form_input name="thema_end_month" emptyoption=""}��
						{form_input name="thema_end_day" emptyoption=""}��
						{form_input name="thema_end_hour" emptyoption=""}��
						{form_input name="thema_end_min" emptyoption=""}ʬ
					</td>
				</tr>
				<tr>
					<th>{form_name name="thema_memo"}</th>
					<td>{form_input name="thema_memo" rows="5" cols="50"}</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit value="��Ͽ"}</td>
				</tr>
			</table>
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
