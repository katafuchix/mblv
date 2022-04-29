{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
			<h2>{$ft.admin_account.name}管理</h2>
			<!-- ここからメインコンテンツ-->
			<div class="entry_box">
				{$ft.menu_icon.name}<a href="?action_admin_account_add=true">{$ft.admin_account.name}追加</a><br />
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{include file="admin/pager.tpl"}
			
			<table class="sheet" id="list">
				<tr>
					<th>管理者ID</th>
					<th>管理者名</th>
					<th>ログインID</th>
					<th>パスワード</th>
					<th>管理者権限</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.listview_data item=item name=user}
				{if $item != false}
				<tr>
					<td>{$item.admin_id}</td>
					<td>{$item.admin_name}</td>
					<td>{$item.login_id}</td>
					<td>{$item.login_password}</td>
					<td>{$config.admin_status[$item.admin_status].name}</td>
					<td><a href="?action_admin_account_edit=true&admin_id={$item.admin_id}">編集</a></td>
					<td><a href="?action_admin_account_delete_do=true&admin_id={$item.admin_id}" onClick="return confirm('本当にこの{$ft.admin_account.name}を削除してもよろしいですか？');">削除</a></td>
				</tr>
				{/if}
				{/foreach}
			</table>
			
			{include file="admin/pager.tpl"}
			
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->
{include file="admin/footer.tpl"}
