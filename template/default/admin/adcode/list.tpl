{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<!-- ここからメインコンテンツ-->
			<h2>{$ft.ad_code.name}管理</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_adcode_add=true">{$ft.ad_code.name}登録</a><br />
			{include file="admin/pager.tpl"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{$ft.ad_code.name}名</th>
					<th nowrap>{$ft.ad_code.name}パラメタ</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.ad_code_name}</td>
					<td>{$i.ad_code_param}</td>
					<td><a href="?action_admin_adcode_edit=true&ad_code_id={$i.ad_code_id}">編集</a></td>
					<td><a href="?action_admin_adcode_delete_do=true&ad_code_id={$i.ad_code_id}" onClick="return confirm('本当にこの{$ft.ad_code.name}を削除してもよろしいですか？');">削除</a></td>
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
