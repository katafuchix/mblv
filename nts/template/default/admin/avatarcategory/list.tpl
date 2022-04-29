{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>{$ft.avatar.name}管理</h2>
			<blockquote><a href="?action_admin_util=true&page=faq_avatar&keepThis=true&TB_iframe=true&height=800&width=800" class="thickbox">{$ft.avatar.name}管理FAQ</a></blockquote>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
			</div>
			{$ft.menu_icon.name}<a href="?action_admin_avatarcategory_add=true">{$ft.avatar_category.name}新規登録</a><br />
			{form action="$script" ethna_action="admin_avatarcategory_priority_do"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{$ft.avatar_category_priority.name}</th>
					<th nowrap>{$ft.avatar.name}システムカテゴリ</th>
					<th nowrap>{$ft.avatar_category.name}名</th>
					<th nowrap>{$ft.avatar_category.name}編集</th>
					<th nowrap>{$ft.avatar_category.name}削除</th>
					<th nowrap>{$ft.avatar.name}一覧</th>
				</tr>
				{foreach from=$app.avatar_category_list item=i}
				<tr>
					<td><input name="avatar_category_priority_id[{$i.avatar_category_id}]" value="{$i.avatar_category_priority_id}" size="4"></td>
					<td>{$config.avatar_system[$i.avatar_system_category_id].name}</td>
					<td>{$i.avatar_category_name}</td>
					<td nowrap><a href="?action_admin_avatar_list=true&avatar_category_id={$i.avatar_category_id}">{$ft.avatar.name}一覧</td>
					<td><a href="?action_admin_avatarcategory_edit=true&avatar_category_id={$i.avatar_category_id}">編集</a></td>
					<td><a href="?action_admin_avatarcategory_delete_do=true&avatar_category_id={$i.avatar_category_id}" onClick="return confirm('本当にこの{$ft.avatar_category.name}を削除してもよろしいですか？');">削除</a></td>
				</tr>
				{/foreach}
			</table>
			※{$ft.avatar_category.name}優先度が「0」の場合、ユーザ画面には表示されません。<br />
			{form_submit value="`$ft.avatar_category.name`優先度更新"}
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
