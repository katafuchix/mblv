{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>{$ft.thema.name}管理</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_thema_add=true">{$ft._thema.name}新規登録</a>
			{form action="$script" ethna_action="admin_gamecategory_priority_do"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{$ft.thema_name.name}</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.thema_name}</td>
					<td><a href="?action_admin_thema_edit=true&thema_id={$i.thema_id}">編集</a></td>
					<td><a href="?action_admin_thema_delete_do=true&thema_id={$i.thema_id}" onClick="return confirm('本当にこの{$ft.thema_name.name}を削除してもよろしいですか？');">削除</a></td>
				</tr>
				{/foreach}
			</table>
			{/form}
			<p id="pagetop"><a href="javascript:pagetop(0);">ページトップ</a></p>
		<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
