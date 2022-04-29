{include file="admin/header.tpl"}

<div id="two_column">
	<!-- *********************** /* #main ****************************** -->
	<div id="main" class="floatr">
		<div id="mainC">
		<!-- ここからメインコンテンツ-->
			<h2>{$ft.game.name}管理</h2>
			<div class="entry_box">
				{if count($errors)}<span class="err">{foreach from=$errors item=error}{$error}<br />{/foreach}</span>{/if}
				{$ft.menu_icon.name}<a href="?action_admin_gamecategory_add=true">{$ft.game_category.name}登録</a><br />
			</div>
			{form action="$script" ethna_action="admin_gamecategory_priority_do"}
			<table class="sheet" id="list">
				<tr>
					<th nowrap>{$ft.game_category_priority.name}</th>
					<th nowrap>{$ft.game_category_name.name}</th>
					<th nowrap>{$ft.game.name}一覧</th>
					<th nowrap>編集</th>
					<th nowrap>削除</th>
				</tr>
				{foreach from=$app.listview_data item=i}
				<tr>
					<td><input name="game_category_priority_id[{$i.game_category_id}]" value="{$i.game_category_priority_id}" size="4"></td>
					<td>{$i.game_category_name}</td>
					<td nowrap><a href="?action_admin_game_list=true&game_category_id={$i.game_category_id}">一覧</td>
					<td><a href="?action_admin_gamecategory_edit=true&game_category_id={$i.game_category_id}">編集</a></td>
					<td><a href="?action_admin_gamecategory_delete_do=true&game_category_id={$i.game_category_id}" onClick="return confirm('本当にこの{$ft.game_category_name.name}を削除してもよろしいですか？');">削除</a></td>
				</tr>
				{/foreach}
			</table>
			<div class="entry_box">
				※{$ft.game_category_name.name}優先度が「0」の場合、ユーザ画面には表示されません。<br />
				{form_submit value="`$ft.game_category_name.name`優先度更新"}
				{/form}
			</div>
			<!-- ここまでメインコンテンツ-->
		</div>
	</div>
	<!-- *********************** #main */ ****************************** -->

{include file="admin/side.tpl"}

</div>
<!-- #two column */ -->

{include file="admin/footer.tpl"}
