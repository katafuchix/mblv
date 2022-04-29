{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>�ݥ���ȴ������</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{form action=$script ethna_action="admin_point_exchange_list"}
			<table class="sheet">
				<tr>
					<th>{form_name name="user_id"}</th>
					<td>{form_input name="user_id"}</td>
				</tr>
				<tr>
					<th>{form_name name="user_nickname"}</th>
					<td>{form_input name="user_nickname"}</td>
				</tr>
				<tr>
					<th>{form_name name="point_type"}</th>
					<td>{form_input name="point_type" emptyoption=""}</td>
				</tr>
				<tr>
					<th>{form_name name="point_status"}</th>
					<td>{form_input name="point_status" emptyoption=""}</td>
				</tr>
				<tr>
					<th>�ݥ���ȴ������</th>
					<td>
					{form_input name="point_exchange_year_start" emptyoption=""}
					ǯ{form_input name="point_exchange_month_start" emptyoption=""}
					��{form_input name="point_exchange_day_start" emptyoption=""}��
					��
					{form_input name="point_exchange_year_end" emptyoption=""}
					ǯ{form_input name="point_exchange_month_end" emptyoption=""}
					��{form_input name="point_exchange_day_end" emptyoption=""}��
					</td>
				</tr>
				<tr>
					<th></th>
					<td>{form_submit name="search" value="����"}{form_submit name="csv" value="CSV���������"}</td>
				</tr>
			</table>
			{/form}
			
			{include file="admin/pager.tpl"}
			<br />
			<table class="sheet">
				<tr>
					<th nowrap>��������</th>
					<th nowrap>�ݥ����ID</th>
					<th nowrap>�ݥ���ȥ�����</th>
					<th nowrap>�ݥ���ȥ��ơ�����</th>
					<th nowrap>���������������</th>
					<th nowrap>�桼��ID</th>
					<th nowrap>�˥å��͡���</th>
				</tr>
				{foreach from=$app.point_list item=i}
				<tr>
					<td nowrap>{$i.point_exchange_time|jp_date_format:"%Y/%m/%d (%a) %H:%M"}</td>
					<td>{$i.point_id}</td>
					<td>{$config.point_type[$i.point_type].name}</td>
					<td>{$config.point_status[$i.point_status].name}</td>
					<td>{$i.price}��</td>
					<td>{$i.user_id}</td>
					<td>{$i.user_nickname}</td>
				</tr>
				{/foreach}
			</table>
			<p id="pagetop"><a href="javascript:pagetop(0);">�ڡ����ȥå�</a></p>
		<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- ***********************��#main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
