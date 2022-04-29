{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>アバター台座管理</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_avatarstand_add=true">アバター台座登録</a><br />
			{include file="admin/pager.tpl"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>アバター台座名</th>
					<th nowrap>台座イメージ</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td>{$i.avatar_stand_name}</td>
					<td>{$i.avatar_stand_image}</td>
					<td><a href="?action_admin_avatarstand_edit=true&avatar_stand_id={$i.avatar_stand_id}">編集</a></td>
					<td><a href="?action_admin_avatarstand_delete_do=true&avatar_stand_id={$i.avatar_stand_id}" onClick="return confirm('本当にこのアバター台座を削除してもよろしいですか？');">削除</a></td>
				</tr>
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
