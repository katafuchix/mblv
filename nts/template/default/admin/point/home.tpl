{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$form.user_nickname}����Υݥ������Ģ</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			�ݥ���ȻĹ�{$form.user_point}{$ft.point.name}<br />
			{include file="admin/pager.tpl"}
			<table class="sheet">
				<tr>
					<th nowrap>��������</th>
					<th nowrap>{$ft.point.name}ID</th>
					<th nowrap>{$ft.point.name}���ơ�����</th>
					<th nowrap>{$ft.point.name}������</th>
					<th nowrap>{$ft.point.name}</th>
					<th nowrap>�ݥ���ȥ���ID</th>
					<th nowrap>�ݥ���ȥ��</th>
					<th nowrap>�桼������ID</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				<tr>
					<td nowrap>[����]{$item.point_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}</td>
					<td>{$item.point_id}</td>
					<td>{$config.point_status[$item.point_status].name}</td>
					<td>{$config.point_type[$item.point_type].name}</td>
					<td>{$item.point}</td>
					<td>{$item.point_sub_id}</td>
					<td>{$item.point_memo}</td>
					<td>{$item.user_sub_id}</td>
				</tr>
				{/foreach}
			</table>
			{include file="admin/pager.tpl"}
			<p id="pagetop"><a href="javascript:pagetop(0);">�ڡ����ȥå�</a></p>
		<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
