{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>{$form.user_nickname}さんの{$ft.point.name}通帳</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.point.name}残高{$form.user_point}{$ft.point_unit.name}<br />
			</div>
			{include file="admin/pager.tpl"}
			<table class="sheet">
				<tr>
					<th>取得日時</th>
					<th>{$ft.point.name}タイプ</th>
					<th>広告名</th>
					<th>{$ft.point.name}数</th>
					<th>ステータス</th>
				</tr>
				{foreach from=$app.listview_data item=item}
				<tr>
					<td>[取得]:{$item.point_created_time|jp_date_format:"%Y/%m/%d(%a) %H:%M"}</td>
					<td>{$config.point_type[$item.point_type].name}</td>
					<td>{if $item.point_type==6||$item.point_type==7}<a href="?action_admin_ad_edit=true&ad_id={$item.point_sub_id}">{$item.ad_name}</a>{/if}</td>
					<td>{$item.point}{$ft.point_unit.name}</td>
					<td>{$config.point_status[$item.point_status].name}</td>
				</tr>
				{/foreach}
			</table>
			{include file="admin/pager.tpl"}
		<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
