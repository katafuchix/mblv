{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ��������ᥤ�󥳥�ƥ��-->
			<h2>{$form.user_nickname}�����{$ft.point.name}��Ģ</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.point.name}�Ĺ�{$form.user_point}{$ft.point_unit.name}<br />
			</div>
			{include file="admin/pager.tpl"}
			<table class="sheet">
				<tr>
					<th>��������</th>
					<th>{$ft.point.name}������</th>
					<th>����̾</th>
					<th>{$ft.point.name}��</th>
					<th>���ơ�����</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				<tr>
					<td>[����]:{$item.point_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}</td>
					<td>{$config.point_type[$item.point_type].name}</td>
					<td>{if $item.point_type==6||$item.point_type==7}<a href="?action_admin_ad_edit=true&ad_id={$item.point_sub_id}">{$item.ad_name}</a>{/if}</td>
					<td>{$item.point}{$ft.point_unit.name}</td>
					<td>{$config.point_status[$item.point_status].name}</td>
				</tr>
				{/foreach}
			</table>
			{include file="admin/pager.tpl"}
		<!-- �����ޤǥᥤ�󥳥�ƥ��-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
